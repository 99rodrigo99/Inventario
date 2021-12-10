@extends('layouts.app2')
<!-- © 2020 Copyright: Tahu Coding -->
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="min-height: 85vh">
                    <div class="card-header bg-white">
                        <h2>Clientes</h2>
                        <form action="" method="get">
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
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">direccion</th>
                                    <th scope="col">NIT/CC</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                        <tr>
                                            <td>
                                                Rodrigo Humberto González Tafur
                                            </td>
                                            <td>
                                                3192024901
                                            </td>
                                            <td>
                                                calle 25a sur #23a-36
                                            </td>
                                            <td>
                                                1075319554
                                            </td>
                                            <td>
                                                <a type="button" href=""
                                                    class="btn btn-primary">Detalle</a>
                                            </td>
                                        </tr>
                            </tbody>
                        </table>
                        <div class="mt-3">links</div>
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
