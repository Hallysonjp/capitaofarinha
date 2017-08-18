<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <?php if(isset($this->phrases['menu'])) echo $this->phrases['menu'];?>
   </div>
</div>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
	    <h3><?php if(isset($title)) echo $title;?></h3>
         <div class="col-md-12">
            <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
			
            <a  href="<?php echo site_url().URL_ADD_MENU; ?>" type="button" class="butto" style="text-decoration:none;"> <?php if(isset($this->phrases['add'])) echo $this->phrases['add'];?> <i class="fa fa-plus"></i></a> 
            <table id="example" class="cell-border example" cellspacing="0" width="100%">
               <thead>
                  <tr>
                     <th>#</th>
                     <th><?php if(isset($this->phrases['menu name'])) echo $this->phrases['menu name'];?></th>
                     <th><?php if(isset($this->phrases['punch line'])) echo $this->phrases['punch line'];?></th>
                     <th><?php if(isset($this->phrases['description'])) echo $this->phrases['description'];?></th>
                     <th><?php if(isset($this->phrases['menu image'])) echo $this->phrases['menu image'];?></th>
                     <th><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?></th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th>#</th>
                      <th><?php if(isset($this->phrases['menu name'])) echo $this->phrases['menu name'];?></th>
                     <th><?php if(isset($this->phrases['punch line'])) echo $this->phrases['punch line'];?></th>
                     <th><?php if(isset($this->phrases['description'])) echo $this->phrases['description'];?></th>
                     <th><?php if(isset($this->phrases['menu image'])) echo $this->phrases['menu image'];?></th>
                     <th><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?></th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php 						
                     $i=1;
                     foreach($menus as $menu):
                     
                     ?>
                  <tr>
                     <td><?php echo $i; $i++; ?></td>
                     <td><?php echo $menu->menu_name; ?></td>
                     <td><?php echo $menu->punch_line; ?></td>
                     <td><?php echo $menu->description; ?></td>
                     <?php 
                        $src = base_url().IMG_DEFAULT;
                        if(isset($menu->menu_image_name) && $menu->menu_image_name!="")
                        {
                        	$src = base_url().IMG_MENU_THUMB.$menu->menu_image_name;
                        }
                        ?>
                     <td><img width="100px;" height="100px;" src="<?php echo $src; ?>"></td>
                    <td><?php if($menu->status=='Active') echo "<span  class='badge success'>".$this->phrases['active']."</span>"; else echo "<span  class='badge danger'>".$this->phrases['inactive']."</span>" ?> 
			   </td>
                     
                     <td>
                        <?php echo anchor(URL_EDIT_MENU.DS.$menu->menu_id,'<i class="fa fa-edit"></i>','class="btn btn-info"'); ?> &nbsp;
                        <?php echo anchor('#','<i class="fa fa-trash"></i>','class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="changeDeleteId('.$menu->menu_id.')"'); ?>
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
<div class="modal fade" id="myModal">
   <div class="modal-dialog">
      <div class="modal-content">
         <?php echo form_open(URL_DELETE_MENU); ?>       
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            <span class="sr-only"><?php if(isset($this->phrases['close'])) echo $this->phrases['close'];?></span></button>            
            <h4 class="modal-title" id="myModalLabel"><?php if(isset($this->phrases['delete'])) echo $this->phrases['delete'];?></h4>
         </div>
         <div class="modal-body">  <?php if(isset($this->phrases['are you sure to delete'])) echo $this->phrases['are you sure to delete'];?>?    </div>
         <input type="hidden" id="menu_id" name="menu_id" value="0">       
         <div class="modal-footer">            
            <button type="submit" class="btn btn-success"><?php if(isset($this->phrases['yes'])) echo $this->phrases['yes'];?></button>  
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(isset($this->phrases['no'])) echo $this->phrases['no'];?></button>         
         </div>
         <?php echo form_close();?>
      </div>
   </div>
</div>
<script>   
   function changeDeleteId(x) {   	
   $('#menu_id').val(x);
   }
</script>