<?php
    session_start();
    //require_once './vendor/dompdf/autoload.php';
    require_once "./vendor/autoload.php";
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $htmltopdf = $_SESSION["dompdf"];
    //$html = file_get_contents($htmltopdf);
    $dompdf->loadHtml($htmltopdf);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('newfile', array('Attachment'=>0));
    //$dompdf->stream();
?>