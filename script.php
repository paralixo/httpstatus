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

while (true){
$query = $pdo->prepare('SELECT * FROM websites');
$query->execute();
$url = $query->fetchAll();

foreach ($url as $website)
{
	$output = shell_exec("curl -s -o/dev/null " . $website['url'] . " -w '%{http_code}\n'");


	$query = $pdo->prepare('INSERT INTO history (id_website,status,update_time)values('.$website['id'].','.$output.',now())');
	$query->execute();
	
}
foreach ($url as $website)
{
	$id = $website['id'];
	$query = $pdo->prepare('SELECT status from history where id_website = '.$id.' order by update_time desc limit 3 ');
	$query->execute();
	$laststatus = $query->fetchAll();

	if (count($laststatus) === 3 ){
		$websitedown = true ;
		foreach ($laststatus as $status) {
			// on prends 400 à la place de 300 parce qu'on ne sait pas comment tu vas ecrire tes noms de domaines.
			if ($status['status'] >= 200 && $status['status'] < 400 ){ 
				$websitedown =false;
			}
		}
		if($websitedown == true ){
			mail('deschaussettes@yopmail.com','Erreur site','Probleme sur le site '. $website['url'] .'');
		}
	}

}
	
sleep (120);

}

?>
