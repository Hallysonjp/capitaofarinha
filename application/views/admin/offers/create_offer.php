<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_ADMIN_OFFERS;?>" style="text-decoration:none;"><?php if(isset($this->phrases['offers'])) echo $this->phrases['offers'];?></a>  &gt;  <?php if(isset($this->phrases['create offer'])) echo $this->phrases['create offer'];?>
   </div>
</div>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
         <div class="col-md-12">
            <div class="panel">
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['create offer'])) echo $this->phrases['create offer'];?> <i class="fa fa-plus"></i> </div>
               <div class="panel-body paddig">
                  <?php $attributes = array('name'=>'create_offer','id'=>'create_offer');
                     echo form_open_multipart(URL_CREATE_OFFER,$attributes) ?>
                  <div class="inner-pages-forms">
                     <div class="col-md-6">
                        <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['offer name'])) echo $this->phrases['offer name'];?><span style="color:red;">*</span></label>
                           <?php echo form_input('offer_name',set_value('offer_name')); ?>
                           <?php echo form_error('offer_name'); ?>
                        </div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['offer cost'])) echo $this->phrases['offer cost'];?><span style="color:red;">*</span></label>
                           <?php echo form_input('offer_cost',set_value('offer_cost')); ?>
                           <?php echo form_error('offer_cost'); ?>
                        </div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['offer start date'])) echo $this->phrases['offer start date'];?><span style="color:red;">*</span></label>
                           <?php 
						   $frm = date('Y,n,j', strtotime(date('Y-m-d') . "-1 days"));
							$js = ' id="offer_start_date" data-beatpicker-disable="{from:['.$frm.'],to:\'<\'}" data-beatpicker="true"';
						   echo form_input('offer_start_date',set_value('offer_start_date'),$js); ?>
                           <?php echo form_error('offer_start_date'); ?>
                        </div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['offer valid date'])) echo $this->phrases['offer valid date'];?><span style="color:red;">*</span></label>
                           <?php 
						   $frm = date('Y,n,j', strtotime(date('Y-m-d') . "-1 days"));
							$js = ' id="offer_valid_date" data-beatpicker-disable="{from:['.$frm.'],to:\'<\'}" data-beatpicker="true"';
						   echo form_input('offer_valid_date',set_value('offer_valid_date'),$js); ?>
                           <?php echo form_error('offer_valid_date'); ?>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['serve no of people'])) echo $this->phrases['serve no of people'];?><span style="color:red;">*</span></label>
                           <?php echo form_input('serve_no_of_people',set_value('serve_no_of_people')); ?>
                           <?php echo form_error('serve_no_of_people'); ?>
                        </div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['offer image'])) echo $this->phrases['offer image'];?><span style="color:red;">*</span></label>
                           <?php echo form_upload('userfile',set_value('userfile')); ?>
                           <?php echo form_error('userfile'); ?>
                        </div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['offer conditions'])) echo $this->phrases['offer conditions'];?><span style="color:red;">*</span></label>
                           <?php echo form_textarea('offer_conditions',set_value('offer_conditions')); ?>
                           <?php echo form_error('offer_conditions'); ?>
                        </div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['status'])) echo $this->phrases['status']?></label>
                           <?php 
						   
							$options = array(
							  'Active'  => (isset($this->phrases['active'])) ? $this->phrases['active'] : 'Active',
                              'Inactive'    => (isset($this->phrases['inactive'])) ? $this->phrases['inactive'] : 'Active'
                              );
                              
                              echo form_dropdown('status', $options,set_select('status'),'class="chzn-select"'); ?>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label><?php if(isset($this->phrases['menu name'])) echo $this->phrases['menu name'];?><span style="color:red;">*</span></label>
                              <?php echo form_dropdown('menu_name',$categories,set_select('menu_name'),'class="chzn-select" id="menu_name"'); ?>
                              <?php echo form_error('menu_name'); ?>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label><?php if(isset($this->phrases['item name'])) echo $this->phrases['item name'];?><span style="color:red;">*</span></label>
                              <select name="item_name" id="item_name" class="chzn-select">
                              </select>
                              <?php echo form_error('item_name'); ?>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <label><?php if(isset($this->phrases['quantity'])) echo $this->phrases['quantity'];?><span style="color:red;">*</span></label>
                           <?php echo form_input('quantity',set_value('quantity'),'id="quantity"'); ?>
                        </div>
                        <div class="col-md-3">  
                           <input type="hidden" name="product_count" id="product_count" value="1">
                           <label><?php if(isset($this->phrases['add/ remove'])) echo $this->phrases['add/ remove'];?></label>
                           <?php echo form_button('add','+','class="butto" onclick="AddRow();" id="btn"'); ?>
                           <?php echo form_button('reset','-','class="butto1" onclick="removeRow();"'); ?>
                           <input type="hidden" name="product_counts" id="product_counts">
                        </div>
                        <table class="table table-bordered" id="first">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th><?php if(isset($this->phrases['menu name'])) echo $this->phrases['menu name'];?></th>
                                 <th><?php if(isset($this->phrases['item name'])) echo $this->phrases['item name'];?></th>
                                 <th><?php if(isset($this->phrases['quantity'])) echo $this->phrases['quantity'];?></th>
                              </tr>
                           </thead>
                           <tbody>
                           </tbody>
                        </table>
                        <div class="buttos">
                           <?php echo form_submit('add',(isset($this->phrases['add'])) ? $this->phrases['add']:'Add','class="butto"'); ?>
                           
                        </div>
                     </div>
                  </div>
                  <?php echo form_close(); ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--	Validations	-->
 
 <link rel="stylesheet" href="<?php echo base_url();?>assets/css/alertifyjs/themes/alertify.core.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/alertifyjs/themes/alertify.default.css" id="toggleCSS" />
