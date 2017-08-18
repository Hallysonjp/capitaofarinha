<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <?php if(isset($this->phrases['phrases'])) echo $this->phrases['phrases'];?>
   </div>
</div>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
		<h3><?php if(isset($title)) echo $title;?></h3>
         <div class="col-md-12">
            <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
            <a  href="<?php echo site_url().URL_ADMIN_ADD_PHRASE.DS.ADD;?>" type="button" class="butto" style="text-decoration:none;"> <?php if(isset($this->phrases['add'])) echo $this->phrases['add'];?> <i class="fa fa-plus"></i></a>   
            </br>
            <table id="example" class="cell-border example" cellspacing="0" width="100%">
               <thead>
                  <tr>
                     <th>#</th>
                     <th><?php if(isset($this->phrases['phrase'])) echo $this->phrases['phrase'];?></th>
                     <th><?php if(isset($this->phrases['phrase type'])) echo $this->phrases['phrase type'];?></th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th>#</th>
                     <th><?php if(isset($this->phrases['phrase'])) echo $this->phrases['phrase'];?></th>
                     <th><?php if(isset($this->phrases['phrase type'])) echo $this->phrases['phrase type'];?></th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
                  </tr>
               </tfoot>
               <tbody>
                  <?php if(isset($phrases) && count($phrases)>0) { 						
                     $i=1;
                     foreach($phrases as $phrase)
                     {
                     
                     
                     ?>
                  <tr>
                     <td><?php echo $i; $i++; ?></td>
                     <td><?php echo ucfirst($phrase->text); ?></td>
                     <td><?php echo ucfirst($phrase->phrase_type); ?></td>
                     <td>
						<?php echo anchor(URL_ADMIN_ADD_PHRASE.DS.$phrase->id,'<i class="fa fa-edit"> </i>','class="btn btn-info"'); ?> &nbsp;
                          	
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
