<?php
    session_start();
    require_once "./vendor/autoload.php";
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $htmltopdf = $_SESSION["dompdf"];
    $dompdf->loadHtml($htmltopdf);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('newfile', array('Attachment'=>0));
    //$dompdf->stream();
?>