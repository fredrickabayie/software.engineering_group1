<?php
include("../models/task.php");
if (!isset($_REQUEST['cmd'])){
	echo '{"result" : 0, "message" : "Unset Comand"}';
	exit();
}
$cmd = $_REQUEST['cmd'];
switch ($cmd) {
	case 1 : 
		if (!isset($_REQUEST['tn'])){
			echo '{"result" : 0, "message" : "Unset parameter"}';
		} else {
			searchTaskByName($_REQUEST['tn']);
		}
		break;
	
	default:
		echo '{"result" : 0, "message" : "Command Invalid"}';
		break;
}
function searchTaskByName($taskName){
	$task = new task();
	if (!$task->searchTaskByName($taskName)){
		echo'{"result":0, "message": "Error Searching Task'.mysql_error().'"}';
		return;
	}
	$row = $task->fetch();
	echo $row;
	echo mysql_error();
	// echo '{"result" : 1, "message" : [';
	// while ($row){
	// 	echo json_decode($row);
	// 	if($row){
	// 		echo ",";
	// 	}
	// } 
	// echo ']}';
	return;
}

?>