<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table("categories")
                        ->where("role", 0)
                        ->where("active", 1)
                    ->get();

        return view("category.index", compact("categories"));
    }

    public function create()
    {
        return view("category.create");
    }

    public function store(Request $request)
    {
        DB::table("categories")->insert([
            "uuid"  => Str::uuid(),
            "name"  => $request->name,

        ]);

        return redirect("/category")->with("msg","categori berhasil ditambahkan");
    }

    public function edit($id)
    {
        $category = DB::table("categories")->where("id", $id)->first();

        return view("category.edit", compact("category"));
    }

    public function update(Request $request, $id)
    {
        $category = DB::table("categories")->where("id", $id)->update(
            [
                "name" => $request->name
            ]
        );

        return redirect("/category")->with("msg","categori berhasil diedit");
    }

    public function destroy($id)
    {
        $category = DB::table("categories")->where("id", $id)->update(
            [ "active" => 0 ]
        );

        return redirect("/category")->with("msg","categori berhasil diarsipkan");
    }
}
