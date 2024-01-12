<?php

/* Template Name: A propos */

function add_meta_description()
{
    ?>
    <meta name="description" content="Découvrez Indiglu Maghreb : notre mission, notre équipe et notre engagement dans la lutte contre le diabète au Maghreb. Apprenez-en plus sur notre approche unique et nos solutions innovantes. Rejoignez-nous pour un avenir en meilleure santé !">
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