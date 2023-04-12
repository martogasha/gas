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
    <li class="">
        <a href="{{url('customers')}}">Customers</a>
    </li>
    <li class="">
        <a href="{{url('mpesa')}}">Mpesa</a>
    </li>
    <li class="">
        <a href="{{url('cash')}}">Cash</a>
    </li>
    <li class="active">
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
                        <h4 class="mb-4">STOCK</h4>
                        <div class="appointment-tab">

                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#upcoming-appointments" data-bs-toggle="modal" data-bs-target="#appt_details">Add Stock</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <form class="chat-search">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="text" class="form-control rounded-pill" id="myInput" onkeyup="myFunction()"  placeholder="Search">
                                    </div>
                                </form>
                                <br>
                                @include('flash-message')

                                <div class="tab-pane show active" id="upcoming-appointments">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive" style="height:200px;overflow-y: auto">
                                                <table class="table table-hover table-center mb-0" id="myTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Amount</th>
                                                        <th>Total Qty</th>
                                                        <th>Status</th>
                                                        <th>Qty</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($items as $item)
                                                        <tr>

                                                            <td>{{$item->item_name}}</td>
                                                            <td>Ksh {{$item->item_amount}}</td>
                                                            <td>{{$item->item_full_quantity+$item->item_empty_quantity}}</td>
                                                            @if($item->item_empty_quantity!=null)
                                                                <td>Full <span class="d-block text-info">Empty</span></td>
                                                                <td>{{$item->item_full_quantity}} <span class="d-block text-info">{{$item->item_empty_quantity}}</span></td>
                                                            @else
                                                                <td>N/A</td>
                                                                <td>{{$item->item_full_quantity}}</td>

                                                            @endif
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a class="btn btn-sm bg-success-light sell" id="{{$item->id}}" href="#upcoming-appointments" data-bs-toggle="modal" data-bs-target="#stock_sell">Sell</a>
                                                                    <a class="btn btn-sm bg-primary-light view" id="{{$item->id}}" href="#upcoming-appointments" data-bs-toggle="modal" data-bs-target="#stock_details">Edit</a>
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
                                <br>
                                <h4 class="mb-4">ORDER</h4>
                                <div class="tab-pane show active" id="scrollDiv">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <nav class="user-tabs mb-4">
                                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#pat_appointments" data-bs-toggle="tab" id="todayOrder">Todays</a>

                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#pat_ps" data-bs-toggle="tab" id="processOrder">Process Order</a>
                                                    </li>
                                                </ul>
                                            </nav>

                                            <div class="table-responsive" id="orderTable">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th>Qty</th>
                                                        <th>Amount</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>
                                                                <a class="btn btn-sm bg-primary-light order" id="{{$order->id}}" href="#upcoming-appointments" data-bs-toggle="modal" data-bs-target="#edit_order">Edit</a>

                                                            </td>
                                                            <td>{{$order->stock->item_name}}</td>
                                                        @if($order->empty_quantity!=null)
                                                                <td>Full <span class="d-block text-info">Empty</span></td>
                                                                <td>{{$order->full_quantity}} <span class="d-block text-info">{{$order->empty_quantity}}</span></td>
                                                            @else
                                                                <td>QTY</td>
                                                                <td>{{$order->full_quantity}}</td>
                                                            @endif
                                                            <td>Ksh {{$order->stock->item_amount*$order->full_quantity}}</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <form action="{{url('cancelOrder')}}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" value="{{$order->id}}" name="item_id">
                                                                        <input type="hidden" value="{{$order->stock->id}}" name="stock_id">
                                                                        <button type="submit" class="btn btn-sm bg-danger-light cancelOrder">Cancel</button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <button class="btn btn-primary" id="registerCustomer">Register New Customer</button>
                                            <button class="btn btn-primary" id="selectCustomer">Select Customer</button>
                                            <form action="{{url('addCorder')}}" method="post">
                                                @csrf
                                            <div class="tab-pane fade" id="pat_ps">
                                                <div>
                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <input type="date" class="form-control" name="date">
                                                    </div>
                                                </div>
                                                <div class="form-group" id="customerList">
                                                    <label>Customers</label>
                                                    <select class="form-control select" name="customer_id" id="SelExample">
                                                        <option value="">None</option>
                                                    @foreach($users as $user)
                                                            <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group" id="workerList">
                                                    <label>Delivery Guy(if any)</label>
                                                    <select class="form-control select" name="worker_id" id="SelE">
                                                        <option value="">None</option>
                                                    @foreach($workers as $worker)
                                                            <option value="{{$worker->id}}">{{$worker->first_name}} {{$worker->last_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group" id="workerList">
                                                    <label>Payment Method</label>
                                                    <select class="form-control select" name="payment_method">
                                                            <option value="1">Mpesa</option>
                                                            <option value="0">Cash</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <div class="form-group">
                                                        <label>Order Amount</label>
                                                        <input type="text" class="form-control" name="subTotal" value="{{\App\Models\Item::where('order_id',null)->sum('amount')}}">
                                                    </div>
                                                </div>
                                                <div id="userResults">

                                                </div>

                                                    <div id="reg">
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
                                                                <input type="text" class="form-control" name="balance" placeholder="Balance if any" id="newBal">
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <button type="submit" class="btn btn-info">Save</button>

                                        </div>
                                            </form>
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
                <h5 class="modal-title">Add Stock</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('addStock')}}" method="post">
                @csrf
                <div class="modal-body">

                    <div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="item_name" placeholder="Item Name">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" name="item_amount" placeholder="Amount">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Quantity/Full</label>
                            <input type="text" class="form-control" name="item_full_quantity" placeholder="Quantity/Full">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Quantity/Empty</label>
                            <input type="text" class="form-control" name="item_empty_quantity" placeholder="Quantity/Empty">
                        </div>
                    </div>
                    {{--                    <div class="form-group">--}}
                    {{--                        <label>Status(Full/Empty)</label>--}}
                    {{--                        <select class="form-control select" name="item_status">--}}
                    {{--                            <option value="1">Full</option>--}}
                    {{--                            <option value="0">Empty</option>--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}
                    <button type="submit" class="btn btn-danger">Save</button>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade custom-modal" id="edit_order">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editOrderTitle"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('eOrder')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="orderId" value="">
                    <div>
                        <div class="form-group">
                            <label>Quantity/Full</label>
                            <input type="text" class="form-control" name="item_full_quantity" id="fullQ" value="">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Quantity/Empty</label>
                            <input type="text" class="form-control" name="item_empty_quantity" id="emptyQ" value="">
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
                <h5 class="modal-title" id="out"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('eStock')}}" method="post">
                @csrf
                <div class="modal-body" id="edit">

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade custom-modal" id="stock_sell">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="outSell"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('selling')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="item_id" value="">
                    <div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="item_name" id="item_name" value="">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" name="item_amount" id="item_amount" value="">
                        </div>
                    </div>

                    <div id="itemT">
                        <div class="form-group">
                            <label>Item Type</label>
                            <select class="form-control select" name="item_type" id="item_type">
                                <option value="1">Gas</option>
                                <option value="2">Others</option>
                            </select>
                        </div>
                    </div>
                    <div id="q1">
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" class="form-control" name="item_full_quantity" id="item_full_quantity" value="" placeholder="Quantity">
                        </div>
                    </div>
                    <div id="q2">
                        <div class="form-group">
                            <label>Quantity of Empty</label>
                            <input type="text" class="form-control" name="item_empty_quantity" id="item_empty_quantity" value="" placeholder="EMPTY GAS">
                        </div>
                    </div>
                    {{--                    <div>--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Select Customer and Worker</label>--}}
                    {{--                              <input type="radio" id="html" name="choose" value="1">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div>--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label>New Customer/Select Worker</label>--}}
                    {{--                              <input type="radio" id="htm" name="choose" value="2">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div>--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label>New Customer</label>--}}
                    {{--                              <input type="radio" id="ht" name="choose" value="3">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div>--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Our Customer</label>--}}
                    {{--                              <input type="radio" id="h" name="choose" value="4">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div id="select_customer">--}}
                    {{--                        <label for="myHouse">Customer</label>--}}
                    {{--                        <br>--}}
                    {{--                        <input list="magicHouses" id="myHouse" name="customer_id" placeholder="type here..." />--}}
                    {{--                        <datalist id="magicHouses">--}}
                    {{--                            @foreach($users as $user)--}}
                    {{--                                <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>--}}

                    {{--                            @endforeach--}}

                    {{--                        </datalist>--}}
                    {{--                    </div>--}}
                    {{--                    <br>--}}
                    {{--                    <div id="customer_name">--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Customer Name</label>--}}
                    {{--                            <input type="text" class="form-control" name="customer_name" value="">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div id="customer_phone">--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Customer Phone</label>--}}
                    {{--                            <input type="text" class="form-control" name="customer_phone" value="">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div id="customer_location">--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Customer Location</label>--}}
                    {{--                            <input type="text" class="form-control" name="customer_location" value="">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div id="select_worker">--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Select Worker/Delivery Guy</label>--}}
                    {{--                            <select class="form-control select" name="worker_id">--}}
                    {{--                                @foreach($workers as $worker)--}}
                    {{--                                    <option value="{{$worker->id}}">{{$worker->first_name}} {{$worker->last_name}}</option>--}}

                    {{--                                @endforeach--}}
                    {{--                            </select>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div id="payment_method">--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Payment Method</label>--}}
                    {{--                            <select class="form-control select" id="pay" name="pay">--}}
                    {{--                                    <option value="1">Mpesa</option>--}}
                    {{--                                    <option value="2">Cash</option>--}}
                    {{--                                    <option value="3">Debt</option>--}}
                    {{--                            </select>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div id="dPayment_method">--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Partial Payment Method</label>--}}
                    {{--                            <select class="form-control select" id="dPay" name="dPay">--}}
                    {{--                                    <option value="1">Mpesa</option>--}}
                    {{--                                    <option value="2">Cash</option>--}}
                    {{--                            </select>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div id="amount">--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Amount</label>--}}
                    {{--                            <input type="text" class="form-control" name="amount" id="camount" value="">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div id="partial_amount">--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Partial Amount</label>--}}
                    {{--                            <input type="text" class="form-control" name="amoun" id="pamount" value="">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div id="debt">--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Debt</label>--}}
                    {{--                            <input type="text" class="form-control" name="debt" id="cdebt" value="">--}}
                    {{--                        </div>--}}
                    {{--                    <div class="form-group">--}}
                    {{--                        <label for="inputDate">Due Date</label>--}}
                    {{--                        <input type="input" class="form-control" id="inputDate" name="date">--}}
                    {{--                      </div>--}}
                    {{--                </div>--}}
                    <button type="submit" id="buttonSubmit" class="btn btn-danger">Save</button>
                </div>
            </form>
        </div>
    </div>

