<?php

require('fpdf/fpdf.php');

//TODO: Substituir a string d/m/Y por $formatoData. 
//TODO: Preparar para colocar as datas no formato YYYY-MM-DD.
$formatoData = 'd/m/Y';
session_start();

/**
 * Converte uma data no formato yyyy-mm-dd para dd/mm/yyyy 
 */
function diaMesAno($data1) {
	$myDateTime = DateTime::createFromFormat('Y-m-d', $data1);
	$convertida = $myDateTime->format('d/m/Y');
	return ($convertida);
}

function diaSemanaCompleto($data1) {
	
	if ($data1==1) {
		return ("segunda-feira");
	}
	if ($data1==2) {
		return ("terça-feira");
	}
	if ($data1==3) {
		return ("quarta-feira");
	}
	if ($data1==4) {
		return ("quinta-feira");
	}
	if ($data1==5) {
		return ("sexta-feira");
	}
	if ($data1==6) {
		return ("sabado");
	}
	if ($data1==7) {
		return ("domingo");
	}
	
	
	
}

function assinatura($cidade,$dataCompleta,$pdf) {
	$pdf->Ln(30);
	$pdf->Line(60,$pdf->GetY()-5,150,$pdf->GetY()-5);
	$pdf->SetFont('Times','B',10);
	$pdf->Cell(190,0,$_POST['nome'],0,0,'C');
	$pdf->Ln(5);
	$pdf->SetFont('Times','',8);
	$pdf->Cell(190,0,'Assinatura e carimbo',0,0,'C');

	$pdf->Ln(10);
	$pdf->SetFont('Times','',10);
	$pdf->Cell(190,0,"$cidade, " . $dataCompleta,0,0,'R');
}

function travar($mensagem) {
		header('Content-Type: text/html; charset=utf-8');
		$voltar = "<a href=\"javascript:history.back()\">VOLTAR</a><BR>";
		die($mensagem . "<BR>" . $voltar);

}

function str2data($string,$oque='d') {
	
	$date = DateTime::createFromFormat('d/m/Y', $string);
	if ($oque=='d') { //Dia
		return (intval($date->format("d")));
	}
	else if ($oque=='m') { //Mes
		return ($date->format("m"));
	}
	else if ($oque=='Y') { //Ano
		return ($date->format("Y"));
	}
	else { //Nenhum dos anteriores
		return (intval($date->format("d")));
	}
	
}

/**
 * 
 * Dada uma data no formato DD/MM/YYYY, devolve o dia da semana (como um número: 1 - segunda, 2 - terça, ...
 * 
 * */
function diaDaSemana($string_data) {
	$myDateTime = DateTime::createFromFormat('d/m/Y', $string_data);
	$diaSemana = $myDateTime->format('N');
	return ($diaSemana);
}

/**
 * Dadas 2 datas no formato DD/MM/YYYY, devolve a diferença entre as datas
 * 
 * 
 * */
function diferencaDatas($string_data1,$string_data2) {
	$data1 = DateTime::createFromFormat('d/m/Y', $string_data1);
	$data2 = DateTime::createFromFormat('d/m/Y', $string_data2);
	$diferenca = $data2->diff($data1)->format("%a");
	return ($diferenca);
	
}

function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }
    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf{$c} * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf{$c} != $d) {
            return false;
        }
    }
    return true;
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
		if (strcasecmp(date('d/m/Y',$a),$d)==0) {
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
	//Modificando o formato de DD/MM/YYYY -> YYYY/MM/DD
	$strDateFrom2 = strval(str2data($strDateFrom,'Y')) . '/' . strval(str2data($strDateFrom,'m')) . '/' . strval(str2data($strDateFrom,'d'));
	$strDateTo2 = strval(str2data($strDateTo,'Y')) . '/' . strval(str2data($strDateTo,'m')) . '/' . strval(str2data($strDateTo,'d'));
    $aryRange=array();
    
    //BUG -> Meses ou dias menores que 10: Corrigido. Removi a função intval da função str2data.
    $iDateFrom=mktime(1,0,0,substr($strDateFrom2,5,2),     substr($strDateFrom2,8,2),substr($strDateFrom2,0,4));
    $iDateTo=mktime(1,0,0,substr($strDateTo2,5,2),     substr($strDateTo2,8,2),substr($strDateTo2,0,4));

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
		if ((feriado($d)) or (sabado_domingo($d))) {
			return (true);
		}
	}
	return (false);
}

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo2.png',90,6,30);
    // Arial bold 15
    $this->SetFont('Times','B',13);
    // Move to the right
    //$this->Cell(80);
    // Title
    $this->Ln(5);
    $this->Cell(0,0,'Gabinete da Reitoria',0,0,'C');
    $this->Cell(80);
    $this->Ln(5);
    $this->SetFont('Times','IB',13);
    $this->Cell(0,0,'FACD - Formulário de Afastamento de Curta Duração',0,0,'C');
    // Line break
    $this->Ln(1);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    //$this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
}

function escrever($objeto, $texto, $tipo, $tamanho=10,$alinhamento='L') {
	if ($tipo==0) {
		$objeto->Cell($tamanho,0,$texto,0,0,$alinhamento);
	}
	else {
		$objeto->Cell($tamanho,0,$texto,0,0,$alinhamento);
	}
}

// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}

function TabelaRoteiro($header, $data)
{
    // Cabeçalho
    $i=1;
    $this->SetFont('Arial','B',10);
    $this->Cell(68,7,'Origem',1,0,'C'); //Origem
    $this->Cell(68,7,'Destino',1,0,'C'); //Destino
    $this->Cell(54,7,'Transporte',1,0,'C'); //Transporte
    $this->SetFont('Arial','B',8);
    $this->Ln();
    foreach($header as $col) {
        if (($i==3)||($i==6)) { //UF
			$this->Cell(10,7,$col,1,0,'C');
		}
        else if (($i==1)||($i==4)){ //Data
			$this->Cell(18,7,$col,1,0,'C');
		}
		else if ($i==7){ //Transporte
			$this->Cell(54,7,$col,1,0,'C');
		}
		else {
			$this->Cell(40,7,$col,1,0,'C'); //Local
		}
        $i = $i + 1;
	}
    $this->Ln();
    
    // Dados
    $this->SetFont('Arial','',8);
    foreach($data as $row)
    {
        $i = 1;
        foreach($row as $col) {
            if (($i==3)||($i==6)) { //UF
				$this->Cell(10,7,$col,1,0,'C');
			}
			else if (($i==1)||($i==4)){ //Data
				$this->Cell(18,7,$col,1,0,'C');
			}
			else if ($i==7){ //Transporte
				$this->Cell(54,7,$col,1,0,'C');
			}
			else {
				$this->Cell(40,7,$col,1,0,'C'); //Local
				//$this->MultiCell(40,7,$col,1,'C',false); //Local
			}
            $i = $i + 1;
		}
        $this->Ln();
    }
}



} //Classe
//print($_POST['hora_inicio_evento1']);
// Instanciation of inherited class
$ESPACO_LINHAS = 8;
$pdf = new PDF();
$pdf->SetAutoPageBreak(false,0.5);
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf->SetLeftMargin(20);
//$pdf->SetRightMargin(20);
$pdf->SetFont('Times','B',10);

