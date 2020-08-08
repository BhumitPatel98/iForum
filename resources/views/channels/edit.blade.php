@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Channel {{ $channel->title }}</div>

                <div class="card-body">
                    
                        <form action="{{ route('channels.update',$channel->id) }}" method="POST">

                            @csrf

                            @method('PUT')

                            <div class="formgroup">
                                <input type="text" name="title" id="title" class="form-control" value="{{ $channel->title }}">
                            </div>
                            
                            <div class="formgroup">
                                <button type="submit" class="btn btn-success my-2">Update Channel</button>
                            </div>

                        </form>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
