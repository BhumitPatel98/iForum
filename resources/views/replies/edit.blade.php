@extends('layouts.app')

@section('content')

   
            <div class="card">
                <div class="card-header text-center">Edit Reply</div>

                <div class="card-body">
                  
                    <form action="{{ route('reply.update',$reply->id) }}" method="POST">

                        @csrf

                       <div class="form-group">

                            <label for="discussion">Answer the question</label>

                            <textarea name="content" id="content" cols="30" rows="10" class="form-control"> {{ $reply->content }}</textarea>

                       </div>

                       <div class="form-group">

                            <button type="submit" class="btn btn-success pull-right">Update Reply</button>

                       </div>

                       
        
                    </form>

                   
                </div>
            </div>
       

@endsection
