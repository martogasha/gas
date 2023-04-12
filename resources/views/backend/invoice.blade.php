@include('backend.header')
<title>cinvoice - Gas Delivery</title>

<ul class="main-nav">
    <li class="">
        <a href="{{url('admin')}}">Dashboard</a>
    </li>
    <li>
        <a href="{{url('orders')}}">Orders</a>
    </li>
    <li>
        <a href="{{url('workers')}}">Workers</a>
    </li>
    <li class="">
        <a href="{{url('customers')}}">Customers</a>
    </li>
    <li class="">
        <a href="{{url('mpesa')}}">Mpesa</a>
    </li>
    <li class="active">
        <a href="{{url('cash')}}">Cash</a>
    </li>
    <li class="">
        <a href="{{url('items')}}">Items</a>
    </li>

</ul>
@include('backend.logoutab')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                <div class="profile-sidebar">
                    <div class="widget-profile pro-widget-content">
                        <div class="profile-info-widget">
                            <a href="#" class="booking-doc-img">
                                <img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                            </a>
                            <div class="profile-det-info">
                                <h3>Dr. Fred Ortego</h3>
                                <div class="patient-details">
                                    <h5 class="mb-0">BDS, MDS - Oral & Maxillofacial Surgery</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-widget">
                        <nav class="dashboard-menu">
                            <ul>
                                <li>
                                    <a href="{{url('admin')}}">
                                        <i class="fas fa-columns"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('orders')}}">
                                        <i class="fas fa-calendar-check"></i>
                                        <span>Orders</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('workers')}}">
                                        <i class="fas fa-user-injured"></i>
                                        <span>Workers</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('chat')}}">
                                        <i class="fas fa-comments"></i>
                                        <span>Chats</span>
                                        <small class="unread-msg">23</small>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('customers')}}">
                                        <i class="fas fa-file-invoice"></i>
                                        <span>Customers</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('mpesa')}}">
                                        <i class="fas fa-star"></i>
                                        <span>Mpesa</span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="{{url('cash')}}">
                                        <i class="fas fa-star"></i>
                                        <span>Cash</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('items')}}">
                                        <i class="fas fa-star"></i>
                                        <span>Items</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('review')}}">
                                        <i class="fas fa-star"></i>
                                        <span>Reviews</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <div class="card">
                            <div class="card-body pt-0">

                                <nav class="user-tabs mb-4">
                                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#pat_appointments" data-bs-toggle="tab">Maxmillan Ndegwa <span style="color: black;font-size: 18px">Invoice</span></a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-8 offset-lg-2">
                                                <div class="invoice-content">
                                                    <div class="invoice-item">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="invoice-logo">
                                                                    <img src="assets/img/logo.png" alt="logo">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p class="invoice-details">
                                                                    <strong>Order No:</strong> #00124 <br>
                                                                    <strong>Date:</strong> 20/07/2023
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="invoice-item">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="invoice-info">
                                                                    <strong class="customer-text">Payment Method</strong>
                                                                    <p class="invoice-details invoice-details-two">
                                                                        Cash <br>
                                                                        0790268795<br>
                                                                        Ksh 5000<br>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="invoice-item invoice-table-wrap">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="invoice-table table table-bordered">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Description</th>
                                                                            <th class="text-center">Quantity</th>
                                                                            <th class="text-end">Total</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>General Consultation</td>
                                                                            <td class="text-center">1</td>
                                                                            <td class="text-end">Ksh 100</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Video Call Booking</td>
                                                                            <td class="text-center">1</td>
                                                                            <td class="text-end">Ksh 250</td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-xl-4 ms-auto">
                                                                <div class="table-responsive">
                                                                    <table class="invoice-table-two table">
                                                                        <tbody>
                                                                        <tr>
                                                                            <th>Total Amount:</th>
                                                                            <td><span><span>Ksh</span> 50000</span></td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="other-info">
                                                        <h4>Other information</h4>
                                                        <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
<footer class="footer">

    <div class="footer-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">

                    <div class="footer-widget footer-about">
                        <div class="footer-logo">
                            <img src="assets/img/footer-logo.png" alt="logo">
                        </div>
                        <div class="footer-about-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <div class="social-icon">
                                <ul>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">

                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">For Patients</h2>
                        <ul>
                            <li><a href="search.html">Search for Doctors</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="booking.html">Booking</a></li>
                            <li><a href="patient-dashboard.html">Patient Dashboard</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">

                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">For Doctors</h2>
                        <ul>
                            <li><a href="appointments.html">Appointments</a></li>
                            <li><a href="chat.html">Chat</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="doctor-register.html">Register</a></li>
                            <li><a href="doctor-dashboard.html">Doctor Dashboard</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">

                    <div class="footer-widget footer-contact">
                        <h2 class="footer-title">Contact Us</h2>
                        <div class="footer-contact-info">
                            <div class="footer-address">
                                <span><i class="fas fa-map-marker-alt"></i></span>
                                <p> 3556 Beech Street, San Francisco,<br> California, CA 94108 </p>
                            </div>
                            <p>
                                <i class="fas fa-mobile-alt"></i>
                                +1 315 369 5943
                            </p>
                            <p class="mb-0">
                                <i class="fas fa-envelope"></i>
                                <a href="https://doccure-laravel.dreamguystech.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5c38333f3f292e391c39243d312c3039723f3331">[email&#160;protected]</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="footer-bottom">
        <div class="container-fluid">

            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="copyright-text">
                            <p class="mb-0">&copy; 2022 Doccure. All rights reserved.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">

                        <div class="copyright-menu">
                            <ul class="policy-menu">
                                <li><a href="term-condition.html">Terms and Conditions</a></li>
                                <li><a href="privacy-policy.html">Policy</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</footer>
<script data-cfasync="false" src="https://doccure-laravel.dreamguystech.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/libs/jquery/jquery.min.js"></script>

<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/feather/feather.min.js"></script>
<script src="assets/js/respond.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/libs/daterangepicker/daterangepicker.js"></script>

<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/libs/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/js/pages/fullcalendar.init.js"></script>

<script src="assets/libs/theia-sticky-sidebar/dist/ResizeSensor.js"></script>
<script src="assets/libs/theia-sticky-sidebar/dist/theia-sticky-sidebar.js"></script>

<script src="assets/libs/select2/dist/js/select2.min.js"></script>

<script src="assets/libs/fancybox/jquery.fancybox.min.js"></script>

<script src="assets/libs/dropzone/dropzone-min.js"></script>
<script src="assets/js/pages/dropzone.init.js"></script>

<script src="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

<script src="assets/js/pages/profile-settings.init.js"></script>

<script src="assets/js/circle-progress.min.js"></script>

<script src="assets/js/slick.js"></script>

<script src="assets/js/app.js"></script>
</body>

<!-- Mirrored from doccure-laravel.dreamguystech.com/template-cardiology/public/patient-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 14:55:09 GMT -->
</html>
<script>
    $(document).ready(function(){
        // alert(1);
        /*$('.submenu li a').click(function(){
          $(.submenu li a).removeClass("active");
          $(this).addClass("active");
          $('.has-submenu a').removeClass("active");
          $('.has-submenu a').addClass("active");

          //$(this).toggleClass("active");
        });*/
    });
</script>
