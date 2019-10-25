<?php

get_header();
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <?php if(current_user_can('administrator')) : ?>
            <div class="admin-quick-add">
                <h3>Quick Add Post</h3>
                <input type="text" name="title" placeholder="Title">
                <textarea name="content" placeholder="Content"></textarea>
                <button id="quick-add-button" class="btn">Create Post</button>
            </div>
            <?php endif; ?>
            <?php if(have_posts()):?>

            <?php while(have_posts()): the_post(); ?>
            <div class="post blogpageposts">
                <!-- <?php get_template_part('content', get_post_format());?> -->
                <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>

                <p><?php echo get_the_excerpt(); ?>
                            <a href="<?php the_permalink();?>">Read More &raquo;</a>
                        </p>
            </div>
            <?php endwhile; ?>

            <!-- <div class="container"> -->
            <?php 
                // next_posts_link();
                echo paginate_links(); ?>
            <!-- </div> -->
            <?php
                else:
                echo '<p>No content found</p>';

                endif;
                ?>
        </div>
        <div class="col-sm-3">     
            <?php get_sidebar(); ?>
        </div>   
    </div>
</div>

<?php
get_footer();

?>