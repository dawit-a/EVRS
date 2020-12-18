<?php
    if(isset($_POST['reg_death']))
    {
        $dod=$_POST['dod'];
        $title=$_POST['title'];
        $d_cause=$_POST['d_cause'];
        $region=$_POST['region'];
        $zone=$_POST['zone'];
        $woreda=$_POST['wereda'];
        $d_o_dr=date("Y/m/d");
        $insert="insert into death_records(d_bid,title,dod,d_o_dr,registrar_full_name,registrar_id,d_cause,region,zone,woreda) values ($bid,'$title','$dod','$d_o_dr','$user_name',$user_id,'$d_cause','$region','$zone','$woreda')";
        $run_rec=mysqli_query($con,$insert);
        echo mysqli_error($con);
        if($run_rec)
        {
            echo "<script> window.open('registrar.php?bid=$bid&lang=eng','_self')</script>";
            
        }
        else
        echo mysqli_error($con);
    
    } 
    
        ?>