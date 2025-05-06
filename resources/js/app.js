import "./bootstrap";
import "flowbite";
import ApexCharts from "apexcharts";

var options = {
    chart: {
        type: 'pie',
        height: 300 // atur di sini
    },
    labels: ['Samsung', 'Apple', 'Xiaomi'],
    series: [44, 55, 41],
};

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
