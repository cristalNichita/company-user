<!doctype html>
<html lang="en">
<head>
    @include('user.common.head')
</head>
<body>

<div id="security-chart"></div>

@include('user.common.footer-script')

<script>
    var securityChartOptions = {
        series: [70],
        chart: {
            height: 350,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    size: '70%',
                }
            },
        },
        labels: ['Cricket'],
    };

    var securityChart = new ApexCharts(document.querySelector("#security-chart"), securityChartOptions);
    securityChart.render();
</script>
</body>
</html>
