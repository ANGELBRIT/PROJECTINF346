<?php

namespace App\Http\Controllers;

use App\Models\Persons;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnes = Persons::select("*")->orderBy("id","Desc")->get();
        return response()->json($personnes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personne = new Persons();
        if($request->hasFile("image")){
          $file = $request->file("image");
          $extension = $file->getClientOriginalExtension();
          $filename = time() . "." . $extension;
          $file->move(public_path("avatars"),$filename);
          $personne->image = $filename;
        }
        $personne->name = $request->name;
        $personne->email = $request->email;
        $personne->password = Hash::make($request->password);
        $personne->save();
        return response()->json("Enregistrement  reussi");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $personne = Persons::find($id);
      if(!$request->name==""){
        $personne->name = $request->name;
      }
      if(!$request->email==""){
        $personne->email = $request->email;
      }
      if(!$request->password==""){
        $personne->password = $request->password;
      }
      $personne->update();
      return response()->json("modification reussir");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Persons::find($id)->delete();
        return response()->json("suppression reussir ");
    }
}
