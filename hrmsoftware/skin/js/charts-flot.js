

/* =================================================================
	Stacked bar
================================================================= */

$(function() {

	var data1 = [];
	for (var i = 1; i <= 7; i += 1)
		data1.push([i, parseInt(Math.random() * 20)]);

	var data2 = [];
	for (var i = 1; i <= 7; i += 1)
		data2.push([i, parseInt(Math.random() * 20)]);

	var data3 = [];
	for (var i = 1; i <= 7; i += 1)
		data3.push([i, parseInt(Math.random() * 20)]);

	var data = [{
		label : "Present",
		data : data1,
		bars : {
			order : 1
		}
		
	}, {
		label : "Absent",
		data : data2,
		bars : {
			order : 2
		}
	}, {
		label : "Leaves",
		data : data3,
		bars : {
			order : 3
		}
	}];

	$.plot($("#stacked-bar"), data, {
		bars : {
			show : true,
			barWidth : 0.2,
			fill : 1
		},
		series : {
			stack: 0
		},
		grid : {
			color: "#aaa",
			hoverable : true,
			borderWidth : 0,
			labelMargin : 5,
			backgroundColor : "#fff",
		},
		legend : {
			position : "ne",
			margin : [0, -24],
			noColumns : 0,
			labelBoxBorderColor : null,
			labelFormatter : function(label, series) {
				// adding space to labes
				return '' + label + '&nbsp;&nbsp;';
			}
		},
		colors : ["#20b9ae", "#f44236", "#f59345"],
		tooltip : true, //activate tooltip
		tooltipOpts : {
			content : "%s : %y.0",
			shifts : {
				x : -30,
				y : -50
			}
		}
	});

});

