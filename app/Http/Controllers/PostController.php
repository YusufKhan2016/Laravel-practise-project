<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function add(){
        return view('add');
    }
    public function dataStore(Request $request){

        $validated = $request->validate([
            'Name' => 'required|string|max:225',
            'Email' => 'required|email|max:225',
            'Phone' => 'required',
            'Image' => 'nullable|image|mimes:jpeg,png',
        ]);
        // dd($request->all());

        // add new post  

        $post = new Post(); 
        $post-> Name = $request->Name;
        $post-> Email = $request->Email;
        $post-> Phone = $request->Phone;
        if ($request->hasFile('Image') && $request->file('Image')->isValid()) {
            // Store the image and generate a unique file name
            $imageName = time().'.'.$request->Image->extension(); // Get file extension and create a unique name
            $request->Image->move(public_path('images'), $imageName); // Store the image in 'public/images' directory
            $post->Image = $imageName; // Save the file name in the database
        }

        


        $post->save();

        return redirect() -> route('home')->with('success','Congratulations! Your post has been created');
    }

    public function editData($id) {
        // dd($id);
        $post = Post::findOrFail($id);
        return view('edit',['ourPost' => $post]);
    }


    public function updateData($id, Request $request){
        
        $validated = $request->validate([
            'Name' => 'required|string|max:225',
            'Email' => 'required|email|max:225',
            'Phone' => 'required',
            'Image' => 'nullable|image|mimes:jpeg,png',
        ]);
        // dd($request->all());

        // update post  

        $post = Post::findOrFail($id);
        $post-> Name = $request->Name;
        $post-> Email = $request->Email;
        $post-> Phone = $request->Phone;
        if ($request->hasFile('Image') && $request->file('Image')->isValid()) {
            // Store the image and generate a unique file name
            $imageName = time().'.'.$request->Image->extension(); // Get file extension and create a unique name
            $request->Image->move(public_path('images'), $imageName); // Store the image in 'public/images' directory
            $post->Image = $imageName; // Save the file name in the database
        }

        


        $post->save();

        return redirect() -> route('home')->with('success','Congratulations! Your post has been Updated');
        

    }


    public function deleteData($id) {
        $post = Post::findOrFail($id);

        $post-> delete();

        return redirect() -> route('home') ->with('success', 'Post is deleted successfully');
    }
}
?>