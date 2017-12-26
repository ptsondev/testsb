<?php
global $base_url;
echo '<ol itemscope itemtype="http://schema.org/BreadcrumbList">';
echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
echo '<a href="' . $base_url . '" itemprop="item">';
echo '<span itemprop="name">';
echo 'Trang Chủ';
echo '</span>';
echo '</a> › ';
echo '<meta itemprop="position" content="1" />';
echo '</li>';
$k = 2;
if (true) {// # node và # term
    //    echo '<span itemprop="name">'.$queried_object->post_title.'</span>';     
}
if (arg(0) == 'node' && is_numeric(arg(1))) {
    $node = node_load(arg(1));
    if ($node->type == 'product') {
        $term = taxonomy_term_load($node->field_product_category[LANGUAGE_NONE][0]['tid']);
        $parent = taxonomy_get_parents($term->tid);
        if ($parent) {
            $parent = reset($parent);
            $grand = taxonomy_get_parents($parent->tid);
            if ($grand) {
                $grand = reset($grand);
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
                echo '<a href="' . url('taxonomy/term/' . $grand->tid) . '" itemprop="url">';
                echo '<span itemprop="name">';
                echo $grand->name;
                echo '</span>';
                echo '</a> › ';
                echo '<meta itemprop="position" content="' . $k++ . '" />';
                echo '</li>';
            }
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
            echo '<a href="' . url('taxonomy/term/' . $parent->tid) . '" itemprop="url">';
            echo '<span itemprop="name">';
            echo $parent->name;
            echo '</span>';
            echo '</a> › ';
            echo '<meta itemprop="position" content="' . $k++ . '" />';
            echo '</li>';
        }
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
        echo '<a href="' . url('taxonomy/term/' . $term->tid) . '" itemprop="url">';
        echo '<span itemprop="name">';
        echo $term->name;
        echo '</span>';
        echo '</a> › ';
        echo '<meta itemprop="position" content="' . $k++ . '" />';
        echo '</li>';
    } else if ($node->type == 'course') {
        //$term = taxonomy_term_load($node->field_article_category[LANGUAGE_NONE][0]['tid']);
       
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
        echo '<a href="' . url('courses') . '" itemprop="url">';
        echo '<span itemprop="name">';
        echo 'Khóa Học';
        echo '</span>';
        echo '</a> › ';
        echo '<meta itemprop="position" content="' . $k++ . '" />';
        echo '</li>';

        /*
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
        echo '<a href="' . url('taxonomy/term/' . $term->tid) . '" itemprop="url">';
        echo '<span itemprop="name">';
        echo $term->name;
        echo '</span>';
        echo '</a> › ';
        echo '<meta itemprop="position" content="' . $k++ . '" />';
        echo '</li>';         
         */
    }
    echo '<span itemprop="name">' . $node->title . '</span>';
} else if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))) {
    $term = taxonomy_term_load(arg(2));
    $parent = taxonomy_get_parents($term->tid);
    if ($parent) {
        $parent = reset($parent);
        $grand = taxonomy_get_parents($parent->tid);
        if ($grand) {
            $grand = reset($grand);
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
            echo '<a href="' . url('taxonomy/term/' . $grand->tid) . '" itemprop="url">';
            echo '<span itemprop="name">';
            echo $grand->name;
            echo '</span>';
            echo '</a> › ';
            echo '<meta itemprop="position" content="' . $k++ . '" />';
            echo '</li>';
        }
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
        echo '<a href="' . url('taxonomy/term/' . $parent->tid) . '" itemprop="url">';
        echo '<span itemprop="name">';
        echo $parent->name;
        echo '</span>';
        echo '</a> › ';
        echo '<meta itemprop="position" content="' . $k++ . '" />';
        echo '</li>';
    }
    echo '<span itemprop="name">' . $term->name . '</span>';
} else {
    echo '<span itemprop="name">' . drupal_get_title() . '</span>';
}
echo '</ol>';
?>