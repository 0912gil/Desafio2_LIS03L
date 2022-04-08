<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h2 class="text-center">
                    Inicio de sesión
                </h2>
                <br><br>
                <div class="card">
                    <div class="card-body">
                        <form action="?c=usuario&a=Loged" method="POST">

                            <label for="correo">Nombre de Usuario:</label>
                            <input type="text" name="correo" id="correo" class="form-control" required>
                            <br><br>
                            <label for="contraseña">Contraseña:</label>
                            <input type="password" name="contraseña" id="contraseña" class="form-control" required>
                            <br><br>
                            <input type="submit" name="entrar" id="entrar" value="Entrar" class="btn btn-success mx-2">                            
                        </form>
                        <a style="margin-top:15px;" class="btn btn-primary" href="?c=usuario&a=Nuevo">Soy Nuevo<br>Crear Usuario</a>
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

