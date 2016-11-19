<?php include_once(PATH_TO_INCLUDES . 'header.php'); ?>

<?php
$classSidebar = '';
if(!empty($page['sidebar_first'])){
    $classSidebar = 'have-sidebar';
}
?>

<main id="main-region" class="<?php echo $classSidebar; ?>">
    <div class="main-wrapper inner container">
        <div class="row">
            <?php $class = 'col-md-9 col-sm-12';
            if(empty($page['sidebar_first'])){
                $class='col-md-12 col-sm-12';
            }
            ?>
            <div id="main-content" class="<?php echo $class; ?> col-xs-12">
                <?php 
                if(arg(0)!='user'){
                    echo '<div class="page-title"><h1>'.$title.'</div>';
                }
                ?>
                <?php
                if($messages){
                    echo '<div id="site-message">'.$messages.'</div>';
                }
                if($tabs){
                    echo '<div id="site-tabs">'.render($tabs).'</div>';
                }
                echo render($page['content']);
                ?>
            </div>
            <?php
            if(!empty($page['sidebar_first'])){
                echo '<div id="sidebar" class="col-md-3 col-sm-12 col-xs-12">';
                echo render($page['sidebar_first']);
                echo '</div>';
            }
            ?>
        </div>
    </div>
</main>

<div id="main-footer">
</div>



