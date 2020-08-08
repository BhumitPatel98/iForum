@extends('layouts.app')

@section('content')
<div class="container">
  
    <div class="card mb-4">
        <div class="card-header">   
            <img width="40px" height="40px" style="border-radius:50px" src=" {{ Gravatar::src($discussion->email) }}" alt=""> &nbsp;&nbsp;&nbsp;
            <span>{{ $discussion->user->name}} <b>{{ $discussion->created_at->diffForHumans() }}</b></span>
           
        </div>

        <div class="card-body">

           <h5 class="text-center">
            {{ $discussion->title }}
           </h5>

           <hr>
           <p class="text-center">
            {{ $discussion->content }}
           </p>

        </div>

        <div class="card-footer">
            {{ $discussion->replies->count() }} Replies
        </div>
    </div>

    @foreach ($discussion->replies as $reply)

        <div class="card my-4">
            <div class="card-header">   
                <img width="40px" height="40px" style="border-radius:50px" src=" {{ Gravatar::src($discussion->email) }}" alt="" > &nbsp;&nbsp;&nbsp;
                <span>{{ $reply->user->name}} <b>{{ $reply->created_at->diffForHumans() }}</b></span>
              
            </div>

            <div class="card-body">

            <p class="text-center">
                {{ $reply->content }}
            </p>

            </div>

            <div class="card-footer">
               
                @if ($reply->is_liked_by_auth_user())

                    <a href="{{ route('reply.unlike',$reply->id) }}" class="btn btn-outline-danger btn-sm">Unlike <span class="badge">{{ $reply->likes->count() }}</a>
                    
                @else

                    <a href="{{ route('reply.like',$reply->id) }}" class="btn btn-outline-success btn-sm">Like <span class="badge">{{ $reply->likes->count() }}</span></a>
                    
                @endif
            </div>
        </div>
        
    @endforeach

    <div class="card my-4">

        <div class="card-body">


            <form action="{{ route('discussion.reply', $discussion->id ) }}" method="post">
    
                @csrf
    
                <div class="form-group">
    
                    <label for="reply">Leave a reply...</label>
    
                    <textarea name="reply" id="reply" cols="30" rows="10" class="form-control"></textarea>
    
                </div>
    
                <div class="form-group">
    
                    <button type="submit" class="btn btn-success">Leave a reply</button>
    
                </div>
    
            </form>
    
        </div>

    </div>
     
</div>
@endsection
