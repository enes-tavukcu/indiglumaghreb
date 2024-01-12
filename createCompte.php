<?php

/* Template Name: Creation Compte */

function add_meta_description()
{
    ?>
    <meta name="description" content="Création de compte">
<?php
}

add_action('wp_head', 'add_meta_description');
get_header(); ?>

<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        echo '<div style="font-family: Inter, sans-serif; ">';
        the_content();
        echo '</div>';
    }
}
?>
<?php   

get_footer(); ?>