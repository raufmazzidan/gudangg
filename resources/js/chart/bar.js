var options = {
    grid: {
        position: "back",
        strokeDashArray: 0,
        xaxis: {
            lines: {
                show: false,
            },
        },
        yaxis: {
            lines: {
                show: true,
            },
        },
    },
    series: [
        {
            name: "Net Profit",
            data: [44, 55, 57, 56, 130, 58],
        },
        {
            name: "Revenue",
            data: [76, 85, 101, 98, 87, 105],
        },
        {
            name: "Free Cash Flow",
            data: [35, 41, 36, 26, 45, 48],
        },
    ],
    colors: COLORS,
    legend: {
        show: true,
    },
    stroke: {
        show: true,
        width: 2,
        colors: ["transparent"],
    },
    fill: {
        opacity: 1,
    },
    chart: {
        height: 400,
        type: "bar",
        zoom: false,
        fontFamily: "raleway",
        toolbar: {
            show: false,
        },
    },
    dataLabels: {
        enabled: false,
    },
    xaxis: {
        categories: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
        ],
        tooltip: {
            enabled: false,
        },
    },
};

var chart = new ApexCharts(document.querySelector("#bar-chart"), options);
chart.render();
