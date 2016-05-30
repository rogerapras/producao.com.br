<div class="row">
    <!-- resumo -->
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa">Resumo</i></h3>
            </div>        
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>Fim do projeto</td>
                        <td class="text-center">{$data_event.dt_fin|date_format:"%d/%m/%Y"}</td>
                    </tr>
                    <tr>
                        <td>Eventos cadastrados</td>
                        <td class="text-center">{$data_event.eventT|default:0}</td>
                    </tr>
                    <tr>
                        <td>Eventos realizados</td>
                        <td class="text-center">{$data_event.eventR|default:0}</td>
                    </tr>
                    <tr>                                    
                        <td>Clientes cadastrados</td>
                        <td class="text-center">{$data_event.partT|default:0}</td>
                    </tr>
                    <tr>                                    
                        <td>Clientes sorteados</td>
                        <td class="text-center">{$data_event.partS|default:0}</td>
                    </tr>
                    <tr>                                    
                        <td>Geladeiras entregues</td>
                        <td class="text-center">{$data_event.geladeira|default:0}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- ultimos eventos -->
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa">Ultimos eventos</i></h3>
            </div>        
            <div class="panel-body">
                <table class="table">
                    {foreach from=$data_event.ultEvent item=item}
                        <tr>
                            <td>{$item.nome|truncate:50}</td>
                            <td>{$item.dt|date_format:"%d/%m/%Y"}</td>
                        </tr>
                    {foreachelse}
                        <tr>
                            <td>Nenhum evento realizado.</td>
                        <tr>
                        {/foreach}
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- grafico -->
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa">Cadastrados e sorteados</i></h3>
            </div>
            <div class="panel-body">
                {if $dataGrafico eq "null"}
                    <p>Nenhuma UC cadastrada e/ou sorteada neste ano.</p>
                {else}
                    <!--
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="data_inicial_evento">Data Inicial:</label>
                                <input name="data_inicial_evento" id="data_inicial_evento" class="form-control data"/>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="data_final_evento">Data Final:</label>
                                <input name="data_final_evento" id="data_final_evento" class="form-control data"/>
                            </div>
                        </div>
                        <div class="col-md-2" style="margin-top: 25px;">
                            <div class="form-group">
                                <input type="button" name="btn_filtro_evento" class="btn btn-primary form-control" value="Filtrar" onclick="dashboard.event.filtraGrafico();" />
                            </div>
                        </div> 
                        <div class="col-md-2" style="margin-top: 25px;">
                            <div class="form-group">
                                <a href="/dashboard" class="btn btn-default form-control">Limpar</a>
                            </div>
                        </div> 
                    </div>
                    -->
                    <div id="div-event-chart">
                    {include file="dashboard/event/dashboard_event_data_chart.tpl"}
                    </div>
                {/if}
            </div>
        </div>
    </div>
    <!-- sincronismo -->
    {if $idPerfil eq 1 || $idPerfil eq 3  }
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center"><i class="fa">Sincronismo</i></h3>
                </div>
                <div class="panel-body">
                    {*if $dataGrafico eq "null"*}
                    {if $data_event.sincDays eq NULL}
                        <div class="row text-center">                    
                            <p>Sem sincronismo.</p>
                        </div>
                    {else}
                        <div class="row text-center"> 
                            {if $data_event.sincDays eq 0}
                                <p>Sincronizado hoje</p>
                            {else}
                                <p>A {$data_event.sincDays} dia{if $data_event.sincDays > 1}s{/if} sem sincronizar</p>
                            {/if}                        
                        </div>
                        <div class="col-md-3">
                            {if $data_event.sincDays >= $data_event.sincDaysLimit}
                                <img src="/files/images/coelce/attencion.png" width="90" height="90" alt=""/>
                            {else}
                                <img src="/files/images/coelce/ok.png" width="90" height="90" alt=""/>
                            {/if}
                        </div>
                    {/if}
                </div>
            </div>
        </div>
    {/if}
</div>