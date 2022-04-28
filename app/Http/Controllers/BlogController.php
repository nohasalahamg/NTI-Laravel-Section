<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\blog;

class BlogController extends Controller
{
    //
    
    public function create(){
        return view('blogs/create');
    }


    public function store(Request $request){
        // return view('/index');
        $title = $request->title;

        $content=$request->content;

        $data = $this->validate($request, [
'title'=>'required:min:3',
'content'=>'required'
       ]);
       blog::create($request->all());
$message="Raw Inserted SuccessFul";
return view('blogs/index',['message'=>$message]);

    }
    public function Edit($id){

        $data=blog::where('id',$id)->get();

    $data1=blog::find($id);

        return view('index',compact('blog'));
    }
    public function Update(Request $request,$id){

$title=$request->title;
$content=$request->content;
$image =$request->image;
$data=this->validate($request,[
    'title'=>'required',
    'content'=>'required|min:50',
    'image'=>'required|file|image'
  
]);
$blog->Update($request->all());

        return view('index')->with('success','Raw Updated');
    }



public function destory(blog $blog){
    $blog->delete();
    return view('index')->with('success','Raw Delete');

}
}
