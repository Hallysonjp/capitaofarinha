<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url();?>admin" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_ORDERS_INDEX.$orderDetails->status;?>"><?php if(isset($title)) echo ucfirst($title);?></a>  &gt;  <?php if(isset($this->phrases['order details'])) echo $this->phrases['order details'];?>
   </div>
</div>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
         <div class="col-md-12">
		   <div class="panel">
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['order details'])) echo $this->phrases['order details'];?>  </div>
               <div class="panel-body">
                  <div class="inner-pages-forms">
                     <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
					 <div class="col-md-6">
                     <ul class="ord">
                        <li> <i class="fa  fa-angle-right"></i><strong> <?php if(isset($this->phrases['order no'])) echo $this->phrases['order no'];?> </strong><?php if(isset($orderDetails->order_id)) echo $orderDetails->order_id; ?></li>
                        <li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['order date'])) echo $this->phrases['order date'];?> </strong><?php if(isset($orderDetails->order_date)) echo $orderDetails->order_date; ?></li>
                        <li> <i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['order time'])) echo $this->phrases['order time'];?> </strong><?php if(isset($orderDetails->order_time)) echo $orderDetails->order_time; ?></li>
						<li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['order cost'])) echo $this->phrases['order cost'];?> </strong><?php if(isset($orderDetails->total_cost)) echo $this->config->item('site_settings')->currency_symbol.' '.$orderDetails->total_cost; ?></li>
						<li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['paid amount'])) echo $this->phrases['paid amount'];?> </strong><?php if(isset($orderDetails->paid_amount)) echo $this->config->item('site_settings')->currency_symbol.' '.$orderDetails->paid_amount; ?></li>
                        <li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['booked date'])) echo $this->phrases['booked date'];?> </strong><?php if(isset($orderDetails->date_created)) echo $orderDetails->date_created; ?></li>
                        <li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?> </strong><?php if(isset($orderDetails->status)) echo ucfirst($orderDetails->status); ?></li>
						</ul>
						</div>
						<div class="col-md-6">
						<ul class="ord">
                        
                        <li> <i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['customer name'])) echo $this->phrases['customer name'];?> </strong><?php if(isset($orderDetails->customer_name)) echo $orderDetails->customer_name; ?></li>
                        <li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['address'])) echo $this->phrases['address'];?> </strong>
						<?php if(isset($orderDetails->house_no)) echo $orderDetails->house_no; ?> 
						<?php if(isset($orderDetails->apartment_name)) echo $orderDetails->apartment_name; ?>
						<?php if(isset($orderDetails->other)) echo $orderDetails->other; ?>
						</li>
                        <li><i class="fa  fa-angle-right"></i><strong> <?php if(isset($this->phrases['city'])) echo $this->phrases['city'];?> </strong><?php if(isset($orderDetails->city)) echo $orderDetails->city; ?></li>
						
                        <li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['landmark'])) echo $this->phrases['landmark'];?></strong> <?php if(isset($orderDetails->landmark)) echo $orderDetails->landmark; ?></li>
						<?php if(isset($orderDetails->pincode) && $orderDetails->pincode!='' && $orderDetails->pincode!=0) {?>
                        <li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['pincode'])) echo $this->phrases['pincode'];?> </strong><?php if(isset($orderDetails->pincode)) echo $orderDetails->pincode; ?></li>
						<?php } ?>
                        <li><i class="fa  fa-angle-right"></i><strong> <?php if(isset($this->phrases['phone'])) echo $this->phrases['phone'];?> </strong><?php if(isset($orderDetails->phone)) echo $orderDetails->phone; ?></li>
						<?php if(isset($orderDetails->transaction_id) && $orderDetails->transaction_id!='') {?>
                        <li><i class="fa  fa-angle-right"></i><strong> <?php if(isset($this->phrases['transaction id'])) echo $this->phrases['transaction id'];?> </strong><?php if(isset($orderDetails->transaction_id) && $orderDetails->transaction_id != '') echo $orderDetails->transaction_id;else echo 'NA';?></li>
						<?php } ?>
						<?php if(isset($orderDetails->payment_type)) {?>
                        <li><i class="fa  fa-angle-right"></i><strong> <?php if(isset($this->phrases['payment type'])) echo $this->phrases['payment type'];?> </strong><?php if(isset($orderDetails->payment_type)) echo ucfirst($orderDetails->payment_type); ?></li>
						<?php } ?>
						<?php if(isset($orderDetails->payment_status) && $orderDetails->payment_status!='' && $orderDetails->payment_status!=0) {?>
                        <li><i class="fa  fa-angle-right"></i><strong> <?php if(isset($this->phrases['payment status'])) echo $this->phrases['payment status'];?> </strong><?php if(isset($orderDetails->payment_status)) echo $orderDetails->payment_status; ?></li>
						<?php } ?>
						<?php if(isset($orderDetails->message) && $orderDetails->message!='') {?>
                        <li><i class="fa  fa-angle-right"></i><strong> <?php if(isset($this->phrases['message'])) echo $this->phrases['message'];?>  </strong><?php if(isset($orderDetails->message)) echo $orderDetails->message; ?></li>
						<?php } ?>
					 </ul>
					 
                    <?php if(isset($orderDetails) && $orderDetails->status!='delivered') {?>
                     <div class="form-group">
                        <div class="buttos">
                           <a class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i> <?php if(isset($this->phrases['order update'])) echo $this->phrases['order update']; ?></a>
                        </div>
                     </div>
					<?php } ?>
					</div>
					
					<legend><?php if(isset($this->phrases['order items'])) echo $this->phrases['order items']; ?></legend>
					
                    </div>	
					
					  <table class="table table-bordered" id="first">
                        <thead>
                           <tr>
                              <th>#</th>
                              
                              <th><?php if(isset($this->phrases['item name'])) echo $this->phrases['item name']; ?></th>
							  <th><?php if(isset($this->phrases['options'])) echo $this->phrases['options']; ?></th>
                              <th><?php if(isset($this->phrases['item quantity'])) echo $this->phrases['item quantity']; ?></th>
                              <th><?php if(isset($this->phrases['item cost'])) echo $this->phrases['item cost']; ?></th>
							  <th><?php if(isset($this->phrases['total'])) echo $this->phrases['total']; ?></th>
                              <th><?php if(isset($this->phrases['is deleted'])) echo $this->phrases['is deleted']; ?></th>
                              <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action']; ?></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if(isset($orderProducts) && count($orderProducts)>0) {
                              $i=1;
							  foreach($orderProducts as $orderProduct):
							?>
                           <tr>
                              <td><?php echo $i; $i++; ?></td>
                             
                              <td><?php echo $orderProduct->item_name;?></td>
							  <td><?php if(isset($orderProduct->size_name) && $orderProduct->size_name!='') echo $orderProduct->size_name; else echo $this->phrases['normal']; ?></td>
                              <td><?php echo $orderProduct->item_qty; ?></td>
                              <td>
							  <?php 
								if($orderProduct->size_id!='')
							    echo $orderProduct->size_price;
								else
								echo $orderProduct->item_cost;
								?></td>
								<td><?php echo $orderProduct->final_cost; ?></td>
							  <td>
							  <?php 
								if($orderProduct->is_deleted==1)
									echo $this->phrases['yes'];
								else
									echo $this->phrases['no'];
							  
							  ?></td>
							  <td><?php if($orderProduct->is_deleted==0) {?><a class="btn btn-danger" data-toggle="modal" onclick="changeDeleteId(<?php echo $orderProduct->op_id;?>)" data-target="#deleteModal"><i class="fa fa-trash"></i>
							  <?php }?>
							  </td>
                           </tr>
                           <?php endforeach; } else { ?>
                           <tr>
                              <td colspan="7" align="center"><?php if(isset($this->phrases['no products available'])) echo $this->phrases['no products available']; ?></td>
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
					 <!-- Order Addons Data-->
					 <?php if(isset($orderAddons) && count($orderAddons)>0) {?>
					 <div>
					 <legend><?php if(isset($this->phrases['order addons'])) echo $this->phrases['order addons']; ?></legend>
					 <table class="table table-bordered" id="first">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th><?php if(isset($this->phrases['item name'])) echo $this->phrases['item name']; ?></th>
							  
                              <th><?php if(isset($this->phrases['item quantity'])) echo $this->phrases['item quantity']; ?></th>
							  
                              <th><?php if(isset($this->phrases['item cost'])) echo $this->phrases['item cost']; ?></th>
							  
							  <th><?php if(isset($this->phrases['total'])) echo $this->phrases['total']; ?></th>
							  
                              <th><?php if(isset($this->phrases['is deleted'])) echo $this->phrases['is deleted']; ?></th>
							  
                              <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action']; ?></th>
							  
                           </tr>
                        </thead>
                        <tbody>
                           <?php if(isset($orderAddons) && count($orderAddons)>0) {
                              $i=1;
							  foreach($orderAddons as $orderAddon):
							?>
                           <tr>
                              <td><?php echo $i; $i++; ?></td>
                              <td><?php echo $orderAddon->addon_name;?></td>
							  <td><?php echo $orderAddon->quantity; ?></td>
                              <td>
							  <?php 
								
								echo $orderAddon->price;
								?></td>
							  
							   <td><?php echo $orderAddon->final_cost; ?></td>
							   <td>
							  <?php 
								if($orderAddon->is_deleted==1)
									echo $this->phrases['yes'];
								else
									echo $this->phrases['no'];
							  
							  ?></td>
							  <td><?php if($orderAddon->is_deleted==0) {?><a class="btn btn-danger" data-toggle="modal" onclick="changeDeleteAddonId(<?php echo $orderAddon->oa_id;?>)" data-target="#deleteModal"><i class="fa fa-trash"></i>
							  <?php }?>
							  </td>
                           </tr>
                           <?php endforeach; } else { ?>
                           <tr>
                              <td colspan="7" align="center"><?php if(isset($this->phrases['no products available'])) echo $this->phrases['no products available']; ?></td>
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
					 </div>
					 <?php } ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <?php 
		$attributes = array('name'=>'update_order','id'=>'update_order');
	  echo form_open(URL_UPDATE_ORDERS,$attributes); ?>
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
            <span class="sr-only"><?php if(isset($this->phrases['close'])) echo $this->phrases['close'];?></span></button>            
            <h4 class="modal-title" id="myModalLabel"><?php if(isset($this->phrases['order update'])) echo $this->phrases['order update'];?></h4>
         </div>
         <div class="modal-body">
            <div class="form-group">
               <label><?php if(isset($this->phrases['update order status'])) echo $this->phrases['update order status'];?><span style="color:red;">*</span></label>
               <?php 
					$data = $orderStatus;
                  echo form_dropdown('status',$data,set_select('status'),'required id="status" class="chzn-select" '); ?>
				  
               <?php echo form_error('status'); ?>
			   <div>
			    <label><?php if(isset($this->phrases['message'])) echo $this->phrases['message'];?></label>
			   <?php echo form_textarea('message'); ?>
			    <?php echo form_error('message'); ?>
			   </div>
            </div>
         </div>
         <input type="hidden" id="order_id" name="order_id" value="<?php if(isset($orderDetails->order_id)) echo $orderDetails->order_id; ?>">       
         <div class="modal-footer">            
            <button type="submit" class="btn btn-success"><?php if(isset($this->phrases['yes'])) echo $this->phrases['yes'];?></button>  
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(isset($this->phrases['no'])) echo $this->phrases['no'];?></button>         
         </div>
      </div>
      <?php echo form_close();?>
   </div>
</div>
<!-- DELETE Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelled-by="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <?php echo form_open(URL_DELETE_ORDER_ITEM); ?>
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
            <span class="sr-only"><?php if(isset($this->phrases['close'])) echo $this->phrases['close'];?></span></button>            
           <h4 class="modal-title" id="myModalLabel"><?php if(isset($this->phrases['delete'])) echo $this->phrases['delete'];?></h4>
         </div>
         <div class="modal-body">
            <div class="form-group">
               <?php if(isset($this->phrases['are you sure to delete'])) echo $this->phrases['are you sure to delete'];?>?    
            <input type="hidden" id="item_record_id" name="item_record_id" value="0">
            <input type="hidden" id="order_type" name="order_type">
            </div>
         </div>
         <input type="hidden" id="order_id" name="order_id" value="<?php if(isset($orderDetails->order_id)) echo $orderDetails->order_id; ?>">       
         <div class="modal-footer">            
            <button type="submit" class="btn btn-success right"><?php if(isset($this->phrases['yes'])) echo $this->phrases['yes'];?></button>  
            <button type="button" class="btn btn-danger right" data-dismiss="modal"><?php if(isset($this->phrases['no'])) echo $this->phrases['no'];?></button>         
         </div>
      </div>
      <?php echo form_close();?>
   </div>
</div>
<script>   
function changeDeleteId(x) 
{   	
	$('#item_record_id').val(x);
	$('#order_type').val('product');
}

function changeDeleteAddonId(x)
{
	$('#item_record_id').val(x);
	$('#order_type').val('addon');
}


</script>
<!--	Validations	-->
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
			$("#update_order").validate({
				ignore: " ",
				rules: {
					status: {
						required: true
					}
				},

				messages: {
					status: {
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
    // $(document).ready(function(){
   
</script>