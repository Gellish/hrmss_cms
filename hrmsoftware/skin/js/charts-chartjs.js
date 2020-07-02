/* =================================================================
    Line chart
================================================================= */

var ctx = document.getElementById("line");

var data = {
    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
    datasets: [
        {
            label: "Registration",
            fill: false,
            lineTension: 0.0,
            backgroundColor: "#f44236",
            borderColor: "#f44236",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "#f44236",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#f44236",
            pointHoverBorderColor: "#fff",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [2, 4, 1, 4, 5, 2, 6],
            spanGaps: false,
        }
    ]
};

var myChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

/* =================================================================
    Bar chart
================================================================= */

var ctx = document.getElementById("bar");

var data = {
    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
    datasets: [{
        label: 'Expenses',
        data: [20, 28, 16, 10, 23, 18, 35, 10, 5, 9, 12, 0],
        backgroundColor: 'rgba(67, 185, 104, 0.2)',
        borderColor: '#43b968',
        borderWidth: 1
    }]
};

var myChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

/* =================================================================
    Doughnut chart
================================================================= */

var ctx = document.getElementById("doughnut");

 var data = {
    labels: [
        "Present",
        "Leave",
        "Absent"
    ],
    datasets: [{
        data: [250, 70, 160],
        backgroundColor: [
            "#3e70c9",
            "#f59345",
            "#f44236"
        ]
    }]
};

var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: data
});

