<?php
require_once 'core/validaciones.php';
class producto
{
	private $pdo;

    public $id_producto;
    public $nombre;
    public $descripcion;
    public $imagen;
    public $id_categoria;
    public $precio;
    public $existencias;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM productos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id_producto)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM productos WHERE id_producto = ?");
			$stm->execute(array($id_producto));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_producto)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM productos WHERE id_producto = ?");

			$stm->execute(array($id_producto));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE productos SET
						nombre          = ?,
						descripcion          = ?,
						imagen          = ?,
						id_categoria          = ?,
						precio        = ?,
            			existencias        = ?
				    WHERE id_producto = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre,
                        $data->descripcion,
                        $data->imagen,
                        $data->id_categoria,
                        $data->precio,
                        $data->existencias,
                        $data->id_producto
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(producto $data)
	{
		try
		{
		$sql = "INSERT INTO productos (id_producto,nombre,descripcion,imagen,id_categoria,precio,existencias)
		        VALUES (?, ?, ?, ?,?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_producto,
                    $data->nombre,
                    $data->descripcion,
                    $data->imagen,
                    $data->id_categoria,
                    $data->precio,
                    $data->existencias,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
