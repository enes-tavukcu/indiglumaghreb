
<?php

/* Template Name: Home Page */ 

    function add_meta_description()
        {
            ?>
    <meta name="description" content="Bienvenue sur Indiglu Maghreb, votre source fiable d'informations et de soutien pour la gestion du diabète au Maghreb. Explorez nos dernières actualités, conseils d'experts, et solutions adaptées pour une vie saine avec le diabète.">
        <?php
        }

    add_action('wp_head', 'add_meta_description');
    get_header();

?>

<!-- Image sous le header -->

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



<?php get_footer(); ?>


<!-- Le reste de votre contenu de page ici -->
<style>


.image-background {
    position: relative; 
    z-index: 1; 
}


body {
        font-family: 'Inter', sans-serif;
    }
</style>