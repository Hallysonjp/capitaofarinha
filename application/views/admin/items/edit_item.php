
<div class="col-md-10 paddig">
  <div class="brade">
    <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
    &gt; <a href="<?php echo base_url().URL_ADMIN_ITEMS;?>" style="text-decoration:none;"><?php if(isset($this->phrases['items'])) echo $this->phrases['items'];?></a>  &gt;  <?php if(isset($this->phrases['edit item'])) echo $this->phrases['edit item'];?>
  </div>
</div>
<div class="col-md-10">
  <div class="admin-body">
    <div class="inner-elements">
      <div class="col-md-12">
        <div class="panel">
          <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['edit item'])) echo $this->phrases['edit item'];?> <i class="fa fa-plus"></i> </div>
          <div class="panel-body paddig">
            <div class="inner-pages-forms">
             <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
              <!-- Tab -->
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php if(isset($this->phrases['items'])) echo $this->phrases['items'];?></a></li>
                <li role="presentation"><a href="#options" aria-controls="options" role="tab" data-toggle="tab"><?php if(isset($this->phrases['options'])) echo $this->phrases['options'];?></a></li>
                <li role="presentation"><a href="#addons" aria-controls="addons" role="tab" data-toggle="tab"><?php if(isset($this->phrases['addons'])) echo $this->phrases['addons'];?></a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                  <?php $attributes = array('name'=>'edit_item','id'=>'edit_item');
                    echo form_open_multipart(URL_EDIT_ITEMS,$attributes); ?>
                  <div class="col-md-6">
                   
                    <div class="form-group">
                      <label><?php if(isset($this->phrases['menu name'])) echo $this->phrases['menu name'];?><span style="color:red;">*</span></label>
                      <?php echo form_dropdown('menu_name',$menus,$item->menu_id,'class="chzn-select" id="menu_name"'); ?>
                      <?php echo form_error('menu_name'); ?>
                    </div>
                    <div class="form-group">
                      <label><?php if(isset($this->phrases['item name'])) echo $this->phrases['item name'];?><span style="color:red;">*</span></label>
                      <?php echo form_input('item_name',set_value('item_name',$item->item_name)); ?>
                      <?php echo form_error('item_name'); ?>
                    </div>
                    <div class="form-group">
                      <label><?php if(isset($this->phrases['item cost'])) echo $this->phrases['item cost'];?><span style="color:red;">*</span></label>
                      <?php echo form_input('item_cost',set_value('item_cost',$item->item_cost)); ?>
                      <?php echo form_error('item_cost'); ?>
                    </div>
                    <div class="form-group">
                      <label><?php if(isset($this->phrases['item type'])) echo $this->phrases['item type'];?><span style="color:red;">*</span></label>
                      <?php $options = array(
                        'Veg'  		=> (isset($this->phrases['veg'])) ? $this->phrases['veg'] : 'Veg',
						 'Non-Veg'    	=> (isset($this->phrases['non veg'])) ? $this->phrases['non veg'] : 'Non Veg',
						 'Other'    	=> (isset($this->phrases['other'])) ? $this->phrases['other'] : 'Other',
						 );
						 
						 echo form_dropdown('item_type', $options,$item->item_type,'class="chzn-select"'); ?>
                      <?php echo form_error('item_type'); ?>
                    </div>
					
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php if(isset($this->phrases['description'])) echo $this->phrases['description'];?><span style="color:red;">*</span></label>
                      <?php echo form_textarea('description',set_value('description',$item->item_description)); ?>
                      <?php echo form_error('description'); ?>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label><?php if(isset($this->phrases['item image'])) echo $this->phrases['item image'];?><span style="color:red;">*</span></label>
                        <?php 
                          $src = base_url().IMG_DEFAULT;
                          if(isset($item->item_image_name) && $item->item_image_name!="")
                          {
                          	$src = base_url().IMG_ITEMS.$item->item_image_name;
                          }
                          ?>
                        <img width="50px;" height="50px;" src="<?php echo $src; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label><?php if(isset($this->phrases['change image'])) echo $this->phrases['change image'];?></label>
                      <?php echo form_upload('userfile',set_value('userfile')); ?>
                      <?php echo form_error('userfile'); ?>
                    </div>
                    <div class="form-group">
                      <label><?php if(isset($this->phrases['status'])) echo $this->phrases['status']; ?></label>
                      <?php 
                        $options = array(
						   'Active'  => (isset($this->phrases['active'])) ? $this->phrases['active'] : 'Active',
						   'Inactive'    => (isset($this->phrases['inactive'])) ? $this->phrases['inactive'] : 'Active'
						   );
						   
						   echo form_dropdown('status', $options,$item->status,'class="chzn-select"'); ?>
                    </div>
                    <div class="buttos">
                      <?php echo form_hidden('item_id',$item->item_id); ?>
                      <?php echo form_submit('add',$this->phrases['update'],'class="butto"'); ?>
                    </div>
                  </div>
                  <?php echo form_close(); ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="options">
                  <div class="col-md-12">
				    <div class="col-md-4">
                      <div class="form-group">
                        <label><?php if(isset($this->phrases['options'])) echo $this->phrases['options'];?><span style="color:red;">*</span></label>
                        <?php echo form_dropdown('option_name',$option,set_select('option_name'),'class="chzn-select" id="option_name"'); ?>
                        <?php echo form_error('option_name'); ?>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label><?php if(isset($this->phrases['price'])) echo $this->phrases['price'];?><span style="color:red;">*</span></label>
                      <?php echo form_input('price',set_value('price'),'id="price"'); ?>
                    </div>
                    <div class="col-md-4">  
                     
                      <label><?php if(isset($this->phrases['add/ remove'])) echo $this->phrases['add/ remove'];?></label>
                      <?php echo form_button('add','+','class="butto" onclick="AddOptionRow();" id="btn"'); ?>
                      <?php echo form_button('reset','-','class="butto1" onclick="removeOptionRow();"'); ?>
                     
                    </div>
					<?php 
						$attributes = array('name'=>'item_option','id'=>"item_option");
				  echo form_open(URL_EDIT_ITEMS,$attributes); ?>
				   <input type="hidden" name="option_count" id="option_count" value="<?php if(isset($item_options) && count($item_options)>0) echo count($item_options)+1; else echo "1";?>">
				    <input type="hidden" name="option_counts" id="option_counts">
				    <input type="hidden" name="item_id" value="<?php echo $item->item_id;?>">
                    <table class="table table-bordered" id="first">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th><?php if(isset($this->phrases['options'])) echo $this->phrases['options'];?></th>
                         
                          <th><?php if(isset($this->phrases['price'])) echo $this->phrases['price'];?></th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
						if(isset($item_options) && count($item_options)>0){
							$i=1;
							$option_data = [];
							foreach($item_options as $item_option):
							 array_push($option_data,$item_option->option_id);
					  ?>
					  <tr>
					  <th scope="row"><?php echo $i; ?></th>
					  <td>
					  <input type="text" readonly name="option_name<?php echo $i; ?>" id="option_name<?php echo $i; ?>" value="<?php echo $item_option->option_name; ?>">
					  </td>
					  <td>
					   <input type="hidden" value="<?php echo $item_option->option_id; ?>" name="option_id<?php echo $i; ?>" id="option_id<?php echo $i; ?>">
					  <input  type="text" value="<?php echo $item_option->price; ?>" name="price<?php echo $i; ?>" id="price<?php echo $i; $i++; ?>">
					  </td>
					  </tr>
						<?php endforeach; } ?>
                      </tbody>
                    </table>
                    <div class="buttos">
                      <?php echo form_submit('option',(isset($this->phrases['add'])) ? $this->phrases['add']:'Add','class="butto"'); ?>
                    </div>
					<?php echo form_close(); ?>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="addons">
                  <!-- Addons Tab -->
				  <div class="col-md-12">
				    <div class="col-md-4">
                      <div class="form-group">
                        <label><?php if(isset($this->phrases['addons'])) echo $this->phrases['addons'];?><span style="color:red;">*</span></label>
                        <?php echo form_dropdown('addon_name',$addons,set_select('addon_name'),'class="chzn-select" id="addon_name" onChange="onAddonChange()"'); ?>
                        <?php echo form_error('addon_name'); ?>
                      </div>
                    </div>
                  
                    <div class="col-md-4">
                      <label><?php if(isset($this->phrases['price'])) echo $this->phrases['price'];?><span style="color:red;">*</span></label>
                      <?php echo form_input('addon_price',set_value('price'),'id="addon_price" readonly'); ?>
                    </div>
					
                    <div class="col-md-4">  
                     
                      <label><?php if(isset($this->phrases['add/ remove'])) echo $this->phrases['add/ remove'];?></label>
                      <?php echo form_button('add','+','class="butto" onclick="AddAddonRow();" id="btn"'); ?>
                      <?php echo form_button('reset','-','class="butto1" onclick="removeAddonRow();"'); ?>
                     
                    </div>
					<div>
					<?php 
						$attributes = array('name'=>'item_addon','id'=>"item_addon");
						echo form_open(URL_EDIT_ITEMS,$attributes); ?>
				   <input type="hidden" name="addon_count" id="addon_count" value="<?php if(isset($item_addons) && count($item_addons)>0) echo count($item_addons)+1; else echo "1";?>">
				    <input type="hidden" name="addon_counts" id="addon_counts">
					<?php echo form_error('addon_counts'); ?>
				    <input type="hidden" name="item_id" value="<?php echo $item->item_id;?>">
                    <table class="table table-bordered" id="addon">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th><?php if(isset($this->phrases['item name'])) echo $this->phrases['item name'];?></th>
                          <th><?php if(isset($this->phrases['price'])) echo $this->phrases['price'];?></th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
						if(isset($item_addons) && count($item_addons)>0){
							$i=1;
							$addon_data = [];
							foreach($item_addons as $addon_option):
							 array_push($addon_data,$addon_option->addon_id);
					  ?>
					  <tr>
					  <th scope="row"><?php echo $i; ?></th>
					  <td>
					  <input type="text" readonly name="addon_name<?php echo $i; ?>" id="addon_name<?php echo $i; ?>" value="<?php echo $addon_option->addon_name; ?>">
					  </td>
					  <td>
					   <input type="hidden" value="<?php echo $addon_option->addon_id; ?>" name="addon_id<?php echo $i; ?>" id="addon_id<?php echo $i; ?>">
					  <input readonly type="text" readonly value="<?php echo $addon_option->price; ?>" name="addon_price<?php echo $i; ?>" id="addon_price<?php echo $i; $i++; ?>">
					  </td>
					  </tr>
						<?php endforeach; } ?>
                      </tbody>
                    </table>
                    <div class="buttos">
                      <?php echo form_submit('addon',(isset($this->phrases['save'])) ? $this->phrases['save']:'Save','class="butto"'); ?>
                    </div>
					<?php echo form_close(); ?>
                  </div>
                  </div>
                  <!-- Addons Tab-->
                </div>
              </div>
              <!-- Tab -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--	Validations	-->
