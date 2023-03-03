

# Modelo MVC

MVC es una propuesta de arquitectura del software utilizada para separar el código por sus distintas responsabilidades, manteniendo distintas capas que se encargan de hacer una tarea muy concreta, lo que ofrece beneficios diversos.

# Modelo
Es la capa donde se trabaja con los datos, por tanto contendrá mecanismos para acceder a la información y también para actualizar su estado.

# Vista

Las vistas, como su nombre nos hace entender, contienen el código de nuestra aplicación que va a producir la visualización de las interfaces de usuario, o sea, el código que nos permitirá renderizar los estados de nuestra aplicación en HTML. 

# Controlador

Contiene el código necesario para responder a las acciones que se solicitan en la aplicación, como visualizar un elemento, realizar una compra, una búsqueda de información, etc.
## Vista
# Ejemplo de Vista
<?php 
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TIENDA</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <style>
        body {
            background-color: #222;
  font-family: 'Raleway', sans-serif;
  background-image: linear-gradient(to bottom right, white, black);
  background-size: cover;
  background-position: center;
        }
        .container {
            background-color: rgba(0,0,0,0.8);
            padding: 30px;
            border-radius: 10px;
        }
        h1 {
            color: white;
            text-align: center;
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 40px;
            text-shadow: 2px 2px #000000;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 1rem;
            background-color: #212121;
            color: #ffffff;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        /* Estilo para las celdas de la tabla */
        td, th {
            border: 1px solid white;
            padding: 0.75rem;
            vertical-align: top;
            font-family: 'Lora', serif;
        }

        /* Estilo para la cabecera de la tabla */
        thead th {
            vertical-align: bottom;
            border-bottom: 2px solid white;
        }

        /* Estilo para las filas impares de la tabla */
        tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Estilo para el botón de buscar */
        #btnbus {
            display: inline-block;
  padding: 12px 24px;
  margin: 10px;
  font-size: 18px;
  font-weight: bold;
  text-transform: uppercase;
  color: white;
  background-color: yellow;
  border-radius: 30px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
  transition: all 0.2s ease-in-out;
        }

#btnbus:hover {
  background-color: #0069d9;
}

/* Estilo para la tabla vacía */
table.empty td {
  text-align: center;
  font-style: italic;
}

a{
  width: 100px;
  height: 70;
}


    </style>


    
  <script >
    function Eliminar(id)
    {
        if(confirm("Esta seguro que desea confirmar la eliminacion?"))
        {
            window.location = "Controlador.php?id_eliminar=" + id;
        }
    }
    function Modificar(id)
    {
        window.location = "Controlador.php?id_mod=" + id;
    }
</script>
<body>
    
<a style="background-color: black;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
            font-family: 'Raleway', sans-serif;
            font-size: 18px;
            margin-left: 10px;" class="nav-link text-uppercase logout-btn" href="../logout.php">cerrar sesión</a>


<!--REGISTRAR-->
 <section class="page-section">
            <div class="container">
<div align="center">
                    <h1 class="cont AC " style="color: white;"> Registrar Categorias</h1>

<form action="Controlador.php" id="frmreg" name="frmreg" method="POST">
    <div class="cont AC tlP">
            <input class="InputN " type="text" id="txtid" name="txtid" placeholder="id" value="<?php echo @$cat_mod[0][0];?>" readonly>
        <br>
        <br>       
            <input class="InputN " type="text" id="txtcat" name="txtcat" placeholder="categoria" value="<?php echo @$cat_mod[0][1];?>">
        <br> 
        <br>
            <input type="submit" id="btnreg" name="btnreg" value="<?php 
                if(isset($_GET['id_mod']))
                    {
                        echo 'Modificar';
                    }
                else
                    {
                        echo 'Registrar';
                    } ?>">
    </div>
</form>
<!--BUSCAR-->
<form action="controlador.php" id="frmbuscar" name="frmbuscar" method="POST">
    <div class="AC cont " >

        <h3 class="mx-auto my-0 text-uppercase" style="color:white">Buscar</h3>
        <br>
            <div>
                <input type="txtnomB" name="txtnomB" placeholder="Buscar" >
                <input type="submit"  id="btnbus" name="btnbus" value="Buscar" >
            </div>
            <br>
            <table class="table table-hover text-center" style="color: white;width: 600px">
                <tr>
                    <td>Id</td>
                    <td>categoria</td>
                    <td>Accion 1</td>
                    <td>Accion 2</td>
                </tr>
<?php foreach (@$resu as $row) {?>
    <tr>
        <td><?php echo $row[0]; ?></td>
        <td><?php echo $row[1]; ?></td>
        <td><input type="button" class="" name="btnEliminar" id="btnEliminar" value="Eliminar" onclick="javascript: Eliminar('<?php echo $row[0]; ?>')"></td>
        <td><input type="button" class="" name="btnMod" id="btnMod" value="Modificar" onclick="javascript: Modificar('<?php echo $row[0]; ?>')"></td>
    </tr>
<?php } ?>
            </table>
            <br><br>
    </div>
</form>
</div>
</div>
</section>
<!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
</body>
</html>





## Modelo
# Ejemplo de Modelo
<?php 
require '../BD/conexion_bd.php';

class cat extends BD_PDO
{
	function Insertar ($categoria)
	{
		$this -> Ejecutar_Instruccion ("Insert into categoria (categorias) values ('$categoria')");

		echo '<script>alert("Dato INSERTADO correctamente :D");</script>';
	}
	function Modificar ($id,$valor)
	{

		$this -> Ejecutar_Instruccion("Update categoria SET categorias = '$valor' WHERE id = '$id'");
		

		echo '<script>alert("Dato ACTUALIZADO correctamente :D");</script>' ;

	}
	function Buscar($DaB)
	{
		$resu = $this -> Ejecutar_Instruccion("Select * from categoria where categorias like '%$DaB%'");
		return $resu;
	}
	function Eliminar($id)
	{
		$this -> Ejecutar_Instruccion("Delete from categoria where id = '$id'");
		echo '<script>alert("Dato ELIMINADO correctamente :D");</script>';
	}
}

?>

## Conexion a BD
?php 

require 'config.php';

class BD_PDO
{
	//public $tot_reg;
	//public $ultimo_id;

	public function getConection ()	
	{
		try 
		{
			$conexion = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME.";",DB_USER,DB_PASS);			       	
		}
		catch(PDOException $e)
		{
	        echo "Failed to get DB handle: " . $e->getMessage();
	        exit;    
	    }
	    return $conexion;
	}

	public function Ejecutar_Instruccion($consulta_sql)
	{
		# code...
		$conexion = $this->getConection();
        $rows = array();        
		$query=$conexion->prepare($consulta_sql);
		if(!$query)
		{
         	return "Error al mostrar";
        }
		else
		{			
        	$query->execute();   
           	//$this->tot_reg = $query->rowCount();     	
        	while ($result = $query->fetch())
			{
            	$rows[] = $result;
          	}			
            return $rows;
        }
	}
}

## Conexion

<?php 

define('DB_SERVER', 'localhost');
define('DB_NAME', 'mvc');
define('DB_USER', 'root');
define('DB_PASS', '');

 ?>

