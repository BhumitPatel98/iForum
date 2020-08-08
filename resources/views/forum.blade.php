@extends('layouts.app')

@section('content')

@foreach ($discussions as $discussion)

<div class="container mb-4">
  
  

        <div class="card">
            <div class="card-header">   

                <img width="40px" height="40px" style="border-radius:50px" src=" {{ Gravatar::src($discussion->email) }}" alt=""> &nbsp;&nbsp;&nbsp;

                <span>{{ $discussion->user->name}}, <b>{{ $discussion->created_at->diffForHumans() }}</b></span>
              
                <a href="{{ route('discussion',['slug' => $discussion->slug]) }}" class="btn btn-outline-primary btn-sm float-right" >View</a>
            </div>

            <div class="card-body">

               <h5 class="text-center">
                {{ $discussion->title }}
               </h5>

               <p class="text-center">
                {{ Str::limit($discussion->content,50) }}
               </p>

            </div>

            <div class="card-footer">
                {{ $discussion->replies->count() }} Replies
            </div>
        </div>
        
  
       
</div>
    
@endforeach

<div class="text-center">
    {{ $discussions->links() }}
</div>

@endsection
