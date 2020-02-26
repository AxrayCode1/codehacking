@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>
    <table class="table">
        <thead>
          <tr>
            <th>Photo</th>
            <th>Id</th>
            <th>Owner</th>
            <th>Category</th>            
            <th>Title</th>
            <th>Body</th>
            <th>View</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
            @if ($posts)
                  @foreach ($posts as $post)
                    <tr>
                        <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>                        
                        <td>{{$post->id}}</td>                        
                        <td>{{$post->user ? $post->user->name : 'No Owner'}}</td>                        
                        <td>{{$post->category ? $post->category->name : 'Uncategoried'}}</td>  
                        <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>                                              
                        {{-- <td>{{$post->title}}</td>                         --}}
                        <td>{{str_limit($post->body,30)}}</td> 
                        <td><a href="{{route('home.post',$post->slug)}}">View Post</a></td> 
                        <td><a href="{{route('admin.comments.show',$post->id)}}">View Comments</a></td>
                        <td>{{$post->created_at->diffForhumans()}}</td>
                        <td>{{$post->updated_at->diffForhumans()}}</td>                      
                    </tr>
                  @endforeach          
                
            @endif
          
          
        </tbody>
    </table>
@stop