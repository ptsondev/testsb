<?php //echo snh_social_share(); ?>
<article class="<?php print $classes; ?> hotel-body" data-nid="<?php print $node->nid; ?>" >
 
  <div class="content">
 
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo MAPKEY;?>"></script>
    <div id="map-canvas" style="width:100%; height:500px;"></div><div id="marker-tooltip"></div>
    <?php
        $item = db_query('SELECT * FROM items WHERE nid=:nid', array(':nid'=>$node->nid))->fetchObject();
        //var_dump($item);
        if($item){
            echo '<script>initialize(' . $item->lat . ', ' . $item->lng . ');</script>';
            echo '<script>addMarker(' . $item->nid . ',' . $item->lat . ', ' . $item->lng . ', "",  "");</script>';        
        }
    ?>
    
    

  </div> <!-- /content -->
  
</article> <!-- /article #node -->