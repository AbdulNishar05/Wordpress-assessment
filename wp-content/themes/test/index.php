<?php get_header(); ?>
<section class="container-fluid custom_box">
  <div class="banner">
    <div class="container container_filter">

      <?php
      $terms = get_terms('tests_category');
      $count = count($terms);
      if ($count > 0) {
        echo "<select id='filter-select'>";
        echo "<option value='*' data-filter-value='' class='selected'>All items</option>";
        foreach ($terms as $term) {
          echo "<option value='.{$term->slug}'>" . $term->name . "</option>";
        }
        echo "</select>";
      }
      ?>

      <div id="isocontent">
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
  </div>
