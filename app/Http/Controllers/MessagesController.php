<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Messages;

class MessagesController extends Controller
{
    public function post(Request $request){

        $validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $eventaddress = new Messages();
        $eventaddress->content = $request->content_x;
        $eventaddress->user_id = Auth::user()->id;
        $eventaddress->save();

        return redirect()->route('index')->with('info','Created Successfully');
    }


    private function rules(){
        $x= [
            'content_x' => 'required|max:255|string',
        ];
        return $x;
    }

}
