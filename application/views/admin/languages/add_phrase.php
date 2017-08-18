<?php if(isset($phrase_rec->id)){?>
<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_PHRASES;?>" style="text-decoration:none;"><?php if(isset($this->phrases['phrases'])) echo $this->phrases['phrases'];?></a> &gt;  <?php if(isset($this->phrases['edit phrase'])) echo $this->phrases['edit phrase'];?>
   </div>
</div>
<?php } else{?>
<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_PHRASES;?>" style="text-decoration:none;"> <?php if(isset($this->phrases['phrases'])) echo $this->phrases['phrases'];?></a> &gt; <?php if(isset($this->phrases['add phrase'])) echo $this->phrases['add phrase'];?>
   </div>
</div>
<?php }?>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
         <div class="col-md-12">
            <div class="panel">
               <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
			    <?php if(isset($phrase_rec->id)){?>
               <div class="panel-heading ele-hea"><?php if(isset($this->phrases['edit phrase'])) echo $this->phrases['edit phrase'];?> </div>
               <?php } else{?>
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['add phrase'])) echo $this->phrases['add phrase'];?> <i class="fa fa-plus"></i> </div>
			   <?php }?>
               <div class="panel-body paddig">
                  <div class="inner-pages-forms">
                     <div class="col-md-6">
                        <?php $attributes = array('name'=>'add_phrase_form','id'=>'add_phrase_form');
                           echo form_open(URL_ADMIN_ADD_PHRASE,$attributes);?>
						
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['phrase type'])) echo $this->phrases['phrase type'];?><span style="color:red;">*</span></label>
                           <?php $options = array(
							  ''            => (isset($this->phrases['select'])) ? $this->phrases['select'] : 'Select',	
                              'web'  		=> 'Web',
                              'app'    		=> 'App'
                              );
							  $select = '';
                              if(isset($phrase_rec->id)){
								$select =   $phrase_rec->phrase_type;
							  }
							  
							  
                              echo form_dropdown('phrase_type', $options,$select,'class="chzn-select"'); ?>
                           <?php echo form_error('phrase_type'); ?>
                        </div>
						<div class="form-group">
                           <label><?php if(isset($this->phrases['phrase'])) echo $this->phrases['phrase'];?> <span style="color:red;">*</span></label>
                           <input type="text" name="phrase_name" value="<?php if(isset($phrase_rec->text)) echo $phrase_rec->text;?>"/>
                           <?php echo form_error('phrase_name'); ?>
                        </div>
                        <div class="form-group">
							<?php 
                              if(isset($phrase_rec->id) ) {?>
                           <input type="hidden" name="update_rec_id" value="<?php if(isset($phrase_rec->id)) echo $phrase_rec->id;?>"/>
                           <div class="buttos">
                              <button type="submit" class="butto" name="add" value="add"><i class="fa fa"></i><?php if(isset($this->phrases['update'])) echo $this->phrases['update'];?></button>
                           </div>
                           <?php }
                              else { ?>
                           <div class="buttos">
                               <?php echo form_submit('add',(isset($this->phrases['add'])) ? $this->phrases['add']:'Add','class="butto"'); ?>
                             
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
			$.validator.addMethod("lettersonly",function(a,b){return this.optional(b)||/^[a-z ]+$/i.test(a)},"Please enter valid code.");
			
			
			$.validator.addMethod("pwdmatch", function(repwd, element) {
   			var pwd= $('#new_password').val();
   			return (this.optional(element) || repwd==pwd);
   		},"<?php echo $this->phrases['password and confirm password does not match'];?>");
		
		
		
			$.validator.addMethod("noSpace", function(value, element) { 
				var phrase_type= $('#phrase_type').val();
					return value.indexOf(" ") < 0 && value != ""; 
				}, "No space please and don't leave it empty");
				
   		//form validation rules
		
		var phrase_type= $('#phrase_type').val();
		
              $("#add_phrase_form").validate({
				  ignore:"",
				  	rules: 
					{
						phrase_name: {
							required: true
						},
						phrase_type:{
							required:true
						}
                    
					},
					messages: {
						phrase_name: {
                          required: "<?php if(isset($this->phrases['phrase'])) echo $this->phrases['phrase'].' '.$this->phrases['required'];?>"
						},
						phrase_type:{
							required:"<?php if(isset($this->phrases['phrase type'])) echo $this->phrases['phrase type'].' '.$this->phrases['required'];?>"
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