//******************************************************

//PROPOSTO
$pdf->Cell(0,10,'Proposto',0,0,'L');
$pdf->Line(10, 28, 200, 28);
$pdf->Ln(10);

$pdf->Cell(15,0,'Tipo: ',0,0,'L');
$pdf->SetFont('Times','',10);

//Tipo
if (empty($_POST['tipo'])) {
	$erros[] = "Tipo de proposto não preenchido!";
	travar("Tipo de proposto não preenchido!");
}
else {
	$valor = $_POST['tipo'];
	$pdf->Cell(130,0,$valor,0,0,'L');
}


$pdf->SetFont('Times','B',10);
$pdf->Cell(10,0,'Nível: ',0,0,'L');
$pdf->SetFont('Times','',10);

if (empty($_POST['nivel'])) {
	$erros[] = "Nível de proposto não preenchido!";
	travar("Nível de proposto não preenchido!");
}
else {
	$valor = $_POST['nivel'];
	$pdf->Cell(140,0,$valor,0,0,'L');
}


$pdf->Ln($ESPACO_LINHAS);

$pdf->SetFont('Times','B',10);
$pdf->Cell(15,0,'Nome: ',0,0,'L');
$pdf->SetFont('Times','',10);

$erros = array();

//Nome
if (empty($_POST['nome'])) {
	$erros[] = "Nome não preenchido";
	travar("Erro! Nome não preenchido");
}
else {
	$valor = strtoupper($_POST['nome']);
	$pdf->Cell(130,0,$valor,0,0,'L');
}
//Data de nascimento
if (empty($_POST['data_nascimento'])) {
	$erros[] = "Data de nascimento não preenchida";
	travar("Erro! Data de nascimento não preenchida");
}
else {
	$_POST['data_nascimento'] = diaMesAno($_POST['data_nascimento']);
	$valor = $_POST['data_nascimento'];
	if (DateTime::createFromFormat('d/m/Y', $valor) !== FALSE) {
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(25,0,'Data de nasc: ',0,0,'L');
		$pdf->SetFont('Times','',10);
		$pdf->Cell(100,0,$valor,0,0,'L');
		$pdf->Ln($ESPACO_LINHAS);
	}
	else {
		travar("Data de nascimento inválida!");
	}
	
}

//Cargo
$pdf->SetFont('Times','B',10);
$pdf->Cell(15,0,'Cargo: ',0,0,'L');
$pdf->SetFont('Times','',10);

if (empty($_POST['cargo'])) {
	travar("Cargo não preenchido.");
}
else {
	$valor = strtoupper($_POST['cargo']);
	$pdf->Cell(70,0,$valor,0,0,'L');
}

//SIAPE: 
$pdf->SetFont('Times','B',10);
$pdf->Cell(20,0,'SIAPE: ',0,0,'L');
$pdf->SetFont('Times','',10);
//Se não é um colaborador eventual, e o siape está vazio: 
if (empty($_POST['siape']) and (strcasecmp($_POST['tipo'],'Colaborador Eventual')!=0) and ((strcasecmp($_POST['tipo'],'SEPE - Servidor de outro poder ou esfera')!=0))) {
	travar('SIAPE não preenchido!');
}

else {
	$valor = $_POST['siape'];
	if (empty($_POST['siape'])) {
		$valor = "";
	}
	$pdf->Cell(40,0,$valor,0,0,'L');
}

//CPF
$pdf->SetFont('Times','B',10);
$pdf->Cell(15,0,'CPF: ',0,0,'L');
$pdf->SetFont('Times','',10);

if (empty($_POST['cpf'])) {
	travar('CPF não preenchido!');
}
else {
	$valor = $_POST['cpf'];
	if (validaCPF($valor)) {
		$pdf->Cell(40,0,$valor,0,0,'L');
	}
	else {
		travar('CPF inválido!');
	}
}

$pdf->Ln($ESPACO_LINHAS);

$pdf->SetFont('Times','B',10);
$pdf->Cell(15,0,'Lotação: ',0,0,'L');
$pdf->SetFont('Times','',10);

//Lotação: Obrigatório apenas se for servidor público de qualquer esfera.
if (empty($_POST['lotacao']) and (strcasecmp($_POST['tipo'],'Colaborador Eventual')!=0)) {
	travar('Campo lotação não preenchido!');
}
else {
	$valor = $_POST['lotacao'];
	if (empty($_POST['lotacao'])) {
		$valor = "";
	}
	$pdf->Cell(70,0,$valor,0,0,'L');
}

$pdf->SetFont('Times','B',10);
$pdf->Cell(20,0,'Telefone: ',0,0,'L');
$pdf->SetFont('Times','',10);
//Telefone
$pdf->Cell(40,0,$_POST['telefone'],0,0,'L');
$pdf->SetFont('Times','B',10);
$pdf->Cell(15,0,'Celular: ',0,0,'L');
$pdf->SetFont('Times','',10);
//Celular
$pdf->Cell(40,0,$_POST['celular'],0,0,'L');
$pdf->Ln($ESPACO_LINHAS);

$pdf->SetFont('Times','B',10);
$pdf->Cell(15,0,'E-mail: ',0,0,'L');
$pdf->SetFont('Times','',10);
//E-mail
$pdf->Cell(70,0,$_POST['email'],0,0,'L');
$pdf->SetFont('Times','B',10);
$pdf->Cell(20,0,'RG:',0,0,'L');
$pdf->SetFont('Times','',10);
//RG
$pdf->Cell(40,0,$_POST['rg'],0,0,'L');
$pdf->SetFont('Times','B',10);
$pdf->Cell(15,0,'Orgão: ',0,0,'L');
$pdf->SetFont('Times','',10);
//Orgão emissor
$pdf->Cell(40,0,strtoupper($_POST['uf']),0,0,'L');
$pdf->Ln($ESPACO_LINHAS);

