<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class PostController extends Controller
{
    //
    public function FirstAction(){
        $name="AmenAllah";
        $tab=["PHP","Angular","React","MySql","HTML","CSS","Javascript","Node.js","Express.js","Mongo DB","Oracle"];
        return view('hello',['name'=>$name,'tab'=>$tab]);
    }
    public function greet(){
        return '<h1>hello this is great action</h1>';
    }
    public function index(){
        $postsFromDB=Post::all();
        // dd($postsFromDB);
        // $allposts=[
        //     ['id'=>1,'title'=>'PHP','posted_by'=>'Ahmed','created_at'=>'20/10/2030'],
        //     ['id'=>2,'title'=>'PHP','posted_by'=>'Ahmed','created_at'=>'20/10/2030'],
        //     ['id'=>3,'title'=>'PHP','posted_by'=>'Ahmed','created_at'=>'20/10/2030'],
        // ];
        return view('posts.index',['posts'=>$postsFromDB]);
    }
    public function show(Post $post){
        // $singlePost=['id'=>1,'title'=>'PHP','description'=>"this is description",'posted_by'=>'Ahmed','created_at'=>'20/10/2030'];
        //1ER METHODE
        // $post=Post::where('id',$postid)->first();
        //2EME METHODE
        // $postDB=Post::findOrFail($postid);
        // if(is_null($postDB)){
        //     return to_route('posts.index');
        // }
        return view('posts.show',['singlepost1'=>$post]);
    }
    public function create(){
        $users=User::all();

        return view('posts.create',['users'=>$users]);
    }
    public function store(){
        $title=request()->title;
        $description=request()->description;
        $auteur=request()->postcreator;
        //  dd($title,$description,$auteur);
        $post=new Post;
        $post->title=$title;
        $post->description=$description;
        $post->posted_by=$auteur;
        $post->save();
        // Post::create(['title'=>$title,'descrption'=>$description,'posted_by'=>$auteur]);
        return to_route('posts.index');
    }
    public function edit(Post $post){
$users=User::all();
        return view('posts.edit',['users'=>$users,'posts'=>$post]);
    }
    public function update($postId){
        $id=request()->id;
       $title=request()->title;
        $description=request()->description;
        $auteur=request()->postcreator;
$postsformdb=Post::find($postId);
// dd($postsformdb);
$postsformdb->update(['title'=>$title,'description'=>$description,'posted_by'=>$auteur]);
    //      dd($title,$description,$auteur);;
        return to_route('posts.show',$postId);
    }
    public function destroy($PostId){
        $id=Post::find($PostId);
        $id->delete();
       // Post::where('id',$PostId)->delete();
        return to_route('posts.index');
    }
}
