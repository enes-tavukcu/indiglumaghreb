<?php

function add_meta_description()
{
    ?>
    <meta name="description" content="Plongez dans les détails de nos repas spécialement conçus pour les diabétiques sur Indiglu Maghreb. Chaque recette est une combinaison unique de saveurs et de nutrition, parfaitement équilibrée pour soutenir votre santé et votre bien-être.">
<?php
}

add_action('wp_head', 'add_meta_description');


get_header(); // Inclure l'en-tête du thème


// Afficher la bannière avec l'image de fond et le texte 'RECETTE'
$backgroundImage = get_template_directory_uri() . '/img/imgrecette.png';
echo '<div class="recette-banner" style="background-image: url(\'' . esc_url($backgroundImage) . '\');">';
echo '<h2 class="recette-title">Recettes Authentiques</h2>';
echo '</div>';




// Récupérer le repas actuel
$repas = get_post();

if ($repas) {
    // Afficher le titre du repas centré avec une ligne en dessous
    echo '<div class="title-container">';
    echo '<h1 class="repas-title">' . get_the_title($repas->ID) . '</h1>';
    echo '</div>';

    // Afficher l'image du repas et les informations en dessous
$image = get_field('image', $repas->ID);
if ($image) {
    echo '<div class="image-container">';
    echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" class="img_plat" />';
    // Afficher les informations du repas en dessous de l'image
    echo '<div class="repas-info">';
    
    // Temps de préparation avec icône
    $temps_de_prepa = get_field('temps_de_prepa', $repas->ID);
    if ($temps_de_prepa) {
        echo '<div class="info-item">';
        echo '<img src="' . get_template_directory_uri() . '/img/temps.png" alt="Temps_de_préparation" class="info-icon" />';
        echo '<span class="temps-de-prepa">' . $temps_de_prepa . ' min</span>';
        echo '</div>';
    }
    
    // Nombre de personnes avec icône
    $nb_personne = get_field('nb_personne', $repas->ID);
    if ($nb_personne) {
        echo '<div class="info-item">';
        echo '<img src="' . get_template_directory_uri() . '/img/utilisateur.png" alt="Nombre_de_personnes" class="info-icon" />';
        echo '<span class="nb-personne">' . $nb_personne . ' pers.</span>';
        echo '</div>';
        
    }

    $type = get_field('type', $repas->ID);
    if ($type) {
        echo '<div class="info-item">';
        echo '<span class="type">' . $type . '</span>';
        echo '</div>';
    }

    echo '</div>'; // Fin de .repas-info
    echo '</div>'; // Fin de .image-container
    

}

// ... Votre code PHP existant au-dessus ...

// Section Préparation
echo '<div class="preparation-section">';
echo '<img src="' . get_template_directory_uri() . '/img/SVG.png" alt="Icône_de_préparation" class="preparation-icon">';
echo '<h2 class="preparation-title">';
echo '<span class="preparation-text">Préparation</span>';
echo '<span class="preparation-line"></span>';
echo '</h2>';
echo '</div>';


// ... Votre code PHP existant en dessous pour afficher le contenu personnalisé du repas ...



    // Afficher le contenu personnalisé du repas
    //$contenu_personnalise = get_field('contenu', $repas->ID);
    $etape_1 = get_field('etape_1', $repas->ID);
    $etape_2 = get_field('etape_2', $repas->ID);
    $etape_3 = get_field('etape_3', $repas->ID);
    $etape_4 = get_field('etape_4', $repas->ID);
    $etape_5 = get_field('etape_5', $repas->ID);
    $etape_6 = get_field('etape_6', $repas->ID);
    $etape_7 = get_field('etape_7', $repas->ID);
    $etape_8 = get_field('etape_8', $repas->ID);
    $etape_9 = get_field('etape_9', $repas->ID);
    $etape_10 = get_field('etape_10', $repas->ID);
    $ingredients = get_field('ingredients', $repas->ID);

    if ($ingredients) {
        echo '<h2 class="etape-label">Ingrédients</h2>';
        echo '<div class="etape">' . $ingredients . '</div>';
    }

    if ($etape_1) {
        echo '<h2 class="etape-label">Etape 1</h2>';
        echo '<div class="etape">' . $etape_1 . '</div>';
    }
    if ($etape_2) {
        echo '<h2 class="etape-label">Etape 2</h2>';
        echo '<div class="etape">' . $etape_2 . '</div>';
    }
    if ($etape_3) {
        echo '<h2 class="etape-label">Etape 3</h2>';
        echo '<div class="etape">' . $etape_3 . '</div>';
    }
    if ($etape_4) {
        echo '<h2 class="etape-label">Etape 4</h2>';
        echo '<div class="etape">' . $etape_4 . '</div>';
    }
    if ($etape_5) {
        echo '<h2 class="etape-label">Etape 5</h2>';
        echo '<div class="etape">' . $etape_5 . '</div>';
    }
    if ($etape_6) {
        echo '<h2 class="etape-label">Etape 6</h2>';
        echo '<div class="etape">' . $etape_6 . '</div>';
    }
    if ($etape_7) {
        echo '<h2 class="etape-label">Etape 7</h2>';
        echo '<div class="etape">' . $etape_7 . '</div>';
    }
    if ($etape_8) {
        echo '<h2 class="etape-label">Etape 8</h2>';
        echo '<div class="etape">' . $etape_8 . '</div>';
    }
    if ($etape_9) {
        echo '<h2 class="etape-label">Etape 9</h2>';
        echo '<div class="etape">' . $etape_9 . '</div>';
    }
    if ($etape_10) {
        echo '<h2 class="etape-label">Etape 10</h2>';
        echo '<div class="etape">' . $etape_10 . '</div>';
    }


    


    }
    

