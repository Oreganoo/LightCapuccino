<?php if(have_posts()): while(have_posts()): the_post();?>

<?php the_content();?>

   	<?php 
   	$categories = get_the_category();
   	foreach($categories as $cat):?>

   		<a href="<?php echo get_category_link($cat->term_id);?>">
   		    <?php echo $cat->name;?>
   	    </a>

   	<?php endforeach;?>

<?php // comments_template();?>

<?php endwhile; else: endif;?>