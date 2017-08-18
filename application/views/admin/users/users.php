<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url();?>admin" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <?php if(isset($this->phrases['users'])) echo $this->phrases['users'];?>
   </div>
</div>
<div class="col-md-10">
<div class="admin-body">
<div class="inner-elements">
 <h3><?php if(isset($title)) echo $title;?></h3>
   <div class="col-md-12">
      <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
      <table id="example" class="cell-border example" cellspacing="0" width="100%">
         <thead>
            <tr>
               <th>#</th>
               <th><?php if(isset($this->phrases['customer name'])) echo $this->phrases['customer name'];?></th>
			   <th><?php if(isset($this->phrases['email'])) echo $this->phrases['email'];?></th>
               <th><?php if(isset($this->phrases['phone'])) echo $this->phrases['phone'];?></th>
              
              
               <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
            </tr>
         </thead>
         <tfoot>
            <tr>
               <th>#</th>
               <th><?php if(isset($this->phrases['customer name'])) echo $this->phrases['customer name'];?></th>
               <th><?php if(isset($this->phrases['email'])) echo $this->phrases['email'];?></th>
               <th><?php if(isset($this->phrases['phone'])) echo $this->phrases['phone'];?></th>
              
             
               <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
            </tr>
         </tfoot>
         <tbody>
            <?php 						
               $i=1;
               foreach($users as $user):
               
               ?>
            <tr>
               <td><?php echo $i; $i++; ?></td>
               <td><?php echo ucwords($user->first_name).' '.ucwords($user->last_name); ?></td>
               <td><?php echo $user->email; ?></td>
               <td><?php echo $user->phone; ?></td>
               
               <!--<td><?php if($user->active==1) echo "<span  class='badge success'>Active</span>"; else echo "<span  class='badge danger'>Inactive</span>" ?> 
			   </td>-->
               <td>
               <div class="digiCrud">
               <?php echo anchor(URL_ADMIN_USER_DETAILS.DS.$user->id,'<i class="fa fa-desktop"></i>','class="btn btn-info"'); ?> 
               </div>
                 <div class="digiCrud">
                  <div class="slideThree slideBlue">
                  <?php 
                  	$checked = '';
                  	if($user->active==1){
						$checked = 'checked';
					}
                  ?>
                  <input type="checkbox" value="<?php echo $user->id; ?>" id="status_<?php echo $user->id; ?>" name="check_<?php echo $user->id; ?>" onclick="statustoggle(<?php echo $user->id; ?>)" <?php echo $checked; ?> />
					<label for="status_<?php echo $user->id; ?>"></label>
				  </div>
				  </div>
               </td>
            </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>
</div>
 
 <link rel="stylesheet" href="<?php echo base_url();?>assets/css/alertifyjs/themes/alertify.core.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/alertifyjs/themes/alertify.default.css" id="toggleCSS" />
<script src="<?php echo base_url();?>assets/js/alertify.min.js"></script>
<script>
	
		function statustoggle(x){

			 $.ajax({
			   url: "<?php echo base_url(); ?>admin/statustoggle",
			   data: {id:$('#status_'+x).val(),status:$('#status_'+x).is(':checked'),<?php echo $this->security->get_csrf_token_name(); ?>:"<?php echo $this->security->get_csrf_hash(); ?>"},
			   type: "POST",
			   success: function(data)
				{
					dta = JSON.parse(data);
					if(dta.status==1){
						alertify.success(dta.message);
					}else{
						alertify.error(dta.message);
					}
					 
				}
			});
	   
		}
		
		
	
</script>