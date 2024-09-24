<?php
global $post;
$page_slug = $post->post_name;
?>
<div class="content-header-image">
    <img src="<?php echo theme_image_directory(); ?>/content-header/<?php echo $page_slug; ?>.png">
</div>