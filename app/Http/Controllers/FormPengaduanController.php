<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Services;
use App\Models\Link;
use App\Models\Linkskm;
use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\Form_pengaduan;

class FormPengaduanController extends Controller
{
    public function index()
    {
        return view('pengaduan.form', ["title" => "Form Pengaduan", "heroes" => Hero::all(), "services" => Services::all(), "links" => Link::all(), "linkskm" => Linkskm::all(), "folders" => Folder::limit(6)->get()]);
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate(['name' => 'required|max:255', 'email' => 'max:255', 'nohp' => 'required', 'kid' => 'image|file|max:1024|required', 'subject' => 'required', 'lampiran' => 'image|file|max:1024|required', 'aduan' => 'required', 'captcha' => 'required|captcha']);
        if ($request->file('kid')) {
            $validatedData['kid'] = $request->file('kid')->store('pengaduan-images');
        }
        if ($request->file('lampiran')) {
            $validatedData['lampiran'] = $request->file('lampiran')->store('pengaduan-images');
        }
        Form_pengaduan::create($validatedData);
        return redirect('/pengaduan/form')->with('success', 'Berhasil Mengirimkan Aduan');
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
