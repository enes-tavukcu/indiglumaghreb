<?php



function add_meta_description()
{
    ?>
    <meta name="description" content="Oups ! La page que vous cherchez sur Indiglu Maghreb semble introuvable. Mais ne vous inquiétez pas, explorez notre site pour trouver des informations fiables et utiles sur le diabète et la santé au Maghreb.">
<?php
}

get_header(); ?>

<body>

    <div class="erreur">
        <div class="oups">
            <h1> Oups !</h1>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/error404.png" alt="oups" class="error-image">
        </div>
        <p class="eror">Vous êtes un peu trop gourmand !</p>
        <p class="eror">Revenez à l'accueil pour calmer votre appétit </p>
        <a href="<?php echo home_url(); ?>" class="btn btn-primary">Retour à l'accueil</a>
        

    </div>

</body>



<style>
  

    body {
        background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/imdefon.png');
        background-position: center;
        background-repeat: no-repeat;
    }

    h1 {
        padding: 10px;        
    }



   html, body {
        margin: 0;
        padding: 0;
        height: 100%; /* Assurez-vous que le body occupe toute la hauteur */
        width: 100%;
        display: flex; /* Utilisez Flexbox */
        justify-content: center; /* Centrage horizontal */
        align-items: center; /* Centrage vertical */
    }

    .erreur {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        
        background-color: #fff;
        width: 600px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        border-radius: 10px;
        margin: auto; /* Auto-margin pour le centrage */
        padding-bottom: 20px;
    }
    .error-image {
        width: 100px;
    }
    
    .oups {
        display: flex;
        align-items: baseline;
        padding-top: 10px;
    }
    
    a {
        text-decoration: none;
    }
</style>