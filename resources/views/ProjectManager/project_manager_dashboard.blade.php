@extends('ProjectManager.Layouts.master')
@section('page-title')
ProjectManager Dashboard
@endsection
@section('content')
<style>
#chartdiv {
  width: 100%;
  height: 500px;
  font-size: 11px;
}
.amcharts-chart-div a {
	display:none !important;
}
.amcharts-pie-slice {
  transform: scale(1);
  transform-origin: 50% 50%;
  transition-duration: 0.3s;
  transition: all .3s ease-out;
  -webkit-transition: all .3s ease-out;
  -moz-transition: all .3s ease-out;
  -o-transition: all .3s ease-out;
  cursor: pointer;
  box-shadow: 0 0 30px 0 #000;
}

.amcharts-pie-slice:hover {
  transform: scale(1.1);
  filter: url(#shadow);
}							
</style>


<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="#">Dashboard</a> 
		</li>
	</ul>
	<div class="row-fluid">
		<h2>Surveyors Status</h2>
		
		<div class="row-fluid">
				
				<div class="span3 statbox pinklight" onTablet="span6" onDesktop="span3">
					<div class="number">30<i class="icon-arrow-up"></i></div>
					<div class="title">Active Surveyors</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>		
				</div>
				<div class="span3 statbox orangeLight" onTablet="span6" onDesktop="span3">
					<div class="number">10<i class="icon-arrow-up"></i></div>
					<div class="title">Inactive Surveyors</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>	
				</div>
				<div class="span3 statbox blueLight noMargin" onTablet="span6" onDesktop="span3">
					<div class="number">5<i class="icon-arrow-up"></i></div>
					<div class="title">Prospective Surveyors</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>
				<div class="span3 statbox redLight" onTablet="span6" onDesktop="span3">
					<div class="number">3<i class="icon-arrow-up"></i></div>
					<div class="title">Trainee Surveyors</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>	
				
			</div>		
													
	</div>

	<div class="row-fluid">
		<h2>Projects Current Status</h2>
		<div id="chartdiv"></div>														
	</div>


</div>
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<script>
var chart = AmCharts.makeChart("chartdiv", {
  "type": "pie",
  "startDuration": 0,
   "theme": "light",
  "addClassNames": true,
  "legend":{
   	"position":"right",
    "marginRight":100,
    "autoMargins":false
  },
  "innerRadius": "25%",
  "defs": {
    "filter": [{
      "id": "shadow",
      "width": "200%",
      "height": "200%",
      "feOffset": {
        "result": "offOut",
        "in": "SourceAlpha",
        "dx": 0,
        "dy": 0
      },
      "feGaussianBlur": {
        "result": "blurOut",
        "in": "offOut",
        "stdDeviation": 5
      },
      "feBlend": {
        "in": "SourceGraphic",
        "in2": "blurOut",
        "mode": "normal"
      }
    }]
  },
  "dataProvider": [{
    "project": "New Projects",
    "numbers": 44
  }, {
    "project": "Completed Projects",
    "numbers": 19
  }, {
    "project": "Active Projects",
    "numbers": 31
  }, {
    "project": "Delay Projects",
    "numbers": 6
  }],
  "valueField": "numbers",
  "titleField": "project",
  "export": {
    "enabled": false
  }
});

chart.addListener("init", handleInit);

chart.addListener("rollOverSlice", function(e) {
  handleRollOver(e);
});

function handleInit(){
  chart.legend.addListener("rollOverItem", handleRollOver);
}

function handleRollOver(e){
  var wedge = e.dataItem.wedge.node;
  wedge.parentNode.appendChild(wedge);
}
</script>

		
@endsection	    

