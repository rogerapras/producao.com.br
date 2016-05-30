{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idColaborador}>0} {$registro.dsColaborador|default:''} {else} Inclus&atilde;o de Colaboradores{/if}</h1></tt>
            </div>          

            <form name="frm-colaborador" 
                  action="/colaborador/gravar_colaborador" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <a href="/colaborador" class="btn btn-primary"> Voltar</a>
                <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idColaborador}>0}
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idColaborador" id="idColaborador" value="{$registro.idColaborador}" READONLY>           
                        {else}
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idColaborador" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Nome do Colaborador</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsColaborador|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomemaoobra">Mão de Obra</label>
                            <select class="form-control" name="idMaoObra" id="idMaoObra">
                                {html_options options=$lista_maoobra selected=$registro.idMaoObra}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomesetor">Setor</label>
                            <select class="form-control" name="idSetor" id="idSetor">
                                {html_options options=$lista_setor selected=$registro.idSetor}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomecargo">Cargo</label>
                            <select class="form-control" name="idCargo" id="idCargo">
                                {html_options options=$lista_cargo selected=$registro.idCargo}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-3">
                        <div class="form-group">
                                 <label for="form-control">EMail:</label>
                                 <input type="text" class="form-control" id="dsEmail" name="dsEmail" value="{$registro.dsEmail|default:''}" >           
                        </div>
                    </div> 
                </div> 
                <br>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="fazparteagenda">Faz Parte de Agenda de Serviços</label>
                            <select class="form-control" name="stFazParteAgenda" id="stFazParteAgenda">
                                {html_options options=$lista_fazparte selected=$registro.stFazParteAgenda}
                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Quantidade de Horas/Dia</label>
                                 <input type="text" class="form-control" id="qtHorasDia" name="qtHorasDia" value="{$registro.qtHorasDia|default:''}" >           
                        </div>
                    </div> 
                </div> 
                <br>
                  <div class="col-xs-3">
                    <div class="row">
                    </div> 
                  </div> 
                <br>
            </form>
            
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
<script src="/files/js/colaborador/colaborador_novo.js"></script>



{include file="comuns/footer.tpl"}

