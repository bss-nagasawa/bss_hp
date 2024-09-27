			<footer id="footer" class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
				<div class="footer-content">
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
			<?php wp_footer(); ?>
			</body>

			</html> <!-- end of site. what a ride! -->