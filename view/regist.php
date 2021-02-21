<?php
session_start();
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
       <link rel="stylesheet" type="text/css" href="assets/css/mohamedAddEmployee.css"> 
      
     
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    <script src="assets/js/AddingEmployee.js"></script>
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
                   
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
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
       
              <!-- sidebar menu end-->
          </div>
      </aside>

   <style>
     #prof{
         border:none;
         border-radius:10px;
         width:700px;
         height:300px; 
         margin-left:70px;
         margin-top:65px;
     }
     
     #proff{
         
         border: none;
         width: 665px;
         margin-left: 75px;
         position: relative;
         bottom: 60px;
          
      }
      
       #proff2{
        border:none;  
        width:290px;
        margin-left:60px;
       
       
      }

     #in{
        margin-top:20px;
        margin-left:300px;
      }

     .in2{
       width: 751px;
      margin-left: 40px;
        
      }
       
     .in3{
         width: 751px;
   
    position: relative;
    left: -24px;

      }
       
     #info{
            float: right;
         
         background-color:#424a5d;
         color:white;
         border-radius:3px;
         border:1px solid #424a5d;
         width:150px;
         font-size:20px;
        
       }
   </style>
      <!--sidebar end-->
      
      <!--
   **********************************************************************************************************************************************************
    
  MAIN CONTENT
   
        *********************************************************************************************************************************************************** -->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                    <h2 id="in"> Create an account </h2> 
                   <hr class="in2">
                  <div id="prof">
                      <form  method="post" name="FirstForm" action="../controller/RegistController.php" onsubmit="alert('Thanks for Subscribing');">
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
                        
                        
                     
                        
                        <label style="font-size: 20px" for="Firstname"  class="top">City: </label>  
                        <input type="text" name="city"id="Firstname" title="please enter your City" placeholder="City" autofocus required class="Input" pattern="[A-Za-z]{2,10}">
                        
                        
                        <label style="font-size: 20px" for="Firstname"  class="top">Nationality: </label>  
                        <input type="text" name="nationality"id="Firstname" title="please enter your Nationality" placeholder="Nationality" autofocus required class="Input" pattern="[A-Za-z]{2,10}">
                        
                        
                       
                         <label style="font-size: 20px" for="Gender" class="top"> Guest Type : </label>  
                         
                       <label style="font-size: 20px" for="si"class="topAd" > foreign </label>
                       <input type="radio" id="ma"  class="radio2" name="guest" value="foreignguist">
                
                        
                        <label style="font-size: 20px" for="su" class="topAdw"> local </label>
                        <input type="radio" class="radio2" name="guest" id="fa" value="localguest"><br>
                       
                        
                     </div>
                        <hr class="in3">  
                         <div>
                             <input id="info" type="submit" name="submit" value="Create">		
                        <input id="info" style="margin-right: 50px;" name ="reset" type="reset" value=" Reset ">	  
                      </div>
                             </form>
                  
                   			
                  </div>
                      </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
		

                     
						
                  
                     
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
              <a href="regist.php#" class="go-top">
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
