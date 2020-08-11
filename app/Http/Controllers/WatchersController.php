<?php

namespace App\Http\Controllers;

use App\Watcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchersController extends Controller
{
    public function watch($id)
    {

        Watcher::create([

            'user_id' => Auth::id(),
            'discussion_id' => $id,
    
        ]);


        Session()->flash('success','You are watching this discussion ');

        return redirect()->back();
    }

    public function unwatch($id)
    {
       
        
        $watcher = Watcher::where('user_id', Auth::id())->where('discussion_id',$id);


        $watcher->delete();

        Session()->flash('error','You are no longer watching this discussion ');

        return redirect()->back();

    }

}
