



    <?php
       
    
    if(isset($_POST['reg']))
    {
        $d_bid=$_SESSION["d_bid"]; 
        $get_records = "select * from birth_records where bid=$d_bid";
        $run_records = mysqli_query($con,$get_records);
        $row_birth_record=mysqli_fetch_array($run_records);
        $d_sex=$row_birth_record['gender'];
          echo "<script>alert('$bid,$d_bid,$d_sex')</script>" ;  
      
        if($d_sex=="Male")
        $q="select * from marriage_records where w_bid=$bid and h_bid=$d_bid";
        else
        $q="select * from marriage_records where w_bid=$d_bid and h_bid=$bid";
        $run_q=mysqli_query($con,$q);
        $row_q=mysqli_fetch_array($run_q);
        $mid=$row_q['mid'];        
        $dod=$_POST['dod'];
        $region=$_POST['region'];
        $zone=$_POST['zone'];
        $woreda=$_POST['wereda'];
        $dodr=date("Y/m/d");
    
        $insert="insert into divorce_records(mid,dod,region,zone,woreda,dodr,registrar_full_name,registrar_id) values ($mid,'$dod','$region','$zone','$woreda','$dodr','$user_name',$user_id)";
        $run_rec=mysqli_query($con,$insert);
        if($run_rec)
        {
            $update="update marriage_records set divorced='y' where mid=$mid";
            mysqli_query($con,$update);
           
        }
        
        
        if(!$run_rec)
        {
            echo mysqli_error($con);
            
        }

        else{
            
            echo "<script> window.open('registrar.php?bid=$bid&lang=eng','_self')</script>";
        }
       
    } 
    
        ?>