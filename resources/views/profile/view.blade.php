@extends('layouts.userLayout')

@section('content')
<div class="container">
    <a class="btn btn-secondary" href="/home">Go Back</a>
    <h3 class="text-center">{{$user->name}}</h3>
    <div class="row-fluid">
       
      <div class="card">
            <h5 class="card-header">View Profile</h5>
            <div class="card-body">
              <!-- <div class=" col-md-9 mt-3 user-info"> -->
                    <div class="text-center mb-4">
                        <img class="profile_image text-center" src="{{($user->image == NULL) ? '/img/no-photo.png' : '/storage/' . $user->image }}" alt="image">
                    </div>

                    <div class="row">

                       <div class="col-md-4">
                            <p><strong>Fullname: </strong> {{$user->lname}} {{$user->fname}}</p> 
                            <p><strong>Phone: </strong> {{$user->phoneno}}</p> 
                            <p><strong>Email: </strong> {{$user->email}}</p> 
                            <p><strong>Address: </strong> {{$user->address}}</p>
                            <p><strong>State: </strong> {{$user->state}}</p>  
                            <p><strong>Nationality: </strong> {{$user->country}}</p> 
                       </div> 

                       <div class="col-md-4">
                            <p><strong>Gender: </strong> {{$user->gender}}</p> 
                            <p><strong>Marital Status: </strong> {{$user->marital_status}}</p> 
                            <p><strong>Occupation: </strong> {{$user->email}}</p> 
                            <p><strong>Parish: </strong> {{$user->parish}}</p>
                            <p><strong>Diocese: </strong> {{$user->diocese}}</p>  
                            <p><strong>Age bracket: </strong> {{$user->age_bracket}}</p> 
                       </div>

                       <div class="col-md-4">
                            <p><strong>Medical Details: </strong> {{$user->medical_details}}</p> 
                            <p><strong>Youth group/position: </strong> {{$user->position}}</p> 
                            <p><strong>Have you attended any celebration?: </strong> {{$user->attend}}</p> 
                            <p><strong>Have you volunteered in any celebration: </strong> {{$user->volunteer}}</p>
                            <p><strong>What area of service do you think you can function?: </strong> {{$user->service_area}}</p>  
                            <p><strong>Nationality: </strong> {{$user->country}}</p> 
                       </div>

                    </div>

                <!-- </div> -->
            </div>
       </div>
    </div>
</div>
@endsection