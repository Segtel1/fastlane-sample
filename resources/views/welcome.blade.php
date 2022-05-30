<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Fastlane Cinema</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/styles.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Green - v4.7.0
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Fastlane</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{ route ('login')}}"> Login</a></li>
   
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to </h2>
              <p class="animate__animated animate__fadeInUp">Fastlane Cinema</p>
              <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
            </div>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
  <!-- End Featured Services Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2> Upcoming Movies and Showtime</h2>
 
        </div>

        <div class="row">

          <div class="col-lg-9 pt-4 pt-lg-0 order-2 order-lg-1 content mx-auto">
    
              <div class= "table-responsive">
                <table class="table table-condensed table-bordered">
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
    </section><!-- End About Us Section -->

  

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js ')}}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js ')}}"></script>
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js ')}}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js ')}}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js ')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js')}}"></script>

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

              console.log(response)

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

</body>

</html>