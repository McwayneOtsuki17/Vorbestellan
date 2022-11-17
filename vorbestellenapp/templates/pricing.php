{% load static %}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Vorbestellen | Pricing</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{% static 'vendor/animate.css/animate.min.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/bootstrap/css/bootstrap.min.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/bootstrap-icons/bootstrap-icons.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/boxicons/css/boxicons.min.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/glightbox/css/glightbox.min.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/remixicon/remixicon.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/swiper/swiper-bundle.min.css' %}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{% static 'css/style.css' %}" rel="stylesheet">
  
  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{% url 'vorbestellenapp:index_view' %}">vor<span class="highlight">best</span>ellen<span class="highlight">.</span></a></h1>
      <!-- <h1 class="logo me-auto"><a href="index.html">vorbestellen.</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{% url 'vorbestellenapp:index_view' %}">Home</a></li>

          <li class="dropdown"><a href="#"><span>Info</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{% url 'vorbestellenapp:about_view' %}">About Us</a></li>
              <!-- <li><a href="team.html">Team</a></li> -->
              <li><a href="{% url 'vorbestellenapp:contact_view' %}">Contact</a></li>
              <!-- <li><a href="testimonials.html">Testimonials</a></li> -->

              <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> -->
            </ul>
          </li>
          <!-- Services Nav -->
          <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{% url 'vorbestellenapp:vacantrooms_view' %}">Dashboard</a></li>
              <li class="dropdown"><a href="{% url 'vorbestellenapp:pricing_view' %}" class="#"><span>Prices & Rooms</span></a>
              </li>
            </ul>
          </li>
        
          <!-- If admin kay lahi ang dropdown sa service -->
          {% if current_user == 'admin' %}
            <li class="dropdown"><a href="#"><span>Manage</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{% url 'vorbestellenapp:rooms_view' %}">Manage Rooms</a></li>
                <li><a href="{% url 'vorbestellenapp:managebookings_view' %}">Manage Bookings</a></li>
                <li><a href="{% url 'vorbestellenapp:manageusers_view' %}">Manage User</a></li>     
                </li>
              </ul>
            </li>
          {% endif %}
          <!-- end -->

        {% if current_user %}
        <li class="dropdown"><a href="#"><span>{{current_user}}</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          {% if current_user != 'admin' %}
            <li><a href="{% url 'vorbestellenapp:myreservations_view' %}">My Reservations</a></li>
            <li><a href="{% url 'vorbestellenapp:account_view' %}">Account Settings</a></li>
          {% endif %}
          <li><a href="{% url 'vorbestellenapp:logout' %}">Logout</a></li>
        </ul>
        
        {% else %}
        <li><a href="#" class="getstarted" data-toggle="modal" data-target="#exampleModalCenter">Login</a></li>
        </ul>
        {% endif %}
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
    
    <!-- Error Message (when incorrect login) -->
    {% for message in messages %}
    <div id="errorDiv"style="margin: auto; width: 300px; border-radius: 5px; position: absolute;
              background-color: white; z-index: 1; transform: translate(158%, 128%);">
    <p class="{{ message.tags }}" 
      style="color: rgb(201, 44, 44); font-weight: bold; text-align: center;
            font-family: Raleway; margin-top: 10px; padding: 5px;">
      {% if 'login' in message.tags %}
        {{ message }}
      {% else %}
        {{ message }}
      {% endif %}
      </p></div>
    {% endfor %}
    <script type="text/javascript">
        var opacity=0;
        var intervalID=0;
        window.onload=fadeout;
        function fadeout(){
              setInterval(hide, 800);
        }
        function hide(){
          var body=document.getElementById("errorDiv");
          opacity =
          Number(window.getComputedStyle(body).getPropertyValue("opacity"))
          if(opacity>0){
                opacity=opacity-0.1;
                        body.style.opacity=opacity
          }
          else{
              clearInterval(intervalID); 
          }
        } 
    </script>
    <!-- End of Error Message -->

  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Room Pricing</h2>
          <ol>
            <li><a href="{% url 'vorbestellenapp:index_view' %}">Home</a></li>
            <li>Pricing</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">
        <form id="form1" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
          {% csrf_token %}
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="box featured">
              <h3>Alpha</h3>
              <h4><sup>Php</sup>150<span> / slot</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <!-- Check if user is logged in, or else be asked to login first before proceeding -->
                {% if current_user %}
                <button type="submit" id="btnAlpha" name="btnAlpha" class="btn-buy">Book Now</button>
                {% else %}
                <a href="#" class="btn-buy" data-toggle="modal" data-target="#exampleModalCenter">Book Now</a>
                {% endif %}
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <div class="box">
              <span class="advanced">Best Offer</span>
              <h3>Bravo</h3>
              <h4><sup>Php</sup>250<span> / slot</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <!-- Check if user is logged in, or else be asked to login first before proceeding -->
                {% if current_user %}
                <button type="submit" id="btnAlpha" name="btnBravo" class="btn-buy">Book Now</button>
                {% else %}
                <a href="#" class="btn-buy" data-toggle="modal" data-target="#exampleModalCenter">Book Now</a>
                {% endif %}
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box featured">
              <h3>Charlie</h3>
              <h4><sup>Php</sup>350<span> / slot</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <!-- Check if user is logged in, or else be asked to login first before proceeding -->
                {% if current_user %}
                <button type="submit" id="btnAlpha" name="btnCharlie" class="btn-buy">Book Now</button>
                {% else %}
                <a href="#" class="btn-buy" data-toggle="modal" data-target="#exampleModalCenter">Book Now</a>
                {% endif %}
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box featured">
              
              <h3>Delta</h3>
              <h4><sup>Php</sup>450<span> / slot</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li class="na">Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <!-- Check if user is logged in, or else be asked to login first before proceeding -->
                {% if current_user %}
                <button type="submit" id="btnAlpha" name="btnDelta" class="btn-buy">Book Now</button>
                {% else %}
                <a href="#" class="btn-buy" data-toggle="modal" data-target="#exampleModalCenter">Book Now</a>
                {% endif %}
              </div>
            </div>
          </div>
        </form>
        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>

        <div class="row faq-item d-flex align-items-stretch">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Non consectetur a erat nam at lectus urna duis?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Aperiam itaque sit optio et deleniti eos nihil quidem cumque. Voluptas dolorum accusantium sunt sit enim. Provident consequuntur quam aut reiciendis qui rerum dolorem sit odio. Repellat assumenda soluta sunt pariatur error doloribus fuga.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Vorbestellen</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Info</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Conference Rooms</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Reservations</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Project Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Vorbestellen</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- MODAL -->
