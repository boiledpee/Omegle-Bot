<?php
$class='./php.omegle.php'; // Path to Omegle connection class.
require($class);

$bot = new OmBot();
// New instance of the bot.
$bot->name = "wonderland"; //Bot Name
// Name of the bot.
$bot->idle_timeout = true;
// Timeout and disconnect if Stranger stops talking.
$bot->idle_seconds = 15;
// How long to wait before idle_timeout.

$bot->conn();

while (1)
{
	$bot->call_handler();
	if ($bot->connected && $bot->newConn) // Stranger is on the other end and it's a new connection. Useful if you want to send the initial message.
	{
		$bot->newConn = false;
		$bot->s_msg("hi:) join my discord server to make new friends! https://discord.gg/PHNXfv9"); //First message to send to the new connection
	}
	if ($bot->newMessage) // We got a new message!
	{
		$bot->newMessage=false; //
		$bot->s_msg("Ok, sounds good."); // Sending back the contents of the last message.
	}

}
