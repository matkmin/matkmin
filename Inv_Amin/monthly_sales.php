<?php
  $page_title = 'Monthly Sales';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
 $year = date('Y');
 $sales = monthlySales($year);
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Monthly Sales</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th> Product name </th>
                <th class="text-center" style="width: 15%;"> Quantity Sold</th>
				<th class="text-center" style="width: 15%;"> Expected Sales</th>
                <th class="text-center" style="width: 15%;"> Date </th>
                <th class="text-center" style="width: 15%;"> Total </th>
             </tr>
            </thead>
           <tbody>
             <?php foreach ($sales as $sale):?>
             <tr>
               <td class="text-center"><?php echo count_id();?></td>
               <td><?php echo remove_junk($sale['name']); ?></td>
               <td class="text-center"><?php echo (int)$sale['qty']; ?></td>
			   <td class="text-center">RM 10</td>
               <td class="text-center"><?php echo $sale['date']; ?></td> 
			   <td class="text-center">RM <?php echo remove_junk($sale['total_saleing_price']); ?></td>
               
             </tr>
             <?php endforeach;?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>
  
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title: {
		text: "Monthly Sales Data"
	},
	axisX: {
		valueFormatString: "MMM"
	},
	axisY: {
		prefix: "RM",
		labelFormatter: addSymbols
	},
	toolTip: {
		shared: true
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [
	{
		type: "column",
		name: "Actual Sales",
		showInLegend: true,
		xValueFormatString: "MMMM YYYY",
		yValueFormatString: "RM#,##0",
		dataPoints: [
			{ x: new Date(2016, 0), y: 20000 },
			{ x: new Date(2016, 1), y: 30000 },
			{ x: new Date(2016, 2), y: 25000 },
			{ x: new Date(2016, 3), y: 70000, indexLabel: "High Renewals" },
			{ x: new Date(2016, 4), y: 50000 },
			{ x: new Date(2016, 5), y: 35000 },
			{ x: new Date(2016, 6), y: 30000 },
			{ x: new Date(2016, 7), y: 43000 },
			{ x: new Date(2016, 8), y: 35000 },
			{ x: new Date(2016, 9), y:  30000},
			{ x: new Date(2016, 10), y: 40000 },
			{ x: new Date(2016, 11), y: 50000 }
		]
	}, 
	{
		type: "line",
		name: "Expected Sales",
		showInLegend: true,
		yValueFormatString: "RM#,##0",
		dataPoints: [
			{ x: new Date(2016, 0), y: 40000 },
			{ x: new Date(2016, 1), y: 42000 },
			{ x: new Date(2016, 2), y: 45000 },
			{ x: new Date(2016, 3), y: 45000 },
			{ x: new Date(2016, 4), y: 47000 },
			{ x: new Date(2016, 5), y: 43000 },
			{ x: new Date(2016, 6), y: 42000 },
			{ x: new Date(2016, 7), y: 43000 },
			{ x: new Date(2016, 8), y: 41000 },
			{ x: new Date(2016, 9), y: 45000 },
			{ x: new Date(2016, 10), y: 42000 },
			{ x: new Date(2016, 11), y: 50000 }
		]
	},
	{
		type: "area",
		name: "Profit",
		markerBorderColor: "white",
		markerBorderThickness: 2,
		showInLegend: true,
		yValueFormatString: "RM#,##0",
		dataPoints: [
			{ x: new Date(2016, 0), y: 5000 },
			{ x: new Date(2016, 1), y: 7000 },
			{ x: new Date(2016, 2), y: 6000},
			{ x: new Date(2016, 3), y: 30000 },
			{ x: new Date(2016, 4), y: 20000 },
			{ x: new Date(2016, 5), y: 15000 },
			{ x: new Date(2016, 6), y: 13000 },
			{ x: new Date(2016, 7), y: 20000 },
			{ x: new Date(2016, 8), y: 15000 },
			{ x: new Date(2016, 9), y:  10000},
			{ x: new Date(2016, 10), y: 19000 },
			{ x: new Date(2016, 11), y: 22000 }
		]
	}]
});
chart.render();

function addSymbols(e) {
	var suffixes = ["", "K", "M", "B"];
	var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);

	if(order > suffixes.length - 1)                	
		order = suffixes.length - 1;

	var suffix = suffixes[order];      
	return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
}

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 500px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
<?php include_once('layouts/footer.php'); ?>
