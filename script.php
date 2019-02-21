<?php

$database_host = 'localhost';
$database_port = '8080';
$database_dbname = 'lafuente_mehaye';
$database_user = 'root';
$database_password = 'bernardbernard';
$database_charset = 'UTF8';
$database_options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

$pdo = new PDO(
    'mysql:host=' . $database_host . 
    ';port=' . $database_port . 
    ';dbname=' . $database_dbname . 
    ';charset=' . $database_charset, 
    $database_user,
    $database_password,
    $database_options
);

$query = $pdo->prepare('SELECT * FROM websites');
$query->execute();
$url = $query->fetchAll();

foreach ($url as $website)
{
	echo 'Url is : ' .$website['url'] . "\n";
	$output = shell_exec("curl -sS --head " . $website['url']);
echo $output;
}
//}

?>
