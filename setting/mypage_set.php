<?php
session_start();
include("functions.php");
check_session_id();

?>


<!DOCTYPE html>
<html lang="ja">


<head>
 
    <title>書く</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/sakura.css/css/sakura-earthly.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../editer_tool/jquery.cleditor.css" />

    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../editer_tool/jquery.cleditor.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $("#input").cleditor();
      });
    </script>

    <body>
        <div id="top">
        <h1><u>記事投稿</u></h1>
        </div>
        <p>成果事例や取組事例を記入する</p>


        <form action="post.check.php" method="POST" enctype="multipart/form-data">

            <div>タイトル: <input type="text" name="title" style="
                width: 622px;
                padding-left: 10px;
                padding-right: 10px;
            "></div>
            <br />

            <div>本文: </div>
            <textarea id="input" name="text"></textarea>
            <p>※現在、リッチテキストだとDB保存できない</p>
            <br />

            <div>サムネイル画像: </div>
            <input name="thumbnail" id="uploader" type="file" accept="image/*">
            <div id="showPic"></div>

            <div>
                <button>確認画面へ</button>
            </div>

            <input type="hidden" name="max" value="1048576" />
         </form>


        <script>
            $("#uploader").change(function (evt) {
            let file = evt.target.files;
            let reader = new FileReader();
            let dataUrl = "";
            reader.readAsDataURL(file[0]);
            reader.onload = function () {
                dataUrl = reader.result;
                $("#showPic").html("<img src='" + dataUrl + "'>");
            };
            });
        </script>

    </body>

</html>


    <style>
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

        #showPic{
            width: 200px;
        }
    </style>