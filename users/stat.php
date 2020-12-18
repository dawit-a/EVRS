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
<?php  
 if(isset($_GET['b'])&&isset($_GET['d'])&&isset($_GET['dv'])&&isset($_GET['m']))
{
    
 ?>
<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-9" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title col-md-11"  ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> Graph report


</h3><!-- panel-title Ends -->
<a href='<?php echo $role; ?>.php?<?php echo "report_by=".$_GET["report_by"]."&report_val=".$_GET['report_val']  ?>' class="btn btn-primary">Close</a>

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
Welcome to Graph rep
<script>
     $(document).ready(function () {
            showGraph();
        });
        function showGraph()
        {
var dat=[];
dat.push("<?php echo $_GET['b'] ?>");
dat.push("><?php echo $_GET['d']  ?>");
dat.push("<?php echo $_GET['dv']  ?>");
dat.push("<?php echo $_GET['m']  ?>");

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
    <?php } ?>
</body>
</html>

