<?php

get_header();
?>
<!-- <div class="home-posts">
<?php
if(have_posts()):
    while(have_posts()): the_post(); 
    
        the_content(); 
    
    endwhile;

    else:
        echo '<p>No content found</p>';

endif; ?>
</div> -->
<div class="flex-container container">
    <div class="posts">
        <?php 
        // chatbot category posts
        $chatbotPosts = new WP_Query('cat=4&posts_per_page=3');

        if($chatbotPosts->have_posts()) :
            while($chatbotPosts->have_posts()): $chatbotPosts->the_post();?>
                <h3> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
            <?php
            endwhile;

            else:

        endif;
        wp_reset_postdata();  ?>
    </div>
    <div class="posts">
        <?php
        // chatbot Use Case posts
        $chatbotUseCasePosts = new WP_Query('cat=5&posts_per_page=2');

        if($chatbotUseCasePosts->have_posts()) :
            while($chatbotUseCasePosts->have_posts()): $chatbotUseCasePosts->the_post();?>
                <h3> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
            <?php
            endwhile;

            else:

        endif;
        wp_reset_postdata(); ?>
    </div>
</div>




<?php
get_footer();

?> 