</div>
<style>
    /* START SELECT3.css */
    .searchSelect3 {
        position: relative;
        color: #000;
        margin-bottom: 10px;
        /*font-size: 16px;*/
    }

    .searchSelect3_Input {
        width: 250px;
        height: 32px;
        background: #fcfcfc;
        border: 1px solid #aaa;
        border-radius: 5px;
        text-indent: 10px;
        padding-right: 20px;
        width: 200px;

        /*font: 200 16px/1.5 Helvetica, Verdana, sans-serif;*/
    }

    .searchSelect3_Caret_Down {
        position: absolute;
        top: 10px;
        left: 180px;
        cursor: pointer;
    }

    .searchSelect3_Times {
        position: absolute;
        top: 10px;
        left: 210px;
        cursor: pointer;
        display: none;
    }

    .searchSelect3_List {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: auto;
        overflow-x: hidden;
        height: 20em;
        width: 250px;
        position: absolute;
    }

    .searchSelect3_List li {
        list-style-type: none;
        background: #ffffff;
        color: #000000;
        /*font: 200 16px/1.5 Helvetica, Verdana, sans-serif;*/
        border-bottom: 1px solid #ccc;
    }

    .searchSelect3_List li:hover {
        cursor: pointer;
        background: #f940a0;
        color: #ffffff;
    }


    .searchSelect3_List li label {
        padding: 0.5em;
        cursor: pointer;
    }

    .searchSelect3_List li:hover label {
        color: #ffffff;
    }

    .searchSelect3_Input::-ms-clear {
        display: none;
        width: 0;
        height: 0;
    }

    .searchSelect3_Input::-ms-reveal {
        display: none;
        width: 0;
        height: 0;
    }

    .searchSelect3_Input::-webkit-search-decoration,
    .searchSelect3_Input::-webkit-search-cancel-button,
    .searchSelect3_Input::-webkit-search-results-button,
    .searchSelect3_Input::-webkit-search-results-decoration {
        display: none;
    }
    /* END SELECT3.css */

    #wrapper{
        margin-top: 20px;
        margin-left: 300px;

    }
