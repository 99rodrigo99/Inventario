@extends('layouts.app2')
<!-- © 2020 Copyright: Tahu Coding -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" style="min-height: 85vh">
                <div class="card-header bg-white"><h4 class="font-weight-bold">Historial de facturas</h4></div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <th>No</th>
                            <th>Numero de factura</th>
                            <th>Vendedor</th>
                            <th>Pago</th>
                            <th>Total</th>
                            <th>Imprimir</th>
                        </tr>
                        @foreach ($history as $index=>$item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$item->invoices_number}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{number_format($item->pay, 0, ',', '.')}}</td>
                                <td>{{number_format($item->total, 0, ',', '.')}}</td>
                            <td><a href="{{url('/transcation/laporan', $item->invoices_number )}}" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a></td>
                            </tr>
                        @endforeach                        
                    </table>
                    <div class="mt-5">{{ $history->links() }}</div>
                </div>
            </div>
    </div>
</div>
</div>
    
@endsection