//Em caso de SEPE
if (strcmp($_POST['tipo'],"SEPE - Servidor de outro poder ou esfera")==0) {
	$pdf->SetFont('Times','B',10);
	
	
	if (empty($_POST['alimentacao'])) {
		travar("Favor, preencher o valor do auxílio alimentação, pois o tipo do proposto é de outro poder ou esfera.");
	}
	if (empty($_POST['transporte'])) {
		travar("Favor, preencher o valor do auxílio transporte, pois o tipo do proposto é de outro poder ou esfera.");
	}
	$pdf->Cell(65,0,'Auxílio Alimentação (no caso de SEPE): ',0,0,'L');
	$pdf->SetFont('Times','',10);
	$pdf->Cell(20,0,$_POST['alimentacao'],0,0,'L');

	$pdf->SetFont('Times','B',10);
	$pdf->Cell(60,0,'Auxílio Transporte (no caso de SEPE): ',0,0,'L');
	$pdf->SetFont('Times','',10);
	$pdf->Cell(20,0,$_POST['transporte'],0,0,'L');

	$pdf->Ln($ESPACO_LINHAS);
}

//Auxilio alimentação, em caso de SEPE
/*if (strcmp($_POST['tipo'],"SEPE - Servidor de outro poder ou esfera")==0) {
	if (empty($_POST['alimentacao'])) {
		travar("Favor, preencher o valor do auxílio alimentação, pois o tipo do proposto é de outro poder ou esfera.");
	}
	if (empty($_POST['transporte'])) {
		travar("Favor, preencher o valor do auxílio transporte, pois o tipo do proposto é de outro poder ou esfera.");
	}
}*/



$pdf->SetFont('Times','B',10);
$pdf->Cell(15,0,'Banco: ',0,0,'L');
$pdf->SetFont('Times','',10);
//Nome do banco
$pdf->Cell(70,0,strtoupper($_POST['banco']),0,0,'L');
$pdf->SetFont('Times','B',10);
$pdf->Cell(20,0,'Agência:',0,0,'L');
$pdf->SetFont('Times','',10);
//Agencia
$pdf->Cell(40,0,$_POST['agencia'],0,0,'L');
$pdf->SetFont('Times','B',10);
$pdf->Cell(15,0,'Conta: ',0,0,'L');
$pdf->SetFont('Times','',10);
//Conta
$pdf->Cell(40,0,$_POST['conta'],0,0,'L');
$pdf->Ln(2);

//******************************************************
//Viagem
//******************************************************
$pdf->SetFont('Times','B',10);
$pdf->Cell(0,10,'Viagem',0,0,'L');
$pdf->Line(10, $pdf->GetY()+7, 200, $pdf->GetY()+7);
$pdf->Ln(10);

$pdf->Cell(70,0,'Tipo de Viagem: ',0,0,'L');
$pdf->Cell(70,0,'Tipo de Solicitação: ',0,0,'L');
//$pdf->Cell(70,0,'Meio de Transporte: ',0,0,'L');
$pdf->Ln(5);

$pdf->SetFont('Times','',10);
$pdf->Cell(70,0,$_POST['tipo_viagem'],0,0,'L');
$pdf->Cell(70,0,$_POST['tipo_solicitacao'],0,0,'L');
//$pdf->Cell(70,0,$_POST['meio_transporte'],0,0,'L');
$pdf->Ln($ESPACO_LINHAS);

$pdf->SetFont('Times','B',10);
$pdf->Cell(40,0,'Motivo da Viagem: ',0,0,'L');
$pdf->SetFont('Times','',10);
if (strcasecmp($_POST['motivo_viagem'],'A serviço')==0) {
	$pdf->Cell(3,3,'',1,0,'L',true);
}
else {
	$pdf->Cell(3,3,'',1,0,'L',false);
}
$pdf->Cell(20,0,'A serviço ',0,0,'L');
if (strcasecmp($_POST['motivo_viagem'],'Congresso')==0) {
	$pdf->Cell(3,3,'',1,0,'L',true);
}
else {
	$pdf->Cell(3,3,'',1,0,'L',false);
}
$pdf->Cell(20,0,'Congresso',0,0,'L');
if (strcasecmp($_POST['motivo_viagem'],'Convocação')==0) {
	$pdf->Cell(3,3,'',1,0,'L',true);
}
else {
	$pdf->Cell(3,3,'',1,0,'L',false);
}

$pdf->Cell(25,0,'Convocação',0,0,'L');
if (strcasecmp($_POST['motivo_viagem'],'Encontro/Seminário')==0) {
	$pdf->Cell(3,3,'',1,0,'L',true);
}
else {
	$pdf->Cell(3,3,'',1,0,'L',false);
}

$pdf->Cell(40,0,'Encontro/Seminário',0,0,'L');
if (strcasecmp($_POST['motivo_viagem'],'Treinamento')==0) {
	$pdf->Cell(3,3,'',1,0,'L',true);
}
else {
	$pdf->Cell(3,3,'',1,0,'L',false);
}

$pdf->Cell(20,0,'Treinamento',0,0,'L');
$pdf->Ln($ESPACO_LINHAS);

$pdf->SetFont('Times','B',10);
$pdf->Cell(0,0,'Descrição do motivo da viagem, data e hora de início e término do evento: ',0,0,'L');
$pdf->Ln(5);
$pdf->SetFont('Times','',10);

