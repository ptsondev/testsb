<div id="place-tabs">
    <div class="tab tab-general-info current" data-ref="general-info">
        <i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo t('General Information');?>
    </div>
    <div class="tab tab-transform" data-ref="transform">
        <i class="fa fa-bus" aria-hidden="true"></i> <?php echo t('Transportation');?>
    </div>
    <div class="tab tab-advise" data-ref="advise">
        <i class="fa fa-hand-o-right" aria-hidden="true"></i> <?php echo t('Necessary advice');?>
    </div>
    <div class="tab tab-best-time" data-ref="best-time">
        <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo t('Recommended Time');?>
    </div>
    <div class="tab tab-prepare" data-ref="prepare">
        <i class="fa fa-lightbulb-o" aria-hidden="true"></i> <?php echo t('To do task');?>
    </div>        
    <div class="tab tab-videos" data-ref="videos">
        <i class="fa fa-film" aria-hidden="true"></i> <?php echo t('Videos');?>
    </div>
</div>

<?php $place = node_load($place_id); ?>
<div id="place-tabs-ref">
    <div id="place-general-info" class="tab-ref">
      <?php echo $place->field_general_info[LANGUAGE_NONE][0]['value'];?>
    </div>
    <div id="place-transform" class="tab-ref">
        <?php echo $place->field_transport_info[LANGUAGE_NONE][0]['value'];?>
    </div>
    <div id="place-advise" class="tab-ref">
        <?php echo $place->field_advise_info[LANGUAGE_NONE][0]['value'];?>
    </div>
    <div id="place-best-time" class="tab-ref">
        <?php echo $place->field_best_time_info[LANGUAGE_NONE][0]['value'];?>
    </div>
    <div id="place-prepare" class="tab-ref">
       <?php echo $place->field_todo_info[LANGUAGE_NONE][0]['value'];?>
    </div> 
    <div id="place-videos" class="tab-ref">        
       <?php 
            display_video($place);
       ?>
    </div> 
</div>