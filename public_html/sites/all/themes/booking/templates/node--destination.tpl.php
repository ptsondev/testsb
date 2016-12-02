<?php //echo snh_social_share(); ?>
<article class="<?php print $classes; ?> destination-main-body" data-nid="<?php print $node->nid; ?>" >
  

  <div class="content">
    <div id="des-video">
    <?php      
      $video = $node->field_video_youtube[LANGUAGE_NONE][0]['value'];
      //echo $video;
      $link = $video;
        if (strpos($link,'iframe') !== false) {
          $link =  str_replace('width="760"', 'width="480"', $link);
        }else{ // contain "watch"
          $link =  str_replace('watch?v=', 'embed/', $link);
          $link = '<iframe width="760" height="480" src="'.$link.'" frameborder="0" allowfullscreen></iframe>';
        }
      echo $link;
      
     ?>
     </div>

     <div id="des-best-of-best">
       <h3><?php echo t('Best of the best list');?></h3>
       <?php echo $node->field_best_list[LANGUAGE_NONE][0]['value']; ?>
     </div>

     <?php
        //print render($content['field_photos']);
        echo render(field_view_field('node', $node, 'field_photos', array(
            'label'=>'hidden', 
             'type' => 'juicebox_formatter')));
      ?>

  </div> <!-- /content -->
  
</article> <!-- /article #node -->