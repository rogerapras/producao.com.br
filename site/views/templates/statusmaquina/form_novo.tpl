{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idStatusMaquina}>0} {$registro.dsStatusMaquina|default:''}{else} Inclus&atilde;o de Status de Maquinas{/if}</h1></tt>
            </div>          
            <a href="/statusmaquina" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-statusmaquina" 
                  action="/statusmaquina/gravar_statusmaquina" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario()">
                <br>
                <div class="input-group col-lg-8">                    
                    {if {$registro.idStatusMaquina}>0}
                        <span class="input-group-addon btn-outline btn-primary">Código</span>
                            <input type="text" class="form-control" name="idStatusMaquina" id="idStatusMaquina" value="{$registro.idStatusMaquina}" READONLY>           
                    {else}
                        <span class="input-group-addon btn-outline btn-primary">Código</span>
                              <input type="text" class="form-control" name="idStatusMaquina" value="" READONLY>           
                    {/if}                     
                    <span class="input-group-addon btn-outline btn-primary">Descri&ccedil;&atilde;o</span>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsStatusMaquina|default:''}" >           
                </div> 
                <br>            
                    <input type="submit" value="Gravar" name="btnGravar" class="btn btn-primary" />         
                <br>
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
<script src="/files/js/statusmaquina/statusmaquina_novo.js"></script>



{include file="comuns/footer.tpl"}

