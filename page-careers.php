<?php

get_header();

if(have_posts()):
    while(have_posts()): the_post(); ?> 

    <article class="post page careers">
        <div class="container">
            <p><?php the_content(); ?></p>
            <nav class="roles">
                <ul>
                <?php
                    $args = array(
                        'child_of' => get_current_parent_id(),
                        'title_li' => ''
                    );
                ?>
                <?php wp_list_pages($args); ?>
                </ul>
            </nav> 
        </div>
    </article>

<?php endwhile;

else:
    echo '<p>No content found</p>';

endif;

get_footer();

?> 