@extends('layouts.app1')

@section('content')
    <div class="mt-2">
        <div class="row mt-5">
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">Productos</h3>
                            </div>
                            <div class="col-6 text-right">
                                <!-- Form -->
                                <form action="{{ url('/pos') }}" method="get" class="navbar-search form-inline mr-3 d-none d-md-flex ml-lg-auto">
                                    <div class="form-group mb-0">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Buscar" type="text">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Al clima</th>
                                    <th scope="col">Frio</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        @foreach ($products as $product)
                                        <div class="media align-items-center">
                                            <a href="#" class="avatar rounded-circle mr-3">
                                                <img alt=""
                                                    src="https://toctocdelivery.co/wp-content/uploads/2019/04/aguila-cerveza.png">
                                            </a>
                                        </div>
                                    </th>
                                    <td>
                                        Aguila Original 330 X30
                                    </td>
                                    <td>
                                        55.000
                                    </td>
                                    <td>
                                        56.000
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success">Agregar</button>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">Facturación</h3>
                            </div>
                            <div class="col-6 text-right">
                                <!-- Form -->
                                <form class="navbar-search form-inline mr-3 d-none d-md-flex ml-lg-auto">
                                    <div class="form-group mb-0">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Buscar" type="text">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-4">
                                <h3 class="mb-0"><input type="text" class="form-control" placeholder="Nombre"></h3>
                            </div>
                            <div class="col-4">
                                <h3 class="mb-0"><input type="text" class="form-control" placeholder="Dirección"></h3>
                            </div>
                            <div class="col-4">
                                <h3 class="mb-0"><input type="text" class="form-control" placeholder="Teléfono"></h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th class="col-1" scope="col">Cantidad</th>
                                    <th scope="col">Nombre</th>
                                    <th class="col-3" scope="col">Precio</th>
                                    <th scope="col">total</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="col-1" scope="row">
                                        <input type="text" class="form-control text-center" value="1">
                                    </th>
                                    <td>
                                        Aguila Original 330 X30
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" value="55.000" class="form-control"
                                                aria-label="Dollar amount (with dot and two decimal places)">
                                        </div>
                                    </td>
                                    <td>
                                        $55.000
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger">X</button>
                                    </td>
                                </tr>

                                <tr>
                                    <th class="col-1" scope="row">
                                        Ennvio
                                    </th>

                                    <td>

                                    </td>

                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" value="0" class="form-control"
                                                aria-label="Dollar amount (with dot and two decimal places)">
                                        </div>
                                    </td>

                                    <td>
                                        $0
                                    </td>

                                    <td>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">Total</h3>
                            </div>
                            <div class="col-6 text-right">
                                <h2>55.000</h2>
                            </div>
                            <div class="col text-right mt-2">
                                <button type="button" class="btn btn-success">Facturar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
