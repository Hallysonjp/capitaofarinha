<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <?php if(isset($this->phrases['master settings'])) echo $this->phrases['master settings'];?>  &gt;  <?php if(isset($this->phrases['app settings'])) echo $this->phrases['app settings'];?> 
   </div>
</div>
<div class="col-md-10">
<div class="admin-body">
<div class="inner-elements">
   <div class="panel">
      <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
      <div class="panel-heading ele-hea"> 
         <?php if(isset($this->phrases['app settings'])) echo $this->phrases['app settings']?> 
      </div>
      <div class="panel-body paddig">
         <div class="inner-pages-forms">
            <div class="col-md-12">
               <?php $attributes = array('name'=>'site_setting_form','id'=>'site_setting_form');
                  echo form_open_multipart(URL_SITE_SETTINGS,$attributes) ?>
               <div class="col-md-6">
                  <div class="form-group">
                     <label><?php if(isset($this->phrases['site title'])) echo $this->phrases['site title'];?> <span style="color:red;">*</span></label>     
                     <?php echo form_input('site_title',set_value('site_title',$site_settings->site_title)); ?>
                     <?php echo form_error('site_title');?>
                  </div>
                  <div class="form-group">
                     <label><?php if(isset($this->phrases['site name'])) echo $this->phrases['site name'];?> <span style="color:red;">*</span></label> 
                     <?php echo form_input('sitename',set_value('sitename',$site_settings->site_name)); ?>	
                     <?php echo form_error('sitename');?>
                  </div>
                  <div class="form-group">  
                     <label><?php if(isset($this->phrases['address'])) echo $this->phrases['address'];?> <span style="color:red;">*</span></label> 
                     <?php echo form_input('address',set_value('address',$site_settings->address)); ?>	
                     <?php echo form_error('address');?>
                  </div>
                  <div class="form-group">  
                     <label><?php if(isset($this->phrases['city'])) echo $this->phrases['city'];?> <span style="color:red;">*</span></label>
                     <?php echo form_input('city',set_value('city',$site_settings->city)); ?>	
                     <?php echo form_error('city');?>
                  </div>
                  <div class="form-group">  
                     <label><?php if(isset($this->phrases['state'])) echo $this->phrases['state'];?> <span style="color:red;">*</span></label>
                     <?php echo form_input('state',set_value('state',$site_settings->state)); ?>	
                     <?php echo form_error('state');?>				  
                  </div>
                  <div class="form-group">  
                     <label><?php if(isset($this->phrases['country'])) echo $this->phrases['country'];?> <span style="color:red;">*</span></label>					
                     <?php echo form_input('country',set_value('country',$site_settings->country)); ?>	
                     <?php echo form_error('country');?>
                  </div>
                  <div class="form-group">
                     <label><?php if(isset($this->phrases['zip code'])) echo $this->phrases['zip code'];?> <span style="color:red;">*</span></label>
                     <?php echo form_input('zip',set_value('zip',$site_settings->zip)); ?>		
                     <?php echo form_error('zip');?>
                  </div>
                  <div class="form-group">   
                     <label><?php if(isset($this->phrases['latitude'])) echo $this->phrases['latitude'];?> <span style="color:red;">*</span></label> 				
                     <?php echo form_input('latitude',set_value('latitude',$site_settings->latitude)); ?>
                     <?php echo form_error('latitude');?>
                  </div>
                  <div class="form-group">   
                     <label><?php if(isset($this->phrases['longitude'])) echo $this->phrases['longitude'];?>  <span style="color:red;">*</span></label>
                     <?php echo form_input('longitude',set_value('longitude',$site_settings->longitude)); ?>	
                     <?php echo form_error('longitude');?>
                  </div>
				  <div class="form-group">   
                     <label><?php if(isset($this->phrases['ios url'])) echo $this->phrases['ios url'];?>  <span style="color:red;">*</span></label>
                     <?php echo form_input('ios_url',set_value('ios_url',$site_settings->ios_url)); ?>	
                     <?php echo form_error('ios_url');?>
                  </div>
				  <div class="form-group">   
                     <label><?php if(isset($this->phrases['android url'])) echo $this->phrases['android url'];?>  <span style="color:red;">*</span></label>
                     <?php echo form_input('android_url',set_value('android_url',$site_settings->android_url)); ?>	
                     <?php echo form_error('android_url');?>
                  </div>
				  
				  <div class="form-group">   
                     <label><?php if(isset($this->phrases['facebook api'])) echo $this->phrases['facebook api'];?> </label>
                     <?php echo form_input('facebook_api',set_value('facebook_api',$site_settings->facebook_api)); ?>	
                     <?php echo form_error('facebook_api');?>
                  </div>
				  
				  <div class="form-group">   
                     <label><?php if(isset($this->phrases['google api'])) echo $this->phrases['google api'];?> </label>
                     <?php echo form_input('google_api',set_value('google_api',$site_settings->google_api)); ?>	
                     <?php echo form_error('google_api');?>
                  </div>
                  
                  
               </div>
               <!--another div-->
               <div class="col-md-6">
			   <div class="form-group">   
                     <label><?php if(isset($this->phrases['phone'])) echo $this->phrases['phone'];?> <span style="color:red;">*</span></label> 				
                     <?php echo form_input('phone',set_value('phone',$site_settings->phone)); ?>
                     <?php echo form_error('phone');?>
                  </div>
                  <div class="form-group">   
                     <label><?php if(isset($this->phrases['land line'])) echo $this->phrases['land line'];?>  <span style="color:red;">*</span></label>
                     <?php echo form_input('land_line',set_value('land_line',$site_settings->land_line)); ?>	
                     <?php echo form_error('land_line');?>
                  </div>
			   <div class="form-group">                    
                     <label><?php if(isset($this->phrases['fax'])) echo $this->phrases['fax'];?> <span style="color:red;">*</span></label>
                     <?php echo form_input('fax',set_value('fax',$site_settings->fax)); ?>	
                     <?php echo form_error('fax');?>
                  </div>
			   <div class="form-group">   
                     <label><?php if(isset($this->phrases['contact email'])) echo $this->phrases['contact email'];?> <span style="color:red;">*</span></label>
                     <?php echo form_input('portal_email',set_value('portal_email',$site_settings->portal_email)); ?>	
                     <?php echo form_error('portal_email');?>				  
                  </div>
                  <div class="form-group">            
                     <label><?php if(isset($this->phrases['select language'])) echo $this->phrases['select language'];?> <span style="color:red;">*</span></label>
                     <?php 					 
                        $select = array();
                          if(isset($site_settings->language_id)) {
                          	$select = array(								
                          					$site_settings->language_id		
                          					);
                          
                          }	
                        echo form_dropdown('language_id',$lang_options,$select,'class = "chzn-select"').form_error('language_id'); 
                        ?> 
                  </div>
                  <div class="form-group">
                     <label><?php if(isset($this->phrases['currency'])) echo $this->phrases['currency'];?> <span style="color:red;">*</span></label>
                     <?php 
                        
                          	if(isset($site_settings->currency)) {
                                  	$selectd = array(
                                  					$site_settings->currency		
                                  					);
                                
                                  }	
                          	echo form_dropdown('currency',$currency_options,$selectd,'class = "chzn-select"'); ?>
                  </div>
                  <div class="form-group">
                     <label><?php if(isset($this->phrases['currency symbol'])) echo $this->phrases['currency symbol'];?> <span style="color:red;">*</span></label>
                     <?php echo form_input('currency_symbol',set_value('currency_symbol',$site_settings->currency_symbol)); ?>
                  </div>
                  <div class="form-group">
                     <label><?php if(isset($this->phrases['restaurent timings'])) echo $this->phrases['restaurent timings'];?> <span style="color:red;">*</span></label>
                     <div id="datetimepicker" class="col-md-6 input-append date" >
                     <small><?php if(isset($this->phrases['from'])) echo $this->phrases['from'];?></small>
      					<?php 
				        echo form_input('from_time',set_value('from_time',$site_settings->from_time),'data-format="hh:mm"');
				      ?>
						<span class="add-on">
				        <i class="fa fa-clock-o"></i>
				        </span>
				    </div>
				    <div id="datetimepickerto" class="col-md-6 input-append date">
				    <small><?php if(isset($this->phrases['to'])) echo $this->phrases['to'];?></small>
				      <?php 
				        echo form_input('to_time',set_value('to_time',$site_settings->to_time),'data-format="hh:mm"');
				      ?>
      					<span class="add-on">
				        <i class="fa fa-clock-o"></i>
				        </span>
				    </div>
                  </div>
				  <div class="form-group"> 
                     <label><?php if(isset($this->phrases['design by'])) echo $this->phrases['design by'];?><span style="color:red;">*</span></label>
                     <?php echo form_input('design_by',set_value('design_by',$site_settings->design_by)); ?>	
                     <?php echo form_error('design_by');?>
                  </div>
                  <div class="form-group">   
                     <label><?php if(isset($this->phrases['rights reserved'])) echo $this->phrases['rights reserved'];?> <span style="color:red;">*</span></label>
                     <?php echo form_input('rights_reserved_content',set_value('rights_reserved_content',$site_settings->rights_reserved_content)); ?>					 
                     <?php echo form_error('rights_reserved_content');?>                 
                  </div>
                  <div class="form-group">
                     <label> <?php if(isset($this->phrases['site logo'])) echo $this->phrases['site logo']?></label>
                     <input name="userfile" type="file" id="image" title="site Logo"  onchange="readURL(this)">
                     <br/>
                     <?php 
                        $src = "";
                        $style="display:none;";
                        
                        if(isset($site_settings->site_logo) && $site_settings->site_logo != "") 							{
                        $src = base_url()."uploads/site_logo/".$site_settings->site_logo;
                        	$style="";
                        
                        }
                        ?>
                     <img id="site_logo" src="<?php echo $src;?>" height="120" style="<?php echo $style;?>" />     
                  </div>
                  
                  <?php echo form_hidden('update_record_id',set_value('update_record_id',$site_settings->id)); ?>
                  <div class="buttos">
                     <?php echo form_submit('update',$this->phrases['update'],'class="butto"')?>
                  </div>
               </div>
               <?php echo form_close();?>     
            </div>
         </div>
      </div>
   </div>
