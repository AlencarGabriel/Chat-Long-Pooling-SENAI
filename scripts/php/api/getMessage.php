<?php 
include "../autoload.php";

$json = null;

try {
	// passsa o timestamp do primeiro dia válido com a primeira hora caso o parametro venha nulo
	// $timestamp = isset($_GET['timestamp']) ? $_GET['timestamp'] : "1899-12-30" . " 00:00:00";
	// $timestamp = $timestamp == "" ? "1899-12-30" . " 00:00:00" : $timestamp; // nao pode avaliar na linha acima, pois se "timestamp" for NULL, não é possivel avaliar	
	
	$id = isset($_GET['callbackID']) ? $_GET['callbackID'] : 0;
	$id = $id == "" ? 0 : $id; 

	// $json = funcoes::LongPooling($timestamp, "select (count(*) > 0) as existe_mod, now() as timestamp from messages where created_at >= ", function($timeconsulta, $timeEntrada){

	$json = funcoes::LongPooling($id, "select (count(*) > 0) as existe_mod, max(id) as id from messages where id > ", function($idConsulta, $idEntrada){

		$messages = message::SetToJson(message::GetMessages($idEntrada));		

		// Cria um JSON com os follow-ups
		$array = array('messages' => $messages, 'callbackID' => $idConsulta);
		return json_encode($array);
	});
} catch (Exception $e) {
	
	echo $e;
	$json = constants::INV_REQ_DATA;	
}

echo str_replace('\u0000messages\u0000', '', $json);

?>