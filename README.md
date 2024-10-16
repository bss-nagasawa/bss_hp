# BSS ホームページ PJ

## 背景

現在の HP は STUDIO で構築されていますが、メンテナンス性の悪さや自由度の低さから、WordPress (WP) による構築への変更が必要です。WP 構築にあたり、デザインと各コンテンツの見直しを行います。また、他システムで管理されているコンテンツもコンバートします。

## スケジュール

- **時系列**
  - 8/23 ～ デザイン作成開始
  - 8/26 ～ サーバー環境構築
  - 8/27 ～ 管理画面機能構築
  - 9/1 ～ ユーザー画面テーマファイルコーディング　 ← 依頼作業フェーズ
  - 9/16 ～ API 関連構築
  - 9/20 　 デザイン最終 FIX
  - 9/24 　 管理画面側機能構築完了
  - 9/25 ～ 検収開始
  - 9/30 　 検収終了

## WBS

[WBS](https://example.com)

## 画面要件

### Figma ワイヤーフレーム

[Figma WF](https://www.figma.com/design/5dsaebeFHc0DzbZV9qBrAf/BSS%E3%80%80HP%E3%83%AF%E3%82%A4%E3%83%A4%E3%83%BC%E3%83%95%E3%83%AC%E3%83%BC%E3%83%A0?node-id=0-1&t=VhEHZI7noiRxMT9v-1)

### TOP

- **MV**
  - 画面の高さは約 50％の控えめなサイズ
  - スライドは使用せず、1 枚固定またはランダム表示
  - カバー上にキャッチコピー、説明文、採用ページへのリンク、採用応募フォームへのリンクを固定配置
- **スライドコンテンツ**
  - 各コンテンツへのリンク、レクタングルバナーを並べてスライドコンテンツとして表示
- **お知らせ**
  - タイトルクリックで詳細ページへ移動
  - `more...` クリックで一覧ページへ移動
- **BSS とは**
  - VISION: イメージとテキストで構成
  - MISSION: イメージとテキストで構成
- **BSS の特徴**
  - イメージとテキストで構成
- **社長ブログ**
  - お知らせと同じ仕様
  - 現行のようにヘッダーをつけるかデザイン検討

### コンテンツページ

- **ページ見出し**
  - 背景画像を使用し、見出しテキストを背景画像上に固定配置
- **ページ説明**
  - 背景無しでテキストのみ表示
- **1 カラムコンテンツ**
  - ワイヤーフレーム通りにデザイン、滞在ページで完結
- **2 カラムコンテンツ**
  - ワイヤーフレーム通りにデザイン、コンテンツページへのリンクあり

### リストコンテンツ

- **ページ見出し**
  - 背景画像を使用し、見出しテキストを背景画像上に固定配置
- **テキストリンク**
  - タグやカテゴリでのリストの絞り込み機能は実装検討中
  - タイトルクリックで詳細ページへ移動
  - ページャクリックでパラメーターに応じた一覧表示
- **ブログ、社員インタビュー**
  - タイトルクリックで詳細ページへ移動
  - `more...` クリックで非同期追加読み込み

### 詳細ページ

- **ページ見出し**
  - 背景無し、見出しテキスト固定配置
- **詳細表示**
  - 詳細表示
  - ページ下部に回遊リンク表示、トップのスライドコンテンツ検討
  - お問い合わせフォームなども詳細ページテンプレートで表示

## 機能要件

### サイト管理画面

#### 投稿

- **お知らせ投稿**
  - タグ、カテゴリあり
  - SNS 連携
- **ブログ投稿**
  - タグ、カテゴリあり
  - SNS 連携
- **社長ブログ投稿**
  - SNS 連携

#### 固定ページ

- **1 カラムテンプレート**
- **2 カラムテンプレート**
- **single テンプレート**

#### お問い合わせ

- **お問い合わせ**
  - 協業、お問い合わせ用フォーム
- **採用応募**
  - フォーム、LINE 公式応募対応
  - 各お問合せ内容を管理画面で確認可能

#### ログイン認証

- **ID、パスワード、reCAPTCHA**

#### セキュリティ

- **WAF**
- **ログイン IP 計測**
- **ログインユーザー計測**
- **ファイル改ざん検知**
- **スパム対策**
- **バックアップ**

#### ユーザー権限

- **マスター**
- **管理者**
- **投稿編集者**

#### SEO

- **All in One SEO**
- **XML サイトマップ**

#### その他

- **REST API**

### ユーザー画面

- **トップページ**
  - ローディングアニメーション

## コーディングルール

### インデント

- インデントはスペース 2 つを使用します。

### 命名規則

- 変数名、関数名はキャメルケース（例: `myVariable`、`myFunction`）を使用します。
- グローバル変数はすべて大文字でアンダースコアで区切ります（例: `GLOBAL_VARIABLE`）
- HTML クラス名はケバブケース（例: `my-class`）を使用します。

### コメント

- 必要に応じてコードにコメントを追加し、コードの意図や動作を説明します。
- コメントは日本語で記述します。

### ファイル構成

- 各コンポーネントは個別のファイルに分けて管理します。
- ファイル名は一貫性を持たせ、意味のある名前を付けます。

### コードの整形

- コードは常に整形ツールを使用して整形します。
- 不要な空白や改行は削除します。
- push、プルリク時に Lint がかかります。

### バージョン管理

- github を使用します。
- コミットメッセージは簡潔に記述します。
- 1 つのコミットには 1 つの変更内容を含めます。
- １コミット１機能、コミットごとのプルリク作成をお願いします。

## プラグインについて

- 機能追加は原則ストアから取得可能なプラグインを使用すること。
- プラグインファイルの編集は行わない。
- プラグインは直近１年以内に更新履歴があるものを使用。
- 有料プラグインは使用しない。
