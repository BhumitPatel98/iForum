@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('channels.create') }}" class='btn btn-info'>Create Channel</a>
            
            
            <div class="card">
                <div class="card-header"> <strong>Channels</strong></div>
               
                <div class="card-body">
                   <table class="table">
                       <thead>

                           <th>
                               Name
                           </th>

                           <th>
                               Edit
                           </th>
                           
                           <th>
                               Delete
                           </th>

                       </thead>

                       <tbody>

                            @foreach ($channels as $channel)

                                <tr>

                                    <td>
                                            {{ $channel->title }}
                                    </td>

                                    <td>
                                        <a href="{{ route('channels.edit',$channel->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>

                                    <td>

                                        <form action="{{ route('channels.destroy',$channel->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                       
                                    </td>

                                </tr>
                                
                            @endforeach
                           
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
