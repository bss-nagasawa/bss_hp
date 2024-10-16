<?php
/*
Author: BSS
*/

// BONESコアを読み込む（これを削除するとテーマが壊れます）
require_once('library/bones.php');

// WordPress管理画面のカスタマイズ（デフォルトではオフ）
// require_once( 'library/admin.php' );

/*********************
BONESの起動
すべてを起動して実行します。
 *********************/

function bones_ahoy()
{

  // エディタースタイルを許可
  add_editor_style(get_stylesheet_directory_uri() . '/library/css/editor-style.css');

  // 言語サポートを開始
  load_theme_textdomain('bonestheme', get_template_directory() . '/library/translation');

  // クリーンアップ操作の開始
  add_action('init', 'bones_head_cleanup');
  // より良いタイトル
  add_filter('wp_title', 'rw_title', 10, 3);
  // RSSからWPバージョンを削除
  add_filter('the_generator', 'bones_rss_version');
  // 最近のコメントウィジェットのための注入されたCSSを削除
  add_filter('wp_head', 'bones_remove_wp_widget_recent_comments_style', 1);
  // ヘッド内のコメントスタイルをクリーンアップ
  add_action('wp_head', 'bones_remove_recent_comments_style', 1);
  // WPのギャラリー出力をクリーンアップ
  add_filter('gallery_style', 'bones_gallery_style');

  // 基本スクリプトとスタイルをエンキュー
  add_action('wp_enqueue_scripts', 'bones_scripts_and_styles', 999);
  // IE条件付きラッパー

  // テーマセットアップ後にこれらを起動
  bones_theme_support();

  // WordPressにサイドバーを追加（これらはfunctions.phpで作成されます）
  add_action('widgets_init', 'bones_register_sidebars');

  // 画像周りのランダムなコードをクリーンアップ
  add_filter('the_content', 'bones_filter_ptags_on_images');
  // 抜粋をクリーンアップ
  add_filter('excerpt_more', 'bones_excerpt_more');
} /* bones ahoyの終了 */

// パーティーを始めましょう
add_action('after_setup_theme', 'bones_ahoy');


/************* OEMBEDサイズオプション *************/

if (! isset($content_width)) {
  $content_width = 680;
}

/************* サムネイルサイズオプション *************/

// サムネイルサイズ
add_image_size('bones-thumb-600', 600, 150, true);
add_image_size('bones-thumb-300', 300, 100, true);

/*
サイズを追加するには、上記の行をコピーして
寸法と名前を変更します。最大の設定幅または高さと同じくらい大きな
「フィーチャー画像」をアップロードすれば、他のすべてのサイズが
自動的にクロップされます。

異なるサイズを呼び出すには、サムネイル関数内のテキストを
変更するだけです。

例えば、300 x 100サイズの画像を呼び出すには、
次の関数を使用します：
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
600 x 150画像の場合：
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

名前と寸法を好きなように変更できます。お楽しみください！
*/

add_filter('image_size_names_choose', 'bones_custom_image_sizes');

function bones_custom_image_sizes($sizes)
{
  return array_merge($sizes, array(
    'bones-thumb-600' => __('600px by 150px'),
    'bones-thumb-300' => __('300px by 100px'),
  ));
}

/************* テーマカスタマイズ *********************/

function bones_theme_customizer($wp_customize)
{
  // $wp_customize呼び出しはここに行きます。
  //
  // デフォルトのカスタマイズセクションを削除するには、以下の行をコメント解除します

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // デフォルトのコントロールを削除するには、以下の行をコメント解除します
  // $wp_customize->remove_control('blogdescription');

  // デフォルトのセクションタイトルを変更するには、以下をコメント解除します
  // $wp_customize->get_section('colors')->title = __( 'テーマカラー' );
  // $wp_customize->get_section('background_image')->title = __( '画像' );
}

add_action('customize_register', 'bones_theme_customizer');

/************* アクティブサイドバー ********************/

