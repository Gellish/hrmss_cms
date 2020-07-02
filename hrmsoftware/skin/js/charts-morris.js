/* =================================================================
    Bar chart
================================================================= */

Morris.Bar({
    element: 'bar2',
    data: [{
        y: $('#date1').val(),
        a: 1,
        b: 2,
        c: 9
    }, {
        y: $('#date2').val(),
        a: 50,
        b: 40,
        c: 30
    }, {
        y: $('#date3').val(),
        a: 75,
        b: 65,
        c: 40
    }, {
        y: $('#date4').val(),
        a: 50,
        b: 40,
        c: 30
    }, {
        y: $('#date5').val(),
        a: 75,
        b: 65,
        c: 40
    }, {
        y: $('#date6').val(),
        a: 100,
        b: 90,
        c: 40
    }, {
        y: $('#date7').val(),
        a: 10,
        b: 40,
        c: 15
    }],
    xkey: 'y',
    ykeys: ['a', 'b', 'c'],
    labels: ['Present', 'Leave', 'Absent'],
    barColors:['#43b968', '#f59345', '#f44236'],
    barSizeRatio: 0.4,
    hideHover: 'auto',
    gridLineColor: '#ddd',
    xLabelAngle: 30,
    resize: true
});
