@extends('layouts.admin')
@section('content')
    <h1>Categories</h1>
    <div class="col-sm-6">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store','files'=>true]) !!}    
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <table class="table">
            <thead>
              <tr>               
                <th>Id</th>                
                <th>Category</th>   
                <th>Created</th>
                <th>Updated</th>                         
              </tr>
            </thead>
            <tbody>
                @if ($categories)
                      @foreach ($categories as $category)
                        <tr>                            
                            <td>{{$category->id}}</td>                        
                            <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td> 
                            <td>{{$category->created_at ? $category->created_at->diffForhumans() : 'no date'}}</td>
                            <td>{{$category->updated_at ? $category->created_at->diffForhumans() : 'no date'}}</td>                                                                    
                        </tr>
                      @endforeach          
                    
                @endif
              
              
            </tbody>
        </table>
    </div>
@stop