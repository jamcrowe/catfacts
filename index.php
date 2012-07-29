<?php
include "connection.php";
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
	"A kitten's call first starts out as a high-pitched squeak-like sound when very young, but then deepens over time",
	"Cats can produce a purring noise that typically indicates that the cat is happy.  Less typically it can also can mean that it feels distress",
	"Cats twitch the tips of their tails when hunting or angry, while larger twitching indicates displeasure. A tail held high is usually a sign of happiness",
	"Happy cats are known to paw their owners, or that on which they sit, with a kneading motion. Cats often use this action alongside purring",
	"Cats have been kept by humans since ancient Egypt. In ancient Egypt, the cat god, Bast, was a goddess of the home and of the domestic cat",
	"According to Norse legend, the fine ribbon used to bind Fenrir was crafted by dwarfs from, among other items, the sound a cat makes when walking",
	"Wild cats, the ancestor of the domestic cat, is believed to have evolved in a desert climate, as evident in the behavior common to both the domestic and wild forms",
	"Cats can easily withstand the heat and cold of a temperate climate, but not for long periods. Cats have little resistance against fog, rain, and snow",
	"s are known for their cleanliness. Cat groom themselves by licking their fur. The cat's saliva is a powerful cleaning agent, but it can provoke allergic reactions in humans",
	"Cats expend nearly as much fluid grooming as they do urinating.",
	"Cats may occasionally regurgitate hair balls of fur that have collected in their stomachs as a result of their grooming.",
	""
	);

//pick a random fact
$count = count($facts) - 1;
$random = rand(0, $count);
$message = $facts[$random];

$messages = array();
//create the messages
while($row = mysql_fetch_assoc($result)){
	$messages[] = array("to" => trim($row['num']), "message" => $message);
}
$clockwork = new Clockwork("1082d37b4b9c8b088eff158c06690f7b8f239a21");
$results = $clockwork->send($messages);

$width = rand(50,500);
$height = rand(50,500);
?>
<style type="text/css">
body{
	<?php  
		echo "background-image: url('http://placekitten/".$width."/".$height."') repeat;";
	?>
}
</style>
<center>
	<h1>Welcome to Cat Facts!</h1>
	<h2><?=$num ?> People are subscribed to Cat Facts.</h2>
	<h3>Text to: +44 7624 809 860 to subscribe</h3>
	<p>You can never un subscribe! =D</p>
</center>