<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url();?>admin" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_ADMIN_USERS;?>" style="text-decoration:none;"><?php if(isset($this->phrases['users'])) echo $this->phrases['users'];?></a>  &gt;  <?php if(isset($this->phrases['user details'])) echo $this->phrases['user details'];?>
   </div>
</div>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
         <div class="col-md-12">
            <div class="panel">
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['user details'])) echo $this->phrases['user details'];?> </div>
               <div class="panel-body">
                  <div class="inner-pages-forms">
                     <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
                     <ul class="ord">
                        <li> <i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['first name'])) echo $this->phrases['first name'];?></strong> <?php if(isset($usersDetails->first_name)) echo $usersDetails->first_name; ?></li>
                        <li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['last name'])) echo $this->phrases['last name'];?> </strong><?php if(isset($usersDetails->last_name)) echo $usersDetails->last_name; ?></li>
                        <li> <i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['email'])) echo $this->phrases['email'];?> </strong><?php if(isset($usersDetails->email)) echo $usersDetails->email; ?></li>
                        <li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['phone'])) echo $this->phrases['phone'];?> </strong><?php if(isset($usersDetails->phone)) echo $usersDetails->phone; ?></li>
                        <li><i class="fa  fa-angle-right"></i><strong> <?php if(isset($this->phrases['address'])) echo $this->phrases['address'];?></strong> <?php if(isset($usersDetails->address)) echo $usersDetails->address; ?> </li>
                        <li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['city'])) echo $this->phrases['city'];?> </strong><?php if(isset($usersDetails->city)) echo $usersDetails->city; ?></li>
                        <li><i class="fa  fa-angle-right"></i><strong> <?php if(isset($this->phrases['land mark'])) echo $this->phrases['land mark'];?></strong> <?php if(isset($usersDetails->landmark)) echo $usersDetails->landmark; ?></li>
						
						
                        <!--li><i class="fa  fa-angle-right"></i> <strong><?php if(isset($this->phrases['pincode'])) echo $this->phrases['pincode'];?> </strong><?php if(isset($usersDetails->pincode)) echo $usersDetails->pincode; ?></li-->
                        
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>