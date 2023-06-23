<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    if(isset($_GET['category'])){
        $category = $_GET['category'];
    } else {
        Header("Location: blog.php");
    }
    $categorySql = "SELECT * FROM blog WHERE blogDelete = 0 AND blogCategory = '$category' ORDER BY blogID DESC";
    $categoryResult = $connect -> query($categorySql);
    $categoryInfo = $categoryResult -> fetch_array(MYSQLI_ASSOC);
    $categoryCount = $categoryResult -> num_rows;
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>블로그</title>
    <?php include "../include/head.php" ?>
</head>
<body class="gray">
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->
    
    <main id="main" class="container">
        <div class="blog__search bmStyle">
            <h2>
                <?php if($categoryInfo == 0){ ?>
                    <p>현재 관련된 글이 없습니다.</p>      
                <?php } else { ?>
                <?php $categoryInfo['blogCategory']?>와 관련된 글이<?=$categoryCount?>개 있습니다.
                <?php } ?>
            </h2>
            <p>
                 <?php if($categoryInfo == 0){ ?>
                    <p>현재 관련된 글이 없습니다.</p>      
                <?php } else { ?>
                <?php $categoryInfo['blogCategory']?>와 관련된 글이<?=$categoryCount?>개 있습니다.
                <?php } ?>
            </p>
        </div>
        <div class="blog__inner">
            <div class="left mt70">
                <div class="blog__wrap">
                    <div class="cards__inner col2 row line2">
<?php foreach($categoryResult as $blog){ ?>
    <div class="card">
        <figure class="card__img">
            <a href="blogView.php?blogID=<?=$blog['blogID']?>">
                <img src="../assets/blog/<?=$blog['blogImgFile']?>" alt="<?=$blog['blogTitle']?>">
            </a>
        </figure>
        <div class="card__title">
            <h3><a href="blogView.php?blogID=<?=$blog['blogID']?>"><?=$blog['blogTitle']?></a></h3>
            <p><?=$blog['blogContents']?></p>
        </div>
    </div>
<?php } ?>
                    </div>
                </div>
            </div>
            <div class="right mt70">
                <div class="blog__aside">
                    <?php include "../include/blogTitle.php" ?>
                    <?php include "../include/blogCate.php" ?>
                    <?php include "../include/blogNew.php" ?>
                    <?php include "../include/blogPopular.php" ?>
                    <?php include "../include/blogComment.php" ?>
                </div>
            </div>
        </div>
        <!-- //blog__inner -->
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>