<!-- parts-note-blog.php -->

<div class="container">
    <div class="note-posts" id="note-posts">
        <?php
        $page = 1;
        $posts = get_note_posts($page);
        if (!empty($posts['contents'])) {
            echo '<div class="uk-flex uk-felx-wrap uk-flex-row-reverse uk-flex-right">';
            echo '<ul class="blog-body">';
            $start_index = ($page == 1) ? 1 : 0;
            for ($index = $start_index; $index < count($posts['contents']); $index++) {
                $post = $posts['contents'][$index];
                $date = date('Y.m.d', strtotime($post['publishAt']));
                $title = esc_html($post['name']);
                $url = esc_url($post['noteUrl']);
                echo "<li class='blog-list-nomal'><span class='date'>{$date}</span> <a href='{$url}' target='_blank' class='title'>{$title}</a></li>";
            }
            echo '</ul>';
            echo '<div class="blog-header president uk-flex uk-flex-center uk-flex-middle">';
            echo '<h3 class="uk-text-bold">社長ブログ</h3>';
            echo '<div class="pagination uk-flex">';
            echo '<a href="#" class="next-page btn-next" data-page="2"></a>';
            echo '</div></div></div>';
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