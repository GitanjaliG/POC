<div class="container">

    <article class="post <?php if(has_post_thumbnail()){ ?> has-thumbnail <?php } ?>">
        <div class="row">
        <?php if(has_post_thumbnail()){ ?>
            <div class="col-sm-3">
        
                <div class="post-thumbnail">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
                </div>
            </div>
           
            <div class="col-sm-9">
            <?php }else{ ?>
                <div class="col-sm-12">
            <?php }?>
                <div class="post-content">
                    <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="post-info"><?php the_time('F jS, Y g:i a')?> | by <a
                            href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                            <?php the_author(); ?></a> |
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

                    <?php if(is_search() OR is_archive()){ ?>
                    <p>
                        <?php echo get_the_excerpt(); ?>
                        <a href="<?php the_permalink();?>">Read More &raquo;</a>
                    </p>
                    <?php }else {
                    if($post->post_excerpt) { ?>

                    <p>
                        <?php echo get_the_excerpt(); ?>
                        <a href="<?php the_permalink();?>">Read More &raquo;</a>
                    </p>

                    <?php } else { 
                        the_content();  
                        } 
                }
                ?>
                </div>
                </div>
            </div>
    </article>

</div>