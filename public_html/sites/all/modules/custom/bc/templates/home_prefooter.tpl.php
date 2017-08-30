<div id="pre-f1">
    <div class="container">
        <div class="col-sm-12"><h4>Danh sách điểm đến theo chủ đề</h4></div>
        <?php 
        $terms = taxonomy_get_tree(VID_DESTINATION_SUBJECT);
        foreach($terms as $term){
            echo '<div class="col-sm-2 col-xs-4 col-xxs-6"><a href="'.url('taxonomy/term/'.$term->tid).'">'.$term->name.'</a></div>';
        }
        ?>
    </div>
</div>

<div id="pre-f2">
    <div class="container">
        <div class="col-sm-12"><h4>Danh sách điểm đến</h4></div>
        <?php 
        $dess = db_query('SELECT nid, title FROM node WHERE type=:type AND status=1 ORDER BY title COLLATE utf8_bin ASC', array(':type'=>'destination'))->fetchAll();
        foreach($dess as $des){
            echo '<div class="col-sm-2 col-xs-4 col-xxs-6"><a href="'.url('node/'.$des->nid).'">'.$des->title.'</a></div>';
        }
        ?>
    </div>
</div>