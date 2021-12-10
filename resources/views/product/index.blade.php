@extends('layouts.app2')
<!-- © 2020 Copyright: Tahu Coding -->
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="min-height: 85vh">
                    <div class="card-header bg-white">
                        <h2>Productos</h2>
                        <form action="{{ route('products.index') }}" method="get">
                            <div class="row">

                                <!-- Form -->
                                <div class="col-5">
                                    <div class="form-group mb-0 aling-left">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input class="form-control" name="search" placeholder="Buscar" type="text">

                                        </div>
                                    </div>
                                </div>

                                <div class="col text-right">
                                    <a type="button" href="{{ url('/products/create') }}"
                                        class="btn btn-success">Agregar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            @include('layouts.flash-success',[ 'message'=> Session('success') ])
                        @endif

                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio de comrpa</th>
                                    <th scope="col">Precio de venta</th>
                                    <th scope="col">Ganancias</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                        <tr>
                                            <td scope="row">
                                                <div class="media align-items-center">
                                                    <a href="#" class="avatar rounded-circle mr-3">
                                                        <img alt="" src="{{ $product->image }}">
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $product->name }}
                                            </td>
                                            <td>
                                                {{ number_format($product->pricec, 0, ',', '.') }}
                                            </td>
                                            <td>
                                                {{ number_format($product->price, 0, ',', '.') }}
                                            </td>
                                            <td>
                                                {{number_format(($product->price)-($product->pricec), 0, ',', '.') }}
                                            </td>
                                            <td>
                                                <a type="button" href="{{ route('products.edit', $product->id) }}"
                                                    class="btn btn-primary">Detalle</a>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">{{ $products->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .gambar {
            width: 100%;
            height: 175px;
            padding: 0.9rem 0.9rem
        }

        @media only screen and (max-width: 600px) {
            .gambar {
                width: 100%;
                height: 100%;
                padding: 0.9rem 0.9rem
            }
        }

    </style>
@endpush
<!-- © 2020 Copyright: Tahu Coding -->
