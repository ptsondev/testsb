<div class="i-comment <?php print $classes . ' ' . $zebra; ?>">
    
       <?php
      if(!user_has_role(RID_PAGE_MANAGER) || user_is_anonymous()){
			hide($content['links']);
	  }
	  
	 // $comment_body = ($content['comment_body']['#object']);
	 // echo $comment_body->comment_body[LANGUAGE_NONE][0]['value'];
      print render($content);
      ?>
    
    <span class="submitted"><?php print $submitted; ?></span>
 
</div>