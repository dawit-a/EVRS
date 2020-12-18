
<nav class="navbar navbar-inverse  navbar-fixed-top ">
    <!-- navbar navbar-inverse navbar-fixed-top Starts -->
    <div class="navbar-header">
        <!-- navbar-header Starts -->

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <!-- navbar-ex1-collapse Starts -->


            <span class="sr-only">Toggle Navigation</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>


        </button><!-- navbar-ex1-collapse Ends -->

        <a class="navbar-brand" href="manager.php?dashboard">Manager Panel</a>


    </div><!-- navbar-header Ends -->

    <ul class="nav navbar-right top-nav" >
        <!-- nav navbar-right top-nav Starts -->

        <li class="dropdown">
            <!-- dropdown Starts -->

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- dropdown-toggle Starts -->

                <i class="fa fa-user"></i>



                <?php echo $user_name; ?> <b class="caret"></b>


            </a><!-- dropdown-toggle Ends -->

            <ul class="dropdown-menu">
                <!-- dropdown-menu Starts -->

                <li>
                    <!-- li Starts -->

                    <a href="index.php?user_profile=<?php echo $user_id; ?>">

                        <i class="fa fa-fw fa-user"></i> Profile


                    </a>

                </li><!-- li Ends -->

                <li>
                    <!-- li Starts -->

                    <a href="index.php?view_birth_records">

                        <i class="fa fa-fw fa-envelope"></i> Birth

                        <span class="badge"><?php echo $count_birth_records; ?></span>


                    </a>

                </li><!-- li Ends -->

                <li>
                    <!-- li Starts -->

                    <a href="manager.php?view_death_records">

                        <i class="fa fa-fw fa-gear"></i> Death

                        <span class="badge"><?php echo $count_death_records; ?></span>


                    </a>

                </li><!-- li Ends -->

                <li>
                    <!-- li Starts -->

                    <a href="manager.php?view_marriage_records">

                        <i class="fa fa-fw fa-gear"></i> Marriage

                        <span class="badge"><?php echo $count_marriage_records; ?></span>


                    </a>

                </li><!-- li Ends -->

                <li class="divider"></li>

                <li>
                    <!-- li Starts -->

                    <a href="logout.php">

                        <i class="fa fa-fw fa-power-off"> </i> Log Out

                    </a>

                </li><!-- li Ends -->

            </ul><!-- dropdown-menu Ends -->




        </li><!-- dropdown Ends -->


    </ul><!-- nav navbar-right top-nav Ends -->
    <div class="  collapse navbar-collapse navbar-ex1-collapse">
        <!-- collapse navbar-collapse -->



        <div class="nav navbar-nav side-nav " style="background-color: whitesmoke;">

            <div style=" background:#f0f0f0; padding: 10px; ">
                <?php

$user_session = $_SESSION['user_email'];

$get_user = "select * from user where user_email='$user_session'";

$run_user = mysqli_query($con,$get_user);

$row_user = mysqli_fetch_array($run_user);

$user_image = $row_user['user_image'];

$user_name = $row_user['user_name'];
$user_about=$row_user['user_about'];
$user_position=$row_user['user_position'];



?>
                <hr class="dotted short">
            </div>

            <div class="">
            <!-- panel-body Starts -->

            <ul class="nav nav-tabs nav-stacked" style="background: whitesmoke;">
                <!-- nav nav-pills nav-stacked Starts -->

                <li class="<?php if(isset($_GET['dashboard'])){ echo "active"; } ?>">

                    <a href="manager.php?dashboard"> <i class="fa fa-fw fa-dashboard"> </i> Dashboard </a>

                </li>

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
                                    <a href="manager.php?register_birth">
                                        <i class="fa fa-plus"></i>
                                        Insert Birth Record </a>
                                </li>
                                <li>

                                    <a href="manager.php?view_birth_records">
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
                                    <a href="manager.php?register_marriage">
                                        <i class="fa fa-plus"></i>
                                        Insert Marriage Record </a>
                                </li>
                                <li>
                                    <a href="manager.php?view_marriage_records">
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
                                    <a href="manager.php?register_death">
                                        <i class="fa fa-plus"></i>
                                        Insert Death Record </a>
                                </li>
                                <li>
                                    <a href="manager.php?view_death_records">
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
                                    <a href="manager.php?register_divorce">
                                        <i class="fa fa-plus"></i>
                                        Insert Divorce Record </a>
                                </li>
                                <li>
                                    <a href="manager.php?view_divorce_records">
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
                            <a href="manager.php?user_report"> User report </a>
                        </li>

                        <li>
                            <a href="manager.php?reg_report"> Weakely report </a>
                        </li>


                    </ul>

                </li><!-- report li Ends -->

                <li>
                    <!--  Li Starts --->










                <li class="<?php if(isset($_GET['manager_stat'])){ echo "active"; } ?>">

                    <a href="manager.php?manager_stat"><i class="fa fa-fw fa-bar-chart"></i> Statistics </a>

                </li>

                <li>
                    <!-- li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#users">

                        <i class="fa fa-fw fa-gear"></i> Users

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="users" class="collapse nav nav-tabs  nav-stacked">

                        <li>
                            <a href="manager.php?insert_user"> Insert User </a>
                        </li>

                        <li>
                            <a href="manager.php?view_users"> View Users </a>
                        </li>

                        <li>
                            <a href="manager.php?user_profile=<?php echo $user_id; ?>"> Edit Profile </a>
                        </li>

                    </ul>

                </li><!-- li Ends -->



                <li>

                    <a href="logout.php"> <i class="fa fa-sign-out"></i> Logout </a>

                </li>


            </ul><!-- nav nav-pills nav-stacked Ends -->
            </div>
            



        </div>


    </div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->
</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->