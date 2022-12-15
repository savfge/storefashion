@extends('layouts.home')
@section('contnet')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabcart</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>
<div style="margin: 30px;">
    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">{{__('Sudan Dool')}}</h1>
                </div>
                <div class="col-6">
                    
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No.: {{$order->id}}</h2>
                    <p class="sub-heading">Tracking No. fabcart2025 </p>
                    <p class="sub-heading">Order Date: {{\Carbon\Carbon::parse($order->created_at)->format('D , d M Y')}} </p>
                    <p class="sub-heading">Email Address: {{$order->email}} </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading" style="text-align: right;">Full Name: {{$order->fname}} </p>
                    <p class="sub-heading" style="text-align: right;">Address: {{$order->address}} {{$order->address2}} </p>
                    <p class="sub-heading" style="text-align: right;">Phone Number: {{$order->phone}} </p>
                    <p class="sub-heading" style="text-align: right;">City,State,Pincode: {{$order->country->name}} {{$order->state->name}} </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items
                <a href="{{route('sendemail',$order->id)}}" target="_blank" style="float: right" class="btn btn-primary">{{__('Send Email')}}</a>
                <a href="" target="_blank" style="float: right" class="btn btn-dark">{{__('Download')}}</a>
            </h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Grandtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $subtotal=0;
                    @endphp
                    @php
                        $subtotals=0;
                    @endphp
                    @foreach($order->orderitem as $item)
                    @php
                        $subtotal = $item->amount * $item->qty;
                    @endphp
                    @php
                        $subtotals+=$item->amount * $item->qty;
                    @endphp
                    <tr>
                        <td>{{$item->prodect->en_name}}</td>
                        <td>L.E{{$item->prodect->price}}</td>
                        <td>{{$item->qty}}</td>
                        <td>L.E{{$subtotal}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-right">Sub Total</td>
                        <td>L.E{{$subtotals}}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            @foreach($order->transr as $itdw)
            <h3 class="heading">Payment Status:{{$itdw->staus}}</h3>
            @endforeach
            <h3 class="heading">Payment Mode:{{$order->staus}}</h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2023 - Fabcart. All rights reserved. 
                <a href="https://www.fundaofwebit.com/" class="float-right">www.fundaofwebit.com</a>
            </p>
        </div>      
    </div>      
</div>
</body>
</html>
@endsection