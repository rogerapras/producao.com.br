{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idAgendaHorario}>0} {$registro.dsAgendaHorario|default:''}{else} Inclus&atilde;o de Agenda / Horarios{/if}</h1></tt>
            </div>          
            <form name="frm-agendahorario" 
                  action="/agendahorario/gravar_agendahorario" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <a href="/agendahorario" class="btn btn-primary"> Voltar</a>
                <input class="btn btn-primary" type="submit" value="  Criar Agenda" name="btnGravar" {if $registro.idAgendaHorario > 0} disabled {/if} />         
                <br>
                <br>
                <input type="hidden" class="form-control" name="idColaboradorEscolhido" id="idColaboradorEscolhido" value="" />           
                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idAgendaHorario}>0}
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idAgendaHorario" id="idAgendaHorario" value="{$registro.idAgendaHorario|default:''}" READONLY />           
                        {else}
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idAgendaHorario" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="unidade">Ano</label>
                            <select class="form-control" name="idAno" id="idAno">
                                {html_options options=$lista_ano selected=$ano}
                            </select>                      
                        </div>
                    </div>                                         
                    <div class="col-xs-3">
                        <label for="form-control">Descrição</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsAgendaHorario|default:''}" >           
                    </div> 
                </div> 
            </form>
            <div class="row" >
                <h3> &nbsp; Colaboradores para esta agenda</h3>
                <br>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="colaborador">Colaborador </label>
                        <select class="form-control" name="idColaborador" id="idColaborador"> 
                            {html_options options=$lista_colaborador selected=null}
                        </select>                      
                    </div>
                </div>
                <br>
                <div class="col-xs-1">
                  <div class="row">
                      <a class="btn btn-primary" id="btnGravarColaborador" title="Adiciona Colaborador" onclick="gravarcolaborador();" {if $registro.idAgendaHorario eq ''} disabled {/if}  >Adiciona Colaborador</a> 
                  </div> 
                </div> 
            </div>
            <div id="mostrarcolaboradores">
                 {include file="agendahorario/agendahorariocolaborador.html"}
            </div>
            <div class="row">
                <h3> &nbsp; Use as setas para mudar de mês dentro do ano - {$valores.mesextenso} - </h3>
                <div class="col-xs-1">
                     <label for="Voltar"></label>                    
                     <a class="btn btn-primary" id="btnVoltar" title="Voltar" href="/agendahorario/voltar/idAgendaHorario/{$registro.idAgendaHorario}/dtInicio/{$valores.datainicio}/dtFim/{$valores.datafinal}" {if $registro.idAgendaHorario eq ''} disabled {/if}  >Mês Anterior</a> 
                </div> 
                <div class="col-xs-1">
                     <label for="Avançar"></label>                    
                     <a class="btn btn-primary" id="btnAvancar" title="Avançar" href="/agendahorario/avancar/idAgendaHorario/{$registro.idAgendaHorario}/dtInicio/{$valores.datainicio}/dtFim/{$valores.datafinal}" {if $registro.idAgendaHorario eq ''} disabled {/if}  >Próximo Mês</a> 
                </div> 
                <div class="col-xs-1">
                     <label for="datainicio"></label>                    
                    <input type="text" class="form-control" name="datainicio" id="datainicio" value="{$valores.datainicio|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" READONLY />           
                </div>
                <div class="col-xs-1">
                     <label for="datafinal"></label>                    
                    <input type="text" class="form-control" name="datafinal" id="datafinal" value="{$valores.datafinal|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" READONLY />           
                </div>                        
                <div class="col-xs-1">
                </div>                        
                <div class="col-xs-1">
                    <label for="dtinicial">Data inicial </label>                    
                    <input type="text" class="form-control" name="datainicion" id="datainicion" value="{$valores.datainicio|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" readonly="true"/>           
                </div>
                <div class="col-xs-1">
                    <label for="dtfinal">Data final </label>                    
                    <input type="text" class="form-control" name="datafinaln" id="datafinaln" value="{$valores.datafinal|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" readonly="true" />           
                </div>                        
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="statusagenda">Status da Agenda</label>
                        <select class="form-control" name="idTipoAgenda" id="idTipoAgenda" readonly="true"> 
                            {html_options options=$lista_statusagendas selected=null}
                        </select>                      
                    </div>
                </div> 
                <br>
                <div class="col-xs-1">
                    <div class="form-group">
                        <label for="atualizar"></label>                    
                        <a class="btn btn-primary" id="btnAtualizar" title="Atualizar" onclick="atualizarColaborador();" disabled >Atualizar</a> 
                    </div>
                </div>                         
            </div>
            <div id="labelcolaborador">
                <label for="statusagenda"></label>
            </div> 
            <br>
            <div id="mostraragendacompleta">
                 {include file="agendahorario/agendaanalitica.html"}
            </div>
            <div class="row">
                <div class="col-xs-1">                
                    <h3> &nbsp; Legenda:</h3>
                    <br>
                    <table class="table" border="0">
                        <tbody>
                            {foreach from=$lista_status item="linha"}  
                                <tr>
                                    <td <span  style="background-color: {$linha.dsCor}"> </span> </td> 
                                    <td>{$linha.dsTipoAgenda}</td> 
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                </tr>
                            {/foreach}        
                        </tbody>
                    </table>
                </div>
            </div>
        <!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<!-- Toast Message -->
<script src="/files/js/toastmessage/javascript/jquery.toastmessage.js"></script>
<!-- Utils -->
<script src="/files/js/util.js"></script>
<script src="/files/js/agendahorario/agendahorario.js"></script>



{include file="comuns/footer.tpl"}

