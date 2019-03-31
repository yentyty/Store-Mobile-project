<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />
    <title>Mobile Store</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="backend/css/pdf.css">
    <script>
    $('#printInvoice').click(function(){
                Popup($('.invoice')[0].outerHTML);
                function Popup(data)
                {
                    window.print();
                    return true;
                }
            });
    </script>
</head>
<body>
<div id="invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row"  style="margin-bottom:-5em;">
                    <div class="col">
                        <img src="backend/logo-admin/logo2.png" data-holder-rendered="true" width="30%" height="30%">
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                           Mobile Store
                            </a>
                        </h2>
                        <div>Tam Ky - Quang Nam</div>
                        <div>(123) 456-789</div>
                        <div>yentyty@gmail.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts" style="margin-bottom:-3em;">
                    <div class="col invoice-to" style="width:50%;">
                        <div style="font-size:1em;">INVOICE TO:</div>
                        <div class="to" style="color:red;">Customer: {{ $bill->username }}</div>
                        <div class="address" style="font-size:13px;">Address: {{ $bill->address }}</div>
                        <div class="email" style="font-size:13px;">Email: {{ $bill->email }}</div>
                    </div>
                    <div class="col invoice-details">
                        <h2 class="invoice-id">Invoice Code: {{ $bill->id }}</h2>
                        <div class="date" style="font-size:13px;">employees: @if(Auth::user()){{Auth::user()->name}} @endif</div>
                        <div class="date" style="font-size:13px;">Date of Invoice: {{ $bill->created_at }}</div>
                    </div>
                </div>
                <table style="background:white; width:100%;">
                    <thead>
                        <tr style="color:blue;">
                            <th>#</th>
                            <th>Product name</th>
                            <th>Storage</th>
                            <th>Color</th>
                            <th>Quantity</th>
                            <th>Promotion</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bill->billdetails as $key => $item)
                        <tr>
                            <td>{{ $key++ }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->product_storage }}</td>
                            <td>{{ $item->product_color }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->product_promotion}}</td>
                            <td>{{ number_format($item->amount, 0, ',' ,'.') }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="6" style="text-align:right; font-weight:bold;font-size:1.2em;">Total</td>
                            <td>{{ number_format($bill->total, 0, ',' ,'.') }} ( VND )</td>
                        </tr>
                </table>
            </main>
            <div class="thanks">Thank you!</div>
            <div class="thanks">See you again!</div>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
</body>
</html>
