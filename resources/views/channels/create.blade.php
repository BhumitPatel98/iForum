{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new channel</div>

                <div class="card-body">
                    <form action="{{ route('channels.store') }}" method="POST">

                        @csrf

                        <div class="formgroup">
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        
                        <div class="formgroup">
                            <button type="submit" class="btn btn-success my-2">Save Channel</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($channel)  ? 'Edit Channel' : 'Create a new Channel'}}</div>

                <div class="card-body">
                    <form action="{{ isset($channel) ? route('channels.update',$channel->id) : route('channels.store') }}" method="POST">

                        @csrf

                       @if (isset($channel))
                           @method("PUT")
                       @endif
                        <div class="formgroup">
                            <input type="text" name="title" id="title" class="form-control" value={{ isset($channel) ? $channel->title : "" }}>
                        </div>
                        
                        <div class="formgroup">
                            <button type="submit" class="btn btn-success my-2">{{ isset($channel) ? 'Update Channel' : 'Save Channel'  }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

