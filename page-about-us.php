<?php

get_header();

if(have_posts()):
    while(have_posts()): the_post(); ?> 
    <div class="about-us">
        <article class="post page ">

            <?php 
                if(has_children() OR $post->post_parent > 0){
            ?>

            <!-- <nav class="site-nav children-links clearfix">
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
            </ul>-->
            <?php } ?>
                <!-- <h2><?php the_title(); ?></h2> -->
                <p><?php the_content(); ?></p>
        </article>
    
    <!-- <?php get_sidebar(); ?> -->
    </div>
<?php endwhile;

else:
    echo '<p>No content found</p>';

endif;
?>
<div class="container">
    <div class="post about-posts">
<h2>Blog Posts About Us</h2>

<?php 
    $current_page = get_query_var("paged"); //page instead of paged for static front page

    $aboutPosts = new WP_Query(array (
        "category_name" => "about",
        "posts_per_page" => 5,
        "paged" => $current_page
    ));

    if($aboutPosts->have_posts()) :
        while($aboutPosts->have_posts()) :
            $aboutPosts->the_post();
        ?>
        <div>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        </div>
    <?php  endwhile;
    // next_posts_link('Next',$aboutPosts->max_num_pages);
    echo paginate_links(array(
        'total' => $aboutPosts->max_num_pages
    ));
    endif;
?>
</div>
</div>
<?php
get_footer();

?> 