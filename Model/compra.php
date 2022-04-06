<?php
class compra
{
	private $pdo;

    public $id_compra;
    public $correo;
	public $fecha;
	public $monto;

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

			$stm = $this->pdo->prepare("SELECT * FROM compras");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id_compra)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM compras WHERE id_compra = ?");
			$stm->execute(array($id_compra));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_compra)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM compras WHERE id_compra = ?");

			$stm->execute(array($id_compra));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE compras SET
						correo        = ?,
						fecha        = ?,
						monto_total        = ?,
						
				    WHERE id_compra  = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->correo,
                        $data->fecha,
                        $data->monto,
                        $data->id_compra,
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(compra $data)
	{
		try
		{
		$sql = "INSERT INTO compras (id_compra, coreo,fecha,monto_total)
		        VALUES (?, ?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->id_compra,
					$data->correo,
					$data->fecha,
					$data->monto,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
