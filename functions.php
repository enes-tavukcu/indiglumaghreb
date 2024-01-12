<?php 
  function thememonsite_setup() {
    // Ajout du support pour les images mises en avant
    add_theme_support( 'post-thumbnails' );
    // Ajout du support pour le titre du site
    add_theme_support( 'title-tag' );
    // Ajout du support pour rendre le code valide en HTML 5
    add_theme_support( 
      'html5', 
      array( 
        'comment-list', 
        'comment-form', 
        'search-form', 
        'gallery', 
        'caption',
        'style',
        'script'
      ) );

      // Ajout du support pour les menus
    register_nav_menus( 
        array(
          'main' => 'Menu Principal',
          'footer' => 'Menu footer',
          'connexion' => 'Connexion',

        )
      );

  }

  //Remplacer le bouton 'Compte' du menu 'Connexion' par l'avatar de l'utilisateur connecté
  function my_nav_menu_account( $items ) {
    if ( is_user_logged_in() ) {
      $user = wp_get_current_user();
      $name = $user->display_name;
      $avatar = get_avatar( $user->ID, 32 );
      $avatar_with_border_radius = '<span style="display: inline-block; border-radius: 50%; overflow: hidden;width:32px; height : 32px; margin-right: 10px;"">' . $avatar . '</span>';

      $items = str_replace( 'Compte', $avatar_with_border_radius, $items );
    }
    return $items;
  }
  add_filter( 'wp_nav_menu_items', 'my_nav_menu_account' );






  
  add_action( 'after_setup_theme', 'thememonsite_setup' );



    function thememonsite_script() {


      // Ajout du fichier style.css
      wp_enqueue_style( 'style', get_stylesheet_uri());
      // Ajout du fichier main.js
     // wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
    }
    add_action( 'wp_enqueue_scripts', 'thememonsite_script' );

    function init_my_custom() {
      register_post_type(
        'recette',
        array(
          'label' => 'recettes',
          'labels' => array(
            'name' => 'Recettes',
            'singular_name' => 'Recette',
            'all_items' => 'Toutes les recettes',
            'add_new_item' => 'Ajouter une recette',
            'edit_item' => 'Éditer la recette',
            'new_item' => 'Nouvelle recette',
            'view_item' => 'Voir la recette',
            'search_items' => 'Rechercher parmi les recettes',
            'not_found' => 'Pas de recette trouvée',
            'not_found_in_trash'=> 'Pas de recette dans la corbeille'
          ),
          'public' => true,
          'capability_type' => 'post',
          'supports' => array(
            'title',
            'editor',
            'thumbnail'
          ),
          'has_archive' => true
        )
      );
    }
    add_action('init', 'init_my_custom');

    

  //  function groupe_champs_plat($nomGroupe, $plat) {
  //    echo '<fieldset>';
 //     echo '<legend>' . $plat . '</legend>';
   //   
   //   champ_texte($nomGroupe . '_nom', 'Nom du plat');
    //  champ_selection($nomGroupe . '_type', 'Type de plat', array('entree' => 'Entrée', 'plat_principal' => 'Plat principal', 'dessert' => 'Dessert'));
    //  champ_texte($nomGroupe . '_temps_de_prepa', 'Temps de préparation (minutes)', '');
    //  champ_texte($nomGroupe . '_nb_personne', 'Nombre de personnes', '');
   //   champ_texte($nomGroupe . '_contenu_plat', 'Contenu de la recette', '');
      // Ajoutez d'autres champs spécifiques à votre formulaire ici
      
 //     echo '</fieldset>';
 // }
  
 function groupe_champs_plat($nomGroupe, $plat) {
  echo '<fieldset>';
  echo '<legend>' . $plat . '</legend>';
  
  champ_texte($nomGroupe . '_nom', 'Nom du plat');
  champ_selection($nomGroupe . '_type', 'Type de plat', array('entree' => 'Entrée', 'plat_principal' => 'Plat principal', 'dessert' => 'Dessert'));
  champ_texte($nomGroupe . '_temps_de_prepa', 'Temps de préparation (minutes)', '');
  champ_texte($nomGroupe . '_nb_personne', 'Nombre de personnes', '');
  champ_texte($nomGroupe . '_contenu_plat', 'Contenu de la recette', '');
  // Ajoutez d'autres champs spécifiques à votre formulaire ici
  
  echo '</fieldset>';
}

// Fonction pour effectuer le géocodage inverse et mettre à jour les champs ACF
function geocode_address_on_form_submit($post_id) {
// Vérifie si c'est une nouvelle publication
if ($post_id !== 'new_post') {
    // Récupère l'adresse saisie dans le formulaire ACF
    $address = get_field('adresse', $post_id);

    // Effectue le géocodage inverse pour obtenir les coordonnées
    $coordinates = get_coordinates_from_address($address);

    // Met à jour les champs de latitude et longitude si les coordonnées sont disponibles
    if ($coordinates) {
        update_field('lat', $coordinates['lat'], $post_id);
        update_field('lon', $coordinates['lon'], $post_id);
    }
}
}

// Ajoute une action pour effectuer le géocodage inverse lors de la soumission du formulaire ACF
add_action('acf/save_post', 'geocode_address_on_form_submit', 20);

add_filter('acf/prepare_field', 'custom_acf_title_label');

function custom_acf_title_label($field) {
if ($field['name'] === 'post_title' && $field['_input'] === 'text') {
    $field['label'] = 'Titre';
}

return $field;
}

// Fonction pour obtenir les coordonnées à partir d'une adresse
function get_coordinates_from_address($address) {
$geocode_url = 'https://nominatim.openstreetmap.org/search?format=json&q=' . urlencode($address);
$response = wp_remote_get($geocode_url);

if (is_wp_error($response)) {
    return false;
}

$body = wp_remote_retrieve_body($response);
$data = json_decode($body);

if (isset($data[0]) && isset($data[0]->lat) && isset($data[0]->lon)) {
    return array('lat' => $data[0]->lat, 'lon' => $data[0]->lon);
} else {
    return false;
}
}

function custom_acf_prepare_field($field) {
// Remplace le label du champ "Title" par "Titre"
if ($field['label'] == 'Title') {
    $field['label'] = 'Nom ';
}

return $field;
}

add_filter('acf/prepare_field', 'custom_acf_prepare_field');