<?php 
require_once 'database.php';
try{
  $pdo = new PDO(
    'mysql:host='.$db['host'].';dbname='.$db['dbname'].';charset=utf8mb4',
    $db['user'],
    $db['pass'],
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
  );

  $id;$name;$r=[];
  $stmt=$pdo->prepare('SELECT * FROM '.$db['table'].' ORDER BY id DESC LIMIT 4;');
  $stmt->execute();
  foreach($stmt as $k => $v){
    $id=h($v['id']);
    $title=h($v['title']);
    $label=h($v['label']);
    $date=h($v['date']);
    $url=h($v['url']);
    $r[$k]='<li><a href="'.$url.'"><span class="label">'.$label.'</span><span class="date">'.$date.'</span><span class="title">'.$title.'</span></a></li>';
  }

}catch(PDOException $e){
  header('Content-Type: text/plain; charset=UTF-8', true, 500);
  exit($e->getMessage());
}
function h($s){
  return htmlspecialchars($s,ENT_QUOTES,'UTF-8');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="twitter:card" content="photo">
  <meta name="twitter:site" content="@serenedevjp">
  <meta property="og:type" content="website">
  <meta property="og:site_name" contet="character.serenelinux.com">
  <meta property="og:locale" content="ja_JP">
  <meta property="og:image" content="https://character.serenelinux.com/img/visual/touka_1920x1080px.png">
  <link rel="apple-touch-icon-precomposed" href="https://character.serenelinux.com/img/icon/150.png">
  <meta name="msapplication-TileImage" content="https://character.serenelinux.com/img/icon/150.png">
  <meta name="msapplication-TileColor" content="#ffffff">
  <link rel="shortcut icon" href="https://character.serenelinux.com/favicon.ico" type="image/x-icon">
  <link rel="icon" href="https://character.serenelinux.com/img/icon/16.png" sizes="16x16" type="image/png">
  <link rel="icon" href="https://character.serenelinux.com/img/icon/32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="https://character.serenelinux.com/img/icon/48.png" sizes="48x48" type="image/png">
  <link rel="icon" href="https://character.serenelinux.com/img/icon/64.png" sizes="64x64" type="image/png">
  <title>水瀬玲音/ミナセレネ - SereneLinux公式キャラクター</title>
  <meta property="og:title" content="水瀬玲音/ミナセレネ - SereneLinux公式キャラクター">
  <meta name="description" content="SereneLinux公式キャラクター水瀬玲音の公式ウェブサイトです。水瀬玲音のグッツ、Booth、LINEスタンプ、LINE着せ替え、Bash講座などの最新情報をお伝えしていきます！水瀬玲音のTwitterはこちら→【@SereneDevjp】">
  <meta property="og:description" content="SereneLinux公式キャラクター水瀬玲音の公式ウェブサイトです。水瀬玲音のグッツ、Booth、LINEスタンプ、LINE着せ替え、Bash講座などの最新情報をお伝えしていきます！水瀬玲音のTwitterはこちら→【@SereneDevjp】">
  <meta property="og:url" content="https://character.serenelinux.com/">
  <link rel="canonical" href="https://character.serenelinux.com/">
  <meta name="google" content="notranslate">
  <!-- <link rel="stylesheet" href="/css/style.css"> -->
  <style>
  @font-face{font-family:Fredoka One;font-style:normal;font-weight:400;font-display:swap;src:local('Fredoka One'),local('FredokaOne-Regular'),url(https://fonts.gstatic.com/s/fredokaone/v7/k3kUo8kEI-tA1RRcTZGmTlHGCac.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}abbr,address,article,aside,audio,b,blockquote,body,canvas,caption,cite,code,dd,del,details,dfn,div,dl,dt,em,fieldset,figcaption,figure,footer,form,h1,h2,h3,h4,h5,h6,header,hgroup,html,i,iframe,img,ins,kbd,label,legend,li,mark,menu,nav,object,ol,p,pre,q,samp,section,small,span,strong,sub,summary,sup,table,tbody,td,tfoot,th,thead,time,tr,ul,var,video{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent}body{line-height:1}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}nav ul{list-style:none}blockquote,q{quotes:none}blockquote:after,blockquote:before,q:after,q:before{content:'';content:none}a{margin:0;padding:0;font-size:100%;vertical-align:baseline;background:transparent}ins{text-decoration:none}ins,mark{background-color:#ff9;color:#000}mark{font-style:italic;font-weight:700}del{text-decoration:line-through}abbr[title],dfn[title]{border-bottom:1px dotted;cursor:help}table{border-collapse:collapse;border-spacing:0}hr{display:block;height:1px;border:0;border-top:1px solid #ccc;margin:1em 0;padding:0}input,select{vertical-align:middle}#gnav-bin{display:none}body{font-family:roboto,noto sans jp;background-color:#f5fafd;background-image:url(/img/back/a.gif);color:#333}img,video{width:100%}a{font-size:17px;color:#75b5e6}a:hover{color:#42a5f5}.alert{color:darkred}#lap{display:flex;flex-flow:column wrap}#head{width:100%}#gnav ul,#gnav ul li{text-align:center}#gnav ul li{box-sizing:border-box;width:32%;margin:0 auto;display:inline-block}#gnav ul li a{display:flex;flex-flow:column wrap;justify-content:flex-end;align-items:flex-start;font-size:6vw;font-family:Fredoka One,cursive;color:#333;text-decoration:none;padding:10px 0;max-height:4pc}#gnav ul li a span{width:100%;height:2pc;line-height:20px}#gnav ul li a .ja{font-size:1pc;height:20px}#banner{width:100%;top:460px;order:9}#banner img{display:block;padding:5px;margin:2.5% 5%}#banner img,#news,#tw,#visual{box-sizing:border-box;width:90%;background-color:#fcfcfc;box-shadow:-3px 3px 5px rgba(66,165,245,.5)}#news,#tw,#visual{margin:0 auto;order:5;padding:10px 20px}#banner h1,#news h1,#tw h1{font-size:22px;font-family:Fredoka One,cursive;padding:10px 0;letter-spacing:5px}#banner h1:after,#news h1:after,#tw h1:after{display:block;content:"";width:100%;height:5px;margin-top:5px;border-radius:1rem;background-color:#01579b}#news ul{list-style:none}#news ul,#news ul li{border-top:1px #01579b solid;border-bottom:1px #01579b solid}#news ul li{margin:3px 0}#news ul li a{display:flex;flex-flow:row wrap;justify-content:flex-start;align-items:flex-start;box-sizing:border-box;width:100%;padding:10px 3px;text-decoration:none;transition:.3s ease}#news ul li a:hover{background-color:#72bffd}#news ul li a .label{background-color:#01579b;color:#fcfcfc;border-radius:.5rem;padding:6px}#news ul li a .date,#news ul li a .label{box-sizing:border-box;margin:3px;height:29px;font-family:Fredoka One,cursive}#news ul li a .date{padding:6px 0;color:#01579b}#news ul li a .title{width:100%;margin:3px;color:#01579b}#news .button{display:block;font-size:19px;text-align:center;text-decoration:none;padding:15px 0;background-color:#01579b;color:#fcfcfc;transition:.3s ease;border-radius:0 0 .5rem .5rem}#news .button:hover{background-color:#72bffd;color:#01579b}#visual{width:100%}#tw,#visual{margin:0 auto}#tw{width:90%;order:5}#banner h1:first-letter,#gnav ul li a span:first-letter,#news h1:first-letter,#tw h1:first-letter{color:#01579b}#foot{text-align:center;background-color:#01579b;color:#fcfcfc;margin-top:30px;padding:50px 0;font-family:Fredoka One,cursive}@media screen and (min-width:600px) and (max-width:959px){#lap{display:block;position:relative}#head{width:15pc;float:left}#gnav ul li{display:block;width:100%;text-align:left}#gnav ul li a{display:flex;flex-flow:column wrap;justify-content:flex-end;align-items:flex-start;font-size:20px;font-family:Fredoka One,cursive;color:#333;text-decoration:none;padding:10px;max-height:42px}#gnav ul li a:before{content:"";width:2pc;height:2pc;background-image:url(https://serenelinux.com/img/icon/32.png);opacity:0;transition:ease .3s}#gnav ul li a:hover:before{opacity:1}#gnav ul li a span{width:84%;height:18px;line-height:20px;padding-left:10px}#gnav ul li a .ja{font-size:1pc}#banner{width:15pc;top:420px;float:left;position:absolute}#news,#tw,#visual{width:-webkit-calc(100% - 15pc);width:calc(100% - 15pc);margin:0;float:right}#tw{margin-bottom:30px}#foot{clear:both}}@media screen and (min-width:960px) and (max-width:1279px){#lap{display:block;position:relative}#head{width:280px;float:left}#gnav ul li{display:block;width:100%;text-align:left}#gnav ul li a{display:flex;flex-flow:column wrap;justify-content:flex-end;align-items:flex-start;font-size:20px;font-family:Fredoka One,cursive;color:#333;text-decoration:none;padding:10px;max-height:42px}#gnav ul li a:before{content:"";width:2pc;height:2pc;background-image:url(https://serenelinux.com/img/icon/32.png);opacity:0;transition:ease .3s}#gnav ul li a:hover:before{opacity:1}#gnav ul li a span{width:84%;height:18px;line-height:20px;padding-left:10px}#gnav ul li a .ja{font-size:1pc}#banner{width:280px;top:440px;float:left;position:absolute}#news,#tw,#visual{margin:0;float:right}#news,#tw,#visual{width:-webkit-calc(100% - 280px);width:calc(100% - 280px)}#tw{margin-bottom:30px}#foot{clear:both}}@media screen and (min-width:1280px){#lap{position:relative;display:block;margin:0 auto;max-width:1480px}#head{width:280px;float:left}#gnav{height:100vh}#gnav ul li{display:block;width:100%;text-align:left}#gnav ul li a{display:flex;flex-flow:column wrap;justify-content:flex-end;align-items:flex-start;font-size:20px;font-family:Fredoka One,cursive;color:#333;text-decoration:none;padding:10px;max-height:42px}#gnav ul li a:before{content:"";width:2pc;height:2pc;background-image:url(https://serenelinux.com/img/icon/32.png);opacity:0;transition:ease .3s}#gnav ul li a:hover:before{opacity:1}#gnav ul li a span{width:84%;height:18px;line-height:20px;padding-left:10px}#gnav ul li a .ja{font-size:1pc}#banner{position:absolute;width:300px;right:10px;top:10px}#banner img{width:100%;margin:0 0 2.5%}#news,#tw,#visual{width:-webkit-calc(100% - 600px);width:calc(100% - 600px);float:left}#tw{margin:0 0 50px}#foot{clear:both}}
  </style>
</head>
<body>
  <div id="lap">
    <header id="head">

    <h1>
    <picture>
      <source 
      sizes="(max-width: 1080px) 100vw, 1080px"
      srcset="
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_200.png.webp 200w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_310.png.webp 310w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_402.png.webp 402w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_484.png.webp 484w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_557.png.webp 557w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_626.png.webp 626w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_691.png.webp 691w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_752.png.webp 752w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_812.png.webp 812w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_868.png.webp 868w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_925.png.webp 925w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_978.png.webp 978w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_1029.png.webp 1029w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_1080.png.webp 1080w"
      src="/img/visual/touka_1920x1080px_akss8t_c_scale,w_1080.png.webp" type="image/webp">
      <img
      sizes="(max-width: 1080px) 100vw, 1080px"
      srcset="
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_200.png 200w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_310.png 310w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_402.png 402w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_484.png 484w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_557.png 557w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_626.png 626w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_691.png 691w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_752.png 752w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_812.png 812w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_868.png 868w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_925.png 925w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_978.png 978w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_1029.png 1029w,
      /img/visual/touka_1920x1080px_akss8t_c_scale,w_1080.png 1080w"
      src="/img/visual/touka_1920x1080px_akss8t_c_scale,w_1080.png"
      alt="水瀬玲音公式ウェブサイト">
    </picture></h1>
      <nav id="gnav">
        <ul>
          <li><a href="/"><span class="en">Top</span><span class="ja">トップ</span></a></li>
          <li><a href="/news/"><span class="en">News</span><span class="ja">ニュース</span></a></li>
          <li><a href="/movie/"><span class="en">Movie</span><span class="ja">ムービー</span></a></li>
          <li><a href="/contact/"><span class="en">Contact</span><span class="ja">問い合わせ</span></a></li>
          <li><a href="/blog/"><span class="en">Blog</span><span class="ja">ブログ</span></a></li>
        </ul>
      </nav>
    </header>
    <article id="news">
      <h1>News</h1>
      <ul>
        <?php foreach($r as $v){echo $v;} ?>
      </ul>
      <a class="button" href="/news/">もっと見る</a>
    </article>
    <aside id="tw">
      <h1>Twitter <a href="https://twitter.com/serenedevjp?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">フォローする</a></h1>
      <div>
        <a class="twitter-timeline"
        data-lang="ja" data-theme="white"
        data-link-color="#01579B"
        data-chrome="noheader nofooter noborders noscrollbar transparent" height="400px"
        href="https://twitter.com/serenedevjp"></a>
      </div>
    </aside>
    <aside id="banner">
      <a href="https://store.line.me/stickershop/author/1184485"><picture><source srcset="/img/back/bana-1.png.webp" type="image/webp"><img src="/img/back/bana-1.png" alt="LINEスタンプ好評発売中"></picture></a>
      <a href="https://serenelinux.booth.pm/"><picture><source srcset="/img/back/bana-2.png.webp" type="image/webp"><img src="/img/back/bana-2.png" alt="水瀬玲音グッツ販売はこちら"></picture></a>
      <a href="https://store.line.me/themeshop/product/54a87484-0815-4bb5-8dfa-e0f33c228af2"><picture><source srcset="/img/back/bana-3.png.webp" type="image/webp"><img src="/img/back/bana-3.png" alt="LINE着せ替え販売開始"></picture></a>
      <a href="https://serenelinux.com/download/standard/beta7/"><picture><source srcset="/img/back/45uwzt1whjg8fkg7rywejfwhnr-1920x1080_havyod_c_scale,w_708.png.webp" type="image/webp"><img src="/img/back/45uwzt1whjg8fkg7rywejfwhnr-1920x1080_havyod_c_scale,w_708.png" alt="SereneLinux Bata7"></picture></a>
    </aside>
  </div>
  <footer id="foot"><small>&copy; 2020 SereneLinux SereneTeam</small></footer>
  <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</body>
</html>