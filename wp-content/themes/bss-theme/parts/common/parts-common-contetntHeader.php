<?php
global $post;
$page_slug = $post->post_name;
$page_title = $post->post_title;
if ($page_slug === 'company') {
    $content_title = 'Company';
    $title_class = 'main-content-header';
} elseif ($page_slug === 'recruit') {
    $content_title = 'Recruit';
    $title_class = 'main-content-header';
} else {
    $content_title = $page_title;
    $title_class = 'common-header';
}
?>
<?php if ($title_class == 'common-header'): ?>
    <div class="page-header-wrap <?php echo $title_class; ?>">
        <div class="page-header-inner">
            <h1 class="page-headline"><?php echo $content_title; ?></h1>
        </div>
    </div>
<?php else: ?>
    <div class="page-header-wrap <?php echo $title_class; ?>">
        <div class="page-header-inner inner uk-flex">
            <h2 class="page-headline-ruby"><?php echo $page_title; ?></h2>
            <h1 class="page-headline tc-em"><?php echo $content_title; ?></h1>
        </div>
    </div>
<?php endif; ?>