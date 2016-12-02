<div class="add-customer">
    <input type="text" placeholder="Name" class="txtNewCus-Name"/> 
    <input type="text" placeholder="Phone Number" class="txtNewCus-Phone"/>  
    <input type="text" placeholder="Email" class="txtNewCus-Email"/>  
    <select class="slNewCus-Old">
        <option value="1"><?php echo t('Adult'); ?></option>
        <option value="0"><?php echo t('Children'); ?></option>
    </select>
    
    <!--<i class="fa fa-times" aria-hidden="true" title="Remove this member"></i>-->
    <i class="fa fa-check" aria-hidden="true" title="Add this member to list"></i>
</div>