<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url();?>admin" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <?php if(isset($this->phrases['gallery'])) echo $this->phrases['gallery'];?> 
   </div>
</div>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
		 <h3><?php if(isset($title)) echo $title;?></h3>
         <div class="col-md-12">
            <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
            <a  href="<?php echo site_url().URL_ADD_GALLERY;?>" type="button" class="butto" style="text-decoration:none;"> <?php if(isset($this->phrases['add'])) echo $this->phrases['add'];?> <i class="fa fa-plus"></i></a>   
            <table id="example" class="cell-border example" cellspacing="0" width="100%">
               <thead>
                  <tr>
                     <th>#</th>
                     <th><?php if(isset($this->phrases['image'])) echo $this->phrases['image'];?></th>
                     <th><?php if(isset($this->phrases['alt text'])) echo $this->phrases['alt text'];?></th>
                     <th><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?></th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th>#</th>
                     <th><?php if(isset($this->phrases['image'])) echo $this->phrases['image'];?></th>
                     <th><?php if(isset($this->phrases['alt text'])) echo $this->phrases['alt text'];?></th>
                     <th><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?></th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php if(isset($gallerys) && count($gallerys)>0) { 						
                     $i=1;
                     foreach($gallerys as $gallery)
                     {
                                          
                     ?>
                  <tr>
                     <td><?php echo $i; $i++; ?></td>
                     <?php if(file_exists(IMG_GALLERY_IMAGES.$gallery->image_name))
                        $src = base_url().IMG_GALLERY_IMAGES.$gallery->image_name;
                        else
                        $src = base_url().IMG_DEFAULT;
                     ?>
                     <td><img src="<?php echo $src; ?>" height="100px" width="100px"/></td>
                     <td><?php echo $gallery->alt_text; ?></td>
                     
                     <td><?php if($gallery->status=='Active') echo "<span  class='badge success'>".$this->phrases['active']."</span>"; else echo "<span  class='badge danger'>".$this->phrases['inactive']."</span>" ?> 
			   </td>
                     <td>
						<?php echo anchor(URL_EDIT_GALLERY.DS.$gallery->gallery_id,'<i class="fa fa-edit"></i>','class="btn btn-info"'); ?> &nbsp;
                        <?php echo anchor('#','<i class="fa fa-trash"></i>','class="btn btn-danger"  data-toggle="modal" data-target="#myModal" onclick="changeDeleteId('.$gallery->gallery_id.')"'); ?> 
                     </td>
                  </tr>
                  <?php } } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div> 
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <?php echo form_open(URL_DELETE_GALLERY); ?>
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
            <span class="sr-only"><?php if(isset($this->phrases['close'])) echo $this->phrases['close'];?></span></button>            
            <h4 class="modal-title" id="myModalLabel"><?php if(isset($this->phrases['delete'])) echo $this->phrases['delete'];?></h4>
         </div>
         <div class="modal-body">  <?php if(isset($this->phrases['are you sure to delete'])) echo $this->phrases['are you sure to delete'];?>?    </div>
         <?php echo form_input(array('name' => 'gallery_id', 'type'=>'hidden', 'id' =>'gallery_id')); ?>
         <div class="modal-footer">            
            <button type="submit" class="btn btn-success" id="delete_no"><?php if(isset($this->phrases['yes'])) echo $this->phrases['yes'];?></button>  
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(isset($this->phrases['no'])) echo $this->phrases['no'];?></button>         
         </div>
      </div>
   </div>
   <?php echo form_close(); ?>   
</div>
<script>   
   function changeDeleteId(x) {   	
   
   	$("#gallery_id").val(x);  
   }
</script>