<script src="<?php echo base_url();?>assets/js/alertify.min.js"></script>
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
   		 $.validator.addMethod("endDate", function(value, element) {
            var startDate = $('#offer_start_date').val();
            return Date.parse(startDate) <= Date.parse(value) || value == "";
        }, "<?php if(isset($this->phrases['valid date must be greater than start date'])) echo $this->phrases['valid date must be greater than start date'];?>");
   		//form validation rules
			$("#create_offer").validate({
				ignore:[],
				rules: {
					product_counts:{
						required:true
					},
					offer_name:{
						required:true
					},
					offer_cost:{
						required:true,
						number:true	
					},
					offer_start_date: {
						required: true 
					},
					offer_valid_date: {
						required: true,
						endDate: true
					},
					serve_no_of_people:{
						required:true,
						number:true
					},
					userfile:{
						required:true,
						extension: "png|jpg|jpeg"
					},
					offer_conditions:{
						required:true
					}	

				},

				messages: {
					product_counts:{
						required: "<?php if(isset($this->phrases['add atleast one item'])) echo $this->phrases['add atleast one item'];?>"	
					},
					offer_name: {
						required: "<?php if(isset($this->phrases['offer name'])) echo $this->phrases['offer name'].' '.$this->phrases['required'];?>"
					},
					offer_cost: {
						required: "<?php if(isset($this->phrases['offer cost'])) echo $this->phrases['offer cost'].' '.$this->phrases['required'];?>",
						number:"<?php if(isset($this->phrases['please enter numbers only'])) echo $this->phrases['please enter numbers only'];?>"
					},
					offer_start_date:{
						required: "<?php if(isset($this->phrases['offer start date'])) echo $this->phrases['offer start date'].' '.$this->phrases['required'];?>"
					},
					offer_valid_date:{
						required: "<?php if(isset($this->phrases['offer valid date'])) echo $this->phrases['offer valid date'].' '.$this->phrases['required'];?>"
					},
					serve_no_of_people:{
						required: "<?php if(isset($this->phrases['serve no of people'])) echo $this->phrases['serve no of people'].' '.$this->phrases['required'];?>",
						number:"<?php if(isset($this->phrases['please enter numbers only'])) echo $this->phrases['please enter numbers only'];?>"
					},
					userfile:{
						required: "<?php if(isset($this->phrases['image'])) echo $this->phrases['image'].' '.$this->phrases['required'];?>",
						extension: "<?php if(isset($this->phrases['please upload only jpg|jpeg|png'])) echo $this->phrases['please upload only jpg|jpeg|png'];?>"
					},
					offer_conditions:{
						required: "<?php if(isset($this->phrases['offer conditions'])) echo $this->phrases['offer conditions'].' '.$this->phrases['required'];?>"
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
<script>
	var prod = [];
   $(document).ready(function(){
	   
    
	   // GET ITEMS
	   $("#menu_name").change(function(){
		
		   $.ajax({
			   url: "<?php echo base_url(); ?>admin/get_items",
			   data: {menu_id:$("#menu_name").val(),<?php echo $this->security->get_csrf_token_name(); ?>:"<?php echo $this->security->get_csrf_hash(); ?>"},
			   type: "POST",
			   success: function(data)
				{
					$('#item_name').empty();
					$('#item_name').html('').html(data);
					$('#item_name').trigger('liszt:updated');
				}
			});
	   });
   
   } ); // End Of Document ready
   
   function AddRow()
	{		
		var item_id = $('#item_name option:selected').val();
	   if($('#menu_name').val()=="")
	   {
		 alertify.error("<?php if(isset($this->phrases['menu name'])) echo $this->phrases['menu name'].' '.$this->phrases['required'];?>");
		
	   }
	   else if($('#item_name').val()=="")
	   {
			
			alertify.error("<?php if(isset($this->phrases['item name'])) echo $this->phrases['item name'].' '.$this->phrases['required'];?>");
	   }
	   else if($('#quantity').val()=="")
	   {
		   alertify.error("<?php if(isset($this->phrases['quantity'])) echo $this->phrases['quantity'].' '.$this->phrases['required'];?>");
			
	   }
	   else if(isNaN($('#quantity').val()))
	   {
		   alertify.error("<?php if(isset($this->phrases['please enter numbers only'])) echo $this->phrases['please enter numbers only'];?>");
			
	   }else if(in_array(item_id,prod)){
		   alertify.error("<?php if(isset($this->phrases['already existed'])) echo $this->phrases['already existed'];?>");
	   }
	   else
	   {
		
		   var cnt=$("#product_count").val();
		   var ncnt = cnt;
		   var sno = cnt;
			
		   $('#first tr').last().after('<tr><th scope="row">'+sno+'</th><td><input type="text" readonly name="menu'+ncnt+'" id="menu'+ncnt+'" value="'+$('#menu_name option:selected').text()+'"></td><td><input type="text" readonly value="'+$('#item_name option:selected').text()+'" name="item_name'+ncnt+'" id="item_name'+ncnt+'"><input type="hidden" readonly value="'+$('#item_name option:selected').val()+'" name="item_id'+ncnt+'" id="item_id'+ncnt+'"></td><td><input  type="text" value="'+$('#quantity').val()+'" name="quantity'+ncnt+'" id="quantity'+ncnt+'"></td></tr>');
			
			cnt=++cnt;
		   $("#product_count").val(cnt);
		   $("#product_counts").val(cnt);
		   
		   prod.push(item_id);
		   
	   }
   
   }
  
  function removeRow()
   {
	   table = document.getElementById("first");
	   var rowno = table.rows.length;
	   
	   if(table.rows.length > 1)
	   {
		   var cnt=$("#product_count").val();
		   var ncnt = --cnt;	
		   var item_id = $('#item_id'+ncnt).val();
		 
			prod = jQuery.grep(prod, function(value) {
				return value != item_id;
			});
			
		   $('#first tr:last-child').remove();
		   
		   $("#product_count").val(ncnt);
		   $("#product_counts").val(ncnt);	
		   
		
	   }
	   $("#product_counts").val("");
		
   }
   
function in_array(search, array)
{
	for (i = 0; i < array.length; i++)
	{
		if(array[i] ==search )
		{
			return true;
		}
	}
	return false;
}

    
</script>