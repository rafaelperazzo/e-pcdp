s<html>
 <?php 
			session_start();
			if (!isset($_SESSION['id'])) {
				$_SESSION['id'] = mt_rand(1000,100000);		
			}    
?>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Fórmulário de Afastamento de Curta Duração</title>
    <link rel="stylesheet" href="estilo.css">
    <script>
		function printFunction() {
			window.print();
		}
		function clearFunction() {
			document.getElementById("pcdp_form").reset();
		}
		function howtoFunction() {		
			location.href = "pcdp_instrucao_preenchimento.pdf";		
		}
      
    function copy() {
    	document.pcdp_form.roteiro_data_orig_1.value = document.pcdp_form.data_inicio_evento1.value;
      document.pcdp_form.roteiro_data_dest_1.value = document.pcdp_form.data_inicio_evento1.value;
      document.pcdp_form.roteiro_data_orig_2.value = document.pcdp_form.data_termino_evento1.value;
      document.pcdp_form.roteiro_data_dest_2.value = document.pcdp_form.data_termino_evento1.value;
      
    }
      
    function copy_sugestao() {
    	 document.pcdp_form.sugestao_ida.value = document.pcdp_form.roteiro_data_orig_1.value + "T08:00";
       document.pcdp_form.sugestao_volta.value = document.pcdp_form.roteiro_data_orig_2.value +"T08:00";
    }
      
    function cidade_estado() {
    	
      var str = document.pcdp_form.cidade_evento1.value;
      var pos = str.search("/");
      var estado = str.substr(pos+1,2);
      var cidade = str.slice(0,pos);
      document.pcdp_form.local_dest_1.value = cidade;
      document.pcdp_form.uf_dest_1.value = estado;
      document.pcdp_form.local_orig_2.value = cidade;
      document.pcdp_form.uf_orig_2.value = estado;
    }
      
    function tipo_proposto_change() {
      var proposto = document.pcdp_form.tipo.value;
      if (proposto!="SEPE - Servidor de outro poder ou esfera") {
      	  //document.pcdp_form.alimentacao.disabled = true;
       // document.pcdp_form.transporte.disabled = true;
        //document.pcdp_form.siape.disabled = false;
      }
      else {
      		//document.pcdp_form.alimentacao.disabled = false;
        //document.pcdp_form.transporte.disabled = false;
        //document.pcdp_form.siape.disabled = true;
      }
      
    }
      
    function origem2destino_cidade() {
    	 document.pcdp_form.local_dest_2.value = document.pcdp_form.local_orig_1.value;
       
      
    }
      
    function origem2destino_uf() {
    	 document.pcdp_form.uf_dest_2.value = document.pcdp_form.uf_orig_1.value;
    }

	</script>
    <script type="text/javascript" src="date.js"></script>
    <script type="text/javascript" src='sisyphus/sisyphus.js'></script>
    <script>
    $('form').sisyphus();
    </script>
<script type="text/javascript">
            
      			function diferenca_datas(data1,data2) {
            		var minutes = 1000*60;
            		var hours = minutes*60;
            		var days = hours*24;

            		var foo_date1 = getDateFromFormat("02/10/2009", "M/d/y");
            		var foo_date2 = getDateFromFormat("02/12/2009", "M/d/y");

            		var diff_date = Math.round((foo_date2 - foo_date1)/days);
            		alert("Diff date is: " + diff_date );  
            }
      			
        </script>
    <meta content="Coordenadoria de Inovação - PRPI" name="author">
    <style> 
input[type=text] {
    width: 100%;
    padding: 12px 3px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 0px solid gray;
    border-radius: 4px;
    background-color: #e6e6e6;
}
input[type=date] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 0px solid gray;
    border-radius: 4px;
    background-color: #e6e6e6;
}
      
input[type=datetime-local] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 0px solid gray;
    border-radius: 4px;
    background-color: #e6e6e6;
}
      
input[type=time] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 0px solid gray;
    border-radius: 4px;
    background-color: #e6e6e6;
}
      
textarea {
  width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 0px solid gray;
    border-radius: 4px;
    background-color: #ecf2f9;
}
</style> </head>
  <body>
    
    <div style="text-align: center;"> <b>Coordenadoria de Inovação -
        Pró-Reitoria de Pesquisa, Pós-Graduação e Inovação (PRPI) <br>
      </b></div>
    <b> </b>
    <div style="text-align: center;"><b>Responsável: Prof. Rafael Perazzo B Mota
        (inova.prpi@ufca.edu.br)</b></div>
    <div style="text-align: center;"><b><a href="http://inovacao.ufca.edu.br" target="_blank">http://inovacao.ufca.edu.br</a></b></div>
    <div style="text-align: center;"><b><a href="http://inovacao.ufca.edu.br/sobre/"
          target="_blank">Contato</a><br>
      </b></div>
    <div style="text-align: center;"><br>
    </div>
    <table class="header">
      <tbody>
        <tr>
          <td><img alt="logo" src="logo2.png"></td>
          <td>
            <p class="titulo-right titulo-bold titulo-size"><label id="titulo_formulario">FORMULÁRIO
                DE AFASTAMENTO DE CURTA DURAÇÃO</label></p>
            <p class="titulo-right titulo-bold titulo-size"><i>(antigo PCDP)</i></p>
          </td>
          <td class="botoes"> <br>
            <br>
            <?php print("Número do FACD: ");
