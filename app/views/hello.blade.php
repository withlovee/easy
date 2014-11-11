@extends('layouts.master', ['title' => 'Dashboard'])
@section('content')

{x{ var_dump($price); }}

{{ HTML::script('js/highstock.js'); }}
{{ HTML::script('js/exporting.js'); }}

<div id="container" style="height: 500px; min-width: 310px"></div>
<script>
$(function () {
	var seriesData = [],
		x = [],
		seriesCounter = 0,
		names = ['CPF'],
        // dataLength = data.length,
        // set the allowed units for data grouping
        groupingUnits = [[
            'week',                         // unit name
            [1]                             // allowed multiples
        ], [
            'month',
            [1]
        ]],

        i = 0;
		// create the chart when all data is loaded
		createChart = function () {
			$('#container').highcharts('StockChart', {
				legend: {
					enabled: true,
					floating:true,
					align: 'left',
					y: 40,
					layout: "vertical",
					verticalAlign: "top"
				},
				rangeSelector: {
					selected: 4
				},

	            yAxis: [{
	                labels: {
	                    align: 'right',
	                    x: -3
	                },
	                title: {
	                    text: 'Price'
	                },
	                height: '60%',
	                lineWidth: 2
	            }, {
	                labels: {
	                    align: 'right',
	                    x: -3
	                },
	                title: {
	                    text: 'EPS'
	                },
	                top: '65%',
	                height: '35%',
	                offset: 0,
	                lineWidth: 2
	            }],


				// yAxis: {
				// 	labels: {
				// 		formatter: function () {
				// 			return (this.value > 0 ? ' + ' : '') + this.value + '%';
				// 		}
				// 	},
				// 	plotLines: [{
				// 		value: 0,
				// 		width: 2,
				// 		color: 'silver'
				// 	}]
				// },

				plotOptions: {
					series: {
						// compare: 'percent'
					}
				},

				tooltip: {
					pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b><br/>',
					valueDecimals: 2
				},

				series: [
					seriesData[0],
					seriesData[1],
					seriesData[2]
				]
			});
		};

	$.each(names, function (i, name) {

		$.getJSON('api/graph/price/' + name,    function (data) {

			seriesData[0] = {
				name: 'Price',
				type: 'line',
				data: data['price']
			};
			seriesData[1] = {
				name: 'EPS',
				step: true,
				// type: 'column',
				yAxis: 1,
				data: data['eps']
			};
			seriesData[2] = {
				name: 'P/E * EPS',
				type: 'line',
				data: data['price-eps']
			};

			// As we're loading the data asynchronously, we don't know what order it will arrive. So
			// we keep a counter and create the chart when all the data is loaded.
			seriesCounter += 1;

			if (seriesCounter === names.length) {
				createChart();
			}
		});
	});

});
</script>
@stop