//Motivo da viagem - Montando string
$_POST['data_inicio_evento1'] = diaMesAno($_POST['data_inicio_evento1']);
$_POST['data_termino_evento1'] = diaMesAno($_POST['data_termino_evento1']);
$valor = "Atividade 1: " . $_POST['nome_evento1'] . " iniciando em " . $_POST['data_inicio_evento1'] . " as " . $_POST['hora_inicio_evento1'] . " e terminando em " . $_POST['data_termino_evento1'] . " as " . $_POST['hora_termino_evento1'] . ". " . $_POST['cidade_evento1'] . ".\n";
if (!empty($_POST['nome_evento2'])) {
	$_POST['data_inicio_evento2'] = diaMesAno($_POST['data_inicio_evento2']);
	$_POST['data_termino_evento2'] = diaMesAno($_POST['data_termino_evento2']);
	$valor = $valor . " " . "Atividade 2: " . $_POST['nome_evento2'] . " iniciando em " . $_POST['data_inicio_evento2'] . " as " . $_POST['hora_inicio_evento2'] . " e terminando em " . $_POST['data_termino_evento2'] . " as " . $_POST['hora_termino_evento2'] . ". " . $_POST['cidade_evento2'] . ".\n";
} 
if (!empty($_POST['nome_evento3'])) {
	$_POST['data_inicio_evento3'] = diaMesAno($_POST['data_inicio_evento3']);
	$_POST['data_termino_evento3'] = diaMesAno($_POST['data_termino_evento3']);
	$valor = $valor . " " . "Atividade 3: " . $_POST['nome_evento3'] . " iniciando em " . $_POST['data_inicio_evento3'] . " as " . $_POST['hora_inicio_evento3'] . " e terminando em " . $_POST['data_termino_evento3'] . " as " . $_POST['hora_termino_evento3'] . ". " . $_POST['cidade_evento3'] . ".\n";
}


$pdf->MultiCell(190,5,$valor,1,'J',false);
$pdf->Ln(3);

$pdf->SetFont('Times','B',10);
$pdf->Cell(0,0,'Justificativas',0,1,'L');
$pdf->SetFont('Times','I',8);
$pdf->Ln(2);
$pdf->SetFont('Times','',10);

/*
 * Convertendo datas
 */
$_POST['roteiro_data_orig_1'] = diaMesAno($_POST['roteiro_data_orig_1']);
$_POST['roteiro_data_dest_1'] = diaMesAno($_POST['roteiro_data_dest_1']);
$_POST['roteiro_data_orig_2'] = diaMesAno($_POST['roteiro_data_orig_2']);
$_POST['roteiro_data_dest_2'] = diaMesAno($_POST['roteiro_data_dest_2']);
if (!empty($_POST['roteiro_data_orig_3'])) {
	$_POST['roteiro_data_orig_3'] = diaMesAno($_POST['roteiro_data_orig_3']);
}
if (!empty($_POST['roteiro_data_dest_3'])) {
	$_POST['roteiro_data_dest_3'] = diaMesAno($_POST['roteiro_data_dest_3']);
}
if (!empty($_POST['roteiro_data_orig_4'])) {
	$_POST['roteiro_data_orig_4'] = diaMesAno($_POST['roteiro_data_orig_4']);
}
if (!empty($_POST['roteiro_data_dest_4'])) {
	$_POST['roteiro_data_dest_4'] = diaMesAno($_POST['roteiro_data_dest_4']);
}
if (!empty($_POST['roteiro_data_orig_5'])) {
	$_POST['roteiro_data_orig_5'] = diaMesAno($_POST['roteiro_data_orig_5']);
}
if (!empty($_POST['roteiro_data_dest_5'])) {
	$_POST['roteiro_data_dest_5'] = diaMesAno($_POST['roteiro_data_dest_5']);
}
if (!empty($_POST['roteiro_data_orig_6'])) {
	$_POST['roteiro_data_orig_6'] = diaMesAno($_POST['roteiro_data_orig_6']);
}
if (!empty($_POST['roteiro_data_dest_6'])) {
	$_POST['roteiro_data_dest_6'] = diaMesAno($_POST['roteiro_data_dest_6']);
}

//Justificativa 1: Sábados, domingos e feriados, ou prazo de 10 dias
if (!empty($_POST['data_inicio_evento1'])) {
	$justificativa = "";
	//$inicio = $_POST['data_inicio_evento1'];
	$inicio = $_POST['roteiro_data_orig_1'];
	if (!empty($_POST['roteiro_data_dest_1'])) {
		$fim = $_POST['roteiro_data_dest_1'];
	}
	if (!empty($_POST['roteiro_data_dest_2'])) {
		$fim = $_POST['roteiro_data_dest_2'];
	}
	if (!empty($_POST['roteiro_data_dest_3'])) {
		$fim = $_POST['roteiro_data_dest_3'];
	}
	if (!empty($_POST['roteiro_data_dest_4'])) {
		$fim = $_POST['roteiro_data_dest_4'];
	}
	if (!empty($_POST['roteiro_data_dest_5'])) {
		$fim = $_POST['roteiro_data_dest_5'];
	}
	if (!empty($_POST['roteiro_data_dest_6'])) {
		$fim = $_POST['roteiro_data_dest_6'];
	}
	//$fim = $_POST['data_termino_evento1']; //MUDEI
	$diadasemana = diaDaSemana($inicio);
	if (($diadasemana==5) or (feriados_fds($inicio,$fim))) {
		if (empty($_POST['justificativa_fds'])) { //Obrigatório justificar!
			travar("Seu afastamento inicia em uma sexta, (ou inclui) sábado, domingo ou feriado. Você precisa justificar!");
		}
		else {
			$justificativa = $justificativa . "1. Sabados, domingos ou feriados: " . $_POST['justificativa_fds'] . "\n";
		}
	}
	//Usar a funcao diferencasDatas para checar se é necessário justificar com relação ao prazo
	$dia = date("d");
	$mes = date("m");
	$ano = date("Y");
	$agora = $dia . "/" . $mes . "/" . $ano;
	$diferenca = diferencaDatas($inicio,$agora);
	if ((strcasecmp($_POST['tipo_solicitacao'],'limitado')!=0) and (strcasecmp($_POST['tipo_solicitacao'],'Diárias')!=0)) {
		if ($diferenca<10) {
			//Justificativa 2: Prazo de 10 dias
			if (empty($_POST['justificativa_prazo'])) { //Obrigatório justificar!
				travar("Seu afastamento inicia em menos de 10 dias. Você precisa justificar!");
			}
			else {
				$justificativa = $justificativa . "2. Prazo de 10 dias: " . $_POST['justificativa_prazo'] . "\n";
			}
		}
	}
}

//Justificativa 3. Checando início do evento com o início da viagem
$diferenca_ida = diferencaDatas($_POST['roteiro_data_orig_1'],$_POST['data_inicio_evento1']);
if ($diferenca_ida>0) {
	if (empty($_POST['justificativa_dia_antes'])) {
		travar("É necessário justificar o motivo da viagem ser iniciada em dia anterior ao início do evento.");
	}
	else {
		$justificativa = $justificativa . "3.1 Viajar um dia antes do evento: " . $_POST['justificativa_dia_antes'] . "\n";
	}
}

