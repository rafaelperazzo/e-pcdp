
<?php

/**
 * Converte uma data no formato yyyy-mm-dd para dd/mm/yyyy 
 */
function diaMesAno($data1) {
	$myDateTime = DateTime::createFromFormat('Y-m-d', $data1);
	$convertida = $myDateTime->format('d/m/Y');
	return ($convertida);
}

$outro = diaMesAno("2018-04-23");
print("$outro\n");



?>
