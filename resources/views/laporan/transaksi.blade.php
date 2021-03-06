@extends('layouts.app_print')
<!-- © 2020 Copyright: Tahu Coding -->
@section('content')
<style>
    H1{
        font-size: 1rem;
    }
</style>
    <div >
        <div class="card" style="width: 50rem;">
            <div class="card-body">
                <h1 class="card-title">DEPÓSITO DE CERVEZA EL LLANERO</h1>
                <div class="row">
                    <div class="col-sm-4">
                        <table class="table table-borderless">
                            <tr>
                                <td width="358%"><p>Invoices Number: {{ $transaksi->invoices_number }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="38%"><h3>Vendedor: {{ $transaksi->user->name }}</h3></td>
                            </tr>
                            <tr>
                                <td width="38%"><h3>Fecha: {{ $transaksi->created_at }}</h3></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                <th><h1>C</h1></th>
                                <th><h1>Producto</h1></th>
                            </tr>
                            </thead>
                            <tbody>
                                 @foreach ($transaksi->productTranscation as $index=>$item)
                                    <tr>
                                        <td><h1>{{$item->qty}}</h1></td>
                                        <td><h1>{{$item->product->name}}</h1>
                                        <br>
                                        <h1>$ {{ number_format(($item->product->price)*($item->qty), 0, ',', '.')}}</h1>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>                    
                        </table>
                    </div>
                </div> 
                <h1 class="mt-5">Total: $ {{ number_format($transaksi->total, 0, ',', '.') }}</h1>        
            </div>
        </div>
    </div>
@endsection
