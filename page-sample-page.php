<?php

get_header();

if(have_posts()):
    while(have_posts()): the_post(); ?>

<div class="container flex-container">
    <article class="post page">
        <h2><?php the_title(); ?> </h2>
        <div class="sample-page">
            <p><?php the_content(); ?></p>
        </div>

        <button id="sample-posts-btn" class="btn">Load posts</button>
        <div id="sample-posts-container"></div>
    </article>
</div>
<?php endwhile;

else:
    echo '<p>No content found</p>';

endif;

get_footer();

?>