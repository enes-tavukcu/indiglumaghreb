<?php 

/* Template Name: ToutLesRepas */

function add_meta_description()
{
    ?>
    <meta name="description" content="Explorez une sélection de repas sains et équilibrés sur Indiglu Maghreb, spécialement conçus pour les personnes vivant avec le diabète. Découvrez des recettes délicieuses, nutritives et adaptées à vos besoins diététiques pour une alimentation saine au quotidien.">
<?php
}



add_action('wp_head', 'add_meta_description');
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

<div class="btn">
<button class="type-btn" onclick="showAllPlats()">Tous</button>
<button class="type-btn" onclick="filterPlats('Entrée')">Entrée</button>
<button class="type-btn" onclick="filterPlats('Plat')">Plat</button>
<button class="type-btn" onclick="filterPlats('Dessert')">Dessert</button>
</div>



<script>
    function filterPlats(type) {
        var plats = document.getElementsByClassName('plat');
        for (var i = 0; i < plats.length; i++) {
            var plat = plats[i];
            var typePlat = plat.querySelector('.type-plat').textContent.trim();
            if (typePlat === type) {
                plat.style.display = 'block';
            } else {
                plat.style.display = 'none';
            }
        }
        scrollToTop();
    }

    function showAllPlats() {
        var plats = document.getElementsByClassName('plat');
        for (var i = 0; i < plats.length; i++) {
            var plat = plats[i];
            plat.style.display = 'block';
        }
        scrollToTop();
    }

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
</script>


<div class="creat-repas">
    <button class="type-btn" onclick="scrollToForm()">Créer une recette</button>
</div>

<div class="plats">
   <?php
   $args = array(
       'post_type' => 'plat',
       'posts_per_page' => -1,
       'orderby' => 'name',
         'order' => 'ASC',
   );
   $plat_query = new WP_Query($args);

   if ($plat_query->have_posts()) :
       while ($plat_query->have_posts()) : $plat_query->the_post();
   ?>
           <article class="plat">
               <div class="card">

                     <div class="image">
                          <?php 
                          $image = get_field('image'); // Assurez-vous que 'image' est le nom correct du champ
                          if( !empty($image) ): ?>
                              <a href="<?php the_permalink(); ?>">
                                  <img class="image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                              </a>
                          <?php endif; ?>
                    </div>

                    <ul>
                       <li class="type-plat">
             <?php 
               $type = get_field('type'); // Assurez-vous que 'type_de_plat' est le nom correct du champ
               if (!empty($type)) {
                     // Afficher le type de plat
                     echo esc_html($type);
                            }
                               ?>
                               </li>
                            <?php
                            echo '<img loading="lazy" srcset="' . get_template_directory_uri() . '/img/temps.png" class="section-img" alt="temps" />';
                            ?>
                            <?php the_field("temps_de_prepa"); ?> min
                        </li>
                        
                        <li>
                            <?php
                            echo '<img loading="lazy" srcset="' . get_template_directory_uri() . '/img/utilisateur.png" class="section-img" alt="user" />';
                            ?>
                             <?php
                            $nb_personne = get_field("nb_personne");
                            if ($nb_personne == 1) {
                                echo $nb_personne . ' personne';
                            } else {
                                echo $nb_personne . ' personnes';
                            }
                            ?>
                        </li>
                    </ul>
                
                    <p class="title">
    <a id="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</p>

                   
               </div>
           </article>

        

   <?php
       endwhile;
       wp_reset_postdata();
   endif;
   ?>
</div>



</script>



<a href="#" id="back-to-top" class="rtr-haut">Retour en haut</a>

<script>
    jQuery(document).ready(function($) {
        var offset = $(window).height() / 4;
        var duration = 500;

        $(window).scroll(function() {
            if ($(this).scrollTop() > offset) {
                $('#back-to-top').fadeIn(duration);
            } else {
                $('#back-to-top').fadeOut(duration);
            }
        });

        $('#back-to-top').click(function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop: 0}, duration);
            return false;
        });
    });
</script>




<div class="container" id="formulaire-creation-recette">
    <!-- Votre formulaire ACF ici -->


<div class="container">
    <h1>Créer une Recette</h1>
    <?php
    if ( is_user_logged_in() ) {
        acf_form(array(
            'post_id'       => 'new_post',
            'new_post'      => array(
                'post_type'     => 'plat',
                'post_status'   => 'publish'
            ),
            'post_title'    => true,
            'field_groups'  => array('group_656a6f6007daa'), // Remplacez par l'ID de votre groupe de champs ACF
            'submit_value'  => 'Soumettre la recette'
        ));
    } else {
        echo '<p>Vous devez être connecté pour créer une recette.</p>';
    }
    ?>
