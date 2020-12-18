<?php



if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {
    $user_role=$_SESSION['user_role'];
    
?>


<div class="row"><!--  1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard"></i> Dashboard / Birth records

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->





<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> Report

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->


<div class="row">
    <!-- 2 row Starts -->

    <div class="col-lg-12">
        <!-- col-lg-12 Starts -->

        <div class="panel panel-default">
            <!-- panel panel-default Starts -->

            <div class="panel-heading">
                <!-- panel-heading Starts -->

                <h3 class="panel-title">
                    <!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw"></i> Information search

                </h3><!-- panel-title Ends -->


            </div><!-- panel-heading Ends -->
            
            <div class="panel-body">
                <!-- panel-body Starts -->
                <div class="row">
                    <?php if($user_role=="Registrar") $role="registrar";
                          else if($user_role=="manager") $role="manager";
                          else if($user_role=="org") $role="org";
                          $url="$role.php?home&lang=eng";
                    ?>
                    <form class="col-md-8" method="get" action=<?php echo $url;?>>
                        <!-- navbar-form Starts -->

                        <div class="input-group">
                            <!-- input-group Starts -->
                            <span class="input-group-btn">
                                <!-- input-group-btn Starts -->

                                <select name="report_by" class="btn btn-primary">
                                    <option value="report_by">Report By</option>
                                    <option value="region" <?php if(isset($_GET['report_by']))
                                    {if($_GET['report_by']=="region") echo "selected";} ?>>Region</option>
                                    <option value="year" <?php if(isset($_GET['report_by']))
                                    {if($_GET['report_by']=="year") echo "selected";} ?>>Year</option>
                                    <option value="zone" <?php if(isset($_GET['report_by']))
                                    {if($_GET['report_by']=="zone") echo "selected";} ?>>Zone</option>
                                    <option value="city" <?php if(isset($_GET['report_by']))
                                    {if($_GET['report_by']=="city") echo "selected";} ?>>City</option>
                                    
                                </select>

                            </span><!-- input-group-btn Ends -->

                            <input class="form-control" type="text" placeholder="Find report" name="report_val" value="<?php if(isset($_GET['report'])) echo $_GET['report_val'];
            ?>" required>


                            <span class="input-group-btn">
                                <!-- input-group-btn Starts -->

                                <button type="submit" value="Search" name="report" class="btn btn-primary">

                                    <i class="fa fa-search"></i>

                                </button>

                            </span><!-- input-group-btn Ends -->

                        </div><!-- input-group Ends -->

                    </form><!-- navbar-form Ends -->

                </div>




            </div><!-- panel-body Ends -->

        </div><!-- panel panel-default Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->
<?php include("stat.php"); ?>
<?php if(empty($_GET['report_by'])){ ?>

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>
<th>Region</th>
<th>Birth</th>
<th>Death</th>
<th>Divorce</th>
<th>Marriage</th>
</tr>


</thead>

<tbody>

<tr>


<td>Afar</td>
<?php echo show_report('region','afar');?>
</tr>

<td>Amara</td>
<?php echo show_report('region','amara');?>
</tr>
<td>Benshangul</td>
<?php echo show_report('region','benshagul');?>
</tr>
<td>Gambella</td>
<?php echo show_report('region','gambella');?>
</tr>
<td>Harar</td>
<?php echo show_report('region','harar');?>
</tr>

<td>Oromia</td>
<?php echo show_report('region','oromia');?>
</tr>
<td>Sidama</td>
<?php echo show_report('region','sidama');?>
</tr>
<td>Somale</td>
<?php echo show_report('region','Somale');?>
</tr>
<td>South</td>
<?php echo show_report('region','south');?>
</tr>
<td>Tigray</td>
<?php echo show_report('region','tigray');?>
</tr>
</tbody>


</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->
<?php } 

else{
    
    if($_GET['report_by']=='region')
    {
        $r_val=$_GET['report_val'];
        generate_report('region',$r_val,'zone');

        
    }
    if($_GET['report_by']=='zone')
    {
        $r_val=$_GET['report_val'];
        generate_report('zone',$r_val,'woreda');

    }

    if($_GET['report_by']=='year')
    {
        $r_val=$_GET['report_val'];
        generate_year_report($r_val);
    }

    
}?>

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->







<?php } 

