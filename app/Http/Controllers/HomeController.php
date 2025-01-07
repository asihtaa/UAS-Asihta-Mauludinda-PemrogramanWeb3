<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\Kendaraan; 
use App\Models\Batubara;   
use App\Models\Gudang; 
use App\Models\Pelanggan; 
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalUsers = User::count();
        $totalKendaraans = Kendaraan::count();
        $totalBatubara = Batubara::count();
        $totalGudang = Gudang::count();
        $totalPelanggan= Pelanggan::count();
        $data = [
            'active' => 'menu-dashboard'
        ];

       
        return view('pages.dashboard_admin.index',compact('totalUsers','totalKendaraans','totalBatubara','totalGudang','totalPelanggan'),$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
