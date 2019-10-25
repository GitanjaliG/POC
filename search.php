<?php

get_header();

if(have_posts()):?>
    <div class="container">
        <h3>Search results for: <?php the_search_query(); ?> </h3>
    </div>
    
    <?php while(have_posts()): the_post();
    
    get_template_part('content', get_post_format());

    ?> 
   
    <?php endwhile;

        ?>
                    
        <div class="container">
        <?php 
        echo paginate_links(); ?>
        </div>
        <?php

else:
    echo '<p>No content found</p>';

endif;

get_footer();

?> 