</div>
</div>
<?php

get_footer(); ?>



<style>
.plats {
    display: grid;
    grid-template-columns: repeat(3, 0.1fr); /* Display 3 columns */
    grid-gap: 4px; /* Add some gap between the elements */
    justify-content: center;
}

@media (max-width: 1200px) {
    .plats {
        grid-template-columns: repeat(2, 1fr); /* Display 2 columns on screens up to 1200px */
    }
}

@media (max-width: 768px) {
    .plats {
        grid-template-columns: 1fr; /* Display 1 column on screens up to 768px */
    }
}



.section-img {
    width: 30px;
    height: 30px;
    margin-right: 5px;
}

.creat-repas{
    text-align: center;
    margin: auto;
}

#back-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    display: none;
    background-color: #dd6333;
    color: #fff;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    z-index: 1000; /* Ensure the button is above other elements */
}

#back-to-top:hover {
    background-color: #bb4e23;
}

.rtr-haut{
    font-family: 'Inter', sans-serif;
}

.type-plat{
    border-radius: 15px;
    background-color: #D8561F  ;
    text-align: center;
    width: 65px;
    padding: 8px;
    justify-content: center;
    color: white;
}

.section-img{
    width: 30px;
    height: 30px;
    margin-right: 5px;
}
ul{
    display: flex;
    align-items: center;
    font-family: 'Inter', sans-serif;
    font-size: 14px;

}
li{
    list-style: none;
    color: #000;
    font: 14px Inter, sans-serif;
    margin: 10px;
    align-items: center;
    display: flex;

}
    header {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 9999;
    }


footer a{
    color: #ffffff;
    text-decoration: none;
}

.btn{
    text-align: center;
    margin: 20px;
}

.type-btn{
background-color: black;
    color: white;
    font-family: Inter;
    font-size: 18px;
    padding: 10px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    margin: 10px;
}

.type-btn:hover{
    background-color: #D35400;
}


.title{
    color: #FFF;
    font-size: 20px;
    text-align: center;
    margin-top: 10px;
    width: 400px;
}
.acf-field .acf-label label {
    /* display: block; */
    /* font-weight: 500; */
    margin: 0 30px 0;
    
    font-family: 'Inter', sans-serif;
}

.acf-button-group label.selected {
    border-color:  #D35400;
    background: #D35400;
    color: #fff;
    z-index: 2;
}
.image{
    width: 400px;
    height: 220px;
    object-fit: cover;
    top: 0;
    left: 0;
    overflow: hidden;
}
.plat{
    width: 400px;
    background-color: #ffffff;
    margin: 40px;
    display: inline-block;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    overflow: hidden;
    position: relative;
}
.plat:hover {
    transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    transition: transform 0.2s ease; /* Add a smooth transition effect */
    box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
}


a{
    color: #000;
    font-size: 16px;
    
}

/* Styliser le conteneur du formulaire */
.container {
    background-color: #f8f8f8; /* Couleur de fond */
    padding: 20px; /* Espacement intérieur */
    border-radius: 10px; /* Bords arrondis */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
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


.bouton-creer-recette {
    text-align: center; /* Centrer le bouton */
    margin: 20px 0; /* Ajouter de l'espace autour du bouton */
}

.bouton-creer-recette a, .bouton-creer-recette button {
    display: inline-block; /* Le bouton est un bloc inline */
    background-color: #D35400; /* Couleur de fond comme dans l'image */
    color: white; /* Couleur du texte blanc */
    padding: 15px 60px; /* Espacement intérieur pour agrandir le bouton */
    font-size: 20px; /* Taille du texte */
    font-weight: bold; /* Texte en gras */
    text-transform: uppercase; /* Texte en majuscules */
    border: none; /* Aucune bordure */
    border-radius: 25px; /* Bords arrondis */
    text-decoration: none; /* Pas de soulignement du texte */
    cursor: pointer; /* Curseur pointeur */
    transition: background-color 0.3s; /* Transition pour le changement de couleur */
    margin-bottom: 200px;
}

.bouton-creer-recette a:hover, .bouton-creer-recette button:hover {
    background-color: #E67E22; /* Couleur de fond plus claire au survol */
}

.acf-button, .acf-tab-button {
    pointer-events: auto !important;
    background-color: #D35400 !important;
    padding: 10px;
    border-radius: 20px;
    color: white !important;
}

body {
        font-family: 'Inter', sans-serif;
    }
</style>


<script>
function scrollToForm() {
    document.getElementById("formulaire-creation-recette").scrollIntoView({ 
        behavior: 'smooth' 
    });
}
</script>
