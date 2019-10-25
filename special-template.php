<?php

/*
Template Name: Special Layout
*/

get_header();

if(have_posts()):
    while(have_posts()): the_post(); ?> 

    <article class="post page">
        <h2><?php the_title(); ?> </h2>

        <div class="info-box">
            <h4>Disclaimer</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>

        <p><?php the_content(); ?></p>
    </article>

<?php endwhile;

else:
    echo '<p>No content found</p>';

endif;

get_footer();

?> 