function show_report($col,$val)
{
    $user_role=$_SESSION['user_role'];
     if($user_role=="Registrar") $role="registrar";
                          else if($user_role=="manager") $role="manager";
                          else if($user_role=="org") $role="org";
                          $url="$role.php?home&lang=eng";
                    
    $con= mysqli_connect("localhost","root","","vers");
    $get_birth_records = "select * from birth_records where $col like '%$val%' ";
    
$run_birth_records = mysqli_query($con,$get_birth_records);

$count_birth_records = mysqli_num_rows($run_birth_records);

$get_death_records = "select * from death_records where $col  like '%$val%'";
$run_death_records = mysqli_query($con,$get_death_records);
$count_death_records = mysqli_num_rows($run_death_records);


$get_divorce_records = "select * from divorce_records where $col  like '%$val%'";
$run_divorce_records = mysqli_query($con,$get_divorce_records);
$count_divorce_records = mysqli_num_rows($run_divorce_records);

$get_marriage_records = "select * from marriage_records where mr_$col  like '%$val%'";
$run_marriage_records = mysqli_query($con,$get_marriage_records);
$count_marriage_records = mysqli_num_rows($run_marriage_records);
return  "<td>$count_birth_records</td>
<td>$count_death_records</td>
<td>$count_divorce_records</td>
<td>$count_marriage_records</td>";
}

