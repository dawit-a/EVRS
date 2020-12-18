<!DOCTYPE html>
<html>
<head>
<title>Creating Dynamic Data Graph using PHP and Chart.js</title>
<style type="text/css">
BODY {
    width: 100%;
}

#chart-container {
    width: 100%;
    height: auto;
}
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>


</head>
<body>
<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> User report

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->
<div class="row">
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

</div>
</div>
</div>
</div>
</div>

<script>
     $(document).ready(function () {
            showGraph();
        });
        function showGraph()
        {
var dat=[];
dat.push("<?php echo $count_birth_records ?>");
dat.push("><?php echo $count_death_records ?>");
dat.push("<?php echo $count_divorce_records ?>");
dat.push("<?php echo $count_marriage_records ?>");

var name=[];
name.push("Birth");
name.push("Death");
name.push("Divorce");
name.push("Marriage");

var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Registered events',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: dat
                            },
                        ]
                    };

var graphTarget = $("#graphCanvas");

var barGraph = new Chart(graphTarget, {
    type: 'bar',
    data: chartdata
});                   
        }
</script>

</body>
</html>