//Checando final do evento com o fim da viagem

if (!empty($_POST['roteiro_data_dest_1'])) $roteiroDataDaVolta = $_POST['roteiro_data_dest_1'];
if (!empty($_POST['roteiro_data_dest_2'])) $roteiroDataDaVolta = $_POST['roteiro_data_dest_2'];
if (!empty($_POST['roteiro_data_dest_3'])) $roteiroDataDaVolta = $_POST['roteiro_data_dest_3'];
if (!empty($_POST['roteiro_data_dest_4'])) $roteiroDataDaVolta = $_POST['roteiro_data_dest_4'];
if (!empty($_POST['roteiro_data_dest_5'])) $roteiroDataDaVolta = $_POST['roteiro_data_dest_5'];
if (!empty($_POST['roteiro_data_dest_6'])) $roteiroDataDaVolta = $_POST['roteiro_data_dest_6'];

if (!empty($_POST['data_termino_evento1'])) $descricaoDataDaVolta = $_POST['data_termino_evento1'];
if (!empty($_POST['data_termino_evento2'])) $descricaoDataDaVolta = $_POST['data_termino_evento2'];
if (!empty($_POST['data_termino_evento3'])) $descricaoDataDaVolta = $_POST['data_termino_evento3'];
if (!empty($_POST['data_termino_evento4'])) $descricaoDataDaVolta = $_POST['data_termino_evento4'];
if (!empty($_POST['data_termino_evento5'])) $descricaoDataDaVolta = $_POST['data_termino_evento5'];
if (!empty($_POST['data_termino_evento6'])) $descricaoDataDaVolta = $_POST['data_termino_evento6'];

$diferenca_volta = diferencaDatas($roteiroDataDaVolta,$descricaoDataDaVolta);
if ($diferenca_volta>0) {
	if (empty($_POST['justificativa_dia_depois'])) {
		travar("É necessário justificar o motivo da viagem de volta ser em dia posterior ao dia do fim do evento ou atividades.");
	}
	else {
		$justificativa = $justificativa . "3.2 Viajar um dia depois do término das atividades: " . $_POST['justificativa_dia_depois'] . "\n";
	}
}

//Justificativa 4: Relevancia do evento

$justificativa = $justificativa . "4. Relevancia da atividade: " . $_POST['txtRelevancia'] . "\n";


//Justificativa 5: Solicitar apenas passagens, apenas diárias ou nenhum dos dois
if ((strcasecmp($_POST['tipo_solicitacao'],'Passagens')==0) or (strcasecmp($_POST['tipo_solicitacao'],'Diárias')==0) or (strcasecmp($_POST['tipo_solicitacao'],'limitado')==0)) {
	if (empty($_POST['justificativa_diarias'])) { //Se a justificativa estiver vazia!
		travar('Como você está solicitando apenas diárias ou apenas passagens ou nenhum dos dois, deve ser feita uma justificativa.');
	}
	else { //Anexa a justificativa. 
		if (strcasecmp($_POST['tipo_solicitacao'],'Passagens')==0) {
			$justificativa = $justificativa . "5. Justificativa por solicitar apenas passagens: " . $_POST['justificativa_diarias'];
		}
		else if (strcasecmp($_POST['tipo_solicitacao'],'Diárias')==0){
			$justificativa = $justificativa . "5. Justificativa por solicitar apenas diárias: " . $_POST['justificativa_diarias'];
		}
		else {
			$justificativa = $justificativa . "5. Justificativa por não solicitar nem passagens nem diárias: " . $_POST['justificativa_diarias'];
		}
	}
}

$pdf->MultiCell(190,5,$justificativa,1,'J',false);

$pdf->Ln(1);

//******************************************************
//Roteiro
//******************************************************
$pdf->SetFont('Times','IB',10);
$pdf->Cell(0,10,'Roteiro da Viagem',0,0,'L');
$pdf->Line(10, $pdf->GetY()+7, 200, $pdf->GetY()+7);
$pdf->Ln(2);
$header = array('Data', 'Local', 'UF', 'Data', 'Local', 'UF','Tipo');
//Obtendo as datas da ida e da volta
//Trecho 1

$trecho_data_origem_1 = $_POST['roteiro_data_orig_1'];
$trecho_data_destino_1 = $_POST['roteiro_data_dest_1'];
$trecho_local_origem_1 = $_POST['local_orig_1'];
$trecho_uf_origem_1 = $_POST['uf_orig_1'];
$trecho_local_destino_1 = $_POST['local_dest_1'];
$trecho_uf_destino_1 = $_POST['uf_dest_1'];
$meio_transporte_1 = $_POST['meio_transporte1'];
//Trecho 2

$trecho_data_origem_2 = $_POST['roteiro_data_orig_2'];
$trecho_data_destino_2 = $_POST['roteiro_data_dest_2'];
$trecho_local_origem_2 = $_POST['local_orig_2'];
$trecho_uf_origem_2 = $_POST['uf_orig_2'];
$trecho_local_destino_2 = $_POST['local_dest_2'];
$trecho_uf_destino_2 = $_POST['uf_dest_2'];
$meio_transporte_2 = $_POST['meio_transporte2'];
//Trecho 3

