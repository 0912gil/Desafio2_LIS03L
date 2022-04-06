<?php
class admin
{
	private $pdo;

    public $correo;
    public $nombres;
    public $apellidos;
    public $dir;
    public $tel;
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

			$stm = $this->pdo->prepare("SELECT * FROM admins");
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
			$stm = $this->pdo->prepare("SELECT * FROM admins WHERE correo = ?");
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
			            ->prepare("DELETE FROM admins WHERE correo = ?");

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
			$sql = "UPDATE admins SET
						nombres        = ?,
						apellidos        = ?,
						telefono        = ?,
						direccion        = ?,
						contraseña    = ?
						
				    WHERE correo  = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombres,
                        $data->apellidos,
                        $data->tel,
						$data->dir,
						$data->contraseña
                        $data->correo,
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(admin $data)
	{
		try
		{
		$sql = "INSERT INTO admins (correo, nombres, apellidos, telefono, direccion, estado, contraseña )
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->correo,
                    $data->nombres,
                    $data->apellidos,
                    $data->tel,
                    $data->dir,
					$data->contraseña
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
