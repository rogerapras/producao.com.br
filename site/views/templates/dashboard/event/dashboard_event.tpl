<div class="panel panel-default">
    <div class="panel-heading">
        <h3><i class="fa">Eventos</i></h3>
    </div> 
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="idProjeto_event">Projeto:</label>
                    <select class="form-control" id="idProjeto_event" name="idProjeto" onchange="dashboard.event.reload();">
                        {html_options options=$projetoOptions}
                    </select>
                </div>
            </div> 
            <div class="col-md-2">
                <div class="form-group">
                    <label for="data_inicial_resumo">Data Inicial:</label>
                    <input name="data_inicial_resumo" id="data_inicial_resumo" class="form-control data"/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="data_final_resumo">Data Final:</label>
                    <input name="data_final_resumo" id="data_final_resumo" class="form-control data"/>
                </div>
            </div>
            <div class="col-md-2" style="margin-top: 25px;">
                <div class="form-group">
                    <input type="button" name="btn_filtro" class="btn btn-primary form-control" value="Filtrar" onclick="dashboard.event.reload();" />
                </div>
            </div> 
            <div class="col-md-2" style="margin-top: 25px;">
                <div class="form-group">
                    <a href="/dashboard" class="btn btn-default form-control">Limpar</a>
                </div>
            </div> 
        </div>

        <div id="data_event">
            {include file="dashboard/event/dashboard_event_data.tpl"}
        </div>
    </div>
</div>
