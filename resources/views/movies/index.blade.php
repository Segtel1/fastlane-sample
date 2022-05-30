@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row-fluid">

      <div class="card">
        <h5 class="card-header">Manage Volunteers</h5>
        <div class="card-body">

            <form action="{{ route('filter') }}" method="GET">

                <div class="row">
                    <div class="col-md-4 mb-3">
                    <select name="" id="sel-arc" class="form-control" required>
                            <option value="">-- Filter by Archdiocese --</option>
                            @foreach($arch as $ar)
                            <option value="{{$ar->id}}">{{$ar->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                       <select name="diocese" id="sel-dc" class="form-control" required>
                        <option value="">-- Select Diocese --</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                      <input type="submit" value="Filter" class="btn btn-success">
                    </div>
                </div>
 
            </form>

            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Diocese</th>
                    <th scope="col">Country</th>
                    <th scope="col">Controls</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr style="backgroundColor:#fff">
                         <td>{{ $loop->index+1 }}</td>
                        <td>{{$user->lname}}  {{$user->fname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{($user->country)? $user->country : 'empty'}}</td>
                        <td class="justify-content-center"> 
                            <a href={{"users/".$user->id}} class="btn btn-info btn-sm text-light">View</a>
                            <a href={{"users/edit/".$user->id}} class="btn btn-success btn-sm text-light">Edit</a>
                            <!-- <form action="{{url('users/'.$user->id)}}" method="POST" style="display:inline-block">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm text-light" value="Delete">
                            </form> -->
                        </td>
                    </tr>
                @empty
                    <div class="display-3 text-center">No Users Available</div>
                @endforelse
                </tbody>
            </table>
        </div>
       </div>
        
        
    </div>
        {{ $users->links() }}
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type='text/javascript'>
   $(document).ready(function(){

      // Department Change
      $('#sel-arc').change(function(){

         // Department id
         var id = $(this).val();

         // Empty the dropdown
         $('#sel-dc').find('option').not(':first').remove();

         // AJAX request 
         $.ajax({
           url: 'dioceses/'+id,
           type: 'get',
           dataType: 'json',
           success: function(response){
            
             var len = 0;
             if(response != null){
                len = response.length;
             }

             if(len > 0){
                // Read data and create <option >
                for(var i=0; i<len; i++){
                    
                   var id = response[i].id;
                   var name = response[i].name;

                   var option = "<option value='"+id+"'>"+name+"</option>";

                   $("#sel-dc").append(option); 
                }
             }

           }
         });
      });
   });
   </script>