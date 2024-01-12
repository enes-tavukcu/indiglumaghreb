<?php

function add_meta_description()
{
    ?>
    <meta name="description" content="Découvrez des articles enrichissants sur Indiglu Maghreb. Chaque publication vous offre des perspectives uniques et des informations détaillées sur la gestion du diabète, la santé et le bien-être adaptés aux réalités du Maghreb.">
<?php
}

add_action('wp_head', 'add_meta_description'); 
get_header();

// Afficher la bannière avec l'image de fond et le texte 'RECETTE'
$backgroundImage = get_template_directory_uri() . '/img/article-banner.png';
echo '<div class="article-banner" style="background-image: url(\'' . esc_url($backgroundImage) . '\');">';
echo '<h2 class="article-title">Article</h2>';
echo '</div>';

?>

<div class="container text-center"> <!-- Added 'text-center' class -->
    <div class="row">
        <div class="col-md-12">
            <h2><?php the_title(); ?></h2>
                <div class="line"></div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    echo '<div style="font-family: Inter, sans-serif; font-size: 12x; width: 1000px; margin: auto">';
                    the_content();
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</div> <!-- Added closing tag for the container -->

<?php
get_footer();
?>


<style>
    .article-banner {
    background-size: cover;
    background-position: center;
    text-align: center;
    padding: 120px 0;
}

.article-title {
    color: white;
    font-size: 3em;
    text-transform: uppercase;
    margin: 0;
    font-family: 'Inter', sans-serif;
}

h2{
    text-align: center;
    font-family: 'Inter', sans-serif;
    margin-top: 50px;
    margin-bottom: 50px;
}

.line {
    width: 400px;
    height: 3px;
    background-color: #000000;
    margin: 20px auto;
    margin-bottom: 50px;
}

.img {
    justify-content: center;
    width: 500px;
    height: 400px;
    margin: auto;
    object-fit: cover;
}

body {
        font-family: 'Inter', sans-serif;
    }

</style>