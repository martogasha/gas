@include('backend.header')
<title>oinvoice - Gas Delivery</title>

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
    <div class="container-fluid" id="target">
        <div class="row" id="content">
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <div class="card">
                            <div class="card-body pt-0">

                                <nav class="user-tabs mb-4">
                                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                        <li class="nav-item">
                                            @if($order->user_id)
                                                <a class="nav-link active">{{$order->user->first_name}} {{$order->user->last_name}} <span style="color: black;font-size: 18px">Invoice</span></a>
                                            @else
                                                <a class="nav-link active"><span style="color: black;font-size: 18px">Invoice</span></a>
                                            @endif
                                        </li>
                                    </ul>
                                </nav>
                                <input type="hidden" value="{{$order->user->first_name}} {{$order->user->last_name}}" id="customerName">
                                <button class="btn btn-primary btn-lg"  id="cmd">Print</button>
                                <div class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-8 offset-lg-2">
                                                <div class="invoice-content">
                                                    <div class="invoice-item">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="invoice-logo">
                                                                    <img src="assets/img/llll.png" alt="logo">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p class="invoice-details">
                                                                    <strong>Order No:</strong> #{{$order->id}} <br>
                                                                    <strong>Date:</strong> {{$order->date}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="invoice-item">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                @if($order->user_id)
                                                                    <h5 style="text-decoration: underline">Customer</h5>
                                                                    <div class="invoice-info">
                                                                        <strong class="customer-text" style="color: red">{{$order->user->first_name}} {{$order->user->last_name}}</strong>
                                                                        <p class="invoice-details invoice-details-two">
                                                                            {{$order->user->phone}}</p>
                                                                    </div>
                                                                @else
                                                                @endif
                                                                    @if($order->worker_id)
                                                                        <h5 style="text-decoration: underline">Delivery Guy</h5>
                                                                        <div class="invoice-info">
                                                                        <strong class="customer-text" style="color: blue">{{$order->worker->first_name}} {{$order->worker->last_name}}</strong>
                                                                        <p class="invoice-details invoice-details-two">
                                                                            {{$order->worker->phone}}</p>
                                                                    </div>
                                                                @else
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="invoice-item invoice-table-wrap" id="content">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="invoice-table table table-bordered">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Items</th>
                                                                            <th class="text-center">Status</th>
                                                                            <th class="text-center">Qty</th>
                                                                            <th class="text-end">Amount</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($items as $item)
                                                                            <tr>
                                                                                <td>{{$item->stock->item_name}}</td>
                                                                                @if($item->empty_quantity!=null)
                                                                                    <td>Full <span class="d-block text-info">Empty</span></td>
                                                                                    <td>{{$item->full_quantity}} <span class="d-block text-info">{{$item->empty_quantity}}</span></td>
                                                                                @else
                                                                                    <td>QTY</td>
                                                                                    <td>{{$item->full_quantity}}</td>
                                                                                @endif
                                                                                <td class="text-center">Ksh {{$item->amount}}</td>

                                                                            </tr>
                                                                        @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-xl-4 ms-auto">
                                                                <div class="table-responsive">
                                                                    <table class="invoice-table-two table">
                                                                        <tbody>
                                                                        <tr>
                                                                            <th>Order Amount:</th>
                                                                            <td><span style="font-size: large"><b>{{$order->order_amount}}</b></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Total Amount:</th>
                                                                            <td><span style="font-size: large"><b>{{$order->amount}}</b></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Balance:</th>
                                                                            <td><span style="font-size: large;color: red"><b>{{$order->balance}}</b></span></td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <strong class="customer-text">Mpesa Payment</strong>

                                                            <table class="invoice-table table table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th class="text-end">Amount</th>
                                                                    <th class="text-end">Date</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($mpesas as $mpesa)
                                                                    <tr>
                                                                        <td class="text-end">Ksh {{$mpesa->order->amount}}</td>
                                                                        <td class="text-end">{{$mpesa->order->date}}</td>
                                                                    </tr>
                                                                @endforeach

                                                                </tbody>
                                                            </table>
                                                            <div class="invoice-item">
                                                            <strong class="customer-text">Cash Payment</strong>

                                                           </div>
                                                            <table class="invoice-table table table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th class="text-end">Amount</th>
                                                                    <th class="text-end">Date</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($cashs as $cash)
                                                                    <tr>
                                                                        <td class="text-end">Ksh {{$cash->order->amount}}</td>
                                                                        <td class="text-end">{{$cash->order->date}}</td>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script>
</body>

<!-- Mirrored from doccure-laravel.dreamguystech.com/template-cardiology/public/patient-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 14:55:09 GMT -->
</html>
<script>
    $(function () {

        var specialElementHandlers = {
            '#editor': function (element,renderer) {
                return true;
            }
        };
        $('#cmd').click(function () {
            var doc = new jsPDF();
            doc.fromHTML($('#target').html(), 15, 15, {
                'width': 170,'elementHandlers': specialElementHandlers
            });
            doc.save($('#customerName').val());
        });
    });
</script>
