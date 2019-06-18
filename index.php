<?php
require_once('dompdf/autoload.inc.php');
// define('DOMPDF_ENABLE_CSS_FLOAT ', true);

$domPdf = new \Dompdf\Dompdf();
$domPdf->loadHtml('
<style>
    body { font-family: sans-serif; color: #4d4d4d; background-color: #fff; }
    .card-pdf-logo{
        width: 115px;
        height: 115px;
        display: block;
        margin: 20px auto;
        background-image: url("logo-for-pdf.png");
    }
    p{
        margin: 0 0 5px;
        font-size: 16px;
    }
    ul p{
        text-align: left;
        margin-bottom: 8px;
    }
    .title{
        margin: 0 0 10px;
        font-size: 18px;
        text-align: center;
        text-transform: uppercase;
    }
    .card-pdf-info-container{
        text-align: center;
        padding: 8px 8px 5px;
        margin: 10px 0;
        border-top: 1px solid #505050;
    }
    .card-pdf-image{
        width: 650px;
        height: 413px;
        display: block;
        margin: auto;
        background-image: url("card-prime-image.jpg");
    }
    .vip-card-code{
        width: 100%;
        display: block;
        text-align: center;
        padding: 10px 0;
        font-size: 20px;
        color: #FFD560;
        background-color: #2A2A2A;
        font-weight: bold;
    }
    .card-pdf-order-total{ text-align: right; }
</style>
<body>
    <div class="card-pdf-logo"></div>
    <div class="card-pdf-info-container">
        <h1 class="title">Urban Card Prime</h1>
        <p><b>Emitido em:</b> 18/06/2019</p>
        <p><b>Valido até:</b> 18/09/2019</p>        
        <p><b>Nome:</b> Luan Novais</p>
        <p><b>CPF:</b> 000.000.000-00</p>
        <p><b>Passaporte:</b> 000000000</p>
    </div>    
    <div class="card-pdf-image"></div>
    <div class="card-pdf-info-container">
        <h2 class="title">CÓDIGO DO CARD</h2>
        <p class="vip-card-code">1ED49BC4-1973-45E4-9C86-DF6E037C7AAC</p>
    </div>
    <div style="page-break-before: always;"></div>
    <div class="card-pdf-logo"></div>
    <div class="card-pdf-info-container">
        <h2 class="title">Resumo do pedido</h2>
        <ul>
            <li>
                <p><b>Urban Card Prime (3h)</b> - R$ 95,00</p>
            </li>
            <li>
                <p><b>Concierge no EMBARQUE</b> - R$ 30,00</p>
            </li>
            <li>
                <p><b>Concierge no DESEMBARQUE</b> - R$ 30,00</p>
            </li>
            <hr>
            <p class="card-pdf-order-total"><b>TOTAL:</b> R$ 155,00</p>
        </ul>
    </div>
</body>
');
$domPdf->setPaper('A4');
$domPdf->render();

$pdfOutput = $domPdf->output();
file_put_contents('domPdf_test.pdf', $pdfOutput);