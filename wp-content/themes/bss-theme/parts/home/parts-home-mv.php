<?php
$group_field = get_field('home_mv');
?>
<div class="mv-inner">
    <div class="mv-inner-left">
        <div class="mv-left-content">
            <h2 class="mv-headline tc-em"><?php echo $group_field['mv-headline'];?></h2>
            <h3 class="mv-description"><?php echo $group_field['mv-description'];?></h3>
            <div class="uk-flex mv-btn-wrap">
                <a href="<?php echo get_home_url();?>/recruit" class="btn btn-mc tc-white">採用情報</a>
                <a href="<?php echo get_home_url();?>/recruit-form" class="btn btn-sc tc-white">エントリー</a>
            </div>
        </div>
    </div>
    <div class="mv-inner-right mv-image">
        <img src="<?php echo $group_field['mv-image']; ?>" alt="メインビジュアル｜駆け上がるビジネスマン">
    </div>
</div>
<div class="mv-btn-wrap-sp">
    <a href="<?php echo get_home_url();?>/recruit" class="btn btn-mc tc-white">採用情報</a>
    <a href="<?php echo get_home_url();?>/recruit-form" class="btn btn-sc tc-white">エントリー</a>
</div>