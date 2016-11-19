<?php //echo snh_social_share(); ?>
<article class="<?php print $classes; ?> article-main-body" data-nid="<?php print $node->nid; ?>" >
  

  <div class="content">
    <?php
      // We hide the comments to render below.
      hide($content['comments']);
      hide($content['links']);
      
      print render($content);
    //$body = $node->body[LANGUAGE_NONE][0]['value'];   
    //echo $body;
	
    
     ?>
  </div> <!-- /content -->
  
</article> <!-- /article #node -->