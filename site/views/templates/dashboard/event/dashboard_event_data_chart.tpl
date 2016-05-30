<div id="morris-chart-area-event">{if isset($msgEventChart)}{$msgEventChart}{/if}</div>
<script type = "text/javascript">
    Morris.Bar(
    {ldelim}
                    element: 'morris-chart-area-event',
                    data: {$dataGrafico},
                    xkey: 'y',
                    ykeys: ['a', 'b'],
                    labels: ['Cadastrados', 'Sorteados'],
                    hideHover: 'auto',
                    resize: true,
                    barColors: ['#96EECA', '#EE9696']
    {rdelim});
</script>