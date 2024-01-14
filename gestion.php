<?php

/* Template Name: Gestion */

function add_meta_description()
{
    ?>
    <meta name="description" content="Découvrez des outils et des ressources innovantes sur Indiglu Maghreb pour une gestion efficace du diabète. Notre plateforme vous offre des conseils experts, des mises à jour médicales et des solutions personnalisées adaptées à vos besoins.">
<?php
}

add_action('wp_head', 'add_meta_description');



// Fonction pour obtenir les données des médecins depuis WordPress
function get_doctors_data() {
    $args = array(
        'post_type' => 'medecin', // Assurez-vous que c'est le bon type de contenu
        'posts_per_page' => -1,
    );

    $doctors = new WP_Query($args);

    $result = array();

    if ($doctors->have_posts()) {
        while ($doctors->have_posts()) {
            $doctors->the_post();

            // Ajoutez d'autres champs au besoin
            $doctor_data = array(
                'name' => get_the_title(),
                'lat' => get_post_meta(get_the_ID(), 'lat', true),
                'lon' => get_post_meta(get_the_ID(), 'lon', true),
                'adresse' => get_post_meta(get_the_ID(), 'adresse', true),
            );

            array_push($result, $doctor_data);
        }
        wp_reset_postdata();
    }

    return $result;
}

// Enqueue Leaflet script
function enqueue_leaflet_scripts() {
    wp_enqueue_script('leaflet', 'https://unpkg.com/leaflet/dist/leaflet.js', array(), null, true);
}

// Ajouter les scripts dans la file d'attente WordPress
add_action('wp_enqueue_scripts', 'enqueue_leaflet_scripts');

acf_form_head();
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

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <head>
        <title>OpenStreetMap avec PHP</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    </head>

    <div class="creat-repas">
        <button class="type-btn" onclick="scrollToForm()">Ajouter medecin</button>
    </div>

        <div id="map"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var map = L.map('map').fitBounds([
            [33.8869, 7.4375], // Tunisia
            [35.0339, 0.2596], // Algeria
            [31.7917, -7.0926] // Morocco
        ]);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        
<?php
    $doctors = get_doctors_data();

        foreach ($doctors as $doctor) :
            $lat = $doctor['lat'];
            $lon = $doctor['lon'];
            $name = esc_js($doctor['name']);
            $adresse = esc_js($doctor['adresse']);

            // Check if the point is in Algeria
            if ($lat >= 28.0339 && $lat <= 37.0902 && $lon >= -8.6703 && $lon <= 11.9997) {
                $markerColor = 'green';
            } else {
                $markerColor = 'red';
            }

            // Check if the point is in Morocco
            if ($lat >= 27.6667 && $lat <= 35.9167 && $lon >= -13.1725 && $lon <= -0.9983) {
                $markerColor = 'blue';
            } else {
                $markerColor = 'red';
            }

            // Check if the point is in Tunisia
            if ($lat >= 30.2404 && $lat <= 37.5431 && $lon >= 7.5245 && $lon <= 11.5983) {
                $markerColor = 'pink';
            } else {
                $markerColor = 'red';
            }
?>

    var marker = L.marker([<?php echo $lat; ?>, <?php echo $lon; ?>], { icon: L.icon({ iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-<?php echo $markerColor; ?>.png', shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png', iconSize: [25, 41], iconAnchor: [12, 41], popupAnchor: [1, -34], shadowSize: [41, 41] }) }).addTo(map);
    marker.bindPopup("<b><?php echo $name; ?></b> <br> <?php echo $adresse; ?>  ");

    marker.on('click', function () {
        map.setView([<?php echo $lat; ?>, <?php echo $lon; ?>], 15);
    });


    
<?php endforeach; ?>

    });
</script>


<br>


<div class="container" id="formulaire-creation-medecin">
    <!-- Formulaire ACF -->

        <h1>Ajouter un médecin</h1>

            <?php
                if (is_user_logged_in()) {
                    acf_form(array(
                        'post_id'       => 'new_post',
                        'new_post'      => array(
                            'post_type'     => 'medecin',
                            'post_status'   => 'publish'
                        ),
                        'post_title'    => true,
                        'field_groups'  => array('group_657a28fe1b4c5'), // Remplacez par l'ID de votre groupe de champs ACF
                        'submit_value'  => 'Soumettre le médecin',
                        'updated_message' => 'Médecin ajouté avec succès',
                        'fields' => array( 'adresse', 'lat', 'lon'), // Ajoutez les champs du formulaire ACF ici
                    ));
                } else {
                    echo '<p>Vous devez être connecté pour créer un médecin.</p>';
                }
            ?>

</div>

<script>
function scrollToForm() {
    document.getElementById("formulaire-creation-medecin").scrollIntoView({ 
        behavior: 'smooth' 
    });
}
</script>

<?php
get_footer();
?>

<style>
    header {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 9999;
    }

#map {
    width: 80%;
    height: 500px;
    margin: 20px auto;
}

    
    /* Styliser le conteneur du formulaire */
    .container {
        background-color: #f8f8f8; /* Couleur de fond */
        padding: 20px; /* Espacement intérieur */
        border-radius: 10px; /* Bords arrondis */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Ombre légère */
        max-width: 600px; /* Largeur maximale */
        margin: auto; /* Centrer le formulaire */
        margin-top: 20px;
        margin-bottom: 20px;
    }

    /* Styliser les champs du formulaire */
    input[type="text"], textarea, select {
        width: 100%; /* Pleine largeur */
        padding: 10px; /* Espacement intérieur */
        margin: 10px 0; /* Marge extérieure */
        border: 1px solid #ddd; /* Bordure */
        border-radius: 5px; /* Bords arrondis */
    }

    /* Styliser le bouton de soumission */
    input[type="submit"] {
        background-color: #D35400; /* Couleur de fond */
        color: white; /* Couleur du texte */
        padding: 12px 20px; /* Espacement intérieur */
        border: none; /* Pas de bordure */
        border-radius: 4px; /* Bords arrondis */
        cursor: pointer; /* Curseur pointeur */
        display: flex;
        margin: auto;
        margin-top: 20px;
    
            }

    input[type="submit"]:hover {
        background-color: #E67E22; /* Couleur de fond au survol */
    }

    /* Messages d'erreur ou de confirmation */
    .message {
        color: red; /* Couleur pour les messages d'erreur */
        margin: 10px 0; /* Marge extérieure */
    }



.type-btn {
    background-color: #D8561F;
    color: white;
    font-family: Inter;
    font-size: 18px;
    padding: 18px;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    text-align: center;
    margin: 20px;
    width: 217px;
}

.type-btn:hover{
    background-color: #cb5507;
}
.creat-repas{
    text-align: center;
    margin: auto;
}

</style>