print($_SESSION['id']);?><br>
          </td>
        </tr>
      </tbody>
    </table>
    <form enctype="multipart/form-data" action="pcdp.php" name="pcdp_form" id="pcdp_form"
      method="post"> <input name="MAX_FILE_SIZE" value="30000" type="hidden">
      <table class="basico">
        <tbody>
          <tr align="center">
            <td rowspan="1" colspan="8" style="background-color: #999999;">
              <h1><b>PARTE 1</b></h1>
            </td>
          </tr>
          <tr class="titulo-bg">
            <td colspan="8">
              <h1 class="titulo-center titulo-bold titulo-size">DADOS DO
                PROPOSTO <span style="font-style: italic;">(<span style="font-weight: normal;">A
                    PESSOA QUE VAI VIAJAR)</span></span></h1>
              <p class="titulo-center titulo-bold titulo-size"><span style="font-style: italic;"><span
                    style="font-weight: normal;">(não é necessariamente quem
                    está preenchendo)</span></span></p>
            </td>
          </tr>
          <tr>
            <td colspan="8" rowspan="1"><b>Tipo de pedido</b>:
              <select name="tipo_pedido" id="tipo_pedido">
                <option disabled="disabled" selected="selected" value=""> --
                  selecione um opção -- </option>
                <option value="prpi">Pedido a PRPI</option>
                <option value="outros">Demais setores e Pro-Reitorias</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><span style="font-weight: bold;">Tipo:<br>
              </span><span style="font-style: italic;">(da pessoa que vai
                viajar)</span><span style="font-weight: bold;"><br>
              </span></td>
            <td colspan="4" rowspan="1">
              <select required="required" name="tipo" onchange="tipo_proposto_change()">
                <option disabled="disabled" selected="selected" value=""> --
                  selecione um opção -- </option>
                <option value="Servidor da UFCA">Servidor da UFCA</option>
                <option value="Colaborador Eventual">Colaborador Eventual</option>
                <option value="Militar">Militar</option>
                <option value="Servidor Convidado">Servidor Convidado</option>
                <option value="SEPE - Servidor de outro poder ou esfera">SEPE -
                  Servidor de outro poder ou esfera</option>
              </select>
            </td>
            <td width="10%"><span style="font-weight: bold;">Nível:<br>
              </span><span style="font-style: italic;">(da pessoa que vai
                viajar)</span><span style="font-weight: bold;"></span></td>
            <td colspan="2" rowspan="1">
              <select required="required" name="nivel">
                <option selected="selected" value="Superior">Superior</option>
                <option value="Médio">Médio</option>
              </select>
            </td>
          </tr>
          <tr>
            <td colspan="1"><label>Nome<br>
              </label><span style="font-style: italic;">(da pessoa que vai
                viajar)</span><span style="font-weight: bold;"></span></td>
            <td rowspan="1" colspan="7"><input required="required" id="nome" name="nome"
                type="text"><br>
            </td>
          </tr>
          <tr>
            <td colspan="1"><label>Cargo:<br>
                <span style="font-weight: normal; font-style: italic;">Ex:
                  Professor, Técnico Administrativo, Gerente, ...<br>
                  Caso não se aplique, escreva: N/A<br>
                </span> </label></td>
            <td rowspan="1" colspan="3"><input required="required" id="endereco"
                name="cargo" type="text"></td>
            <td colspan="1"><span style="font-weight: bold;">Lotação:<br>
              </span><span style="font-style: italic;">Ex: CCT, CCSA,
                Departamento de Física, ...</span><span style="font-weight: bold;"><br>
              </span>Caso não se aplique, escreva: N/A<span style="font-weight: bold;"><br>
              </span></td>
            <td colspan="1" style="text-align: left;"><input name="lotacao" type="text">
            </td>
            <td colspan="1"><br>
            </td>
            <td><br>
            </td>
          </tr>
          <tr>
            <td style="text-align: center;" width="10%"><label>RG:<br>
              </label><span style="font-weight: normal; font-style: italic;">(ou
                outro document ode identificação )<br>
              </span></td>
            <td width="12%"><input required="required" id="cep" name="rg" type="text"></td>
            <td width="5%"><label>Orgão Emissor:<br>
                <span style="font-weight: normal; font-style: italic;">Ex:
                  SSP/CE</span><br>
              </label></td>
            <td width="13%"><input required="required" id="uf" name="uf" type="text"></td>
            <td width="5%"><label>Celular*:<br>
                <span style="font-weight: normal; font-style: italic;">Ex:
                  (88)98812-3456<br>
                  (sem espaços, exatamente no formato acima)<br>
                </span> </label></td>
            <td width="28%"><input required="required" pattern="^(\([0-9][0-9]\)(9\d{4})-\d{4})|((\(1[2-9]{1}\)|\([2-9]{1}\d{1}\)) [5-9]\d{3}-\d{4})$"
                id="cidade" name="celular" type="text"></td>
            <td width="15%"><label>DATA DE NASCIMENTO:<span style="font-weight: normal; font-style: italic;"><br>
                </span></label></td>
            <td width="12%"><input name="data_nascimento" required="required" type="date"><br>
            </td>
          </tr>
          <tr>
            <td colspan="1"><label>CPF:<br>
                <span style="font-weight: normal; font-style: italic;">Ex:
                  000000000-00</span><br>
              </label></td>
            <td colspan="1"><input required="required" id="cpf" name="cpf" type="text"></td>
            <td colspan="1"><label>SIAPE:<br>
              </label><span style="font-weight: normal; font-style: italic;">No
                caso de servidor público federal<br>
              </span></td>
            <td colspan="1"><input id="siape" name="siape" type="text"></td>
            <td colspan="1"><label>E-MAIL:<br>
                <span style="font-weight: normal; font-style: italic;">Ex:
                  nome@dominio.com</span><br>
                <i>(este e-mail será utilizado para emissão dos bilhetes e
                  informação sobre as diárias). Utilizar e-mail institucional. </i><br>
              </label></td>
            <td colspan="1"><input required="required" id="email" name="email" type="text"></td>
            <td colspan="1"><label>TELEFONE (opcional):<br>
              </label><span style="font-weight: normal; font-style: italic;">Ex:
                (88)3221-3456</span><br>
              <span style="font-weight: normal; font-style: italic;">(sem
                espaços, exatamente no formato acima)</span></td>
            <td colspan="1"><input pattern="^(\([0-9][0-9]\)(\d{4})-\d{4})|((\(1[2-9]{1}\)|\([2-9]{1}\d{1}\)) [5-9]\d{3}-\d{4})$"
                id="telefone" name="telefone" type="text"></td>
          </tr>
          <tr>
            <td colspan="2"><label id="sepe_alimentacao">Valor do auxílio
                Alimentação (no caso de SEPE):<br>
                Ex: R$453,00<br>
                R$ 1.250,00<br>
              </label></td>
            <td colspan="6"><input id="alimentacao" name="alimentacao" disabled="disabled"
                pattern="R\$ ?\d{1,3}(\.\d{3})*,\d{2}" type="text"></td>
          </tr>
          <tr>
            <td rowspan="1" colspan="2"><b><label id="sepe_transporte">Valor do
                  auxílio Transporte (no caso de SEPE):<br>
                  Ex: 123,18<br>
                  R$ 1.890,00<br>
                </label></b></td>
            <td rowspan="1" colspan="6"><input id="transporte" name="transporte"
                disabled="disabled" pattern="R\$ ?\d{1,3}(\.\d{3})*,\d{2}" type="text"><br>
              <br>
              <br>
              <br>
            </td>
          </tr>
          <tr>
            <td colspan="8">
              <h1 class="titulo-center titulo-bold titulo-size">Dados BancárioS</h1>
            </td>
          </tr>
          <tr>
            <td colspan="1"><label>Banco:<br>
                <span style="font-weight: normal; font-style: italic;">Ex: Banco
                  do Brasil</span><br>
              </label></td>
            <td colspan="3"><input required="required" name="banco" type="text"><br>
            </td>
            <td colspan="1"><label>Agência:<br>
                <span style="font-weight: normal; font-style: italic;">Ex:
                  1598-9</span><br>
              </label></td>
            <td colspan="1"><input id="agencia" name="agencia" type="text"></td>
            <td colspan="1"><label>Conta-Corrente:<br>
                <span style="font-weight: normal; font-style: italic;">Ex:
                  11111-2</span><br>
              </label></td>
            <td colspan="1"><input id="conta" name="conta" type="text"></td>
          </tr>
        </tbody>
      </table>
      <br>
      <table class="motivo">
        <tbody>
          <tr>
            <td colspan="6" rowspan="1" style="background-color: #999999;">
              <h1 style="text-align: center;">PARTE 2</h1>
            </td>
          </tr>
          <tr class="titulo-bg">
            <td colspan="6" rowspan="1">
              <h1 class="titulo-center titulo-bold titulo-size">viagem</h1>
            </td>
          </tr>
          <tr>
            <td><span style="font-weight: bold;">Tipo de viagem:</span></td>
            <td style="background-color: white;">&nbsp;
              <select required="required" name="tipo_viagem">
                <option selected="selected" value="Nacional">Nacional</option>
                <option value="Internacional">Internacional</option>
                <option value="ambos">Nacional/Internacional</option>
              </select>
              <br>
            </td>
            <td><span style="font-weight: bold;">Tipo de Solicitação: <br>
              </span><br>
              <span style="font-weight: normal; font-style: italic;">Caso não
                esteja solicitando passagens e diárias, selecione "Ônus
                Limitado"</span> </td>
            <td>
              <select required="required" name="tipo_solicitacao">
                <option value="Passagens">Passagens</option>
                <option value="Diárias">Diárias</option>
                <option selected="selected" value="Passagens e Diárias">Passagens
                  e Diárias</option>
                <option value="limitado">Afastamento com Ônus Limitado (sem
                  pedido de diárias e passagens)</option>
              </select>
              <br>
            </td>
          </tr>
          <tr>
            <td><label></label> <span style="font-weight: bold;">Motivo da
                viagem:</span><br>
            </td>
            <td style="background-color: white; width: 300px;"><input name="motivo_viagem"
                value="A serviço" type="radio"> A serviço <input name="motivo_viagem"
                value="Congresso" checked="checked" type="radio"> Congresso <input
                name="motivo_viagem" value="Convocação" type="radio">Convocação
              <br>
              <input name="motivo_viagem" value="Encontro/Seminário" type="radio">
              Encontro/Seminário <input name="motivo_viagem" value="Treinamento"
                type="radio"> Treinamento<br>
            </td>
            <td><br>
            </td>
            <td><br>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="descricao">
        <tbody>
          <tr>
            <td colspan="8" rowspan="1" style="background-color: #999999;">
              <h1 style="text-align: center;">PARTE 3</h1>
            </td>
          </tr>
          <tr class="titulo-bg">
            <td colspan="8" rowspan="1">
              <h1 class="titulo-center"> <span class="titulo-bold titulo-size">Descrição
                  do Motivo da viagem</span></h1>
              <p class="titulo-center">Exemplos de eventos e/ou atividades: </p>
              <p class="titulo-center"><b><span style="color: red;">Apresentação
                    de Artigo no Congresso de Telefonia, São Paulo/SP. </span></b></p>
              <b><span style="color: red;"> </span></b>
              <p class="titulo-center"><b><span style="color: red;">Palestra do
                    Sir. Isaac Newton. Londres, Reino Unido.</span></b></p>
              <b><span style="color: red;"> </span></b>
              <p class="titulo-center"><b><span style="color: red;">Workshop de
                    Ciêncas Ocultas. Manaus/AM. <br>
                  </span></b></p>
              <p class="titulo-center"><b><span style="color: red;">Participação
                    no Curso de Ciência dos Dados. <br>
                  </span></b></p>
            </td>
          </tr>
          <tr align="center">
            <td rowspan="1" colspan="8">
              <h2><b><span style="color: rgb(255, 0, 0); font-weight: bold;"><img
                      src="obrigatorio.png" alt="obrigatorio" style="width: 27px; height: 23px;">
                  </span>EVENTO/ATIVIDADE 1</b></h2>
            </td>
          </tr>
          <tr>
            <td rowspan="1" colspan="1"><span style="font-weight: bold;">Data
                Início:<br>
                (dia/mes/ano)</span></td>
            <td><input name="data_inicio_evento1" required="required" type="date"><br>
            </td>
            <td><span style="font-weight: bold;">Hora Início:<br>
                (Hora:Minutos)</span></td>
            <td><input name="hora_inicio_evento1" required="required" value="08:00"
                type="time"><br>
            </td>
            <td><span style="font-weight: bold;">Data término:<br>
                (dia/mes/ano)</span></td>
            <td style="width: 56pt; background-color: white;"><input name="data_termino_evento1"
                required="required" onblur="copy()" type="date"><br>
            </td>
            <td><span style="font-weight: bold;">Hora término:<br>
                (Hora:Minutos)</span></td>
            <td style="width: 60px; background-color: white;"><input name="hora_termino_evento1"
                required="required" value="18:00" type="time"><br>
            </td>
          </tr>
          <tr>
            <td rowspan="1" colspan="1"><b>Cidade/UF</b></td>
            <td rowspan="1" colspan="7"><input name="cidade_evento1" required="required"
                pattern="([a-z]|[A-Z]|\s)+\/([a-z]|[A-Z])([a-z]|[A-Z])" onblur="cidade_estado()"
                type="text"><br>
            </td>
          </tr>
          <tr>
            <td rowspan=" 1" =""="" colspan="8" type="text"><b><b>Descrição do
                  Evento/Atividade.(escreva no espaço abaixo).</b> <span style="color: red;">Exemplo:
                  Apresentação de Artigo no Congresso de Telefonia</span><br>
              </b></td>
          </tr>
          <tr>
            <td rowspan="1" colspan="8"><textarea name="nome_evento1" required="required"
