<div class="col-md-10 paddig">
   <div class="brade">      
      <a href="<?php echo base_url();?>admin" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a>
	  &gt;  <?php if(isset($this->phrases['location master'])) echo $this->phrases['location master'];?>
       &gt;<?php if(isset($title)) echo $title;?> 
      
   </div>
</div>
   <div class="col-md-10">
	<div class="admin-body">
      <div class="inner-elements">
         <div class="col-md-12">
            <div class="panel">
               <div class="panel-heading ele-hea"> <i class="fa fa-plus"></i>  <?php if(isset($title)) echo $title;?></div>
               <div class="panel-body paddig">
                  <div class="inner-pages-forms">
                     <div class="col-md-6">
					 </br>
            
            
            <?php if($param == "cities"){?>		
            <div class="form-group">       		 
               <a class="btn btn-primary" href="<?php echo base_url();?>uploads/locations/cities.xls" ><?php if(isset($this->phrases['click here to download sample file'])) echo $this->phrases['click here to download sample file'];?></a>        
            </div>
            <?php }?>          
            <?php echo $this->session->flashdata('message');?>                     
                 
            <div class="module-body">
			<?php $attributes = array('name' => 'excel_form', 'id' => 'excel_form');     
               echo form_open_multipart('location/readexcel/'.$param,$attributes);?>
               <div class="form-group">                         
                  <label><?php if(isset($this->phrases['upload excel file'])) echo $this->phrases['upload excel file'];?> </label> <span style="color:red;">*</span><br/>           <input type="file" name="userfile" />     
                  <?php echo form_error('userfile');?>            
               </div>
               <br/>              
               <input type="submit" value="Upload" class="butto" name="submit" />        <?php echo form_close();?>  
            </div>
                                         
         </div>
					</div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!--	Validations	-->

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              //Additional Methods			
   		
   		
   		
   		//form validation rules
             $("#excel_form").validate({
                 rules: {
                     userfile: {
                         required: true 
                     }
                 },
                 messages: {
                     userfile: {
                         required: "<?php if(isset($this->phrases['file'])) echo $this->phrases['file'].' '.$this->phrases['required'];?>"
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
</script>