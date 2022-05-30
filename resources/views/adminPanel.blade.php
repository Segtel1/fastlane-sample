@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row-fluid">

      <div class="card">
        <h5 class="card-header">Manage Movies</h5>
        <div class="card-body">

 

            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Movie Title</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Showtime</th>
                    </tr>
                </thead>
                <tbody id="list">
  
                </tbody>
            </table>
        </div>
       </div>
        
        
    </div>
    
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type='text/javascript'>
   $(document).ready(function(){


         // AJAX request 
         $.ajax({
           url: '/movies/list',
           type: 'get',
           dataType: 'json',
           success: function(response){
            
             var len = 0;
             if(response != null){
                len = response.length;
             }

             if(len > 0){

              var jsonData=Object.entries(response[0]);

              console.log(jsonData)

                  var tableBody="";

                  for(var i=0; i < jsonData.length; i++){
                      tableBody+='<tr><td>';
                      tableBody+=i+1;
                      tableBody+='</td><td>';
                      tableBody+=jsonData[i][1].title;
                      tableBody+='</td><td>';
                      tableBody+=jsonData[i][1].cinema_branches.name;
                      tableBody+='</td><td>';
                      tableBody+=JSON.parse(jsonData[i][1].showtime);
                      tableBody+='</td></tr>';
                  };

                  $("#list").append(tableBody); 

             }

           }
         });
   });
   </script>