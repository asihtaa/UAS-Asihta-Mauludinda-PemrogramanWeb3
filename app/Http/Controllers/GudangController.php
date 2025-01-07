<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'active' => 'menu-gudang'
        ];
        return view('pages.dashboard_admin.gudang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'active' => 'menu-gudang'
        ];
        return view('pages.dashboard_admin.gudang.create', $data);
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
            gudang::create($validatedData);
            return redirect()->route('dashboard.gudang.index')->with('success', 'Data Gudang berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Gudang Gagal Ditambah.');
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
            'active' => 'menu-gudang',
            'gudang' => Gudang::findOrFail($id)
        ];
        return view('pages.dashboard_admin.gudang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $gudang = gudang::findOrFail($id);
            $gudang->update($request->except('_token', '_method'));
            return redirect()->route('dashboard.gudang.index')->with('success', 'Data Gudang berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Gudang gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $gudang = Gudang::findOrFail($id);
            $gudang->delete();
            return redirect()->back()->with('success', 'Data Gudang berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Gudang gagal dihapus');
        }
    }

    // Datatables Gudang
    public function data()
    {
        $gudang = Gudang::orderBy('id', 'desc')->get();

        return datatables()
            ->of($gudang)
            ->addIndexColumn()
            ->addColumn('aksi', function ($gudang) {
                return '
                <div class="btn-group">
                    <a href="' . route('dashboard.gudang.edit', $gudang->id) . '" class="btn btn-sm btn-info btn-flat mr-1"><i class="fa fa-edit"></i></a>
                    <form action="' . route('dashboard.gudang.destroy', $gudang->id) . '" method="POST" class="d-inline">
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