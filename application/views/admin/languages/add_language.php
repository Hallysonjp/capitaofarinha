<?php if(isset($lang_rec->id)){?>
<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_LANGUAGES;?>" style="text-decoration:none;"><?php if(isset($this->phrases['languages'])) echo $this->phrases['languages'];?></a> &gt; <?php if(isset($this->phrases['edit language'])) echo $this->phrases['edit language'];?> 
   </div>
</div>
<?php } else{?>
<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_LANGUAGES;?>" style="text-decoration:none;"><?php if(isset($this->phrases['languages'])) echo $this->phrases['languages'];?></a> &gt;  <?php if(isset($this->phrases['add language'])) echo $this->phrases['add language'];?>
   </div>
</div>
<?php }?>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
         <div class="col-md-12">
            <div class="panel">
               <?php if(isset($lang_rec->id)){?>
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['edit language'])) echo $this->phrases['edit language'];?>  </div>
               <?php } else{?>
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['add language'])) echo $this->phrases['add language'];?> <i class="fa fa-plus"></i> </div>
               <?php }?>
               <div class="panel-body paddig">
                  <div class="inner-pages-forms">
                     <div class="col-md-6">
                        <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
                        <?php $attributes = array('name'=>'add_language_form','id'=>'add_language_form');
                           echo form_open(URL_ADMIN_ADD_LANG,$attributes) ?>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['language name'])) echo $this->phrases['language name'];?><span style="color:red;">*</span></label>
                           <input type="text" name="language_name" value="<?php if(isset($lang_rec->lang_name)) echo ucfirst($lang_rec->lang_name);?>"/>
                           <?php echo form_error('language_name'); ?>
                        </div>
						<div class="form-group">
                           <label><?php if(isset($this->phrases['language code'])) echo $this->phrases['language code'];?><span style="color:red;">*</span></label>
                           <input type="text" name="lang_code" value="<?php if(isset($lang_rec->lang_code)) echo $lang_rec->lang_code;?>"/>
                           <?php echo form_error('lang_code'); ?>
                        </div>
						<div class="form-group">
                           <label><?php echo $this->phrases['status']?></label>
                           <?php 
							
							$options = array(
							 '' => (isset($this->phrases['select'])) ? $this->phrases['select'] : 'Select',
                              'Active'  => (isset($this->phrases['active'])) ? $this->phrases['active'] : 'Active',
                              'Inactive'    => (isset($this->phrases['inactive'])) ? $this->phrases['inactive'] : 'Active'
                              );
                              $select = '';
							  if(isset($lang_rec->status)){
								  $select = $lang_rec->status;
							  }
							  
                              echo form_dropdown('status', $options,$select,'class="chzn-select"'); ?>
                        </div>
                        <div class="form-group">
                           <?php 
                              if(isset($lang_rec->id) ) {?>
                           <input type="hidden" name="update_rec_id" value="<?php if(isset($lang_rec->id)) echo $lang_rec->id;?>"/>
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
<link href="<?php echo base_url();?>assets/css/validation-error.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/additional-methods.js"></script>
<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              //Additional Methods			
   		
			$.validator.addMethod("lettersonly",function(a,b){return this.optional(b)||/^[a-z ]+$/i.test(a)},"Please enter text only.");
			
				$.validator.addMethod("noSpace", function(value, element) { 
		
				return value.indexOf(" ") < 0 && value != ""; 
				}, "No space please and don't leave it empty");

			
   		//form validation rules
              $("#add_language_form").validate({
					ignore:"",
					rules: {
						language_name: {
							required: true,
							noSpace:true
						},
						lang_code:{
							required:true,
							lettersonly:true,
							noSpace:true
						},
						status:{
							required:true
						}
   		
					},
   			
					messages: {
					language_name: {
                          required: "<?php if(isset($this->phrases['language name'])) echo $this->phrases['language name'].' '.$this->phrases['required'];?>"
						 
				    },
				    lang_code: {
                          required: "<?php if(isset($this->phrases['language code'])) echo $this->phrases['language code'].' '.$this->phrases['required'];?>"
				    },
					status:{
						required: "<?php if(isset($this->phrases['status'])) echo $this->phrases['status'].' '.$this->phrases['required'];?>"
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