<?php

/* Template Name: Informations */

function add_meta_description()
{
    ?>
    <meta name="description" content="Restez informé avec Indiglu Maghreb : trouvez des articles détaillés, des études récentes et des conseils pratiques pour comprendre et gérer le diabète. Notre section d'informations est votre guide fiable pour une meilleure santé.">
<?php
}
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


<div class="lastarticles">
    <h2>Les derniers articles</h2>
    <div class="lastarticles__container">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 1,
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                echo '<div class="lastarticles__container__article">';
                echo '<a href="' . get_permalink() . '">';
                echo '<img src="' . get_the_post_thumbnail_url() . '"  class="lastarticles__container__article__img" alt="' . get_the_title() . '">';
                echo '<div class="lastarticles__container__article__content">';
                echo '<h3>' . get_the_title() . '</h3>';
                echo '<p class="lastarticles_txt">' . get_the_excerpt() . '</p>';
                echo '<p class="read-more"><a href="' . get_permalink() . '">Lire la suite</a></p>'; // Add the "Read more" text
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>



<div class="lastarticles_2">
    <div class="container_2">
  <div class="row_2">
           
        </div>
        <div class="row_3">
        <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
            );
            $query = new WP_Query($args);
            $counter = 0;
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $counter++;
                    if ($counter != 1) { // Exclude the latest article
                        ?>
                        
                    
                        <div class="col-md-8">
                        <div class="lastarticles__item_2">
                            <div class="lastarticles__item__img_2">
                                <?php the_post_thumbnail('', ['alt' => get_the_title()]); ?>
                            </div>
                            <div class="lastarticles__item__content_2">
                                <div class="lastarticles__item__content__title-img_2">
                                    <a href="<?php the_permalink(); ?>"> 
                                        <h3 class="lastarticles__item__content__title_2"><?php the_title(); ?></h3>
                                    </a>

                                    <div class="content_article">
                                        <p class="lastarticles_txt"><?php the_excerpt(); ?></p>
                                    </div>
                                    
                                </div>
                                <a href="<?php the_permalink(); ?>" class="read-more">Lire la suite</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            wp_reset_postdata();
        }
        ?>
    </div>
</div>
</div>

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

    h2 {
        text-align: center;
        margin-top: 50px;
    }

    .lastarticles__container {
        width: 850px;
        height: 350px;
        border-radius: 10px;
        background-color: #ffffff;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
        margin: auto;
        font-family: 'Inter', sans-serif;
        color: #000000;
        margin-bottom: 40px;
        overflow: hidden;
        margin-top: 40px;

    }

    .lastarticles__container:hover {
        transform: scale(1.05); /* Increase the size of the plat on hover */
        transition: transform 0.3s ease; /* Add a smooth transition effect */
        box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
        }


    .lastarticles__container__article__img {
        width: 350px;
        height: 350px;
        margin-right: 20px;
        object-fit: cover;

    }

    .lastarticles__container__article {
        color: #000000;
        display: flex;

    }

    .lastarticles__container__article__content {
        margin: auto;
    }
    .lastarticles_txt {
        font-size: 14px;
        font-family: 'Inter', sans-serif;
        color: #000000;
        text-align: justify;
        padding-right: 20px;
    }

    h3 {
        font-size: 20px;
        font-family: 'Inter', sans-serif;
        color: #000000;
        margin-top: 10px;
    }

    .read-more {
        font-size: 14px;
        font-family: 'Inter', sans-serif;
        color: #000000;
        margin-top: 10px;
    }

    .read-more a {
        color: #000000;
        text-decoration: none;
    }

    .read-more a:hover {
        color: #d8561f           

    }

    /* 2eme partie */


   .row_3 {
    display: grid;
    grid-template-columns: repeat(3, 0.1fr); /* Display 3 columns */
    grid-gap: 30px; /* Add some gap between the elements */
    justify-content: center;
   }

    .lastarticles__container_2 {
        width: 350px;
        height: 800px;
        border-radius: 10px;
        background-color: #ffffff;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
        margin: auto;
        font-family: 'Inter', sans-serif;
        color: #000000;
        margin-bottom: 500px;
        overflow: hidden;

    }

    .lastarticles__container__article__img_2 {
        width: 350px;
        height: 350px;
        margin-bottom: 20px;
        object-fit: cover;

    }

    .lastarticles__item_2 {
width: 400px;
border-radius: 10px;
background-color: #ffffff;
box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
font-family: 'Inter', sans-serif;
overflow: hidden;
margin-bottom: 50px;
margin-top: 40px;

}

.lastarticles__item_2:hover {
    transform: scale(1.05); /* Increase the size of the plat on hover */
    transition: transform 0.3s ease; /* Add a smooth transition effect */
    box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
}


.lastarticles__item__img_2 {
width: 300px;
height: 100%;
border-top-left-radius: 10px;
border-bottom-left-radius: 10px;
}

.lastarticles__item__content_2 {
padding: 30px;
}

.lastarticles__item__content__title_2 {
margin: 0;
font-size: 20px;
font-weight: bold;
color: #000000;
}

.lastarticles__item__content__link_2 {
color: #007bff;
text-decoration: none;
font-weight: bold;
}

.lastarticles__item__content__link_2:hover {
text-decoration: underline;
}

.lastarticles__title_2 {
font-size: 30px;
font-weight: bold;
margin-bottom: 30px;
text-align: center;
}



.lastarticles__item__img_2 img {
width: 400px;
height: 350px;
object-fit: cover;
}

.content_article{
    margin-top: 20px;
    text-align: justify;

}

body {
        font-family: 'Inter', sans-serif;
    }
    

        </style>