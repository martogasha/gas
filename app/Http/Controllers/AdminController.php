<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Stock;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $items = Stock::all();
        $current = Carbon::now()->format('d/m/Y');
        $workers = User::where('role',0)->get();
        $sumWorkers = User::where('role',0)->count();
        $sumCustomers = User::where('role',1)->count();
        $mpesa = Payment::where('payment_method',1)->where('date',$current)->sum('amount');
        $cash = Payment::where('payment_method',0)->where('date',$current)->sum('amount');
        $order = Order::where('date',$current)->count();
        return view('backend.index',[
            'items'=>$items,
            'workers'=>$workers,
            'sumWorkers'=>$sumWorkers,
            'sumCustomers'=>$sumCustomers,
            'mpesa'=>$mpesa,
            'cash'=>$cash,
            'order'=>$order,
        ]);
    }
    public function orders(){
        $current = Carbon::now()->format('d/m/Y');
        $orders = Order::orderBy('id','DESC')->get();
        $totalCash = Order::where('payment_method','0')->where('date',$current)->sum('amount');
        $totalMpesa = Order::where('payment_method','1')->where('date',$current)->sum('amount');
        $total = Order::where('date',$current)->sum('amount');
        return view('backend.orders',[
            'orders'=>$orders,
            'totalCash'=>$totalCash,
            'totalMpesa'=>$totalMpesa,
            'total'=>$total,

        ]);
    }
    public function chat(){
        return view('backend.chat');
    }
    public function workers(){
        $workers = User::where('role',0)->orderBy('id','DESC')->get();
        return view('backend.workers',[
            'workers'=>$workers
        ]);
    }
    public function customers(){
        $workers = User::where('role',1)->orderBy('id','DESC')->get();
        return view('backend.customers',[
            'workers'=>$workers
        ]);        }
    public function mpesa(){
        $current = Carbon::now()->format('d/m/Y');
        $payments = Payment::where('payment_method','1')->orderBy('id','DESC')->get();
        $total = Payment::where('payment_method','1')->where('date',$current)->sum('amount');
        return view('backend.Mpesa',[
            'payments'=>$payments,
            'total'=>$total,
        ]);
    }
    public function cash(){
        $current = Carbon::now()->format('d/m/Y');
        $payments = Payment::where('payment_method','0')->orderBy('id','DESC')->get();
        $total = Payment::where('payment_method','0')->where('date',$current)->sum('amount');
        return view('backend.cash',[
            'payments'=>$payments,
            'total'=>$total,
        ]);
    }
    public function cinvoice(){
        return view('backend.invoice');
    }
    public function minvoice(){
        return view('backend.minvoice');
    }
    public function oinvoice($id){
        $order = Order::find($id);
        $items = Item::where('order_id',$id)->get();
        $cashs = Payment::where('payment_method','0')->where('order_id',$id)->get();
        $mpesas = Payment::where('payment_method','1')->where('order_id',$id)->get();
        return view('backend.oinvoice',[
            'order'=>$order,
            'items'=>$items,
            'cashs'=>$cashs,
            'mpesas'=>$mpesas,
        ]);
    }
    public function cProfile($id){
        $worker = User::find($id);
        $orders = Order::where('user_id',$id)->get();
            $cashs = Payment::where('user_id',$id)->where('payment_method','0')->get();
            $mpesas = Payment::where('user_id',$id)->where('payment_method','1')->get();


        return view('backend.customerProfile',[
            'worker'=>$worker,
            'orders'=>$orders,
            'mpesas'=>$mpesas,
            'cashs'=>$cashs
        ]);
    }
    public function wProfile($id){
        $worker = User::find($id);
        $orders = Order::where('worker_id',$id)->get();
        return view('backend.workerProfile',[
            'worker'=>$worker,
            'orders'=>$orders,
        ]);
    }
    public function profile(){
        return view('backend.profile');
    }
    public function items(){
        $items = Stock::all();
        $users = User::where('role',1)->get();
        $workers = User::where('role',0)->get();
        $orders = Item::where('order_id',null)->get();
        return view('backend.items',[
            'items'=>$items,
            'users'=>$users,
            'workers'=>$workers,
            'orders'=>$orders,
        ]);
    }
    public function scroll(){

    }
    public function acceptOrder(){
        return view('backend.acceptOrder');
    }
    public function selling(Request $request){
        $stock = Item::where('stock_id',$request->id)->where('order_id',null)->first();
        if ($stock){
            $fullQ = $stock->full_quantity + 1;
            $emptyQ = $stock->empty_quantity + 1;
            $updateQ = Item::where('stock_id',$request->id)->update(['full_quantity'=>$fullQ,'empty_quantity'=>$emptyQ]);

            $stock = Stock::find($request->id);
            $full = $stock->item_full_quantity - $request->input('item_full_quantity');
            $empty = $stock->item_empty_quantity + $request->input('item_empty_quantity');
            $update = Stock::where('id',$request->id)->update(['item_full_quantity'=>$full,'item_empty_quantity'=>$empty]);
            return redirect()->back()->with('success','ITEM PROCESSED SUCCESS');
        }
        else{
            $order = new Item();
            $order->stock_id = $request->input('id');
            $order->full_quantity = $request->input('item_full_quantity');
            $order->empty_quantity = $request->input('item_empty_quantity');
            $order->amount = $request->input('item_amount');
            $order->save();
            $stock = Stock::find($request->id);
            $full = $stock->item_full_quantity - $request->input('item_full_quantity');
            $empty = $stock->item_empty_quantity + $request->input('item_empty_quantity');
            $update = Stock::where('id',$request->id)->update(['item_full_quantity'=>$full,'item_empty_quantity'=>$empty]);
            return redirect()->back()->with('success','ITEM PROCESSED SUCCESS');
        }

    }
    public function addStock(Request $request){
            $stock = new Stock();
            $stock->item_name = $request->input('item_name');
            $stock->item_amount = $request->input('item_amount');
            $stock->item_full_quantity = $request->input('item_full_quantity');
            $stock->item_empty_quantity = $request->input('item_empty_quantity');
            $stock->item_date = Carbon::now();
            $stock->save();
            return redirect()->back()->with('success','ITEM ADDED SUCCESS');
    }
    public function addWorker(Request $request){
            $stock = new User();
            $stock->first_name = $request->input('first_name');
            $stock->last_name = $request->input('last_name');
            $stock->idno = $request->input('idno');
            $stock->role = '0';
            $stock->phone = $request->input('phone');
            $stock->dashboard = $request->input('dashboard');
            $stock->orders = $request->input('orders');
            $stock->customers = $request->input('customers');
            $stock->mpesa = $request->input('mpesa');
            $stock->cash = $request->input('cash');
            $stock->stock = $request->input('stock');
            $stock->password = Hash::make('password');
            $stock->save();
            return redirect()->back()->with('success','WORKER ADDED SUCCESS');
    }
    public function addCustomer(Request $request){
            $stock = new User();
            $stock->first_name = $request->input('first_name');
            $stock->last_name = $request->input('last_name');
            $stock->phone = $request->input('phone');
            $stock->balance = $request->input('balance');
            $stock->location = $request->input('location');
            if ($request->date){
                $stock->due_date = Carbon::parse($request->date)->format('d/m/Y');

            }
            $stock->role = '1';
            $stock->password = Hash::make('password');
            $stock->save();
            return redirect()->back()->with('success','CUSTOMER ADDED SUCCESS');
    }
    public function addCorder(Request $request){
        if ($request->customer_id or $request->worker_id){
            if($request->customer_id!=null){
$userBalance = User::find($request->customer_id);
$balN = $userBalance->balance;
$itemsTotal = Item::where('order_id',null)->sum('amount');
    if ($itemsTotal==$request->input('totalAmount')){
        $getCurrentBal = $userBalance = User::find($request->customer_id);
        $getCBal = $getCurrentBal->balance;

        $order = new Order();
        $order->user_id = $request->input('customer_id');
        $order->worker_id = $request->input('worker_id');
        $order->payment_method = $request->input('payment_method');
        $order->amount = $request->input('totalAmount');
        $order->order_amount = $request->input('subTotal');
        $order->balance = $getCBal;
        $order->date = Carbon::parse($request->date)->format('d/m/Y');
        $order->save();
        $update = Item::where('order_id',null)->update(['order_id'=>$order->id]);
        $payment = new Payment();
        $payment->order_id = $order->id;
        $payment->user_id = $request->input('customer_id');
        $payment->payment_method = $request->input('payment_method');
        $payment->amount = $request->input('totalAmount');
        $payment->date = Carbon::parse($request->date)->format('d/m/Y');
        $payment->save();
        return redirect()->back()->with('success','ORDER PROCESSED SUCCESS');
    }
    elseif ($itemsTotal>$request->input('totalAmount')){

        $getBalance = $itemsTotal-$request->input('totalAmount');
        $bal = $balN+$getBalance;
        $update = User::where('id',$userBalance->id)->update(['balance'=>$bal]);
        $getCurrentBal = $userBalance = User::find($request->customer_id);
        $getCBal = $getCurrentBal->balance;

        $order = new Order();
        $order->user_id = $request->input('customer_id');
        $order->worker_id = $request->input('worker_id');
        $order->payment_method = $request->input('payment_method');
        $order->amount = $request->input('totalAmount');
        $order->order_amount = $request->input('subTotal');
        $order->balance = $getCBal;
        $order->date = Carbon::parse($request->date)->format('d/m/Y');
        $order->save();
        $update = Item::where('order_id',null)->update(['order_id'=>$order->id]);
        $payment = new Payment();
        $payment->order_id = $order->id;
        $payment->user_id = $request->input('customer_id');
        $payment->payment_method = $request->input('payment_method');
        $payment->amount = $request->input('totalAmount');
        $payment->date = Carbon::parse($request->date)->format('d/m/Y');

        $payment->save();
        return redirect()->back()->with('success','ORDER PROCESSED SUCCESS');
    }
    else{

        $getBalance = $itemsTotal-$request->input('totalAmount');
        $bal = $balN+$getBalance;
        $update = User::where('id',$userBalance->id)->update(['balance'=>$bal]);
        $getCurrentBal = $userBalance = User::find($request->customer_id);
        $getCBal = $getCurrentBal->balance;

        $order = new Order();
        $order->user_id = $request->input('customer_id');
        $order->worker_id = $request->input('worker_id');
        $order->payment_method = $request->input('payment_method');
        $order->amount = $request->input('totalAmount');
        $order->order_amount = $request->input('subTotal');
        $order->balance = $getCBal;
        $order->date = Carbon::parse($request->date)->format('d/m/Y');
        $order->save();
        $update = Item::where('order_id',null)->update(['order_id'=>$order->id]);
        $payment = new Payment();
        $payment->order_id = $order->id;
        $payment->user_id = $request->input('customer_id');
        $payment->payment_method = $request->input('payment_method');
        $payment->amount = $request->input('totalAmount');
        $payment->date = Carbon::parse($request->date)->format('d/m/Y');
        $payment->save();
        return redirect()->back()->with('success','ORDER PROCESSED SUCCESS');
    }

            }
            else{
                if ($request->balance>0){
                    $tBal = $request->input('subTotal')-$request->input('totalAmount');
                    $fBalance = $request->balance+$tBal;
                    $stock = new User();
                    $stock->first_name = $request->input('first_name');
                    $stock->last_name = $request->input('last_name');
                    $stock->phone = $request->input('phone');
                    $stock->balance =$fBalance;
                    $stock->location = $request->input('location');
                    $stock->role = '1';
                    $stock->password = Hash::make('password');
                    $stock->save();
                    $order = new Order();
                    $order->user_id = $stock->id;
                    $order->worker_id = $request->input('worker_id');
                    $order->payment_method = $request->input('payment_method');
                    $order->amount = $request->input('totalAmount');
                    $order->order_amount = $request->input('subTotal');
                    $order->balance = $stock->balance;
                    $order->date = Carbon::parse($request->date)->format('d/m/Y');
                    $order->save();
                    $update = Item::where('order_id',null)->update(['order_id'=>$order->id]);
                    $payment = new Payment();
                    $payment->order_id = $order->id;
                    $payment->user_id = $request->input('customer_id');
                    $payment->payment_method = $request->input('payment_method');
                    $payment->amount = $request->input('totalAmount');
                    $payment->date = Carbon::parse($request->date)->format('d/m/Y');
                    $payment->save();
                    return redirect()->back()->with('success','CUSTOMER ADDED SUCCESS');
                }
                else{
                    $itemsTotal = Item::where('order_id',null)->sum('amount');
                    if($itemsTotal==$request->input('totalAmount')){
                        $stock = new User();
                        $stock->first_name = $request->input('first_name');
                        $stock->last_name = $request->input('last_name');
                        $stock->phone = $request->input('phone');
                        $stock->balance ='0';
                        $stock->location = $request->input('location');
                        $stock->role = '1';
                        $stock->password = Hash::make('password');
                        $stock->save();
                        $order = new Order();
                        $order->user_id = $stock->id;
                        $order->worker_id = $request->input('worker_id');
                        $order->payment_method = $request->input('payment_method');
                        $order->amount = $request->input('totalAmount');
                        $order->order_amount = $request->input('subTotal');
                        $order->balance = $stock->balance;
                        $order->date = Carbon::parse($request->date)->format('d/m/Y');
                        $order->save();
                        $update = Item::where('order_id',null)->update(['order_id'=>$order->id]);
                        $payment = new Payment();
                        $payment->order_id = $order->id;
                        $payment->user_id = $request->input('customer_id');
                        $payment->payment_method = $request->input('payment_method');
                        $payment->amount = $request->input('totalAmount');
                        $payment->date = Carbon::parse($request->date)->format('d/m/Y');
                        $payment->save();
                        return redirect()->back()->with('success','CUSTOMER ADDED SUCCESS');
                    }

                    elseif ($itemsTotal>$request->input('totalAmount')){
                        $nBal = $itemsTotal - $request->input('totalAmount');
                        $stock = new User();
                        $stock->first_name = $request->input('first_name');
                        $stock->last_name = $request->input('last_name');
                        $stock->phone = $request->input('phone');
                        $stock->balance =$nBal;
                        $stock->location = $request->input('location');
                        $stock->role = '1';
                        $stock->password = Hash::make('password');
                        $stock->save();
                        $order = new Order();
                        $order->user_id = $stock->id;
                        $order->worker_id = $request->input('worker_id');
                        $order->payment_method = $request->input('payment_method');
                        $order->amount = $request->input('totalAmount');
                        $order->order_amount = $request->input('subTotal');
                        $order->balance = $stock->balance;
                        $order->date = Carbon::parse($request->date)->format('d/m/Y');
                        $order->save();
                        $update = Item::where('order_id',null)->update(['order_id'=>$order->id]);
                        $payment = new Payment();
                        $payment->order_id = $order->id;
                        $payment->user_id = $request->input('customer_id');
                        $payment->payment_method = $request->input('payment_method');
                        $payment->amount = $request->input('totalAmount');
                        $payment->date = Carbon::parse($request->date)->format('d/m/Y');
                        $payment->save();
                        return redirect()->back()->with('success','CUSTOMER ADDED SUCCESS');

                    }
                    else{
                        $nGetBalance = $itemsTotal-$request->input('totalAmount');
                        $stock = new User();
                        $stock->first_name = $request->input('first_name');
                        $stock->last_name = $request->input('last_name');
                        $stock->phone = $request->input('phone');
                        $stock->balance =$nGetBalance;
                        $stock->location = $request->input('location');
                        $stock->role = '1';
                        $stock->password = Hash::make('password');
                        $stock->save();
                        $order = new Order();
                        $order->user_id = $stock->id;
                        $order->worker_id = $request->input('worker_id');
                        $order->payment_method = $request->input('payment_method');
                        $order->amount = $request->input('totalAmount');
                        $order->order_amount = $request->input('subTotal');
                        $order->balance = $stock->balance;
                        $order->date = Carbon::parse($request->date)->format('d/m/Y');
                        $order->save();
                        $update = Item::where('order_id',null)->update(['order_id'=>$order->id]);
                        $payment = new Payment();
                        $payment->order_id = $order->id;
                        $payment->user_id = $request->input('customer_id');
                        $payment->payment_method = $request->input('payment_method');
                        $payment->amount = $request->input('totalAmount');
                        $payment->date = Carbon::parse($request->date)->format('d/m/Y');
                        $payment->save();
                        return redirect()->back()->with('success','CUSTOMER ADDED SUCCESS');
                    }
                }

            }
        }
        elseif($request->first_name){

            if ($request->balance>0){
                $tBal = $request->input('subTotal')-$request->input('totalAmount');
                $fBalance = $request->balance+$tBal;
                $stock = new User();
                $stock->first_name = $request->input('first_name');
                $stock->last_name = $request->input('last_name');
                $stock->phone = $request->input('phone');
                $stock->balance =$fBalance;
                $stock->location = $request->input('location');
                $stock->role = '1';
                $stock->password = Hash::make('password');
                $stock->save();
                $order = new Order();
                $order->user_id = $stock->id;
                $order->worker_id = $request->input('worker_id');
                $order->payment_method = $request->input('payment_method');
                $order->amount = $request->input('totalAmount');
                $order->order_amount = $request->input('subTotal');
                $order->balance = $stock->balance;
                $order->date = Carbon::parse($request->date)->format('d/m/Y');
                $order->save();
                $update = Item::where('order_id',null)->update(['order_id'=>$order->id]);
                $payment = new Payment();
                $payment->order_id = $order->id;
                $payment->user_id = $request->input('customer_id');
                $payment->payment_method = $request->input('payment_method');
                $payment->amount = $request->input('totalAmount');
                $payment->date = Carbon::parse($request->date)->format('d/m/Y');
                $payment->save();
                return redirect()->back()->with('success','CUSTOMER ADDED SUCCESS');
            }
            else{
                $itemsTotal = Item::where('order_id',null)->sum('amount');
                if($itemsTotal==$request->input('totalAmount')){
                    $stock = new User();
                    $stock->first_name = $request->input('first_name');
                    $stock->last_name = $request->input('last_name');
                    $stock->phone = $request->input('phone');
                    $stock->balance ='0';
                    $stock->location = $request->input('location');
                    $stock->role = '1';
                    $stock->password = Hash::make('password');
                    $stock->save();
                    $order = new Order();
                    $order->user_id = $stock->id;
                    $order->worker_id = $request->input('worker_id');
                    $order->payment_method = $request->input('payment_method');
                    $order->amount = $request->input('totalAmount');
                    $order->order_amount = $request->input('subTotal');
                    $order->balance = $stock->balance;
                    $order->date = Carbon::parse($request->date)->format('d/m/Y');
                    $order->save();
                    $update = Item::where('order_id',null)->update(['order_id'=>$order->id]);
                    $payment = new Payment();
                    $payment->order_id = $order->id;
                    $payment->user_id = $request->input('customer_id');
                    $payment->payment_method = $request->input('payment_method');
                    $payment->amount = $request->input('totalAmount');
                    $payment->date = Carbon::parse($request->date)->format('d/m/Y');
                    $payment->save();
                    return redirect()->back()->with('success','CUSTOMER ADDED SUCCESS');
                }

                elseif ($itemsTotal>$request->input('totalAmount')){
                    $nBal = $itemsTotal - $request->input('totalAmount');
                    $stock = new User();
                    $stock->first_name = $request->input('first_name');
                    $stock->last_name = $request->input('last_name');
                    $stock->phone = $request->input('phone');
                    $stock->balance =$nBal;
                    $stock->location = $request->input('location');
                    $stock->role = '1';
                    $stock->password = Hash::make('password');
                    $stock->save();
                    $order = new Order();
                    $order->user_id = $stock->id;
                    $order->worker_id = $request->input('worker_id');
                    $order->payment_method = $request->input('payment_method');
                    $order->amount = $request->input('totalAmount');
                    $order->order_amount = $request->input('subTotal');
                    $order->balance = $stock->balance;
                    $order->date = Carbon::parse($request->date)->format('d/m/Y');
                    $order->save();
                    $update = Item::where('order_id',null)->update(['order_id'=>$order->id]);
                    $payment = new Payment();
                    $payment->order_id = $order->id;
                    $payment->user_id = $request->input('customer_id');
                    $payment->payment_method = $request->input('payment_method');
                    $payment->amount = $request->input('totalAmount');
                    $payment->date = Carbon::parse($request->date)->format('d/m/Y');
                    $payment->save();
                    return redirect()->back()->with('success','CUSTOMER ADDED SUCCESS');

                }
                else{
                    $nGetBalance = $itemsTotal-$request->input('totalAmount');
                    $stock = new User();
                    $stock->first_name = $request->input('first_name');
                    $stock->last_name = $request->input('last_name');
                    $stock->phone = $request->input('phone');
                    $stock->balance =$nGetBalance;
                    $stock->location = $request->input('location');
                    $stock->role = '1';
                    $stock->password = Hash::make('password');
                    $stock->save();
                    $order = new Order();
                    $order->user_id = $stock->id;
                    $order->worker_id = $request->input('worker_id');
                    $order->payment_method = $request->input('payment_method');
                    $order->amount = $request->input('totalAmount');
                    $order->order_amount = $request->input('subTotal');
                    $order->balance = $stock->balance;
                    $order->date = Carbon::parse($request->date)->format('d/m/Y');
                    $order->save();
                    $update = Item::where('order_id',null)->update(['order_id'=>$order->id]);
                    $payment = new Payment();
                    $payment->order_id = $order->id;
                    $payment->user_id = $request->input('customer_id');
                    $payment->payment_method = $request->input('payment_method');
                    $payment->amount = $request->input('totalAmount');
                    $payment->date = Carbon::parse($request->date)->format('d/m/Y');
                    $payment->save();
                    return redirect()->back()->with('success','CUSTOMER ADDED SUCCESS');
                }
            }

        }
        else{
            $order = new Order();
            $order->payment_method = $request->input('payment_method');
            $order->amount = $request->input('totalAmount');
            $order->order_amount = $request->input('subTotal');
            $order->date = Carbon::parse($request->date)->format('d/m/Y');
            $order->save();
            $update = Item::where('order_id',null)->update(['order_id'=>$order->id]);
            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->user_id = $request->input('customer_id');
            $payment->payment_method = $request->input('payment_method');
            $payment->amount = $request->input('totalAmount');
            $payment->date = Carbon::parse($request->date)->format('d/m/Y');
            $payment->save();
            return redirect()->back()->with('success','ORDER PROCESSED SUCCESS');

        }

    }
    public function eWorker(Request $request){
            $stock = User::find($request->id);
            $stock->first_name = $request->input('first_name');
            $stock->last_name = $request->input('last_name');
            $stock->idno = $request->input('idno');
            $stock->role = '0';
            $stock->phone = $request->input('phone');
            $stock->dashboard = $request->input('dashboard');
            $stock->orders = $request->input('orders');
            $stock->customers = $request->input('customers');
            $stock->mpesa = $request->input('mpesa');
            $stock->cash = $request->input('cash');
            $stock->stock = $request->input('stock');
            $stock->password = Hash::make('password');
            $stock->save();
            return redirect()->back()->with('success','WORKER EDITED SUCCESS');
    }
    public function eCustomer(Request $request){
            $stock = User::find($request->id);
            $stock->first_name = $request->input('first_name');
            $stock->last_name = $request->input('last_name');
            $stock->role = '1';
            if ($request->debtManagement==1){
                $finalDebt = $stock->balance - $request->amount;
            }
            else{
                $finalDebt = $stock->balance + $request->amount;

            }
        $stock->balance = $finalDebt;
        $stock->location = $request->input('location');
        $stock->payment_method = $request->input('payment_method');
        if ($request->date and $request->debtManagement==0){
            $stock->due_date = Carbon::parse($request->date)->format('d/m/Y');
        }
        else{
            $stock->due_date = null;

        }

        $stock->phone = $request->input('phone');
            $stock->password = Hash::make('password');
            $stock->save();
            if ($request->amount and $request->debtManagement==1){
                $payment = new Payment();
                $payment->user_id = $stock->id;
                $payment->payment_method = $request->input('payment_method');
                $payment->amount = $request->input('amount');
                $payment->date = Carbon::parse($request->date)->format('d/m/Y');
                $payment->save();
            }
            return redirect()->back()->with('success','CUSTOMER EDITED SUCCESS');
    }
    public function eStock(Request $request){
        $stock = Stock::find($request->id);
            $stock->item_name = $request->input('item_name');
            $stock->item_amount = $request->input('item_amount');
            $stock->item_full_quantity = $request->input('item_full_quantity');
            $stock->item_empty_quantity = $request->input('item_empty_quantity');
            $stock->item_date = Carbon::now();
            $stock->save();
            return redirect()->back()->with('success','ITEM UPDATED SUCCESS');
    }
    public function editStock(Request $request){
        $output = "";
        $out = "";
        $stock = Stock::find($request->id);
        $out = $stock->item_name;
        $output = '
<input type="hidden" name="id" value="'.$stock->id.'">
                     <div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="item_name" value="'.$stock->item_name.'">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" name="item_amount" value="'.$stock->item_amount.'">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Quantity/Full</label>
                            <input type="text" class="form-control" name="item_full_quantity" value="'.$stock->item_full_quantity.'">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Quantity/Empty</label>
                            <input type="text" class="form-control" name="item_empty_quantity" value="'.$stock->item_empty_quantity.'">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Save</button>
        ';

        return response($output);
    }
    public function sell(Request $request){
        $output = "";
        $stock = Stock::find($request->id);
        $output = $stock;

        return response($output);
    }
    public function editOrder(Request $request){
        $output = "";
        $stock = Item::find($request->id);
        $output =$stock;

        return response($output);
    }
    public function editWorker(Request $request){
        $output = "";
        $user = User::find($request->id);
        $output =$user;

        return response($output);
    }
    public function cancelOrder(Request $request){
        $del = Item::find($request->item_id);
        if ($del->full_quantity>1){
            $fullQ = $del->full_quantity-1;
            $emptyQ = $del->empty_quantity-1;
            $updateQ = Item::where('stock_id',$request->stock_id)->update(['full_quantity'=>$fullQ,'empty_quantity'=>$emptyQ]);
            $stock = Stock::find($request->stock_id);
            $full = $stock->item_full_quantity + $del->full_quantity;
            $empty = $stock->item_empty_quantity - $del->empty_quantity;
            $update = Stock::where('id',$request->stock_id)->update(['item_full_quantity'=>$full,'item_empty_quantity'=>$empty]);
            return redirect()->back()->with('success','ITEM REMOVED SUCCESS');
        }
        else{
            $stock = Stock::find($request->stock_id);
            $full = $stock->item_full_quantity + $del->full_quantity;
            $empty = $stock->item_empty_quantity - $del->empty_quantity;
            $update = Stock::where('id',$request->stock_id)->update(['item_full_quantity'=>$full,'item_empty_quantity'=>$empty]);
            $del->delete();
            return redirect()->back()->with('success','ITEM REMOVED SUCCESS');
        }

    }
    public function eOrder(Request $request){
        $edit = find($request->id);
        $edit->full_quantity = $request->input('item_full_quantity');
        $edit->empty_quantity = $request->input('item_empty_quantity');
        $edit->save();
        return redirect()->back()->with('success','ORDER EDITED SUCCESS');
    }
    public function getUserDetail(Request $request){
        $output ="";
        $user = User::find($request->id);
        if ($user){
            $item = Item::where('order_id',null)->sum('amount');
            $total = $item + $user->balance;
            $output='
                                            <div class="form-group" id="balance">
                                                        <label>Balance</label>
                                                        <input type="text" class="form-control" name="balance" value="'.$user->balance.'" id="bal">
                                                    </div>
                                                    <div class="form-group" id="total">
                                                        <label>Order Amount</label>
                                                        <input type="text" class="form-control" name="subTotal" value="'.$item.'">
                                                    </div>
                                                    <div class="form-group" id="totals">
                                                        <label>Total</label>
                                                        <input type="text" class="form-control" name="totalAmount" value="'.$total.'" id="tots">
                                                    </div>
        ';
        }
        else{
            $item = Item::where('order_id',null)->sum('amount');
            $total = Item::where('order_id',null)->sum('amount');
            $output='
                                            <div class="form-group" id="balance">
                                                        <label>Balance</label>
                                                        <input type="text" class="form-control" name="balance" value="" id="bal">
                                                    </div>
                                                    <div class="form-group" id="total">
                                                        <label>Order Amount</label>
                                                        <input type="text" class="form-control" name="subTotal" value="'.$item.'">
                                                    </div>
                                                    <div class="form-group" id="totals">
                                                        <label>Total</label>
                                                        <input type="text" class="form-control" name="totalAmount" value="'.$total.'" id="tots">
                                                    </div>
        ';
        }

        return response($output);
    }
    public function getTotal(Request $request){
        $output ="";
        $total = Item::where('order_id',null)->sum('amount');
        $output='
                                                   <div class="form-group" id="totals">
                                                        <label>Total</label>
                                                        <input type="text" class="form-control" name="totalAmount" value="'.$total.'" id="tots">
                                                    </div>
        ';
        return response($output);
    }
    public function newBal(Request $request){
        $output = "";
        $total = Item::where('order_id',null)->sum('amount');
        $output = $total + $request->id;
        return response($output);
    }
    public function newTotal(Request $request){
        $output = "";
        $output = Item::where('order_id',null)->sum('amount');
        return response($output);
    }
    public function newDynamicBal(Request $request){
        $output = "";
        $itemSum = Item::where('order_id',null)->sum('amount');
        $bal = User::find($request->user_id);
        $balance = $bal->balance;
        $bbb = $itemSum - $request->id;
        $output = $balance + $bbb;
        return response($output);
    }

}
