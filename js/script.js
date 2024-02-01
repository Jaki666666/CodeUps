jQuery(function ($) { // この中であればWordpressでも「$」が使用可能になる
  // ＝＝＝＝＝＝スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動)＝＝＝＝＝＝
  $(document).on('click', 'a[href*="#"]', function () {
    let time = 400;
    let header = $('.header').innerHeight();
    let target = $(this.hash);
    if (!target.length) return;
    let targetY = target.offset().top - header;
    $('html,body').animate({ scrollTop: targetY }, time, 'swing');
    return false;
  });

  // ＝＝＝＝＝＝headerをmvを通過したら透過なしにして、mv上は透過にする処理＝＝＝＝＝＝
  const header = document.querySelector('#header');

  $(function () {
    if ($('.mv').length) {
      gsap.to(header, {
        backgroundColor: '#111', scrollTrigger: {
          trigger: '.mv',
          start: 'bottom 6.5%',
          toggleActions: 'play none none reverse'
        }
      })
    }
  });

  // ＝＝＝＝＝＝ドロワーメニューのアニメーション＝＝＝＝＝＝
  const drawerMenu = document.querySelector('#drawer-menu');
  const links = document.querySelectorAll('.drawer-menu a');

  function drawerEvent() {
    // ドロワーメニューが開く時
    if (drawerMenu.classList.contains('drawer-menu--opened')) {
      const tl = gsap.timeline();
      tl
        .to(drawerMenu, { top: 0, duration: .3 }, '<')
        .to(links, { y: 0 }, '+=.3')
      // ドロワーメニューが閉じる時
    } else {
      const tl = gsap.timeline();
      tl
        .to(links, { y: '65%', duration: .5 }, '-=.1')
        .to(drawerMenu, { top: '-100vh', duration: .35 })
    }
  }

  // ＝＝＝＝＝＝ハンバーガーメニューをクリックした時の処理＝＝＝＝＝＝
  const hamburger = document.querySelector('#hamburger');
  const pageTopBtn = document.querySelector('#page-top-btn');
  const body = document.querySelector('body');

  hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('hamburger--opened');
    drawerMenu.classList.toggle('drawer-menu--opened');
    body.classList.toggle('body--opened');
    drawerEvent();
  });

  // ＝＝＝＝＝＝ドロワーメニューが開いているときにh1をクリックした時の処理＝＝＝＝＝＝
  const h1 = document.querySelector('.header__title');

  h1.addEventListener('click', () => {
    hamburger.classList.remove('hamburger--opened')
    drawerMenu.classList.remove('drawer-menu--opened')
    body.classList.remove('body--opened');
    drawerEvent();
  });

  // ＝＝＝＝＝＝ドロワーメニューをクリックしたときの処理＝＝＝＝＝＝
  drawerMenu.addEventListener('click', () => {
    hamburger.classList.remove('hamburger--opened')
    drawerMenu.classList.remove('drawer-menu--opened')
    body.classList.remove('body--opened');
    drawerEvent();
  });

  // ＝＝＝＝＝＝ドロワーメニューのページ内リンクにそれぞれクリックイベントを設定＝＝＝＝＝＝
  const drawerLink = document.querySelectorAll('.drawer-menu__item');

  for (let i = 0; i < drawerLink.length; i++) {
    drawerLink[i].addEventListener('click', (e) => {
      drawerMenu.classList.remove('drawer-menu--opened')
      hamburger.classList.remove('hamburger--opened')
      body.classList.remove('body--opened');
      drawerEvent();
    });
  }

  // ＝＝＝＝＝＝画面幅が768px以上になったらドロワーメニューを閉じる＝＝＝＝＝＝
  window.addEventListener('resize', function () {
    if (window.innerWidth >= 768) {
      // 768px以上の場合に実行する処理をここに書く
      if (hamburger.classList.contains('hamburger--opened') == true) {
        hamburger.classList.remove('hamburger--opened')
      }
      if (drawerMenu.classList.contains('drawer-menu--opened') == true) {
        drawerMenu.classList.remove('drawer-menu--opened')
      }
      if (body.classList.contains('body--opened') == true) {
        body.classList.remove('body--opened')
      }

      gsap.to(links, { y: 25 })
      gsap.to(drawerMenu, { top: '-100vh' })
    }
  });

  // ＝＝＝＝＝＝mvのbackgroundを切り替える処理＝＝＝＝＝＝
  $(function () {
    if ($('.mv__bg').length) {
      const mvBgs = document.querySelectorAll('.mv__bg');

      var currentIndex = 0;  // 現在処理中の画像のインデックス

      function processImage() {
        mvBgs[currentIndex].classList.add('is-active');  // クラス「mv__bg--is-active」を付ける
        setTimeout(function () {
          mvBgs[currentIndex].classList.remove('is-active');  // クラス「mv__bg--is-active」を取り除く
          currentIndex++;  // 次の画像へ
          if (currentIndex >= mvBgs.length) {
            currentIndex = 0;  // 最後の画像まで処理したら最初の画像に戻る
          }
          processImage();  // 次の画像の処理を行う
        }, 6000);  // 6秒後に次の画像の処理を行う
      }
      processImage();  // 最初の画像の処理を開始する
    }
  });

  // ＝＝＝＝＝＝セクション内のボタンのホバー時のアニメーション＝＝＝＝＝＝
  const sectionBtns = document.querySelectorAll('.btn');

  for (let index = 0; index < sectionBtns.length; index++) {
    // ホバーした時
    sectionBtns[index].addEventListener('mouseenter', function () {
      if (window.innerWidth >= 768) {
        // 白いbackgroundが左からスライド
        gsap.to(sectionBtns[index], { '--translateX': '0%', duration: .3 })
      }
    });
  }

  for (let index = 0; index < sectionBtns.length; index++) {
    // 離した時
    sectionBtns[index].addEventListener('mouseleave', function () {
      if (window.innerWidth >= 768) {
        // 白いbackgroundを左に戻す
        gsap.to(sectionBtns[index], { '--translateX': '-100%', duration: .3 })
      }
    });
  }

  // ＝＝＝＝＝＝お知らせ内のボタンのホバー時のアニメーション＝＝＝＝＝＝
  $(function () {
    if ($('.btn--news').length) {
      const newsBtn = document.querySelector('.btn--news');

      // ホバーした時
      newsBtn.addEventListener('mouseenter', function () {
        if (window.innerWidth >= 768) {
          // 黒いbackgroundが左からスライド
          gsap.to(newsBtn, { '--translateX': '0%', duration: .3 })
        }
      });

      // 離した時
      newsBtn.addEventListener('mouseleave', function () {
        if (window.innerWidth >= 768) {
          // 黒いbackgroundを左に戻す
          gsap.to(newsBtn, { '--translateX': '-100%', duration: .3 })
        }
      });
    }
  });

  // ＝＝＝＝＝＝ページトップボタン＝＝＝＝＝＝
  const pageTopBtnNormal = document.querySelector('#page-top-btn__normal')
  const pageTopBtnHover = document.querySelector('#page-top-btn__hover')

  //トップから少しでもスクロールしたら出現
  gsap.to(pageTopBtn, {
    autoAlpha: 1, scrollTrigger: {
      trigger: header,
      start: '1% top',
      toggleActions: 'play none none reverse'
    }
  })

  // ホバーした時
  pageTopBtn.addEventListener('mouseenter', function () {
    gsap.to(pageTopBtnNormal, { autoAlpha: 0, duration: 0.5 })
    gsap.to(pageTopBtnHover, { autoAlpha: 1, duration: 0.5 });
  });

  // 離した時
  pageTopBtn.addEventListener('mouseleave', function () {
    gsap.to(pageTopBtnNormal, { autoAlpha: 1, duration: 0.5 })
    gsap.to(pageTopBtnHover, { autoAlpha: 0, duration: 0.5 });
  });

  // ボタンのクリックイベントを処理する関数
  function scrollToTop() {
    // ページの上部にスクロールする
    window.scrollTo({
      top: 0,
      behavior: 'smooth' // スムーズなスクロールを有効にする
    });
  }

  // クリックしたらトップまで戻る
  pageTopBtn.addEventListener('click', scrollToTop);


  // ＝＝＝＝＝＝トップページswiper＝＝＝＝＝＝
  const swiper = new Swiper(".js-swiper", {
    slidesPerView: 1,
    centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 5000
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    }
  });

  // ＝＝＝＝＝＝ページネーション＝＝＝＝＝＝
  $(function () {
    if ($('.pagination').length) {
      // 初期状態のページ番号
      let currentPage = 1;

      // PREVボタンのクリックイベント
      document.getElementById('prev').addEventListener('click', function (event) {
        event.preventDefault();
        if (currentPage > 1) {
          currentPage--;
          updatePagination();
        }
      });

      // NEXTボタンのクリックイベント
      document.getElementById('next').addEventListener('click', function (event) {
        event.preventDefault();
        if (currentPage < 4) { // 4はページの総数（ページ数が変わる場合はここの値を調整する）
          currentPage++;
          updatePagination();
        }
      });

      // 各ページ番号のクリックイベント
      const pages = document.getElementsByClassName('pagination__page');
      for (let i = 0; i < pages.length; i++) {
        pages[i].addEventListener('click', function (event) {
          event.preventDefault();
          currentPage = parseInt(this.textContent);
          updatePagination();
        });
      }

      // ページ番号を更新する関数
      function updatePagination() {
        for (let i = 0; i < pages.length; i++) {
          if (parseInt(pages[i].textContent) === currentPage) {
            pages[i].classList.add('is-active');
          } else {
            pages[i].classList.remove('is-active');
          }
        }
      }
    }
  });

  // ＝＝＝＝＝＝制作実績詳細swiper＝＝＝＝＝＝
  $(function () {
    if ($('.works-details__swiper-wrapper').length) {
      //メインスライド
      var slider = new Swiper('.main-swiper', {
        slidesPerView: 1,
        centeredSlides: true,
        loop: true,
        loopedSlides: 8, // スライドの枚数と同じ値を指定
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });

      //サムネイルスライド
      var thumbs = new Swiper('.sub-swiper', {
        slidesPerView: 'auto',
        spaceBetween: '6.4%',
        centeredSlides: true,
        loop: true,
        slideToClickedSlide: true,

        breakpoints: {
          // 768px以上の場合
          768: {
            slidesPerView: 8,
            spaceBetween: '1%',
            centeredSlides: false,
          }
        }
      });

      //4系～
      slider.controller.control = thumbs;
      thumbs.controller.control = slider;
    }
  });

  const subSlides = document.querySelectorAll('.sub-swiper__swiper-slide');

  subSlides.forEach((subSlide) => {
    subSlide.addEventListener('click', () => {
      console.log('click');
    });
  })

  // ＝＝＝＝＝＝お問合せフォームの処理 ＝＝＝＝＝＝
  const inputs = document.querySelectorAll('.form__blank');
  const submitBtn = document.querySelector('#js-submit-btn');
  const errorMessage = document.querySelector('#js-form-message');
  const form = document.querySelector('#form');

  $(function () {
    if ($('.form').length) {
      // 文字が入力されたフォームの数を表す
      let inputtedNumber = 0

      // 送信ボタンがクリックされた数を表す
      let clickNumber = 0

      //-----文字入力フォーム-----
      inputs.forEach(input => {
        // 文字数の初期値
        let prevInputLength = 0;

        // フォームに文字が入力された時の処理
        input.addEventListener('input', function (e) {
          // 文字が入力されたフォームの値を取得
          const inputValue = e.target.value;
          // 現在の文字数
          const currentInputLength = inputValue.length;

          // フォームに1文字目が入力された時
          if (currentInputLength === 1 && prevInputLength === 0) {
            inputtedNumber += 1

            // １度送信した後
            if (clickNumber >= 1) {
              // エラーアニメーションを削除
              input.classList.remove('form__blank--error');

              // 必須項目を全て入力している時
              if (inputtedNumber == inputs.length) {
                // エラーメッセージを削除
                errorMessage.classList.remove('form__message--is-active');
              }
            }
            // フォームが空になった時
          } else if (currentInputLength === 0 && prevInputLength === 1) {
            inputtedNumber -= 1

            // １度送信した後
            if (clickNumber >= 1) {
              // エラーメッセージ、アニメーションを表示
              input.classList.add('form__blank--error');
              errorMessage.classList.add('form__message--is-active');
            }
          }

          // 現在の文字数を、次の入力時の文字数の初期値にする
          prevInputLength = currentInputLength;
        });
      });

      // -----送信ボタン-----
      // 送信ボタンをクリックした時の処理
      submitBtn.addEventListener('click', function (e) {
        clickNumber += 1

        //-----文字入力フォーム-----
        inputs.forEach(input => {
          const inputValue = input.value;

          // 文字が未記入のフォームがある場合,エラーアニメーションを表示
          if (inputValue.trim() == '') {
            input.classList.add('form__blank--error');
            // 文字が未記入のフォームがない場合,エラーアニメーションを削除
          } else {
            input.classList.remove('form__blank--error');
          }
        });

        // -----必須項目を全て入力している時-----
        if (inputtedNumber == inputs.length) {

          // エラーメッセージを削除
          errorMessage.classList.remove('form__message--is-active');
          // 必須項目の記入漏れがある場合
        } else {
          // サンクスページに飛ばさないようにする
          e.preventDefault();
          // エラーメッセージを表示
          errorMessage.classList.add('form__message--is-active');
          form.classList.add('contact-form--is-active');
        }
      });
    }
  });
});
