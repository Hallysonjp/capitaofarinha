<div class="col-md-10">
<div class="admin-body">
  <?php echo $this->session->flashdata('message');?>
  
  <div class="bloks">
<div class="col-lg-3">
 <a href="<?php echo site_url().URL_ADMIN_ITEMS;?>">
<div class="blo clearfix">
	
 <i class="fa fa-bars"></i> 
 <h3>  <?php if(isset($this->phrases['view items'])) echo $this->phrases['view items'];?> 
            </h3> 
           
            </div> </a>
      
</div>
<div class="col-lg-3">
 <a href="<?php echo site_url().URL_ADD_ITEMS;?>">
<div class="blo clearfix">
	
                     <i class="fa fa-plus col1"></i> 
              <h3><?php if(isset($this->phrases['add item'])) echo $this->phrases['add item'];?></h3>
       
           
            </div> </a>
</div>
<div class="col-lg-3">
<a href="<?php echo site_url().URL_ADMIN_OFFERS;?>">
<div class="blo clearfix">
	
	 <i class="fa  fa-asterisk"></i> 
  <h3><?php if(isset($this->phrases['view offers'])) echo $this->phrases['view offers'];?></h3>
              
          
            </div>  </a>
</div>
<div class="col-lg-3">
 <a href="<?php echo site_url().URL_CREATE_OFFER;?>" >
<div class="blo clearfix">
	
    <i class="fa fa-plus col3"></i> 
<h3><?php if(isset($this->phrases['create offer'])) echo $this->phrases['create offer'];?></h3>
          
           
            </div> </a>
</div>
<div class="col-lg-3">
<a href="<?php echo site_url().URL_SITE_SETTINGS;?>">
<div class="blo clearfix">
	
	 <i class="fa fa-cogs col4"></i> 
 <h3><?php if(isset($this->phrases['app settings'])) echo $this->phrases['app settings'];?></h3>

            </div> </a>
</div>
</div>
 <div class="do-b">
   <div class="col-md-6">
      <div class="panel">
         <div class="panel-heading ele-hea">   <?php if(isset($this->phrases['latest orders'])) echo $this->phrases['latest orders']?> </div>
         <div class="panel-body paddig">
            <div class="ele-body">
               <?php 
                  if(isset($orders)) 
                  {    
					
			  foreach($orders as $n): ?>
               <a href="<?php echo base_url().URL_VIEW_ORDERS.DS.$n->order_id; ?>">
                  <ul>
                     <li>
                        <div class="ale-list"> <i class="fa fa-list-ol"> </i></div>
                     </li>
                     <li><?php echo ucwords($n->customer_name); ?> </li>
                     <li> <span style="align:right;"><?php if(isset($this->phrases['posted on'])) echo $this->phrases['posted on']?> 
                        <?php echo explode(",", timespan(strtotime(($n->posted_date)), time()))[0]; ?> 
						
						<?php if(isset($this->phrases['ago'])) echo $this->phrases['ago']; ?>
                        </span> 
                     </li>
                  </ul>
               </a>
               <?php endforeach; } ?>	
               <a  class="butto" href="<?php echo site_url();?>orders" style="text-decoration:none;"> <?php if(isset($this->phrases['view all'])) echo $this->phrases['view all'];?></a>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6">
      <div class="panel">
         <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['latest offers'])) echo $this->phrases['latest offers']?> 
         </div>
         <div class="panel-body paddig">
            <div class="ele-body">
               <?php 
                  if(isset($offers)) 
                  {    foreach($offers as $n): ?>
               <a href="<?php echo base_url().URL_OFFER_DETAILS.DS.$n->offer_id; ?>">
                  <ul>
                     <li>
                        <div class="ale-list"> <i class="fa fa-asterisk"> </i></div>
                     </li>
                     <li><?php echo ucwords($n->offer_name); ?> </li>
                     <li> <span style="align:right;"><?php if(isset($this->phrases['posted on'])) echo $this->phrases['posted on']?> 
                        <?php echo  explode(",", timespan(strtotime(($n->posted_date)), time()))[0]; ?> 
						<?php if(isset($this->phrases['ago'])) echo $this->phrases['ago']; ?>
                        </span> 
                     </li>
                  </ul>
               </a>
               <?php endforeach; } ?>	
               <a  class="butto" href="<?php echo site_url();?>admin/offers" style="text-decoration:none;"> <?php if(isset($this->phrases['view all'])) echo $this->phrases['view all'];?></a>	
            </div>
         </div>
      </div>
   </div></div>
</div>