<div class="add-todo">
    <div class="col-sm-2 col-xs-6"><input type="text" placeholder="" class="txtTask"/></div>
    <div class="col-sm-2 col-xs-6">
        <select class="txtOrder">
            <option><?php echo t('High');?></option>
            <option><?php echo t('Medium');?></option>
            <option><?php echo t('Low');?></option>
        </select>
    </div>
    <div class="col-sm-2 col-xs-6"><input type="text" placeholder="" class="txtName"/>  </div>
    <div class="col-sm-2 col-xs-6"><input type="text" placeholder="" class="txtTime"/>  </div>
    <div class="col-sm-2 col-xs-6">
        <select class="txtStatus">
            <option><?php echo t('Starting');?></option>
            <option><?php echo t('Pending');?></option>
            <option><?php echo t('Done');?></option>
        </select>
    </div>  
    <div class="col-sm-2 col-xs-6"><input type="text" placeholder="" class="txtNote"/>  </div>
        
    <i class="fa fa-plus" aria-hidden="true" title="Add this member to list"></i>
</div>