<?php
class detalle
{
	private $pdo;

    public $id_compra;
    public $id_producto;
    public $precioU;
    public $cantidad;

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

			$stm = $this->pdo->prepare("SELECT * FROM detalles");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id_compra,$id_producto )
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM detalles WHERE id_compra = ? AND id_producto = ?");
			$stm->execute(array($id_compra,$id_producto));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_compra,$id_producto)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM detalles WHERE id_compra = ? AND id_producto = ?");

			$stm->execute(array($id_compra,$id_producto));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE detalles SET
						precio_unitario          = ?,
						cantidad        = ?,
				    WHERE id_compra = ? AND id_producto = ? ";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->precioU,
                        $data->cantidad,
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(detalle $data)
	{
		try
		{
		$sql = "INSERT INTO detalles (id_compra ,id_producto,precio_unitario,cantidad)
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_compra ,
                    $data->id_producto,
                    $data->preicoU,
                    $data->cantidad
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
