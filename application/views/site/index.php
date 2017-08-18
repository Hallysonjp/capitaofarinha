<!DOCTYPE html>  
<html lang="en">
   <head>
      <title><?php 
         if(isset($site_settings->site_title) && $site_settings->site_title != "") {
         	echo $site_settings->site_title;
         } 
         else
         {
         	echo "Digi Restaurant";
         }?></title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/front-style.css">
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
     <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>-->
   </head>
   <body>
      <!--home start-->
      <div id="home">
         <div class="headerLine">
            <div id="menuF" class="default">
               <div class="container">
                  <div class="row">
                     <div class="logo col-md-4">
                        <div>
                           <a href="#">
                           <img src="<?php echo base_url();?>uploads/site_logo/<?php if(isset($site_settings->site_logo)) echo $site_settings->site_logo;?>">
                           </a>
                        </div>
                     </div>
                     <div class="col-md-8">
                        <div class="navmenu"style="text-align: center;">
                           <ul id="menu">
                            <li class="last"><a href="<?php echo base_url().URL_LOGIN; ?>">
							<i class="fa fa-lock"></i> 
							<?php if(isset($this->phrases['login'])) echo $this->phrases['login'];
							  ?></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
			   
                  <div class="we">
				  
					 <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
                     <h2><?php if(isset($site_settings->site_name)) echo $site_settings->site_name;?></h2>
                     <a href="<?php if(isset($site_settings->android_url)) echo $site_settings->android_url;?>">
                     <img src="<?php echo base_url(); ?>assets/images/android.png"></a>  
                     <a href="<?php if(isset($site_settings->ios_url)) echo $site_settings->ios_url;?>">
                     <img src="<?php echo base_url(); ?>assets/images/appleios.png"></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>