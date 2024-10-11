<?php
$group_field = get_field('home_about');
?>
<div class="content-header contentHeader-spacing">
    <h3 class="content-header-title">BSSとは</h3>
    <h4 class="content-header-ruby">About Us</h4>
</div>
<div class="content-body content-about">
    <p class="uk-text-small uk-text-center uk-margin-bottom line2"><?php echo $group_field['content-about'];?></p>
    <div class="content-about-images">
        <ul class="images-childs uk-flex uk-flex-wrap uk-flex-center uk-text-center">
            <li class="images-childs-card uk-background-default" uk-scrollspy="cls: uk-animation-slide-left; repeat: false">
                <p class="card-title tc-em">Vision</p>
                <img src="<?php echo theme_image_directory(); ?>/home/vision.png" alt="未来を見据えるビジネスマン" class="uk-margin-auto">
                <h4 class="card-head uk-margin-small-bottom">BSSが<span class="tc-sem">目指す世界</span></h4>
                <p class="uk-text-small">今までの自分を超える未来</p>
            </li>
            <li class="images-childs-card uk-background-default" uk-scrollspy="cls: uk-animation-slide-right; repeat: false">
                <p class="card-title tc-em">Mission</p>
                <img src="<?php echo theme_image_directory(); ?>/home/mission.png" alt="寄り添うコンサルタント" class="uk-margin-auto">
                <h4 class="card-head uk-margin-small-bottom">そのために<span class="tc-sem">実現</span>すること</h4>
                <p class="uk-text-small">社員第一をモットーに<br>一人ひとりに寄り添ってキャリアを形成</p>
            </li>
        </ul>
    </div>
</div>