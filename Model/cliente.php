<?php
class cliente
{
	private $pdo;

    public $correo;
    public $nombres;
    public $apellidos;
    public $dir;
    public $tel;
	public $tarjeta;
	public $contraseña;

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

			$stm = $this->pdo->prepare("SELECT * FROM clientes");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($correo)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM clientes WHERE correo = ?");
			$stm->execute(array($correo));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($correo)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM clientes WHERE correo = ?");

			$stm->execute(array($correo));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE clientes SET
						nombres        = ?,
						apellidos        = ?,
						telefono        = ?,
						direccion        = ?,
						numero_tarjeta    = ?,
						contraseña    = ?
						
				    WHERE correo  = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombres,
                        $data->apellidos,
                        $data->tel,
						$data->dir,
						$data->tarjeta,
						$data->contraseña
                        $data->correo,
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(cliente $data)
	{
		try
		{
		$sql = "INSERT INTO clientes (correo, nombres, apellidos, telefono, direccion, numero_tarjeta, estado, contraseña )
		        VALUES (?, ?, ?, ?,?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->correo,
                    $data->nombres,
                    $data->apellidos,
                    $data->tel,
                    $data->dir,
					$data->tarjeta,
					$data->contraseña
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
