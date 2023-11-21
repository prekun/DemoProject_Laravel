<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    function index(){
        $blogs=Blog::orderByDesc('id')->where('status',true)->get();
        return view('welcome',compact('blogs'));
    }
    function detail($id){
        $blog=Blog::find($id);
        return view('detail',compact('blog'));
    }
}
