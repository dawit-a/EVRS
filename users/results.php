<?php 


if(isset($_SESSION['search_name']))
{
$search_name=$_SESSION['search_name'];
$names= split_name($search_name);
$f_name=$names['first_name'];
$m_name=$names['middle_name'];
$l_name=$names['last_name'];

}
$user_role=$_SESSION['user_role'];
if($user_role=="Registrar") $role="registrar";
                          else if($user_role=="manager") $role="manager";
                          else if($user_role=="org") $role="org";
                          $url="$role.php?home&lang=eng";
                    
search_results($f_name,$m_name,$l_name,$role);


function split_name($name) {
    $parts = array();

    while ( strlen( trim($name)) > 0 ) {
        $name = trim($name);
        $string = preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $parts[] = $string;
        $name = trim( preg_replace('#'.preg_quote($string,'#').'#', '', $name ) );
    }

    if (empty($parts)) {
        return false;
    }

    $parts = array_reverse($parts);
    $name = array();
    $name['first_name'] = $parts[0];
    $name['middle_name'] = (isset($parts[2])) ? $parts[1] : '';
    $name['last_name'] = (isset($parts[2])) ? $parts[2] : ( isset($parts[1]) ? $parts[1] : '');
    
    return $name;
}

function search_results($f_name,$m_name,$l_name,$role)
{
    
    $con= mysqli_connect("localhost","root","","vers");
    if($m_name==" "&&$l_name=="")
    $get_records = "select * from birth_records where name like '%$f_name%' ";
    else if($m_name==""){
       
    $get_records = "select * from birth_records where name like '%$f_name%' AND father_name like '%$l_name%'  ";
    }
    else
    $get_records = "select * from birth_records where name like '%$f_name%' AND father_name like '%$m_name%'  AND grand_father_name like '%$l_name%' ";
    $run_records = mysqli_query($con,$get_records);
    $count = mysqli_num_rows($run_records);
    if($count==0){

        echo "
        
        <div class='box'>
        
        <h2>No Search Results Found</h2>
        <p><a href='registrar.php?register_birth&lang=eng'>Register New Birth Record</a></p>
        
        </div>
        
        ";
        
        }else{
        
        while($row_birth_record=mysqli_fetch_array($run_records)){
            $bid = $row_birth_record['bid'];

            $name = $row_birth_record['name'];
            $fname= $row_birth_record['father_name'];
            $gfname= $row_birth_record['grand_father_name'];
            $dob=$row_birth_record['date_of_birth'];
            $nationality= $row_birth_record['nationality'];
            
            
            $f_name= $row_birth_record['father_full_name'];
            $m_name= $row_birth_record['mother_full_name'];
            $sex= $row_birth_record['gender'];
            $image=$row_birth_record['image'];
            if($image=="")
            {
                if($sex=="Male")
                $image="male.jpg";
                else
                $image="female.png";
            }

            echo "

            <div class='col-md-4'><!-- col-md-4 Starts -->

            <div class='panel'><!-- panel Starts -->
            
            <div class='panel-body'><!-- panel-body Starts -->
            
            <div class='thumb-info mb-md'><!-- thumb-info mb-md Starts -->
            
            <img src='images/$image' class='rounded img-responsive'>
            
            <div class='thumb-info-title'><!-- thumb-info-title Starts -->
            
            <span class='thumb-info-inner'> $name $fname  </span>
            
            <span class='thumb-info-type'>   $sex  </span>
            
            </div><!-- thumb-info-title Ends -->
            
            </div><!-- thumb-info mb-md Ends -->
            
            <div class='mb-md'><!-- mb-md Starts -->
            
            <div class='widget-content-expanded'><!-- widget-content-expanded Starts -->
            
            <i class='fa fa-user'></i> <span>Date of Birth: </span>    $dob <br>
            <i class='fa fa-user'></i> <span> Nationality: </span>  $nationality  <br>
            <p class='text-right'><a href='$role.php?bid=$bid&lang=eng' class='btn btn-default' >View details</a><p>
            
            </div><!-- widget-content-expanded Ends -->
            
           
            </div><!-- mb-md Ends -->
            
            </div><!-- panel-body Ends -->
            
            </div><!-- panel Ends -->
            
            </div><!-- col-md-4 Ends -->
            
            

";


        }
}
}
?>