<link href="<?php echo base_url();?>assets/css/alertifyjs/themes/alertify.bootstrap.css" rel="stylesheet">
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
  		
  		//form validation rules
  $("#edit_item").validate({
  	ignore: " ",
  	rules: {
  		menu_name: {
  			required: true
  		},
  		item_name:{
  			required:true
  		},
  		item_cost:{
  			required:true,
  			number:true	
  		},
  		item_type:{
  			required:true
  		},
  		description: {
  			required: true 
  		},
  		userfile:{
  			extension: "png|jpg|jpeg"
  		}	
  	},
  
  	messages: {
  		menu_name: {
  			required: "<?php if(isset($this->phrases['menu'])) echo $this->phrases['menu'].' '.$this->phrases['required'];?>"
  		},
  		item_name: {
  			required: "<?php if(isset($this->phrases['item name'])) echo $this->phrases['item name'].' '.$this->phrases['required'];?>"
  		},    
  		item_cost: {
  			required: "<?php if(isset($this->phrases['item cost'])) echo $this->phrases['item cost'].' '.$this->phrases['required'];?>",
  			number:"<?php if(isset($this->phrases['please enter numbers only'])) echo $this->phrases['please enter numbers only'];?>"
  			
  		},
  		item_type:{
  			required:"<?php if(isset($this->phrases['item type'])) echo $this->phrases['item type'].' '.$this->phrases['required'];?>"
  		},	
  		userfile:{
  			extension: "<?php if(isset($this->phrases['please upload only jpg|jpeg|png'])) echo $this->phrases['please upload only jpg|jpeg|png'];?>"
  		},
  		description: {
  			required: "<?php if(isset($this->phrases['description'])) echo $this->phrases['description'].' '.$this->phrases['required'];?>"
  		}
  	},
  
  	submitHandler: function(form) {
		form.submit();
	}
  });
  
	// ADDON FORM 
		
		$('#item_addon').validate({
			ignore: " ",
			rules:{
				addon_counts:{
					required:true
				}
			},
			messages:{
				addon_counts:{
					required:"Select atleast one addon"
				}
			},
			submitHandler: function(form){
				form.submit();
			}
			
		});	
		
		$('#item_option').validate({
			ignore: " ",
			rules:{
				option_counts:{
					required:true
				}
			},
			messages:{
				option_counts:{
					required:"Select atleast one option"
				}
			},
			submitHandler: function(form){
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
   // $(document).ready(function(){
  
</script>
<script>
  var option_data = [];
  var addon_data = [];
  $(document).ready(function(){
	  
     <?php 
	 if(isset($option_data)){
		foreach($option_data as $p):?>
		option_data.push(<?php  echo $p; ?>);
	 <?php endforeach; ?>   
	 $('#option_counts').val(option_data.length);
	 <?php }?>
	 // For ADDONS
	 <?php 
	 if(isset($addon_data)){
		foreach($addon_data as $p):?>
		addon_data.push(<?php  echo $p; ?>);
	 <?php endforeach; } ?> 
	 
	 // Get Addon Cost
	 
	 
	 
	});
	
  function AddOptionRow()
  {		
    var option_id = $('#option_name option:selected').val();
  	
     if($('#option_name').val()=="")
     {
  	 alertify.error("<?php if(isset($this->phrases['name'])) echo $this->phrases['name'].' '.$this->phrases['required'];?>");
  	
     }
     else if($('#price').val()=="")
     {
  	   alertify.error("<?php if(isset($this->phrases['price'])) echo $this->phrases['price'].' '.$this->phrases['required'];?>");
  		
     }
     else if(isNaN($('#price').val()))
     {
  	   alertify.error("<?php if(isset($this->phrases['please enter numbers only'])) echo $this->phrases['please enter numbers only'];?>");
  		
     }else if(in_array(option_id,option_data)){
  	   alertify.error("<?php if(isset($this->phrases['already existed'])) echo $this->phrases['already existed'];?>");
     }
     else
     { 
  	
  	   var cnt=$("#option_count").val();
  	   var ncnt = cnt;
  	   var sno = cnt;
  		
  	   $('#first tr').last().after('<tr><th scope="row">'+sno+'</th><td><input type="text" readonly name="option_name'+ncnt+'" id="option_name'+ncnt+'" value="'+$('#option_name option:selected').text()+'"></td><td><input type="hidden" readonly value="'+$('#option_name option:selected').val()+'" name="option_id'+ncnt+'" id="option_id'+ncnt+'"><input  type="text" value="'+$('#price').val()+'" name="price'+ncnt+'" id="price'+ncnt+'"></td></tr>');
  		
  		cnt=++cnt;
  	   $("#option_count").val(cnt);
  	   $("#option_counts").val(cnt);
  	   
  	   option_data.push(option_id);
  	   
     }
    
    }
   
   function removeOptionRow()
    {
     table = document.getElementById("first");
     var rowno = table.rows.length;
     
     if(table.rows.length > 1)
     {
	
  	   var cnt=$("#option_count").val();
  	   var ncnt = --cnt;	
  	   var option_id = $('#option_id'+ncnt).val();
	   
  		option_data = jQuery.grep(option_data, function(value) {
  			return value != option_id;
  		});
  		 <?php if(isset($option_data)){ ?>
			table.deleteRow(rowno -1);
		 <?php } else {?>
			$('#first tr:last-child').remove();
		 <?php } ?>
		 
  	   $("#option_count").val(ncnt);
  	   $("#option_counts").val(ncnt);	
  	
     }
     $("#option_counts").val("");
  	
    }
	
	// ADDONS ADD OR REMOVE
	function AddAddonRow()
  {		
    
    var addon_id = $('#addon_name').val().split("_")[0];
  	
     if($('#addon_name').val()=="")
     {
  	 alertify.error("<?php if(isset($this->phrases['name'])) echo $this->phrases['name'].' '.$this->phrases['required'];?>");
  	
     }
     else if($('#addon_price').val()=="")
     {
  	   alertify.error("<?php if(isset($this->phrases['price'])) echo $this->phrases['price'].' '.$this->phrases['required'];?>");
  		
     }
     else if(isNaN($('#addon_price').val()))
     {
  	   alertify.error("<?php if(isset($this->phrases['please enter numbers only'])) echo $this->phrases['please enter numbers only'];?>");
  		
     }else if(in_array(addon_id,addon_data)){
  	   alertify.error("<?php if(isset($this->phrases['already existed'])) echo $this->phrases['already existed'];?>");
     }
     else
     {
  	
  	   var cnt=$("#addon_count").val();
  	   var ncnt = cnt;
  	   var sno = cnt;
  		
  	   $('#addon tr').last().after('<tr><th scope="row">'+sno+'</th><td><input type="text" readonly name="addon_name'+ncnt+'" id="addon_name'+ncnt+'" value="'+$('#addon_name option:selected').text()+'"></td><td><input type="hidden" readonly value="'+addon_id+'" name="addon_id'+ncnt+'" id="addon_id'+ncnt+'"><input  type="text" readonly value="'+$('#addon_price').val()+'" name="addon_price'+ncnt+'" id="addon_price'+ncnt+'"></td></tr>');
  		
  		cnt=++cnt;
  	   $("#addon_count").val(cnt);
  	   $("#addon_counts").val(cnt);
  	   
  	   addon_data.push(addon_id);
  	   
     }
    
    }
   
   function removeAddonRow()
    {
     table = document.getElementById("addon");
     var rowno = table.rows.length;
     
     if(table.rows.length > 1)
     {
		 
  	   var cnt=$("#addon_count").val();
  	   var ncnt = --cnt;	
  	   var addon_id = $('#addon_id'+ncnt).val();
	   
  	 
  		addon_data = jQuery.grep(addon_data, function(value) {
  			return value != addon_id;
  		});
  		 <?php if(isset($addon_data)){ ?>
			table.deleteRow(rowno -1);
		 <?php } else {?>
			$('#addon tr:last-child').remove();
		 <?php } ?>
		 
  	   $("#addon_count").val(ncnt);
  	   $("#addon_counts").val(ncnt);	
  	
     }
     $("#addon_counts").val("");
  	
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
  
  // On Addon change
  
  function onAddonChange()
  {
	  
	  if($('#addon_name').val()!=''){
		  var addName = $('#addon_name').val();
		  var addonCost = addName.split("_")[1];
		 $('#addon_price').val(addonCost);
	  }else{
		  $('#addon_price').val('');
	  }
  }
     
</script>
