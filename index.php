<html>
  <head>
    <meta  content="text/html; charset=utf-8"  http-equiv="content-type">
    <title>PCDP - Pedido de Concessão de Diárias e Passagens</title>
    <link  rel="stylesheet"  href="estilo.css">
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

	</script>
    <meta  content="Coordenadoria de Inovação - PRPI"  name="author">
  </head>
  <body>
    <table  class="header">
      <tbody>
        <tr>
          <td><img  alt="logo"  src="logo2.png"></td>
          <td>
            <p  class="titulo-right titulo-bold titulo-size">PCDP - Pedido de
              Concessão de Diárias e Passagens </p>
          </td>
          <td  class="botoes"><a  href="pcdp_instrucao_preenchimento.pdf"  class="help"
               title="Instruções de preenchimento em arquivo PDF">?</a> </td>
        </tr>
      </tbody>
    </table>
    <form  enctype="multipart/form-data"  action="pcdp.php"  name="pcdp_form"  id="pcdp_form"
       method="post"> <input  name="MAX_FILE_SIZE"  value="30000"  type="hidden">
      <table  class="basico">
        <tbody>
          <tr  class="titulo-bg">
            <td  colspan="8">
              <p  class="titulo-center titulo-bold titulo-size">DADOS DO
                PROPOSTO <span  style="font-style: italic;">(<span  style="font-weight: normal;">A
                    PESSOA QUE VAI VIAJAR)</span></span></p>
              <p  class="titulo-center titulo-bold titulo-size"><span  style="font-style: italic;"><span
                     style="font-weight: normal;">(não é necessariamente quem
                    está preenchendo)</span></span></p>
            </td>
          </tr>
          <tr>
            <td  colspan="8"  rowspan="1">Tipo de pedido:
              <select  required="required"  name="tipo_pedido">
                <option  value="balcao">Pedido ordinário a PRPI</option>
                <option  value="edital">Edital de Grupos de Pesquisa</option>
                <option  value="gabinete">Gabinete da reitoria</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><span  style="font-weight: bold;">Tipo:<br>
              </span><span  style="font-style: italic;">(da pessoa que vai
                viajar)</span><span  style="font-weight: bold;"><br>
              </span></td>
            <td  colspan="4"  rowspan="1">
              <select  required="required"  name="tipo">
                <option  selected="selected"  value="Servidor da UFCA">Servidor
                  da UFCA</option>
                <option  value="Colaborador Eventual">Colaborador Eventual</option>
                <option  value="Militar">Militar</option>
                <option  value="Servidor Convidado">Servidor Convidado</option>
                <option  value="SEPE - Servidor de outro poder ou esfera">SEPE -
                  Servidor de outro poder ou esfera</option>
              </select>
            </td>
            <td  width="10%"><span  style="font-weight: bold;">Nível:<br>
              </span><span  style="font-style: italic;">(da pessoa que vai
                viajar)</span><span  style="font-weight: bold;"></span></td>
            <td  colspan="2"  rowspan="1">
              <select  required="required"  name="nivel">
                <option  selected="selected"  value="Superior">Superior</option>
                <option  value="Médio">Médio</option>
              </select>
            </td>
          </tr>
          <tr>
            <td  colspan="1"><label>Nome<br>
              </label><span  style="font-style: italic;">(da pessoa que vai
                viajar)</span><span  style="font-weight: bold;"></span></td>
            <td  rowspan="1"  colspan="7"><input  required="required"  id="nome"
                 name="nome"  type="text"><br>
            </td>
          </tr>
          <tr>
            <td  colspan="1"><label>Cargo:<br>
                <span  style="font-weight: normal; font-style: italic;">Ex:
                  Professor, Técnico Administrativo, Gerente, ...<br>
                  Caso não se aplique, escreva: N/A<br>
                </span> </label></td>
            <td  rowspan="1"  colspan="3"><input  required="required"  id="endereco"
                 name="cargo"  type="text"></td>
            <td  colspan="1"><span  style="font-weight: bold;">Lotação:<br>
              </span><span  style="font-style: italic;">Ex: CCT, CCSA,
                Departamento de Física, ...</span><span  style="font-weight: bold;"><br>
              </span>Caso não se aplique, escreva: N/A<span  style="font-weight: bold;"><br>
              </span></td>
            <td  colspan="1"><input  name="lotacao"  type="text"><br>
            </td>
            <td  colspan="1"><br>
            </td>
            <td><br>
            </td>
          </tr>
          <tr>
            <td  width="10%"><label>RG:</label></td>
            <td  width="12%"><input  required="required"  id="cep"  name="rg"  type="text"></td>
            <td  width="5%"><label>Orgão Emissor:<br>
                <span  style="font-weight: normal; font-style: italic;">Ex:
                  SSP/CE</span><br>
              </label></td>
            <td  width="13%"><input  required="required"  id="uf"  name="uf"  type="text"></td>
            <td  width="5%"><label>Celular:<br>
                <span  style="font-weight: normal; font-style: italic;">Ex:
                  (88)98812-3456<br>
                  (sem espaços, exatamente no formato acima)<br>
                </span> </label></td>
            <td  width="28%"><input  required="required"  pattern="^(\([0-9][0-9]\)(9\d{4})-\d{4})|((\(1[2-9]{1}\)|\([2-9]{1}\d{1}\)) [5-9]\d{3}-\d{4})$"
                 id="cidade"  name="celular"  type="text"></td>
            <td  width="15%"><label>DATA DE NASCIMENTO:<br>
                <span  style="font-weight: normal; font-style: italic;">Dia/Mes/Ano<br>
                  Ex: 01/01/1900<br>
                </span></label></td>
            <td  width="12%"><input  required="required"  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 id="data_nascimento"  name="data_nascimento"  type="text"></td>
          </tr>
          <tr>
            <td  colspan="1"><label>CPF:<br>
                <span  style="font-weight: normal; font-style: italic;">Ex:
                  000000000-00</span><br>
              </label></td>
            <td  colspan="1"><input  required="required"  id="cpf"  name="cpf"  type="text"></td>
            <td  colspan="1"><label>SIAPE:</label></td>
            <td  colspan="1"><input  id="siape"  name="siape"  type="text"></td>
            <td  colspan="1"><label>E-MAIL:<br>
                <span  style="font-weight: normal; font-style: italic;">Ex:
                  nome@dominio.com</span><br>
                <i>(este e-mail será utilizado para emissão dos bilhetes e
                  informação sobre as diárias)</i><br>
              </label></td>
            <td  colspan="1"><input  required="required"  id="email"  name="email"
                 type="text"></td>
            <td  colspan="1"><label>TELEFONE:<br>
              </label><span  style="font-weight: normal; font-style: italic;">Ex:
                (88)3221-3456</span><br>
              <span  style="font-weight: normal; font-style: italic;">(sem
                espaços, exatamente no formato acima)</span></td>
            <td  colspan="1"><input  pattern="^(\([0-9][0-9]\)(\d{4})-\d{4})|((\(1[2-9]{1}\)|\([2-9]{1}\d{1}\)) [5-9]\d{3}-\d{4})$"
                 id="telefone"  name="telefone"  type="text"></td>
          </tr>
          <tr>
            <td  colspan="2"><label>Auxílio Alimentação (no caso de SEPE):</label></td>
            <td  colspan="6"><input  id="alimentacao"  name="alimentacao"  type="text"></td>
          </tr>
          <tr>
            <td  colspan="8">
              <p  class="titulo-center titulo-bold titulo-size">Dados BancárioS</p>
            </td>
          </tr>
          <tr>
            <td  colspan="1"><label>Banco:<br>
                <span  style="font-weight: normal; font-style: italic;">Ex:
                  Banco do Brasil</span><br>
              </label></td>
            <td  colspan="3"><input  required="required"  name="banco"  type="text"><br>
            </td>
            <td  colspan="1"><label>Agência:<br>
                <span  style="font-weight: normal; font-style: italic;">Ex:
                  1598-9</span><br>
              </label></td>
            <td  colspan="1"><input  id="agencia"  name="agencia"  type="text"></td>
            <td  colspan="1"><label>Conta-Corrente:<br>
                <span  style="font-weight: normal; font-style: italic;">Ex:
                  11111-2</span><br>
              </label></td>
            <td  colspan="1"><input  id="conta"  name="conta"  type="text"></td>
          </tr>
        </tbody>
      </table>
      <br>
      <table  class="motivo">
        <tbody>
          <tr  class="titulo-bg">
            <td  colspan="6"  rowspan="1">
              <p  class="titulo-center titulo-bold titulo-size">viagem</p>
            </td>
          </tr>
          <tr>
            <td><span  style="font-weight: bold;">Tipo de viagem:</span></td>
            <td>&nbsp;
              <select  required="required"  name="tipo_viagem">
                <option  selected="selected"  value="Nacional">Nacional</option>
                <option  value="Internacional">Internacional</option>
              </select>
              <br>
            </td>
            <td><span  style="font-weight: bold;">Tipo de Solicitação: </span><br>
            </td>
            <td>
              <select  required="required"  name="tipo_solicitacao">
                <option  value="Passagens">Passagens</option>
                <option  value="Diárias">Diárias</option>
                <option  selected="selected"  value="Passagens e Diárias">Passagens
                  e Diárias</option>
              </select>
              <br>
            </td>
            <td><span  style="font-weight: bold;">Meio de transporte: </span><br>
            </td>
            <td>
              <select  required="required"  name="meio_transporte">
                <option  selected="selected"  value="Aéreo">Aéreo</option>
                <option  value="Ferroviário">Ferroviário</option>
                <option  value="Fluvial">Fluvial</option>
                <option  value="Marítimo">Marítimo</option>
                <option  value="Rodoviário">Rodoviário</option>
                <option  value="Veículo Oficial">Veículo Oficial</option>
                <option  value="Veículo Próprio">Veículo Próprio</option>
              </select>
              <br>
            </td>
          </tr>
          <tr>
            <td><label></label> <span  style="font-weight: bold;">Motivo da
                viagem:</span><br>
            </td>
            <td><input  name="motivo_viagem"  value="A serviço"  type="radio"> A
              serviço <input  name="motivo_viagem"  value="Congresso"  checked="checked"
                 type="radio"> Congresso <input  name="motivo_viagem"  value="Convocação"
                 type="radio">Convocação <br>
              <input  name="motivo_viagem"  value="Encontro/Seminário"  type="radio">
              Encontro/Seminário <input  name="motivo_viagem"  value="Treinamento"
                 type="radio"> Treinamento<br>
            </td>
            <td><br>
            </td>
            <td><br>
            </td>
            <td><br>
            </td>
            <td><br>
            </td>
          </tr>
        </tbody>
      </table>
      <table  style="width: 960px; height: 217px;"  class="descricao">
        <tbody>
          <tr  class="titulo-bg">
            <td  colspan="10"  rowspan="1">
              <p  class="titulo-center"> <span  class="titulo-bold titulo-size">Descrição
                  do Motivo da viagem</span><br>
                (Descrever de forma sucinta o motivo da viagem, local, data e
                hora de início e término do evento) </p>
              <p  class="titulo-center">Exemplos: </p>
              <p  class="titulo-center">Congresso de Telefonia, São Paulo/SP.
                Início em 26/06/2017 as 9:00, término em 28/06/2017 as 18:00. </p>
              <p  class="titulo-center">Palestra do Prof. Isaac Newton. Incio em
                13/10/2017, término em 14/10/2017 as 17:30.</p>
            </td>
          </tr>
          <tr>
            <td><span  style="font-weight: bold;">Nome do Evento:<br>
              </span><span  style="font-style: italic;">(Indique a cidade e o
                estado)</span><span  style="font-weight: bold;"><br>
              </span></td>
            <td><input  required="required"  name="nome_evento1"  type="text"><br>
            </td>
            <td><span  style="font-weight: bold;">Data Início:<br>
                (dia/mes/ano)</span></td>
            <td><input  required="required"  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 name="data_inicio_evento1"  type="text"><br>
            </td>
            <td><span  style="font-weight: bold;">Hora Início:<br>
                (Hora:Minutos)</span></td>
            <td><input  pattern="^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"  required="required"
                 name="hora_inicio_evento1"  type="text"><br>
            </td>
            <td><span  style="font-weight: bold;">Data término:<br>
                (dia/mes/ano)</span></td>
            <td><input  required="required"  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 name="data_termino_evento1"  type="text"><br>
            </td>
            <td><span  style="font-weight: bold;">Hora término:<br>
                (Hora:Minutos)</span></td>
            <td><input  pattern="^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"  required="required"
                 name="hora_termino_evento1"  type="text"><br>
            </td>
          </tr>
          <tr>
            <td><span  style="font-weight: bold;">Nome do Evento:<br>
              </span><span  style="font-style: italic;">(Indique a cidade e o
                estado)</span><br>
            </td>
            <td><input  name="nome_evento2"  type="text"><br>
            </td>
            <td><span  style="font-weight: bold;">Data Início:</span></td>
            <td><input  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 name="data_inicio_evento2"  type="text"><br>
            </td>
            <td><span  style="font-weight: bold;">Hora Início:</span></td>
            <td><input  name="hora_inicio_evento2"  type="text"><br>
            </td>
            <td><span  style="font-weight: bold;">Data Término:</span></td>
            <td><input  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 name="data_termino_evento2"  type="text"><br>
            </td>
            <td><span  style="font-weight: bold;">Hora término:</span></td>
            <td><input  name="hora_termino_evento2"  type="text"><br>
            </td>
          </tr>
          <tr>
            <td><span  style="font-weight: bold;">Nome do Evento:<br>
              </span><span  style="font-style: italic;">(Indique a cidade e o
                estado)</span></td>
            <td><input  name="nome_evento3"  type="text"><br>
            </td>
            <td><span  style="font-weight: bold;">Data Início:</span></td>
            <td><input  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 name="data_inicio_evento3"  type="text"><br>
            </td>
            <td><span  style="font-weight: bold;">Hora Início:</span></td>
            <td><input  name="hora_inicio_evento3"  type="text"><br>
            </td>
            <td><span  style="font-weight: bold;">Data Término:</span></td>
            <td><input  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 name="data_termino_evento3"  type="text"><br>
            </td>
            <td><span  style="font-weight: bold;">Hora Término:</span></td>
            <td><input  name="hora_termino_evento3"  type="text"><br>
            </td>
          </tr>
          <tr  align="center">
            <td  colspan="10"  rowspan="1"><b>****Caso esteja solicitando apenas
                passagens ou apenas dárias, justificar abaixo***<br>
                Exemplos: </b>Estou solicitando apenas diárias pois vou comprar
              as passagens aereas com recursos próprios.<b><br>
              </b>Estou solicitando apenas passagens pois terei custos de
              hospedagem.<b><br>
              </b>Estou solicitando apenas passagens por motivos orçamentários
              da instituição. </td>
          </tr>
          <tr>
            <td  colspan="10"  rowspan="1"><input  name="justificativa_diarias"
                 type="text"><br>
            </td>
          </tr>
        </tbody>
      </table>
      <table  class="justif1">
        <tbody>
          <tr  class="titulo-bg">
            <td  colspan="1">
              <p  class="titulo-center titulo-bold titulo-size">Justificativas</p>
              <p  class="titulo-center titulo-bold titulo-size"><span  style="color: rgb(255, 0, 0);">Não
                  é necessário justificar a relevância do evento. </span></p>
            </td>
          </tr>
          <tr  class="titulo-bg">
            <td>
              <p  class="titulo-center">1. Quando o afastamento iniciar-se na
                sexta-feira, bem como os que incluam sábados, domingos e
                feriados (§ 2°, Art 5°, Dec. 5.992/06)</p>
              <p  class="titulo-center"><span  style="font-weight: bold; color: rgb(255, 0, 0);">Exemplos:
                  <br></span></p>
              <p  class="titulo-center"><span  style="font-weight: bold; color: rgb(255, 0, 0);">O
                  evento será realizado no fim de semana e/ou feriado.</span> </p>
              <p  class="titulo-center"><span  style="font-weight: bold; color: rgb(255, 0, 0);">É
                  necessário iniciar a viagem no domingo pois o evento tem
                  início as 8:00 da segunda feira dia 26/10/2017 e não quero
                  viajar de madrugada. <br>
                </span></p>
              <p  class="titulo-center"><span  style="font-weight: bold; color: rgb(255, 0, 0);"><br>
                </span></p>
            </td>
          </tr>
          <tr>
            <td><textarea  id="justificativa_fds"  name="justificativa_fds"></textarea>
            </td>
          </tr>
          <tr  class="titulo-bg">
            <td>
              <p  class="titulo-center">2. Quando a solicitação não for dentro
                do prazo mínimo de 10 dias de antecedência em caso de viagens
                com passagens aéreas (Art 1°, Port. 505/09)</p>
              <p  class="titulo-center"><span  style="color: rgb(255, 0, 0); font-weight: bold;">Exemplo:
                  O convite ou aceite foi recebido com atraso. </span></p>
            </td>
          </tr>
          <tr>
            <td><textarea  id="justificativa_prazo"  name="justificativa_prazo"></textarea>
            </td>
          </tr>
          <tr>
            <td>3. Quando o início da viagem for em data em dia anterior ao
              início do evento. <br>
              <span  style="color: rgb(255, 0, 0); font-weight: bold;">Exemplo :
              </span><span  style="color: rgb(255, 0, 0); font-weight: bold;"><span
                   style="color: rgb(255, 0, 0); font-weight: bold;"><span  style="color: black;">É
                    necessário viajar um dia antes pois o evento começa as 8:00
                    da manhã. </span></span> </span></td>
          </tr>
          <tr>
            <td><input  name="justificativa_dia_antes"  type="text"><br>
            </td>
          </tr>
        </tbody>
      </table>
      <table  class="justif2">
        <tbody>
          <tr  class="titulo-bg">
          </tr>
          <tr>
          </tr>
        </tbody>
      </table>
      <table  class="roteiro">
        <tbody>
          <tr  class="titulo-bg">
            <td  colspan="7">
              <p  class="titulo-center titulo-bold titulo-size">Roteiro da
                Viagem </p>
              <p  class="titulo-center titulo-bold titulo-size">DEVE ESTAR DE
                ACORDO COM AS DATAS DO MOTIVO DA VIAGEM, mesmo que não esteja
                solicitando passagens, ou trecho(s) de passagem(s).</p>
              <p  class="titulo-center titulo-bold titulo-size">Caso o pedido
                não esteja previsto em edital específico (edital de grupos, por
                exemplo), atente-se para que a viagem não ultrapasse as 3.5
                diárias. </p>
            </td>
          </tr>
          <tr>
            <td  colspan="3">
              <p  class="titulo-center titulo-bold titulo-size">Origem</p>
            </td>
            <td  colspan="3">
              <p  class="titulo-center titulo-bold titulo-size">Destino</p>
            </td>
            <td>
              <p  class="titulo-center titulo-bold titulo-size">Transporte</p>
            </td>
          </tr>
          <tr>
            <td  width="10%">
              <p  class="titulo-center">Data</p>
            </td>
            <td>
              <p  class="titulo-center">Local</p>
            </td>
            <td  width="10%">
              <p  class="titulo-center">UF</p>
            </td>
            <td  width="10%">
              <p  class="titulo-center">Data</p>
            </td>
            <td>
              <p  class="titulo-center">Local</p>
            </td>
            <td  width="10%">
              <p  class="titulo-center">UF</p>
            </td>
            <td>
              <p  class="titulo-center">Tipo</p>
            </td>
          </tr>
          <tr>
            <td><input  required="required"  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 id="roteiro_data_orig_1"  name="roteiro_data_orig_1"  type="text"></td>
            <td><input  required="required"  id="local_orig_1"  name="local_orig_1"
                 type="text"></td>
            <td><input  required="required"  id="uf_orig_1"  name="uf_orig_1"  type="text"></td>
            <td><input  required="required"  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 id="roteiro_data_dest_1"  name="roteiro_data_dest_1"  type="text"></td>
            <td><input  required="required"  id="local_dest_1"  name="local_dest_1"
                 type="text"></td>
            <td><input  required="required"  id="uf_dest_1"  name="uf_dest_1"  type="text"></td>
            <td><input  id="roteiro_tipo_1"  name="roteiro_tipo_1"  type="text"></td>
          </tr>
          <tr>
            <td><input  required="required"  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 id="roteiro_data_orig_2"  name="roteiro_data_orig_2"  type="text"></td>
            <td><input  required="required"  id="local_orig_2"  name="local_orig_2"
                 type="text"></td>
            <td><input  required="required"  id="uf_orig_2"  name="uf_orig_2"  type="text"></td>
            <td><input  required="required"  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 id="roteiro_data_dest_2"  name="roteiro_data_dest_2"  type="text"></td>
            <td><input  required="required"  id="local_dest_2"  name="local_dest_2"
                 type="text"></td>
            <td><input  required="required"  id="uf_dest_2"  name="uf_dest_2"  type="text"></td>
            <td><input  id="roteiro_tipo_2"  name="roteiro_tipo_2"  type="text"></td>
          </tr>
          <tr>
            <td><input  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 id="roteiro_data_orig_3"  name="roteiro_data_orig_3"  type="text"></td>
            <td><input  id="local_orig_3"  name="local_orig_3"  value=""  type="text"></td>
            <td><input  id="uf_orig_3"  name="uf_orig_3"  value=""  type="text"></td>
            <td><input  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 id="roteiro_data_dest_3"  name="roteiro_data_dest_3"  type="text"></td>
            <td><input  id="local_dest_3"  name="local_dest_3"  value=""  type="text"></td>
            <td><input  id="uf_dest_3"  name="uf_dest_3"  value=""  type="text"></td>
            <td><input  id="roteiro_tipo_3"  name="roteiro_tipo_3"  value=""  type="text"></td>
          </tr>
          <tr>
            <td><input  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 id="roteiro_data_orig_4"  name="roteiro_data_orig_4"  type="text"></td>
            <td><input  id="local_orig_4"  name="local_orig_4"  value=""  type="text"></td>
            <td><input  id="uf_orig_4"  name="uf_orig_4"  value=""  type="text"></td>
            <td><input  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 id="roteiro_data_dest_4"  name="roteiro_data_dest_4"  type="text"></td>
            <td><input  id="local_dest_4"  name="local_dest_4"  value=""  type="text"></td>
            <td><input  id="uf_dest_4"  name="uf_dest_4"  value=""  type="text"></td>
            <td><input  id="roteiro_tipo_4"  name="roteiro_tipo_4"  value=""  type="text"></td>
          </tr>
          <tr>
            <td><input  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 id="roteiro_data_orig_5"  name="roteiro_data_orig_5"  type="text"></td>
            <td><input  id="local_orig_5"  name="local_orig_5"  value=""  type="text"></td>
            <td><input  id="uf_orig_5"  name="uf_orig_5"  value=""  type="text"></td>
            <td><input  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 id="roteiro_data_dest_5"  name="roteiro_data_dest_5"  type="text"></td>
            <td><input  id="local_dest_5"  name="local_dest_5"  value=""  type="text"></td>
            <td><input  id="uf_dest_5"  name="uf_dest_5"  value=""  type="text"></td>
            <td><input  id="roteiro_tipo_5"  name="roteiro_tipo_5"  value=""  type="text"></td>
          </tr>
          <tr>
            <td><input  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 id="roteiro_data_orig_6"  name="roteiro_data_orig_6"  type="text"></td>
            <td><input  id="local_orig_6"  name="local_orig_6"  value=""  type="text"></td>
            <td><input  id="uf_orig_6"  name="uf_orig_6"  value=""  type="text"></td>
            <td><input  pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                 id="roteiro_data_dest_6"  name="roteiro_data_dest_6"  type="text"></td>
            <td><input  id="local_dest_6"  name="local_dest_6"  value=""  type="text"></td>
            <td><input  id="uf_dest_6"  name="uf_dest_6"  value=""  type="text"></td>
            <td><input  id="roteiro_tipo_6"  name="roteiro_tipo_6"  value=""  type="text"></td>
          </tr>
        </tbody>
      </table>
      <table  class="observacoes">
        <tbody>
          <tr  class="titulo-bg">
            <td>
              <p  class="titulo-center"> <span  class="titulo-bold titulo-size">SUGESTÃO
                  DE VÔO</span> <br>
                (Sugira a opção de voo) </p>
              <p  class="titulo-center"><span  style="color: rgb(255, 0, 0);"><span
                     style="font-weight: bold;">Exemplo: Ida: Juazeiro para São
                    paulo, saindo as 11:25 do dia 26/10/2017. Volta: São Paulo
                    para Juazeiro saindo as 15:15 do dia 28/10/2017. </span></span></p>
            </td>
          </tr>
          <tr>
            <td><textarea  id="obs"  name="obs"></textarea></td>
          </tr>
        </tbody>
      </table>
      <table  class="observacoes">
        <tbody>
          <tr  class="titulo-bg">
            <td>
              <p  class="titulo-center titulo-bold titulo-size">TERMO DE
                RESPONSABILIDADE</p>
            </td>
          </tr>
          <tr>
            <td>
              <p> <input  required="required"  name="termo_responsabilidade"  type="checkbox">Assumo
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
      <table  class="botoes">
        <tbody>
          <tr>
            <td  style="text-align: center;"  class=""><input  value="Imprimir Formulário"
 type="submit"> <input  value="Limpar Formulário"  name="clear"  onclick="clearFunction()"
 type="submit"> </td>
				<td  class=""> <a  href="pcdp_instrucao_preenchimento.pdf"  class="help"  title="Instruções de preenchimento em arquivo PDF">?</a>
				</td>
			</tr>
		</tbody></table>



	</form>

	<script  type="text/javascript">

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
</body></html>