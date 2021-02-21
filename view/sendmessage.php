<?php 
session_start();
include_once '../models/guest.php';
include_once '../models/User.php'; 
include_once '../models/Sys.php';
/*if(!isset( $_SESSION['username']))
{
    include 'Login.php';
    die();
}*/
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Hotel</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css"> 
    <link rel="stylesheet" type="text/css" href="assets/lineicons/medo.css">   
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>Hotel</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme">1</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">Your Room Number</p>
                            </li>
                            
                           
                           
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Room Number</div>
                                        <br>
                                        <br>
                                        <?php if(isset($_SESSION['roomnumber'])){
                      echo $_SESSION['roomnumber']; 
                      }
                      ?>
                                    </div>
                                    
                                </a>
                            </li>
                            <li class="external">
                                <a href="#">Please submit room before time ended</a>
                                <br>
                                <br>
                                <br>
                                
                                <form action="../controller/submitroomcontroller.php" method="post">  
                                    <input style="background-color:white" type="submit" name="submit" value="Submit"> 
                                </form>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span value="put" name="submit" type="submit" class="badge bg-theme">
                                <?php
                                 $guest = new guest();
                                 $user = new User();
                                 $idsender1 = $guest->get_id_of_user($_SESSION['username']);
       
                                 $num =  $user->numofmessage($idsender1);
                              
                                echo $num; 
                                ?> </span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have <?php
                                 $guest = new guest();
                                 $user = new User();
                                 $idsender1 = $guest->get_id_of_user($_SESSION['username']);
       
                                 $num =  $user->numofmessage($idsender1);
                              
                                echo $num; 
                                ?> new messages</p>
                            </li>
                            <li>
                                <a href="../view/index4.php">
                                              <?php
                                          $object = new database();
  $mes = new message();
  $idsender1 = $guest->get_id_of_user($_SESSION['username']);
  $query = "SELECT * FROM `message` WHERE receiver_id = '$idsender1' AND state_id = '4'";
  $result = $object->query($query);
       
        while ($assoc = $object->query_associ($result))
        {
           $mes->ID = $assoc['ID']; 
           $mes->sender_id = $assoc['sender_id']; 
           $mes->receiver_id = $assoc['receiver_id']; 
           $mes->content = $assoc['content']; 
           $mes->date_id = $assoc['date_id']; 
           $mes->state_id = $assoc['state_id']; 
           $mes->time = $assoc['time']; 
           
           $fname = new Sys();
           $name = $fname->get_name_of_user_by_id($mes->sender_id);
           
           echo '<span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>';
           echo '<span class="subject">';
           echo  '<span class="from">'.$name.'</span>';
           echo '<span class="time">'.$mes->time.'</span>';
           echo '<span class="message">'.$mes->content.'</span>';
           echo '</span>';
           
           echo '<br>';
           echo '<form action="../controller/updatestatecontroller.php" method="post">  
                                    <input style="background-color:white" type="submit" name="submit" value="Replay"> 
                                </form>';
        
         echo '<hr>';
        }
        
                                        ?>
                                </a>
                            </li>
                           
                             </form>
                            
                            <li>
                                <a ></a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../controller/logoutcontroller.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">
                      <?php if(isset($_SESSION['F&Lname'])){
                      echo $_SESSION['F&Lname']; 
                      }
                      ?>
                  </h5>
              	  	
                  <li class="mt">
                      <a href="../view/profileguest.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Profile Page</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Working</span>
                      </a>
                      <ul class="sub">
                            <li><a  href="../view/registroom.php">Adding</a></li>
                           
                      </ul> 
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Quality</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#">Branch</a></li>
                          <li class="active"><a  href="#">Service</a></li>
                          
                          
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Sending Message</span>
                      </a>
                      <ul class="sub">
                          <form method="post" action="../controller/mtomcontroller.php">
                              <br><li><input style="background-color:#ccc " name="submit" type="submit" value="Receptionist" ></input></li><br>
                              <li><input type="submit" name="submit" value="Service"  ></input></li><br>
                              <li><input type="submit" name="submit" value="Guest" ></input></li><br>
                          </form>
                      </ul>
                  </li>
                
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                      
                      <h2 id="sen" style="margin-left:220px;"> Sending Message To <?php if(isset($_SESSION['reception'])){
                      echo $_SESSION['reception']; 
                      }
                      ?> </h2>
         <hr class="dd">
         <form id="tab" action="../controller/messagecontroller.php" method="post">
<br><label id="eee" > Username: <input class="la" type="text" name="user" placeholder="Username"/></label></br></br>
<textarea style="width:370px" id="laa" class="la" name="message" cols="65" rows="15" ></textarea></br><br>
<input style="color:black" class="se" name="submit" type="submit" value="Send"/>



</form>
			
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                   <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3>Receptionist's Email</h3>
                                        
                      <!-- First Action -->
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                            <?php
                             $query1 = "SELECT ID FROM `usertype` WHERE type = 'Receptionist'";
                             $result1 = $object->query($query1);
                             $related1 = $object->query_associ($result1);
                             $typeid = $related1['ID'];
                             $query2 = "SELECT * FROM `user` WHERE type_id = '$typeid'";
                             $result2 = $object->query($query2);
       
        while ($assoc = $object->query_associ($result2))
        {
                            echo '<p style="font-size: 20px"> Hey Sir</p> ';
                            echo '<p style="font-size: 12px">If You Need Any Things Please Contact Me On This Email By Sending Message</p>';
                            echo '<p style="font-size: 17px ;color:blue" href="#">'.$assoc['username'].'</p> ';
                            echo '<hr>';
                    
        }
                            ?>
                      	</div>
                      </div>
                    
                     
                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                      
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              FCIH_2014 TEAM
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	
	
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>