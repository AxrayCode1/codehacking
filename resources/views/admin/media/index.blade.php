@extends('layouts.admin')

@section('content')
    <h1>Media</h1>
    <table class="table">
        <thead>
          <tr>               
            <th>Id</th>                
            <th>Name</th> 
            {{-- <th>Image</th>   --}}
            <th>Created</th>
            <th>Updated</th>                         
          </tr>
        </thead>
        <tbody>
            @if ($photos)
                  @foreach ($photos as $photo)
                    <tr>                            
                        <td>{{$photo->id}}</td>    
                        {{-- <td>{{$photo->file}}</td>                     --}}
                        <td><img height="50" src="{{$photo->file}}" alt=""></td>
                        <td>{{$photo->created_at ? $photo->created_at->diffForhumans() : 'no date'}}</td>
                        <td>{{$photo->updated_at ? $photo->created_at->diffForhumans() : 'no date'}}</td>                                                                    
                    </tr>
                  @endforeach          
                
            @endif
          
          
        </tbody>
    </table>
@endsection