$trecho_data_origem_3 = $_POST['roteiro_data_orig_3'];
$trecho_data_destino_3 = $_POST['roteiro_data_dest_3'];
$trecho_local_origem_3 = $_POST['local_orig_3'];
$trecho_uf_origem_3 = $_POST['uf_orig_3'];
$trecho_local_destino_3 = $_POST['local_dest_3'];
$trecho_uf_destino_3 = $_POST['uf_dest_3'];
$meio_transporte_3 = $_POST['meio_transporte3'];
//Trecho 4
$trecho_data_origem_4 = $_POST['roteiro_data_orig_4'];
$trecho_data_destino_4 = $_POST['roteiro_data_dest_4'];
$trecho_local_origem_4 = $_POST['local_orig_4'];
$trecho_uf_origem_4 = $_POST['uf_orig_4'];
$trecho_local_destino_4 = $_POST['local_dest_4'];
$trecho_uf_destino_4 = $_POST['uf_dest_4'];
$meio_transporte_4 = $_POST['meio_transporte4'];
//Trecho 5
$trecho_data_origem_5 = $_POST['roteiro_data_orig_5'];
$trecho_data_destino_5 = $_POST['roteiro_data_dest_5'];
$trecho_local_origem_5 = $_POST['local_orig_5'];
$trecho_uf_origem_5 = $_POST['uf_orig_5'];
$trecho_local_destino_5 = $_POST['local_dest_5'];
$trecho_uf_destino_5 = $_POST['uf_dest_5'];
$meio_transporte_5 = $_POST['meio_transporte5'];
//Trecho 6
$trecho_data_origem_6 = $_POST['roteiro_data_orig_6'];
$trecho_data_destino_6 = $_POST['roteiro_data_dest_6'];
$trecho_local_origem_6 = $_POST['local_orig_6'];
$trecho_uf_origem_6 = $_POST['uf_orig_6'];
$trecho_local_destino_6 = $_POST['local_dest_6'];
$trecho_uf_destino_6 = $_POST['uf_dest_6'];
$meio_transporte_6 = $_POST['meio_transporte6'];
//Verificando a data da ida e volta da viagem!
$dia_ida = $trecho_data_origem_1;
if (!empty($_POST['roteiro_data_orig_6'])) {
	$dia_volta = $_POST['roteiro_data_orig_6'];
}
else if (!empty($_POST['roteiro_data_orig_5'])) {
	$dia_volta = $_POST['roteiro_data_orig_5'];
}
else if (!empty($_POST['roteiro_data_orig_4'])) {
	$dia_volta = $_POST['roteiro_data_orig_4'];
}
else if (!empty($_POST['roteiro_data_orig_3'])) {
	$dia_volta = $_POST['roteiro_data_orig_3'];
}
else {
	//Data 2
	$dia_volta = $_POST['roteiro_data_orig_2'];
}

/*
//Verificando a questão das 3.5 diárias!
$diarias = diferencaDatas($dia_ida,$dia_volta);
if (($diarias>3)and(strcasecmp("balcao",$_POST['tipo_pedido'])==0)) {
	travar("Seu pedido ultrapassa o limite de 3.5 diárias! Não é possível solicitar a viagem desta forma.");
} 
*/

//Montando roteiro
$arquivo = fopen("roteiro.txt", "w");
$txt1 = "$trecho_data_origem_1;$trecho_local_origem_1;$trecho_uf_origem_1; $trecho_data_destino_1; $trecho_local_destino_1;$trecho_uf_destino_1; $meio_transporte_1 \n"; 
$txt2 = "$trecho_data_origem_2;$trecho_local_origem_2;$trecho_uf_origem_2; $trecho_data_destino_2; $trecho_local_destino_2;$trecho_uf_destino_2; $meio_transporte_2 \n"; 
$txt3 = "$trecho_data_origem_3;$trecho_local_origem_3;$trecho_uf_origem_3; $trecho_data_destino_3; $trecho_local_destino_3;$trecho_uf_destino_3; $meio_transporte_3 \n"; 
$txt4 = "$trecho_data_origem_4;$trecho_local_origem_4;$trecho_uf_origem_4; $trecho_data_destino_4; $trecho_local_destino_4;$trecho_uf_destino_4; $meio_transporte_4 \n"; 
$txt5 = "$trecho_data_origem_5;$trecho_local_origem_5;$trecho_uf_origem_5; $trecho_data_destino_5; $trecho_local_destino_5;$trecho_uf_destino_5; $meio_transporte_5 \n"; 
$txt6 = "$trecho_data_origem_6;$trecho_local_origem_6;$trecho_uf_origem_6; $trecho_data_destino_6; $trecho_local_destino_6;$trecho_uf_destino_6; $meio_transporte_6 \n"; 
if (strlen($txt1)>9) fwrite($arquivo, $txt1);
if (strlen($txt2)>9) fwrite($arquivo, $txt2);
if (strlen($txt3)>20) fwrite($arquivo, $txt3);
if (strlen($txt4)>20) fwrite($arquivo, $txt4);
if (strlen($txt5)>20) fwrite($arquivo, $txt5);
if (strlen($txt6)>20) fwrite($arquivo, $txt6);
fclose($arquivo);
$data = $pdf->LoadData('roteiro.txt');
$pdf->SetFont('Arial','',8);
//$pdf->AddPage();
$pdf->Ln(7);
$pdf->TabelaRoteiro($header,$data);

/*$pdf->SetFont('Times','I',8);
$pdf->Ln(2);
$art19 = "Art. 19. A prestação de contas do afastamento deverá ser realizada por meio do SCDP, no prazo máximo de 5 (cinco) dias, contados do retorno da viagem, mediante a apresentação dos bilhetes ou canhotos dos cartões de embarque, em original ou segunda via, ou recibo do passageiro obtido quando da realização do check in via internet, ou a declaração fornecida pela companhia aérea, bem como por meio do registro eletrônico da situação da passagem no SCDP. 
Parágrafo único. Em caso de viagens ao exterior, com ônus ou com ônus limitado, o servidor ficará obrigado, dentro do prazo de 30 (trinta) dias, contado da data do término do afastamento do país, a apresentar relatório circunstanciado das atividades exercidas no exterior, conforme previsão contida no art. 16 do Decreto nº 91.800, de 18 de outubro de 1985, além do cumprimento do que dispõe o caput.";
$pdf->MultiCell(198,3,$art19,0,'J',false);
//$pdf->Ln(1);*/
$pdf->SetFont('Times','',10);

//******************************************************
//Parecer
//******************************************************
$pdf->SetFont('Times','IB',10);
$pdf->Cell(0,10,'Parecer',0,0,'L');
$pdf->Line(10, $pdf->GetY()+7, 200, $pdf->GetY()+7);
$pdf->Ln(10);

//Caixa para parecer
$pdf->MultiCell(190,15,'',1,'J',false);

$comeco = 10;
$fim = $comeco + 45;
$pdf->Line($comeco,$pdf->GetY()+10,$fim,$pdf->GetY()+10);
$comeco = $fim+2;
$fim = $comeco + 45;
$pdf->Line($comeco,$pdf->GetY()+10,$fim,$pdf->GetY()+10);
$comeco = $fim+2;
$fim = $comeco + 45;
$pdf->Line($comeco,$pdf->GetY()+10,$fim,$pdf->GetY()+10);
$comeco = $fim+2;
$fim = $comeco + 45;
$pdf->Line($comeco,$pdf->GetY()+10,$fim,$pdf->GetY()+10);
$comeco = $fim+2;
$fim = $comeco + 45;
$pdf->Ln(15);

