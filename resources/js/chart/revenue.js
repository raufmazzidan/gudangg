const revenueMonth = {};

revenueData.x.forEach(({ month }, i) => {
    revenueMonth[month] = i;
});

let res = [];

Object.keys(revenueMonth).map((key, i) => {
    let count = 0;
    revenueData.y.forEach(({ month, final_price }) => {
        if (month == key) {
            count = count + parseInt(final_price);
        }
    });

    res[i] = count;
});

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
            name: "Revenue",
            data: res,
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
        categories: revenueData.x.map(({ month }) => getMonthName(month)),
        tooltip: {
            enabled: false,
        },
    },
    yaxis: {
        labels: {
            formatter: rupiahFormat,
        },
    },
    fill: {
        opacity: 1,
    },
};

var chart = new ApexCharts(document.querySelector("#revenue-chart"), options);
chart.render();
