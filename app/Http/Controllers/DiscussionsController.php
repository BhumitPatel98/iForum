<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Http\Requests\CreateDiscussionRequest;
use App\Notifications\NewReplyAdded;
use App\User;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Symfony\Component\VarDumper\Caster\RedisCaster;
use Symfony\Component\VarDumper\Server\DumpServer;

class DiscussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request,User $user)
    {
     
    
        //dd($request->toArray());
           // dd(Auth::id());
        $discussion = Discussion::create([

            'title' =>$request->title,
            'channel_id' => $request->channel_id,
            'content' => $request->content,
            'user_id' => Auth::id(),
            'slug' => Str::slug($request->title)

        ]);

        Session()->flash('success','Discussion succesully added');

        //return redirect()->back();

       return redirect(route('discussion',['slug' => $discussion->slug]));
      // return view('discussion.show');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $discussion = Discussion::where('slug',$slug)->first();

      $best_answer = $discussion->replies()->where('best_answer',1)->first();
        // dd($best_answer);
       return view('discussion.show',)
                        ->with('discussion',$discussion)
                        ->with('best_answer',$best_answer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        return view('discussion.edit',['discussion' => Discussion::where('slug',$slug)->first()]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
        $discussion = Discussion::find($id);
        $discussion->content = request()->content;

        $discussion->save();

        Session()->flash('success','Discussion Updated');

        return redirect(route('discussion',['slug' =>$discussion->slug]));
    }

    public function reply($id)
    {

        $reply = Reply::create([

            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'content' => request()->reply

        ]);

        $reply->user->points += 25;
        $reply->user->save();

        $watchers = array();

        $discussion = Discussion::find($id);

        foreach($discussion->watchers as $watcher):

            array_push($watchers,User::find($watcher->user_id));

        endforeach;

        //dd($watchers);

        Notification::send($watchers, new \App\Notifications\NewReplyAdded($discussion));
        

        Session()->flash('success','Replied to Discussion');

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
