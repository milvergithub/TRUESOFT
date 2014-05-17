<?php
if(isset($_POST["submit"]))
{
	$nombre_archivo1 = $_FILES["archivo1"]["name"];
	$nombre_archivo2 = $_FILES["archivo2"]["name"];
	$tamano_archivo1 = $_FILES["archivo1"]["size"];
	$tamano_archivo2 = $_FILES["archivo2"]["size"];

		//$aux="application/pdf";
  		$ext1=strtolower(array_pop(explode(".",$nombre_archivo1)));
  		$ext2=strtolower(array_pop(explode(".",$nombre_archivo2)));
	
			if($ext1=="pdf")
			{
				if(move_uploaded_file($_FILES["archivo1"]["tmp_name"], "files/".$nombre_archivo1))
				{	echo "El archivo " . $nombre_archivo1 . " se ha transferido correctamente. <br />";
					echo "<a href='".$nombre_archivo1."'>".$nombre_archivo1."</a> <br/>";
				}
			}
			else
			{

				echo "El ".$nombre_archivo1." no corresponde al tipo de archivo PDF.";
				echo "<br/>";
			}
			if ($ext2=="pdf")
			{
				echo $ext2;
				if(move_uploaded_file($_FILES["archivo2"]["tmp_name"], "files/".$nombre_archivo2))
				{	echo "El archivo " . $nombre_archivo2 . " se ha transferido correctamente. <br />";
					echo "<a href='".$nombre_archivo2."'>".$nombre_archivo2."</a> <br/>";
				}
			}
			else
			{
				echo "El ".$nombre_archivo2." no corresponde al tipo de archivo PDF.";
				echo "<br/>";
			}
		echo "<br/>";
		echo "<a href = 'Subir.php'> Volver Atras</a>";
}

?>