<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Passport\Token;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select("*")->where('type',0)->orwhere('type',1)->orderBy('name','ASC')->get();
        return response()->json($users);
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
    public function allCv(){
       $users =  User::select("*")->whereNotNull("cv")->get();
       return response()->json($users);
    }
    public function uploadFichier( Request $request , $id ){
        $user = User::find($id);
        $user->tel = $request->tel;
        $user->name_formation = $request->name_formation;
        $user->sexe = $request->sexe;
        $user->prix = $request->prix;
        $user->tel = $request->tel;
        if($request->name)$user->name = $request->name;
        if ($request->subname) $user->subname = $request->subname;
        if ($request->hasFile("fichier")) {
            $file = $request->file("fichier");
            $extension = $file->getClientOriginalExtension();
            $filename = $request->name.'_'.$request->subname.'_'.$request->id. "." . $extension;
            $file->move(public_path("CV"), $filename);
        }
        $user->cv = $filename;
        $user->update();
        return response()->json($user);

    }
    public function changeStatus(Request $request , $id){

        $user = User::find($id);
        if ($request->name) $user->name = $request->name;
        if ($request->subname) $user->subname = $request->subname;
        $user->status = $request->status;
        $user->update();
        return response()->json($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator  = Validator::make($request->all(),[
            "name"=>"required|string|max:160",
            "email"=>"required|string|email|max:255|unique:users",
            "password"=>"required|string|max:160",
        ]);
        if($validator->fails()){
            return response(["errors"=>$validator->errors()->all()],422);
        }
        $request['password'] = Hash::make($request["password"]);
        $request["remember_token"] = Str::random(10);
        $request["type"] = 0;
        $request["status"] = 0;
        $request["image"] = "1708692719.png";
        $user = User::create($request->toArray());
        $token = $user->createToken("Laravel Password Grant Client")->accessToken;
        $response = ['token' =>$token];
        return response(["access_token" =>$response , "user" =>$user]);
    }

    public function login(Request $request){
        $validator  = Validator::make($request->all(), [
            "email" => "required|string|email|max:255",
            "password" => "required|string|max:160",
        ]);
        if ($validator->fails()) {
            return response(["errors" => $validator->errors()->all()], 422);
        }
        $user = User::where("email", $request->email)->first();
        if($user){
            if(Hash::check($request->password , $user->password)){
                $token = $user->createToken("Laravel Password Grant Client")->accessToken;
                $response = ["token" => $token];
                return response(['access_token' => $token , "user"=>$user]);
            }
            else{
                $response = ["errors"=>["mot de passe incorrect"]];
                return Response()->json($response,422);
            }

        }
        else{
            $response = ["errors" => ["ce compte n\'existe pas"]];
            return Response()->json($response, 422);
        }
        $response = ["errors" => ["mot de passe incorrect"]];
        return Response()->json($response, 200);
    }
    public function changeImage(Request $request,$id){

        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move(public_path("avatars"), $filename);

            User::find($id)->update(["image" => $filename]);
        }
        $user = User::find($id);
        return response()->json($user);
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

   // public function logout()
    // {
    //     $token = Auth()->user();
    //     $token->token()->revoke();

    //     $response = ['message' => 'You have been successfully logged out!'];
    //     return response($response, 200);
    // }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //  public function uploadFichier(Request $php artisan ){

    // }

}
