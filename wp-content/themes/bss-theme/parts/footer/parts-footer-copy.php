<div class="copy-container">
    <div class="inner content-inner uk-flex uk-flex-nowrap uk-flex-between">
        <div class="copy-links">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'copy',
                'container' => false,
                'menu_class' => 'copy',
                'items_wrap' => '%3$s', // <ul>タグを出力しない
                'walker' => new Walker_Nav_Menu_No_UL(), // カスタムウォーカーを使用
            ));
            ?>
        </div>
        <p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
    </div>
</div>