rows="4"></textarea><br>
            </td>
          </tr>
          <tr align="center">
            <td rowspan="1" colspan="8">
              <h2><b>EVENTO/ATIVIDADE 2<br>
                </b></h2>
            </td>
          </tr>
          <tr>
            <td rowspan="1" colspan="1"><span style="font-style: italic;"></span><span
                style="font-style: italic;"></span><span style="font-style: italic;"></span><span
                style="font-weight: bold;">Data Início:<br>
                (dia/mes/ano)</span></td>
            <td><input name="data_inicio_evento2" type="date"><br>
            </td>
            <td><span style="font-weight: bold;">Hora Início:<br>
                (Hora:Minutos)</span></td>
            <td><input name="hora_inicio_evento2" type="time"><br>
            </td>
            <td><span style="font-weight: bold;">Data término:<br>
                (dia/mes/ano)</span></td>
            <td style="width: 56pt; background-color: white;"><input name="data_termino_evento2"
                type="date"><br>
            </td>
            <td><span style="font-weight: bold;">Hora término:<br>
                (Hora:Minutos)</span></td>
            <td style="width: 60px; background-color: white;"><input name="hora_termino_evento2"
                type="time"><br>
            </td>
          </tr>
          <tr>
            <td><b>Cidade/UF</b></td>
            <td rowspan="1" colspan="7"><input name="cidade_evento2" type="text"><br>
            </td>
          </tr>
          <tr>
            <td rowspan="1" colspan="8"><b>Descrição do Evento/Atividade.
                (escreva no espaço abaixo).</b></td>
          </tr>
          <tr>
            <td rowspan="1" colspan="8"><textarea name="nome_evento2" rows="4"></textarea><br>
            </td>
          </tr>
          <tr align="center">
            <td rowspan="1" colspan="8">
              <h2><b>EVENTO/ATIVIDADE 3<br>
                </b></h2>
            </td>
          </tr>
          <tr>
            <td rowspan="1" colspan="1"><span style="font-style: italic;"></span><span
                style="font-weight: bold;">Data Início:<br>
                (dia/mes/ano)</span></td>
            <td><input name="data_inicio_evento3" type="date"><br>
            </td>
            <td><span style="font-weight: bold;">Hora Início:<br>
                (Hora:Minutos)</span></td>
            <td><input name="hora_inicio_evento3" type="time"><br>
            </td>
            <td><span style="font-weight: bold;">Data término:<br>
                (dia/mes/ano)</span></td>
            <td style="width: 56pt; background-color: white;"><input name="data_termino_evento3"
                type="date"><br>
            </td>
            <td><span style="font-weight: bold;">Hora término:<br>
                (Hora:Minutos)</span></td>
            <td style="width: 60px; background-color: white;"><input name="hora_termino_evento3"
                type="time"><br>
            </td>
          </tr>
          <tr>
            <td><b>Cidade/UF</b></td>
            <td rowspan="1" colspan="7"><input name="cidade_evento3" type="text"><br>
            </td>
          </tr>
          <tr>
            <td rowspan="1" colspan="8"><b>Descrição do Evento/Atividade.
                (escreva no espaço abaixo).</b></td>
          </tr>
          <tr>
            <td rowspan="1" colspan="8"><textarea name="nome_evento3" rows="4"></textarea><br>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="justif1">
        <tbody>
          <tr>
            <td colspan="6" rowspan="1" style="background-color: #999999;">
              <h1 style="text-align: center;">PARTE 4</h1>
            </td>
          </tr>
          <tr class="titulo-bg">
            <td colspan="1">
              <p class="titulo-center titulo-bold titulo-size">Justificativas</p>
            </td>
          </tr>
          <tr class="titulo-bg">
            <td>
              <p class="titulo-center"><b>1. Quando o afastamento iniciar-se na
                  sexta-feira, bem como os que incluam sábados, domingos e
                  feriados</b> (§ 2°, Art 5°, Dec. 5.992/06)</p>
              <p class="titulo-center"><span style="font-weight: bold; color: rgb(255, 0, 0);">Exemplos:
                  <br></span></p>
              <p class="titulo-center"><span style="font-weight: bold; color: rgb(255, 0, 0);">O
                  evento será realizado no fim de semana e/ou feriado.</span> </p>
              <p class="titulo-center"><span style="font-weight: bold; color: rgb(255, 0, 0);">É
                  necessário iniciar a viagem no domingo pois o evento tem
                  início as 8:00 da segunda feira dia 26/10/2017 e não quero
                  viajar de madrugada. <br>
                </span></p>
              <p class="titulo-center"><span style="font-weight: bold; color: rgb(255, 0, 0);"><br>
                </span></p>
            </td>
          </tr>
          <tr>
            <td><textarea id="justificativa_fds" name="justificativa_fds" rows="5"></textarea>
            </td>
          </tr>
          <tr class="titulo-bg">
            <td>
              <p class="titulo-center"><b>2. Quando a solicitação não for dentro
                  do prazo mínimo de 10 dias de antecedência em caso de viagens
                  com passagens aéreas</b> </p>
              <p class="titulo-center">(Art 1°, &nbsp;&nbsp;&nbsp; IN 03/2015
                SLTI/MPOG)</p>
              <p class="titulo-center"><span style="color: rgb(255, 0, 0); font-weight: bold;">Exemplo:
                  O convite ou aceite foi recebido com atraso. </span></p>
            </td>
          </tr>
          <tr>
            <td><textarea id="justificativa_prazo" name="justificativa_prazo" rows="5"></textarea>
            </td>
          </tr>
          <tr>
            <td style="text-align: center;"><b>3.1 Quando o início da viagem for
                em data anterior ao início do evento/atividade. </b><br>
              <b><span style="color: rgb(255, 0, 0); font-weight: bold;">Exemplo
                  : </span></b><span style="color: rgb(255, 0, 0); font-weight: bold;"><span
                  style="color: rgb(255, 0, 0); font-weight: bold;"><span style="color: black;">É
                    necessário viajar um dia antes pois o evento começa as 8:00
                    da manhã.<br>
                  </span></span><b><span style="color: rgb(255, 0, 0); font-weight: bold;"><span
                      style="color: black;"> </span></span></b> </span></td>
          </tr>
          <tr>
            <td><textarea name="justificativa_dia_antes" rows="5"></textarea><br>
            </td>
          </tr>
          <tr align="center">
            <td><b>3.2 Quando a volta for em data posterior ao fim do
                evento/atividade. </b><br>
              <b><span style="color: rgb(255, 0, 0); font-weight: bold;">Exemplo
                  : </span></b><span style="color: rgb(255, 0, 0); font-weight: bold;"><span
                  style="color: rgb(255, 0, 0); font-weight: bold;"><span style="color: black;">É
                    necessário voltar um dia depois, pois o evento termina as
                    22:00 e não há vôo no mesmo dia.</span></span></span></td>
          </tr>
          <tr>
            <td><textarea name="justificativa_dia_depois" rows="5"></textarea><br>
            </td>
          </tr>
          <tr align="center">
            <td><span style="color: rgb(255, 0, 0); font-weight: bold;"><img src="obrigatorio.png"
                  alt="obrigatorio" style="width: 27px; height: 23px;"></span><b>4.
                Relevân</b><b>cia da </b><b>viagem* (campo obrigatorio)</b><br>
              <span style="color: rgb(255, 0, 0); font-weight: bold;">Exemplo :
              </span><span style="color: rgb(255, 0, 0); font-weight: bold;"><span
                  style="color: rgb(255, 0, 0); font-weight: bold;"><span style="color: black;">Principal
                    Congresso de Física Quantica do Brasil. <br>
                  </span></span></span></td>
          </tr>
          <tr>
            <td><textarea name="txtRelevancia" required="required" rows="5"></textarea><br>
            </td>
          </tr>
          <tr align="center">
            <td><b>5. Caso esteja solicitando apenas passagens, apenas diárias,
                ou nenhum dos dois, justificar abaixo<br>
                <span style="color: red;">Exemplos:</span> </b>Estou
              solicitando apenas diárias pois vou comprar as passagens aereas
              com recursos próprios.<b><br>
              </b>Estou solicitando apenas passagens pois terei custos de
              hospedagem.<b><br>
              </b>Estou solicitando apenas passagens por motivos orçamentários
              da instituição.<br>
              Não estou solicitando nem passagens nem diárias pois arcarei com
              os custos. </td>
          </tr>
          <tr>
            <td><textarea name="justificativa_diarias" rows="5"></textarea></td>
          </tr>
        </tbody>
      </table>
      <table class="justif2">
        <tbody>
          <tr class="titulo-bg">
          </tr>
          <tr>
          </tr>
        </tbody>
      </table>
      <table class="roteiro">
        <tbody>
          <tr>
            <td colspan="7" rowspan="1" style="background-color: #999999;">
              <h1 style="text-align: center;">PARTE 5</h1>
            </td>
          </tr>
          <tr class="titulo-bg">
            <td colspan="7">
              <p class="titulo-center titulo-bold titulo-size">Roteiro da Viagem
              </p>
              <p class="titulo-center titulo-bold titulo-size">DEVE ESTAR DE
                ACORDO COM AS DATAS DA DESCRIÇAO DO MOTIVO DA VIAGEM, mesmo que
                não esteja solicitando passagens, ou trecho(s) de passagem(s),
                ou diárias.</p>
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <p class="titulo-center titulo-bold titulo-size">Origem</p>
            </td>
            <td colspan="3">
              <p class="titulo-center titulo-bold titulo-size">Destino</p>
            </td>
            <td>
              <p class="titulo-center titulo-bold titulo-size">Transporte</p>
            </td>
          </tr>
          <tr>
            <td width="10%">
              <p class="titulo-center"><b>Data</b></p>
              <p class="titulo-center"><b>(Saída)</b></p>
            </td>
            <td>
              <p class="titulo-center"><b>Local</b></p>
            </td>
            <td width="10%">
              <p class="titulo-center"><b>UF</b></p>
            </td>
            <td width="10%">
              <p class="titulo-center"><b>Data</b></p>
              <p class="titulo-center"><b>(Chegada)</b></p>
            </td>
            <td>
              <p class="titulo-center"><b>Local </b></p>
            </td>
            <td width="10%">
              <p class="titulo-center"><b>UF</b></p>
            </td>
            <td>
              <p class="titulo-center"><b>Tipo</b></p>
            </td>
          </tr>
          <tr>
            <td style="text-align: right;"><input name="roteiro_data_orig_1" required="required"
                type="date"><br>
            </td>
            <td><input required="required" id="local_orig_1" name="local_orig_1"
                onblur="origem2destino_cidade()" type="text"></td>
            <td><input required="required" id="uf_orig_1" name="uf_orig_1" maxlength="2"
                onblur="origem2destino_uf()" type="text"></td>
            <td><input name="roteiro_data_dest_1" required="required" type="date"><br>
            </td>
            <td><input required="required" id="local_dest_1" name="local_dest_1"
                type="text"></td>
            <td><input required="required" id="uf_dest_1" name="uf_dest_1" maxlength="2"
                type="text"></td>
            <td style="text-align: center;">
              <select required="required" name="meio_transporte1">
                <option selected="selected" value="Aéreo">Aéreo</option>
                <option value="Ferroviário">Ferroviário</option>
                <option value="Fluvial">Fluvial</option>
                <option value="Marítimo">Marítimo</option>
                <option value="Rodoviário">Rodoviário</option>
                <option value="Veículo Oficial">Veículo Oficial</option>
                <option value="Veículo Próprio">Veículo Próprio</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><input name="roteiro_data_orig_2" required="required" type="date"><br>
            </td>
            <td><input required="required" id="local_orig_2" name="local_orig_2"
                type="text"></td>
            <td><input required="required" id="uf_orig_2" name="uf_orig_2" maxlength="2"
                type="text"></td>
            <td><input name="roteiro_data_dest_2" type="date"><br>
            </td>
            <td><input required="required" id="local_dest_2" name="local_dest_2"
                type="text"></td>
            <td><input required="required" id="uf_dest_2" name="uf_dest_2" maxlength="2"
                type="text"></td>
            <td style="text-align: center;">
              <select required="required" name="meio_transporte2">
                <option selected="selected" value="Aéreo">Aéreo</option>
                <option value="Ferroviário">Ferroviário</option>
                <option value="Fluvial">Fluvial</option>
                <option value="Marítimo">Marítimo</option>
                <option value="Rodoviário">Rodoviário</option>
                <option value="Veículo Oficial">Veículo Oficial</option>
                <option value="Veículo Próprio">Veículo Próprio</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><input name="roteiro_data_orig_3" type="date"><br>
            </td>
            <td><input id="local_orig_3" name="local_orig_3" value="" type="text"></td>
            <td><input id="uf_orig_3" name="uf_orig_3" value="" type="text"></td>
            <td><input name="roteiro_data_dest_3" type="date"><br>
            </td>
            <td><input id="local_dest_3" name="local_dest_3" value="" type="text"></td>
            <td><input id="uf_dest_3" name="uf_dest_3" value="" type="text"></td>
            <td style="text-align: center;">
              <select required="required" name="meio_transporte3">
                <option selected="selected" value="Aéreo">Aéreo</option>
                <option value="Ferroviário">Ferroviário</option>
                <option value="Fluvial">Fluvial</option>
                <option value="Marítimo">Marítimo</option>
                <option value="Rodoviário">Rodoviário</option>
                <option value="Veículo Oficial">Veículo Oficial</option>
                <option value="Veículo Próprio">Veículo Próprio</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><input name="roteiro_data_orig_4" type="date"><br>
            </td>
            <td><input id="local_orig_4" name="local_orig_4" value="" type="text"></td>
            <td><input id="uf_orig_4" name="uf_orig_4" value="" type="text"></td>
            <td><input name="roteiro_data_dest_4" type="date"><br>
            </td>
            <td><input id="local_dest_4" name="local_dest_4" value="" type="text"></td>
            <td><input id="uf_dest_4" name="uf_dest_4" value="" type="text"></td>
            <td style="text-align: center;">
              <select required="required" name="meio_transporte4">
                <option selected="selected" value="Aéreo">Aéreo</option>
                <option value="Ferroviário">Ferroviário</option>
                <option value="Fluvial">Fluvial</option>
                <option value="Marítimo">Marítimo</option>
                <option value="Rodoviário">Rodoviário</option>
                <option value="Veículo Oficial">Veículo Oficial</option>
                <option value="Veículo Próprio">Veículo Próprio</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><input name="roteiro_data_orig_5" type="date"><br>
            </td>
            <td><input id="local_orig_5" name="local_orig_5" value="" type="text"></td>
            <td><input id="uf_orig_5" name="uf_orig_5" value="" type="text"></td>
            <td><input name="roteiro_data_dest_5" type="date"><br>
            </td>
            <td><input id="local_dest_5" name="local_dest_5" value="" type="text"></td>
            <td><input id="uf_dest_5" name="uf_dest_5" value="" type="text"></td>
            <td style="text-align: center;">
              <select required="required" name="meio_transporte5">
                <option selected="selected" value="Aéreo">Aéreo</option>
                <option value="Ferroviário">Ferroviário</option>
                <option value="Fluvial">Fluvial</option>
                <option value="Marítimo">Marítimo</option>
                <option value="Rodoviário">Rodoviário</option>
                <option value="Veículo Oficial">Veículo Oficial</option>
                <option value="Veículo Próprio">Veículo Próprio</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><input name="roteiro_data_orig_6" type="date"><br>
            </td>
            <td><input id="local_orig_6" name="local_orig_6" value="" type="text"></td>
            <td><input id="uf_orig_6" name="uf_orig_6" value="" type="text"></td>
            <td><input name="roteiro_data_dest_6" type="date"><br>
            </td>
            <td><input id="local_dest_6" name="local_dest_6" value="" type="text"></td>
            <td><input id="uf_dest_6" name="uf_dest_6" value="" type="text"></td>
            <td style="text-align: center;">
              <select required="required" name="meio_transporte6">
                <option selected="selected" value="Aéreo">Aéreo</option>
                <option value="Ferroviário">Ferroviário</option>
                <option value="Fluvial">Fluvial</option>
                <option value="Marítimo">Marítimo</option>
                <option value="Rodoviário">Rodoviário</option>
                <option value="Veículo Oficial">Veículo Oficial</option>
                <option value="Veículo Próprio">Veículo Próprio</option>
              </select>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="observacoes" style="width: 960px; height: 181px;">
        <tbody>
          <tr>
            <td colspan="6" rowspan="1" style="background-color: #999999;">
              <h1 style="text-align: center;">PARTE 6</h1>
            </td>
          </tr>
          <tr class="titulo-bg">
            <td rowspan="1" colspan="6">
              <p class="titulo-center"> <span class="titulo-bold titulo-size">SUGESTÃO
                  DE VÔO<br>
                </span></p>
              <p class="titulo-center"><span class="titulo-bold titulo-size"></span>(em
                caso de solicitação de passagens)</p>
              <p class="titulo-center">Caso seu roteiro de viagem seja apenas
                uma viagem de ida e volta voando com a mesma empresa, preencha a
                primeira linha abaixo (empresa, horário de ida e horário de
                volta). </p>
              <p class="titulo-center">Caso seu roteiro necessite de sugestões
                mais detalhadas, utilize apenas o quadro "Informações
                Adicionais" abaixo. </p>
              <p class="titulo-center"><b><span style="color: red;">Obs. A
                    sugestão precisa ser fiel ao roteiro da viagem fornecido na
                    tabela acima, sob o risco do pedido ser negado. Trata-se de
                    uma sugestão, não há garantia de que a sugestão será
                    atendida. Verifique anteriormente os horários de voos
                    existentes. <br>
                  </span></b></p>
              <p class="titulo-center"><span style="color: rgb(255, 0, 0);"><span
                    style="font-weight: bold;"><br>
                  </span></span></p>
            </td>
          </tr>
          <tr>
            <td><b>Empresa</b></td>
            <td><input name="sugestao_empresa" onfocus="copy_sugestao()" type="text"><br>
            </td>
            <td style="text-align: center;"><b>Data e Horário <br>
                de Ida</b></td>
            <td><input name="sugestao_ida" type="datetime-local"><br>
            </td>
            <td style="text-align: center;"><b>Data e Horário <br>
                de Volta</b></td>
            <td><input name="sugestao_volta" type="datetime-local"><br>
            </td>
          </tr>
          <tr>
            <td rowspan="1" colspan="6"><b>Informações adicionais, caso deseje
                detalhar a sugestão (opcional)</b></td>
          </tr>
          <tr>
            <td rowspan="1" colspan="6"><textarea id="obs" name="obs" rows="5"></textarea></td>
          </tr>
        </tbody>
      </table>
      <table class="observacoes">
        <tbody>
          <tr class="titulo-bg">
            <td>
              <p class="titulo-center titulo-bold titulo-size">TERMO DE
                RESPONSABILIDADE</p>
            </td>
          </tr>
          <tr>
            <td>
              <p> <input required="required" name="termo_responsabilidade" type="checkbox">Assumo
                a responsabilidade de prestar contas dessa viagem e
                comprometo-me a entregar à unidade solicitante o relatório de
                atividades e os comprovantes de embarque (em casos de passagens
                aéreas), no prazo máximo de cinco dias a contar do retorno da
                viagem, de acordo com o artigo 7º do decreto 5.992/2006,
                Portaria MEC 403/99, que dispõem sobre concessão de viagens. </p>
            </td>
          </tr>
        </tbody>
      </table>
      <br>
      <table class="botoes">
        <tbody>
          <tr>
            <td style="text-align: center;" class=""><input value="Imprimir Formulário"