$pdf->SetFont('Times','B',10);
$pdf->Cell(40,0,'Proposto',0,0,'C');
$pdf->Cell(50,0,'Chefia Imediata',0,0,'C');
$pdf->Cell(45,0,'Proponente',0,0,'C');
$pdf->Cell(50,0,'Ordenador de Despesas',0,0,'C');

$pdf->Ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(40,0,'Assinatura e carimbo',0,0,'C');
$pdf->Cell(50,0,'Assinatura e carimbo',0,0,'C');
$pdf->Cell(45,0,'Assinatura e carimbo',0,0,'C');
$pdf->Cell(50,0,'Assinatura e carimbo',0,0,'C');

//******************************************************
//DATA
//******************************************************
$pdf->Ln(7);
$pdf->SetFont('Times','',10);
$dia = date("d");
$mes = date("F");
$ano = date("Y");
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$dataCompleta =  strftime('%d de %B de %Y', strtotime('today'));

$pdf->Cell(190,0,'Juazeiro do Norte, ' . $dataCompleta,0,0,'R');

//############## DOCUMENTOS A SEREM ANEXADOS #####################
//Incluir a folha de advertências e documentos a serem anexados. 
$pdf->AddPage();
$pdf->Ln(10);
$pdf->SetFont('Times','B',20);
$pdf->Cell(0,10,'Documentos requeridos',0,0,'C');
//$pdf->Line(10, 40, 200, 40);
$pdf->Ln(20);

//***** Tipo de viagem
$pdf->SetFont('Times','',12);
if (strcasecmp($_POST['motivo_viagem'],'A serviço')==0) {
	$pdf->Cell(3,3,'',1,0,'L',false);
	$pdf->MultiCell(190,5,'Convite e/ou Convocação;',0,'J',false);
	$pdf->Ln(10);
	$pdf->Cell(3,3,'',1,0,'L',false);
	$pdf->Cell(20,0,'Cronograma ou programação das atividades;',0,0,'L');
	$pdf->Ln(10);
	//Se o pedido solicitar passagens, incluir a solicitação de voo
	/*if ((strcasecmp($_POST['tipo_solicitacao'],'limitado')!=0) and (strcasecmp($_POST['tipo_solicitacao'],'Diárias')!=0)) {
		$pdf->Cell(3,3,'',1,0,'L',false);
		$pdf->Cell(20,0,'Sugestão de Vôo;',0,0,'L');
	}*/
	
}


if (strcasecmp($_POST['motivo_viagem'],'Congresso')==0) {
	if (strcasecmp($_POST['tipo_pedido'],'prpi')==0) { //Se o pedido for direcionado a PRPI, o memorando é necessário. 
		$pdf->Cell(3,3,'',1,0,'L',false);
		$pdf->MultiCell(190,5,'Memorando de encaminhamento da Chefia Imediata do Proposto, indicando motivo da viagem, período, destino, relevância da participação no evento, e correlação do objetivo do evento com as funções desempenhadas pelo servidor;',0,'J',false);
		$pdf->Ln(10);
	}
	$pdf->Cell(3,3,'',1,0,'L',false);
	$pdf->Cell(20,0,'Programação do evento de forma que comprove as datas das atividades a serem realizadas;',0,0,'L');
	$pdf->Ln(10);
	//Se o pedido solicitar passagens, incluir a solicitação de voo
	/*if ((strcasecmp($_POST['tipo_solicitacao'],'limitado')!=0) and (strcasecmp($_POST['tipo_solicitacao'],'Diárias')!=0)) {
		$pdf->Cell(3,3,'',1,0,'L',false);
		$pdf->Cell(20,0,'Sugestão de Vôo;',0,0,'L');
	}*/
	$pdf->Ln(10);
	$pdf->Cell(3,3,'',1,0,'L',false);
	$pdf->Cell(20,0,'Comprovante de inscrição ou de aceite do Trabalho.',0,0,'L');
	$pdf->Ln(10);
	//$pdf->Cell(3,3,'',1,0,'L',false);
	//$pdf->Cell(20,0,'Termo de Compromisso.',0,0,'L');
}

if (strcasecmp($_POST['motivo_viagem'],'Convocação')==0) {
	$pdf->Cell(3,3,'',1,0,'L',false);
	$pdf->MultiCell(190,5,'Convite e/ou Convocação;',0,'J',false);
	$pdf->Ln(10);
	$pdf->Cell(3,3,'',1,0,'L',false);
	$pdf->Cell(20,0,'Cronograma ou programação das atividades;',0,0,'L');
	$pdf->Ln(10);
	//Se o pedido solicitar passagens, incluir a solicitação de voo
	/*if ((strcasecmp($_POST['tipo_solicitacao'],'limitado')!=0) and (strcasecmp($_POST['tipo_solicitacao'],'Diárias')!=0)) {
		$pdf->Cell(3,3,'',1,0,'L',false);
		$pdf->Cell(20,0,'Sugestão de Vôo;',0,0,'L');
	}*/
	$pdf->Ln(10);
	//$pdf->Cell(3,3,'',1,0,'L',false);
	//$pdf->Cell(20,0,'Termo de Compromisso.',0,0,'L');
}

if (strcasecmp($_POST['motivo_viagem'],'Encontro/Seminário')==0) {
	if (strcasecmp($_POST['tipo_pedido'],'prpi')==0) { //Se o pedido for direcionado a PRPI, o memorando é necessário. 
		$pdf->Cell(3,3,'',1,0,'L',false);
		$pdf->MultiCell(190,5,'Memorando de encaminhamento da Chefia Imediata do Proposto, indicando motivo da viagem, período, destino, relevância da participação no evento, e correlação do objetivo do evento com as funções desempenhadas pelo servidor;',0,'J',false);
		$pdf->Ln(10);
	}
	$pdf->Cell(3,3,'',1,0,'L',false);
	$pdf->Cell(20,0,'Programação do evento de forma que comprove as datas das atividades a serem realizadas;',0,0,'L');
	$pdf->Ln(10);
	//Se o pedido solicitar passagens, incluir a solicitação de voo
	/*if ((strcasecmp($_POST['tipo_solicitacao'],'limitado')!=0) and (strcasecmp($_POST['tipo_solicitacao'],'Diárias')!=0)) {
		$pdf->Cell(3,3,'',1,0,'L',false);
		$pdf->Cell(20,0,'Sugestão de Vôo;',0,0,'L');
	}*/
	$pdf->Ln(10);
	$pdf->Cell(3,3,'',1,0,'L',false);
	$pdf->Cell(20,0,'Comprovante de inscrição ou de aceite do trabalho.',0,0,'L');
	$pdf->Ln(10);
	//$pdf->Cell(3,3,'',1,0,'L',false);
	//$pdf->Cell(20,0,'Termo de Compromisso.',0,0,'L');
}

