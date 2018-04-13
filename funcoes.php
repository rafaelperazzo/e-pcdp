<?php

function str2data($string,$oque='d') {
	
	$date = DateTime::createFromFormat("d/m/Y", $string);
	if ($oque=='d') { //Dia
		return (intval($date->format("d")));
	}
	else if ($oque=='m') { //Mes
		return (intval($date->format("m")));
	}
	else if ($oque=='Y') { //Ano
		return (intval($date->format("Y")));
	}
	else { //Nenhum dos anteriores
		return (intval($date->format("d")));
	}
	
}

$ano = str2data("12/06/1980",'Y');
$mes = str2data("12/06/1980",'m');
$dia = str2data("12/06/1980",'d');
$soma = $ano+$mes+$dia;
print($soma);

?>
