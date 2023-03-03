<?php 
session_start();

if ($_SESSION['PRIVILEGIO']=='1') 
{
	header("Location: controladores/controlador.php");
}
else if ($_SESSION['PRIVILEGIO']=='2') 
{
	header("Location: controladores/controlador_visitante.php");
}
else
{
header("Location:sesion.php");
}

?>