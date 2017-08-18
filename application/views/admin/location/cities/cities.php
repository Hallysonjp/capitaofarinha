<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url();?>admin" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <?php if(isset($this->phrases['location master'])) echo $this->phrases['location master'];?> &gt; <?php if(isset($title)) echo $title;?> 
   </div>
</div>
   <div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
		<h3><?php if(isset($title)) echo $title;?></h3>
         <div class="col-md-12">
           <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
            <a href="<?php echo base_url();?>location/cities/Add" type="button" class="butto add" title="Add City"> <?php if(isset($this->phrases['add'])) echo $this->phrases['add'];?>  <i class="fa fa-plus"></i></a> 
			
            <a href="<?php echo base_url();?>location/cities/cities" type="button" class="butto pull-right add"><?php if(isset($this->phrases['upload excel'])) echo $this->phrases['upload excel'];?> </a> 
            <table id="example" class="cell-border example" cellspacing="0" width="100%">
               <thead>
                  <tr>
                     <th>#</th>
                     <th><?php if(isset($this->phrases['city name'])) echo $this->phrases['city name'];?>  </th>
                     <th><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?> </th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?> </th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th>#</th>
                     <th><?php if(isset($this->phrases['city name'])) echo $this->phrases['city name'];?>  </th>
                     <th><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?> </th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?> </th>
                 </tr>
               </tfoot>
               <?php if(isset($cities) && count($cities)>0) { 	?>
               <tbody>
                  <?php 					
                     $i=1;
                     foreach($cities as $c):
                     ?>
                  <tr>
                     <td><?php echo $i++;?></td>
                     <td><?php echo ucwords($c->city_name); ?></td>
                     <td><?php if($c->status=='Active') echo "<span  class='badge success'>".$this->phrases['active']."</span>"; else echo "<span  class='badge danger'>".$this->phrases['inactive']."</span>" ?> 
			   </td>
                    
                     <td>
                        <?php echo anchor('location/cities/Edit/'.$c->city_id.'/'.cleanString($c->city_name),'<i class="fa fa-edit">  </i>','class="btn btn-info" title="Edit"'); ?> &nbsp;
                       
                        <a class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="changeDeleteId(<?php echo $c->city_id;?>)" title="Delete"><i class="fa fa-trash"></i></a>  	
                        
                       
                     </td>
                     
                  </tr>
                  <?php endforeach;?>
               </tbody>
               <?php } ?>
            </table>
         </div>
      </div>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
            <span class="sr-only"><?php if(isset($this->phrases['close'])) echo $this->phrases['close'];?></span></button>            
            <h4 class="modal-title" id="myModalLabel"><?php if(isset($this->phrases['delete'])) echo $this->phrases['delete'];?></h4>
         </div>
         <div class="modal-body"><?php if(isset($this->phrases['are you sure to delete'])) echo $this->phrases['are you sure to delete'];?>?</div>
         <div class="modal-footer">            
            <a type="button" class="btn btn-success" id="delete_no" href="">
            <?php if(isset($this->phrases['yes'])) echo $this->phrases['yes'];?>  </a> 
            <button type="button" class="btn btn-danger" data-dismiss="modal">
            <?php if(isset($this->phrases['no'])) echo $this->phrases['no'];?> </button>         
         </div>
      </div>
   </div>
</div>
<script>   
   function changeDeleteId(x) {   	
   var str = "<?php echo base_url(); ?>location/cities/Delete/" + x;    
	$("#delete_no").attr("href",str);  
   }
   
</script>