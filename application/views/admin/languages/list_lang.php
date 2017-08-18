<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <?php if(isset($this->phrases['languages'])) echo $this->phrases['languages'];?>
   </div>
</div>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
		<h3><?php if(isset($title)) echo $title;?></h3>
         <div class="col-md-12">
            <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
            <a  href="<?php echo site_url().URL_ADMIN_ADD_LANG;?>" type="button" class="butto" style="text-decoration:none;"> <?php if(isset($this->phrases['add'])) echo $this->phrases['add'];?> <i class="fa fa-plus"></i></a>   
            </br>
            <table id="example" class="cell-border example" cellspacing="0" width="100%">
               <thead>
                  <tr>
                     <th>#</th>
                     <th><?php if(isset($this->phrases['language name'])) echo $this->phrases['language name'];?></th>
                     <th><?php if(isset($this->phrases['language code'])) echo $this->phrases['language code'];?></th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th>#</th>
                     <th><?php if(isset($this->phrases['language name'])) echo $this->phrases['language name'];?></th>
                     <th><?php if(isset($this->phrases['language code'])) echo $this->phrases['language code'];?></th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php if(isset($langs) && count($langs)>0) { 						
                     $i=1;
                     foreach($langs as $lang)
                     {
                     
                     
                     ?>
                  <tr>
                     <td><?php echo $i; $i++; ?></td>
                     <td><?php echo ucfirst($lang->lang_name); ?></td>
                     <td><?php echo ucfirst($lang->lang_code); ?></td>
                     <td>
						
                        <?php echo anchor(URL_EDIT_WEB_PHRASES.'/editPhrase/'.$lang->id,'<i class="fa fa-edit">'.(isset($this->phrases['update web phrases'])) ? $this->phrases['update web phrases'] : "Update web phrase".' </i>','class="btn btn-info"'); ?> &nbsp;
                        <?php echo anchor(URL_EDIT_APP_PHRASE.'/editPhrase/'.$lang->id,'<i class="fa fa-edit"> ' . (isset($this->phrases['update app phrases'])) ? $this->phrases['update app phrases'] : "Update app phrase" .'</i>','class="btn btn-info"'); ?> &nbsp;
						<?php echo anchor(URL_ADMIN_ADD_LANG.DS.$lang->id,'<i class="fa fa-edit"> </i>','class="btn btn-info"'); ?> &nbsp;
                        <a class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="changeDeleteId(<?php echo $lang->id;?>)"><i class="fa fa-trash"></i></a>  	
                     </td>
                  </tr>
                  <?php } } else {?>
                  <tr>
                     <td colspan="5"><?php if(isset($this->phrases['no data available'])) echo $this->phrases['no data available'];?></td>
                  </tr>
                  <?php } ?>
               </tbody>
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
            <a type="button" class="btn btn-success" id="delete_no" href=""><?php if(isset($this->phrases['yes'])) echo $this->phrases['yes'];?></a>  <button type="button" class="btn btn-danger" data-dismiss="modal"><?php if(isset($this->phrases['no'])) echo $this->phrases['no'];?></button>         
         </div>
      </div>
   </div>
</div>
<script>   
   function changeDeleteId(x) {   	
   var str = "<?php echo site_url(); ?>admin/languages/delete/" + x;    
   $("#delete_no").attr("href",str);  
   }
</script>