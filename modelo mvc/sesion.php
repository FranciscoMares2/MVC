<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TIENDA</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(to bottom, #0f2027, #203a43, #2c5364);
              background-size: cover;
              background-attachment: fixed;
              font-family: 'Open Sans', sans-serif;
              color: #fff;

        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #black;
            padding: 20px;
            border-radius: 10px;
        }

        h2 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            border-bottom: 2px solid #ccc;
            background-color: transparent;
            font-size: 18px;
            color: #fff;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-bottom: 2px solid #000;
            color: #000;
        }

        input[type="submit"] {
    background: #007bff;
  color: #fff;
  padding: 1rem 2rem;
  border-radius: 5px;
  font-size: 1.5rem;
  text-decoration: none;
  text-transform: uppercase;
  box-shadow: 2px 2px 0px rgba(0, 0, 0, 0.2);
  transition: all 0.2s ease-in-out;
  cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #fff;
    color: #1C2833;
    border: 2px solid #1C2833;
}

        span {
  font-family: Arial, sans-serif;
  font-size: 2em;
  color: #333;
  text-shadow: 1px 1px 1px #ccc;

        }

        .card {
  width: 400px;
  height: auto;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  border-radius: 10px;
}

    </style>

</head>
<header>

</header>
<body>
    <?php
    require 'BD/conexion_bd.php';
    $obj = new BD_PDO();
    if (isset($_POST['btniniciar'])) {
        $u = $_POST['txtusuario'];
        $c = $_POST['txtcontrasena'];
        $usuario = $obj->Ejecutar_Instruccion("Select * from usuarios where usuario ='$u' and contrasena ='$c'");
        if (@$usuario[0][0] > 0) {
            echo '<script>alert("Bienvenido");</script>';
            $_SESSION['NOMBRE_US'] = $usuario[0][1];
            $_SESSION['PRIVILEGIO'] = $usuario[0][3];
            header("Location: index.php");
        }
            else
            {
                echo '<script>alert("Usuario NO encontrado");</script>';
            }
        }
     ?>
     <form action="sesion.php" method="post">
                <div class="col-xl-9 mx-auto">
                <div class="row">
                        <div class=" card">
                            <h2 class="site-heading text-center text-faded d-none d-lg-block">
                                <span >INICIO DE SESIÓN</span>
                                
                            </h2>
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                <input type="text" id="txtusuario" name="txtusuario" class="form-control" placeholder="usuario">
                                </div>
                                <div class="col-lg-3"></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                <input type="password" id="txtcontrasena" name="txtcontrasena" class="form-control" placeholder="Contraseña" autocomplete="off">
                            </div>
                        </div>

                        </span>
                        <br>
                        <span>
                            <input type="submit" id="btniniciar" name="btniniciar" class="btn btn-primary btn-l" value="Iniciar sesión">
                        </div>
                    </span>
                    </div>
                </div>
    </form>
  </div>
   
   
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
</body>
</html>