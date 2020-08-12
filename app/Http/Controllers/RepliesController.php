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

    public function best_reply($id)
    {
        // dd($id);
        $reply = Reply::find($id);

        $reply->best_answer = 1;

        $reply->save();

        $reply->user->points += 100;
        $reply->user->save();

        Session()->flash('success','Reply has been marked as Best Answer');

        return redirect()->back();
    }

    public function edit($id)
    {
        return view('replies.edit',['reply'=> Reply::find($id)]);
    }

    public function update($id)
    {
         $reply = Reply::find($id);

         $reply->content = request()->content;

         $reply->save();

         Session()->flash('success','Reply Updated');

        return redirect(route('discussion',['slug'=>$reply->discussion->slug]));


    }

}
