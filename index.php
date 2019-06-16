<?php
require_once('dompdf/autoload.inc.php');

$domPdf = new \Dompdf\Dompdf();
$domPdf->loadHtml('
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VIP Card</title>
    <style>
        body { font-family: sans-serif; color: #e9e9e9; background-color: #fff; }
        .vip-card-pdf-header-infos, .vip-card-pdf-order-infos{
            background-color: #3d3d3d;
            padding: 10px;
            border-radius: 12px;
            border: 1px solid #2a2a2a;
        }
        .vip-card-pdf-header-infos h2,  .vip-card-pdf-order-infos h3,.vip-card-pdf-order-infos p>b{
            color: #ffd560;
        }
        .vip-card-pdf-logo{
            width: 150px;
            height: 151px;
            display: block;
            margin: 10px auto;
            background-image: url("logo.png");
            background-size: 150px;
        }
    </style>
</head>
<body>
    <div class="vip-card-pdf-logo"></div>
    <div class="vip-card-pdf-header-infos">
        <h2>Título do VIP Card (Carga horária) - Quantidade de Pessoas</h2>
        <p><b>Data de emissão:</b> 00/00/0000</p>
        <p><b>Validade:</b> 00/00/0000</p>
    </div>
    <div class="vip-card-pdf-order-infos">
        <h3>Resumo do pedido:</h3>
        <ul>
            <li>Título do VIP Card (Carga horária) Quantidade de Pessoas: <b>R$ 170,00</b></li>
            <li>Adicional 1: <b>R$ 30,00</b></li>
        </ul>
        <p><b>TOTAL:</b> R$ 200,00</p>
    </div>
</body>
</html> 
');
$domPdf->setPaper('A4');
$domPdf->render();

$pdfOutput = $domPdf->output();
file_put_contents('domPdf_test.pdf', $pdfOutput);