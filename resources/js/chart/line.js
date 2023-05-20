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
            name: "Desktops",
            data: [10, 41, 35, 51, 49, 62, 69, 91, 140],
        },
        {
            name: "Mobile",
            data: [62, 69, 91, 140, 10, 41, 35, 51, 49],
        },
    ],
    colors: COLORS,
    legend: {
        show: true,
    },
    chart: {
        height: 400,
        type: "line",
        zoom: false,
        fontFamily: "raleway",
        toolbar: {
            show: false,
        },
    },
    dataLabels: {
        enabled: false,
    },

    stroke: {
        // curve: "smooth",
        width: 2,
    },
    markers: {
        size: 4,
        // s: "transparent",
        strokeWidth: 2,
        strokeColors: COLORS,
        fillOpacity: 0,
        colors: "white",
        hover: {
            // size: 10,
            sizeOffset: 3,
        },
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
    fill: {
        opacity: 1,
    },
};

var chart = new ApexCharts(document.querySelector("#line-chart"), options);
chart.render();
