<div class="row">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-4">
                        {if $data_troca.tipo_projeto eq 1 }
                        <img src="/files/images/icones-geolocalizacao/geladeira/troca-nao-iniciada.png" alt="local_troca"/> 
                        {/if}
                        {if $data_troca.tipo_projeto eq 4 }
                        <img src="/files/images/icones-geolocalizacao/lampada/troca-nao-iniciada.png" alt="local_troca"/> 
                        {/if}
                    </div>
                    <div class="col-md-8 text-right">
                        <h4>
                            <p class="announcement-text" >Volume: {$data_troca.tamanho_projeto}</p>
                            <p class="announcement-text" >Base: {$data_troca.trocaNaoIniciada} </p>
                            <p class="announcement-text" >Realizado: {$data_troca.percentual_realizado} % </p>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="panel-footer announcement-bottom">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 text-right">
                        <i class="fa"></i>
                    </div>
                </div>
            </div>                    
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-4">
                         {if $data_troca.tipo_projeto eq 1 }
                        <img src="/files/images/icones-geolocalizacao/geladeira/troca-em-rota.png" alt="local_troca"/> 
                        {/if}
                        {if $data_troca.tipo_projeto eq 4 }
                        <img src="/files/images/icones-geolocalizacao/lampada/troca-em-rota.png" alt="local_troca"/> 
                        {/if}
                        </div>
                    <div class="col-md-8 text-right">
                        <p class="announcement-heading">{$data_troca.trocaEmRota}</p>
                        <p class="announcement-text">Em Rota</p>
                    </div>
                </div>
            </div>
            <div class="panel-footer announcement-bottom">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 text-right">
                        <i class="fa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-4">
                         {if $data_troca.tipo_projeto eq 1 }
                        <img src="/files/images/icones-geolocalizacao/geladeira/troca-insucesso.png" alt="local_troca"/> 
                        {/if}
                        {if $data_troca.tipo_projeto eq 4 }
                        <img src="/files/images/icones-geolocalizacao/lampada/troca-insucesso.png" alt="local_troca"/> 
                        {/if}
                        </div>
                    <div class="col-md-8 text-right">
                        <p class="announcement-heading">{$data_troca.trocaInsucesso}</p>
                        <p class="announcement-text">Insucessos</p>
                    </div>
                </div>
            </div>
            <a href="/acompanhamento">
                <div class="panel-footer announcement-bottom">
                    <div class="row">
                        <div class="col-md-6">
                            Mais detalhes
                        </div>
                        <div class="col-md-6 text-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-4">
                         {if $data_troca.tipo_projeto eq 1 }
                        <img src="/files/images/icones-geolocalizacao/geladeira/troca-sucesso.png" alt="local_troca"/> 
                        {/if}
                        {if $data_troca.tipo_projeto eq 4 }
                        <img src="/files/images/icones-geolocalizacao/lampada/troca-sucesso.png" alt="local_troca"/> 
                        {/if}
                        </div>
                    <div class="col-md-8 text-right">
                        <h4>
                            <p class="announcement-text" >Sucessos: {$data_troca.trocaSucesso}</p>
                            <p class="announcement-text" >Faturados: {$data_troca.sucesso_faturado} </p>
                            <p class="announcement-text" >Para Comprovar: {$data_troca.sucesso_sem_comprovacao} </p>
                        </h4>
                    </div>
                </div>
            </div>
            <a href="/acompanhamento">
                <div class="panel-footer announcement-bottom">
                    <div class="row">
                        <div class="col-md-6">
                            Mais detalhes
                        </div>
                        <div class="col-md-6 text-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa"></i> Gráfico de entregas {if $periodoGrafDtIni == FALSE && $periodoGrafDtFim == FALSE}: Mes Atual {else}: {$periodoGrafDtIni} a {$periodoGrafDtFim} {/if} </h3>
            </div>                      
            <div class="panel-body">
                {if $data_troca.por_n_iniciada eq NULL && $data_troca.por_em_rota eq NULL && $data_troca.por_sucesso eq NULL && $data_troca.por_insucesso eq NULL}
                    <p>Nenhuma entrega realizada neste periodo.</p>
                {else}
                    <div id="morris-chart-donut"></div>
                    <script>
                        Morris.Donut(
                        {ldelim}element: 'morris-chart-donut', data: [
                        {ldelim}label: "Não Iniciada", value: {$data_troca.por_n_iniciada}{rdelim},
                        {ldelim}label: "Em Rota", value: {$data_troca.por_em_rota}{rdelim},
                        {ldelim}label: "Sucesso", value: {$data_troca.por_sucesso}{rdelim},
                        {ldelim}label: "Insucessos", value: {$data_troca.por_insucesso}{rdelim}
                            ],colors: ['#696969','#EEDD82','#39B580','#B22222'], formatter: function(y)
                        {ldelim} return y + "%";
                        {rdelim}
                        {rdelim});</script>  
                    {/if}


            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa"></i> Gráfico de Sucessos {if $periodoGrafDtIni == FALSE && $periodoGrafDtFim == FALSE}: Mes Atual {else}: {$periodoGrafDtIni} a {$periodoGrafDtFim} {/if} </h3>
            </div>                      
            <div class="panel-body">
                {if $data_troca.por_n_iniciada eq NULL && $data_troca.por_em_rota eq NULL && $data_troca.por_sucesso eq NULL && $data_troca.por_insucesso eq NULL}
                    <p>Nenhuma entrega realizada neste periodo.</p>
                {else}
                    <div id="morris-chart-donut2"></div>
                    <script>
                                Morris.Donut(
                        {ldelim}element: 'morris-chart-donut2', data: [
                        {ldelim}label: "Faturado", value: {$data_troca.por_sucesso_faturado}{rdelim},
                        {ldelim}label: "Comprovado", value: {$data_troca.por_sucesso_comprovado}{rdelim},
                        {ldelim}label: "Comprovar", value: {$data_troca.por_sucesso_sem_comprovacao}{rdelim}
                                 ], colors: ['#39B580','#98FB98','#BDB76B'], formatter: function(y)
                        {ldelim} return y + "%";
                        {rdelim}
                        {rdelim});                    </script> 


                {/if}

            </div>
        </div>
    </div>


</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa"></i> Visitas Realizadas {if $periodoGrafDtIni == FALSE && $periodoGrafDtFim == FALSE}: Mes Atual {else}: {$periodoGrafDtIni} a {$periodoGrafDtFim} {/if} </h3> 
            </div>  
            <div class="panel-body">
                {if $troca_mes eq "null"}
                    <p>Nenhuma visita realizada neste periodo.</p>
                {else}
                    <div id="morris-chart-area">                                        
                        <script type = "text/javascript">
                                    Morris.Bar({ldelim}
                                                element: 'morris-chart-area',
                                                        data: {$troca_mes},
                                                        xkey: 'y',
                                                        ykeys: ['t', 'a', 'b'],
                                                        labels: ['Total', 'Sucesso', 'Insucesso'],
                                                        hideHover: 'auto',
                                                        resize: true,
                                                        barColors: ['#90C7FB', '#96EECA', '#EE9696']
                            {rdelim});
                        </script>
                    </div>
                {/if}
            </div>
        </div>
    </div>






</div>