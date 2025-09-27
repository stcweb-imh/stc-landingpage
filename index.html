<?php
// index.php
// Public landing page (reads links & reviews from Firebase Realtime DB & updates DOM)
// Keep this file as index.php in your cPanel site root
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bangladeshi Extraordinary Trading Community</title>

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Swiper (carousel) -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@9/swiper-bundle.min.css" />

  <style>
    :root{
      --bg-1:#0b0202;
      --bg-2:#150405;
      --neon-or:#ff6a00;
      --neon-red:#ff1e1e;
      --neon-yellow:#ffd200;
      --card-border:rgba(255,100,20,0.12);
    }
    *{box-sizing:border-box;margin:0;padding:0}
    body{
      font-family:'Poppins',sans-serif;
      background:linear-gradient(160deg,var(--bg-1),var(--bg-2));
      color:#fff;overflow-x:hidden;
    }

    /* Neon streaks */
    .neon-streaks{position:fixed;inset:0;pointer-events:none;z-index:0;mix-blend-mode:screen;}
    .streak{position:absolute;width:1400px;height:3px;transform:rotate(-25deg);opacity:0.55;filter:blur(12px);animation:slide 12s linear infinite;}
    .streak.one{top:10%;left:-40%;background:linear-gradient(90deg,transparent,rgba(255,120,0,0.95),transparent);}
    .streak.two{top:30%;left:-50%;background:linear-gradient(90deg,transparent,rgba(255,40,40,0.95),transparent);height:4px;animation-delay:3s;}
    .streak.three{top:60%;left:-60%;background:linear-gradient(90deg,transparent,rgba(255,220,0,0.95),transparent);height:2px;animation-delay:6s;}
    @keyframes slide{from{transform:translateX(-30%) rotate(-25deg)}to{transform:translateX(130%) rotate(-25deg)}}

    .container{position:relative;z-index:5;max-width:1100px;margin:0 auto;padding:20px;}

    /* Hero Section */
    .hero{text-align:center;padding:20px 15px 30px;border-radius:14px;background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.05);}
    .title{font-family:'Orbitron',sans-serif;font-size:24px;background:linear-gradient(90deg,var(--neon-or),var(--neon-red),var(--neon-yellow));-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
    .subtitle{margin-top:6px;font-size:14px;color:rgba(255,255,255,0.8);}

    /* Laser underline */
    .laser-wrap{margin:12px auto 6px;width:280px;height:16px;}
    .laser-svg{width:100%;height:100%}

    /* Shine Animation */
    @keyframes shine{0%{left:-75%;}100%{left:125%;}}
    .shine::before{
      content:"";position:absolute;top:0;left:-75%;width:50%;height:100%;
      background:linear-gradient(120deg,rgba(255,255,255,0.6) 0%,rgba(255,255,255,0) 100%);
      transform:skewX(-25deg);
      animation:shine 3s infinite;
    }

    /* Logo rectangle with shine */
    .logo-wrap{margin-top:12px;display:flex;justify-content:center;}
    .logo-badge{
      position:relative;width:150px;height:150px;border-radius:16px;overflow:hidden;
      background:rgba(255,255,255,0.05);box-shadow:0 0 20px rgba(255,60,40,0.2);
    }
    .logo-badge img{width:100%;height:100%;object-fit:cover;border-radius:16px;}
    .logo-badge::before{content:"";position:absolute;top:0;left:-75%;width:50%;height:100%;
      background:linear-gradient(120deg,rgba(255,255,255,0.6) 0%,rgba(255,255,255,0) 100%);
      transform:skewX(-25deg);animation:shine 3s infinite;}

    /* Benefits */
    .benefits{margin-top:18px;display:flex;gap:12px;justify-content:center;flex-wrap:wrap;}
    .benefit{
      background:rgba(255,255,255,0.02);
      border:1px solid var(--card-border);
      border-radius:12px;
      padding:14px;
      display:flex;gap:10px;align-items:center;
      width:260px;cursor:pointer;
      position:relative;overflow:hidden;text-decoration:none;color:#fff;
    }
    .benefit h4{font-size:14px;margin:0;}
    .benefit p{font-size:12px;margin:0;color:rgba(255,255,255,0.75)}
    .benefit::before{
      content:"";position:absolute;top:0;left:-75%;width:50%;height:100%;
      background:linear-gradient(120deg,rgba(255,255,255,0.4) 0%,rgba(255,255,255,0) 100%);
      transform:skewX(-25deg);
      animation:shine 3s infinite;
    }

    .icon-wrap{width:40px;height:40px;display:flex;align-items:center;justify-content:center;border-radius:8px;background:rgba(0,0,0,0.2);}

    /* Telegram CTA */
    .cta-row{margin-top:20px;text-align:center;}
    .cta-btn{
      display:inline-flex;align-items:center;gap:8px;
      padding:10px 18px;
      border-radius:12px;
      background:linear-gradient(90deg,#0099cc,#00bcd4);
      color:#000;font-weight:600;text-decoration:none;position:relative;overflow:hidden;
    }
    .cta-btn::before{content:"";position:absolute;top:0;left:-75%;width:50%;height:100%;
      background:linear-gradient(120deg,rgba(255,255,255,0.6) 0%,rgba(255,255,255,0) 100%);
      transform:skewX(-25deg);animation:shine 3s infinite;}

    /* Reviews */
    .reviews-section{margin-top:28px;padding:16px;border-radius:10px;background:rgba(255,255,255,0.02);}
    .reviews-title{text-align:center;font-size:16px;margin-bottom:10px;}
    .review-card{border-radius:10px;overflow:hidden;box-shadow:0 6px 20px rgba(0,0,0,0.5);text-align:center;}
    .review-card img{max-width:100%;height:auto;display:block;margin:0 auto;}

    /* Accounts */
    .accounts{margin-top:28px;display:flex;gap:14px;flex-wrap:wrap;justify-content:center;}
    .acc-card{display:flex;gap:12px;align-items:center;padding:12px;border-radius:10px;background:rgba(255,255,255,0.02);width:450px;max-width:100%;}
    .acc-card img{width:120px;height:auto;border-radius:8px;object-fit:contain;}
    .acc-btn{
      padding:8px 14px;
      border-radius:10px;
      background:linear-gradient(90deg,var(--neon-or),var(--neon-red));
      color:#000;font-weight:600;text-decoration:none;position:relative;overflow:hidden;
    }
    .acc-btn::before{content:"";position:absolute;top:0;left:-75%;width:50%;height:100%;
      background:linear-gradient(120deg,rgba(255,255,255,0.5) 0%,rgba(255,255,255,0) 100%);
      transform:skewX(-25deg);animation:shine 3s infinite;}

    footer{margin-top:28px;text-align:center;font-size:12px;color:rgba(255,255,255,0.6)}
    footer a{color:inherit;text-decoration:none;opacity:0.8}

    /* small loader notice */
    .loading-note{font-size:12px;opacity:0.7;margin-top:6px}
  </style>
</head>
<body>
  <!-- Neon Streaks -->
  <div class="neon-streaks"><div class="streak one"></div><div class="streak two"></div><div class="streak three"></div></div>

  <div class="container">
    <header class="hero">
      <div class="title">Bangladeshi Extraordinary Trading Community</div>
      <div class="subtitle">সবার প্রথমে ওয়েবসাইট — Advanced Signals • Live Sessions • Recover & Grow</div>

      <!-- Laser underline -->
      <div class="laser-wrap">
        <svg class="laser-svg" viewBox="0 0 280 16">
          <defs>
            <linearGradient id="g1" x1="0" x2="1">
              <stop offset="0%" stop-color="transparent"/>
              <stop offset="45%" stop-color="#ff9900"/>
              <stop offset="55%" stop-color="#ff2e2e"/>
              <stop offset="100%" stop-color="transparent"/>
            </linearGradient>
          </defs>
          <path d="M4 8 Q80 2 140 8 T276 8" stroke="url(#g1)" stroke-width="3" fill="none" stroke-linecap="round">
            <animate attributeName="stroke-dashoffset" values="0;400" dur="2s" repeatCount="indefinite"/>
          </path>
        </svg>
      </div>

      <!-- Logo -->
      <div class="logo-wrap">
        <div class="logo-badge">
          <img src="https://i.ibb.co/h1YQWMxW/file-4.jpg" alt="Logo">
        </div>
      </div>

      <!-- Benefits -->
      <div class="benefits">
        <a id="benefit-live" class="benefit" href="https://t.me/SojibTrader" target="_blank">
          <div class="icon-wrap"><i class="fa-solid fa-video" style="color:#ffd200"></i></div>
          <div><h4>2 Live Sessions Daily</h4><p>প্রতিদিন ২টি লাইভ সেশন</p></div>
        </a>
        <a id="benefit-signals" class="benefit" href="https://t.me/SojibTrader" target="_blank">
          <div class="icon-wrap"><i class="fa-solid fa-chart-line" style="color:#ff6a00"></i></div>
          <div><h4>50+ Future Signals</h4><p>প্রতিদিন ৫০+ সিগন্যাল</p></div>
        </a>
        <a id="benefit-discipline" class="benefit" href="https://t.me/SojibTrader" target="_blank">
          <div class="icon-wrap"><i class="fa-solid fa-shield-halved" style="color:#ff1e1e"></i></div>
          <div><h4>Structured Discipline</h4><p>রিকভার ও লাভজনকতা অর্জন</p></div>
        </a>
      </div>

      <!-- Telegram -->
      <div class="cta-row">
        <a id="telegram-cta" class="cta-btn" href="https://t.me/SojibTrader" target="_blank"><i class="fa-brands fa-telegram-plane"></i> Join Telegram Channel</a>
        <div class="loading-note" id="loading-note"></div></div>
      </div>
    </header>

    <!-- Reviews -->
    <section class="reviews-section">
      <div class="reviews-title">Our VIP Members Review</div>
      <div class="swiper mySwiper">
        <div class="swiper-wrapper" id="reviews-wrapper">
          <!-- Slides will be injected by JS -->
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <!-- Accounts -->
    <section class="accounts">
      <div class="acc-card">
        <img src="https://i.ibb.co/qLWGsqzf/image.jpg" alt="Quotex">
        <a id="quotex-link" class="acc-btn" href="https://market-qx.pro/sign-up/?lid=315049" target="_blank">Register Account</a>
      </div>
      <div class="acc-card">
        <img src="https://i.ibb.co/MDd1cCh0/file-7.jpg" alt="Binolla">
        <a id="binolla-link" class="acc-btn" href="https://binolla.com/signup?lid=2684" target="_blank">Register Account</a>
      </div>
    </section>

    <footer>
      <div><a id="footer-email" href="mailto:info@example.com"><i class="fa-regular fa-envelope"></i> Email</a> • <a id="footer-telegram" href="https://t.me/SojibTrader" target="_blank"><i class="fa-brands fa-telegram"></i> Telegram</a></div>
      <div>© <?php echo date("Y"); ?> Bangladeshi Extraordinary Trading Community</div>
    </footer>
  </div>

  <!-- Firebase SDK (compat) -->
  <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-database-compat.js"></script>

  <script>
    // ---------- REPLACE with your Firebase config (you already provided) ----------
    const firebaseConfig = {
      apiKey: "AIzaSyBDqUGvGUb8XfE7l4AK_JQ-Asb_f5dA3Ms",
      authDomain: "tradersojib-landingpage.firebaseapp.com",
      databaseURL: "https://tradersojib-landingpage-default-rtdb.asia-southeast1.firebasedatabase.app",
      projectId: "tradersojib-landingpage",
      storageBucket: "tradersojib-landingpage.firebasestorage.app",
      messagingSenderId: "911004445230",
      appId: "1:911004445230:web:f157d196273f697dc94dbf"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    const db = firebase.database();

    // default fallback if DB empty
    const defaults = {
      channelLink: "https://t.me/SojibTrader",
      quotexLink: "https://market-qx.pro/sign-up/?lid=315049",
      binollaLink: "https://binolla.com/signup?lid=2684",
      reviews: [
        "https://i.ibb.co/sJmJj9cY/file-5.jpg",
        "https://i.ibb.co/kVD1zw0Q/file-6.jpg"
      ]
    };

    // helper to create slide element
    function makeSlide(url){
      const slide = document.createElement('div');
      slide.className = 'swiper-slide';
      slide.innerHTML = `<div class="review-card"><img src="${url}" alt="Review"></div>`;
      return slide;
    }

    // populate UI with DB values
    function applySiteData(data){
      const channel = data.channelLink || defaults.channelLink;
      const qlink = data.quotexLink || defaults.quotexLink;
      const blink = data.binollaLink || defaults.binollaLink;
      const reviews = Array.isArray(data.reviews) ? data.reviews : (data.reviews ? Object.values(data.reviews) : defaults.reviews);

      // update links
      document.getElementById('telegram-cta').href = channel;
      document.getElementById('benefit-live').href = channel;
      document.getElementById('benefit-signals').href = channel;
      document.getElementById('benefit-discipline').href = channel;
      document.getElementById('footer-telegram').href = channel;

      document.getElementById('quotex-link').href = qlink;
      document.getElementById('binolla-link').href = blink;

      // update review slides (clear and inject)
      const wrapper = document.getElementById('reviews-wrapper');
      wrapper.innerHTML = '';
      reviews.forEach(url => {
        if(!url) return;
        wrapper.appendChild(makeSlide(url));
      });

      // refresh Swiper (destroy + recreate) or init if first time
      if(window.mySwiperInstance){
        window.mySwiperInstance.update();
      } else {
        window.mySwiperInstance = new Swiper(".mySwiper",{
          slidesPerView:1.2,spaceBetween:14,centeredSlides:true,loop:true,
          autoplay:{delay:2500},pagination:{el:".swiper-pagination",clickable:true}
        });
      }

      const ln = document.getElementById('loading-note');
      if(ln) ln.textContent = '';
    }

    // listen once to read site root (/site)
    const siteRef = db.ref('/site');
    siteRef.on('value', snapshot => {
      const val = snapshot.val();
      if(val) applySiteData(val);
      else applySiteData({});
    }, error => {
      console.error('Firebase read error:', error);
      applySiteData({}); // apply defaults
      const ln = document.getElementById('loading-note');
      if(ln) ln.textContent = 'Unable to load remote data (using defaults)';
    });
  </script>

  <!-- Swiper script (after we create slides) -->
  <script src="https://unpkg.com/swiper@9/swiper-bundle.min.js"></script>
</body>
</html>