// ... autres éléments ...







get_footer(); // Inclure le pied de page du thème
?>
 

<style>
body {
        font-family: 'Inter', sans-serif;
    }
    
.recette-banner {
    background-size: cover;
    background-position: center;
    text-align: center;
    padding: 120px 0;
}

.recette-title {
    color: white;
    font-size: 3em;
    text-transform: uppercase;
    margin: 0;
    font-family: 'Inter', sans-serif;
}

.img_plat {
    width: 600px;
    height: 400px;
    border-radius: 10px;
    object-fit: cover;
}

.repas-title {
    text-align: center;
    font-size: 2em;
    margin-top: 20px;
    margin-bottom: 10px;
    padding-bottom: 10px;
    display: block;
    border-bottom: 3px solid black;
}

.title-container {
    width: 50%;
    margin: 0 auto;
    padding: 20px 0;
}

.image-container {
    text-align: center;
    margin: 20px 0;
}

.repas-info {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 10px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 5px;
}

.info-icon {
    height: 20px;
    width: auto;
}

/* Supprimez le CSS inutilisé */



.preparation-section {
    display: flex;
    align-items: center;
    justify-content: center;
}

.preparation-icon {
    height: 30px; /* Ajustez la taille de l'icône selon vos besoins */
    margin-right: 15px; /* Ajustez l'espace entre l'icône et le texte */
}

.preparation-title {
    font-size: 1.5em; /* Ajustez la taille de la police selon vos besoins */
    display: flex; /* Utilisez flexbox pour aligner les éléments horizontalement */
    align-items: center; /* Centre verticalement le texte et la ligne */
    margin: 0; /* Supprimez la marge par défaut du titre */
}

.preparation-text {
    margin-right: 10px; /* Espace entre le texte et la ligne */
  
}

.etape{
    font-family: 'Inter', sans-serif;
    width: 900px;
    margin: auto;
    margin-bottom: 20px;
}

.preparation-line {
    height: 3px; /* Hauteur de la ligne */
    background-color: #000; /* Couleur de la ligne */
    width: 450px; /* Ajustez la longueur de la ligne */
}

/* ... Le reste de votre CSS ... */

/* ... Le reste de votre CSS ... */

.etape-label{
   
    font-family: 'Inter', sans-serif;
   text-align: center;
}

span{
    font-family: 'Inter', sans-serif;
}
</style>
