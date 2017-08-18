<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_LANGUAGES;?>" style="text-decoration:none;"><?php if(isset($this->phrases['languages'])) echo $this->phrases['languages'];?></a> &gt; <?php echo ucfirst($language_name);?> &gt; <?php if(isset($this->phrases['update web phrases'])) echo $this->phrases['update web phrases'];?>
   </div>
</div>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
	  <h3><?php if(isset($title)) echo $title;?></h3>
         <div class="col-md-12">
            <div class="panel">
               <div class="panel-heading ele-hea"><i class="fa fa-edit"></i> <?php echo ucfirst($language_name);?> &gt; <?php if(isset($this->phrases['update web phrases'])) echo $this->phrases['update web phrases'];?>  </div>
               <div class="panel-body paddig">
                  <div class="inner-pages-forms">
                     
                        <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
                        <?php $attributes = array('name'=>'add_edit_phrase','id'=>'add_edit_phrase');
                           echo form_open(URL_EDIT_WEB_PHRASES.DS.$language_id,$attributes) ?>
                        <div class="form-group">
                           <?php if(isset($phrases) && count($phrases)>0) {
                              $i=1;
							  
                              foreach($phrases as $p)
                              { ?>
							  <div class="fied">
                           <label> <?php echo $p->text ?></label>
                           <input type="text" required name="<?php if(isset($p->id)) echo $p->id;?>"  value="<?php if(isset($p->existing_text)) echo $p->existing_text;?>"/></div>
                           <?php } } else {?>
                         
                              <?php if(isset($this->phrases['no data available'])) echo $this->phrases['no data available'];?> 
                          
                           <?php } ?>
                        </div>
                        <div class="form-group">
                           <div class="buttos">
                              <button type="submit" class="butto" ><i class="fa fa-edit"></i><?php if(isset($this->phrases['update'])) echo $this->phrases['update'];?></button>
                           </div>
                        </div>
                        <?php echo form_close(); ?>
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
