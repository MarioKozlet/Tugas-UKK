<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kelas::query()
            ->simplePaginate('10');

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('kelas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kelas' => 'required'
        ]);

        Kelas::create($validateData);

        Alert::success('Success', 'Data Added Successfully');
        return to_route('kelas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Kelas::query()
            ->findOrFail($id);

        return view('kelas.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'kelas' => 'required'
        ]);

        $kelas = Kelas::findOrFail($id);

        $kelas->update([
            'kelas' => $validateData['kelas']
        ]);

        Alert::success('Success', 'Data Updated Successfully');
        return to_route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        Kelas::query()
            ->findOrFail($id)
            ->delete();

        Alert::success('Success', 'Data Deleted Successfully');
        return to_route('kelas.index');
    }
}
