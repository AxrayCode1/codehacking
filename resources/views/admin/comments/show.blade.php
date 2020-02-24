@extends('layouts.admin')

@section('content')         
    @if (count($comments) > 0)
        <h1>Comments</h1>   
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                {{-- <th>Photo</th> --}}
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Status</th>
                <th>Created</th>
                <th>Action</th>
                {{-- <th>Updated</th> --}}
            </tr>
            </thead>
            <tbody>            
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>                        
                            {{-- <td><img height="50" src="{{$comment->photo ? $comment->photo->file : 'http://placehold.it/400x400'}}" alt=""></td> --}}
                            <td>{{$comment->author}}</a></td>
                            <td>{{$comment->email}}</td>
                            <td>{{$comment->body}}</td>
                            <td>{{$comment->is_active == 1 ? 'Active' : 'No Active'}}</td>
                            <td>{{$comment->created_at->diffForhumans()}}</td>
                            {{-- <td>{{$comment->updated_at->diffForhumans()}}</td> --}}
                            <td><a href="{{route('home.post',$comment->post_id)}}">View Post</a></td>
                            <td>
                                @if ($comment->is_active == 1)
                                    {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id],'files'=>true]) !!}                    
                                        <input type="hidden" name="is_active" value="0">                                        
                                    
                                        <div class="form-group">
                                            {!! Form::submit('Un-approve Comment', ['class'=>'btn btn-success']) !!}
                                        </div>
                                    {!! Form::close() !!}
                                @else
                                    {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id],'files'=>true]) !!}                    
                                        <input type="hidden" name="is_active" value="1">                                        
                                    
                                        <div class="form-group">
                                            {!! Form::submit('Approve Comment', ['class'=>'btn btn-info']) !!}
                                        </div>
                                    {!! Form::close() !!}
                                @endif
                            </td>
                            <td>                                
                                {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy',$comment->id],'files'=>true]) !!}                    
                                    <input type="hidden" name="is_active" value="0">                                        
                                
                                    <div class="form-group">
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                    </div>
                                {!! Form::close() !!}                                
                            </td>
                        </tr>
                    @endforeach                                                
            </tbody>
        </table>
    @else
        <h1 class="text-center">No Comments</h1>
    @endif
@endsection


