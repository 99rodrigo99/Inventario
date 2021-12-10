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
                                <form action="{{ url('/transcation') }}" method="get"
                                    class="navbar-search form-inline mr-3 d-none d-md-flex ml-lg-auto">
                                    <div class="form-group mb-0">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input class="form-control" name="search" placeholder="Buscar" type="text">
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
                                    <th scope="col">Precio</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <form action="{{ url('/transcation/addproduct', $product->id) }}" method="POST">
                                        @csrf
                                        @if ($product->qty == 0)
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
                                                    {{ number_format($product->price, 0, ',', '.') }}
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger">Agotado</button>
                                                </td>
                                            </tr>
                                        @else
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
                                                    {{ number_format($product->price, 0, ',', '.') }}
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-success">Agregar</button>
                                                </td>
                                            </tr>
                                        @endif
                                    </form>
                                @endforeach
                            </tbody>
                        </table>
                        <div>{{ $products->links() }}</div>
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
                                <h3 class="mb-0"><input type="text" class="form-control" placeholder="Nombre">
                                </h3>
                            </div>
                            <div class="col-4">
                                <h3 class="mb-0"><input type="text" class="form-control"
                                        placeholder="Dirección"></h3>
                            </div>
                            <div class="col-4">
                                <h3 class="mb-0"><input type="text" class="form-control" placeholder="Teléfono">
                                </h3>
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
                                @php
                                    $no = 1;
                                @endphp
                                @forelse($cart_data as $index=>$item)
                                    <tr>
                                        <th class="col-1" scope="row">
                                            <form action="{{ url('/transcation/decreasecart', $item['rowId']) }}"
                                                method="POST" style='display:inline;'>
                                                @csrf
                                                <button class="btn btn-sm btn-info"
                                                    style="display: inline;padding:0.4rem 0.6rem!important"><i
                                                        class="fas fa-minus"></i></button>
                                            </form>
                                            <a style="display: inline">{{ $item['qty'] }}</a>
                                            <form action="{{ url('/transcation/increasecart', $item['rowId']) }}"
                                                method="POST" style='display:inline;'>
                                                @csrf
                                                <button class="btn btn-sm btn-primary"
                                                    style="display: inline;padding:0.4rem 0.6rem!important"><i
                                                        class="fas fa-plus"></i></button>
                                            </form>
                                        </th>
                                        <td>
                                            {{ Str::words($item['name'], 3) }}
                                        </td>
                                        <td>
                                            $ {{ number_format($item['pricesingle'], 0, ',', '.') }}
                                        </td>
                                        <td>
                                            $ {{ number_format($item['price'], 0, ',', '.') }}
                                        </td>
                                        <td>
                                            <form action="{{ url('/transcation/removeproduct', $item['rowId']) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Carro vacio</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">Total</h3>
                            </div>
                            <div class="col-6 text-right">
                                <h2>{{ number_format($data_total['total'], 0, ',', '.') }}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 text-right">
                                <form action="{{ url('/transcation/clear') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-success" data-toggle="modal"
                                    data-target="#fullHeightModalRight">Facturar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade right" id="fullHeightModalRight" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
        <div class="modal-dialog modal-full-height modal-right" role="document">

            <!-- Sorry campur2 bahasa indonesia sama inggris krn kebiasaan make b.inggris eh ternyata buat aplikasi buat indonesia jadi gini deh  -->
            <div class="modal-content">
                <div class="modal-header indigo">
                    <h6 class="modal-title w-100 text-light" id="myModalLabel">Facturación</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/transcation/bayar') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="oke">Pago</label>
                            <input id="oke" class="form-control" type="number" name="bayar"
                                value="{{ $data_total['total'] }}" autofocus />
                        </div>
                        <h3 class="font-weight-bold">Total:</h3>
                        <h1 class="font-weight-bold mb-5">$ {{ number_format($data_total['total'], 0, ',', '.') }}</h1>
                        <input id="totalHidden" type="hidden" name="totalHidden" value="{{ $data_total['total'] }}" />
                </div>

                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    @if ($data_total['total'] > 0)
                        <button type="submit" class="btn btn-success">Facturar</button>
                    @endif
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<!-- © 2020 Copyright: Tahu Coding -->
<!-- Ini error harusnya bisa dinamis ambil value dari controller tp agar cepet ya biar aja gini silahkan modifikasi  -->
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @if (Session::has('error'))
        <script>
            toastr.error(
                'Telah mencapai jumlah maximum Product | Silahkan tambah stock Product terlebih dahulu untuk menambahkan'
            )
        </script>
    @endif

    @if (Session::has('errorTransaksi'))
        <script>
            toastr.error(
                'Transaksi tidak valid | perhatikan jumlah pembayaran | cek jumlah product'
            )
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            toastr.success(
                'Transaksi berhasil | Thank Your from Tahu Coding'
            )
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#fullHeightModalRight').on('shown.bs.modal', function() {
                $('#oke').trigger('focus');
            });
        });

        oke.oninput = function() {
            let jumlah = parseInt(document.getElementById('totalHidden').value) ? parseInt(document.getElementById(
                'totalHidden').value) : 0;
            let bayar = parseInt(document.getElementById('oke').value) ? parseInt(document.getElementById('oke')
                .value) : 0;
            let hasil = bayar - jumlah;
            document.getElementById("pembayaran").innerHTML = bayar ? 'Rp ' + rupiah(bayar) + ',00' : 'Rp ' + 0 +
                ',00';
            document.getElementById("kembalian").innerHTML = hasil ? 'Rp ' + rupiah(hasil) + ',00' : 'Rp ' + 0 +
                ',00';

            cek(bayar, jumlah);
            const saveButton = document.getElementById("saveButton");

            if (jumlah === 0) {
                saveButton.disabled = true;
            }

        };

        function cek(bayar, jumlah) {
            const saveButton = document.getElementById("saveButton");

            if (bayar < jumlah) {
                saveButton.disabled = true;
            } else {
                saveButton.disabled = false;
            }
        }

        function rupiah(bilangan) {
            var number_string = bilangan.toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        }
    </script>

@endpush

@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
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

        html {
            overflow: scroll;
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 0px;
            /* Remove scrollbar space */
            background: transparent;
            /* Optional: just make scrollbar invisible */
        }

        /* Optional: show position indicator in red */
        ::-webkit-scrollbar-thumb {
            background: #FF0000;
        }

        .cart-btn {
            position: absolute;
            display: block;
            top: 5%;
            right: 5%;
            cursor: pointer;
            transition: all 0.3s linear;
            padding: 0.6rem 0.8rem !important;

        }

        .productCard {
            cursor: pointer;

        }

        .productCard:hover {
            border: solid 1px rgb(172, 172, 172);

        }

    </style>
    <!-- © 2020 Copyright: Tahu Coding -->
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
