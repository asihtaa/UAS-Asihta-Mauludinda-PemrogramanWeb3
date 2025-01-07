<?php

namespace App\Http\Controllers;

use App\Models\SuratJalan;
use App\Models\Kendaraan;
use App\Models\Gudang;
use App\Models\Pelanggan;
use App\Models\Batubara;
use Illuminate\Http\Request;

class SuratJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'active' => 'menu-suratjalan'
        ];
        return view('pages.dashboard_admin.suratjalan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'active' => 'menu-suratjalan'
        ];
        $kendaraan = Kendaraan::all();
        $gudang = Gudang::all();
        $pelanggan = Pelanggan::all();
        $batubara = Batubara::all();
        return view('pages.dashboard_admin.suratjalan.create',compact('kendaraan','gudang','pelanggan','batubara'));
    }


        public function getKendaraanInfo($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return response()->json($kendaraan);
    }

    public function getGudangInfo($id)
    {
        $gudang = Gudang::findOrFail($id);
        return response()->json($gudang);
    }

    public function getPelangganInfo($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return response()->json($pelanggan);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'lokasi'=>'required',
                'pengawas'=>'required',
                'telepon'=>'required',
            ]);

            $batubara = Batubara::find($request->id_jenis_batu_bara);
            $totalharga = $request->jumlah_ton * $batubara->harga_per_ton;


            SuratJalan::create($validatedData);
            return redirect()->route('dashboard.suratjalan.index')->with('success', 'Data suratjalan berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data suratjalan Gagal Ditambah.');
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
            'active' => 'menu-suratjalan',
            'suratjalan' => SuratJalan::findOrFail($id)
        ];
        return view('pages.dashboard_admin.suratjalan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $suratjalan = SuratJalan::findOrFail($id);
            $suratjalan->update($request->except('_token', '_method'));
            return redirect()->route('dashboard.suratjalan.index')->with('success', 'Data suratjalan berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data suratjalan gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $suratjalan = SuratJalan::findOrFail($id);
            $suratjalan->delete();
            return redirect()->back()->with('success', 'Data suratjalan berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data suratjalan gagal dihapus');
        }
    }
    
    // Datatables suratjalan
    public function data()
    {
        $suratjalan = SuratJalan::orderBy('id', 'desc')->get();

        return datatables()
            ->of($suratjalan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($suratjalan) {
                return '
                <div class="btn-group">
                    <a href="' . route('dashboard.suratjalan.edit', $suratjalan->id) . '" class="btn btn-sm btn-info btn-flat mr-1"><i class="fa fa-edit"></i></a>
                    <form action="' . route('dashboard.suratjalan.destroy', $suratjalan->id) . '" method="POST" class="d-inline">
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