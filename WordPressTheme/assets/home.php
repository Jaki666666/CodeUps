<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv">
        <div class="mv__inner">
            <div class="mv__bg-wrapper">
                <img class="mv__bg is-active" src="<?php echo get_theme_file_uri(); ?>/images/common/MV1.jpg"
                    alt="地上から見上げた複数のビルと空">
                <img class="mv__bg" src="<?php echo get_theme_file_uri(); ?>/images/common/MV2.jpg"
                    alt="地上から真上を見上げて見える空と4つのビル">
                <img class="mv__bg" src="<?php echo get_theme_file_uri(); ?>/images/common/MV3.jpg" alt="上空から見るビル街">
            </div>

            <div class="mv__title">
                <h2 class="mv__main-title">メインタイトルが入ります</h2>
                <p class="mv__sub-title">サブタイトルが入ります</p>
            </div>
        </div>
    </div>

    <!-- お知らせ -->
    <div class="news top-news" id="news">
        <div class="news__inner inner">
            <?php
            $args = array(
                'posts_per_page' => 1, // 表示件数を1件に設定
            );

            $query = new WP_Query($args);

            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post(); ?>
                    <div class="news__top">
                        <time class="news__date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                            <?php echo get_the_date(); ?>
                        </time>
                        <span class="news__category">お知らせ</span>
                    </div>

                    <div class="news__title-wrapper">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </div>
                <?php endwhile;
            endif;

            wp_reset_postdata(); // カスタムクエリをリセット
            ?>

            <div class="news__btn-wrapper">
                <a class="btn btn--news" href="<?php the_permalink(); ?>">
                    すべて見る
                </a>
            </div>
        </div>
    </div>


    <!-- 事業内容 -->
    <section class="content top-content" id="content">
        <div class="content__inner inner">
            <div class="content__section-title section-title">
                <p class="section-title__english section-title__english--left">Content</p>
                <h2 class="section-title__japanese section-title__japanese--content">事業内容</h2>
            </div>
        </div>


        <div class="content__img-container">
            <div class="content__img-wrapper">
                <a href="content.html" class="content__link">
                    <picture>
                        <source srcset="imgs/common/content1.jpg" media="(max-width: 767px)">
                        <img src="<?php echo get_theme_file_uri(); ?>/images/common/content1pc.jpg" alt="手に持った灯りのついた電球">
                    </picture>
                    <h3 class="content__page-title">経営理念ページへ</h3>
                </a>
            </div>

            <div class="content__img-wrapper">
                <a href="content.html" class="content__link">
                    <picture>
                        <source class="content__img" srcset="imgs/common/content2.jpg" media="(max-width: 767px)">
                        <img src="<?php echo get_theme_file_uri(); ?>/images/common/content2pc.jpg"
                            alt="座ってテーブルの上にパソコンを開いて笑う男性一人と女性二人" class="content__img">
                    </picture>
                    <h3 class="content__page-title">理念1へ</h3>
                </a>
            </div>

            <div class="content__img-wrapper">
                <a href="content.html" class="content__link">
                    <picture>
                        <source class="content__img" srcset="imgs/common/content3.jpg" media="(max-width: 767px)">
                        <img src="<?php echo get_theme_file_uri(); ?>/images/common/content3pc.jpg"
                            alt="パソコンの画面に写る折れ線グラフ" class="content__img">
                    </picture>
                    <h3 class="content__page-title">理念2へ</h3>
                </a>
            </div>

            <div class="content__img-wrapper">
                <a href="content.html" class="content__link">
                    <picture>
                        <source class="content__img" srcset="imgs/common/content4.jpg" media="(max-width: 767px)">
                        <img src="<?php echo get_theme_file_uri(); ?>/images/common/content4pc.jpg"
                            alt="テーブルの上に開いたパソコンと手に持ったスマホ" class="content__img">
                    </picture>
                    <h3 class="content__page-title">理念3へ</h3>
                </a>
            </div>
        </div>
    </section>

    <!-- 制作実績 -->
    <section class="information information--works top-information" id="works">
        <div class="information__inner information__inner--title inner">
            <div class="information__section-title section-title">
                <p class="section-title__english">Works</p>
                <h2 class="section-title__japanese section-title__japanese--information">制作実績</h2>
            </div>
        </div>

        <div class="information__contents-wrapper information__contents-wrapper--works">
            <div class="information__contents inner">
                <div class="information__img-wrapper information__img-wrapper--works">
                    <!-- Sliderを包むコンテナ要素 -->
                    <div class="information__swiper swiper js-swiper">
                        <!-- スライド要素を包む要素 -->
                        <div class="information__swiper-wrapper swiper-wrapper">
                            <?php
                            // カスタムクエリを作成
                            $works_query = new WP_Query(
                                array(
                                    'post_type' => 'works', // カスタム投稿タイプの指定
                                    'posts_per_page' => 3,
                                )
                            );

                            if ($works_query->have_posts()):
                                while ($works_query->have_posts()):
                                    $works_query->the_post();
                                    ?>
                                    <div class="information__swiper-slide swiper-slide">
                                        <img class="information__img" src="<?php the_post_thumbnail_url('full'); ?>"
                                            alt="<?php the_title(); ?>のアイキャッチ">
                                    </div>
                                    <?php
                                endwhile;

                                // メインのクエリをリセット
                                wp_reset_postdata();
                            else:
                                // 記事が存在しない場合の処理
                                echo '記事がありません。';
                            endif;
                            ?>
                        </div>
                        <div class="information__swiper-pagination swiper-pagination"></div>
                    </div>
                </div>

                <div class="information__text-wrapper information__text-wrapper--works">
                    <div class="information__section-text information__section-text--works">
                        <h3 class="information__main-title">メインタイトルが入ります</h3>

                        <p class="information__explanation">
                            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
                        </p>

                        <div class="information__btn-wrapper">
                            <a class="btn" href="works.html">
                                詳しく見る
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 企業概要 -->
    <section class="information top-information" id="overview">
        <div class="information__inner inner">
            <div class="information__section-title section-title">
                <p class="section-title__english section-title__english--left">Overview</p>
                <h2 class="section-title__japanese section-title__japanese--information">企業概要</h2>
            </div>
        </div>

        <div class="information__contents-wrapper information__contents-wrapper--overview">
            <div class="information__contents information__contents--overview inner">
                <div class="information__img-wrapper">
                    <img class="information__img" src="<?php echo get_theme_file_uri(); ?>/images/common/overview.jpg"
                        alt="オフィスの廊下">
                </div>

                <div class="information__text-wrapper information__text-wrapper--overview">
                    <div class="information__section-text">
                        <h3 class="information__main-title">メインタイトルが入ります</h3>

                        <p class="information__explanation">
                            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
                        </p>

                        <div class="information__btn-wrapper">
                            <a class="btn" href="overview.html">
                                詳しく見る
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ブログ -->
    <section class="blog top-blog" id="blog">
        <div class="blog__inner inner">
            <div class="blog__section-title section-title">
                <p class="section-title__english">Blog</p>
                <h2 class="section-title__japanese section-title__japanese--blog">ブログ</h2>
            </div>

            <div class="blog__card-wrapper card-wrapper">
                <?php
                // カスタムクエリを作成
                $blog_query = new WP_Query(
                    array(
                        'post_type' => 'blog', // カスタム投稿タイプの指定
                        'posts_per_page' => 3,
                    )
                );

                if ($blog_query->have_posts()):
                    while ($blog_query->have_posts()):
                        $blog_query->the_post();
                        ?>
                        <div class="card-wrapper__card card">
                            <a class="card__link" href="">
                                <img class="card__icon" src="<?php echo get_theme_file_uri(); ?>/images/common/new@3x.webp"
                                    alt="アイコン">

                                <img class="card__img" src="<?php echo get_theme_file_uri(); ?>/images/common/card.jpg"
                                    alt="ノートパソコンの画面に写るプログラミングの画面">

                                <div class="card__text-wrapper">
                                    <p class="card__title">
                                        <?php the_title(); ?>
                                    </p>
                                    <p class="card__explanation">
                                        <?php the_content(); ?>
                                    </p>

                                    <div class="card__bottom">
                                        <span class="card__category">
                                            <?php
                                            // カスタム投稿のIDを取得
                                            $post_id = get_the_ID();

                                            // カテゴリー（ターム）の取得
                                            $terms = get_the_terms($post_id, 'blog-category');

                                            // カテゴリーが存在する場合に処理
                                            if ($terms && !is_wp_error($terms)) {
                                                echo '<span class="card__category">';
                                                foreach ($terms as $term) {
                                                    // ターム名やリンクなどの情報を取得
                                                    $term_name = $term->name;
                                                    $term_link = get_term_link($term);

                                                    // ここで取得した情報を span タグ内に表示
                                                    echo esc_html($term_name);
                                                }
                                                echo '</span>';
                                            }
                                            ?>
                                        </span>
                                        <time class="card__date" datetime="2021-07-20">
                                            <?php echo get_the_date(); ?>
                                        </time>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    endwhile;

                    // メインのクエリをリセット
                    wp_reset_postdata();
                else:
                    // 記事が存在しない場合の処理
                    echo '記事がありません。';
                endif;
                ?>
            </div>

            <div class="blog__btn-wrapper">
                <a class="btn" href="blog-list.html">
                    詳しく見る
                </a>
            </div>
        </div>
    </section>

    <!-- お問い合わせ -->
    <section class="contact top-contact" id="contact">
        <div class="contact__inner inner">
            <div class="contact__section-title section-title">
                <p class="section-title__english section-title__english--left">Contact</p>
                <h2 class="section-title__japanese section-title__japanese--contact">お問い合わせ</h2>
            </div>

            <p class="contact__text">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>

            <div class="contact__btn-wrapper">
                <a class="btn btn--contact" href="contact.html">
                    お問い合わせへ
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>