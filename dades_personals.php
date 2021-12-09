<?php
echo 
"<div class='lateral'> 
<b>ID de sessió:</b> " .session_id()."<br>".
"<b>ID d'Usuari: </b>".$_SESSION["check_user"] -> getIdUser()."<br>".
"<input type='button' value='Tanca sessió'>".
"</div>";
?>