<?php
session_start();
include("functions.php");
check_session_id();

$id = $_GET["id"];

// var_dump($_GET);
// exit();
$pdo = connect_to_db();
$sql_user = "SELECT * FROM users_table WHERE id = $id";
$stmt_user = $pdo->prepare($sql_user);


try {
  $status_user = $stmt_user->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// var_dump($stmt_user);
// exit();

foreach($stmt_user as $user):
    $prof_img = $user["prof_img"];
    $screen_img = $user["screen_img"];
    $username = $user["username"];
    $pref = $user["pref"];
    $city = $user["city"];
    $introduction = $user["introduction"];
endforeach;

// var_dump($user["introduction"]);
// exit();


$sql_post = "SELECT * FROM posts_table WHERE user_id = $id";
$stmt_post = $pdo->prepare($sql_post);


try {
  $status_post = $stmt_post->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

?>


<head>
 
    <title>ユーザーページ</title>
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
    <a class="navbar-brand" href="toppage.php">トップページ</a>
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

    <body>
        <div class="screen_div">
            <img class="screen_img" src="./setting/<?php echo "{$screen_img}"?>" >
        </div>
        <div class="prof_area">
            <div class="prof_img">
                <img class="prof_img" src="./setting/<?php echo "{$prof_img}"?>" alt="">
            </div>
            <div class="prof">

                <div class="container">
                    
                    <div class="row row-cols-auto">
                    <div class="col"><?php echo h("{$username}") ?></div>
                    </div>
                    <div class="w-100"></div>
                    
                    <div class="row row-cols-auto">
                    <div class="col"><?php echo h("{$pref}") ?> | <?php echo h("$city") ?> | <?php echo h("{$user["department"]}") ?></div>
                    <br />
                    <div class="col"><?php echo h("{$introduction}") ?></div>
                    </div>
                </div>

            </div>

        </div>

<br><br>
        <?php foreach($stmt_post as $post): ?>
            <div style="display: flex;"><img src=./post/<?php echo "{$post["thumbnail"]}" ?> class="img-thumbnail" style="width: 200px;" alt=""> 
            <div>
            <div><p><b>
			<a href='article.php?id=<?php echo "{$post["post_id"]}" ?>'>
			<?php echo h("{$post["title"]}") ?></a>
			</b></p></div>
            <div><p><?php echo h("{$post["text"]}")?></p></div>
            </div>
            </div>
            <br>
        <?php endforeach ?>
        





    </body>

</html>


    <style>
        .screen_div{
            height: 250px;
            background-color: #dcdcdc;
            background:url(./setting/images/screen_img_defult.png);            
            background-position: center;
            background-size: cover;
            object-fit: cover; 
        }

        .screen_img{
            height: 250px;
            width: 100%;
            background-color: #dcdcdc;
            background-position: center;
            background-size: cover;
            object-fit: cover; 
        }

      .prof_img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        border: 1px solid #000000;
        background:url(./setting/images/prof_defult.jpeg);   
        background-position: center;
        background-size: cover;       
      }

      .prof_area{
          display: flex;
      }

        #output li {
            background-color: rgb(231, 235, 218);
            list-style-type: none

        }

        #send{
            width: 150px;
        }

        #nyuuryoku{
            margin-top: 30px;
        }

        #setumei{
            font-size: 10px;
        }

        #top{
            /* width: 100%; */
            display: flex;
          justify-content: space-between;
        }

        #top h1{
            width: 100%;
        }

        #top img{
            width: 30%;
        }


    </style>