<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>halo dunia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('assets/css/demo.css')
</head>

<body>
    <h2 class="btn btn-primary">halo</h2>
    <div id="chart">
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}

    <script>
        import ApexCharts from "apexcharts";

        var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'sales',
                data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
            }],
            xaxis: {
                categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    </script>
</body>

</html>
