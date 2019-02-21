<?php

//while (true){
$database_host = 'localhost';
$database_port = '8080';
$database_dbname = 'lafuente_mehaye';
$database_user = 'root';
$database_password = 'bernardbernard';
$database_charset = 'UTF8';

$pdo = new PDO(
	'mysql:host=' . $database_host .
	';port=' . $database_port .
	';dbnale=' . $database_dbname .
	';charset=' . $database_charset,
	$database_user,
	$database_password
);

$query = $pdo->prepare('SELECT * FROM websites');
$query->execute();
$url = $query->fetchAll();
var_dump($pdo);
foreach ($url as $website)
{
	echo 'Url is : ' .$website['url'] . "\n";
}
//}

?>
