<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Category;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class ImmoController extends Controller
{
    public function index(){
        $categories= Category::all();
        $annonces=Bien::paginate(12);
        return view('accueil',compact('categories','annonces'));
    }
    public function showCategory($id){
        $categories= Category::all();
        $cat= Category::find($id);
        $annonces= Bien::where('category_id', $id)->paginate(12);
        // $annonces= DB::table('biens')->simplePaginate(15);
        // $annonces=Bien::where('category_id',$id)->get()->paginate(15);
        // dd($annonces->image);
        return view('showCategory',compact('categories','annonces','cat'));
    }
    public function showDetails($id){
        $categories= Category::all();
        
        $bien = Bien::where('id',$id)->first();
        $biens=Bien::where('category_id',$bien->category_id)->inRandomOrder()->limit(4)->get();
        return view('details',compact('bien','categories','biens'));
    }
}
