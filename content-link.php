<article class="post post-link">
    <?php  
    $content = get_the_content();
    $content = wp_strip_all_tags($content);
    ?>
   <a href="<?php echo $content ?>" target="_blank"><?php the_title(); ?></a> 
</article>