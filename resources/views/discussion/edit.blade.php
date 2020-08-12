@extends('layouts.app')

@section('content')

   
            <div class="card">
                <div class="card-header text-center">Edit Discussion</div>

                <div class="card-body">
                  
                    <form action="{{ route('discussion.update',$discussion->id) }}" method="POST">

                        @csrf

                       <div class="form-group">

                            <label for="discussion">Ask a question</label>

                            <textarea name="content" id="content" cols="30" rows="10" class="form-control"> {{ $discussion->content }}</textarea>

                       </div>

                       <div class="form-group">

                            <button type="submit" class="btn btn-success pull-right">Update Discussion</button>

                       </div>

                       
        
                    </form>

                   
                </div>
            </div>
       

@endsection
