<div class="col-md-10 paddig">
   <div class="brade">
   
      <a href="<?php echo base_url();?>admin" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <?php if(isset($this->phrases['pages'])) echo $this->phrases['pages'];?>  &gt;<?php if(isset($title)) echo $title;?> 
   </div>
</div>
   <div class="col-md-10">
<div class="admin-body">
<div class="inner-elements">
   <div class="panel">
      <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
         <div class="panel-heading ele-hea"><?php if(isset($title)) echo $title;?> 
            
         </div>
         <div class="panel-body paddig">
            <div class="inner-pages-forms">
               <div class="col-md-6">
                  <?php 
					
                     $attributes = array('name' => 'dynamic_pages', 'id' => 'dynamic_pages');
                     echo form_open(URL_PAGE,$attributes);?> 
                  <div class="form-group">
                     <label><?php if(isset($this->phrases['name'])) echo $this->phrases['name'];?> <span style="color:red;">*</span> </label> 
					 
					 <?php 
							$value = '';
							if(isset($page->name)) {
								$value = $page->name;		 							
							}
						echo form_input('name',$value);	
						echo form_error('name');
					 ?>
                     
					   <?php  ?>
                  </div>
                  <div class="form-group">    
                     <label><?php if(isset($this->phrases['description'])) echo $this->phrases['description'];?> <span style="color:red;">*</span> </label>  
					 					 
              <textarea class="ckeditor" id="editor1" name="description" cols="1000"  rows="1000"><?php if(isset($page->description))
                        echo $page->description;?></textarea>
                     <?php echo form_error('description');?>
                  </div>
				  <div class="form-group">
                     <label><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?> <span style="color:red;">*</span> </label> 
                     <?php 
					 $options = array('Active'=>'Active',
									'Inactive'=>'Inactive'
									);
					   $select = array();
                        if(isset($page->status)) {
                        $select = array(								
                        		$page->status		
                        	);					  			
                        }			
					$js= 'class="chzn-select"';				
					echo form_dropdown('status',$options,$select,$js).form_error('status');				
								 
					 ?>
                  </div>
				  <?php 
						$value = '';
						if(isset($page->id)){
							$value = $page->id;
						}
						echo form_hidden('id',$value);
				  ?>
                  
                  <div class="buttos">
                     <button type="submit" class="butto" name="update" value="update"><i class="fa fa"></i><?php if(isset($this->phrases['update'])) echo $this->phrases['update'];?></button>
                  </div>
                  
               </div>
            </div>
            <?php echo form_close();?>  
        </div>
      </div>
   </div>
</div>

<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js" type="text/javascript"></script>
 
<!--	Validations	-->

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript"> 
   (function($, W, D) {
     var JQUERY4U = {};
     JQUERY4U.UTIL = {
         setupFormValidation: function() {
			// Additional Rules
			CKEDITOR.on('instanceReady', function () {
			$.each(CKEDITOR.instances, function (instance) {
				CKEDITOR.instances[instance].document.on("keyup", CK_jQ);
				CKEDITOR.instances[instance].document.on("paste", CK_jQ);
				CKEDITOR.instances[instance].document.on("keypress", CK_jQ);
				CKEDITOR.instances[instance].document.on("blur", CK_jQ);
				CKEDITOR.instances[instance].document.on("change", CK_jQ);
				});
			});

			function CK_jQ() {
				for (instance in CKEDITOR.instances) {
					CKEDITOR.instances[instance].updateElement();
				}
			}
             //form validation rules
            $("#dynamic_pages").validate({
			ignore:[],	
			debug: false,
			rules: {
				name: {
					required: true
				},
				description: {
					required: true,
					minlength:10
				}
            },
            messages: {
				name: {
					required: "<?php if(isset($this->phrases['name'])) echo $this->phrases['name'].' '.$this->phrases['required'];?>"
				},
				description: {
					required: "<?php if(isset($this->phrases['description'])) echo $this->phrases['description'].' '.$this->phrases['required'];?>"
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