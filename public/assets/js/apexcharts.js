import ApexCharts from "apexcharts";

var options = {
    chart: {
        type: "pie",
        height: 350,
    },
    series: [44, 55, 13, 43, 22],
    labels: ["Apple", "Mango", "Orange", "Banana", "Pineapple"],
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
