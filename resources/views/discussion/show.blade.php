@extends('layouts.app')

@section('content')

  
    <div class="card border-secondary  mb-4">
        <div class="card-header">   
            <img width="40px" height="40px" style="border-radius:50px" src=" {{ Gravatar::get($discussion->user->email) }} " alt=""> &nbsp;&nbsp;&nbsp;
            <span>{{ $discussion->user->name}} <b>{{ $discussion->created_at->diffForHumans() }} ({{ $discussion->user->points }})</b></span>
           @if ($discussion->is_beign_watched_by_auth_user())

            <a href="{{ route('discussion.unwatch',$discussion->id) }}" class="btn btn-outline-primary btn-sm float-right" >UnWatch</a>
               
           @else

            <a href="{{ route('discussion.watch',$discussion->id) }}" class="btn btn-outline-primary btn-sm float-right" >Watch</a>
               
           @endif

          @if (Auth::id() == $discussion->user->id)

                @if (!$discussion->hasBestAnswer())
                    <a href="{{ route('discussion.edit',['slug' => $discussion->slug]) }}" class="btn btn-outline-info btn-sm float-right" style="margin-right: 8px; ">Edit</a>
                @endif
              
          @endif

           @if($discussion->hasBestAnswer())

                    <span class="btn btn-outline-danger btn-sm float-right " style="margin-right: 8px;">CLOSE</span> 

                @else

                    <span class="btn btn-outline-success btn-sm float-right " style="margin-right: 8px;">OPEN</span> 

                @endif
           
        </div>

        <div class="card-body">

           <h5 class="text-center">
            {{ $discussion->title }}
           </h5>

           <hr>
           <p class="text-center">
            {!! Markdown::convertToHtml($discussion->content) !!}
           </p>

           <hr>
           @if ($best_answer)

           <div class="text-center">
               <h3 class="text-center">Best Answer</h3>
               <div class="card text-white bg-success mb-3">
                   <div class="card-header">
                    <img width="40px" height="40px" style="border-radius:50px" src=" {{ Gravatar::get($discussion->user->email) }}" alt=""> &nbsp;&nbsp;&nbsp;
                    <span>
                        {{ $best_answer->user->name}}  
                        <b>({{ $best_answer->user->points }})</b>
                    </span>
                   </div>
                   <div class="card-body">
                        {!! Markdown::convertToHtml($best_answer->content) !!}  
                   </div>
               </div>
           </div>
               
           @endif

        </div>

        <div class="card-footer">
            <span>
                {{ $discussion->replies->count() }} Replies

                <a href="{{ route('channel',['slug' => $discussion->channel->slug ]) }}" class="btn btn-outline-secondary btn-sm float-right">{{ $discussion->channel->title }}</a>
            </span>
  
        </div>
    </div>

    @foreach ($discussion->replies as $reply)

        <div class="card my-4">
            <div class="card-header">   
                <img width="40px" height="40px" style="border-radius:50px" src=" {{ Gravatar::get($reply->user->email) }} " alt="" > &nbsp;&nbsp;&nbsp;
                <span>
                    {{ $reply->user->name}} 
                    <b>{{ $reply->created_at->diffForHumans() }} ({{ $reply->user->points }})</b>
                </span>
                
                @if (!$best_answer)
                    @if (Auth::id() == $discussion->user->id)
                        <a href="{{ route('discussion.best.answer', $reply->id) }}" class="btn btn-sm btn-info float-right" >Mark as Best Answer</a>
                    @endif
                @endif

                @if (Auth::id() == $reply->user->id)

                        @if (!$reply->best_answer)

                                <a href="{{ route('reply.edit', $reply->id) }}" class="btn btn-sm btn-info float-right" style="margin-right: 8px;">Edit</a>
                            
                        @endif
                        
                @endif

                
            </div>

            <div class="card-body">

            <p class="text-center">
                {!! Markdown::convertToHtml($reply->content) !!}
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

            @if (Auth::check())


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
                
            @else

                <div class="text-center">
                    Singin to leave a reply...
                </div>
                
            @endif
    
        </div>

    </div>
     

@endsection
