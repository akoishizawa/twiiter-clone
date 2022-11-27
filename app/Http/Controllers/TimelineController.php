<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TimelineRequest;
use App\Tweet;
use Carbon\Carbon;

class TimelineController extends Controller
{
    public function showTimelinePage(Request $request, Response $response)
    {
        if($request->has('sort')){
            $tweets = Tweet::orderBy($request->sort, 'asc')->simplePaginate(10);
        }else{
            $tweets = Tweet::orderBy('created_at', 'desc')->simplePaginate(10);
        }
        if(!empty(Auth::user()->id)){
            $request->session()->put('user_id',Auth::user()->id);
        }
        return view('timeline', [
            'user' => Auth::user(),
            'tweets' => $tweets,
            'sort' => $request->sort,
        ]);
    }
    public function postTweet(TimelineRequest $request, Response $response)
    {
        $image_url = null;
        if(!empty($request['image_url'])){
            $filename = $request->image_url->getClientOriginalName();
            $image_url = $request->image_url->storeAs('',$filename,'public');
        }
        
        $tweet = new Tweet;
        $input = $request->all();
        
        $tweet->fill($input);
        $tweet->user_id = $request->session()->get('user_id');
        $tweet->image_url = $image_url;
        $tweet->created_user = Auth::user()->name;
        $tweet->update_user = Auth::user()->name;

        $tweet->save();
        return back();
    }
}
