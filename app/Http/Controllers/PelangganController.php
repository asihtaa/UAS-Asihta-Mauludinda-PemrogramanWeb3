<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'active' => 'menu-pelanggan'
        ];
        return view('pages.dashboard_admin.pelanggan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'active' => 'menu-pelanggan'
        ];
        return view('pages.dashboard_admin.pelanggan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'alamat'=>'required',
                'telepon'=>'required',
                'email'=>'required',
            ]);
            Pelanggan::create($validatedData);
            return redirect()->route('dashboard.pelanggan.index')->with('success', 'Data pelanggan berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data pelanggan Gagal Ditambah.');
        }
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
        $data = [
            'active' => 'menu-pelanggan',
            'pelanggan' => Pelanggan::findOrFail($id)
        ];
        return view('pages.dashboard_admin.pelanggan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->update($request->except('_token', '_method'));
            return redirect()->route('dashboard.pelanggan.index')->with('success', 'Data pelanggan berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data pelanggan gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pelanggan = pelanggan::findOrFail($id);
            $pelanggan->delete();
            return redirect()->back()->with('success', 'Data pelanggan berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data pelanggan gagal dihapus');
        }
    }

    // Datatables pelanggan
    public function data()
    {
        $pelanggan = pelanggan::orderBy('id', 'desc')->get();

        return datatables()
            ->of($pelanggan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($pelanggan) {
                return '
                <div class="btn-group">
                    <a href="' . route('dashboard.pelanggan.edit', $pelanggan->id) . '" class="btn btn-sm btn-info btn-flat mr-1"><i class="fa fa-edit"></i></a>
                    <form action="' . route('dashboard.pelanggan.destroy', $pelanggan->id) . '" method="POST" class="d-inline">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-sm btn-danger btn-flat btn-delete"><i class="fa fa-trash"></i></button>
                    </form>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}