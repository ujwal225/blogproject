<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Comment;
use carbon\carbon;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function homePage()
    {
        //use 'disc' in order by for descrete order
        $data['posts'] = Post::where('status',1)->orderBy('created_at')->get();

        $dateInWords = [];
        foreach ($data['posts'] as $post) {
            $carbonDate = Carbon::parse($post->created_at);
            $dateInWords[] = $carbonDate->format('l jS F Y \a\t h:i A');
        }
        return view('frontend.home',['dateInWords' => $dateInWords], compact('data'));
    }
    function postDetail($slug)
    {
        $data['post'] = Post::where('slug', $slug)->first();
        $data['comment'] = Comment::where('post_id', $data['post']->id)->get();
        return view('frontend.post_detail', compact('data'));
    }
    function aboutPage()
    {
        return view('frontend.about');
    }

    function contactPage()
    {
        return view('frontend.contact');
    }

    function storeComment(request $request, $id)
    {
        $request->request->add(['post_id' => $id]);
        $record = Comment::create($request->all());

        return redirect()->route('frontend.post_detail', ['slug' => Post::find($id)->slug] );

    }
}
