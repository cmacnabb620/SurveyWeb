<!-- start: Meta -->
<meta charset="utf-8">
<title>@yield('page-title')</title>
<meta name="description" content="Bootstrap Metro Dashboard">
<meta name="author" content="Dennis Ji">
<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<!-- end: Meta -->
<!-- start: Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- end: Mobile Specific -->
<!-- start: CSS -->
<!-- <link id="base-style" href="{{asset('crossroads/css/font-awesome.css')}}" rel="stylesheet"> -->
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link href="{{asset('crossroads/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
<link id="base-style" href="{{asset('crossroads/css/style.css')}}" rel="stylesheet">
<link id="base-style" href="{{asset('crossroads/css/custom.css')}}" rel="stylesheet">
<link id="base-style-responsive" href="{{asset('crossroads/css/style-responsive.css')}}" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
<!-- end: CSS -->
<!-- start: Favicon -->
<link rel="shortcut icon" href="{{ asset('crossroads/img/favicon.ico')}}">
<!-- end: Favicon -->
<script src="{{asset('js/countrylist.js')}}"></script>
<!-- Custom Datepicker start -->
<link id="base-style" href="{{asset('crossroads/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
<!-- Custom Datepicker end -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{asset('crossroads/js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- bar-graph scripts starts -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<!-- Chart code -->
<script>
var chart = AmCharts.makeChart( "chartdivFirst", {
  "type": "serial",
  "theme": "light",	
  "dataProvider": [ {
    "week": "Week 1",
    "surveys": 40
  }, {
    "week": "Week 2",
    "surveys": 70
  }, {
    "week": "Week 3",
    "surveys": 120
  }, {
    "week": "Week 4",
    "surveys": 80
  }, {
    "week": "Week 5",
    "surveys": 30
  }, {
    "week": "Week 6",
    "surveys": 90
  }],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "surveys"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "week",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20
  },
  "export": {
    "enabled": true
  }

} );
var chart = AmCharts.makeChart( "chartdivSecond", {
  "type": "serial",
  "theme": "none",
  "dataProvider": [ {
    "project": "Project 1",
    "marks": 2025
  }, {
    "project": "Project 2",
    "marks": 1882
  }, {
    "project": "Project 3",
    "marks": 1809
  }, {
    "project": "Project 4",
    "marks": 1322
  }, {
    "project": "Project 5",
    "marks": 1122
  } ],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "marks"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "project",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20
  },
  "export": {
    "enabled": true
  }

} );
</script>
<style>
#chartdivFirst {
	width		: 100%;
	height		: 250px;
	font-size	: 11px;
}
#chartdivSecond {
	width		: 100%;
	height		: 250px;
	font-size	: 11px;
}
.amcharts-chart-div a {
	display:none !important;
}					
</style>
<!-- bar-graph scripts end-->
@yield('local-style')
<SCRIPT type="text/javascript">
window.history.forward();
function noBack() { window.history.forward(); }
</SCRIPT>
<!-- browser backbutton code end -->
<script>
$(window).load(function(){
$('#overlay').fadeOut();
});
</script>