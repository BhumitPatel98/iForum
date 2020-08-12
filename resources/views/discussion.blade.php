@extends('layouts.app')

@section('content')

   
            <div class="card">
                <div class="card-header text-center">Create a new Discussion</div>

                <div class="card-body">
                    
                    <form action="{{ route('discussion.store') }}" method="post">

                        @csrf

                       <div class="form-group">

                            <label for="title">Title</label>

                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">

                       </div>

                       <div class="form-group">

                            <label for="channel">Pick a channel</label>

                            <select name="channel_id" id="channel_id" class="form-control">

                                @foreach ($channels as $channel)

                                    <option value="{{ $channel->id }}">{{$channel->title }}</option>
                                
                                @endforeach

                            </select>

                       </div>

                       <div class="form-group">

                            <label for="discussion">Ask a question</label>

                            <textarea name="content" id="content" cols="30" rows="10" class="form-control"> {{ old('content') }}</textarea>

                       </div>

                       <div class="form-group">

                            <button type="submit" class="btn btn-success pull-right">Create Discussion</button>

                       </div>

                       
        
                    </form>

                   
                </div>
            </div>
       

@endsection
