			<footer id="footer" class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
				<div class="footer-content">
					<a href="#" class="totop"><a>
					<div class="inner">
						<div class="footer-container uk-flex uk-flex-wrap ">
							<div class="footer-access">
								<?php get_template_part('parts/footer/parts-footer-access'); ?>
							</div>
							<div class="footer-links">
								<?php
								wp_nav_menu(array(
									'theme_location' => 'footer',
									'container' => false,
									'menu_class' => 'footer',
									'items_wrap' => '%3$s', // <ul>タグを出力しない
									'walker' => new Walker_Nav_Menu_No_UL(), // カスタムウォーカーを使用
								));
								?>
							</div>
						</div>
					</div>
				</div>
				<?php get_template_part('parts/footer/parts-footer-copy'); ?>
			</footer>
			</div>
			<div class="sp-menu">
				<?php
					wp_nav_menu(array(
						'theme_location' => 'sp',
						'container' => false,
						'menu_class' => 'sp-menu',
						// 'items_wrap' => '%3$s', // <ul>タグを出力しない
						'walker' => new Walker_Nav_Menu_No_UL(), // カスタムウォーカーを使用
					));
				?>
			</div>

			<?php wp_footer(); ?>
			<script>
				jQuery(document).ready(function($) {
                    // スムーススクロールの設定
                    $('a[href*="#"]').on('click', function(e) {
                        // ハッシュリンクが現在のページ内のリンクであることを確認
                        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                            e.preventDefault();

                            // ハッシュが空でないことを確認
                            if (this.hash !== "") {
                                var target = $(this.hash);
                                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

                                if (target.length) {
                                    $('html, body').animate({
                                        scrollTop: target.offset().top
                                    }, 500, 'linear');
                                }
                            } else {
                                // ページトップへのリンク
                                $('html, body').animate({
                                    scrollTop: 0
                                }, 500, 'linear');
                            }
                        }
                    });
                });
			</script>
			</body>

			</html> <!-- end of site. what a ride! -->