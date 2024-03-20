<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    function index()
    {
        $cours = Cours::all();
        return response()->json($cours);
    }

    function store(Request $request)
    {
        $cour = new Cours();

        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move(public_path("avatars"), $filename);
            $cour->image = $filename;
        }
        $cour->name = $request->name;
        $cour->description = $request->description;

        $cour->save();
        return response()->json($cour);
    }
    function delete( $id)
    {
       Cours::find($id)->delete();
       return response("cette element a ete supprimer");
    }
}
