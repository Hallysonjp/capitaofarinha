<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url();?>admin" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_ADMIN_OFFERS;?>" style="text-decoration:none;"><?php if(isset($this->phrases['offers'])) echo $this->phrases['offers'];?></a>  &gt;  <?php if(isset($this->phrases['offer details'])) echo $this->phrases['offer details'];?>
   </div>
</div>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
         <div class="col-md-12">
            <div class="panel">
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['offer details'])) echo $this->phrases['offer details'];?> </div>
               <div class="panel-body">
                  <div class="inner-pages-forms">
                     <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
                     <ul class="ord">
                        <li> <i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['offer name'])) echo $this->phrases['offer name'];?> </strong><?php if(isset($offer_details->offer_name)) echo $offer_details->offer_name; ?></li>
                        <li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['offer cost'])) echo $this->phrases['offer cost'];?> </strong><?php if(isset($offer_details->offer_cost)) echo $offer_details->offer_cost; ?></li>
                        <li> <i class="fa  fa-angle-right"></i><strong> <?php if(isset($this->phrases['offer start date'])) echo $this->phrases['offer start date'];?> </strong><?php if(isset($offer_details->offer_start_date)) echo $offer_details->offer_start_date; ?></li>
                        <li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['offer valid date'])) echo $this->phrases['offer valid date'];?> </strong><?php if(isset($offer_details->offer_valid_date)) echo $offer_details->offer_valid_date; ?></li>
                        <li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['serve no of people'])) echo $this->phrases['serve no of people'];?> </strong><?php if(isset($offer_details->serve_no_of_people)) echo $offer_details->serve_no_of_people; ?></li>
                        <li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['offer conditions'])) echo $this->phrases['offer conditions'];?> </strong><?php if(isset($offer_details->offer_conditions)) echo $offer_details->offer_conditions; ?></li>
                        <li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?></strong> <?php if(isset($offer_details->status)) echo $offer_details->status; ?></li>
                       
                     </ul>
					 <table class="table table-bordered" id="first">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th><?php if(isset($this->phrases['menu name'])) echo $this->phrases['menu name']; ?></th>
                              <th><?php if(isset($this->phrases['item name'])) echo $this->phrases['item name']; ?></th>
                              <th><?php if(isset($this->phrases['item quantity'])) echo $this->phrases['item quantity']; ?></th>
                             
                           </tr>
                        </thead>
                        <tbody>
                           <?php if(isset($offer_products) && count($offer_products)>0) {
                              $i=1;
                                           		  foreach($offer_products as $orderProduct):
                                           	?>
                           <tr>
                              <td><?php echo $i; $i++; ?></td>
                              <td><?php echo $orderProduct->menu_name;?></td>
                              <td><?php echo $orderProduct->item_name;?></td>
                              <td><?php echo $orderProduct->quantity; ?></td>
                              
                           </tr>
                           <?php endforeach; } else { ?>
                           <tr>
                              <td colspan="4" align="center"><?php if(isset($this->phrases['no products available'])) echo $this->phrases['no products available']; ?></td>
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>