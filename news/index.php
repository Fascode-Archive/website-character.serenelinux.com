<?php
require_once '../database.php';
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
  $id;$name;$r=[];$start=1;
  $count=5;
  $page=h(explode("/",url())[4]);
  if($page==0) {$page=1;}
  if(is_numeric($page)){
    $start=((int)$page*($count-1)+((int)$page-($count-1)))-1;
  }
  // $stmt=$pdo->prepare('SELECT * FROM '.$db['table'].' ORDER BY id DESC LIMIT '.$count.' OFFSET '.$start.';');
  // $stmt->execute();
  $stmt=$pdo->query('SELECT * FROM '.$db['table'].' ORDER BY id DESC LIMIT '.$count.' OFFSET '.$start.';');

  foreach($stmt as $k => $v){
    $id=h($v['id']);
    $title=h($v['title']);
    $label=h($v['label']);
    $date=h($v['date']);
    $url=h($v['url']);
    $r[$k]='<li><a href="'.$url.'"><span class="label">'.$label.'</span><span class="date">'.$date.'</span><span class="title">'.$title.'</span></a></li>';
  }
  $stmt=$pdo->query('select count(*) from '.$db['table'].';');
  $allcount=ceil($stmt->fetchColumn()/$count);
  $newsnav;
  for ($i=0; $i < $allcount; $i++) { 
    if((int)$page===$i){
      if ($i<=1){
        $newsnav.='<li><a class="now" href="'.$i.'">'.$i.'</a></li>';
        $newsnav.='<li><a href="'.($i+1).'">'.($i+1).'</a></li>';
        $newsnav.='<li><a href="'.($i+2).'">'.($i+2).'</a></li>';
        $newsnav.='<li><a href="'.($i+3).'">'.($i+3).'</a></li>';
        $newsnav.='<li><a href="'.($i+4).'">'.($i+4).'</a></li>';
      }
      else if ($i<=2){
        $newsnav.='<li><a href="'.($i-1).'">'.($i-1).'</a></li>';
        $newsnav.='<li><a class="now" href="'.$i.'">'.$i.'</a></li>';
        $newsnav.='<li><a href="'.($i+1).'">'.($i+1).'</a></li>';
        $newsnav.='<li><a href="'.($i+2).'">'.($i+2).'</a></li>';
        $newsnav.='<li><a href="'.($i+3).'">'.($i+3).'</a></li>';
      }
      else if ($i<=3){
        $newsnav.='<li><a href="'.($i-2).'">'.($i-2).'</a></li>';
        $newsnav.='<li><a href="'.($i-1).'">'.($i-1).'</a></li>';
        $newsnav.='<li><a class="now" href="'.$i.'">'.$i.'</a></li>';
        $newsnav.='<li><a href="'.($i+1).'">'.($i+1).'</a></li>';
        $newsnav.='<li><a href="'.($i+2).'">'.($i+2).'</a></li>';
      }
      elseif ($i==($allcount-1)) {
        $newsnav.='<li><a href="'.($i-3).'">'.($i-3).'</a></li>';
        $newsnav.='<li><a href="'.($i-2).'">'.($i-2).'</a></li>';
        $newsnav.='<li><a href="'.($i-1).'">'.($i-1).'</a></li>';
        $newsnav.='<li><a class="now" href="'.$i.'">'.$i.'</a></li>';
        $newsnav.='<li><a href="'.($i+1).'">'.($i+1).'</a></li>';
      }
      else{
        $newsnav.='<li><a href="'.($i-2).'">'.($i-2).'</a></li>';
        $newsnav.='<li><a href="'.($i-1).'">'.($i-1).'</a></li>';
        $newsnav.='<li><a class="now" href="'.$i.'">'.$i.'</a></li>';
        $newsnav.='<li><a href="'.($i+1).'">'.($i+1).'</a></li>';
        $newsnav.='<li><a href="'.($i+2).'">'.($i+2).'</a></li>';
      }
    }
  }
  if ($allcount==(int)$page) {
    $newsnav.='<li><a href="'.($allcount-4).'">'.($allcount-4).'</a></li>';
    $newsnav.='<li><a href="'.($allcount-3).'">'.($allcount-3).'</a></li>';
    $newsnav.='<li><a href="'.($allcount-2).'">'.($allcount-2).'</a></li>';
    $newsnav.='<li><a href="'.($allcount-1).'">'.($allcount-1).'</a></li>';
    $newsnav.='<li><a class="now" href="'.$allcount.'">'.$allcount.'</a></li>';
  }
}catch(PDOException $e){
  header('Content-Type: text/plain; charset=UTF-8', true, 500);
  exit($e->getMessage());
}
function h($s){
  return htmlspecialchars($s,ENT_QUOTES,'UTF-8');
}
function url(){
  return (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
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
  <meta property="og:type" content="artcle">
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
  <title>News <?=$page?>ページ | 水瀬玲音/ミナセレネ - SereneLinux公式キャラクター</title>
  <meta property="og:title" content="News <?=$page?>ページ | 水瀬玲音/ミナセレネ - SereneLinux公式キャラクター">
  <meta name="description" content="こちらは水瀬玲音の公式ウェブサイトのNewsページです。水瀬玲音の最新情報をまとめたページです。水瀬玲音のグッツ、Booth、LINEスタンプ、LINE着せ替え、Bash講座などの情報がのっています。水瀬玲音のTwitterはこちら→【@SereneDevjp】">
  <meta property="og:description" content="こちらは水瀬玲音の公式ウェブサイトのNewsページです。水瀬玲音の最新情報をまとめたページです。水瀬玲音のグッツ、Booth、LINEスタンプ、LINE着せ替え、Bash講座などの情報がのっています。水瀬玲音のTwitterはこちら→【@SereneDevjp】">
  <meta property="og:url" content="https://character.serenelinux.com/news/<?=$page?>">
  <link rel="canonical" href="https://character.serenelinux.com/news/<?=$page?>">
  <meta name="google" content="notranslate">
  <link rel="stylesheet" href="/css/default.css">
  <link rel="stylesheet" href="/css/news.css">
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
      <ul class="news-main">
        <?php foreach($r as $v){echo $v;} ?>
      </ul>
      <ul class="news-nav">
        <?=$newsnav?>
      </ul>
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
  <footer id="foot"><small>&copy; 2020 SereneLinux</small></footer>
  <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</body>
</html>