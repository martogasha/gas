@include('backend.header')
<title>Orders - Gas Delivery</title>

<ul class="main-nav">
    <li class="">
        <a href="{{url('admin')}}">Dashboard</a>
    </li>
    <li class="active">
        <a href="{{url('orders')}}">Orders</a>
    </li>
    <li class="">
        <a href="{{url('workers')}}">Workers</a>
    </li>
    <li class="">
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
    <div class="row">
        <div class="col-md-7 col-lg-8 col-xl-9">
            <div class="row">
                <h4><b style="font-size:20px">From:</b> <span style="color: red">{{\Carbon\Carbon::now()->format('d/m/Y')}}</span> <b style="font-size:20px">To:</b> <span style="color: red">{{\Carbon\Carbon::now()->format('d/m/Y')}}</span></h4>

                <div class="col-md-12">
                    <div class="card dash-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <div class="dash-widget">
                                        <div class="circle-bar circle-bar3">
                                            <div class="circle-graph3" data-percent="50">
                                                <img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
                                            </div>
                                        </div>
                                        <div class="dash-widget-info">
                                                <h6 style="color: green">MPESA</h6>
                                                <h3>Ksh: {{$totalMpesa}}</h3>
                                            <br>
                                                <h6 style="color: brown">CASH</h6>
                                                <h3>Ksh: {{$totalCash}}</h3>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12 col-lg-4">
                                    <div class="dash-widget">
                                        <div class="circle-bar circle-bar3">
                                            <div class="circle-graph3" data-percent="50">
                                                <img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
                                            </div>
                                        </div>
                                        <div class="dash-widget-info">
                                                <h6>Total Amount</h6>
                                                <h3>Ksh: {{$total}}</h3>
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

    <div class="container-fluid">
        <div class="row">
                             <div class="col-md-7 col-lg-8 col-xl-9">
                            <div class="col-12 col-sm-8 col-md-6 text-end">
                                <div class="bookingrange btn btn-white btn-sm mb-3">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    <span></span>
                                    <i class="fas fa-chevron-down ms-2"></i>
                                </div>
                            </div>
                        <div class="card">
                            <div class="card-body pt-0">

                                <nav class="user-tabs mb-4">
                                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#pat_appointments" data-bs-toggle="tab">Todays</a>
                                            <span>{{\Carbon\Carbon::now()->format('d/m/Y')}}</span>

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#pat_prescriptions" data-bs-toggle="tab">Past Orders</a>
                                        </li>
                                    </ul>
                                </nav>


                                <div class="tab-content pt-0">
                                    <form class="chat-search">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            </div>
                                            <input type="text" class="form-control rounded-pill" id="myInput" onkeyup="myFunction()"  placeholder="Search">
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
                                                            <th>Customer Name</th>
                                                            <th>Delivery Guy</th>
                                                            <th>Bal</th>
                                                            <th>Order Amount</th>
                                                            <th>Amount</th>
                                                            <th>Payment Method</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($orders as $order)
                                                            <tr>
                                                                <td>{{$order->date}}</td>

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
                                                                <td>
                                                                    @if($order->balance<=0)
                                                                        <a href="{{url('oinvoice')}}" style="color: green">{{$order->balance}}</a>
                                                                    @elseif($order->balance>0)
                                                                        <a href="{{url('oinvoice')}}" style="color: red">{{$order->balance}}</a>

                                                                    @endif
                                                                </td>
                                                                <td>Ksh {{$order->order_amount}}</td>
                                                                <td>Ksh {{$order->amount}}</td>
                                                                @if($order->payment_method==1)
                                                                    <td>Mpesa</td>
                                                                @else
                                                                    <td>Cash</td>

                                                                @endif
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

                                    <div class="tab-pane fade" id="pat_prescriptions">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                        <tr>
                                                            <th>Delivery</th>
                                                            <th>Date/Time</th>
                                                            <th>Item</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Ruby Perrin <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span class="d-block text-info">10.00 AM</span></td>
                                                            <td>12 Nov 2019</td>
                                                            <td>Ksh 160</td>
                                                            <td><span class="badge rounded-pill bg-success-light">Confirmed</span></td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="{{url('oinvoice')}}" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Ruby Perrin <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span class="d-block text-info">10.00 AM</span></td>
                                                            <td>12 Nov 2019</td>
                                                            <td>Ksh 160</td>
                                                            <td><span class="badge rounded-pill bg-danger-light">Debt</span></td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="{{url('oinvoice')}}" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="pat_medical_records" class="tab-pane fade">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Date </th>
                                                            <th>Description</th>
                                                            <th>Attachment</th>
                                                            <th>Created</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td><a href="javascript:void(0);">#MR-0010</a></td>
                                                            <td>14 Nov 2019</td>
                                                            <td>Cardiologist Filling</td>
                                                            <td><a href="#">Cardiologist-test.pdf</a></td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Ruby Perrin <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:void(0);">#MR-0009</a></td>
                                                            <td>13 Nov 2019</td>
                                                            <td>Teeth Cleaning</td>
                                                            <td><a href="#">Cardiologist-test.pdf</a></td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Fred Ortego <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:void(0);">#MR-0008</a></td>
                                                            <td>12 Nov 2019</td>
                                                            <td>General Checkup</td>
                                                            <td><a href="#">cardio-test.pdf</a></td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Deborah Angel <span>Cardiology</span></a>
                                                                </h2>
                                                            </td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:void(0);">#MR-0007</a></td>
                                                            <td>11 Nov 2019</td>
                                                            <td>General Test</td>
                                                            <td><a href="#">general-test.pdf</a></td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-04.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Sofia Brient <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:void(0);">#MR-0006</a></td>
                                                            <td>10 Nov 2019</td>
                                                            <td>Eye Test</td>
                                                            <td><a href="#">eye-test.pdf</a></td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Marvin Campbell <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:void(0);">#MR-0005</a></td>
                                                            <td>9 Nov 2019</td>
                                                            <td>Leg Pain</td>
                                                            <td><a href="#">ortho-test.pdf</a></td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-06.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Katharine Berthold <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:void(0);">#MR-0004</a></td>
                                                            <td>8 Nov 2019</td>
                                                            <td>Head pain</td>
                                                            <td><a href="#">neuro-test.pdf</a></td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-07.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Linda Tobin <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:void(0);">#MR-0003</a></td>
                                                            <td>7 Nov 2019</td>
                                                            <td>Skin Alergy</td>
                                                            <td><a href="#">alergy-test.pdf</a></td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-08.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Paul Richard <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:void(0);">#MR-0002</a></td>
                                                            <td>6 Nov 2019</td>
                                                            <td>Cardiologist Removing</td>
                                                            <td><a href="#">Cardiologist-test.pdf</a></td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-09.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. John Gibbs <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:void(0);">#MR-0001</a></td>
                                                            <td>5 Nov 2019</td>
                                                            <td>Cardiologist Filling</td>
                                                            <td><a href="#">Cardiologist-test.pdf</a></td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-10.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Olga Barlow <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="pat_billing" class="tab-pane fade">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                        <tr>
                                                            <th>Invoice No</th>
                                                            <th>Doctor</th>
                                                            <th>Amount</th>
                                                            <th>Paid On</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <a href="invoice-view.html">#INV-0010</a>
                                                            </td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Ruby Perrin <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>$450</td>
                                                            <td>14 Nov 2019</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="invoice-view.html">#INV-0009</a>
                                                            </td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Fred Ortego <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>$300</td>
                                                            <td>13 Nov 2019</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="invoice-view.html">#INV-0008</a>
                                                            </td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Deborah Angel <span>Cardiology</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>$150</td>
                                                            <td>12 Nov 2019</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="invoice-view.html">#INV-0007</a>
                                                            </td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-04.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Sofia Brient <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>$50</td>
                                                            <td>11 Nov 2019</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="invoice-view.html">#INV-0006</a>
                                                            </td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Marvin Campbell <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>$600</td>
                                                            <td>10 Nov 2019</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="invoice-view.html">#INV-0005</a>
                                                            </td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-06.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Katharine Berthold <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>$200</td>
                                                            <td>9 Nov 2019</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="invoice-view.html">#INV-0004</a>
                                                            </td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-07.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Linda Tobin <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>$100</td>
                                                            <td>8 Nov 2019</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="invoice-view.html">#INV-0003</a>
                                                            </td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-08.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Paul Richard <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>$250</td>
                                                            <td>7 Nov 2019</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="invoice-view.html">#INV-0002</a>
                                                            </td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-09.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. John Gibbs <span>Cardiologist</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>$175</td>
                                                            <td>6 Nov 2019</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="invoice-view.html">#INV-0001</a>
                                                            </td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-10.jpg" alt="User Image">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr. Olga Barlow <span>#0010</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>$550</td>
                                                            <td>5 Nov 2019</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Print
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
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
<script data-cfasync="false" src="https://doccure-laravel.dreamguystech.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>

<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/feather/feather.min.js"></script>
<script src="assets/js/respond.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/libs/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/libs/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('assets/js/pages/fullcalendar.init.js')}}"></script>

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