type="submit"></td>
            <td style="text-align: center;" class=""><input value="Limpar Formulário"
name="clear" onclick="clearFunction()" type="submit"></td>
            <td class=""> <input name="saveXml" value="Salvar Formulário" disabled="disabled"
type="submit"></td>
            <td class="">Abrir formulário: <input name="userfile" type="file">
              <input name="loadXml" value="Abrir PCDP" disabled="disabled" type="submit"></td>
            <td class="">&nbsp;<?php // outputs e.g. 'Last modified: March 04 1998 20:43:59.'
echo "Última Modificação: " . date ("d/m/Y H:i:s.", getlastmod());?><br>
              <br>
              &nbsp;
              <!-- hitwebcounter Code START -->
              <a href="http://www.hitwebcounter.com" target="_blank">
                <img src="http://hitwebcounter.com/counter/counter.php?page=6941253&amp;style=0006&amp;nbdigits=5&amp;type=ip&amp;initCount=0"
                  title="Hit Web Stats" alt="Hit Web Stats" border="0">
              </a> <br>
              <!-- hitwebcounter.com --> </td>
          </tr>
        </tbody>
      </table>
    </form>
    <script type="text/javascript">

		var docente = document.getElementById("tp_proposto_servidor_docente");
		var adm = document.getElementById("tp_proposto_servidor_administrativo");
		
		document.getElementById("tp_proposto_convidado").addEventListener("click", function(){
			docente.checked = false;
			adm.checked = false;
		});
		
		document.getElementById("tp_proposto_eventual").addEventListener("click",  function(){
			docente.checked = false;
			adm.checked = false;
		});

		document.getElementById("tp_proposto_sepe").addEventListener("click",  function(){
			docente.checked = false;
			adm.checked = false;
		});

		document.getElementById("tp_proposto_outros").addEventListener("click",  function(){
			docente.checked = false;
			adm.checked = false;
		});
		
			

	</script>
  </body>
</html>
