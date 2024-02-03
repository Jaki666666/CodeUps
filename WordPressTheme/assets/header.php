<!DOCTYPE html>
<html lang="ja">

<head>
  <meta name="robots" content="noindex,nofollow" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <?php wp_head(); ?>
</head>

<body class="body">
  <header class="header" id="header">
    <div class="header__inner">
      <h1 class="header__title">
        <a href="index.html">
          <img class="header__img" src="<?php echo get_theme_file_uri(); ?>/images/common/code-ups.png" alt="サイトロゴ">
        </a>
      </h1>

      <nav class="header__nav">
        <ul class="header__items">
          <li class="header__item">
            <a href="news-list.html">
              <span>
                お知らせ
              </span>
            </a>
          </li>

          <li class="header__item">
            <a href="content.html">
              <span>
                事業内容
              </span>
            </a>
          </li>

          <li class="header__item">
            <a href="works.html">
              <span>
                制作実績
              </span>
            </a>
          </li>

          <li class="header__item">
            <a href="overview.html">
              <span>
                企業概要
              </span>
            </a>
          </li>

          <li class="header__item">
            <a href="blog-list.html">
              <span>
                ブログ
              </span>
            </a>
          </li>

          <li class="header__item">
            <a href="contact.html">お問い合わせ</a>
          </li>
        </ul>
      </nav>

      <!-- ハンバーガーメニュー -->
      <div class="header__hamburger hamburger" id="hamburger">
        <span class="hamburger__line hamburger__line--first"></span>
        <span class="hamburger__line hamburger__line--second"></span>
        <span class="hamburger__line hamburger__line--third"></span>
      </div>

      <!-- ドロワーメニュー -->
      <div class="header__drawer-menu drawer-menu" id="drawer-menu">
        <nav class="drawer-menu__nav">
          <ul class="drawer-menu__items">
            <li class="drawer-menu__item">
              <a href="#">トップ</a>
            </li>

            <li class="drawer-menu__item">
              <a href="news-list.html">お知らせ</a>
            </li>

            <li class="drawer-menu__item">
              <a href="content.html">事業内容</a>
            </li>

            <li class="drawer-menu__item">
              <a href="works.html">制作実績</a>
            </li>

            <li class="drawer-menu__item">
              <a href="overview.html">企業概要</a>
            </li>

            <li class="drawer-menu__item">
              <a href="blog-list.html">ブログ</a>
            </li>

            <li class="drawer-menu__item">
              <a href="contact.html">お問い合わせ</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </header>