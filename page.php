<?php

get_header();

if(have_posts()):
    while(have_posts()): the_post(); ?> 
    <div class="container">
        <article class="post page">

            <?php if(has_children() OR $post->post_parent > 0){?>

            <nav class="site-nav children-links clearfix">
                <span class="parent-link"> <a href="<?php echo get_the_permalink(get_current_parent_id()); ?>"><?php echo get_the_title(get_current_parent_id()); ?></a> </span>

                <ul>
                <?php
                    $args = array(
                        'child_of' => get_current_parent_id(),
                        'title_li' => ''
                    );
                ?>
                <?php wp_list_pages($args); ?>
            </nav>
            </ul>
            <?php } ?>
                <h2><?php the_title(); ?></h2>
                <p><?php the_content(); ?></p>

        </article>
    <?php get_sidebar(); ?>
    </div>

<?php endwhile;

else:
    echo '<p>No content found</p>';

endif;

get_footer();

?> 