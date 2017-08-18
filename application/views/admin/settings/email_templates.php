<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url();?>admin" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <?php if(isset($this->phrases['master settings'])) echo $this->phrases['master settings'];?> &gt; <?php if(isset($title)) echo $title;?>
   </div>
   </div>
   <div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
         <div class="col-md-12">
           <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
            
            <table id="example" class="cell-border example" cellspacing="0" width="100%">
               <thead>
                  <tr>
                     <th>#</th>
                     <th><?php if(isset($this->phrases['subject'])) echo $this->phrases['subject'];?></th>
                     <th><?php if(isset($this->phrases['email template'])) echo $this->phrases['email template'];?></th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th>#</th>
                     <th><?php if(isset($this->phrases['subject'])) echo $this->phrases['subject'];?></th>
                     <th><?php if(isset($this->phrases['email template'])) echo $this->phrases['email template'];?></th>
                     <th><?php if(isset($this->phrases['action'])) echo $this->phrases['action'];?></th>
                  </tr>
               </tfoot>
			   <?php if(isset($email_templates) && count($email_templates)>0) {?>
               <tbody>
                  <?php $cnt = 1; foreach($email_templates as $l) { ?>
                  <tr>
                     <td><?php echo $cnt++;?></td>
                     <td><?php echo $l->subject;?></td>
                     <td><?php echo $l->email_template;?></td>
                     <td>
                        <?php 
                           
                           echo anchor(URL_EMAIL_TEMPLATE_SETTINGS.DS.EDIT.DS.$l->id,'<i class="fa fa-edit"></i>','class="btn btn-info" title="Edit"'); 
                           
                           ?> 
                     </td>
                  </tr>
                  <?php } ?>
               </tbody>
			   <?php } ?>
            </table>
         </div>
      </div>
   </div>
</div>
