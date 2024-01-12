<footer>

  <div class="footer">
     
    <div class="menu-footer1">
        <div class="footer-column">
            <div class="footer-section">
                <div class="section-title">Partenaire</div>
                  <div class="divider"></div>
                    <a href="https://numericabfc.com/">
                      <?php
                        // Image pour la section "Partenaire"
                        echo '<img loading="lazy" srcset="' . get_template_directory_uri() . '/img/logo_numerica.png" class="section-image" />';
                      ?>
                    </a>
            </div>
        </div>

            <div class="footer-column">
              <div class="footer-section">
                <div class="section-title">Contact</div>
                  <div class="divider"></div>
                    <div class="section-content">
                        <div class="redir-indiglu"><a href="mailto:contact@indiglu.com">contact@indiglu.com</a></div>
                        <div class="redir-indiglu"><a href="mailto:partenariat@indiglu.com">partenariat@indiglu.com</a></div>
                    </div>
               </div>
            </div>

        <!-- Add more sections as needed -->


        <div class="footer-column">
            <div class="footer-section">
                <div class="section-title">Suivez-nous</div>
                  <div class="divider"></div>
                    <div class="section-content-logo">
                        <?php
                          // Images pour la section "Suivez-nous"
                          echo '<a href="https://www.facebook.com/profile.php?id=61555739902631&locale=fr_FR"><img loading="lazy" src="' . get_template_directory_uri() . '/img/facebook.png" class="section-image-RS" /></a>';
                          echo '<a href="https://twitter.com/indigluMaghreb"><img loading="lazy" src="' . get_template_directory_uri() . '/img/twitter.png" class="section-image-RS" /></a>';
                        ?>
                    </div>
            </div>
        </div>
        <!-- Add more columns as needed -->


        <div class="footer-column">
            <div class="footer-section">
                <div class="section-title">Nos autres sites</div>
                  <div class="divider"></div>
                    <div class="indiglu">
                      <div class="section-content2">
                          <div class="site">
                            <a href="https://indiglu.com/">
                              <?php
                                  // Image pour le premier site
                                  echo '<img loading="lazy" src="' . get_template_directory_uri() . '/img/indiglu.png" class="site-image" />';
                              ?>
                              <div class="site-title">indiglu.com</div>
                            </a>
                          </div>
                    </div>


                  <div class="section-content2">
                    <div class="site">
                      <a href="https://partners.indiglu.com/">
                        <?php
                          // Image pour la section "Nos autres sites"
                          echo '<img loading="lazy" srcset="' . get_template_directory_uri() . '/img/indiglu.png" class="site-image" />';
                        ?>
                          <div class="site-title">partners.indiglu.com</div>
                      </a>
                    </div>
                  </div>
                </div>


            </div>
     
         
        </div>
      </div>

        <div class="menu-footer2">

      
        <div class="divider2"></div>
          <div class="menuwp">
            <?php
              // Afficher le menu "footer"
              wp_nav_menu(
                array(
                'theme_location' => 'footer',
                'container'      => 'div',
                'container_class'=> 'footer-section',
                )
              );
            ?>
          </div>
       
        </div>
       
        <?php wp_footer(); ?>
       
     
   
    </div>
   
   
</footer>






<style>

.menu-footer1{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  background-color: #111;
  padding: 50px 20px;
  color: #fff;
}

.menu-footer2{
    width: 700px;
    margin: auto;
}

.footer {
  flex-wrap: wrap;
  justify-content: space-around;
  background-color: #111;
  padding: 5px 20px;
  color: #fff;
}


.redir-indiglu {
  margin-top: 10px;
  font: 400 14px/25px Roboto, sans-serif;
}


.footer-column {
  display: flex;
  justify-content: space-around;
  align-items: baseline;
  gap: 40px;
}


.footer-section {
  background-color: #111;
  font: 400 14px/25px Roboto, sans-serif;
}


.footer-section ul {
  list-style: none;
  padding: 20px;
}


.footer-section ul li {
  display: inline;
  margin: 0 10px;
}


a {
  color: #fff;
  text-decoration: none;
}


a:hover {
  color: #d8561f;
}


.section-title {
  font: 700 20px/24px Inter, sans-serif;
}


.divider {
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.2) 100%), #d8561f;
  margin-top: 8px;
  height: 1px;
  align-self: stretch;
}

.divider2 {
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.2) 100%), #d8561f;
  height: 1px;
  align-self: stretch;
}


.indiglu {
  display: flex;
  margin-top: 15px;
  gap: 40px;
}
 
a {
  color: #fff;
  text-decoration: none;
}
a:hover {
  color: #d8561f;
}
.section-title {
  font: 700 20px/24px Inter, sans-serif;
}


.divider {
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.2) 100%), #d8561f;
  margin-top: 8px;
  height: 1px;
  align-self: stretch;
}
.indiglu{
  display: flex;
  margin-top: 15px;
  gap: 40px
}
.section-image {
  aspect-ratio: 1.19;
  object-fit: contain;
  object-position: center;
  width: 160px;
 
}
.section-image-RS {
  aspect-ratio: 1.19;
  object-fit: contain;
  object-position: center;
  width: 50px;
  margin-top: 30px;
}
.section-content {
  display: flex;
  flex-direction: column;
  
}

.section-content2 {
  
  
}




.site {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  flex-direction: column;
}


.site-image {
  aspect-ratio: 0.98;
  object-fit: contain;
  object-position: center;
  width: 50px;
  max-width: 100%;
}


.site-title {
  font: 400 14px/25px Roboto, sans-serif;
}


/* Add media queries as needed for responsiveness */


</style>




