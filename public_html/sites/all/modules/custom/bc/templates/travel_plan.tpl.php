<div id="list-favorite" class="list-top">
    <h2 class="col-sm-12 title-top">
        <i class="fa fa-heart-o" aria-hidden="true"></i> 
        Danh sách yêu thích
    </h2>    
        <?php 
            global $user;
            $nids = db_query('SELECT nid FROM sb_user_tour WHERE uid=:uid AND type=:type ORDER BY created ASC', 
                    array(':uid'=>$user->uid, ':type'=>MARK_FAVORITE))->fetchCol();
            $nodes = node_load_multiple($nids);
            
            for($i=0; $i<2; $i++){
                $node = array_pop($nodes);
                if($node){                
                    echo '<div id="top-'.($i+1).'" class="list-item col-sm-6 col-xs-12">';
                        echo '<div class="btnDelete" data-nid="'.$node->nid.'" data-group="favorite"></div>';
                        echo '<a href="'.('node/'.$node->nid).'">';
                            echo '<div class="top-des-wrapper">';
                                echo '<img src="'.image_style_url('width_2_height', $node->field_background[LANGUAGE_NONE][0]['uri']).'" />';
                                echo '<div class="title">'.$node->title.'</div>';
                            echo '</div>';
                        echo '</a>';
                    echo '</div>';
                }
            }
            
            
            for($i=0; $i<4; $i++){
                $node = array_pop($nodes);
                if($node){                
                    echo '<div id="top-'.($i+2).'" class="list-item col-sm-3 col-xs-6">';
                        echo '<div class="btnDelete"  data-nid="'.$node->nid.'" data-group="favorite"></div>';
                        echo '<a href="'.('node/'.$node->nid).'">';
                            echo '<div class="top-des-wrapper">';
                                echo '<img src="'.image_style_url('square', $node->field_background[LANGUAGE_NONE][0]['uri']).'" />';
                                echo '<div class="title">'.$node->title.'</div>';
                            echo '</div>';
                        echo '</a>';
                    echo '</div>';
                }
            }
        ?>    
</div>




<div id="list-doing" class="list-top">
    <h2 class="col-sm-12 title-top">
        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
        Kế hoạch đang thực hiện
    </h2>    
        <?php 
            global $user;
            /*$nids = db_query('SELECT nid FROM sb_user_tour WHERE uid=:uid AND type=:type ORDER BY created ASC', 
                    array(':uid'=>$user->uid, ':type'=>MARK_DOING))->fetchCol();*/
            $nids = db_query('SELECT nid FROM node WHERE type=:type AND uid=:uid', array(
                ':type'=>'custom_tour',
                ':uid'=>$user->uid
            ))->fetchCol();
            $nodes = node_load_multiple($nids);
            
            for($i=0; $i<2; $i++){
                $node = array_pop($nodes);
                if($node){                
                    echo '<div id="top-'.($i+1).'" class="list-item col-sm-6 col-xs-12">';
                        echo '<div class="btnDelete"  data-nid="'.$node->nid.'" data-group="doing"></div>';
                        echo '<a href="'.('node/'.$node->nid).'">';
                            echo '<div class="top-des-wrapper">';
                                echo '<img src="'.image_style_url('width_2_height', $node->field_background[LANGUAGE_NONE][0]['uri']).'" />';
                                echo '<div class="title">'.$node->title.'</div>';
                            echo '</div>';
                        echo '</a>';
                    echo '</div>';
                }
            }
            
            
            for($i=0; $i<4; $i++){
                $node = array_pop($nodes);
                if($node){                
                    echo '<div id="top-'.($i+2).'" class="col-sm-3 col-xs-6">';
                        echo '<div class="btnDelete"  data-nid="'.$node->nid.'" data-group="doing"></div>';
                        echo '<a href="'.('node/'.$node->nid).'">';
                            echo '<div class="top-des-wrapper">';
                                echo '<img src="'.image_style_url('square', $node->field_background[LANGUAGE_NONE][0]['uri']).'" />';
                                echo '<div class="title">'.$node->title.'</div>';
                            echo '</div>';
                        echo '</a>';
                    echo '</div>';
                }
            }
        ?>    
</div>






<div id="list-done" class="list-top">
    <h2 class="col-sm-12 title-top">        
    <i class="fa fa-check-square-o" aria-hidden="true"></i>
        Kế hoạch đã thực hiện
    </h2>    
        <?php 
            global $user;
            $nids = db_query('SELECT nid FROM sb_user_tour WHERE uid=:uid AND type=:type ORDER BY created ASC', 
                    array(':uid'=>$user->uid, ':type'=>MARK_DONE))->fetchCol();
            $nodes = node_load_multiple($nids);
            
            for($i=0; $i<2; $i++){
                $node = array_pop($nodes);
                if($node){                
                    echo '<div id="top-'.($i+1).'" class="col-sm-6 col-xs-12">';
                        echo '<div class="btnDelete"  data-nid="'.$node->nid.'" data-group="done"></div>';
                        echo '<a href="'.('node/'.$node->nid).'">';
                            echo '<div class="top-des-wrapper">';
                                echo '<img src="'.image_style_url('width_2_height', $node->field_background[LANGUAGE_NONE][0]['uri']).'" />';
                                echo '<div class="title">'.$node->title.'</div>';
                            echo '</div>';
                        echo '</a>';
                    echo '</div>';
                }
            }
            
            
            for($i=0; $i<4; $i++){
                $node = array_pop($nodes);
                if($node){                
                    echo '<div id="top-'.($i+2).'" class="col-sm-3 col-xs-6">';
                        echo '<div class="btnDelete"  data-nid="'.$node->nid.'" data-group="done"></div>';
                        echo '<a href="'.('node/'.$node->nid).'">';
                            echo '<div class="top-des-wrapper">';
                                echo '<img src="'.image_style_url('square', $node->field_background[LANGUAGE_NONE][0]['uri']).'" />';
                                echo '<div class="title">'.$node->title.'</div>';
                            echo '</div>';
                        echo '</a>';
                    echo '</div>';
                }
            }
        ?>    
</div>