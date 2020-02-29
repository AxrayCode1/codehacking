@extends('layouts.admin')

@section('content')
    <h1>Media</h1>
    <table class="table">
        <thead>
          <tr>          
            <th><input type="checkbox" id="options"></th>     
            <th>Id</th>                
            <th>Name</th> 
            {{-- <th>Image</th>   --}}
            <th>Created</th>
            <th>Updated</th>                         
          </tr>
        </thead>
        <tbody>
            @if ($photos)
                <form action="/delete/media" method="POST" class="form-inline">
                  {{ csrf_field() }}
                  {{  method_field('delete') }}
                  <div class="form-group">
                    <select name="checkBoxArray" id="" class="form-control">
                      <option value="delete">Delete</option>
                    </select> 
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn-primary">
                  </div>                  
                  @foreach ($photos as $indexKey =>$photo)                    
                    <tr>                     
                      <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                        <td>{{$photo->id}}</td>    
                        {{-- <td>{{$photo->file}}</td>                     --}}
                        <td><img height="50" src="{{$photo->file}}" alt=""></td>
                        <td>{{$photo->created_at ? $photo->created_at->diffForhumans() : 'no date'}}</td>
                        <td>{{$photo->updated_at ? $photo->created_at->diffForhumans() : 'no date'}}</td>    
                        <td>
                          {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy',$photo->id]]) !!}            
                            {{ csrf_field() }}        
                            <div class="form-group">
                              {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>
                          {!! Form::close() !!}
                        </td>                                                                
                    </tr>
                  @endforeach          
                </form>
            @endif
          
          
        </tbody>
    </table>
@endsection