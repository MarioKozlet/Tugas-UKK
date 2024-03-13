<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ManajemenUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  User::query()
            ->simplePaginate(10);
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('manajemenuser.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manajemenUser.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData =  $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        Alert::success('Success', 'Data Added Successfully');

        return to_route('manajemenuser.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('manajemenUser.edit', compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validateData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email:dns',
            'password' => 'nullable|min:8',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $validateData['name'],
            'username' => $validateData['username'],
            'email' => $validateData['email'],
        ]);

        if ($validateData['password']) {
            $validateData['password'] = bcrypt($validateData['password']);
            $user->update(['password' => $validateData['password']]);
        }

        Alert::success('Success', 'Data Updated Successfully');
        return to_route('manajemenuser.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::query()
            ->findOrFail($id)
            ->delete();
        Alert::success('Success', 'Data Deleted Successfully');
        return to_route('manajemenuser.index');
    }
}
