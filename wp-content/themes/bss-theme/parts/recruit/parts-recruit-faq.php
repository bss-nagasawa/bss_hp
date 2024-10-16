<div id="recruit-faq" class="content-faq">
    <div class="content-header contentHeader-spacing">
        <h3 class="content-header-title">採用Q＆A</h3>
        <h4 class="content-header-ruby">Q&A</h4>
    </div>
    <?php
    // カスタム投稿タイプ 'faq' のクエリ
    $args = array(
        'post_type' => 'faq',
        'posts_per_page' => 3, // 表示する投稿数を指定
        'meta_key' => 'oreder_num', // カスタムフィールドのキーを指定
        'orderby' => 'meta_value_num', // カスタムフィールドの値でソート
        'order' => 'ASC', // 昇順でソート
    );
    $faq_query = new WP_Query($args);
    ?>
    <div class="inner content-inner">
        <p class="uk-text-center uk-margin-large-bottom">今採用についての疑問・お悩みに採用担当者がお答えします。</p>
        <ul uk-accordion>
            <?php if ($faq_query->have_posts()) : ?>
                    <?php while ($faq_query->have_posts()) : $faq_query->the_post(); ?>
                        <li class="faq-item">
                            <a class="faq-title uk-accordion-title" href><h3><span class="faq-icon">Ｑ</span><?php the_title(); ?></h3></a>
                            <div class="faq-content uk-accordion-content uk-flex">
                                <span class="faq-icon">Ａ</span>
                                <div><?php the_content(); ?></div>
                            </div>
                        </li>
                    <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>FAQが見つかりませんでした。</p>
            <?php endif; ?>
        </ul>
        <div class="faq-link uk-flex uk-flex-right uk-margin-small-top">
            <a href="<?php echo get_post_type_archive_link('faq'); ?>" class="uk-margin-large-bottom btn tc-em">他のQ&Aを見る</a>
        </div>
    </div>
</div><!-- /#recruit-message -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const loadMoreButton = document.querySelector('.faq-link a');
    let page = 2; // 初期ページ番号

    loadMoreButton.addEventListener('click', function(event) {
        event.preventDefault();

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    const faqList = document.querySelector('ul[uk-accordion]');
                    faqList.insertAdjacentHTML('beforeend', response.data);
                    page++;

                    // 追加の一覧が表示されたらボタンを非表示にする
                    loadMoreButton.parentElement.style.display = 'none';
                } else {
                    alert('これ以上のQ&Aはありません。');
                }
            }
        };

        xhr.send('action=load_more_faqs&page=' + page);
    });
});
</script>