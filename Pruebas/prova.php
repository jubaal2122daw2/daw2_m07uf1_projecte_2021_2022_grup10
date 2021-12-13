<?php
	if( $_POST["metode"] == "PUT" ){
		echo "El mètode enviat és un PUT<br>";
		echo "El nou nom és: ".$_POST["nom"]."<br>";
	}	
	else{
		echo "El mètode enviat és un DELETE<br>";
		echo "Esborrant: ".$_POST["nom"]."<br>";
	}
?>

</html>
	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type">
		<title>EXEMPLES DE FORMULARIS - METHOD SPOOFING</title>	
	</head>  
	<body>
		<font face="Arial">
		<form action="http://localhost/form_met/method_spoofing.php" method="POST">
			<input type="hidden" name="metode" value="PUT" />
			<!--<input type="hidden" name="metode" value="DELETE" />-->
			Nom: 
			<input type="text" name="nom"><br> 
			<input type="submit" value="Envia"/>
		</form>
		</font>
	</body>
</html>