</div>
<!--	Validations	-->

    <link rel="stylesheet" type="text/css" media="screen"
     href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js">
</script>
   
    <script type="text/javascript">
      $('#datetimepicker,#datetimepickerto').datetimepicker({
       pickDate: false,
       pick12HourFormat:true,
       pickSeconds: false
      });
    </script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript"> 
   (function($, W, D) {
     var JQUERY4U = {};
     JQUERY4U.UTIL = {
             setupFormValidation: function() {
                 //Additional Methods			
                 $.validator.addMethod("phoneNumber", function(uid, element) {
                     return (this.optional(element) || uid.match(/^([0-9]*)$/));
                 }, "<?php echo $this->lang->line('valid_phone_number');?>");
                 $.validator.addMethod("Fax", function(uid, element) {
                     return (this.optional(element) || uid.match(/^\+?[0-9]{6,}$/));
                 }, "Please enter valid fax.");
   
   $.validator.addMethod("numbersOnly", function(uid, element) {
   			return (this.optional(element) || uid.match(/^([0-9]*)$/));
   		},"<?php echo $this->lang->line('valid_numbers');?>");
   
   
                 //form validation rules
                 $("#site_setting_form").validate({
   		  ignore: " ",
                     rules: {
						site_title: {
                             required: true
                         },
                         sitename: {
                             required: true
                         },
                         address: {
                             required: true
                         },
                         city: {
                             required: true
                         },
                         state: {
                             required: true
                         },
                         country: {
                             required: true
                         },
                         zip: {
                             required: true
                         },
                         phone: {
                             required: true,
                             phoneNumber: true,
                             rangelength: [10, 11]
                         },
						land_line :{
							required: true
							
						},
						latitude:{
							required:true
						},
						longitude:{
							required:true
						},
                         fax: {
                             required: true
   				 
                         },
                         portal_email: {
                             required: true,
							 email: true
                         },
                        language_id: {
                             required: true
                         },
						 currency:{
							required:true 
						 },
                		currency_symbol:{
							required:true
						},
                         design_by: {
                             required: true
                         },
                         rights_reserved_content: {
                             required: true
                         },
						 android_url:{
							 required:true,
							 url:true
						 },
						ios_url:{
							 required:true,
							 url:true
						 },
						 from_time:{
						 	required:true
						 },
						 to_time:{
						 	required:true
						 }	
                     },
                     messages: {
						site_title: {
                             required: "<?php if(isset($this->phrases['site title'])) echo $this->phrases['site title'].' '.$this->phrases['required'];?>"
                         },
                         sitename: {
                             required: "<?php if(isset($this->phrases['site name'])) echo $this->phrases['site name'].' '.$this->phrases['required'];?>"
                         },
                         address: {
                             required: "<?php if(isset($this->phrases['address'])) echo $this->phrases['address'].' '.$this->phrases['required'];?>"
                         },
                         city: {
                             required: "<?php if(isset($this->phrases['city'])) echo $this->phrases['city'].' '.$this->phrases['required'];?>"
                         },
                         state: {
                             required: "<?php if(isset($this->phrases['state'])) echo $this->phrases['state'].' '.$this->phrases['required'];?>"
                         },
                         country: {
                             required: "<?php if(isset($this->phrases['country'])) echo $this->phrases['country'].' '.$this->phrases['required'];?>"
                         },
                         zip: {
                             required: "<?php if(isset($this->phrases['zip code'])) echo $this->phrases['zip code'].' '.$this->phrases['required'];?>"
                         },
                         phone: {
                             required: "<?php if(isset($this->phrases['phone'])) echo $this->phrases['phone'].' '.$this->phrases['required'];?>"
                         },
						 land_line: {
							 required: "<?php if(isset($this->phrases['land line'])) echo $this->phrases['land line'].' '.$this->phrases['required'];?>"
						 },
						 latitude:{
							required: "<?php if(isset($this->phrases['latitude'])) echo $this->phrases['latitude'].' '.$this->phrases['required'];?>" 
						 },
						 longitude:{
							required: "<?php if(isset($this->phrases['longitude'])) echo $this->phrases['longitude'].' '.$this->phrases['required'];?>" 
						 },
						 fax :{
							 required: "<?php if(isset($this->phrases['fax'])) echo $this->phrases['fax'].' '.$this->phrases['required'];?>"
						 },
                         portal_email: {
                             required: "<?php if(isset($this->phrases['contact email'])) echo $this->phrases['contact email'].' '.$this->phrases['required'];?>"
                         },
                        language_id: {
                             required: "<?php if(isset($this->phrases['language'])) echo $this->phrases['language'].' '.$this->phrases['required'];?>"
                         },
						 currency:{
							 required: "<?php if(isset($this->phrases['currency'])) echo $this->phrases['currency'].' '.$this->phrases['required'];?>"
						 },
                         currency_symbol:{
							required: "<?php if(isset($this->phrases['currency symbol'])) echo $this->phrases['currency symbol'].' '.$this->phrases['required'];?>"
						 },
                         design_by: {
                             required: "<?php if(isset($this->phrases['design by'])) echo $this->phrases['design by'].' '.$this->phrases['required'];?>"
                         },
                         rights_reserved_content: {
                             required: "<?php if(isset($this->phrases['rights reserved'])) echo $this->phrases['rights reserved'].' '.$this->phrases['required'];?>"
                         },
                         from_time:{
						 	required:"<?php if(isset($this->phrases['from time'])) echo $this->phrases['from time'].' '.$this->phrases['required'];?>"
						 },
						  to_time:{
						 	required:"<?php if(isset($this->phrases['to time'])) echo $this->phrases['to time'].' '.$this->phrases['required'];?>"
						 }
                     },
                     submitHandler: function(form) {
                         form.submit();
                     }
                 });
             }
         }
         //when the dom has loaded setup form validation rules
     $(D).ready(function($) {
         JQUERY4U.UTIL.setupFormValidation();
     });
   })(jQuery, window, document);
   
      
   function readURL(input) {
   
        if (input.files && input.files[0]) {
            var reader = new FileReader();
   
            reader.onload = function (e) {
   
                input.style.width = '100%';
   	$('#site_logo')
                    .attr('src', e.target.result);
   	$('#site_logo').fadeIn();
            };
   
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
