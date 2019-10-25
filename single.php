<?php

get_header();

if(have_posts()):?>

<?php while(have_posts()): the_post(); ?>
<div class="container">
    <article class="post">
        <h2 class="post-title"><?php the_title(); ?></h2>
        <p class="post-info"><?php the_time('F jS, Y g:i a')?> | by <a
                href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"> <?php the_author(); ?></a> |
            posted in
            <?php
                $categories = get_the_category();
                $separater = ", ";
                $output = "";

                if($categories){
                    foreach ($categories as $category) {
                        $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>'  . $separater;
                    }
                    echo trim($output, $separater);
                }
            ?>
        </p>

        <?php the_post_thumbnail('banner-image'); ?>
        <p>
            <?php the_content(); ?></p>

        <div class="about-author">
                <div class="row">
                    <div class="col-sm-3">
                    <div class="about-author-image">
                        <?php echo get_avatar(get_the_author_meta('ID'),512) ?>
                        <p><?php echo get_the_author_meta('nickname') ?></p>
                    </div>
            </div>
            <div class="col-sm-9">
                <?php 
                    $otherPostsByAuthor = new WP_Query(array(
                        'author' => get_the_author_meta('ID'),
                        'posts_per_page' => 3,
                        'post__not_in' => array(get_the_ID())
                    ));
                ?>
                <div class="about-author-text">
                    <h3>About the Author</h3>
                    <?php echo get_the_author_meta('description') ?>

                    <?php if($otherPostsByAuthor->have_posts()){ ?>
                    <div class="other-posts-by">
                        <h4> Other posts by <?php echo get_the_author_meta('nickname'); ?></h4>
                        <ul>
                            <?php  
                                    while($otherPostsByAuthor->have_posts()) {
                                        $otherPostsByAuthor->the_post(); ?>
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            <?php } ?>
                        </ul>
                   
                    <?php } wp_reset_postdata()?>
                    <?php if(count_user_posts(get_the_author_meta('ID'))>3){ ?>

                    <a class="btn" href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">View all posts by <?php echo get_the_author_meta('nickname') ?></a>
                    <?php } ?>
                    </div>
                </div>
                </div>

            </div>
        </div>

    </article>
</div>

<?php endwhile;

else:
    echo '<p>No content found</p>';

endif;

get_footer();

?>