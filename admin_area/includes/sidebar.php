<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<nav class="navbar navbar-inverse navbar-fixed-top" ><!-- navbar navbar-inverse navbar-fixed-top Starts -->

<div class="navbar-header" ><!-- navbar-header Starts -->

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Starts -->


<span class="sr-only" >Toggle Navigation</span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>


</button><!-- navbar-ex1-collapse Ends -->

<a class="navbar-brand" href="index.php?dashboard" >Admin Panel</a>


</div><!-- navbar-header Ends -->

<ul class="nav navbar-right top-nav" ><!-- nav navbar-right top-nav Starts -->

<li class="dropdown" ><!-- dropdown Starts -->

<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><!-- dropdown-toggle Starts -->

<i class="fa fa-user" ></i>



<?php echo $admin_name; ?> <b class="caret" ></b>


</a><!-- dropdown-toggle Ends -->

<ul class="dropdown-menu" ><!-- dropdown-menu Starts -->

<li><!-- li Starts -->

<a href="index.php?user_profile=<?php echo $admin_id; ?>" >

<i class="fa fa-fw fa-user" ></i> Profile


</a>

</li><!-- li Ends -->


<li class="divider"></li>

<li><!-- li Starts -->

<a href="logout.php">

<i class="fa fa-fw fa-power-off"> </i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- dropdown-menu Ends -->




</li><!-- dropdown Ends -->


</ul><!-- nav navbar-right top-nav Ends -->

<div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Starts -->

<ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Starts -->

<li><!-- li Starts -->

<a href="index.php?dashboard">

<i class="fa fa-fw fa-dashboard"></i> Dashboard

</a>

</li><!-- li Ends -->
<li>
                    <!-- li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#records">

                        <i class="fa fa-fw fa-edit"></i> Records

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>


                    <ul id="records" class="collapse nav nav-tabs  nav-stacked ">
                        <hr class="dotted short">
                        <li>
                            <a href="#" data-toggle="collapse" data-target="#birth">

                                Birth

                                <i class="fa fa-fw fa-caret-down"></i>


                            </a>
                            <ul id="birth" class="collapse  nav nav-tabs  nav-stacked">
                                <hr class="dotted short">
                                
                                <li>

                                    <a href="index.php?view_birth_records">
                                        <i class="fa fa-eye"></i>
                                        View Birth Records </a>
                                </li>
                            </ul>
                        </li>



                        <li>
                            <a href="#" data-toggle="collapse" data-target="#marriage">

                                Marriage

                                <i class="fa fa-fw fa-caret-down"></i>


                            </a>
                            <ul id="marriage" class="collapse  nav nav-tabs  nav-stacked">
                                <hr class="dotted short">
                                
                                <li>
                                    <a href="index.php?view_marriage_records">
                                        <i class="fa fa-eye"></i>
                                        View Marriage Records </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" data-toggle="collapse" data-target="#death">

                                Death

                                <i class="fa fa-fw fa-caret-down"></i>


                            </a>
                            <ul id="death" class="collapse  nav nav-tabs  nav-stacked">
                                <hr class="dotted short">
                                
                                <li>
                                    <a href="index.php?view_death_records">
                                        <i class="fa fa-eye"></i>
                                        View Death Records </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" data-toggle="collapse" data-target="#divorce">

                                Divorce

                                <i class="fa fa-fw fa-caret-down"></i>


                            </a>
                            <ul id="divorce" class="collapse  nav nav-tabs  nav-stacked">
                                <hr class="dotted short">
                               
                                <li>
                                    <a href="index.php?view_divorce_records">
                                        <i class="fa fa-eye"></i>
                                        View Divorce Records </a>
                                </li>
                            </ul>
                        </li>



                    </ul>

                </li><!-- li Ends -->
                <li class="<?php if(isset($_GET['user_report'])||isset($_GET['reg_report'])){ echo "active"; } ?>">
                    <!-- reports li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#reports">

                        <i class="fa fa-fw fa-table"></i> Report

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="reports" class="collapse nav nav-tabs  nav-stacked">

                        <li>
                            <a href="index.php?user_report&lang=eng"> User report </a>
                        </li>

                        <li>
                            <a href="index.php?reg_report&lang=eng"> Main report </a>
                        </li>


                    </ul>

                </li><!-- report li Ends -->
                <li class="<?php if(isset($_GET['user_report'])||isset($_GET['reg_report'])){ echo "active"; } ?>">
                    <!-- reports li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#org">

                        <i class="fa fa-fw fa-opera"></i> Organization

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="org" class="collapse nav nav-tabs  nav-stacked">

                        <li>
                            <a href="index.php?insert_org"> Insert organization </a>
                        </li>

                        <li>
                            <a href="index.php?view_org"> View organization </a>
                        </li>


                    </ul>

                </li><!-- report li Ends -->

                <li>
                    <!--  Li Starts --->










                <li class="<?php if(isset($_GET['stat'])){ echo "active"; } ?>">

                    <a href="index.php?stat"><i class="fa fa-fw fa-bar-chart"></i> Statistics </a>

                </li>

                <li>
                    <!-- li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#users">

                        <i class="fa fa-fw fa-gear"></i> Users

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="users" class="collapse nav nav-tabs  nav-stacked">

                        <li>
                            <a href="index.php?insert_user"> Insert User </a>
                        </li>

                        <li>
                            <a href="index.php?view_users"> View Users </a>
                        </li>

                        <li>
                            <a href="index.php?user_profile=<?php echo $admin_id;?>"> Edit Profile </a>
                        </li>

                    </ul>

                </li><!-- li Ends -->
                <li><!-- News li Starts -->

<a href="#" data-toggle="collapse" data-target="#news">

<i class="fa fa-fw fa-gear"></i> News

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="news" class="collapse">

<li>
<a href="index.php?insert_news"> Insert news </a>
</li>

<li>
<a href="index.php?view_news"> View News </a>
</li>


</ul>

</li><!-- News li Ends -->


                <li><!-- slide li Starts -->

<a href="#" data-toggle="collapse" data-target="#slides">

<i class="fa fa-fw fa-gear"></i> Slides

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="slides" class="collapse">

<li>
<a href="index.php?insert_slide"> Insert Slide </a>
</li>

<li>
<a href="index.php?view_slides"> View Slides </a>
</li>


</ul>

</li><!-- slide li Ends -->


<li><!-- box li Starts -->

<a href="index.php?edit_box">

<i class="fa fa-fw fa-edit"></i> Edit Box  section

</a>

</li><!-- box li Ends -->

<li><!-- vision li Starts -->

<a href="index.php?edit_vision_section">

<i class="fa fa-fw fa-edit"></i> Edit Vision  section

</a>

</li><!-- vision li Ends -->

<li><!-- contact us li Starts -->

<a href="index.php?edit_contact_us">

<i class="fa fa-fw fa-edit"></i> Edit Contact Us Page

</a>

</li><!-- contact us li Ends -->

<li><!-- about us li Starts -->

<a href="index.php?edit_about_us">

<i class="fa fa-fw fa-edit"></i> Edit About Us Page

</a>

</li><!-- about us li Ends -->
<li><!-- Edit Css li Starts -->

<a href="index.php?edit_css">

<i class="fa fa-fw fa-list"></i> Edit Css File

</a>

</li><!-- Edit Css li Ends -->

<li><!-- li Starts -->

<a href="logout.php">

<i class="fa fa-fw fa-power-off"></i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- nav navbar-nav side-nav Ends -->

</div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php } ?>
