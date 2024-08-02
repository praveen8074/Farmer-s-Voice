<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\BlogDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    public function create()
    {
        $users = User::all();
        return view('blog', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('media'), $imageName);
            $imagePath = 'media/' . $imageName;
        }

        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            try {
                $file = $request->file('upload');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;

                $file->move(public_path('media'), $fileName);

                $url = asset('media/' . $fileName);

                return response()->json([
                    'fileName' => $fileName,
                    'uploaded' => 1,
                    'url' => $url
                ]);
            } catch (\Exception $e) {
                return response()->json(['error' => 'File upload failed'], 500);
            }
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }

    public function index()
    {
        $posts = Post::all();
        $users = User::where('role', 'user')->get(); // Fetch users with 'user' role
        return view('posts.index', compact('posts', 'users'));
    }

    public function storeDetails(Request $request, $postId)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'content' => 'nullable|string',
    ]);

    $post = Post::findOrFail($postId);

    BlogDetail::updateOrCreate(
        ['post_id' => $postId],
        [
            'title' => $post->title, 
            'assigned_user' => User::find($request->user_id)->name, 
            'content' => $request->input('content', $post->content),
        ]
    );

    return redirect()->route('posts.index')->with('success', 'Blog details updated successfully.');
}


    public function showBlogDetails(Request $request)
    {
        if ($request->ajax()) {
            $data = BlogDetail::query();
    
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('posts.show');
    }
    
}
