<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;

class PostController extends Controller
{
    public function index(Request $request)
    {

        if($request->ajax()){
            $posts = DB::table("posts")
                    ->join("categories", "posts.category_id", "=", "categories.id")
                    ->join("writers", "posts.writer_id", "=", "writers.id")
                    ->where("posts.active", 1)
                    ->where("categories.role", 0)
                    ->orderBy("posts.created_at", "DESC")
                    ->select(
                        "posts.id",
                        "posts.title",
                        "posts.see",
                        "posts.active",
                        "posts.publish",
                        "posts.created_at",
                        "categories.name AS category_name",
                        "writers.name AS writer_name",
                    )
                    ->get();

        return DataTables::of($posts)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                    $btn = "";
                    
                    if ($row->active === 1) {
                        $btn = "<a href=" . url("post/$row->id/edit") . " class='btn btn-sm btn-info mx-1' >Edit</a>";
                        $btn = $btn . "<a href=" . url("/post/delete/$row->id") . " class='btn btn-sm btn-danger button delete-confirm'>Delete</a>";
                        return $btn;

                    }

                    })->rawColumns(['action'])->make(true);
        }

        return view("post.index");
    }

    public function create()
    {
        $categories = DB::table("categories")
                    ->where("role", 0)
                    ->where("active", 1)
                    ->orderBy("name", "ASC")
                    ->get();

        $writers = DB::table("writers")
                    ->where("active", 1)
                    ->orderBy("name", "ASC")
                    ->get();

        return view("post.create", compact("categories", "writers"));
    }

    public function store(Request $request)
    {
        $category = DB::table("categories")
                        ->where("id", $request->category_id)
                        ->select("id")
                        ->first();
        
        $originName     = $request->file("image")->getClientOriginalName();
        $fileName       = pathinfo($originName, PATHINFO_FILENAME);
        $extension      = $request->file("image")->getClientOriginalExtension();
        $fileName       = "posts/". $fileName.'_'.time().'.'.$extension;

        $request->file("image")->storeAs(
            "public", $fileName
        );

        DB::table("posts")->insert([
            "uuid"          => Str::slug($request->title, '-') . "-" . Str::slug(now(), '-'),
            "image"         => $fileName,
            "title"         => $request->title,
            "description"   => $request->description,
            "publish"       => $request->publish,
            "category_id"   => $category->id,
            "writer_id"     => $request->writer_id,
            "created_at"    => now()
        ]);

        return redirect("/post")->with("msg", "post berhasil ditambahkan");
    }

    public function edit($id)
    {
        $post = DB::table("posts")->where("id", $id)->first();

        $categories = DB::table("categories")
                    ->where("role", 0)
                    ->where("active", 1)
                    ->orderBy("name", "ASC")
                    ->get();

        $writers = DB::table("writers")
                    ->where("active", 1)
                    ->orderBy("name", "ASC")
                    ->get();

        return view("post.edit", compact("post", "categories", "writers"));
    }

    public function update(Request $request, $id)
    {
        $category = DB::table("categories")
                        ->where("id", $request->category_id)
                        ->select("id")
                        ->first();
        
        $post = DB::table("posts")->where("id", $id)->first();

        if($request->hasFile("image")){

            $path = public_path($post->image);

            $isExists = file_exists($path);

            if ($isExists) {
                unlink(storage_path('app/public/'.$post->image));
            }
                
            $originName     = $request->file("image")->getClientOriginalName();
            $fileName       = pathinfo($originName, PATHINFO_FILENAME);
            $extension      = $request->file("image")->getClientOriginalExtension();
            $fileName       = "posts/". $fileName.'_'.time().'.'.$extension;

            $request->file("image")->storeAs(
                "public", $fileName
            );

            DB::table("posts")->where("id", $id)->update([
                "image"         => $fileName,
                "title"         => $request->title,
                "description"   => $request->description,
                "publish"       => $request->publish,
                "category_id"   => $category->id,
                "writer_id"     => $request->writer_id,
            ]);

        }else{

            DB::table("posts")->where("id", $id)->update([
                "title"         => $request->title,
                "description"   => $request->description,
                "publish"       => $request->publish,
                "category_id"   => $category->id,
                "writer_id"     => $request->writer_id,
            ]);
        }

        return redirect("/post")->with("msg", "post berhasil diperbarui");
    }

    public function destroy($id)
    {
        $post = DB::table("posts")->where("id", $id)->first();
        $post = DB::table("posts")->where("id", $id)->update([
            "active" => 0
        ]);

        return redirect("/post")->with("msg", "post berhasil dihapus");
    }


}
