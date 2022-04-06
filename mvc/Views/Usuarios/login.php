<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/store.css">
    <title>Inicio de Sesión - Administración</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h2 class="text-center">
                    Inicio de sesión
                </h2>
                <br><br>
                <div class="card">
                    <div class="card-body">
                        <form action="admin.php" method="POST">

                            <label for="user">Nombre de Usuario:</label>
                            <input type="text" name="user" id="user" class="form-control" required>
                            <br><br>
                            <label for="pass">Contraseña:</label>
                            <input type="password" name="pass" id="pass" class="form-control" required>
                            <br><br>
                            <input type="submit" name="entrar" id="entrar" value="Entrar" class="btn btn-success mx-2">
                            <a href="index.php" class="btn btn-warning">Regresar</a>
                        </form>
                    </div>
                </div>
                <?php

                if (isset($_GET['failed'])) {
                    if ($_GET['failed']==1) {
                        echo '<br><div class="alert alert-danger" role="alert">Credenciales Inválidas</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    </div>

</body>
</html>