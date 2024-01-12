<?php

/* Template Name: Politique */

function add_meta_description()
{
    ?>
    <meta name="description" content="Explorez la politique de confidentialité d'Indiglu Maghreb pour comprendre comment nous protégeons et gérons vos données. Nous nous engageons à garantir votre vie privée et à respecter les normes les plus élevées en matière de sécurité des informations.">
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
