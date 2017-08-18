<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php if(isset($title)) echo $title." : "; if(isset($site_settings->site_title)) echo $site_settings->site_title; else 
         if(isset($this->phrases['welcome to restaurant'])) 
         	echo $this->phrases['welcome to restaurant'];?></title>
      <!-- Bootstrap -->
      <link href="<?php echo base_url(); ?>assets/css/dn-admin-ui-styles.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/side-menu.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/BeatPicker.min.css" rel="stylesheet">
      <style>
         .navbar-brand {
         margin-left: 5px;
         }
         .navbar-brand.logo {
         color: #ff6c60  !important;
         }
         color {
         color: #159d96;
         }
      </style>
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <script>
      function changeLanguage(lang)
      {
      
      	if(lang > 0) {
      	
      		window.location = "<?php echo base_url().URL_CHANGE_LANGUAGE.DS;?>"+lang;
      	
      	}
      
      }
      
   </script>
   <body>
      <div class="container-fluid paddig">
         <div class="top">
            <div class="col-md-2 paddig">
               <div class="logo">
                  <?php if(isset($site_settings->site_logo) && ($site_settings->site_logo)!= ""){?>
                  <a href="<?php echo site_url();?>"><img src="<?php echo base_url().IMG_SITE_LOGO.DS;?><?php if(isset($site_settings->site_logo)) echo $site_settings->site_logo;?>" > </a>
                  <?php }else{?>
                  <a href="<?php echo base_url();?>" class="navbar-brand logo">
                     <?php if(isset($this->phrases['site title'])) echo $this->phrases['site title'];?> 
                     <color><?php if(isset($this->phrases['site name'])) echo $this->phrases['site name'];?> </color>
                  </a>
                  <?php }?>
               </div>
 
            </div>
			<div class="col-md-4">
			<h2 class="we-h">
			<?php if(isset($this->phrases['welcome'])) echo $this->phrases['welcome'];?>
			<?php echo $this->session->userdata('username'); ?>
			</h2>
			
			</div>
			<div class="col-md-3">
			<h2 class="we-h">
			<?php echo date('l, F d, Y'); ?>
			</h2>
			</div>
			   <div class="col-md-1 pull-right"> 
                  <?php

				$languages = $this->base_model->fetch_records_from(TBL_LANGUAGES, array('status' => 'Active'));
							
				foreach($languages as $lang) {
					$langOptions[$lang->id]	=	ucfirst($lang->lang_name); 
				}

				echo form_dropdown('language', $langOptions, $site_settings->language_id, 'class="chzn-select lan" id="language" onchange="changeLanguage(this.value)"');
 
				?>
               </div>
            <div class="col-md-2 pull-right">
			
 			 <ul class="nav navbar-top-links navbar-right top-nav">
                  <!-- /.dropdown -->
                  <li class="dropdown">
                     <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false"> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i> </a>
                     <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url().URL_PROFILE; ?>"><i class="fa fa-user fa-fw"></i> <?php if(isset($this->phrases['profile'])) echo $this->phrases['profile'];?></a> </li>
                        <li><a href="<?php echo base_url().URL_CHANGE_PASSWORD; ?>"><i class="fa fa-gear fa-fw"></i> <?php if(isset($this->phrases['change password'])) echo $this->phrases['change password'];?></a> </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url().URL_LOGOUT; ?>"><i class="fa fa-sign-out fa-fw"></i> <?php if(isset($this->phrases['logout'])) echo $this->phrases['logout'];?></a> </li>
                     </ul>
                     <!-- /.dropdown-user --> 
                  </li>
                  <!-- /.dropdown -->
               </ul>
            </div>
         </div>
      </div> 
      <!-- Body -->
      <div class="container-fluid paddig">
      <div class="col-md-2 paddig">