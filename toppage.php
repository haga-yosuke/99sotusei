<?php
session_start();
include("functions.php");
check_session_id();
$userdata = userinfo();
$allpostData = getAllpost();


?>


<!DOCTYPE html>
<html lang="ja">

</html>
<html>

<head>
 
    <title>トップページ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- <link rel="stylesheet" href="assets/css/main.css" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://unpkg.com/sakura.css/css/sakura-earthly.css" type="text/css"> -->

	</head>
	<body class="landing is-preload">
		<div id="page-wrapper">

			<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><u><b>トップページ</b></u></a>
    <a class="navbar-brand" href="mypage.php">マイページ</a>
    <a class="navbar-brand" href="search.php">探す</a>
    <a class="navbar-brand" href="./post/post.php">書く</a>

      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
      <a href="./background/todo_logout.php">ログアウト</a>
    </div>
  </div>
</nav>




	<div>
        <?php foreach($allpostData as $post): ?>
            <div style="display: flex;"><img src=./post/<?php echo "{$post["thumbnail"]}" ?> class="img-thumbnail" style="width: 200px;" alt=""> 
            <div>
            <div><p><b><?php echo h("{$post["title"]}") ?></b></p></div>
            <div><p><?php echo h("{$post["text"]}")?></p></div>
            </div>
            </div>
            <br>
        <?php endforeach ?>
	</div>






			<!-- Main -->
				<section id="main" class="container">

					<section class="box special">
						<span class="image featured"><img src="images/pic01.jpg" alt="" /></span>
					</section>


			<!-- Footer -->
				<footer id="footer">

					<ul class="copyright">
						<li>&copy; welbe-ing All rights reserved.</li>
					</ul>
				</footer>

		</div>

	</body>
</html>