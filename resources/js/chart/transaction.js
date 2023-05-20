const transMonth = {};

transactionData.x.forEach(({ month }, i) => {
    transMonth[month] = i;
});

let res = [];

transactionData.y.forEach((transactionItem) => {
    res.push({
        name: transactionItem.name,
        data: Object.keys(transMonth).map((key) => {
            let count = 0;

            transactionItem.data.forEach(({ month, total }) => {
                if (month == key) {
                    count = total;
                }
            });

            return count;
        }),
    });
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
    series: res,
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
        categories: transactionData.x.map(({ month }) => getMonthName(month)),
        tooltip: {
            enabled: false,
        },
    },
    yaxis: {
        labels: {
            formatter: (value) => Math.floor(value),
        },
    },
};

var chart = new ApexCharts(
    document.querySelector("#transaction-chart"),
    options
);
chart.render();
