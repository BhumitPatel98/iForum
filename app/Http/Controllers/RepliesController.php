<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    public function like($id)
    {
        //dd($id);

        Like::create([
            'user_id' => Auth::id(),
            'reply_id' => $id
        ]);

        Session()->flash('success','You are liked reply');

        return redirect()->back();
    }

    public function unlike($id)
    {
        $unlike = Like::where('reply_id',$id)->where('user_id',Auth::id());

        $unlike->delete();

        Session()->flash('error','Yor are unliked reply');

        return redirect()->back();

    }
}
