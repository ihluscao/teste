document.addEventListener('DOMContentLoaded', function () {
    
    
    function construirGrafico(data) {

        const chart = Highcharts.chart('container', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: 'Parciais Eleitorais',
                align: 'left'
            },
            subtitle: {
                text: 'Fonte: nosso banco de dados',
                align: 'left'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Votos',
                data: data.map(item => {
                    return {
                        name: item.candidato,
                        y: item.votos
                    };
                })
            }]
        });
    }
    
    function graphicsWithData() {
        $.ajax({
            url: 'consulta.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {

                data.forEach(function (item) {
                    item.votos = parseInt(item.votos, 10);
                });

                construirGrafico(data);
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }
    
    graphicsWithData();
});
