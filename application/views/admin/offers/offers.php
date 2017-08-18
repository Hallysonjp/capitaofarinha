<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <?php if(isset($this->phrases['offers'])) echo $this->phrases['offers'];?>
   </div>
</div>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
		 <h3><?php if(isset($title)) echo $title;?></h3>
         <div class="col-md-12">
            <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
            <a  href="<?php echo site_url().URL_CREATE_OFFER?>" type="button" class="butto" style="text-decoration:none;"> <?php if(isset($this->phrases['create offer'])) echo $this->phrases['create offer'];?> <i class="fa fa-plus"></i></a> 
            <table id="example" class="cell-border example" cellspacing="0" width="100%">
               <thead>
                  <tr>
                     <th>#</th>
                     <th><?php if(isset($this->phrases['offer name'])) echo $this->phrases['offer name'];?></th>
                     <th><?php if(isset($this->phrases['offer cost'])) echo $this->phrases['offer cost'];?></th>
                     <th><?php if(isset($this->phrases['offer start date'])) echo $this->phrases['offer start date'];?></th>
                     <th><?php if(isset($this->phrases['offer valid date'])) echo $this->phrases['offer valid date'];?></th>
                     <th><?php if(isset($this->phrases['no of items'])) echo $this->phrases['no of items'];?></th>
                     <th><?php if(isset($this->phrases['serve no of people'])) echo $this->phrases['serve no of people'];?></th>
                     <th><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?></th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th>#</th>
                     <th><?php if(isset($this->phrases['offer name'])) echo $this->phrases['offer name'];?></th>
                     <th><?php if(isset($this->phrases['offer cost'])) echo $this->phrases['offer cost'];?></th>
                     <th><?php if(isset($this->phrases['offer start date'])) echo $this->phrases['offer start date'];?></th>
                     <th><?php if(isset($this->phrases['offer valid date'])) echo $this->phrases['offer valid date'];?></th>
                     <th><?php if(isset($this->phrases['no of items'])) echo $this->phrases['no of items'];?></th>
                     <th><?php if(isset($this->phrases['serve no of people'])) echo $this->phrases['serve no of people'];?></th>
                     <th><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?></th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php 						
                     $i=1;
                     foreach($offers as $offer):
                     
                     ?>
                  <tr>
                     <td><?php echo $i; $i++; ?></td>
                     <td><?php echo $offer->offer_name; ?></td>
                     <td><?php echo $offer->offer_cost; ?></td>
                     <td><?php echo $offer->offer_start_date; ?></td>
                     <td><?php echo $offer->offer_valid_date; ?></td>
                     <td><?php echo $offer->no_of_products; ?></td>
                     <td><?php echo $offer->serve_no_of_people; ?></td>
                     <td><?php if($offer->status=='Active') echo "<span  class='badge success'>".$this->phrases['active']."</span>"; else echo "<span  class='badge danger'>".$this->phrases['inactive']."</span>" ?> 
			   </td>
                     <td>
                        <?php echo anchor(URL_EDIT_OFFER.DS.$offer->offer_id,'<i class="fa fa-edit"></i>','class="btn btn-info"'); ?> &nbsp;
						 <?php echo anchor(URL_OFFER_DETAILS.DS.$offer->offer_id,'<i class="fa fa-desktop"></i>','class="btn btn-info"'); ?> 
                        <a class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="changeDeleteId(<?php echo $offer->offer_id;?>)"><i class="fa fa-trash"></i></a>
                     </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <?php echo form_open(URL_DELETE_OFFER); ?>  
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
            <span class="sr-only"><?php if(isset($this->phrases['close'])) echo $this->phrases['close'];?></span></button>            
            <h4 class="modal-title" id="myModalLabel"><?php if(isset($this->phrases['delete'])) echo $this->phrases['delete'];?></h4>
         </div>
         <div class="modal-body">  
            <?php if(isset($this->phrases['are you sure to delete'])) echo $this->phrases['are you sure to delete'];?>?    
            <input type="hidden" id="offer_id" name="offer_id" value="0">
         </div>
         <div class="modal-footer">            
            <?php echo form_submit('submit',$this->phrases['yes'],'class="btn btn-success"'); ?>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(isset($this->phrases['no'])) echo $this->phrases['no'];?></button>         
         </div>
      </div>
      <?php echo form_close(); ?>    
   </div>
</div>
<script>   
   function changeDeleteId(x) {   	
	$('#offer_id').val(x);
   }
</script>