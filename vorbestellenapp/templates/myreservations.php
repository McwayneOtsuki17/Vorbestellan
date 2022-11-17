{% load static %}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Vorbestellen | Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

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
  <!-- Data Table CSS File -->
  <link href="{% static 'css/style-datatable.css' %}" rel="stylesheet">
  <!-- Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <!-- data table scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1s/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
#hidden_alpha {
    display: none;
}
#hidden_bravo {
    display: none;
}
#hidden_charlie {
    display: none;
}
#hidden_delta {
    display: none;
}

#updhidden_alpha {
    display: none;
}
#updhidden_bravo {
    display: none;
}
#updhidden_charlie {
    display: none;
}
#updhidden_delta {
    display: none;
}

table, th, td {
  border: 1px solid black;
  border-radius: 10px;
}
</style>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{% url 'vorbestellenapp:index_view' %}">vor<span
            class="highlight">best</span>ellen<span class="highlight">.</span></a></h1>
      <!-- <h1 class="logo me-auto"><a href="index.html">vorbestellen.</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{% url 'vorbestellenapp:index_view' %}" class="active">Home</a></li>

          <!-- Info Nav -->
          <li class="dropdown"><a href="#"><span>Info</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{% url 'vorbestellenapp:about_view' %}">About Us</a></li>
              <li><a href="{% url 'vorbestellenapp:contact_view' %}">Contact Us</a></li>
            </ul>
          </li>

          <!-- Services Nav -->
          <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Quick Booking</a></li>
              <li class="dropdown"><a href="{% url 'vorbestellenapp:pricing_view' %}" class="#"><span>Prices &
                    Rooms</span></a>
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
  </header><!-- End Header -->

  <main id="main">


    <br><br><br>

    <!-- Data Table End -->


    <!-- Pending Table -->
    <div class="container">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-6">
              <h2>Pending <b>Reservations</b></h2>
            </div>         
          </div>
        </div>
        <!-- Data Table -->
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>
                <span class="custom-checkbox">
                  <input type="checkbox" id="selectAll">
                  <label for="selectAll"></label>
                </span>
              </th>
              <th>Reservation ID</th>
              <th>Reserver</th>
              <th>Time</th>
              <th>Date</th>
              <th>Room Name</th>
              <th>Contact No.</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            {% for reser in reser %}
            <tr>
              <td>
                <span class="custom-checkbox">
                  <input type="checkbox" id="checkbox1" name="options[]" value="1">
                  <label for="checkbox1"></label>
                </span>
              </td>
              <!-- AutoIncremented -->
              <td>{{reser.reservation_id}}</td>
              <td>{{reser.reserver}}</td>
              <td>{{reser.time}}</td>
              <td>{{reser.date}}</td>
              <td>{{reser.room_name_id}}</td>
              <td>{{reser.contact}}</td>
              <td>
                <a href="#" class="delete" data-toggle="modal" data-target="#acceptReservationModal-{{reser.reservation_id}}">Cancel Reservation</a>
              </td>
            </tr>
          </tbody>
    <!-- Accept Modal HTML -->
    <div id="acceptReservationModal-{{reser.reservation_id}}" class="modal fade">
      <form id="acceptForm" method="POST">
        {% csrf_token %}
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><span class="highlight">Cancel</span> Reservation</h4>
            </div>
            <div class="modal-body">
              <!-- add hidden value to find record for deletion -->
              <input type="text" id="acceptroom" name="acceptroom" class="form-control"
                placeholder="auto incremented" value="{{reser.reservation_id}}" readonly hidden required>
              <p>Are you sure you want to cancel your reservation?</p>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" id="btnAcceptReservation" name="btnAcceptReservation" class="btn btn-danger" value="Confirm">
            </div>
      </form>
        </div>
    </div>
    
    </div>
    </div>
    {% endfor %}
    </table>

    <div class="clearfix">
      <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
      <ul class="pagination">
        <li class="page-item disabled"><a href="#">Previous</a></li>
        <li class="page-item"><a href="#" class="page-link">1</a></li>
        <li class="page-item"><a href="#" class="page-link">2</a></li>
        <li class="page-item active"><a href="#" class="page-link">3</a></li>
        <li class="page-item"><a href="#" class="page-link">4</a></li>
        <li class="page-item"><a href="#" class="page-link">5</a></li>
        <li class="page-item"><a href="#" class="page-link">Next</a></li>
      </ul>
    </div>
    </div>
    </div>
    <!-- Pending Table End -->

