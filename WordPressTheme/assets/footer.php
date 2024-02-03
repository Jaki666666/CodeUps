  <footer class="footer">
    <div class="footer__top">
      <a href="#">
        <img class="footer__site-title" src="<?php echo get_theme_file_uri(); ?>/images/common/code-ups.png" alt="サイトロゴ">
      </a>

      <ul class="footer__items">
        <li class="footer__item">
          <a href="news-list.html">お知らせ</a>
        </li>

        <li class="footer__item">
          <a href="content.html">事業内容</a>
        </li>

        <li class="footer__item">
          <a href="works.html">制作実績</a>
        </li>

        <li class="footer__item">
          <a href="overview.html">企業概要</a>
        </li>

        <li class="footer__item">
          <a href="blog-list.html">ブログ</a>
        </li>

        <li class="footer__item">
          <a href="contact.html">お問い合わせ</a>
        </li>
      </ul>
    </div>

    <small class="footer__copyright">© 2021 CodeUps Inc.</small>

    <div class="footer__page-top-btn page-top-btn" id="page-top-btn">
      <img id="page-top-btn__normal" class="page-top-btn__img" src="<?php echo get_theme_file_uri(); ?>/images/common/top-button-white.jpg" alt="ページトップボタン">
      <img id="page-top-btn__hover" class="page-top-btn__img page-top-btn__img_hover"
        src="<?php echo get_theme_file_uri(); ?>/images/common/top-button-black.jpg" alt="ページトップボタン">
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>

</html>