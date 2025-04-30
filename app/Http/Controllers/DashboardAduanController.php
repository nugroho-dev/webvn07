<?php

namespace App\Http\Controllers;

use App\Models\Form_pengaduan;
use Illuminate\Http\Request;

class DashboardAduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pengaduan.aduan.index', ["title" => "Daftar Pengaduan", "items" => Form_pengaduan::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form_pengaduan  $form_pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Form_pengaduan $aduan)
    {
        return view('dashboard.pengaduan.aduan.show', ['post' => $aduan, 'title' => 'Aduan']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form_pengaduan  $form_pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Form_pengaduan $form_pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form_pengaduan  $form_pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form_pengaduan $form_pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form_pengaduan  $form_pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form_pengaduan $form_pengaduan)
    {
        //
    }
}
