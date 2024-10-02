<div class="footer-content-wrap">
    <div class="uk-flex uk-flex-wrap footer-access-wrap uk-margin-small-bottom">
        <div class="container-logo">
            <img src="<?php echo theme_image_directory(); ?>/logo.png">
        </div>
        <div class="container-access">
            <p>
                <span>TEL：<a href="tel:<?php echo get_option('company_phone'); ?>"><?php echo get_option('company_phone'); ?></a></span>｜
                <span>MAIL：<a href="mailto:<?php echo get_option('company_email'); ?>"><?php echo get_option('company_email'); ?></a></span>
            </p>
            <p><span>URL：<a href="<?php echo home_url(); ?>"><?php echo home_url(); ?></a></span></p>
        </div>
        <div class="container-pmark">
            <img src="<?php echo theme_image_directory(); ?>/pmark1.png">
        </div>
    </div>
    <div class="uk-flex uk-flex-center">
        <iframe src="https://www.google.com/maps/embed?pb=<?php echo get_option('company_coordinates'); ?>" width="" height="295" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="google-map"></iframe>
    </div>
    <p class="uk-margin-small-top uk-margin-small-bottom">
        <span><?php echo get_option('company_address'); ?></span>
    </p>
</div>

<script>
    jQuery(document).ready(function($) {
        var innerElement = $('.inner');
        var iframeElement = $('#google-map');
        if (innerElement.length && iframeElement.length) {
            var innerWidth = innerElement.width();
            var newIframeWidth = innerWidth * (2 / 3) - 60;
            console.log(newIframeWidth);
            iframeElement.width(newIframeWidth);
        }
    });
</script>