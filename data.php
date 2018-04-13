<?php

//$myDateTime = DateTime::createFromFormat('d/m/Y', '28/10/2017');
//$newDateString = $myDateTime->format('N');
//print("\n" . $newDateString . "\n");
//$data1 = DateTime::createFromFormat('d/m/Y', '29/10/2017');
//$data2 = DateTime::createFromFormat('d/m/Y', '28/10/2017');
//$diferenca = $data2->diff($data1)->format("%a");
//print($diferenca);
//$dia = date("d");
//$mes = date("F");
//$ano = date("Y");
//print($dia . "/" . $mes . "/" . $ano);

function diaDaSemana($string_data) {
	$myDateTime = DateTime::createFromFormat('d/m/Y', $string_data);
	$diaSemana = $myDateTime->format('N');
	return ($diaSemana);
}

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

function dias_feriados($ano = null)
{
  if ($ano === null)
  {
    $ano = intval(date('Y'));
  }
 
  $pascoa     = easter_date($ano); // Limite de 1970 ou após 2037 da easter_date PHP consulta http://www.php.net/manual/pt_BR/function.easter-date.php
  $dia_pascoa = date('d', $pascoa);
  $mes_pascoa = date('m', $pascoa);
  $ano_pascoa = date('Y', $pascoa);
 
  $feriados = array(
    // Datas Fixas dos feriados Nacionais Basileiros
    mktime(0, 0, 0, 1,  1,   $ano), // Confraternização Universal - Lei nº 662, de 06/04/49
    mktime(0, 0, 0, 4,  21,  $ano), // Tiradentes - Lei nº 662, de 06/04/49
    mktime(0, 0, 0, 5,  1,   $ano), // Dia do Trabalhador - Lei nº 662, de 06/04/49
    mktime(0, 0, 0, 9,  7,   $ano), // Dia da Independência - Lei nº 662, de 06/04/49
    mktime(0, 0, 0, 10,  12, $ano), // N. S. Aparecida - Lei nº 6802, de 30/06/80
    mktime(0, 0, 0, 11,  2,  $ano), // Todos os santos - Lei nº 662, de 06/04/49
    mktime(0, 0, 0, 11, 15,  $ano), // Proclamação da republica - Lei nº 662, de 06/04/49
    mktime(0, 0, 0, 12, 25,  $ano), // Natal - Lei nº 662, de 06/04/49
 
    // These days have a date depending on easter
    mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 48,  $ano_pascoa),//2ºferia Carnaval
    mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 47,  $ano_pascoa),//3ºferia Carnaval	
    mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 2 ,  $ano_pascoa),//6ºfeira Santa  
    mktime(0, 0, 0, $mes_pascoa, $dia_pascoa     ,  $ano_pascoa),//Pascoa
    mktime(0, 0, 0, $mes_pascoa, $dia_pascoa + 60,  $ano_pascoa),//Corpus Christi
  );
 
  sort($feriados);
  
  return $feriados;
}

/**
 *
 * Dada uma data no formato dd/mm/yyyy, retorna se a mesma é um feriado. 
 *  
 * */
function feriado($d) {
	$ano = str2data($d,'Y');  //Extraindo o ano da data fornecida
	$feriados = dias_feriados($ano);
	foreach($feriados as $a)
	{
		if (strcasecmp(date("d/m/Y",$a),$d)==0) {
			return (true);
		}
		//echo date("d/m/Y",$a)."\n";						 
	}
	return (false);
}

function createDateRangeArray($strDateFrom,$strDateTo)
{
    // takes two dates formatted as YYYY/MM/DD and creates an
    // inclusive array of the dates between the from and to dates.

    // could test validity of dates here but I'm already doing
    // that in the main script
	//Modificando o formato de DD/MM/YYYY -> YYY/MM/DD
	$strDateFrom2 = strval(str2data($strDateFrom,'Y')) . '/' . strval(str2data($strDateFrom,'m')) . '/' . strval(str2data($strDateFrom,'d'));
	$strDateTo2 = strval(str2data($strDateTo,'Y')) . '/' . strval(str2data($strDateTo,'m')) . '/' . strval(str2data($strDateTo,'d'));
    $aryRange=array();

    $iDateFrom=mktime(1,0,0,substr($strDateFrom2,5,2),     substr($strDateFrom2,8,2),substr($strDateFrom2,0,4));
    $iDateTo=mktime(1,0,0,substr($strDateTo2,5,2),     substr($strDateTo2,8,2),substr($strDateTo2,0,4));
    //$iDateFrom=mktime(1,0,0,substr($strDateFrom,0,4),     substr($strDateFrom,8,2),substr($strDateFrom,5,2));
    //$iDateTo=mktime(1,0,0,substr($strDateTo,0,4),     substr($strDateTo,8,2),substr($strDateTo,5,2));

    if ($iDateTo>=$iDateFrom)
    {
        array_push($aryRange,date('d/m/Y',$iDateFrom)); // first entry
        while ($iDateFrom<$iDateTo)
        {
            $iDateFrom+=86400; // add 24 hours
            array_push($aryRange,date('d/m/Y',$iDateFrom));
        }
    }
    return $aryRange;
}

function sabado_domingo($data) {
	//Se a data é sábado ou domingo
	if ((diaDaSemana($data)==6) or (diaDaSemana($data)==7)) {
		return (true);
	}
	else {
		return (false);
	}
	
}

function feriados_fds($data1, $data2) {
	$intervalo = createDateRangeArray($data1,$data2);
	foreach($intervalo as $d) {
		if (feriado($d)) or (sabado_domingo($d)) {
			return (true);
		}
	}
	return (false);
}

//$datas = createDateRangeArray('12/10/2017','20/10/2017');
//print_r($datas);
if (feriados('12/10/2017','20/10/2017')) {
	print("Existe um feriado no intervalo\n");
}
else {
	print("NÃO Existe um feriado no intervalo\n");
}

?>