&ensp;
<!-- Button trigger modal -->
<!-- <button type="button" class="btn-get-into animate__animated animate__fadeInUp scrollto" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <!-- <div class="modal-header">
    <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true" class="ion-ios-close"></span>
    </button>
    </div> -->
    <div class="modal-body p-4 p-md-5">
    <div class="icon d-flex align-items-center justify-content-center">
    <span class="ion-ios-person"></span>
    </div>
    <h3 class="text-center mb-4">Sign In</h3>
    <form id="form1" action="" method="POST" autocomplete="off" enctype="multipart/form-data" class="login-form">
      {% csrf_token %}
        <div class="form-group">
        <input type="text" class="form-control rounded-left" id="username" name="username" placeholder="Username">
        </div>
      <br>
        <div class="form-group d-flex">
        <input type="password" class="form-control rounded-left" id="password" name="password" placeholder="Password">
        </div>
      <div class="form-group">
        <br><br>
        <button type="submit" id="btnLogin" name="btnLogin" class="form-control btn btn-danger rounded submit px-3">Login</button>
        <!-- <button type="submit" class="btn-get-started animate__animated animate__fadeInUp scrollto">Login</button> -->
      </div>
      <br>

        <div class="form-group d-md-flex">
            <div class="form-check w-50">
              <label class="custom-control fill-checkbox">
                <input type="checkbox" class="fill-control-input">
                <span class="fill-control-indicator"></span>
                <span class="fill-control-description">Remember Me</span>
              </label>
            </div>
              <div class="w-50 text-md-right">
              <a href="#">Forgot Password</a>
        </div>
      </div>
    </form>
  </div>

  <div class="modal-footer justify-content-center">
      <p>Not a member? <a href="{% url 'vorbestellenapp:signup_view' %}">Create an account</a></p>
</div>
</div>
</div>

</div>

<script>
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>

<!-- END MODAL -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>