<?php

/* Template Name: Mentions */

function add_meta_description()
{
    ?>
    <meta name="description" content="Consultez les mentions légales d'Indiglu Maghreb pour en savoir plus sur nos conditions d'utilisation, notre politique de confidentialité et nos engagements envers nos utilisateurs. Transparence et confiance sont nos maîtres-mots.">
<?php
}

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