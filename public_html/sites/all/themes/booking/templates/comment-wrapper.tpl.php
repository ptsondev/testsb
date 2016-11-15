<?php
  $comments = render($content['comments']);
  $comment_form = render($content['comment_form']);
?>
<section id="comment-region" class="comments <?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($comments && $node->type != 'forum'): ?>
    <h2 class="title">Bình luận từ khách hàng <i class="fa fa-comment" aria-hidden="true"></i></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php print $comments; ?>

  <?php if ($comment_form): ?>
    <h2 class="title comment-form"><?php print t('Add new comment'); ?></h2>
    <?php print $comment_form; ?>
  <?php endif; ?>
</section>