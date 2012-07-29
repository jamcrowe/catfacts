<?php
include "../connection.php";
include "class-Clockwork.php";


//how many people are subbed?
$query = "SELECT * FROM cat_user";
$result = mysql_query($query);
$num = mysql_num_rows($result); // THIS MANY

//send cat facts!
$facts = array(
	"The domestic house cat is a small carnivorous mammal. Its most immediate ancestor is believed to be the African wild cat. ",
	"The cat has been living in close association with humans for somewhere between 3,500 and 8,000 years.",
	"Cats usually weigh between 2.5 and 7 kg (5.5–16 pounds), although some breeds can exceed 11.3 kg (25 pounds)",
	"Indoor cats typically live 14 to 20 years although the oldest-known cat lived to an amazing age of 36",
	"Domestic cats tend to live longer if they are not permitted to go outdoors",
	"Cats' temperament can vary depending on the breed. Shorter haired cats tend to be skinnier and more active.",
	"Cats can conserve energy by sleeping more than most animals, especially as they grow older. Durations of sleep are various, usually 12–16 hours.",
	"Domestic cats are very effective predators. They can ambush and dispatch prey using tactics similar to those of leopards and tigers by pouncing.".
	"The sound a cat makes is unique and is rendered onomatopoeically as 'meow' or similar variants ('miaow', 'miau' etc.)",
	"A kitten's call first starts out as a high-pitched squeak-like sound when very young, but then deepens over time"
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