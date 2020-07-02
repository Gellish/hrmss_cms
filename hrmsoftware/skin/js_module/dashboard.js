$(document).ready(function(){
	
	/* Clock In */
	$("#set_clocking").submit(function(e){
		/*Form Submit*/
		e.preventDefault();
		var clock_state = '';
		var obj = $(this), action = obj.attr('name');
		$.ajax({
			type: "POST",
			url: site_url+'timesheet/set_clocking/',
			data: obj.serialize()+"&is_ajax=1&type=set_clocking&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
				} else {
					toastr.success(JSON.result);
					window.location = site_url+'dashboard/';
				}
			}
		});
	});
	var xin_table = $('#xin_table').dataTable({
	"bDestroy": true,
	"ajax": {
		url : site_url+"timesheet/attendance_list/?attendance_date="+$('#attendance_date').val(),
		type : 'GET'
	},
	"fnDrawCallback": function(settings){
	$('[data-toggle="tooltip"]').tooltip();          
	}
});
});

$(document).ready(function(){

if(user_role == 1) {	
	///charts
	var doughnut = document.getElementById("doughnut");
	$.ajax({
		url: base_url+'/payroll_company_wise/',
		method: "json",
		success: function(response) {	
		var bgcolor = [];
		var final = [];
		var final2 = [];

		for(i=0; i < response.c_name.length; i++) {
			final.push(response.chart_data[i].value);
			final2.push(response.chart_data[i].label);
			bgcolor.push(response.chart_data[i].bgcolor);
		} 

		var dou_ch = {
			datasets: [{
				data: final,
				backgroundColor: bgcolor,
			}],
			labels: final2
			};
			var myChart = new Chart(doughnut, {
			type: 'doughnut',
			data: dou_ch,
			});	
		},
		error: function(data) {
			console.log(data);
		}
	});
	/* =================================================================
    Polar area chart
================================================================= */

var polar_area = document.getElementById("polar-area");
$.ajax({
	url: base_url+'/payroll_location_wise/',
	method: "json",
	success: function(response) {	
	var bgcolor = [];
	var final = [];
	var final2 = [];
	for(i=0; i < response.c_name.length; i++) {
		final.push(response.chart_data[i].value);
		final2.push(response.chart_data[i].label);
		bgcolor.push(response.chart_data[i].bgcolor);
	} 

	var polar_ch = {
		datasets: [{
			data: final,
			backgroundColor: bgcolor,
		}],
		labels: final2
		};
		var myChart = new Chart(polar_area, {
		type: 'polarArea',
		data: polar_ch,
		});	
	},
	error: function(data) {
		console.log(data);
	}
});
/* =================================================================
    Pie chart
================================================================= */

var pie = document.getElementById("pie");
$.ajax({
	url: base_url+'/payroll_department_wise/',
	method: "json",
	success: function(response) {	
	var bgcolor = [];
	var final = [];
	var final2 = [];
	for(i=0; i < response.c_name.length; i++) {
		final.push(response.chart_data[i].value);
		final2.push(response.chart_data[i].label);
		bgcolor.push(response.chart_data[i].bgcolor);
	} 

	var pie_ch = {
		datasets: [{
			data: final,
			backgroundColor: bgcolor,
		}],
		labels: final2
		};
		var myChart = new Chart(pie, {
		type: 'pie',
		data: pie_ch,
		});	
	},
	error: function(data) {
		console.log(data);
	}
});
/* =================================================================
    Bar chart
================================================================= */

var ctx = document.getElementById("bar");
$.ajax({
	url: base_url+'/payroll_designation_wise/',
	method: "json",
	success: function(response) {	
	var bgcolor = [];
	var final = [];
	var final2 = [];
	for(i=0; i < response.c_name.length; i++) {
		final.push(response.chart_data[i].value);
		final2.push(response.chart_data[i].label);
		bgcolor.push(response.chart_data[i].bgcolor);
	} 
	var data = {
		labels: final2,
		datasets: [{
			label: 'Salaries',
			data: final,
			backgroundColor: bgcolor,
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
	
	},
	error: function(data) {
		console.log(data);
	}
});
} // if end
});