<!-- Verified Table -->
    <div class="container">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-6">
              <h2>Verified <b>Reservations</b></h2>
            </div>         
          </div>
        </div>
        <!-- Data Table -->
        <h5> Once your reservations are verified, you can no longer cancel them. </h5>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>
                <span class="custom-checkbox">
                  <input type="checkbox" id="selectAll">
                  <label for="selectAll"></label>
                </span>
              </th>
              <th>Reservation ID</th>
              <th>Reserver</th>
              <th>Time</th>
              <th>Date</th>
              <th>Room Name</th>
              <th>Contact No.</th>
            </tr>
          </thead>
          <tbody>
            {% for vreser in vreser %}
            <tr>
              <td>
                <span class="custom-checkbox">
                  <input type="checkbox" id="checkbox1" name="options[]" value="1">
                  <label for="checkbox1"></label>
                </span>
              </td>
              <!-- AutoIncremented -->
              <td>{{vreser.reservation_id}}</td>
              <td>{{vreser.reserver}}</td>
              <td>{{vreser.time}}</td>
              <td>{{vreser.date}}</td>
              <td>{{vreser.room_name_id}}</td>
              <td>{{vreser.contact}}</td>
            </tr>
          </tbody>
    <!-- Undo Modal HTML -->
    <div id="changeReservationModal-{{vreser.reservation_id}}" class="modal fade">
      <form id="acceptForm" method="POST">
        {% csrf_token %}
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><span class="highlight">Undo</span> Verification</h4>
            </div>
            <div class="modal-body">
              <!-- add hidden value to find record for deletion -->
              <input type="text" id="pendingroom" name="pendingroom" class="form-control"
                placeholder="auto incremented" value="{{vreser.reservation_id}}" readonly hidden required>
              <p>Are you sure you want to undo verification?</p>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" id="btnChangeReservation" name="btnChangeReservation" class="btn btn-danger" value="Confirm">
            </div>
      </form>
        </div>
    

    </div>
    
    </div>
    </div>
        <!-- Delete Reservation Modal HTML -->
        <div id="deleteReservationModal-{{vreser.reservation_id}}" class="modal fade">
          <form id="deleteForm" method="POST">
            {% csrf_token %}
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"><span class="highlight">Delete</span> Reservation</h4>
                </div>
                <div class="modal-body">
                  <!-- add hidden value to find record for deletion -->
                  <input type="text" id="tobedelroom" name="tobedelroom" class="form-control"
                    placeholder="auto incremented" value="{{vreser.reservation_id}}" readonly hidden required>
                  <p>Are you sure you want to delete reservation?</p>
                </div>
                <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                  <input type="submit" id="btndeleteReservation" name="btndeleteReservation" class="btn btn-danger" value="Confirm">
                </div>
          </form>
            </div>
    {% endfor %}
    </table>

    <div class="clearfix">
      <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
      <ul class="pagination">
        <li class="page-item disabled"><a href="#">Previous</a></li>
        <li class="page-item"><a href="#" class="page-link">1</a></li>
        <li class="page-item"><a href="#" class="page-link">2</a></li>
        <li class="page-item active"><a href="#" class="page-link">3</a></li>
        <li class="page-item"><a href="#" class="page-link">4</a></li>
        <li class="page-item"><a href="#" class="page-link">5</a></li>
        <li class="page-item"><a href="#" class="page-link">Next</a></li>
      </ul>
    </div>
    </div>
    </div>
    <!-- Pending Table End -->
  
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
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- MODAL -->
  &ensp;
  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn-get-into animate__animated animate__fadeInUp scrollto" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

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
              <input type="password" class="form-control rounded-left" id="password" name="password"
                placeholder="Password">
            </div>
            <div class="form-group">
              <br><br>
              <button type="submit" class="form-control btn btn-danger rounded submit px-3">Login</button>
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
  <script src="{% static 'vendor/bootstrap/js/bootstrap.bundle.min.js' %}"></script>
  <script src="{% static 'vendor/glightbox/js/glightbox.min.js' %}"></script>
  <script src="{% static 'vendor/isotope-layout/isotope.pkgd.min.js' %}"></script>
  <script src="{% static 'vendor/swiper/swiper-bundle.min.js' %}"></script>
  <script src="{% static 'vendor/waypoints/noframework.waypoints.js' %}"></script>
  <script src="{% static 'vendor/php-email-form/validate.js' %}"></script>

  <!-- Template Main JS File -->
  <script src="{% static 'js/main.js' %}"></script>

  <!-- Data Table Script -->
  <script>
    $(document).ready(function () {
      // Activate tooltip
      $('[data-toggle="tooltip"]').tooltip();

      // Select/Deselect checkboxes
      var checkbox = $('table tbody input[type="checkbox"]');
      $("#selectAll").click(function () {
        if (this.checked) {
          checkbox.each(function () {
            this.checked = true;
          });
        } else {
          checkbox.each(function () {
            this.checked = false;
          });
        }
      });
      checkbox.click(function () {
        if (!this.checked) {
          $("#selectAll").prop("checked", false);
        }
      });
    });
  </script>

<script>
  function checkAlpha() {
    document.getElementById("updroom_image").value = "Alpha";
  }
  function checkBravo(){
    document.getElementById("updroom_image").value = "Bravo";
  }
  function checkCharlie(){
    document.getElementById("updroom_image").value = "Charlie";
  }
  function checkDelta(){
    document.getElementById("updroom_image").value = "Delta";
  }
</script>


</body>

</html>