// サイドバーとウィジェットエリア
function bones_register_sidebars()
{
  register_sidebar(array(
    'id' => 'sidebar1',
    'name' => __('Sidebar 1', 'bonestheme'),
    'description' => __('最初の（プライマリ）サイドバー。', 'bonestheme'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  /*
    追加のサイドバーやウィジェットエリアを追加するには、上記のサイドバーコードをコピーして編集します。
    新しいサイドバーを呼び出すには、次のコードを使用します：

    新しいサイドバーのIDに名前を変更するだけです。例えば：

    register_sidebar(array(
        'id' => 'sidebar2',
        'name' => __( 'Sidebar 2', 'bonestheme' ),
        'description' => __( '2番目の（セカンダリ）サイドバー。', 'bonestheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));

    テンプレートでサイドバーを呼び出すには、sidebar.phpファイルをコピーしてサイドバーの名前に変更するだけです。
    上記の例を使用すると、次のようになります：
    sidebar-sidebar2.php

    */
} // この括弧を削除しないでください！


/*
これはtwentythirteenテーマで見つかった関数の修正で、
外部フォントを宣言できます。Google Fontsを使用している場合は、
これらのフォントを置き換え、scssファイルで変更し、すぐに実行できます。
*/
function bones_fonts()
{
  wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
}

add_action('wp_enqueue_scripts', 'bones_fonts');

function enqueue_uikit()
{
  // UIkitのCSSを追加
  wp_enqueue_style('uikit-css', get_template_directory_uri() . '/library/uikit/css/uikit.min.css');

  // UIkitのJavaScriptを追加
  wp_enqueue_script('uikit-js', get_template_directory_uri() . '/library/uikit/js/uikit.min.js', array('jquery'), null, true);
  wp_enqueue_script('uikit-icons', get_template_directory_uri() . '/library/uikit/js/uikit-icons.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_uikit');

/* この閉じタグを削除しないでください */

//partsファイル読み込み用のショートコード作成
function load_part_shortcode($atts)
{
  $atts = shortcode_atts(array(
    'path' => '',
  ), $atts, 'load_part');

  if (!$atts['path']) {
    return '';
  }

  $part_file = get_template_directory() . '/' . ltrim($atts['path'], '/');
  if (!file_exists($part_file)) {
    return '';
  }

  ob_start();
  include $part_file;
  return ob_get_clean();
}
add_shortcode('load_part', 'load_part_shortcode');



// NoteのAPIから指定されたページの投稿一覧を取得する関数
function get_note_posts($page = 1)
{
  $base_url = "https://note.com/api/v2/creators/makoto3000/contents";
  $kind = "note";
  $response = wp_remote_get("$base_url?kind=$kind&page=$page");

  if (is_wp_error($response)) {
    return [];
  }

  $data = json_decode(wp_remote_retrieve_body($response), true);
  if (empty($data['data'])) {
    return [];
  }

  return $data['data'];
}

// AJAXリクエストを処理する関数
function load_note_posts()
{
  $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
  $posts = get_note_posts($page);

  if (!empty($posts['contents'])) {
    $output = '<div class="uk-flex uk-felx-wrap uk-flex-row-reverse uk-flex-right">';
    $output .= '<ul class="blog-body">';
    $start_index = ($page == 1) ? 1 : 0;
    for ($index = $start_index; $index < count($posts['contents']); $index++) {
      $post = $posts['contents'][$index];
      $date = date('Y.m.d', strtotime($post['publishAt']));
      $title = esc_html($post['name']);
      $url = esc_url($post['noteUrl']);
      $output .= "<li class='blog-list-nomal'><span class='date'>{$date}</span> <a href='{$url}' target='_blank' class='title'>{$title}</a></li>";
    }
    $output .= '</ul>';
    $output .= '<div class="blog-header president uk-flex uk-flex-center uk-flex-middle">';
    $output .= '<h3>社長ブログ</h3>';
    $output .= '<div class="pagination uk-flex">';
    if ($page > 1) {
      $output .= '<a href="" class="prev-page btn-prev" data-page="' . ($page - 1) . '"></a>';
    }
    // 次のページが存在するかどうかを判断
    $next_page_posts = get_note_posts($page + 1);
    if (!empty($next_page_posts['contents'])) {
      $output .= '<a href="" class="next-page btn-next" data-page="' . ($page + 1) . '"></a>';
    }
    $output .= '</div></div></div>';
  } else {
    $output = '<p>投稿がありません。</p>';
  }

  echo $output;
  wp_die();
}

add_action('wp_ajax_load_note_posts', 'load_note_posts');
add_action('wp_ajax_nopriv_load_note_posts', 'load_note_posts');

// カスタムポストタイプのリライトルールを追加
function custom_post_type_rewrite_rules($rules)
{
  $new_rules = array(
    'staff-interview/([0-9]+)/?$' => 'index.php?post_type=staff-interview&p=$matches[1]',
    'staff-blog/([0-9]+)/?$' => 'index.php?post_type=staff-blog&p=$matches[1]',
    'faq/([0-9]+)/?$' => 'index.php?post_type=faq&p=$matches[1]',
  );
  return $new_rules + $rules;
}
add_filter('rewrite_rules_array', 'custom_post_type_rewrite_rules');

// カスタムポストタイプのパーマリンクを設定
function custom_post_type_permalinks($post_link, $post)
{
  if (is_object($post) && 'staff-interview' == $post->post_type) {
    return home_url('staff-interview/' . $post->ID . '/');
  }
  if (is_object($post) && 'staff-blog' == $post->post_type) {
    return home_url('staff-blog/' . $post->ID . '/');
  }
  if (is_object($post) && 'faq' == $post->post_type) {
    return home_url('faq/' . $post->ID . '/');
  }
  return $post_link;
}
add_filter('post_type_link', 'custom_post_type_permalinks', 1, 2);

// カスタムポストタイプのリライトルールをフラッシュ
function custom_post_type_flush_rewrite_rules()
{
  flush_rewrite_rules();
}
add_action('init', 'custom_post_type_flush_rewrite_rules', 20);

//テーマディレクトリ内の画像フォルダのURL定義
function theme_image_directory()
{
  return get_template_directory_uri() . '/library/images';
}

//グローバルメニューの定義
// ナビゲーションメニューを登録
function register_menus()
{
  register_nav_menus(
    array(
      'global' => __('Global'),
      'footer' => __('Footer'),
      'copy' => __('Copylight'),
      'sp' => __('SP'),
    )
  );
}
add_action('init', 'register_menus');
class Walker_Nav_Menu_No_UL extends Walker_Nav_Menu
{
  // 開始タグを出力しない
  function start_lvl(&$output, $depth = 0, $args = array()) {}

  // 終了タグを出力しない
  function end_lvl(&$output, $depth = 0, $args = array()) {}

  // 開始タグを出力しない
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    $output .= sprintf(
      '<a href="%s">%s</a>',
      esc_url($item->url),
      esc_html($item->title)
    );
  }

  // 終了タグを出力しない
  function end_el(&$output, $item, $depth = 0, $args = array()) {}
}

// 一般設定にカスタムフィールドを追加
function add_company_info_fields()
{
  add_settings_section(
    'company_info_section', // セクションID
    '会社情報', // セクションタイトル
    null, // セクションの説明
    'general' // 表示するページ
  );

  add_settings_field(
    'company_address', // フィールドID
    '会社の住所', // フィールドタイトル
    'company_address_field_callback', // コールバック関数
    'general', // 表示するページ
    'company_info_section' // セクションID
  );

  add_settings_field(
    'company_phone', // フィールドID
    '電話番号', // フィールドタイトル
    'company_phone_field_callback', // コールバック関数
    'general', // 表示するページ
    'company_info_section' // セクションID
  );

  add_settings_field(
    'company_email', // フィールドID
    'メールアドレス', // フィールドタイトル
    'company_email_field_callback', // コールバック関数
    'general', // 表示するページ
    'company_info_section' // セクションID
  );

  add_settings_field(
    'company_coordinates', // フィールドID
    'Google Map座標', // フィールドタイトル
    'company_coordinates_field_callback', // コールバック関数
    'general', // 表示するページ
    'company_info_section' // セクションID
  );

  register_setting('general', 'company_address', 'sanitize_text_field');
  register_setting('general', 'company_phone', 'sanitize_text_field');
  register_setting('general', 'company_email', 'sanitize_email');
  register_setting('general', 'company_coordinates', 'sanitize_text_field');
}
add_action('admin_init', 'add_company_info_fields');

// フィールドのコールバック関数
function company_address_field_callback()
{
  $value = get_option('company_address', '');
  echo '<input type="text" id="company_address" name="company_address" value="' . esc_attr($value) . '" class="regular-text">';
}

function company_phone_field_callback()
{
  $value = get_option('company_phone', '');
  echo '<input type="text" id="company_phone" name="company_phone" value="' . esc_attr($value) . '" class="regular-text">';
}

function company_email_field_callback()
{
  $value = get_option('company_email', '');
  echo '<input type="email" id="company_email" name="company_email" value="' . esc_attr($value) . '" class="regular-text">';
}

function company_coordinates_field_callback()
{
  $value = get_option('company_coordinates', '');
  echo '<input type="text" id="company_coordinates" name="company_coordinates" value="' . esc_attr($value) . '" class="regular-text">';
}
//カスタムフィールドをショートコードで使用できるようにする
// 住所のショートコードを作成
function company_address_shortcode() {
  $address = get_option('company_address', '');
  return esc_html($address);
}
add_shortcode('company_address', 'company_address_shortcode');
// 電話番号のショートコードを作成
function company_phone_shortcode() {
  $phone = get_option('company_phone', '');
  return esc_html($phone);
}
add_shortcode('company_phone', 'company_phone_shortcode');
// メールアドレスのショートコードを作成
function company_email_shortcode() {
  $email = get_option('company_email', '');
  return esc_html($email);
}
add_shortcode('company_email', 'company_email_shortcode');

//googlefont　楷書体
function enqueue_google_fonts()
{
  wp_enqueue_style('google-fonts-noto-serif-jp', 'https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&display=swap', false);
  wp_enqueue_style('google-fonts-kosugi-maru', 'https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap', false);
}
add_action('wp_enqueue_scripts', 'enqueue_google_fonts');

//アーカイブタイトルのカスタマイズ
function remove_archive_prefix($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    } elseif (is_date()) {
        if (is_day()) {
            $title = get_the_date();
        } elseif (is_month()) {
            $title = get_the_date('F Y');
        } elseif (is_year()) {
            $title = get_the_date('Y');
        }
    }
    return $title;
}
add_filter('get_the_archive_title', 'remove_archive_prefix');

// アーカイブスラッグを取得する関数
function get_archive_slug() {
  $queried_object = get_queried_object();
  $archive_slug = '';
  if (isset($queried_object->slug)) {
      $archive_slug = $queried_object->slug;
  } elseif (isset($queried_object->name)) {
      $archive_slug = $queried_object->name;
  }
  return $archive_slug;
}

//アーカイブから特定カテゴリ除外
function exclude_category_for_staff_interview($query) {
    if ($query->is_archive() && $query->is_main_query() && !is_admin()) {
        if ($query->get('post_type') == 'staff-interview') {
            $query->set('category__not_in', array(13));
        }
    }
}
add_action('pre_get_posts', 'exclude_category_for_staff_interview');

//FAQのAJAX読み込み
function load_more_faqs() {
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;

    $args = array(
        'post_type' => 'faq',
        'posts_per_page' => 3,
        'paged' => $page,
        'meta_key' => 'oreder_num',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
    );

    $faq_query = new WP_Query($args);

    if ($faq_query->have_posts()) {
        ob_start();
        while ($faq_query->have_posts()) : $faq_query->the_post(); ?>
            <li class="faq-item">
                <a class="faq-title uk-accordion-title" href><h3><span class="faq-icon">Ｑ</span><?php the_title(); ?></h3></a>
                <div class="faq-content uk-accordion-content uk-flex">
                    <span class="faq-icon">Ａ</span>
                    <div><?php the_content(); ?></div>
                </div>
            </li>
        <?php endwhile;
        wp_reset_postdata();
        $data = ob_get_clean();
        wp_send_json_success($data);
    } else {
        wp_send_json_error();
    }
}
add_action('wp_ajax_load_more_faqs', 'load_more_faqs');
add_action('wp_ajax_nopriv_load_more_faqs', 'load_more_faqs');

function set_first_image_as_thumbnail($post_id) {
    // 投稿タイプを指定
    $post_type = get_post_type($post_id);
    $target_post_type = 'staff-blog'; // ここを特定の投稿タイプに変更

    // 投稿タイプが一致し、サムネイルが設定されていない場合
    if ($post_type == $target_post_type && !has_post_thumbnail($post_id)) {
        $post = get_post($post_id);
        $content = $post->post_content;

        // 投稿内容から最初の画像を取得
        preg_match_all('/<img[^>]+>/i', $content, $matches);
        if (isset($matches[0][0])) {
            $first_img = $matches[0][0];

            // 画像URLを取得
            preg_match('/src="([^"]+)"/i', $first_img, $img_src);
            if (isset($img_src[1])) {
                $image_url = $img_src[1];

                // 画像をメディアライブラリに追加
                $upload_dir = wp_upload_dir();
                $image_data = file_get_contents($image_url);
                $filename = basename($image_url);
                if (wp_mkdir_p($upload_dir['path'])) {
                    $file = $upload_dir['path'] . '/' . $filename;
                } else {
                    $file = $upload_dir['basedir'] . '/' . $filename;
                }
                file_put_contents($file, $image_data);

                // メディアライブラリに添付ファイルとして追加
                $wp_filetype = wp_check_filetype($filename, null);
                $attachment = array(
                    'post_mime_type' => $wp_filetype['type'],
                    'post_title' => sanitize_file_name($filename),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                $attach_id = wp_insert_attachment($attachment, $file, $post_id);
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $attach_data = wp_generate_attachment_metadata($attach_id, $file);
                wp_update_attachment_metadata($attach_id, $attach_data);

                // サムネイルとして設定
                set_post_thumbnail($post_id, $attach_id);
            }
        }
    }
}
add_action('save_post', 'set_first_image_as_thumbnail');

function move_aioseop_meta_box_to_bottom() {
  // 一度meta boxを削除
  remove_meta_box( 'aioseop_meta', 'post', 'normal' );

  // 優先度 'low' で再度追加
  add_meta_box( 'aioseop_meta', __( 'All in One SEO', 'all-in-one-seo-pack' ), 'aiosp_meta_box', 'post', 'normal', 'low' );
}
add_action( 'add_meta_boxes', 'move_aioseop_meta_box_to_bottom' );
// Contact Form 7送信後のリダイレクト


