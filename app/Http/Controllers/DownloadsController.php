<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\File;
use App\Models\Services;
use App\Models\Categoriesfile;
use App\Models\Link;
use App\Models\Linkskm;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    public function index()
    {

        return view('download.download', ['title' => 'Unduhan', "folderspage" => Folder::paginate(12), "services" => Services::all(), "links" => Link::all(), "linkskm" => Linkskm::all(), "folders" => Folder::limit(6)->get()]);
    }
    public function file()
    {
        $titlecategory = '';
        $namecategory = '';
        if (request('category')) {
            $category = Categoriesfile::firstWhere('slug', request('category'));
            $titlecategory =  $category->name;
            $namecategory = $category->slug;
        }
        if (request('search')) {
            $titlecategory = 'pada kategori ' . $titlecategory;
        }
        $titlefolder = '';
        $namefolder = '';
        if (request('folder')) {
            $folder = Folder::firstWhere('slug', request('folder'));
            $titlefolder = $folder->name;
            $namefolder = $folder->slug;
        }
        if (request('search')) {
            $titlefolder = 'Pencarian dalam ' . $titlefolder;
        }
        return view('download.folder', ['title' =>  $titlefolder, 'titlecategory' =>  $titlecategory,  'namefolder' => $namefolder,  'namecategory' => $namecategory, "categories" => Categoriesfile::filter(request(['folder']))->oldest('categoriesfiles.name')->get(), "files" => File::latest()->filter(request(['folder', 'category', 'search']))->paginate(25)->withQueryString(), "services" => Services::all(), "links" => Link::all(), "linkskm" => Linkskm::all(), "folders" => Folder::limit(6)->get()]);
    }
}