if (strcasecmp($_POST['motivo_viagem'],'Treinamento')==0) {
	$pdf->Cell(3,3,'',1,0,'L',false);
	$pdf->MultiCell(190,5,'Convite/Convocação;',0,'J',false);
	$pdf->Ln(10);
	$pdf->Cell(3,3,'',1,0,'L',false);
	$pdf->Cell(20,0,'Cronograma e/ou Programação das atividades;',0,0,'L');
	$pdf->Ln(10);
	//Se o pedido solicitar passagens, incluir a solicitação de voo
	/*if ((strcasecmp($_POST['tipo_solicitacao'],'limitado')!=0) and (strcasecmp($_POST['tipo_solicitacao'],'Diárias')!=0)) {
		$pdf->Cell(3,3,'',1,0,'L',false);
		$pdf->Cell(20,0,'Sugestão de Vôo;',0,0,'L');
	}*/
	$pdf->Ln(10);
	//$pdf->Cell(3,3,'',1,0,'L',false);
	//$pdf->Cell(20,0,'Termo de Compromisso.',0,0,'L');
}

//*************
$documentos_requeridos = "";
$pdf->SetFont('Times','',12);
$pdf->MultiCell(190,5,$documentos_requeridos,0,'J',false);

//$pdf->Ln(20);
//$termo_compromisso = "Declaro que anexei todos os documentos acima assinalados ao atual pedido de afastamento. ";
//$pdf->SetFont('Times','',12);
//$pdf->MultiCell(190,5,$termo_compromisso,0,'J',false);

//assinatura("Juazeiro do Norte",$dataCompleta,$pdf);
$pdf->SetFont('Times','B',20);
$pdf->Cell(0,10,'Termo de compromisso',0,0,'C');
//$pdf->Line(10, 120, 200, 120);
$pdf->Ln(20);
$termo_compromisso = "Assumo a responsabilidade de prestar contas dessa viagem e comprometo-me a entregar à unidade solicitante o relatório de atividades e os comprovantes de embarque (em casos de passagens aéreas), no prazo máximo de cinco dias a contar do retorno da viagem, de acordo com o artigo 7º do decreto 5.992/2006, Portaria MEC 403/99, que dispõem sobre concessão de viagens. ";
$pdf->SetFont('Times','',12);
$pdf->MultiCell(190,5,$termo_compromisso,0,'J',false);

//assinatura("Juazeiro do Norte",$dataCompleta,$pdf);

//############## SUGESTÃO DE VOO #####################
//Incluir a folha de sugestão de voo.
if ((strcasecmp($_POST['tipo_solicitacao'],'Diárias')!=0)&&(strcasecmp($_POST['tipo_solicitacao'],'limitado')!=0)) { //Se a solicitação incluir passagens
	//$pdf->AddPage();
	$pdf->Ln(10);
	$pdf->SetFont('Times','B',20);
	$pdf->Cell(0,10,'Sugestão de Voo',0,0,'C');
	//$pdf->Line(10, 40, 200, 40);
	$pdf->Ln(20);
	$contador = 0;
	if ((!empty($_POST['sugestao_empresa'])) and (!empty($_POST['sugestao_ida'])) and (!empty($_POST['sugestao_volta'])))  {
		$myDateTime = DateTime::createFromFormat('Y-m-d\TH:i', $_POST['sugestao_ida']);
		$data_sugestao_ida = $myDateTime->format('d/m/Y \a\s H:i');
		$dia1 = diaSemanaCompleto($myDateTime->format('N'));
		$myDateTime = DateTime::createFromFormat('Y-m-d\TH:i', $_POST['sugestao_volta']);
		$data_sugestao_volta = $myDateTime->format('d/m/Y \a\s H:i');
		$dia2 = diaSemanaCompleto($myDateTime->format('N'));
		$sugestao_voo = "Sugiro a empresa " . $_POST['sugestao_empresa'] . ", saindo " . $dia1 . ", " . $data_sugestao_ida . " e voltando " . $dia2 . " , " . $data_sugestao_volta . ".\n";
		$contador = $contador + 1;
	}
	if (!empty($_POST['obs'])) {
		$contador = $contador + 1;
		$sugestao_voo = $sugestao_voo . "\n" . $_POST['obs'];
		//$pdf->SetFont('Times','',12);
		//$pdf->MultiCell(190,5,$sugestao_voo,0,'J',false);
		//assinatura("Juazeiro do Norte",$dataCompleta,$pdf);
	}
	
	if ($contador == 0 ) { //Se a solicitação incluir passagens, é obrigatório preencher a sugestão de voo. 
		travar("É necessário preencher o campo de sugestão de voo.");
	}
	else {
		$pdf->SetFont('Times','',12);
		$pdf->MultiCell(190,5,$sugestao_voo,0,'J',false);
		assinatura("Juazeiro do Norte",$dataCompleta,$pdf);
	}
	
}

//############## TERMO DE COMPROMISSO #####################
/*$pdf->AddPage();
$pdf->Ln(10);
$pdf->SetFont('Times','B',20);
$pdf->Cell(0,10,'Termo de compromisso',0,0,'C');
$pdf->Line(10, 40, 200, 40);
$pdf->Ln(20);
$termo_compromisso = "Assumo a responsabilidade de prestar contas dessa viagem e comprometo-me a entregar à unidade solicitante o relatório de atividades e os comprovantes de embarque (em casos de passagens aéreas), no prazo máximo de cinco dias a contar do retorno da viagem, de acordo com o artigo 7º do decreto 5.992/2006, Portaria MEC 403/99, que dispõem sobre concessão de viagens. ";
$pdf->SetFont('Times','',12);
$pdf->MultiCell(190,5,$termo_compromisso,0,'J',false);

assinatura("Juazeiro do Norte",$dataCompleta,$pdf);*/


/*##############GRAVAR NO MYSQL###################*/
//TODO: Gravar informações no Mysql
/*******************************************/
unset($_SESSION['id']);
//############## GERAR O PDF #####################
$pdf->Output();

?>
