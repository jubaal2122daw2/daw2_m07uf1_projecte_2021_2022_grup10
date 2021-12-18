<?php
    include_once("Classes/Usuari.php");
    include_once("Classes/Bibliotecari.php");


    function div_lateral($usuari_iniciat,$session_id,$session_iduser,$session_nom)
    {
        switch ($usuari_iniciat) {
            case "check_user":
                echo "
                    <div class='lateral'> 
                    <b>ID sessió:</b> " . $session_id . "<br>" .
                    "<b>ID Usuari: </b>" . $session_iduser . "<br>" .
                    "<b>Nom Usuari: </b>" . $session_nom . "<br>" .
                    "<a href='logout.php'>Tancar sessió</a>" .
                    "</div>";
                break;

            case "check_biblio":
                echo "
                    <div class='lateral'> 
                    <b>ID sessió:</b> " . session_id() . "<br>" .
                    "<b>ID Usuari: </b>" . $_SESSION["check_biblio"]->getIdUser() . "<br>" .
                    "<b>Nom Usuari: </b>" . $_SESSION["check_biblio"]->getNomUser() . "<br>" .
                    "<a href='logout.php'>Tancar sessió</a>" .
                    "</div>";
                break;

            case "check_biblioc":
                echo "
                    <div class='lateral'> 
                    <b>ID sessió:</b> " . session_id() . "<br>" .
                    "<b>ID Usuari: </b>" . $_SESSION["check_biblioc"]->getIdUser() . "<br>" .
                    "<b>Nom Usuari: </b>" . $_SESSION["check_biblioc"]->getNomUser() . "<br>" .
                    "<a href='logout.php'>Tancar sessió</a>" .
                    "</div>";
                break;
        }
    }
?>