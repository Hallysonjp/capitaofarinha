<div class="col-md-10 paddig">
   <div class="brade">
     <a href="<?php echo base_url().URL_ADMIN;?>"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a>
	  &gt;  <a href="<?php echo base_url().URL_SERVICE_LOCATIONS;?>"><?php if(isset($this->phrases['service delivery locations'])) echo $this->phrases['service delivery locations'];?>	</a>  	  
      &gt; <?php if(isset($title)) echo $title;?> 
   </div>
</div>
   <div class="col-md-10">
	<div class="admin-body">
      <div class="inner-elements">
      <h3><?php if(isset($title)) echo $title;?></h3>
         <div class="col-md-12">
            <div class="panel">
               <div class="panel-heading ele-hea"> <?php if(isset($title)) echo $title;?>
				<?php 
					if(!isset($record->city_id) ) {?>
						<i class="fa fa-plus"></i>
				<?php } ?>
			   </div>
               <div class="panel-body paddig">
                  <div class="inner-pages-forms">
                     <div class="col-md-6">
					 <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
                  <?php 
				  $attributes = array('name'=>'add_service_location_form','id'=>'add_service_location_form');
                     echo form_open(URL_SERVICE_LOCATIONS.DS.$operation,$attributes) ?>
                                  
                  <div class="form-group">                    
                     <label><?php if(isset($this->phrases['city name'])) echo $this->phrases['city name'];?> <span style="color:red;">*</span></label>
                     <?php 
                        $select = array();
                                             
						$select = '';
						if(isset($record->city_id) && $record->city_id != "") {
							$select = array($record->city_id);					  			
                        }	
                      
                        $js = 'id="cityy_id" class="chzn-select"';
                        echo form_dropdown('city_id',$city_options,$select,$js);
                        
                        ?>   				  
                  </div>
				  
			    <div class="form-group">                    
                     <label><?php if(isset($this->phrases['locality name'])) echo $this->phrases['locality name'];?> <span style="color:red;">*</span></label>
					 <?php 
						$val = set_value('locality');
						if(isset($record->locality)) {
							$val = $record->locality;		
                        }
					 echo form_input('locality',$val);?>
				</div>
				
				<div class="form-group">                    
                     <label><?php if(isset($this->phrases['pincode'])) echo $this->phrases['pincode'];?><span style="color:red;">*</span></label>
					 <?php 
						$val = set_value('pincode');
						if(isset($record->pincode)) {
							$val = $record->pincode;		
                        }
						echo form_input('pincode',$val);
					 ?>
				</div>
                 
                  <div class="form-group">
                     <label> <?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?> <span style="color:red;">*</span></label>
                     <?php 
						$options = array(
						  'Active'  => (isset($this->phrases['active'])) ? $this->phrases['active'] : 'Active',
						  'Inactive'    => (isset($this->phrases['inactive'])) ? $this->phrases['inactive'] : 'Active'
						  );
                        
                          $select = array();
                        if(isset($record->status)) {
							$select = array(								
								$record->status		
							);					  			
                        }
                        
                        echo form_dropdown('status', $options,$select,'class="chzn-select"'); ?>
                     <?php echo form_error('status'); ?>
                  </div>

                  <div class="form-group">
                     <?php 
                        if(isset($record->service_provide_location_id) ) {?>
                     <input type="hidden" name="update_rec_id" value="<?php if(isset($record->service_provide_location_id)) echo $record->service_provide_location_id;?>"/>
                     <div class="buttos">
                        <button type="submit" class="butto" name="submit" value="Update"><i class="fa fa"></i> <?php if(isset($this->phrases['update'])) echo $this->phrases['update'];?> </button>
                      
                     </div>
                     <?php }
                        else { ?>
                     <div class="buttos">
                        <button type="submit" class="butto" name="submit" value="Add"><i class="fa fa-plus"></i> <?php if(isset($this->phrases['add'])) echo $this->phrases['add'];?> </button>
                        
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
	
	$(document).ready(function(){
		<?php if(isset($record->state_id) && $record->state_id!='') {?>
			getCities(<?php if(isset($record->state_id)) echo $record->state_id; ?>);
		<?php } ?>
	});
	
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              
				//form validation rules
              $("#add_service_location_form").validate({
				ignore: "",
                  rules: {
                    city_id: {
						required: true
					},
					locality: {
						required: true
					},
					pincode: {
						required: true,
						numeric: true
					}
				  },
   			
   			messages: {
   				city_id: {
					required: "<?php if(isset($this->phrases['city name'])) echo $this->phrases['city name'].' '.$this->phrases['required'];?>"
				},
   				locality: {
					required: "<?php if(isset($this->phrases['locality name'])) echo $this->phrases['locality name'].' '.$this->phrases['required'];?>"
				},
				pincode: {
					required: "<?php if(isset($this->phrases['pincode'])) echo $this->phrases['pincode'].' '.$this->phrases['required'];?>"
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
