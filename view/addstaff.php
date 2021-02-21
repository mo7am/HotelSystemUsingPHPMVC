<?php 
session_start();
include_once '../models/guest.php';
include_once '../models/User.php'; 
include_once '../models/database.php';
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
                            <span class="badge bg-theme">
                                
                                <?php if(isset($_SESSION['cleanroom'])){
                      echo $_SESSION['cleanroom']; 
                      }
                      ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">There Is <?php if(isset($_SESSION['cleanroom'])){
                      echo $_SESSION['cleanroom']; 
                      }
                      ?> Room Need To Clean </p>
                            </li>
                            
                            <?php
                            $object = new database();
   $c_date = new DateTime();
      $c_date->modify('-0 day');
       $date = $c_date->format('Y-m-d');
      
   $query = "SELECT roomnum FROM room  JOIN userroom ON room.ID=userroom.room_id  JOIN guist ON userroom.user_id=guist.user_id  WHERE checkoutdate = '$date'";
        
        $result = $object->query($query);
        while($row = $object->query_associ($result)){
            $roomnum =  $row['roomnum'];
              
                 echo '<li>';
                 echo '<a href="#">';
                 echo '<div class="task-info">';
                 echo 'The Room Number'.' '.$roomnum.' '.' Need To CLean ';
                 echo '<br>';
                 echo '<br>';
                
                echo '</div>';
                 echo '</a>';
                 echo ' </li>';
             }
             
        
                            ?>
           
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
                                <a href="../view/index2.php">
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
           echo '<form action="../controller/updatestatemanagercontroller.php" method="post">  
                                    <input style="background-color:white" type="submit" name="submit" value="Replay"> 
                                </form>';
        
         echo '<hr>';
        }
        
                                        ?>
                                </a>
                            </li>
                           
                             
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
                      <a href="../view/profilemanager.php">
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
                          <li><a  href="../view/addstaff.php">Adding</a></li>
                           <li><a  href="../view/searchstaff.php">Searching</a></li>
                           
                          
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
                          <li><a  href="#">Technical</a></li>
                          
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Sending Message</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="../view/sendmessagemanager.php">Receptionist</a></li>
                          <li><a  href="../view/sendmessagemanager.php">Service</a></li>
                          <li><a  href="../view/sendmessagemanager.php">Guest</a></li>
                      </ul>
                  </li>
                  
                
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

      <!--sidebar end-->

      <!--
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  	 <h2 style="margin-left:180px " id="in"> Add New Actor Information </h2> 
                   <hr class="in2">
                  <div id="prof">
                      <form  method="post" name="FirstForm" action="../controller/addstaffcontroller.php" onsubmit="alert('Thanks for Adding');">
                    <div  id="proff"> 
                       
                        <label style="font-size: 20px" for="Firstname"  class="top">First Name: </label>  
                        <input type="text" name="FirstName"id="Firstname" title="please enter your First name" placeholder="First Name" autofocus required class="Input" pattern="[A-Za-z]{2,10}">
                        
                       <label style="font-size: 20px" for="Lastname" class="top" >Last Name :  </label>  
                        <input type="text" id="Lastname" name="Lastname" placeholder="Last Name" title="please enter your Last name"  required class="Input" pattern="[A-Za-z ]{3,}">
                        
                        <label style="font-size: 20px"class="top" for="Email" >Email : </label>  
                        <input  type="email" id="Email" name="Email"placeholder="Email"  required class="Input" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  title="please enter email">
                    
                           <label style="font-size: 20px" for="pass" class="top">Password : </label>  
                        <input name="password" required type="text" autofocus required class="Input" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="pass" placeholder="password to you" class="Input" value="2016Qwee" title="should be at least one number, one lowercase and one uppercase letter
    and  at least 8 characters">
                        <br><br><br>
                        
                          
                             <select name="staff" style="font-size: 20px;width:550px">
                                 
                               
                                  <option  value="Receptionist">Receptionist</option>
                                  <option  value="Housekeaping">Housekeeping</option>
                                 
                             </select> 
                        <br><br>
                        <label style="font-size: 20px" for="ssn"  class="top">Ssn: </label>  
                        <input type="text" name="ssn"id="Firstname" title="please enter your ssn" placeholder="ssn" autofocus required class="Input" pattern="{14}">
                        
                        
                         <label style="font-size: 20px" for="Firstname"  class="top">Salary: </label>  
                        <input style="color:black" value="" type="text" name="salary"id="Firstname" title="please enter your salary" placeholder="salary" autofocus required class="Input" pattern="{2,10}"/>
                       
                        <label style="font-size: 20px" for="Firstname"  class="top">Age: </label>  
                        <input value="" type="text" name="Age"id="Firstname" title="please enter your age" placeholder="age" autofocus required class="Input" pattern="{2,10}">
                     
                        <label style="font-size: 20px" class="top"for="BD" >Birth date : </label>  
                         <input value="" name="Birthdate" type="date" title="please enter your birthdate" id="BD" autofocus required class="Input" class="Input" placeholder="yyyy-mm-dd" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" >
                  
                         <label style="font-size: 20px" for="Firstname"  class="top">Work Hours: </label>  
                        <input style="color:black" value=" " type="text" name="workhours"id="Firstname" title="please enter your workhours" placeholder="workhours" autofocus required class="Input" pattern="{2,10}"/>
                     
                    
                     </div>
                        <hr class="in3">  
                         <div>
                             <input id="info" type="submit" name="submit" value="Create">		
                        <input id="info" style="margin-right: 50px;" name ="reset" type="reset" value=" Reset ">	  
                      </div>
                             </form>
                  
                   			
                  
                      </div><!-- /col-lg-9 END SECTION MIDDLE -->
                      <div class="row mt">
                      <!-- SERVER STATUS PANELS -->
                      	<div class="col-md-4 col-sm-4 mb">
                      		
                      			
								<script>
									var doughnutData = [
											{
												value: 70,
												color:"#68dff0"
											},
											{
												value : 30,
												color : "#fdfdfd"
											}
										];
										var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
								</script>
	                      
                      	</div><!-- /col-md-4-->
                      	

                      	<div class="col-md-4 col-sm-4 mb">
                      		
                      	</div><!-- /col-md-4 -->
                      	
						<div class="col-md-4 mb">
							<!-- WHITE PANEL - TOP USER -->
							
						</div><!-- /col-md-4 -->
                      	

                    </div><!-- /row -->
                    
                    				
				
					
					<div class="row mt">
                      <!--CUSTOM CHART START -->
                      <div class="border-head">
                          <h3>VISITS</h3>
                      </div>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span>10.000</span></li>
                              <li><span>8.000</span></li>
                              <li><span>6.000</span></li>
                              <li><span>4.000</span></li>
                              <li><span>2.000</span></li>
                              <li><span>0</span></li>
                          </ul>
                          <div class="bar">
                              <div class="title">JAN</div>
                              <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">FEB</div>
                              <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">MAR</div>
                              <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">APR</div>
                              <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
                          </div>
                          <div class="bar">
                              <div class="title">MAY</div>
                              <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">JUN</div>
                              <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                          </div>
                          <div class="bar">
                              <div class="title">JUL</div>
                              <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                      </div>
                      <!--custom chart end-->
					</div><!-- /row -->	
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3>Receptionist & Housekeaping Email</h3>
                                        
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
                      <!-- Second Action -->
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                      		<?php
                             $query3 = "SELECT ID FROM `usertype` WHERE type = 'Housekeaping'";
                             $result3 = $object->query($query3);
                             $related3 = $object->query_associ($result3);
                             $typeid3 = $related3['ID'];
                             $query4 = "SELECT * FROM `user` WHERE type_id = '$typeid3'";
                             $result4 = $object->query($query4);
       
        while ($assoc = $object->query_associ($result4))
        {
                            echo '<p style="font-size: 20px"> Housekeaping Email</p> ';
                            echo '<p style="font-size: 12px">' .'Hey Sir My Name is : '.'<p style ="color:blue ">'.$assoc['Fname'].' '.$assoc['Lname'].'</p>'.' '.'Contact Me On This Email By Sending Message'.'</p>';
                            echo '<p style="font-size: 15px ;color:blue" href="#">'.$assoc['username'].'</p> ';
                            echo '<hr>';
                    
        }
                            ?>
                      	</div>
                      </div>
                      <!-- Third Action -->
                     
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
              2017 - Mohamed Salah
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
