<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_EMAIL_TEMPLATE_SETTINGS;?>"><?php if(isset($this->phrases['email templates'])) echo $this->phrases['email templates'];?></a>  &gt; 	  
      <?php if(isset($title)) echo $title;?> 
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
                     $attributes = array('name' => 'email_template_form', 'id' => 'email_template_form');
                     echo form_open_multipart(URL_EMAIL_TEMPLATE_SETTINGS.DS.$opt,$attributes);?> 
                  <div class="form-group">
                     <label><?php if(isset($this->phrases['subject'])) echo $this->phrases['subject'];?> <span style="color:red;">*</span> </label> 
                     <input type="text" name="subject" readonly
                        value="<?php if(isset($template_info->subject)) 
                           echo $template_info->subject; ?>"/>
                  </div>
                  <div class="form-group">    
                     <label><?php if(isset($this->phrases['email template'])) echo $this->phrases['email template'];?> <span style="color:red;">*</span> </label>  
                     <textarea class="ckeditor" id="editor1" name="email_template" cols="1000" rows="1000"><?php if(isset($template_info->email_template))
                        echo $template_info->email_template;?></textarea>
                     <?php echo form_error('email_template');?>
                  </div>
				  <div class="form-group">
                     <label><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?> <span style="color:red;">*</span> </label> 
                     <?php 
					 $options = array('Active'=>'Active',
									'Inactive'=>'Inactive'
									);
					   $select = array();
                        if(isset($template_info->status)) {
                        $select = array(								
                        		$template_info->status		
                        	);					  			
                        }			
					$js= 'class="chzn-select"';				
					echo form_dropdown('status',$options,$select,$js).form_error('status');				
					 
					 
					 ?>
                  </div>
                  <input type="hidden" name="id" value="<?php if(isset($template_info->id)) 
                     echo $template_info->id;?>"/>
                  
                  <?php if($opt == "update"){?>
                  <div class="buttos">
                     <button type="submit" class="butto" name="update" value="update"><i class="fa fa"></i><?php if(isset($this->phrases['update'])) echo $this->phrases['update'];?></button>
                  </div>
                  <?php } ?>
                  
               </div>
            </div>
            <?php echo form_close();?>  
        </div>
      </div>
   </div>
</div>

<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
   var editor;
   // The instanceReady event is fired, when an instance of CKEditor has finished
   // its initialization.
   CKEDITOR.on( 'instanceReady', function( ev ) {
   	editor = ev.editor;
   	// Show this "on" button.
   	document.getElementById( 'readOnlyOn' ).style.display = '';
   	// Event fired when the readOnly property changes.
   	editor.on( 'readOnly', function() {
   	'';
   		document.getElementById( 'readOnlyOn' ).style.display = this.readOnly ? 'none' : 	document.getElementById( 'readOnlyOff' ).style.display = this.readOnly ? '' : 'none';
   	});
   });
   function toggleReadOnly( isReadOnly ) {
   	// Change the read-only state of the editor.
   	// http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setReadOnly
   	editor.setReadOnly( isReadOnly );
   }
   
</script>	 
<!--	Validations	-->

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript"> 
   (function($, W, D) {
     var JQUERY4U = {};
     JQUERY4U.UTIL = {
         setupFormValidation: function() {
             //Additional Methods		
   
             //form validation rules
          $("#email_template_form").validate({
			 ignore:"", 
			rules: {
				email_template: {
					required: true
				}
            },
            messages: {
				email_template: {
					required: "<?php if(isset($this->phrases['email template'])) echo $this->phrases['email template'].' '.$this->phrases['required'];?>"
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