@extends('layouts.admin')

@section('content')
    <h1>Media</h1>
    @if ($photos)
      <form action="delete/media" method="post" class="form-inline">
        {{ csrf_field() }}
        {{  method_field('delete') }}
        <div class="form-group">
          <select name="checkBoxArray" id="" class="form-control">
            <option value="">Delete</option>
          </select> 
        </div>
        <div class="form-group">
          <input type="submit" name="delete_all" class="btn-primary">
        </div>      
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
                        
                    @foreach ($photos as $indexKey =>$photo)                    
                      <tr>                     
                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                          <td>{{$photo->id}}</td>    
                          {{-- <td>{{$photo->file}}</td>                     --}}
                          <td><img height="50" src="{{$photo->file}}" alt=""></td>
                          <td>{{$photo->created_at ? $photo->created_at->diffForhumans() : 'no date'}}</td>
                          <td>{{$photo->updated_at ? $photo->created_at->diffForhumans() : 'no date'}}</td>                              
                      </tr>
                    @endforeach          
                  </form>             
          </tbody>
      </table>
      @endif
@endsection

@section('scripts')
<script>
  $(document).ready(function(){


    $('#options').click(function(){


        if(this.checked){

            $('.checkBoxes').each(function(){


                this.checked = true;

            });

        }else {

            $('.checkBoxes').each(function(){


                this.checked = false;

            });



        }






    });



  });

</script>
    
@endsection