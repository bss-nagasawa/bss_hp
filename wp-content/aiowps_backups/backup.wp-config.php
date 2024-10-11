<?php
/**
 * The base configurations of the WordPress.
 *
 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、言語、ABSPATH の設定を含みます。
 * より詳しい情報は {@link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86 
 * wp-config.php の編集} を参照してください。MySQL の設定情報はホスティング先より入手できます。
 *
 * このファイルはインストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さず、このファイルを "wp-config.php" という名前でコピーして直接編集し値を
 * 入力してもかまいません。
 *
 * @package WordPress
 */

// 注意: 
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - こちらの情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'bss_hp_wp_2024');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'bss_hp_wp_2024');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'se3x5RW8OP9');

/** MySQL のホスト名 */
define('DB_HOST', 'mysql80.bss.sakura.ne.jp');

/** データベースのテーブルを作成する際のデータベースのキャラクターセット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+$&qU)+wHpqFehClV$JF( 40Z8y<f4eXMyYI@mwrrKVoDbq,D.Mr_L|7VEnAwndV');
define('SECURE_AUTH_KEY',  '[k-6RgZ<8426<w$)ZN~Nc=<K2 {C#1cZn`f)aAi}X8a*l0h/NsCLIlY>k mr#T8#');
define('LOGGED_IN_KEY',    'Oe;h=Bb~gO!XiwN*B^jpI(ghdBa9>oW6A,`2$S9_4{<x]iJUt**49B-BX%#8iJq4');
define('NONCE_KEY',        '?n:1|qULaSZu1lyz}pzDn5yuA+Vvkypf|YdJ]#c^`oEq{D!excamcM2WyOHs;{lh');
define('AUTH_SALT',        '>h`1l[ G;=~ab4dpffUWE!6yP-ljOs1 :O%?b=%_vban*mr7Ow>9fQ5Y3QTa_JAb');
define('SECURE_AUTH_SALT', 'X~ixZaWl0bg9,iPT!4QHw)JH4Iws]G=4IMTQNrGdDPefKAyRJ}1_]K5Otoh%lK@`');
define('LOGGED_IN_SALT',   ')3_H*b?BKRw90oueuz~&u;o%{uGk a6<@Ay8&^BSH[ywcep1qPg!VX0U9D%K$n^%');
define('NONCE_SALT',       '}(%clo7<yaCX9 fZ!n$`1ZDSOGGM6w7y&YtwYAdVz==39BW`4Ex+Sl&i=B?<@# o');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * ローカル言語 - このパッケージでは初期値として 'ja' (日本語 UTF-8) が設定されています。
 *
 * WordPress のローカル言語を設定します。設定した言語に対応する MO ファイルが
 * wp-content/languages にインストールされている必要があります。例えば de_DE.mo を
 * wp-content/languages にインストールし WPLANG を 'de_DE' に設定することでドイツ語がサポートされます。
 */
define('WPLANG', 'ja');

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
