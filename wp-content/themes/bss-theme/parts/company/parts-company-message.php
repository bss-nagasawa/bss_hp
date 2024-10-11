<?php
$group_field = get_field('message_container');
?>
<div id="company-message" class="content-message">
    <div class="inner content-inner">
        <div class="content-header contentHeader-spacing">
            <h3 class="content-header-title">代表メッセージ</h3>
            <h4 class="content-header-ruby">Message</h4>
        </div>
        <div class="message-container uk-flex uk-flex-wrap uk-item-start">
            <div class="message-image">
                <img src="<?php echo theme_image_directory(); ?>/company/president01.png">
            </div>
            <div class="message-body">
                <p>
                    <?php echo $group_field['message_body']; ?>
                </p>
                <p class="name">代表取締役 <span class="noto">田中　誠</span></p>
            </div>
        </div>
    </div>
</div><!-- /#company-message -->