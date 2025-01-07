<?php

namespace App\Http\Controllers;

use App\Models\Batubara;
use Illuminate\Http\Request;

class BatubaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'active' => 'menu-batubara'
        ];
        return view('pages.dashboard_admin.batubara.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'active' => 'menu-batubara'
        ];
        return view('pages.dashboard_admin.batubara.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'HBA' => 'required',
                'kalori' => 'required',
                'harga_per_ton' => 'required',
            ]);
            Batubara::create($validatedData);
            return redirect()->route('dashboard.batubara.index')->with('success', 'Data Batubara berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data batubara Gagal Ditambah.');
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
            'batubara' => Batubara::findOrFail($id),
            'active' => 'menu-batubara'
        ];
        return view('pages.dashboard_admin.batubara.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $batubara = Batubara::findOrFail($id);
            $batubara->update($request->except('_token', '_method'));
            return redirect()->route('dashboard.batubara.index')->with('success', 'Data batubara berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data batubara gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $batubara = Batubara::findOrFail($id);
            $batubara->delete();
            return redirect()->back()->with('success', 'Data batubara berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data batubara gagal dihapus');
        }
    }

    // Datatables batubara
    public function data()
    {
        $batubara = Batubara::orderBy('id', 'desc')->get();

        return datatables()
            ->of($batubara)
            ->addIndexColumn()
            ->addColumn('aksi', function ($batubara) {
                return '
                <div class="btn-group">
                    <a href="' . route('dashboard.batubara.edit', $batubara->id) . '" class="btn btn-sm btn-info btn-flat mr-1"><i class="fa fa-edit"></i></a>
                    <form action="' . route('dashboard.batubara.destroy', $batubara->id) . '" method="POST" class="d-inline">
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
