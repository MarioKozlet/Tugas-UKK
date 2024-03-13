<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Guru::query()
            ->simplePaginate('10');
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('guru.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'guru' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png|max:5048',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);

        $imgName = time() . "." . $request->file->extension();

        $request->file->move(public_path('images'), $imgName);

        Guru::create([
            'guru' => $validateData['guru'],
            'nama_file' => $imgName,
            'email' => $validateData['email'],
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        User::create([
            'name' => $validateData['name'],
            'username' => $validateData['username'],
            'email' => $validateData['email'],
            'password' => $validateData['password'],
            'role' => $validateData['role'],
        ]);

        Alert::success('Success', 'Data Added Successfully');
        return to_route('guru.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Guru::findOrFail($id);

        $imgPath = public_path('images/' . $data['nama_file']);
        if (File::exists($imgPath)) {
            File::delete($imgPath);
        }

        // Menghapus data user dari database
        $user = User::where('email', $data['email'])->first();
        if ($user) {
            $user->delete();
        }

        $data->delete();

        Alert::success('Success', 'Data Deleted Successfully');
        return to_route('guru.index');
    }
}
