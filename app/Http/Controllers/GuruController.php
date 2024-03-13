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
            ->simplePaginate('5');
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

        //cara menjalan seederphp artisan db:seed
        //php artisan db:seed --class=UsersTableSeeder
        // github https://github.com/MarioKozlet/Tugas-UKK

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

        $guru = Guru::findOrFail($id);

        $user = User::query()
            ->where('email', $guru['email'])
            ->firstOrFail();

        return view('guru.edit', compact('guru', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email:dns',
            'password' => 'nullable|min:8',
            'guru' => 'required',
            'file' => 'nullable|mimes:jpg,jpeg,png|max:5048',
        ]);

        $guru = Guru::findOrFail($id);
        $user = User::where('email', $validateData['email'])->firstOrFail();

        // Jika ada file gambar baru diunggah, hapus gambar lama dan simpan yang baru
        if ($request->hasFile('file')) {
            // Hapus gambar lama
            $oldImage = public_path('images') . '/' . $guru->nama_file;
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
            // Simpan gambar baru
            $imgName = time() . "." . $request->file->extension();
            $request->file->move(public_path('images'), $imgName);
            $guru->nama_file = $imgName;
        }

        // Update data guru
        $guru->guru = $validateData['guru'];
        $guru->email = $validateData['email'];
        $guru->save();

        // Update data user
        if ($validateData['password']) {
            $validateData['password'] = bcrypt($validateData['password']);
            $user->save(['password' => $validateData['password']]);
        }
        $user->name = $validateData['name'];
        $user->username = $validateData['username'];
        $user->email = $validateData['email'];
        $user->role = 'guru';
        $user->save();

        Alert::success('Success', 'Data Updated Successfully');
        return to_route('guru.index');
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
