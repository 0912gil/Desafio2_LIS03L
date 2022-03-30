<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Agregar Producto</title>
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3">
        	<div style="background-color:lightblue;padding:20px;">
            	<h1 class="display-5">Agregar Producto</h1>
        	</div>
        	<div style="margin:30px;">
        		<form method="POST" action="agregar.php">
					<div class="row form-group">
						<div class="col-sm-2">
							<label class="control-label" for="codigo">Codigo:</label>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="codigo" id="codigo">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-2">
							<label class="control-label" for="nombre">Nombre:</label>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="nombre" id="nombre">
						</div>
					</div>
                	<div class="row form-group">
						<div class="col-sm-2">
							<label class="control-label" for="categoria">Categoria:</label>
						</div>
						<div class="col-sm-10">
							<select type="text" class="form-control" name="categoria" id="categoria">
                            	<option></option>
                            	<option>Promocional</option>
                            	<option>Textil</option>
                        	</select>
						</div>
					</div>
                	<div class="row form-group">
						<div class="col-sm-2">
							<label class="control-label" for="descripcion">Descripcion:</label>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="descripcion" id="descripcion">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-2">
							<label class="control-label" for="existencias">Existencias:</label>
						</div>
						<div class="col-sm-10">
							<input type="number" min="0" step="1"  class="form-control" name="existencias" id="existencias">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-2">
							<label class="control-label" for="precio" >Precio:</label>
						</div>
						<div class="col-sm-10">
							<input type="number" min="0.01" step="0.01" class="form-control" name="precio" id="precio">
						</div>
					</div>
                	<div style="margin-top:50px;">
                    	<button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Agregar</a>
                	</div>
            	</form>
            
        	</div>
        	<script src="assets/js/jquery.min.js"></script>
        	<script src="assets/js/bootstrap.min.js"></script>
        	<?php include('nuevo_producto.php');?>
			<?php
				if(isset($_GET['exito'])){
			?>
			<script>
    			alertify.success('Producto agregado');
			</script>
			<?php
				}
			?>
    	</div>
    </div>
</div>
</body>
</html>