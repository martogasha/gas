@include('backend.header')
<title>Admin Dashboard - Gas Delivery</title>

<ul class="main-nav">
    <li class="">
        <a href="{{url('admin')}}">Dashboard</a>
    </li>
    <li class="">
        <a href="{{url('orders')}}">Orders</a>
    </li>
    <li class="">
        <a href="{{url('workers')}}">Workers</a>
    </li>
    <li class="active">
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">CUSTOMERS</h4>
                        <div class="appointment-tab">

                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#upcoming-appointments" data-bs-toggle="modal" data-bs-target="#appt_details">Add Customer</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <form class="chat-search">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="text" class="form-control rounded-pill" placeholder="Search" onkeyup="myFunction()" id="myInput">
                                    </div>
                                </form>
                                <br>
                                @include('flash-message')

                                <div class="tab-pane show active" id="upcoming-appointments">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0" id="myTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Due Date</th>
                                                        <th>Location</th>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Balance</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($workers as $worker)
                                                        <tr>

                                                            <td>{{$worker->due_date}}</td>
                                                            <td>{{$worker->location}}</td>
                                                            <td>{{$worker->first_name}} {{$worker->last_name}}</td>
                                                            <td>{{$worker->phone}}</td>
                                                            @if($worker->balance<0)
                                                                <td style="font-size: large;color: green"><b>{{$worker->balance}}</b></td>
                                                            @elseif($worker->balance==0)
                                                                <td><span class="badge rounded-pill bg-success-light">{{$worker->balance}}</span></td>

                                                            @else
                                                                <td style="font-size: large;color: red"><b>{{$worker->balance}}</b></td>

                                                            @endif
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a class="btn btn-sm bg-primary-light" href="{{url('cProfile',$worker->id)}}">View</a>

                                                                    <a class="btn btn-sm bg-success-light view" id="{{$worker->id}}" href="#upcoming-appointments" data-bs-toggle="modal" data-bs-target="#stock_details">Edit</a>

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
</div>

</div>
<div class="modal fade custom-modal" id="appt_details">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Customer</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('addCustomer')}}" method="post">
                @csrf
                <div class="modal-body">

                    <div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First_Name">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last_Name">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Phone No</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" name="location" placeholder="Location">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Balance</label>
                            <input type="text" class="form-control" name="balance" placeholder="Balance if any">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Due Date</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Save</button>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade custom-modal" id="stock_details">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit <span id="out" style="color: red"></span></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('eCustomer')}}" method="post">
                @csrf
                <input type="hidden" name="id" id="workerId" value="">
                <div class="modal-body">
                    <div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" value="">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Phone No</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" name="location" id="location" placeholder="Location">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Balance <span id="balance" style="color: red;font-size: large"></span></label>
                            <select class="form-control select" name="debtManagement" id="debtManagement">
                                <option value="1">Pay Debt</option>
                                <option value="0">Add Debt</option>

                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" name="amount" placeholder="Enter Amount">
                        </div>
                    </div>
                    <div id="paymentMethod">
                        <div class="form-group">
                            <label>Payment Method</label>
                            <select class="form-control select" name="payment_method">
                                <option value="1">Mpesa</option>
                                <option value="0">Cash</option>

                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Due Date</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger">Save</button>
                </div>
            </form>
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

<!-- Mirrored from doccure-laravel.dreamguystech.com/template-cardiology/public/doctor-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 14:54:26 GMT -->
</html>
<script>
    $(document).ready(function(){
        $('#roleWorker').hide();
    });
    $('#debtManagement').change(function () {
        if ($(this).val()==0){
            $('#paymentMethod').hide();
        }
        else {
            $('#paymentMethod').show();

        }
    });
    $(document).on('click','.view',function () {
        $value = $(this).attr('id');
        $.ajax({
            type:"get",
            url:"{{url('editWorker')}}",
            data:{'id':$value},
            success:function (data) {
                getResponse(data);
                console.log(data);

            },
            error:function (error) {
                console.log(error)
                alert('error')

            }

        });
    });

    var data;
    function getResponse(response) {
        data = response;
        $('#workerId').val(data.id);
        $('#first_name').val(data.first_name);
        $('#last_name').val(data.last_name);
        $('#location').val(data.location);
        $('#phone').val(data.phone);
        $('#balance').text(data.balance);
        $('#out').text(data.first_name+' '+data.last_name);

    }
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
