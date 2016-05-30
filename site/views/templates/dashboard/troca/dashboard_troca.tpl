<div class="panel panel-default">
    <div class="panel-heading">
        <h3><i class="fa">Trocas de Produtos</i></h3>
    </div> 
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="idProjeto_troca">Projeto:</label>
                    <select class="form-control" id="idProjeto_troca" name="select_projeto"/>                                      
                    {html_options options=$lista_projetos}
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="data_inicial">Data Inicial:</label>
                    <input name="data_inicial" id="data_inicial" class="form-control data"/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="data_final">Data Final:</label>
                    <input name="data_final" id="data_final" class="form-control data"/>
                </div>
            </div>
            <div class="col-md-2" style="margin-top: 25px;">
                <div class="form-group">
                    <input type="button" name="btn_filtro" class="btn btn-primary form-control" value="Filtrar" onclick="dashboard.troca.reload();" />
                </div>
            </div> 
            <div class="col-md-2" style="margin-top: 25px;">
                <div class="form-group">
                    <a href="/dashboard" class="btn btn-default form-control">Limpar</a>
                </div>
            </div> 
        </div>  
        <div id="data_troca">
            {include file="dashboard/troca/dashboard_troca_data.tpl"}
        </div>
    </div>
</div>