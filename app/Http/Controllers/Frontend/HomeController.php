<?php

namespace App\Http\Controllers\Frontend;
use carbon\carbon;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

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

        return view('frontend.page_detail', compact('data'));
    }
    function aboutPage()
    {
        return view('frontend.about');
    }
}
