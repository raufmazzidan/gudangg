const dailyDate = {};

revenueData.z.forEach(({ date }, i) => {
    dailyDate[date] = i;
});

let res = [];

console.log(revenueData);

const x = {
    base: 100,
    dis: 25,
    res: 75,
};

console.log(x.res / (1 - x.dis / 100));

Object.keys(dailyDate).map((key, i) => {
    let profit = 0;
    revenueData.y.forEach(({ date, final_price, discount }) => {
        if (date == key) {
            const finalPrice = parseFloat(final_price);
            const basePrice =
                discount == 0
                    ? finalPrice
                    : finalPrice / (1 - parseInt(discount) / 100);

            profit += finalPrice - basePrice;
        }
    });

    res[i] = profit;
});

console.log(res);

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
            name: "Profit",
            data: res,
        },
    ],
    colors: [COLORS[1]],
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
        strokeColors: [COLORS[1]],
        fillOpacity: 0,
        colors: "white",
        hover: {
            // size: 10,
            sizeOffset: 3,
        },
    },
    xaxis: {
        categories: Object.keys(dailyDate),
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

var chart = new ApexCharts(document.querySelector("#daily-chart"), options);
chart.render();
