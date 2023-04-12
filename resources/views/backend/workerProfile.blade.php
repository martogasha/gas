@include('backend.header')
<title>Workers - Gas Delivery</title>

<ul class="main-nav">
    <li class="">
        <a href="{{url('admin')}}">Dashboard</a>
    </li>
    <li>
        <a href="{{url('orders')}}">Orders</a>
    </li>
    <li class="active">
        <a href="{{url('workers')}}">Workers</a>
    </li>
    <li>
        <a href="{{url('customers')}}">Customers</a>
    </li>
    <li class="">
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
        <div class="container">

            <div class="card">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                <img src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" class="img-fluid" alt="User Image">
                            </div>
                            <div class="doc-info-cont">
                                <h4 class="doc-name">{{$worker->first_name}} {{$worker->last_name}}</h4>

                            </div>
                        </div>
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    <li><i class="far fa-thumbs-up"></i> {{$worker->phone}}</li>
                                    <li><i class="far fa-comment"></i>{{$worker->idno}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body pt-0">

                    <nav class="user-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="#doc_overview" data-bs-toggle="tab">Order Summary</a>
                            </li>

                        </ul>
                    </nav>


                    <div class="tab-content pt-0">
                        <div class="row">
                            <div class="col-12 col-sm-8 col-md-6 text-end">
                                <div class="bookingrange btn btn-white btn-sm mb-3">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    <span></span>
                                    <i class="fas fa-chevron-down ms-2"></i>
                                </div>
                            </div>
                        </div>

                        <form class="chat-search">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control rounded-pill" placeholder="Search">
                            </div>
                        </form>
                        <br>
                        <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                            <div class="row">
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center mb-0" id="myTable">
                                                <thead>
                                                <tr>
                                                    <th>Customer Name</th>
                                                    <th>Delivery Guy</th>
                                                    <th>Order Amount</th>
                                                    <th>Amount</th>
                                                    <th>Payment Method</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                @if($order->user_id==null)
                                                                    <a href="">None</a>
                                                                @else
                                                                    <a href="">{{$order->user->first_name}} {{$order->user->last_name}} <span>{{$order->user->phone}}</span></a>
                                                                @endif
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                @if($order->worker_id==null)
                                                                    <a href="">None</a>
                                                                @else
                                                                    <a href="">{{$order->worker->first_name}} {{$order->worker->last_name}} <span>{{$order->worker->phone}}</span></a>
                                                                @endif
                                                            </h2>
                                                        </td>
                                                        <td>Ksh {{$order->order_amount}}</td>
                                                        <td>Ksh {{$order->amount}}</td>
                                                        @if($order->payment_method==1)
                                                            <td>Mpesa</td>
                                                        @else
                                                            <td>Cash</td>

                                                        @endif
                                                        <td>{{$order->date}}</td>
                                                        <td class="text-end">
                                                            <div class="table-action">
                                                                <a class="btn btn-sm bg-success-light" href="{{url('oinvoice',$order->id)}}">View</a>

                                                            </div>
                                                        </td>
                                                    </tr>
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

<div class="modal fade call-modal" id="voice_call">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="call-box incoming-box">
                    <div class="call-wrapper">
                        <div class="call-inner">
                            <div class="call-user">
                                <img alt="User Image" src="assets/img/patients/patient.jpg" class="call-avatar">
                                <h4>George Anderson</h4>
                                <span>Connecting...</span>
                            </div>
                            <div class="call-items">
                                <a href="javascript:void(0);" class="btn call-item call-end" data-bs-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
                                <a href="voice-call.html" class="btn call-item call-start"><i class="material-icons">call</i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="modal fade call-modal" id="video_call">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="call-box incoming-box">
                    <div class="call-wrapper">
                        <div class="call-inner">
                            <div class="call-user">
                                <img class="call-avatar" src="assets/img/patients/patient.jpg" alt="User Image">
                                <h4>George Anderson</h4>
                                <span>Calling ...</span>
                            </div>
                            <div class="call-items">
                                <a href="javascript:void(0);" class="btn call-item call-end" data-bs-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
                                <a href="video-call.html" class="btn call-item call-start"><i class="material-icons">videocam</i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


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
<script data-cfasync="false" src="https://doccure-laravel.dreamguystech.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>

<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/feather/feather.min.js')}}"></script>
<script src="{{asset('assets/js/respond.min.js')}}"></script>

<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/libs/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/libs/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('assets/js/pages/fullcalendar.init.js')}}"></script>

<script src="{{asset('assets/libs/theia-sticky-sidebar/dist/ResizeSensor.js')}}"></script>
<script src="{{asset('assets/libs/theia-sticky-sidebar/dist/theia-sticky-sidebar.js')}}"></script>

<script src="{{asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>

<script src="{{asset('assets/libs/fancybox/jquery.fancybox.min.js')}}"></script>

<script src="{{asset('assets/libs/dropzone/dropzone-min.js')}}"></script>
<script src="{{asset('assets/js/pages/dropzone.init.js')}}"></script>

<script src="{{asset('assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>

<script src="{{asset('assets/js/pages/profile-settings.init.js')}}"></script>

<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>

<script src="{{asset('assets/js/slick.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>
</body>

<!-- Mirrored from doccure-laravel.dreamguystech.com/template-cardiology/public/doctor-profile by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 14:55:09 GMT -->
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
