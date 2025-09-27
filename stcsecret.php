<?php
// admin.php
// Admin panel: change Channel link, Quotex link, Binolla link, and add/remove review image URLs.
// No server-side Firebase used; panel updates DB using client-side Firebase JS SDK.
// You can add a simple password in PHP if you want server-side gatekeeping; currently it's client-only.
// Save as admin.php in same folder as index.php
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Admin Panel — Landing Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body{font-family:'Poppins',sans-serif;background:#071017;color:#e6f0f6;padding:18px;}
    .card{background:#081826;border:1px solid rgba(255,255,255,0.04);padding:18px;border-radius:10px;max-width:920px;margin:12px auto;}
    h2{margin-bottom:8px}
    label{display:block;font-size:13px;margin-top:10px;color:#cfe8ff}
    input[type="text"]{width:100%;padding:10px;border-radius:8px;border:1px solid rgba(255,255,255,0.06);background:#031620;color:#fff;}
    button{margin-top:10px;padding:10px 14px;border-radius:8px;border:0;background:#0ea5a0;color:#002016;font-weight:600;cursor:pointer}
    .row{display:flex;gap:12px;flex-wrap:wrap}
    .col{flex:1;min-width:240px}
    .reviews-list{margin-top:12px}
    .review-item{display:flex;gap:8px;align-items:center;padding:8px;border-radius:8px;background:#06212a;margin-bottom:8px}
    .review-item img{width:84px;height:56px;object-fit:cover;border-radius:6px}
    .btn-danger{background:#de4b4b;color:#fff}
    .note{font-size:13px;color:#9fcbdc;margin-top:6px}
    .success{color:#8ef3b2;margin-top:8px}
    .error{color:#ffb3b3;margin-top:8px}
    .top-links{display:flex;gap:10px;justify-content:flex-end}
    a.home{color:#9fd9ff;text-decoration:none;padding:8px 10px;background:#022429;border-radius:8px}
  </style>
</head>
<body>
  <div class="card">
    <div class="top-links"><a class="home" href="index.php" target="_blank">Open Landing Page</a></div>
    <h2>Admin Panel — Bangladeshi Extraordinary Trading Community</h2>
    <p class="note">এই প্যানেল দিয়ে আপনি Channel link, Quotex link, Binolla link আপডেট করতে পারবেন এবং Review image URL যোগ/মুছে দিতে পারবেন।</p>

    <div style="margin-top:12px;">
      <label>Channel (Telegram) Link</label>
      <div class="row">
        <div class="col"><input type="text" id="channelLink" placeholder="https://t.me/YourChannel"/></div>
        <div class="col" style="flex:0 0 160px"><button id="saveChannel">Save Channel Link</button></div>
      </div>

      <label>Quotex Link</label>
      <div class="row">
        <div class="col"><input type="text" id="quotexLink" placeholder="Quotex link"/></div>
        <div class="col" style="flex:0 0 160px"><button id="saveQuotex">Save Quotex Link</button></div>
      </div>

      <label>Binolla Link</label>
      <div class="row">
        <div class="col"><input type="text" id="binollaLink" placeholder="Binolla link"/></div>
        <div class="col" style="flex:0 0 160px"><button id="saveBinolla">Save Binolla Link</button></div>
      </div>

      <hr style="border:none;border-top:1px solid rgba(255,255,255,0.03);margin:16px 0">

      <h3>Manage VIP Review Images</h3>
      <label>Add Review Image (Image URL)</label>
      <div class="row">
        <div class="col"><input type="text" id="newReviewUrl" placeholder="https://i.ibb.co/your-image.jpg"/></div>
        <div class="col" style="flex:0 0 160px"><button id="addReview">Add Image</button></div>
      </div>
      <div class="note">Add an image URL and press "Add Image". Existing list appears below — you can delete items.</div>

      <div class="reviews-list" id="reviewsList"></div>

      <div id="msg" class=""></div>
    </div>
  </div>

  <!-- Firebase SDK (compat) -->
  <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-database-compat.js"></script>

  <script>
    const firebaseConfig = {
      apiKey: "AIzaSyBDqUGvGUb8XfE7l4AK_JQ-Asb_f5dA3Ms",
      authDomain: "tradersojib-landingpage.firebaseapp.com",
      databaseURL: "https://tradersojib-landingpage-default-rtdb.asia-southeast1.firebasedatabase.app",
      projectId: "tradersojib-landingpage",
      storageBucket: "tradersojib-landingpage.firebasestorage.app",
      messagingSenderId: "911004445230",
      appId: "1:911004445230:web:f157d196273f697dc94dbf"
    };
    firebase.initializeApp(firebaseConfig);
    const db = firebase.database();

    // helper: show message
    const msgEl = document.getElementById('msg');
    function showMsg(text, type='success'){
      msgEl.className = (type==='success' ? 'success' : 'error');
      msgEl.textContent = text;
      setTimeout(()=>{ msgEl.textContent=''; msgEl.className=''; }, 4000);
    }

    // load current data
    const siteRef = db.ref('/site');
    function loadSite(){
      siteRef.get().then(snap=>{
        const data = snap.exists() ? snap.val() : {};
        document.getElementById('channelLink').value = data.channelLink || '';
        document.getElementById('quotexLink').value = data.quotexLink || '';
        document.getElementById('binollaLink').value = data.binollaLink || '';
        renderReviews(data.reviews || []);
      }).catch(err=>{
        console.error(err);
        showMsg('Failed to load data: '+err.message, 'error');
      });
    }

    // render review list (array or object)
    function renderReviews(reviews){
      const container = document.getElementById('reviewsList');
      container.innerHTML = '';
      let arr = [];
      if(Array.isArray(reviews)) arr = reviews;
      else if(reviews && typeof reviews === 'object') arr = Object.values(reviews);
      arr.forEach((url, idx) => {
        const div = document.createElement('div');
        div.className = 'review-item';
        div.innerHTML = `<img src="${url}" alt="review-${idx}" onerror="this.style.opacity=0.4"/>
                         <div style="flex:1"><div style="font-size:13px;word-break:break-all">${url}</div></div>
                         <div style="flex:0 0 110px">
                           <button data-index="${idx}" class="btn-danger" style="padding:8px 10px;border-radius:6px;border:0;cursor:pointer">Delete</button>
                         </div>`;
        container.appendChild(div);
      });

      // attach delete handlers
      container.querySelectorAll('button[data-index]').forEach(btn=>{
        btn.addEventListener('click', async (e)=>{
          const i = parseInt(e.currentTarget.getAttribute('data-index'), 10);
          await deleteReviewAtIndex(i);
        });
      });
    }

    // update single fields
    document.getElementById('saveChannel').addEventListener('click', ()=>{
      const val = document.getElementById('channelLink').value.trim();
      if(!val){ showMsg('Channel link খালি হতে পারে না', 'error'); return; }
      siteRef.child('channelLink').set(val).then(()=> showMsg('Channel link updated')).catch(e=>showMsg(e.message,'error'));
    });
    document.getElementById('saveQuotex').addEventListener('click', ()=>{
      const val = document.getElementById('quotexLink').value.trim();
      if(!val){ showMsg('Quotex link খালি হতে পারে না', 'error'); return; }
      siteRef.child('quotexLink').set(val).then(()=> showMsg('Quotex link updated')).catch(e=>showMsg(e.message,'error'));
    });
    document.getElementById('saveBinolla').addEventListener('click', ()=>{
      const val = document.getElementById('binollaLink').value.trim();
      if(!val){ showMsg('Binolla link খালি হতে পারে না', 'error'); return; }
      siteRef.child('binollaLink').set(val).then(()=> showMsg('Binolla link updated')).catch(e=>showMsg(e.message,'error'));
    });

    // add review (append)
    document.getElementById('addReview').addEventListener('click', async ()=>{
      const url = document.getElementById('newReviewUrl').value.trim();
      if(!url){ showMsg('Image URL লিখুন', 'error'); return; }
      try{
        const snap = await siteRef.child('reviews').get();
        let arr = [];
        if(snap.exists()){
          const v = snap.val();
          if(Array.isArray(v)) arr = v;
          else if (v && typeof v === 'object') arr = Object.values(v);
        }
        arr.push(url);
        // write back as array
        await siteRef.child('reviews').set(arr);
        document.getElementById('newReviewUrl').value='';
        renderReviews(arr);
        showMsg('Image added');
      }catch(e){
        console.error(e); showMsg(e.message, 'error');
      }
    });

    // delete by index (rebuild array without index)
    async function deleteReviewAtIndex(index){
      try{
        const snap = await siteRef.child('reviews').get();
        if(!snap.exists()){ showMsg('No reviews to delete', 'error'); return; }
        let arr = snap.val();
        if(!Array.isArray(arr)) arr = Object.values(arr);
        arr.splice(index,1);
        await siteRef.child('reviews').set(arr);
        renderReviews(arr);
        showMsg('Deleted');
      }catch(e){
        console.error(e); showMsg(e.message,'error');
      }
    }

    // initial load and live update
    loadSite();
    siteRef.on('value', snapshot=>{
      const val = snapshot.exists() ? snapshot.val() : {};
      document.getElementById('channelLink').value = val.channelLink || '';
      document.getElementById('quotexLink').value = val.quotexLink || '';
      document.getElementById('binollaLink').value = val.binollaLink || '';
      renderReviews(val.reviews || []);
    });

  </script>
</body>
</html>