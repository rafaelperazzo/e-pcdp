
<?php

/**
 * Converte uma data no formato yyyy-mm-dd para dd/mm/yyyy 
 */
function diaMesAno($data1) {
	$myDateTime = DateTime::createFromFormat('Y-m-d', $data1);
	$convertida = $myDateTime->format('d/m/Y');
	return ($convertida);
}

$myDateTime = DateTime::createFromFormat('Y-m-d\TH:i', '2018-05-15T08:55');
$convertida = $myDateTime->format('d/m/Y \a\s H:i');
print($convertida);
print("\n");

$myDateTime = DateTime::createFromFormat('Y-m-d\TH:i', '2018-05-15T08:55');
$convertida = $myDateTime->format('N');
print($convertida);
print("\n");

require  'Medoo.php';
use Medoo\Medoo;
$database = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'facd',
	'server' => 'localhost',
	'username' => 'facd',
	'password' => 'facd',	
]);

$database->insert("afastamentos",["id"=>"12345"]);

?>
