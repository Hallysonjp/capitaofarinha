<div class="col-md-10 paddig">
   <div class="brade">
       <a href="<?php echo base_url();?>admin" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a>
	  &gt;  <?php if(isset($this->phrases['location master'])) echo $this->phrases['location master'];?>	  
      &gt; <a href="<?php echo base_url();?>location/cities" style="text-decoration:none;"><?php if(isset($this->phrases['cities'])) echo $this->phrases['cities'];?></a> &gt;<?php if(isset($title)) echo $title;?> 
   </div>
</div>

   <div class="col-md-10">
	<div class="admin-body">
      <div class="inner-elements">
      <h3><?php if(isset($title)) echo $title;?></h3>
         <div class="col-md-12">
            <div class="panel">
               <div class="panel-heading ele-hea">  <?php if(isset($title)) echo $title;?>
				<?php 
					if(!isset($city_rec->city_id) ) {?>
				<i class="fa fa-plus"></i>
				<?php } ?>
			   </div>
			   
               <div class="panel-body paddig">
                  <div class="inner-pages-forms">
                     <div class="col-md-6">
					 <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
                  <?php $attributes = array('name'=>'add_city_form','id'=>'add_city_form');
                     echo form_open(URL_CITIES.DS.$operation,$attributes) ?>
                  
                  <input type="hidden" name="state" id="state" value="<?php if(isset($city_rec->state_id)) echo $city_rec->state_id;?>"> 	
                  <div class="form-group">
                     <label> <?php if(isset($this->phrases['city name'])) echo $this->phrases['city name'];?> <span style="color:red;">*</span></label>
                     <input type="text" name="city_name" value="<?php if(isset($city_rec->city_name) && $city_rec->city_name != "") echo $city_rec->city_name;?>"/>
                     <?php echo form_error('city_name'); ?>
                  </div>
                  <div class="form-group">
                     <label> <?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?> <span style="color:red;">*</span></label>
                     <?php 
					    $options = array(
						 'Active'  => (isset($this->phrases['active'])) ? $this->phrases['active'] : 'Active',
						  'Inactive'    => (isset($this->phrases['inactive'])) ? $this->phrases['inactive'] : 'Active'
						  );
                        
                          $select = array();
                        if(isset($city_rec->status)) {
                        $select = array(								
                        $city_rec->status		
                        );					  			
                        }
                        
                        echo form_dropdown('status', $options,$select,'class="chzn-select"'); ?>
                     <?php echo form_error('status'); ?>
                  </div>
                  <div class="form-group">
                     <?php 
                        if(isset($city_rec->city_id) ) {?>
                     <input type="hidden" name="update_rec_id" value="<?php if(isset($city_rec->city_id)) echo $city_rec->city_id;?>"/>
                     <div class="buttos">
                       <button type="submit" class="butto" name="submit" value="Update"><?php if(isset($this->phrases['update'])) echo $this->phrases['update'];?></button>
						
                     </div>
                     <?php }
                        else { ?>
                     <div class="buttos">
						<button type="submit" class="butto" name="submit" value="Add"><i class="fa fa-plus"></i> <?php if(isset($this->phrases['add'])) echo $this->phrases['add'];?></button>
                          
                           </div>
                     </div>
                     <?php } ?>    
                  </div>
                  
                  <?php echo form_close(); ?>
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
              
   			$("#add_city_form").validate({
				rules: {
					city_name: {
						required: true
					}
				},
				messages: {
					city_name: {
						required: "<?php if(isset($this->phrases['city name'])) echo $this->phrases['city name'].' '.$this->phrases['required'];?>"
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