<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv">
        <div class="mv__bg-wrapper">
            <picture>
                <source srcset="<?php echo get_theme_file_uri(); ?>/images/common/news.jpg" media="(max-width: 767px)">
                <img src="<?php echo get_theme_file_uri(); ?>/images/common/news-pc.jpg" alt="展望台の窓際にいる3人">
            </picture>

            <h2 class="mv__title mv__title--sub-page">お知らせ</h2>
        </div>
    </div>

    <!-- パンくずリスト -->
    <div class="bread-crumb news-list-bread-crumb">
        <div class="inner">
            <ul class="bread-crumb__items">
                <li class="bread-crumb__item">
                    <a href="index.html">トップ</a>
                </li>
                <li class="bread-crumb__item">
                    <span>></span>
                </li>
                <li class="bread-crumb__item">
                    <span>お知らせ一覧</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- お知らせ一覧 -->
    <section class="news-list news-list-news-list" id="news">
        <div class="news-list__inner inner">
            <?php
            $args = array(
                'post_type' => 'post', // 投稿タイプを指定
                'posts_per_page' => 10, // 表示件数を指定
            );

            $news_query = new WP_Query($args);

            if ($news_query->have_posts()):
                while ($news_query->have_posts()):
                    $news_query->the_post(); ?>
                    <div class="news-list__news news">
                        <div class="news__top">
                            <time class="news__date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                                <?php echo get_the_date(); ?>
                            </time>
                            <span class="news__category">お知らせ</span>
                        </div>

                        <div class="news__title-wrapper news__title-wrapper--news-list">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); // カスタムクエリをリセット
            endif;
            ?>

            <!-- ページネーション -->
            <div class="pagination blog-list-pagination">
                <?php wp_pagenavi(); ?>
            </div>
        </div>

        <!-- お問い合わせ -->
        <section class="contact news-list-contact" id="contact">
            <div class="contact__inner inner inner--small inner--contact">
                <div class="contact__section-title section-title">
                    <p class="section-title__english section-title__english--contact">Contact</p>
                    <h2 class="section-title__japanese section-title__japanese--contact">お問い合わせ</h2>
                </div>

                <p class="contact__text">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>

                <div class="contact__btn-wrapper">
                    <a class="contact__btn btn btn--contact" href="contact.html">
                        お問い合わせへ
                    </a>
                </div>
            </div>
        </section>
    </section>
</main>

<?php get_footer(); ?>