<?php

/* Template Name: Forum */

function add_meta_description()
{
    ?>
    <meta name="description" content="Rejoignez notre forum sur Indiglu Maghreb pour échanger avec une communauté engagée. Partagez vos expériences, posez vos questions et obtenez des conseils d'experts sur la gestion du diabète. Un espace d'entraide et d'information pour tous.">
<?php
}

add_action('wp_head', 'add_meta_description');

get_header();
?>

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

<style>
    header {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 9999;
    }

    body {
        font-family: 'Inter', sans-serif;
    }
</style>
