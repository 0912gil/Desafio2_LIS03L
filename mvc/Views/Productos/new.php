<!-- Nuevo producto -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Nuevo Producto</h4>
                </center>
            </div>
            <div class="modal-body">
                    <?php
                        if(isset($errores)){
                            if(count($errores)>0){
                                echo "<div class='alert alert-danger'><ul>";
                                foreach ($errores as $error) {
                                    echo "<li>$error</li>";
                                }
                                echo "</ul></div>";

                            }
                        }

                   ?>
                <div class="container-fluid">
                    <form method="POST" action="agregar.php">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" for="codigo">Código:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Ingrese el código" required uniqid>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" for="nombre">Nombre:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" for="descripcion">Descripción:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripción" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" for="img">Imagen:</label>
                            </div>
                            <div class="col-sm-10">
                                <?php
                                if (isset($_POST['add'])) :
                                    //Incluir librería de funciones
                                    require_once("comprobarimagen.php");
                                    //Verificar si se han enviado uno o varios archivos
                                    //valiéndonos de una expresión regular
                                    $archivos = array();
                                    if (!empty($_FILES['img']['name'][0])) :
                                        $list = "<ol class=\"list-files\">\n";
                                        foreach ($_FILES['img']['name'] as $i => $archivo) :
                                            $archivos[$i] = $archivo;
                                            //Invocar a la función que verificará mediante
                                            //expresión regular si el archivo pasado como
                                            //argumento es o no es imagen.
                                            $list .= "<li>\n<a href=\"#\">" . $archivos[$i] . comprobarimagen($archivos[$i]) . "</a>\n\t</li>\n";
                                        endforeach;
                                        $list .= "</ol>\n";
                                        echo $list;
                                    endif;
                                //Obteniendo los datos del formulario
                                else :
                                ?>
                                    <div class="row col s12">
                                        <div class="file-field input-field col s8">
                                            <div class="btn">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                                                <input name="img" id="img" type="file" multiple="multiple" />
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" for="categoria">Categoría:</label>
                            </div>
                            <div class="col-sm-10">
                                <select name="categoria" id="categoria" class="form-control" required>
                                    <option value="Textil">Textil</option>
                                    <option value="Promocional">Promocional</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" for="precio">Precio:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="precio" id="precio" placeholder="Ingrese el precio" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" for="existencias">Existencias:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="existencias" id="existencias" placeholder="Ingrese la existencia" required>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" name="add" id="add" class="btn btn-primary" value="Agregar">
                </form>
            </div>

        </div>
    </div>
</div>