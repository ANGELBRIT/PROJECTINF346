<?php

namespace App\Http\Controllers;

use App\Mail\CodeAuthentification;
use App\Models\code as ModelsCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class CodeController extends Controller
{
    public function store(Request $request){
        $code = new ModelsCode();
        $code->email = $request->email;
        $code->code =rand(1542 ,9999);

       //Mail::to($code->email)->send(new CodeAuthentification($code->code));
       $code->save();
       return response()->json("mail parti");

    }
    public function verified(Request $request){
        $code = ModelsCode::where('email', $request->email)->first();
        return response()->json($code->code);
    }
}