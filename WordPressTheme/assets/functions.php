<?php 
function enqueue_styles_and_scripts() {
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP&display=swap');

    // テーマのスタイルシート
    wp_enqueue_style('theme-styles', get_theme_file_uri('/css/styles.css'));

    // SwiperのCSS
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css');

    // jQuery
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.js', array(), null, true);

    // GSAP
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.0/gsap.min.js', array(), null, true);
    wp_enqueue_script('scroll-trigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.0/ScrollTrigger.min.js', array('gsap'), null, true);

    // SwiperのJS
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', array(), null, true);

    // カスタムJavaScript
    wp_enqueue_script('custom-script', get_theme_file_uri('/js/script.js'), array('jquery', 'gsap', 'scroll-trigger', 'swiper'), null, true);
}

add_action('wp_enqueue_scripts', 'enqueue_styles_and_scripts');

function custom_posts_per_page($query) {
    if (is_admin() || ! $query->is_main_query()) {
        return;
    }

    if (is_home() || is_archive()) {
        $query->set('posts_per_page', 10); // 表示件数を10に設定
    }
}
add_action('pre_get_posts', 'custom_posts_per_page');


