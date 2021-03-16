<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WriterController extends Controller
{
    public function index()
    {
        $writers = DB::table("writers")->where("active", 1)->get();

        return view("writer.index", compact("writers"));
    }

    public function create()
    {
        return view("writer.create");
    }

    public function store(Request $request)
    {
        $originName     = $request->file("image")->getClientOriginalName();
        $fileName       = pathinfo($originName, PATHINFO_FILENAME);
        $extension      = $request->file("image")->getClientOriginalExtension();
        $fileName       = "writer/". $fileName.'_'.time().'.'.$extension;

        $request->file("image")->storeAs(
            "public", $fileName
        );

        DB::table("writers")->insert([
            "name"  => $request->name,
            "image" => $fileName
        ]);

        return redirect("/writer")->with("msg", "penulis berhasil ditambahkan");
    }

    public function edit($id)
    {
        $writer = DB::table("writers")->where("id", $id)->first();

        return view("writer.edit", compact("writer"));
    }

    public function show($id)
    {
        $writer = DB::table("writers")->where("id", $id)->first();

        return response()->json($writer);
    }

    public function update(Request $request, $id)
    {
        $writer = DB::table("writers")->where("id", $id)->first();

        if($request->hasFile("image")){

            $path = public_path($writer->image);

            $isExists = file_exists($path);
        
            if ($isExists) {
                unlink(storage_path('app/public/'.$writer->image));
            }

            

            $originName     = $request->file("image")->getClientOriginalName();
            $fileName       = pathinfo($originName, PATHINFO_FILENAME);
            $extension      = $request->file("image")->getClientOriginalExtension();
            $fileName       = "writer/". $fileName.'_'.time().'.'.$extension;

            $request->file("image")->storeAs(
                "public", $fileName
            );

            
            $writer = DB::table("writers")->where("id", $id)->update([
                "name"  => $request->name,
                "image" => $fileName
            ]);
        }else{
            $writer = DB::table("writers")->where("id", $id)->update([
                "name"  => $request->name
            ]);
        }

        return redirect("/writer")->with("msg", "penulis berhasil diedit");
    }

    public function destroy($id)
    {
        DB::table("writers")->where("id", $id)->first();

        DB::table("writers")->where("id", $id)->update([
            "active"  => 0
        ]);

        return redirect("/writer")->with("msg", "penulis berhasil diarsip");
    }
}
