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
    $output = '<ul>';
    $start_index = ($page == 1) ? 1 : 0;
    for ($index = $start_index; $index < count($posts['contents']); $index++) {
      $post = $posts['contents'][$index];
      $date = date('Y-m-d', strtotime($post['publishAt']));
      $title = esc_html($post['name']);
      $url = esc_url($post['noteUrl']);
      $output .= "<li><span class='date'>{$date}</span> - <a href='{$url}' target='_blank'>{$title}</a></li>";
    }
    $output .= '</ul>';
    $output .= '<div class="pagination">';
    if ($page > 1) {
      $output .= '<a href="#" class="prev-page" data-page="' . ($page - 1) . '">前のページ</a>';
    }
    // 次のページが存在するかどうかを判断
    $next_page_posts = get_note_posts($page + 1);
    if (!empty($next_page_posts['contents'])) {
      $output .= '<a href="#" class="next-page" data-page="' . ($page + 1) . '">次のページ</a>';
    }
    $output .= '</div>';
  } else {
    $output = '<p>投稿がありません。</p>';
  }

  echo $output;
  wp_die();
}

add_action('wp_ajax_load_note_posts', 'load_note_posts');
add_action('wp_ajax_nopriv_load_note_posts', 'load_note_posts');

// 投稿タイプのパーマリンクを設定
function custom_post_type_permalink($post_link, $post)
{
  if (is_object($post) && $post->post_type == 'staff-interview') {
    return home_url('staff-interview/' . $post->ID);
  }
  return $post_link;
}
add_filter('post_type_link', 'custom_post_type_permalink', 1, 2);

// 投稿タイプのパーマリンクのリライトルールの設定
function custom_post_type_rewrite_rules($rules)
{
  $new_rules = array(
    'staff-interview/([0-9]+)$' => 'index.php?post_type=staff-interview&p=$matches[1]',
  );
  return $new_rules + $rules;
}
add_filter('rewrite_rules_array', 'custom_post_type_rewrite_rules');
