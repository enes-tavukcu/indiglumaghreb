<?php

function add_meta_description()
{
    ?>
    <meta name="description" content="Découvrez des informations approfondies et des conseils pratiques sur Indiglu Maghreb. Chaque page vous offre des ressources précieuses pour enrichir votre compréhension et votre gestion du diabète. Parcourez nos contenus pour une santé optimale.">
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