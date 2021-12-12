@extends('layouts.app2')

@section('content')
<?php
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

$nombreImpresora = "XP-58";
$connector = new WindowsPrintConnector($nombreImpresora);
$printer = new Printer($connector);
# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);

/*
	Ahora vamos a imprimir un encabezado
*/
$printer->text("\n"."Deposito de cerveza el llanero" . "\n");
$printer->text("\n"."NIT: 1075319554-3" . "\n");
$printer->text("Direccion: cll 25a s #23a-36" . "\n"."Canaima"."\n");
$printer->text("Tel: 3177244287" . "\n");
$printer->text("Factura N: ".$transaksi->invoices_number. "\n");
#La fecha también
date_default_timezone_set("America/Bogota");
$printer->text(date("Y-m-d h:i:s") . "\n");
$printer->text("-----------------------------" . "\n");
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->text("CANT  DESCRIPCION  TOTAL.\n");
$printer->text("-----------------------------"."\n");
/*
	Ahora vamos a imprimir los
	productos
*/
	/*Alinear a la izquierda para la cantidad y el nombre*/
    foreach ($transaksi->productTranscation as $index=>$item){
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text( $item->qty."\n");
    $printer->text( $item->product->name."\n");
    $printer->text("$" .number_format(($item->product->price)*($item->qty), 0, ',', '.')."\n");
    }

    
/*
	Terminamos de imprimir
	los productos, ahora va el total
*/
$printer->text("-----------------------------"."\n");
$printer->setJustification(Printer::JUSTIFY_RIGHT);
$printer->text("TOTAL: " .number_format($transaksi->total, 0, ',', '.')."\n");


/*
	Podemos poner también un pie de página
*/
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("Muchas gracias por su compra\n");
$printer->feed(5);
$printer->close();?>
<div class="container">
    <a type="button" href="/transcation" class="btn btn-success">Terminar</a>
</div>
@endsection
    