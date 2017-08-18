<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <?php if(isset($this->phrases['items'])) echo $this->phrases['items'];?>
   </div>
</div> 
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
	  <h3><?php if(isset($title)) echo $title;?></h3>
         <div class="col-md-12">
            <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
            <a  href="<?php echo site_url().URL_ADD_ITEMS?>" type="button" class="butto" style="text-decoration:none;"> <?php if(isset($this->phrases['add'])) echo $this->phrases['add'];?> <i class="fa fa-plus"></i></a> 
            <table id="example" class="cell-border example" cellspacing="0" width="100%">
               <thead>
                  <tr>
                     <th>#</th>
                     <th><?php if(isset($this->phrases['menu name'])) echo $this->phrases['menu name'];?></th>
                     <th><?php if(isset($this->phrases['item name'])) echo $this->phrases['item name'];?></th>
                     <th><?php if(isset($this->phrases['item cost'])) echo $this->phrases['item cost'];?></th>
					 <th><?php if(isset($this->phrases['item type'])) echo $this->phrases['item type'];?></th>
                     <th><?php if(isset($this->phrases['description'])) echo $this->phrases['description'];?></th>
                     <th><?php if(isset($this->phrases['item image'])) echo $this->phrases['item image'];?></th>
                     <th><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?></th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th>#</th>
                     <th><?php if(isset($this->phrases['menu name'])) echo $this->phrases['menu name'];?></th>
                     <th><?php if(isset($this->phrases['item name'])) echo $this->phrases['item name'];?></th>
                     <th><?php if(isset($this->phrases['item cost'])) echo $this->phrases['item cost'];?></th>
                     <th><?php if(isset($this->phrases['item type'])) echo $this->phrases['item type'];?></th>
                     <th><?php if(isset($this->phrases['description'])) echo $this->phrases['description'];?></th>
                     <th><?php if(isset($this->phrases['item image'])) echo $this->phrases['item image'];?></th>
                     <th><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?></th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php 						
                     $i=1;
                     foreach($items as $item):
                      
                     ?>
                  <tr>
                     <td><?php echo $i; $i++; ?></td>
                     <td><?php echo $item->menu_name; ?></td>
                     <td><?php echo $item->item_name; ?></td>
                     <td><?php echo $item->item_cost; ?></td>
                     <td><?php echo $item->item_type; ?></td>
                     <td><?php echo $item->item_description; ?></td>
                     <?php 
                        $src = base_url().IMG_DEFAULT;
                        if(isset($item->item_image_name) && $item->item_image_name!="")
                        {
                        	$src = base_url().IMG_ITEMS_THUMB.$item->item_image_name;
                        }
                        ?>
                     <td><img width="100px;" height="100px;" src="<?php echo $src; ?>"></td>
                     <td><?php if($item->status=='Active') echo "<span  class='badge success'>".$this->phrases['active']."</span>"; else echo "<span  class='badge danger'>".$this->phrases['inactive']."</span>" ?> 
			   </td>
                    
                     <td>
                        <?php echo anchor(URL_EDIT_ITEMS.DS.$item->item_id,'<i class="fa fa-edit"></i>','class="btn btn-info"'); ?> &nbsp;
                        <a class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="changeDeleteId(<?php echo $item->item_id;?>)"><i class="fa fa-trash"></i></a>
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
      <?php echo form_open(URL_DELETE_ITEMS); ?>  
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
            <span class="sr-only"><?php if(isset($this->phrases['close'])) echo $this->phrases['close'];?></span></button>            
            <h4 class="modal-title" id="myModalLabel"><?php if(isset($this->phrases['delete'])) echo $this->phrases['delete'];?></h4>
         </div>
         <div class="modal-body">  
            <?php if(isset($this->phrases['are you sure to delete'])) echo $this->phrases['are you sure to delete'];?>?    
            <input type="hidden" id="item_id" name="item_id" value="0">
         </div>
         <div class="modal-footer">            
            <button type="submit" class="btn btn-success" id="delete_no"><?php if(isset($this->phrases['yes'])) echo $this->phrases['yes'];?></button>  <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(isset($this->phrases['no'])) echo $this->phrases['no'];?></button>         
         </div>
      </div>
      <?php echo form_close(); ?>    
   </div>
</div>
<script>   
   function changeDeleteId(x) 
   {   	
   $('#item_id').val(x);
   }
</script>