</style>
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
    $('#tots').on('keyup',function () {
        alert('ok')
       $value = $(this).val();
       $user_id = $('#SelExample').val();
        $.ajax({
            type:"get",
            url:"{{url('newDynamicBal')}}",
            data:{'id':$value,'user_id':$user_id},
            success:function (data) {
                $('#bal').val(data);
            },
            error:function (error) {
                console.log(error)
                alert('error')

            }

        });
    });
    $('#newBal').on('keyup',function () {
       $value = $(this).val();
        $.ajax({
            type:"get",
            url:"{{url('newBal')}}",
            data:{'id':$value},
            success:function (data) {
                $('#tots').val(data);
            },
            error:function (error) {
                console.log(error)
                alert('error')

            }

        });
    });
    $('#registerCustomer').click(function () {
        $('#customerList').hide()
        $('#registerCustomer').hide()
        $('#balance').hide()
        $('#total').hide()
        $('#SelExample').val('none')
        $('#reg').show();
        $('#selectCustomer').show();
        $.ajax({
            type:"get",
            url:"{{url('newTotal')}}",
            data:{'id':$value},
            success:function (data) {
                $('#tots').val(data);
            },
            error:function (error) {
                console.log(error)
                alert('error')

            }

        });
    });
    $('#selectCustomer').click(function () {
        $('#reg').hide();
        $('#selectCustomer').hide();
        $('#customerList').show()
        $('#registerCustomer').show()

    });
    $('#SelExample').on('change',function () {
        if ($(this).val()==""){
            $('#balance').hide();
            $('#total').hide();
            $.ajax({
                type:"get",
                url:"{{url('getTotal')}}",
                data:{'id':$value},
                success:function (data) {
                    $('#userResults').html(data);
                },
                error:function (error) {
                    console.log(error)
                    alert('error')

                }

            });
        }
        else{
            $value = $(this).val();
            $.ajax({
                type:"get",
                url:"{{url('getUserDetail')}}",
                data:{'id':$value},
                success:function (data) {
                    $('#userResults').html(data);
                },
                error:function (error) {
                    console.log(error)
                    alert('error')

                }

            });
        }

    });
    $(document).on('click','.order',function () {
        $value = $(this).attr('id');
        $.ajax({
            type:"get",
            url:"{{url('editOrder')}}",
            data:{'id':$value},
            success:function (dat) {
                getRespons(dat);
                console.log(dat);            },
            error:function (error) {
                console.log(error)
                alert('error')

            }

        });
    });
    var dat;
    function getRespons(response) {
        dat = response;
        $('#fullQ').val(dat.full_quantity);
        $('#emptyQ').val(dat.empty_quantity);
        $('#orderId').val(dat.id);
    }
    $('#inputDate').datepicker({
    });
    $('#pamount').on('keyup input', function() {

        var price = $('#item_amount').val();
        var ppp = $('#pamount').val();
        fprice = price-ppp;
        $('#cdebt').val(fprice)});
    $(document).ready(function(){
        window.scrollTo($('#orderTable'),500);
        $('#reg').hide();
        $('#selectCustomer').hide();
        $('#select_customer').hide();
      $('#select_worker').hide();
      $('#customer_name').hide();
      $('#customer_phone').hide();
      $('#customer_location').hide();
      $('#debt').hide();
      $('#partial_amount').hide();
      $('#dPayment_method').hide();
      // $('#q2').hide();

    });
    $('#processOrder').click(function () {
       $('#orderTable').hide();
        $('#pat_prescriptions').show();

    });
    $('#todayOrder').click(function () {
       $('#orderTable').show();
       $('#pat_prescriptions').hide();
    });

    $('#item_type').change(function () {
       if ($(this).val()==2){
           $('#q2').hide();
       }
       else {
           $('#q2').show();

       }

    });
    $('#html').change(function () {
        $('#select_customer').show();
        $('#select_worker').show()
        $('#customer_name').hide();
        $('#customer_phone').hide();
        $('#customer_location').hide();

    })
    $('#htm').change(function () {
        $('#customer_name').show();
        $('#customer_phone').show()
        $('#customer_location').show()
        $('#select_customer').hide();
        $('#select_worker').show()
    })
    $('#ht').change(function () {
        $('#customer_name').show();
        $('#customer_phone').show()
        $('#select_worker').hide();
        $('#customer_location').show()
    })
    $('#h').change(function () {
        $('#select_customer').show();
        $('#customer_name').hide();
        $('#customer_phone').hide();
        $('#customer_location').hide();
    })
    $('#pay').change(function () {
       if ($(this).val()==3){
           $('#debt').show();
           $('#partial_amount').show();
           $('#dPayment_method').show();
           $('#amount').hide();

       }
        else {
           $('#debt').hide();
           $('#partial_amount').hide();
           $('#dPayment_method').hide();
           $('#amount').show();

       }
    });
    $(document).on('click','.view',function () {
        $value = $(this).attr('id');
        $.ajax({
            type:"get",
            url:"{{url('editStock')}}",
            data:{'id':$value},
            success:function (data) {
                $('#edit').html(data);
            },
            error:function (error) {
                console.log(error)
                alert('error')

            }

        });
    });


    $(document).on('click','.sell',function () {
        $value = $(this).attr('id');
        $.ajax({
            type:"get",
            url:"{{url('sell')}}",
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
        $('#outSell').text(data.item_name);
        $('#item_name').val(data.item_name);
        $('#item_amount').val(data.item_amount);
        $('#camount').val(data.item_amount);
        $('#cdebt').val(data.item_amount);
        $('#item_id').val(data.id);
    }


    /* START select3.js */
    /*
    Creditor: Deky
    Last Date Modified: 25 April 2016
    Purpose: Transform SELECT TAG HTML to SEARCH TEXTBOX + LISTBOX
    Required: JQUERY
    Required: FOUNDATION
    Required: FONT AWESOME ICON
    Inspiration: https://select2.github.io/
    */
    /*
    Creditor: Deky
    Last Date Modified: 25 April 2016
    Purpose: Transform SELECT TAG HTML to SEARCH TEXTBOX + LISTBOX
    Required: JQUERY
    Required: FOUNDATION
    */
    (function ($) {

        $.fn.select3 = function (options) {
            var dataItems = [];
            var selectorID = '#' + this.attr('id');

            $(selectorID).find('option').each(function (index, element) {

                if (element.text != '') {
                    dataItems.push(element.text.trim());
                }
                else {
                    dataItems.push(element.value.trim());
                }

            });

            var opts = $.extend({}, $.fn.select3.defaults, options);

            var idDiv = this.attr('id') + 'searchSelect3';
            var idInput = this.attr('id') + 'searchSelect3_Input';
            var idClose = this.attr('id') + 'searchSelect3_Times';
            var idDown = this.attr('id') + 'searchSelect3_Caret_Down';
            var idList = this.attr('id') + 'searchSelect3_List';
            var idListLi = this.attr('id') + 'searchSelect3_List_LI';

            var selectorDiv = '#' + this.attr('id') + 'searchSelect3';
            var selectorInput = '#' + this.attr('id') + 'searchSelect3_Input';
            var selectorClose = '#' + this.attr('id') + 'searchSelect3_Times';
            var selectorDown = '#' + this.attr('id') + 'searchSelect3_Caret_Down';
            var selectorList = '#' + this.attr('id') + 'searchSelect3_List';
            var selectorListLi = '#' + this.attr('id') + 'searchSelect3_List_LI';

            var buildELement = $('<div class="searchSelect3" id="' + idDiv + '" style="position:relative;"><input class="searchSelect3_Input" placeholder="' + opts.placeholder + '" value="' + opts.defaultvalue + '" id="' + idInput + '"><span class="fa fa-times searchSelect3_Times" id="' + idClose + '"></span><span class="fa fa-caret-down searchSelect3_Caret_Down" id="' + idDown + '"></span></div>');

            if ($(selectorDiv).length > 0) {
                $(selectorDiv).remove();
            }

            this.after(buildELement);

            if (opts.width > 0) {
                $(selectorInput).css('width', opts.width);
                $(selectorDown).css('left', (opts.width - 20));
                $(selectorClose).css('left', (opts.width - 40));
            }


            var cache = {};
            var drew = false;
            this.hide();



            $(document).on('click', function (e) {
                //untuk menghilangkan list saat unfocus
                if ($(e.target).parent().is("li[id*='" + idListLi + "']") == false) {
                    if ($(e.target).attr('id') != idInput && $(e.target).attr('id') != idDown) {
                        $(selectorList).empty();
                        $(selectorList).css('z-index', -1);
                        $(selectorClose).hide();
                    }
                }



            });




            var showList = function (query, valuee) {



                //Check if we've searched for this term before
                if (query in cache) {
                    results = cache[query];
                } else {
                    //Case insensitive search for our people array
                    var results = $.grep(dataItems, function (item) {
                        return item.search(RegExp(query, "i")) != -1;
                    });

                    //Add results to cache
                    cache[query] = results;
                }

                //First search
                $(selectorList).css('z-index', opts.zIndex);


                if (drew == false) {
                    //Create list for results
                    $(selectorInput).after('<ul id="' + idList + '" class="searchSelect3_List" style="z-index:' + opts.zIndex + '"></ul>');

                    if (opts.width > 0) {

                        $(selectorList).css('width', opts.width);

                    }

                    if (opts.widthList > 0)
                    {
                        $(selectorList).css('width', opts.widthList);
                    }

                    //Prevent redrawing/binding of list
                    drew = true;

                    //Bind click event to list elements in results
                    $(selectorList).on("click", "li", function () {
                        var nilai = $(this).text()
                        $(selectorInput).val(nilai);
                        $(selectorID).val(nilai);
                        $(selectorList).empty();
                        $(selectorClose).show();
                        $(selectorList).css('z-index', -1);
                        $(selectorID).change();
                    });


                }
                //Clear old results
                else {
                    $(selectorList).empty();
                }

                var counter = 0;
                //Add results to the list
                for (term in results) {
                    counter++;
                    $(selectorList).append("<li id=" + idListLi + counter + "><label>" + results[term] + "</label></li>");
                }




            };



            $(selectorInput).on('click', function (e) {
                var query = $(this).val();

                showList('', query);


                $(selectorClose).hide();
                if (query.length > 0) {
                    $(selectorClose).show();
                }

            });

            $(selectorInput).on('keyup', function (e) {
                $(selectorList).empty();
                var query = $(selectorInput).val();
                showList(query, query);

                $(selectorClose).hide();
                if (query.length > 0) {
                    $(selectorClose).show();
                }

                $(selectorID).change();
            });

            //bila key tab di tekan maka akan pindah ke DOM lain, maka dari itu mesti di HIDE LIST nya
            $(selectorInput).on('keydown', function (e) {
                if (e.which == 9) {
                    $(selectorList).empty();
                    $(selectorList).css('z-index', -1);
                    $(selectorClose).hide();
                }
            });

            $(selectorDown).on('click', function (e) {
                var query = $(this).val();
                if ($(selectorList).find('li').length == 0) {
                    showList('', query);
                }
                else {
                    //$(selectorList).css('z-index', -1);
                    $(selectorList).empty();
                    $(selectorList).css('z-index', -1);
                }

                $(selectorClose).hide();
                if (query.length > 0) {
                    $(selectorClose).show();
                }

            });

            $(selectorClose).on('click', function (e) {
                $(selectorInput).val('');
                $(selectorClose).hide();
                $(selectorID).change();

            });


            return this;
        };

        $.fn.select3.defaults = {
            placeholder: "",
            zIndex: 1,
            defaultvalue: "",
            width: 0,
            widthList: 0
        };

    }(jQuery));
    /* END select3.js */


    $(document).ready(function(e){

        $('#selectBankList').select3({ width: 260, placeholder: 'Customers', zIndex: 100 });

        $('#selectDescription').select3({ width: 400, placeholder: 'Pilih Description', zIndex: 100, widthList:800 });


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
    $(document).ready(function(){

        // Initialize select2
        $("#SelExample").select2();
        $("#SelExample").select2("val", "4");
        $('#SelExample option:selected').text('Vizag');
        // Read selected option
        $('#but_read').click(function(){
            var username = $('#SelExample option:selected').text();
            var userid = $('#SelExample').val();

            $('#result').text("id : " + userid + ", name : " + username);
        });
    });
    $(document).ready(function(){

        // Initialize select2
        $("#SelE").select2();
        $("#SelE").select2("val", "4");
        $('#SelE option:selected').text('Vizag');
        // Read selected option
        $('#but_read').click(function(){
            var username = $('#SelE option:selected').text();
            var userid = $('#SelE').val();

            $('#result').text("id : " + userid + ", name : " + username);
        });
    });
</script>
