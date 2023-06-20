<?php
/**
 * SMSEG Gateway
 * @Islam Fathy
 */
    
	define("SMSEG_GATEWAY", [
	"username" => "",
	"password" => "",
	"sender" => "" // The sender ID of the message.
]);



function gatewaySend($phone, $message, &$system)
{

	$data = json_decode($system->guzzle->get("https://smssmartegypt.com/sms/api/?username=".SMSEG_GATEWAY["username"]."&password=".SMSEG_GATEWAY["password"]."&sendername=".SMSEG_GATEWAY["sender"]."&mobiles=".$phone."&message=".$message
	)->getBody()->getContents(), true);
	
	if(isset($data[0]["type"]) && $data[0]["type"] == "success"):
		return true;
	else:
		return false;
	endif;
	
}
