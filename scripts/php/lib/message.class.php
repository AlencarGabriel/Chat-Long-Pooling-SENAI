<?php 

/**
 * Classe que representa uma mensagem
 */
class message
{
	private $username;
	private $message;
	private $created_at;

	public function __Get($name){
		return $this->$name;
	}	

	public function __Set($name,$value){
		$this->$name = $value;
	}

	public function Send(){
		$pdo = conexao::conecta();
		$stmt = $pdo->prepare("INSERT INTO messages VALUES(null, :username, :message, :created_at)");
		$stmt->bindParam(':username', 	$this->username, 	PDO::PARAM_STR);
		$stmt->bindParam(':message', 	$this->message, 	PDO::PARAM_STR);
		$stmt->bindParam(':created_at', $this->created_at, 	PDO::PARAM_STR);
		$stmt->execute();
	}

	public function GetMessages($id){
		$pdo = conexao::conecta();
		$sql = "SELECT * FROM messages WHERE 1=1 ";

		if (!is_null($id)) 
			// $sql .= "AND created_at >= :id";
			$sql .= "AND id > :id";

		$stmt = $pdo->prepare($sql);
		if (!is_null($id)) 
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);

		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_CLASS, __CLASS__);

	}

	public static function SetToJson($array){
		foreach ($array as $key => $value) {
			$array_retorno[] = array('username' => $value->username, 'message' => $value->message, 'created_at' => $value->created_at);
		}

		return $array_retorno;
	}
}
?>