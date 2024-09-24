			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
				<div id="" class="footer-content">
					<?php get_template_part('parts/footer/parts-footer-access'); ?>
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
				<?php get_template_part('parts/footer/parts-footer-copy'); ?>
			</footer>
			</div>
			<?php wp_footer(); ?>
			</body>

			</html> <!-- end of site. what a ride! -->