function generate_report($report_by,$r_val,$var)
{
    $user_role=$_SESSION['user_role'];
    if($user_role=="Registrar") $role="registrar";
                          else if($user_role=="manager") $role="manager";
                          else if($user_role=="org") $role="org";
                          $url="$role.php?home&lang=eng";
                    
    $con= mysqli_connect("localhost","root","","vers");
    $r_val=$_GET['report_val'];
        $rb_query="select woreda,zone,region from birth_records where $report_by like '%$r_val%' order by $var";
        $rb_run=mysqli_query($con,$rb_query);
        $count_rb=mysqli_num_rows($rb_run);
        $rd_query="select woreda,zone,region from death_records where $report_by like '%$r_val%' order by $var";
        $rd_run=mysqli_query($con,$rd_query);
        $count_rd=mysqli_num_rows($rd_run);
        $rdv_query="select woreda,zone,region from divorce_records where $report_by like '%$r_val%' order by $var";
        $rdv_run=mysqli_query($con,$rdv_query);
        $count_rdv=mysqli_num_rows($rdv_run);
        $rm_query="select mr_woreda,mr_zone,mr_region from marriage_records where mr_$report_by like '%$r_val%' order by mr_$var";
        $rm_run=mysqli_query($con,$rm_query);
        $count_rm=mysqli_num_rows($rm_run);
        if($count_rb==0&&$count_rdv==0&&$count_rd==0&&$count_rm==0)
        {
             echo "
        
            <div class='box'>
            
            <h2>No  record is registered on $r_val $report_by</h2>
           
            
            </div>
            
            ";
        }
        else
        {
            echo "<div class='table-responsive' ><!-- table-responsive Starts -->

            <table class='table table-bordered table-hover table-striped'><!-- table table-bordered table-hover table-striped Starts -->
            
            <thead>
            
            <tr>
            <th>$var</th>
            <th>Birth</th>
            <th>Death</th>
            <th>Divorce</th>
            <th>Marriage</th>
            <th>Graph report</th>
            </tr>
            
            
            </thead>
            
            <tbody>
            
            
            
            ";
            $i=0;
            $temp="";
            $zb=array();
            $zb_count=array();
            $total_rows=mysqli_num_rows($rb_run);
            $counter=$total_rows;
            $i=0;
            $j=0;
            while($row_r=mysqli_fetch_array($rb_run))
            {
               
                if($j==0&&$i==0)
                $zb[$j]=$row_r["$var"];
                if($zb[$j]==$row_r["$var"])
                $i++;
                if($zb[$j]!=$row_r["$var"])
                {
                    $zb_count[$j]=$i;
                    $j++;
                    $zb[$j]=$row_r["$var"];
                    $i=1;
                }
                if($counter==$total_rows)
                {
                    $zb_count[$j]=$i;
                }

            }

            

            $i=0;
            $temp="";
            $zd=array();
            $zd_count=array();
            $total_rows=mysqli_num_rows($rd_run);
            $counter=$total_rows;
            $i=0;
            $j=0;
            while($row_r=mysqli_fetch_array($rd_run))
            {
               
                if($j==0&&$i==0)
                $zd[$j]=$row_r["$var"];
                if($zd[$j]==$row_r["$var"])
                $i++;
                if($zd[$j]!=$row_r["$var"])
                {
                    $zd_count[$j]=$i;
                    $j++;
                    $zd[$j]=$row_r["$var"];
                    $i=1;
                }
                if($counter==$total_rows)
                {
                    $zd_count[$j]=$i;
                }

            }

            
            $i=0;
            $temp="";
            $zm=array();
            $zm_count=array();
            $total_rows=mysqli_num_rows($rm_run);
            $counter=$total_rows;
            $i=0;
            $j=0;
            while($row_r=mysqli_fetch_array($rm_run))
            {
               
                if($j==0&&$i==0)
                $zm[$j]=$row_r["mr_$var"];
                if($zm[$j]==$row_r["mr_$var"])
                $i++;
                if($zm[$j]!=$row_r["mr_$var"])
                {
                    $zm_count[$j]=$i;
                    $j++;
                    $zm[$j]=$row_r["mr_$var"];
                    $i=1;
                }
                if($counter==$total_rows)
                {
                    $zm_count[$j]=$i;
                }

            }

            
            $i=0;
            $temp="";
            $zdv=array();
            $zdv_count=array();
            $total_rows=mysqli_num_rows($rdv_run);
            $counter=$total_rows;
            $i=0;
            $j=0;
            while($row_r=mysqli_fetch_array($rdv_run))
            {
               
                if($j==0&&$i==0)
                $zdv[$j]=$row_r["$var"];
                if($zdv[$j]==$row_r["$var"])
                $i++;
                if($zdv[$j]!=$row_r["$var"])
                {
                    $zdv_count[$j]=$i;
                    $j++;
                    $zdv[$j]=$row_r["$var"];
                    $i=1;
                }
                if($counter==$total_rows)
                {
                    $zdv_count[$j]=$i;
                }

            }

          

            $b_size=count($zb);
            $d_size=count($zd);
            $dv_size=count($zdv);
            $m_size=count($zm);
            $largest=max($b_size,$d_size,$dv_size,$m_size);
            $i=0;
            while($i<$largest)
            {
                echo "<tr>";
                if($b_size==$largest)
                {
                    echo "<td>".$zb[$i]."</td><td>".$zb_count[$i]."</td>";
                    if(isset($zd_count[$i]))
                    echo "<td>".$zd_count[$i]."</td>";
                    else
                    {
                        $zd_count[$i]=0;
                        echo "<td>0</td>";
                    };
                    if(isset($zdv_count[$i]))
                    echo "<td>".$zdv_count[$i]."</td>";
                    else
                    {
                        $zdv_count[$i]=0;
                        echo "<td>0</td>";
                    }
                    if(isset($zm_count[$i]))
                    echo "<td>".$zm_count[$i]."</td>";
                    else
                    {
                        $zm_count[$i]=0;
                        echo "<td>0</td>";
                    }
                    echo "<td><a href='manager.php?report_by=".$_GET['report_by']."&report_val=".$_GET['report_val']."&b=".$zb_count[$i]."&d=".$zd_count[$i]."&dv=".$zdv_count[$i]."&m=".$zm_count[$i]."'>View Graph</a></td>";
                    
                }
                else if($d_size==$largest)
                {
                    
                    if(isset($zb_count[$i]))
                    echo "<td>".$zb_count[$i]."</td>";
                    else
                    {
                        $zb_count[$i]=0;
                        echo "<td>0</td>";
                    }
                    echo "<td>".$zd[$i]."</td><td>".$zd_count[$i]."</td>";
                    if(isset($zdv_count[$i]))
                    echo "<td>".$zdv_count[$i]."</td>";
                    else
                    {
                        $zdv_count[$i]=0;
                        echo "<td>0</td>";
                    }
                    if(isset($zm_count[$i]))
                    echo "<td>".$zm_count[$i]."</td>";
                    else
                    {
                        $zm_count[$i]=0;
                        echo "<td>0</td>";
                    }

                    echo "<td><a href='$role.php?report_by=".$_GET['report_by']."&report_val=".$_GET['report_val']."&b=".$zb_count[$i]."&d=".$zd_count[$i]."&dv=".$zdv_count[$i]."&m=".$zm_count[$i]."'>View Graph</a></td>";
                    
                }
               else if($dv_size==$largest)
                {
                    if(isset($zb_count[$i]))
                    echo "<td>".$zb_count[$i]."</td>";
                    else
                    {
                        $zb_count[$i]=0;
                        echo "<td>0</td>";
                    }
                   
                    if(isset($zd_count[$i]))
                    echo "<td>".$zd_count[$i]."</td>";
                  
                    else
                    {
                        $zd_count[$i]=0;
                        echo "<td>0</td>";
                    }
                    echo "<td>".$zdv[$i]."</td><td>".$zdv_count[$i]."</td>";
                    
                    
                    if(isset($zm_count[$i]))
                    echo "<td>".$zm_count[$i]."</td>";
                    else
                    {
                        $zm_count[$i]=0;
                        echo "<td>0</td>";
                    }
                   echo "<td><a href='$role.php?report_by=".$_GET['report_by']."&report_val=".$_GET['report_val']."&b=".$zb_count[$i]."&d=".$zd_count[$i]."&dv=".$zdv_count[$i]."&m=".$zm_count[$i]."'>View Graph</a></td>";
                    
                }
               else if($m_size==$largest)
                {
                    if(isset($zb_count[$i]))
                    echo "<td>".$zb_count[$i]."</td>";
                    else
                    {
                        $zb_count[$i]=0;
                        echo "<td>0</td>";
                    }
                    
                    
                    if(isset($zd_count[$i]))
                    echo "<td>".$zd_count[$i]."</td>";
                    else
                    {
                        $zd_count[$i]=0;
                        echo "<td>0</td>";
                    }
                    if(isset($zdv_count[$i]))
                    echo "<td>".$zdv_count[$i]."</td>";
                    else
                    {
                        $zdv_count[$i]=0;
                        echo "<td>0</td>";
                    }
                    echo "<td>".$zm[$i]."</td><td>".$zm_count[$i]."</td>";
                    echo "<td><a href='$role.php?report_by=".$_GET['report_by']."&report_val=".$_GET['report_val']."&b=".$zb_count[$i]."&d=".$zd_count[$i]."&dv=".$zdv_count[$i]."&m=".$zm_count[$i]."'>View Graph</a></td>";
                    
                }
                
                $i++;
            }
}



}
function generate_year_report($r_val)
{
    $con= mysqli_connect("localhost","root","","vers");
    preg_match_all('!\d+!', $r_val, $matches);
    if(!isset($matches[0][1]))
    {
        $matches[0][1]=date('Y');
    }
    $from=$matches[0][0];
    $to=$matches[0][1];
    if($from>$to)
    {
        $temp=$from;
        $to=$from;
        $from=$temp;
    }
    echo "<div class='table-responsive' ><!-- table-responsive Starts -->

    <table class='table table-bordered table-hover table-striped'><!-- table table-bordered table-hover table-striped Starts -->
    
    <thead>
    
    <tr>
    <th>Year</th>
    <th>Birth</th>
    <th>Death</th>
    <th>Divorce</th>
    <th>Marriage</th>
    <th>Graph Report</th>
    </tr>
    
    
    </thead>
    
    <tbody>
    
    
    
    ";
    $user_role=$_SESSION['user_role'];
     if($user_role=="Registrar") $role="registrar";
    else if($user_role=="manager") $role="manager";
    else if($user_role=="org") $role="org";
    $url="$role.php?home&lang=eng";

    while($from<=$to)
    {
        $get_birth="SELECT * FROM birth_records  WHERE YEAR(date_of_birth) = $from";
        $run_birth=mysqli_query($con,$get_birth);
        $count_birth_records=mysqli_num_rows($run_birth);
        $get_death="SELECT * FROM death_records  WHERE YEAR(dod) = $from";
        $run_death=mysqli_query($con,$get_death);
        $count_death_records=mysqli_num_rows($run_death);
        $get_divorce="SELECT * FROM divorce_records  WHERE YEAR(dod) = $from";
        $run_divorce=mysqli_query($con,$get_divorce);
        $count_divorce_records=mysqli_num_rows($run_divorce);
        $get_marriage="SELECT * FROM marriage_records  WHERE YEAR(d_o_mr) = $to";
        $run_marriage=mysqli_query($con,$get_marriage);
        $count_marriage_records=mysqli_num_rows($run_marriage);

        echo "<tr><td>$from</td><td>$count_birth_records</td><td>$count_death_records</td><td>$count_divorce_records</td><td>$count_marriage_records</td><td><a href='$role.php?report_by=year&report_val=$r_val&b=$count_birth_records&d=$count_death_records&dv=$count_divorce_records&m=$count_marriage_records'>View Graph</a></td></tr>";
        


        $from++;
        
    }
    
    
    

}


?>