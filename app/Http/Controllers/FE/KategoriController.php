<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $newest1 = DB::table("posts")
                ->join("categories", "posts.category_id", "=", "categories.id")
                ->where("categories.name", $request->name)    
                ->where("posts.active", 1)    
                ->orderBy("publish", "DESC")
                ->select(
                    "posts.uuid",
                    "posts.title",
                    "posts.publish"
                    )
                ->get();   
    }

    public function show($uid)
    {
        $newest1 = DB::table("posts")
                ->join("categories", "posts.category_id", "=", "categories.id")
                ->where("posts.uuid", $uuid)
                ->where("posts.active", 1)    
                ->orderBy("publish", "DESC")
                ->select(
                    "posts.uuid",
                    "posts.title",
                    "posts.publish"
                    )
                ->get();  

        
    }
}
