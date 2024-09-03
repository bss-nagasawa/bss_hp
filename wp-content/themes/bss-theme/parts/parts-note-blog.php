<div class="container">
    <h2>社長ブログ</h2>
    <div class="note-posts">
        <?php
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $posts = get_note_posts($page);
        if (!empty($posts['contents'])) {
            echo '<ul>';
            // ページ番号が1の場合は配列の1番目の要素から開始、それ以外は0番目から
            $start_index = ($page == 1) ? 1 : 0;
            for ($index = $start_index; $index < count($posts['contents']); $index++) {
                $post = $posts['contents'][$index];
                $date = date('Y-m-d', strtotime($post['publishAt']));
                $title = esc_html($post['name']);
                $url = esc_url($post['noteUrl']);
                echo "<li><span class='date'>{$date}</span> - <a href='{$url}' target='_blank'>{$title}</a></li>";
            }
            echo '</ul>';
            echo '<div class="pagination">';
            if ($page > 1) {
                echo '<a href="?page=' . ($page - 1) . '">前のページ</a>';
            }
            echo '<a href="?page=' . ($page + 1) . '">次のページ</a>';
            echo '</div>';
        } else {
            echo '<p>投稿がありません。</p>';
        }
        ?>
    </div>
</div>