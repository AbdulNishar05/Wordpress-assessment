<?php get_header(); ?>
    <section class="container-fluid custom_box">
      <div class="container">
        <div class="banner">
              <div class="container container_filter">
          <div class="filters filter-button-group">
          		  <ul><h4>
          		    <li class="active" data-filter="*">All</li>

                  <?php
                    $terms = get_terms('tests_category');
                    foreach ($terms as  $term) { ?>
                      <li data-filter=".<?php  echo $term->slug; ?>"><?php echo $term->name; ?></li>
                <?php  }

                  ?>
          		  </h4></ul>
          		</div>
          		<div class="content grid">
                <?php
                    $args = array(
                      'post_type' => 'tests',
                      'posts_per_page' => 8
                    );

                    $query = new WP_Query($args);

                    while ($query->have_posts()) {
                      $query->the_post();

                      $termsArray = get_the_terms($post->ID, 'tests_category');

                      $termsSLug = "";
                      foreach ($termsArray as $term) {
                        $termsSLug .= $term->slug . ' ';
                      }

                      ?>

                      <div class="single-content <?php echo  $termsSLug; ?>  grid-item">
                        <img class="p2" src="<?php the_post_thumbnail_url(); ?>">
                      </div>

                <?php  }

                  ?>
            </div>
    </div>
<?php get_footer(); ?>

