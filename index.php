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
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@serenedevjp">
  <meta property="og:type" content="website">
  <meta property="og:site_name" contet="character.serenelinux.com">
  <meta property="og:locale" content="ja_JP">
  <meta property="og:image" content="https://character.serenelinux.com/img/icon/150.png">
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
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div id="lap">
    <header id="head">
      <h1>
    <picture>
    <img
    sizes="(max-width: 1080px) 100vw, 1080px"
    srcset="
    /img/visual/1920x1080px_ryzxhg_c_scale,w_220.png 220w,
    /img/visual/1920x1080px_ryzxhg_c_scale,w_320.png 320w,
    /img/visual/1920x1080px_ryzxhg_c_scale,w_404.png 404w,
    /img/visual/1920x1080px_ryzxhg_c_scale,w_478.png 478w,
    /img/visual/1920x1080px_ryzxhg_c_scale,w_547.png 547w,
    /img/visual/1920x1080px_ryzxhg_c_scale,w_610.png 610w,
    /img/visual/1920x1080px_ryzxhg_c_scale,w_670.png 670w,
    /img/visual/1920x1080px_ryzxhg_c_scale,w_726.png 726w,
    /img/visual/1920x1080px_ryzxhg_c_scale,w_783.png 783w,
    /img/visual/1920x1080px_ryzxhg_c_scale,w_834.png 834w,
    /img/visual/1920x1080px_ryzxhg_c_scale,w_886.png 886w,
    /img/visual/1920x1080px_ryzxhg_c_scale,w_940.png 940w,
    /img/visual/1920x1080px_ryzxhg_c_scale,w_986.png 986w,
    /img/visual/1920x1080px_ryzxhg_c_scale,w_1038.png 1038w,
    /img/visual/1920x1080px_ryzxhg_c_scale,w_1080.png 1080w"
    src="/img/visual/1920x1080px_ryzxhg_c_scale,w_1080.png"
    alt="水瀬玲音公式ウェブサイト">
    </picture></h1>
      <nav id="gnav">
        <ul>
          <li><a href="/"><span class="en">Top</span><span class="ja">トップ</span></a></li>
          <li><a href="/news/"><span class="en">News</span><span class="ja">ニュース</span></a></li>
          <li><a href="/movie/"><span class="en">Movie</span><span class="ja">ムービー</span></a></li>
          <li><a href="/blog/"><span class="en">Blog</span><span class="ja">ブログ</span></a></li>
          <li><a href="/contact/"><span class="en">Contact</span><span class="ja">問い合わせ</span></a></li>
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
      <a href="https://store.line.me/stickershop/author/1184485"><img src="/img/back/bana-1.png" alt=""></a>
      <a href="https://serenelinux.booth.pm/"><img src="/img/back/bana-2.png" alt=""></a>
      <a href=""><img src="/img/back/bana-3.png" alt=""></a>
    </aside>
  </div>
  <footer id="foot"><small>&copy; 2020 SereneLinux</small></footer>
  <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</body>
</html>