<div class="container mb-5">
    <div class="main-slider owl-single owl-carousel">
        <?php query_posts('category_name=de-primera')?>
		    <?php $i = 0; if ( have_posts() ) : while ( have_posts() && $i < 6) : the_post(); ?>
        <!--Codigo que se ejecutara cuando encuentre algun post-->
        <div class="huge-article d-md-flex">
          <div class="img-wrap">
            <a href="<?php the_permalink();?>"><img src="<?php
            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                the_post_thumbnail_url('full');
            }
            ?>" alt="Image" class="img-fluid"></a>
          </div>
          <div class="text-wrap">
            <div class="meta">
              <span class="d-inline-block"><?php echo get_the_date(); ?></span>
              <span class="mx-2">&bullet;</span>
              <span><?php 
              $cats = get_the_category();
              $firstCat = $cats[0];
              echo '<a href="'.esc_url(get_category_link($firstCat->cat_ID)).'">'.$firstCat->name.'</a>';
              ?></span>
            </div>
            <h3><a href="<?php the_permalink();?>"><?php the_title() ?></a></h3>
            <p><?php $extracto = get_the_content();
            $extracto = strip_tags($extracto);
            echo substr($extracto, 0, 200).'...'; ?></p>
            <div class="author d-flex align-items-center">
              <div class="img mr-3">
                <img src="<?php echo get_avatar_url(get_the_author_meta('ID'), 220); ?>" alt="Image" class="img-fluid">
              </div>
              <div class="text">
                <h3><?php the_author_posts_link(); ?></h3>
                <strong>Chief Editor / Blogger</strong>
              </div>
            </div>
          </div>
        </div>
        <?php $i++; endwhile; else: ?>
        <!--Codigo que se ejecutara si no encuentra post-->
        <h1>Error 404 no se encontraron portadas.</h1>
        <?php endif; ?>
        <?php wp_reset_query();?>
        <!--Termina Primera sección-->
    </div>
</div>