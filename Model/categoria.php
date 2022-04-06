<?php
class categoria
{
	private $pdo;

    public $id_categoria;
    public $nombre;

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

			$stm = $this->pdo->prepare("SELECT * FROM categorias");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id_categoria)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM categorias WHERE id_categoria = ?");
			$stm->execute(array($id_categoria));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_categoria)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM categorias WHERE id_categoria = ?");

			$stm->execute(array($id_categoria));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE categorias SET
						nombre        = ?
						
				    WHERE id_categoria  = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre,
                        $data->id_categoria,
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(categoria $data)
	{
		try
		{
		$sql = "INSERT INTO categorias (id_categoria, nombre)
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->id_categoria,
					$data->nombre
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
