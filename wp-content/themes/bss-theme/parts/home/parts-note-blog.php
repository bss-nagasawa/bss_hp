<!-- parts-note-blog.php -->

<div class="container">
    <h3>社長ブログ</h3>
    <div class="note-posts" id="note-posts">
        <?php
        $page = 1;
        $posts = get_note_posts($page);
        if (!empty($posts['contents'])) {
            echo '<ul>';
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
            echo '<a href="#" class="next-page" data-page="2">次のページ</a>';
            echo '</div>';
        } else {
            echo '<p>投稿がありません。</p>';
        }
        ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('click', function(e) {
            if (e.target && (e.target.classList.contains('next-page') || e.target.classList.contains('prev-page'))) {
                e.preventDefault();
                var page = e.target.getAttribute('data-page');
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        document.getElementById('note-posts').innerHTML = xhr.responseText;
                    }
                };
                xhr.send('action=load_note_posts&page=' + page);
            }
        });
    });
</script>