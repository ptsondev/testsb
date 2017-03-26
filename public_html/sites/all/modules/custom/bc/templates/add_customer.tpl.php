<div class="add-customer">
    <input type="text" placeholder="<?php echo t('Full name');?>" class="txtNewCus-Name"/> 
    <input type="text" placeholder="<?php echo t('Phone number');?>" class="txtNewCus-Phone"/>  
    <input type="text" placeholder="<?php echo t('Email');?>" class="txtNewCus-Email"/>  
    <select class="slNewCus-Old">
        <option value="1"><?php echo t('Adult'); ?></option>
        <option value="0"><?php echo t('Children'); ?></option>
    </select>
    
    <!--<i class="fa fa-times" aria-hidden="true" title="Remove this member"></i>-->
    <i class="fa fa-plus" aria-hidden="true" title="<?php echo t('Add this member to list');?>"></i>
</div>