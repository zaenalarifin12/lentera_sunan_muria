<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index($name)
    {
        $category = DB::table("categories")->where("categories.name", $name)->first();

        if(empty($category)) abort(404);

        $news = DB::table("posts")
                ->join("categories", "posts.category_id", "=", "categories.id")
                ->where("categories.name", $name)   
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

    public function show($name, $id_post)
    {
        # code...
    }
}
