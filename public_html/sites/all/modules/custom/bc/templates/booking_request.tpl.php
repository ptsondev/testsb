<div id="booking-request" class="col-sm-12">
    <form id="booking-request-form">
        <div class="row search-filter" id="filter-des">
            <div class="col-sm-12 col-xs-12">
                <h4><?php echo t('Where would you like to go?'); ?></h4>
                <input type="text" name="txtDes" id="txtDes" />
                <div id="btnCheckIn"><span id="displayCheckIn">Check-in</span> <input type="text" class="dCheck" id="dCheckIn" name="dCheckIn" /></div>
                <div id="btnCheckOut"><span id="displayCheckOut">Check-out</span> <input type="text" class="dCheck" id="dCheckOut" name="dCheckOut" /></div>
                
                
                <!--// hien thi nhung diem den dang tag ////-->
            </div>            
        </div>
        
        <div class="row search-filter" id="filter-room">
            <div class="col-sm-6 col-xs-12">      
                <div>    
                    <h4 class="inl"><?php echo t('Room'); ?></h4> 
                    <i class="fa fa-plus-circle" aria-hidden="true" data-rel="nRoom"></i> <i class="fa fa-minus-circle" aria-hidden="true" data-rel="nRoom"></i>
                    <input type="number" min="0" name="nRoom" id="nRoom" />
                </div>
                <div>
                    <h4 class="inl"><?php echo t('Adults'); ?></h4>
                    <i class="fa fa-plus-circle" aria-hidden="true" data-rel="nAdult"></i> <i class="fa fa-minus-circle" aria-hidden="true"  data-rel="nAdult"></i>
                    <input type="number" min="0" name="nAdult" id="nAdult" />
                </div>
                <div>
                    <h4 class="inl"><?php echo t('Children'); ?></h4>
                    <i class="fa fa-plus-circle" aria-hidden="true" data-rel="nChildren"></i> <i class="fa fa-minus-circle" aria-hidden="true"  data-rel="nChildren"></i>
                    <input type="number" min="0" name="nChildren" id="nChildren" />
                </div>
            </div>
            
            <div class="col-sm-6 col-xs-12">
                <h4><?php echo t('Your budget'); ?></h4> 
                <div id="sPPN"></div>
                <?php echo t('Price Per Night'); ?>: <span id="dPPN">100.000</span>
            </div>  
        </div>
            
              
        
        <div class="row search-filter" id="filer-rating">
            <div class="col-sm-6 col-xs-12">
                <h4 class="inl"><?php echo t('Star Rating'); ?></h4>
                <div id="rStar" class="f-rating"></div>
                
                <h4 class="inl"><?php echo t('Guess rating on TripAdvisor'); ?></h4>
                <div id="rTripAdvisor" class="f-rating"></div>
            </div>            
            <div class="col-sm-6 col-xs-12">
                <h4 style="margin:5px;"><?php echo t('Accomodation Type'); ?></h4>
                <div class="row">
                    <div class="col-sm-4 col-xs-12"><input class="cType" type="checkbox" name="cType[]" value="hotel" /> <?php echo t('Hotel'); ?></div>
                    <div class="col-sm-4 col-xs-12"><input class="cType" type="checkbox" name="cType[]" value="apartment" /> <?php echo t('Apartment'); ?></div>
                    <div class="col-sm-4 col-xs-12"><input class="cType" type="checkbox" name="cType[]" value="hostel" /> <?php echo t('Hostel'); ?></div>
                    <div class="col-sm-4 col-xs-12"><input class="cType" type="checkbox" name="cType[]" value="motel" /> <?php echo t('Motel'); ?></div>
                    <div class="col-sm-4 col-xs-12"><input class="cType" type="checkbox" name="cType[]" value="guestHouse" /> <?php echo t('Guest House'); ?></div>
                    <div class="col-sm-4 col-xs-12"><input class="cType" type="checkbox" name="cType[]" value="resort" /> <?php echo t('Resort'); ?></div>
                    <!--<div class="col-sm-4 col-xs-12"><input class="cType" type="checkbox" name="cType[]" value="serviceApartment" /> <?php echo t('Service Apartment'); ?></div>
                    <div class="col-sm-4 col-xs-12"><input class="cType" type="checkbox" name="cType[]" value="house" /> <?php echo t('House'); ?></div>                    -->
                </div>
            </div>
        </div>    
        
        <div class="buttons">
            <input type="button" id="btnSubmitBookingReQuest" name="btnSubmitBookingReQuest" value="Submit" class="form-submit" data-status="1" />
            <input type="button" id="btnSaveBookingReQuest" name="btnSaveBookingReQuest" value="Save on Draft" class="form-submit" data-status="0" />
        </div>
    </form>
</div>