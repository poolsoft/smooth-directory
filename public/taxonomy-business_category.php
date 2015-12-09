<?php
if ( $overridden_template = locate_template( 'taxonomy-businesses_category.php' ) ) {
   // locate_template() returns path to file
   // if either the child theme or the parent theme have overridden the template
   load_template( $overridden_template );
 } else {

  get_header();

  echo '<h1 class="entry-title">Businesses</h1>';

  require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/filter-row.php';

  echo '<ul class="smooth-directory">';

  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post(); ?>
      <li class="smooth-directory__item">
        <?php
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/meta-values.php';
        ?>

        <?php if (get_the_title()) { 
          echo '<h3>';
          the_title();
          echo '</h3>';
        } ?>

        <div class="smooth-directory__interior">
          <p>
            <?php
            if ($logo_value) {
              echo '<img src="';
              echo $logo_value;
              echo '">';
            }

            if ($contact_value) {
              echo '<strong>';
              echo $contact_value;
              echo '</strong>';
            }
            
            if ($address_value) {
              echo '<br>';
              echo $address_value;
            }

            if ($city_value) {
              echo '<br>';
              echo $city_value;
            }

            if ($state_value) {
              echo ', ';
              echo $state_value;
            }

            if ($zip_value) {
              echo ' ';
              echo $zip_value;
            }

            if ($phone_value) {
              echo '<br><strong>';
              echo $phone_value;
              echo '</strong>';
            }

            if ($website_value) {
              echo '<br>';
              echo $website_value;
            }

            if ($email_value) {
              echo '<br>';
              echo $email_value;
            }
            ?>
          </p>

          <p><?php echo get_post_meta( $post->ID, 'meta_business_description', true ); ?></p>
        </div>
      </li>
      <?php }
    } ?>
    </ul>
    </div>
  </div>

  <?php get_footer();

}

?>