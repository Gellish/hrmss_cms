$(document).ready(function(){
    /* Donut chart */
    var data = [{
        label: "Leave Rejected",
        data: 10,
        color: "#f44236",
        
    }, {
        label: "Total Leaves",
        data: 50,
        color: "#a567e2",
    }, {
        label: "Leave Approved",
        data: 25,
        color:"#20b9ae",
    },
	{
        label: "Leave Pending",
        data: 15,
        color:"#f59345",
    }];

    $.plot($("#chart-3"), data, {
        series: {
            pie: {
                innerRadius: 0.3,
                show: true
            }
        },
        grid: {
            hoverable: true
        },
        legend : {
            show : false,
        },
        color: null,
        tooltip: true,
        tooltipOpts: {
            content: "%p0 %s",
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });
});