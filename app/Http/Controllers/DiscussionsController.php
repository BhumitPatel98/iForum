<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Http\Requests\CreateDiscussionRequest;
use App\User;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Component\VarDumper\Caster\RedisCaster;

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
      

       return view('discussion.show',)->with('discussion',Discussion::where('slug',$slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function reply($id)
    {

    
        Reply::create([

            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'content' => request()->reply

        ]);

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
