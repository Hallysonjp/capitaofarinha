<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <?php if(isset($title)) echo ucfirst($title);?>
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
                     <th><?php if(isset($this->phrases['order no'])) echo $this->phrases['order no'];?></th>
                     <th><?php if(isset($this->phrases['order date'])) echo $this->phrases['order date'];?></th>
                     <th><?php if(isset($this->phrases['order time'])) echo $this->phrases['order time'];?></th>
                     <th><?php if(isset($this->phrases['order cost'])) echo $this->phrases['order cost'];?></th>
                     <th><?php if(isset($this->phrases['customer name'])) echo $this->phrases['customer name'];?></th>
                     <th><?php if(isset($this->phrases['phone'])) echo $this->phrases['phone'];?></th>
                     <th><?php if(isset($this->phrases['address'])) echo $this->phrases['address'];?></th>
                     <th><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?></th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th>#</th>
                     <th><?php if(isset($this->phrases['order no'])) echo $this->phrases['order no'];?></th>
                     <th><?php if(isset($this->phrases['order date'])) echo $this->phrases['order date'];?></th>
                     <th><?php if(isset($this->phrases['order time'])) echo $this->phrases['order time'];?></th>
                     <th><?php if(isset($this->phrases['order cost'])) echo $this->phrases['order cost'];?></th>
                     <th><?php if(isset($this->phrases['customer name'])) echo $this->phrases['customer name'];?></th>
                     <th><?php if(isset($this->phrases['phone'])) echo $this->phrases['phone'];?></th>
                     <th><?php if(isset($this->phrases['address'])) echo $this->phrases['address'];?></th>
                     <th><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?></th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php 						
                     $i=1;
                     foreach($orders as $order):
                     
                     ?>
                  <tr>
                     <td><?php echo $i; $i++; ?></td>
                     <td><?php echo $order->order_id; ?></td>
                     <td><?php echo $order->order_date; ?></td>
                     <td><?php echo $order->order_time; ?></td>
                     <td><?php echo $order->total_cost; ?></td>
                     <td><?php echo ucwords($order->customer_name); ?></td>
                     <td><?php echo $order->phone; ?></td>
                     <td><?php echo ucwords($order->address); ?></td>
                     <td><span class="badge <?php echo $order->status;?>"><?php echo ucwords($order->status); ?></span> </td>
                     <td>
                        <?php echo anchor(URL_VIEW_ORDERS.DS.$order->order_id,'<i class="fa fa-desktop"></i>','class="btn btn-info"'); ?> &nbsp;
                     </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
