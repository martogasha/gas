@include('backend.header')
<title>Mpesa - Gas Delivery</title>

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
    <li class="active">
        <a href="{{url('mpesa')}}">Mpesa</a>
    </li>
    <li class="">
        <a href="{{url('cash')}}">Cash</a>
    </li>
    <li class="">
        <a href="{{url('items')}}">Stock</a>
    </li>
</ul>
@include('backend.logoutab')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">
                    <h4><b style="font-size:20px">From:</b> <span style="color: red">{{\Carbon\Carbon::now()->format('d/m/Y')}}</span> <b style="font-size:20px">To:</b> <span style="color: red">{{\Carbon\Carbon::now()->format('d/m/Y')}}</span></h4>

                    <div class="col-md-12">
                        <div class="card dash-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-4">
                                            <div class="dash-widget dct-border-rht">
                                                <div class="circle-bar circle-bar1">
                                                    <div class="circle-graph1" data-percent="75">
                                                        <img src="assets/img/icon-01.png" class="img-fluid" alt="patient">
                                                    </div>
                                                </div>
                                                <div class="dash-widget-info">
                                                    <h6>Total Mpesa Amount</h6>
                                                    <h3>Ksh {{$total}}</h3>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <div class="row">
                            <div class="col-12 col-sm-8 col-md-6 text-end">
                                <div class="bookingrange btn btn-white btn-sm mb-3">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    <span></span>
                                    <i class="fas fa-chevron-down ms-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body pt-0">

                                <nav class="user-tabs mb-4">
                                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#pat_appointments" data-bs-toggle="tab">Mpesa</a>
                                        </li>
                                    </ul>
                                </nav>


                                <div class="tab-content pt-0">
                                    <form class="chat-search">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            </div>
                                            <input type="text" class="form-control rounded-pill" placeholder="Search" onkeyup="myFunction()" id="myInput">
                                        </div>
                                    </form>
                                    <br>
                                    <div id="pat_appointments" class="tab-pane fade show active">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0" id="myTable">
                                                        <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Customer</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($payments as $payment)
                                                            @if($payment->order_id)
                                                                <tr>
                                                                    <td>{{$payment->order->date}}</td>

                                                                    @if($payment->order->user_id)
                                                                        <td>{{$payment->order->user->first_name}} {{$payment->order->user->last_name}}</td>
                                                                    @else
                                                                        <td>none</td>
                                                                    @endif
                                                                    <td>Ksh {{$payment->order->amount}}</td>
                                                                    <td class="text-end">
                                                                        <div class="table-action">
                                                                            <a href="{{url('oinvoice',$payment->order->id)}}" class="btn btn-sm bg-info-light">
                                                                                <i class="far fa-eye"></i> View Order
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td>{{$payment->date}}</td>

                                                                        <td>none</td>
                                                                    <td>Ksh {{$payment->amount}}</td>

                                                                </tr>
                                                            @endif

                                                        @endforeach


                                                        </tbody>
                                                    </table>
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

    <footer class="footer">

        <div class="footer-bottom">
            <div class="container-fluid">

                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="copyright-text">
                                <p class="mb-0">&copy; 2023 Dolex. All rights reserved.</p>
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
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
