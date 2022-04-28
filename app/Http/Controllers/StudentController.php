<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Student;

class StudentController extends Controller
{
    

    public function index(){
        $data=Student ::get();
        return view('/index',['data'=>$data]);
    }

    public function create(){
        return view('/create');
    }


    public function store(Request $request){
      
        $name = $request->name;
         $email=$request->email;
        $password=$request->password;

        $data = $this->validate($request, [
'name'=>'required:min:3',
'email'=>'required|email',
'password'=>'min:6|max:11'
       ]);
$data['password']=encrypt($data['password']);

 $op=Student :: create($data);
 if($op){
     dd("Raw inserted");
 }else{
     dd("No inserted");

 }

    }
}
