<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
    //

    public function create(){
        return view('/create');
    }


    public function store(Request $request){
        // return view('/index');
        $title = $request->title;

        $content=$request->content;

        $data = $this->validate($request, [
'title'=>'required:min:3',
'content'=>'required'
       ]);
       // dd($data);
       blog::create($request->all());
if(!empty($data)){

    echo "Raw Inserted SuccessFul"."</br>" .$data['title'];
}

return view('index')->with('success','Raw Inserted');

    }
    public function Edit(blog $blog){
    // $sql="select * from blog where id =$id";
    // $op=mysqli_query($sql);
    //  $data=mysqli_fetch_assoc($op);

    //$data=$blog->find($blog);
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
