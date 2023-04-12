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
        <a href="{{url('chat')}}">Chats</a>
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
    <li>
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
                                <li class="active">
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
                                <li>
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
                                <li>
                                    <a href="{{url('items')}}">
                                        <i class="fas fa-star"></i>
                                        <span>Items</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
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
                                            <a class="nav-link active" href="#pat_appointments" data-bs-toggle="tab">Todays</a>
                                            <span>14 Nov 2019</span>

                                        </li>
                                    </ul>
                                </nav>


                                <div class="tab-content pt-0">
                                    <form class="chat-search">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            </div>
                                            <input type="text" class="form-control rounded-pill" placeholder="Search">
                                        </div>
                                    </form>
                                    <br>
                                    <div id="pat_appointments" class="tab-pane fade show active">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                        <tr>
                                                            <th>Delivery</th>
                                                            <th>Date/Time</th>
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
                                                                    <a href="doctor-profile.html">Dr. Ruby Perrin</a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span class="d-block text-info">10.00 AM</span></td>
                                                            <td>Ksh 160</td>
                                                                <td><span class="badge rounded-pill bg-success-light">Confirmed</span></td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="#paymentModal" data-bs-toggle="modal" data-bs-target="#paymentModal" class="btn btn-sm bg-primary-light">
                                                                        <i class="fas fa-print"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
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
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
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
