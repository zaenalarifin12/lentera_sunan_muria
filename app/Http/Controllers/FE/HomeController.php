<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // divalidasi , jika publish <= dari hari ini
        $newestRole1 = DB::table("posts")
                ->join("categories", "posts.category_id", "=", "categories.id")
                ->where("categories.role", 1)    
                ->where("posts.active", 1)    
                ->orderBy("publish", "DESC")
                ->take(5)
                ->select(
                    "posts.uuid",
                    "posts.title",
                    "posts.publish"
                    )
                ->get();

        $categories = DB::table("categories")
                ->where("role", 0)    
                ->where("active", 1)    
                ->orderBy("name", "ASC")
                ->get();

        $newest = DB::table("posts")
                ->join("categories", "posts.category_id", "=", "categories.id")
                ->where("categories.role", 0)  
                ->where("posts.active", 1)    
                ->orderBy("id", "DESC")
                ->take(5)
                ->select(
                    "posts.id",
                    "posts.uuid",
                    "posts.image",
                    "posts.title",
                    "posts.publish"
                    )
                ->paginate(10);

        $newsPopuler = DB::table("posts")
                ->join("categories", "posts.category_id", "=", "categories.id")
                ->where("categories.role", 0)    
                ->orderBy("id", "DESC")
                ->take(5)
                ->select(
                    "posts.id",
                    "posts.title",
                    "posts.publish"
                    )
                ->get();

        return view("client.index", compact("categories", "newest"));

        // return response()->json([
        //     [
        //         "newest1"        => $newest1,
        //         "newest"        => $newest,
        //         "categories"    => $categories,
        //         "newsPopuler"        => $newsPopuler,
        //     ]
        // ]);
    }

    public function show($uuid)
    {
        $post = DB::table("posts")
                ->join("categories", "posts.category_id", "=", "categories.id")
                ->join("writers", "posts.writer_id", "=", "writers.id")
                ->where("posts.active", 1)  
                ->where("posts.uuid", $uuid)
                ->select(
                    "posts.title",
                    "posts.image",
                    "posts.description",
                    "posts.publish",
                    "categories.name",
                    "writers.name AS name_writer",
                    "writers.image AS image_writer"
                )
                ->first();

        return view("client.show", compact("post"));
    }

    public function showByCategory($uuid)
    {
        $category = DB::table("categories")->where("categories.uuid", $uuid)->first();

        $news = DB::table("posts")
                ->join("categories", "posts.category_id", "=", "categories.id")
                ->where("categories.uuid", $uuid)    
                ->where("posts.active", 1)    
                ->orderBy("publish", "DESC")
                ->select(
                    "posts.uuid",
                    "posts.image",
                    "posts.title",
                    "posts.publish"
                    )
                ->simplePaginate(10);;

        return view("client.showByCategory", compact("news", "category"));
    }
}
