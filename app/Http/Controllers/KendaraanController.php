<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'active' => 'menu-kendaraan'
        ];
        return view('pages.dashboard_admin.kendaraan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'active' => 'menu-kendaraan'
        ];
        return view('pages.dashboard_admin.kendaraan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nomor_polisi' => 'required',
                'jenis_kendaraan'=>'required',
                'nama_supir'=>'required',
                'telepon_supir'=>'required',
            ]);
            Kendaraan::create($validatedData);
            return redirect()->route('dashboard.kendaraan.index')->with('success', 'Data Kendaraan berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Kendaraan Gagal Ditambah.');
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
            'active' => 'menu-kendaraan',
            'kendaraan' => Kendaraan::findOrFail($id)
        ];
        return view('pages.dashboard_admin.kendaraan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $kendaraan = Kendaraan::findOrFail($id);
            $kendaraan->update($request->except('_token', '_method'));
            return redirect()->route('dashboard.kendaraan.index')->with('success', 'Data kendaraan berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data kendaraan gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $kendaraan = Kendaraan::findOrFail($id);
            $kendaraan->delete();
            return redirect()->back()->with('success', 'Data kendaraan berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data kendaraan gagal dihapus');
        }
    }

    // Datatables kendaraan
    public function data()
    {
        $kendaraan = Kendaraan::orderBy('id', 'desc')->get();

        return datatables()
            ->of($kendaraan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kendaraan) {
                return '
                <div class="btn-group">
                    <a href="' . route('dashboard.kendaraan.edit', $kendaraan->id) . '" class="btn btn-sm btn-info btn-flat mr-1"><i class="fa fa-edit"></i></a>
                    <form action="' . route('dashboard.kendaraan.destroy', $kendaraan->id) . '" method="POST" class="d-inline">
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