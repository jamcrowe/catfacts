<?php
include "connection.php";
include "class-Clockwork.php";

if(isset($_REQUEST['from'])){
	$from = mysql_real_escape_string($_REQUEST['from']);
	$from = str_replace('+', '', $from);
	//subscribe this user to cat facts
	$query = "SELECT id FROM cat_user WHERE num = '$from'";
	$result = mysql_query($query);
	if(mysql_num_rows($result)==0){
		//user is not subbed. SUB THEM NOW
		$sql = "INSERT INTO cat_user (num) VALUES ('$from')";
		if(!mysql_query($sql)){
			die("fail");
		}
		//send them a texty text
		$clockwork = new Clockwork("1082d37b4b9c8b088eff158c06690f7b8f239a21");
		$messages = array(array("to" => $from, "message" => "You are now subcribed to Cat Facts!"));
		$results = $clockwork->send($messages);
	}else{
		//send them a texty text
		$clockwork = new Clockwork("1082d37b4b9c8b088eff158c06690f7b8f239a21");
		$messages = array(array("to" => $from, "message" => "You can never stop texts from Cat Facts!"));
		$results = $clockwork->send($messages);

	}
}

?>