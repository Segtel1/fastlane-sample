<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel</title>

    {{-- FontAwesome 5 kit --}}
    <script src="https://kit.fontawesome.com/85acf21687.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet"> -->

    <!-- <style>
        .wrapper {
                display: flex;
                width: 100%;
                /* align-items: stretch; */
            }

    </style> -->
</head>
<body>
    <div id="app">
        @include('layouts.adminNavbar')
        <div class="mb-5" id="content">
    <div class="container">
            <h3 class="text-center">Add New Movie</h3>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <h4 class="text-success" id="success"></h4>
                <form method="POST" action="/movies/store" id="createForm">
                    @csrf
                    <div class="form-group">
                        <label for="full_name">Movie Title</label>
                        <input type="text" name="title" class="form-control @error('name') is-invalid @enderror" id="title" required>
                        @error('name')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group" id="dynamicAddRemove">
                        <label for="birth_date">Set Showtime</label>
                        <input type="datetime-local" name="showtime[0]" class="form-control showtime" required> <br>
                        <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Showtime</button>
                    </div>

                    <div class="form-group">
                        <label for="permissionSelect">Branch</label>
                        <select class="form-control" name="branch" id="branch" required>
                            <option value="">-- Select Cinema Branch --</option>
                         
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Create</button>
                </form>
             
            </div>
        </div>
    </div>
    </div>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
     
        ++i;
        $("#dynamicAddRemove").append('<div class="input-group mb-3 carrier"><input type="datetime-local" class="form-control showtime" name="showtime[' + i +']"><div class="input-group-append"><button class="btn btn-outline-danger  remove-input-field" type="button">Remove</button></div>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('.carrier').remove();
    });

    $.ajax({
           url: '/movies/branches',
           type: 'get',
           dataType: 'json',
           success: function(response){
            
             var len = 0;
             if(response != null){
                len = response[0].length;
             }

             if(len > 0){
                // Read data and create <option >
                for(var i=0; i<len; i++){
                    
                   var id = response[0][i].id;
                   var name = response[0][i].name;

                   var option = "<option value='"+id+"'>"+name+"</option>";

                   $("#branch").append(option); 
                }
             }

           }
         });

    $('#createForm').on('submit',function(e){
        e.preventDefault();
       
        let title = $('#title').val();

        let showtime = [];

        $('.showtime').each(function(){
             showtime.push($(this).val());
          });
        
        let branch= $('#branch').val();

        console.log(showtime)
    
        $.ajax({
          url: "/movies/store",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            title:title,
            showtime:showtime,
            branch:branch,
          },
          success:function(response){
            console.log(response);
            if (response) {
              $('#success').text(response.success); 
              $("#createForm")[0].reset(); 
            }
          },
          error: function(response) {
             console.log('An error occurred')
           }
         });
        });
</script>