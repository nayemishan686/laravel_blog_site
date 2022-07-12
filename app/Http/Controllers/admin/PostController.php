<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Post;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $post = Post::all();
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $category = category::all();
        return view('admin.post.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validate = $request->validate([
            'title'          => 'required',
            'subcategory_id' => 'required',
            'post_date'      => 'required',
            'description'    => 'required',
            'image'          => 'required',
            'status'         => 'required',
        ]);
        $category               = DB::table('sub_categories')->where('id', $request->subcategory_id)->first()->category_id;
        $slug                   = Str::of($request->title)->slug('-');
        $data                   = [];
        $data['category_id']    = $category;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['user_id']        = Auth::id();
        $data['title']          = $request->title;
        $data['slug']           = $slug;
        $data['description']    = $request->description;
        $data['post_date']      = $request->post_date;
        $data['status']         = $request->status;
        $photo                  = $request->image;
        if ($photo) {
            $photoname = $slug . "." . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(600, 360)->save('public/media/' . $photoname);
            $data['image'] = 'public/media/' . $photoname;
            DB::table('posts')->insert($data);
            $notification = ['message' => 'Post Created Successfully', 'alert-type' => 'success'];
            return redirect()->back()->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $post = Post::find($id);
        if (File::exists($post->image)) {
            File::delete($post->image);
        }
        $post::destroy($id);
        $notification = ['message' => 'Post Deleted Successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }
}
