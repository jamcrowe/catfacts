<?php
include "../connection.php";
include "class-Clockwork.php";


//how many people are subbed?
$query = "SELECT * FROM cat_user";
$result = mysql_query($query);
$num = mysql_num_rows($result); // THIS MANY

//send cat facts!
$facts = array(
	"",
	"",
	""
	);

//pick a random fact
$count = count($facts) - 1;
$random = rand(0, $count);
$message = $facts[$random];

$messages = array();
//create the messages
while($row = mysql_fetch_assoc($result)){
	$messages[]["to"] = $row['num'];
	$messages[]["message"] = $message;
}

$clockwork = new Clockwork("1082d37b4b9c8b088eff158c06690f7b8f239a21");
$results = $clockwork->send($messages);
?>
<center>
	<h1>Welcome to Cat Facts!</h1>
	<h2><?=$num ?> People are subscribed to Cat Facts.</h2>
	<h3>Text to: +44 7624 809 746 to subscribe</h3>
	<p>You can never un subscribe! =D</p>
</center>