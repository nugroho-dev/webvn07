<?php

namespace App\Http\Controllers;

use App\Models\Spsops;
use App\Models\Categoriesps;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class ApiSpController extends Controller
{
    
     public function index()
     {
        //get posts
        //$title = '';
        //if (request('category')) {
            //$category = Categoriesps::firstWhere('slug', request('category'));
            //$title = ' pada ' . $category->name;
       // }

       $items = Spsops::latest()->select('id','title')->filter(request(['search', 'category']))->paginate(150)->withQueryString();
        //return collection of posts as a resource
      
       return new PostResource(true, 'List Data Posts', $items);
    }
    public function detail($data)
    {
   
       
            $ite = Spsops::where('id','=',$data)->select('id','title','persyaratan','mekanisme')->get();
            
     
            //return response()->json($ite );
    	return new PostResource(true, 'List Data ', $ite);
    }

}
