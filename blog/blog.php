<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";

    // $sql = "SELECT count(boardID) FROM board";
    // $result = $connect -> query($sql);

    // $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    // $boardTotalCount = $boardTotalCount['count(boardID)'];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 만들기</title>

    <?php include "../include/head.php" ?>
    <!-- //head -->
</head>
<body class="gray">
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->
    <main id="main" class="container">
        <div class="blog__inner">
            <div class="left">
                <div class="blog__search">
                    <h2>개발자 블로그 입니다.</h2>
                    <p>개발과 관련된 글입니다.</p>

                    <div>
                        <form action="" name="#" method="POST">
                            <legend class="blind">블로그 검색</legend>
                            
                            <input type="search" class="inputStyle2" name="searchKeyword" aria-label="검색" placeholder="검색어를 입력하세요!">
                            <button type="submit" class="btnStyle3 ml20">검색하기</button>
                            <?php if(isset($_SESSION['memberID'])){ ?>
                                <ul>
                                    <div class="mt20">
                                        <a href="blogWrite.php" class="btnStyle4">글쓰기</a>
                                    </div>
                                </ul>
                            <?php } else { ?>
                            <?php } ?>
                        </form>
                    </div>
                </div>
                <div class="blog__wrap">
                    <h2>All Posts</h2>
                    <!-- 
                    <div class="cards__inner col3 line3">
                        <div class="card">
                            <figure class="card__img" >
                                <source srcset="../html/assets/img/blog01.png, ../html/assets/img/blog01@2x.png 2x, ../html/assets/img/blog01@3x.png 3x" />
                                <img src="../html/assets/img/blog01.png" alt="자연1">
                            </figure>
                            <div class="card__title">
                                <h3>패럴렉스 사이트 기본 구조 스..</h3>
                                <p>어떤 일이라도 노력하고 즐기면  그 결과는 빛을 바란다고 생각합니다. 신입의 열정과 도전정신을 깊숙히 새기며 배움에 있어 겸손함을 유지하며 세부적인 곳까지 파고드는 개발자가 되겠습니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img" >
                                <source srcset="../html/assets/img/blog01.png, ../html/assets/img/blog01@2x.png 2x, ../html/assets/img/blog01@3x.png 3x" />
                                <img src="../html/assets/img/blog06.png" alt="자연1">
                            </figure>
                            <div class="card__title">
                                <h3>패럴렉스 사이트 기본 구조 스..</h3>
                                <p>어떤 일이라도 노력하고 즐기면  그 결과는 빛을 바란다고 생각합니다. 신입의 열정과 도전정신을 깊숙히 새기며 배움에 있어 겸손함을 유지하며 세부적인 곳까지 파고드는 개발자가 되겠습니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img" >
                                <source srcset="../html/assets/img/blog01.png, ../html/assets/img/blog01@2x.png 2x, ../html/assets/img/blog01@3x.png 3x" />
                                <img src="../html/assets/img/blog02.png" alt="자연1">
                            </figure>
                            <div class="card__title">
                                <h3>패럴렉스 사이트 기본 구조 스..</h3>
                                <p>어떤 일이라도 노력하고 즐기면  그 결과는 빛을 바란다고 생각합니다. 신입의 열정과 도전정신을 깊숙히 새기며 배움에 있어 겸손함을 유지하며 세부적인 곳까지 파고드는 개발자가 되겠습니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img" >
                                <source srcset="../html/assets/img/blog01.png, ../html/assets/img/blog01@2x.png 2x, ../html/assets/img/blog01@3x.png 3x" />
                                <img src="../html/assets/img/blog03.png" alt="자연1">
                            </figure>
                            <div class="card__title">
                                <h3>패럴렉스 사이트 기본 구조 스..</h3>
                                <p>어떤 일이라도 노력하고 즐기면  그 결과는 빛을 바란다고 생각합니다. 신입의 열정과 도전정신을 깊숙히 새기며 배움에 있어 겸손함을 유지하며 세부적인 곳까지 파고드는 개발자가 되겠습니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img" >
                                <source srcset="../html/assets/img/blog01.png, ../html/assets/img/blog01@2x.png 2x, ../html/assets/img/blog01@3x.png 3x" />
                                <img src="../html/assets/img/blog04.png" alt="자연1">
                            </figure>
                            <div class="card__title">
                                <h3>패럴렉스 사이트 기본 구조 스..</h3>
                                <p>어떤 일이라도 노력하고 즐기면  그 결과는 빛을 바란다고 생각합니다. 신입의 열정과 도전정신을 깊숙히 새기며 배움에 있어 겸손함을 유지하며 세부적인 곳까지 파고드는 개발자가 되겠습니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img" >
                                <source srcset="../html/assets/img/blog01.png, ../html/assets/img/blog01@2x.png 2x, ../html/assets/img/blog01@3x.png 3x" />
                                <img src="../html/assets/img/blog05.png" alt="자연1">
                            </figure>
                            <div class="card__title">
                                <h3>패럴렉스 사이트 기본 구조 스..</h3>
                                <p>어떤 일이라도 노력하고 즐기면  그 결과는 빛을 바란다고 생각합니다. 신입의 열정과 도전정신을 깊숙히 새기며 배움에 있어 겸손함을 유지하며 세부적인 곳까지 파고드는 개발자가 되겠습니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img" >
                                <source srcset="../html/assets/img/blog01.png, ../html/assets/img/blog01@2x.png 2x, ../html/assets/img/blog01@3x.png 3x" />
                                <img src="../html/assets/img/blog05.png" alt="자연1">
                            </figure>
                            <div class="card__title">
                                <h3>패럴렉스 사이트 기본 구조 스..</h3>
                                <p>어떤 일이라도 노력하고 즐기면  그 결과는 빛을 바란다고 생각합니다. 신입의 열정과 도전정신을 깊숙히 새기며 배움에 있어 겸손함을 유지하며 세부적인 곳까지 파고드는 개발자가 되겠습니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img" >
                                <source srcset="../html/assets/img/blog01.png, ../html/assets/img/blog01@2x.png 2x, ../html/assets/img/blog01@3x.png 3x" />
                                <img src="../html/assets/img/blog05.png" alt="자연1">
                            </figure>
                            <div class="card__title">
                                <h3>패럴렉스 사이트 기본 구조 스..</h3>
                                <p>어떤 일이라도 노력하고 즐기면  그 결과는 빛을 바란다고 생각합니다. 신입의 열정과 도전정신을 깊숙히 새기며 배움에 있어 겸손함을 유지하며 세부적인 곳까지 파고드는 개발자가 되겠습니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img" >
                                <source srcset="../html/assets/img/blog01.png, ../html/assets/img/blog01@2x.png 2x, ../html/assets/img/blog01@3x.png 3x" />
                                <img src="../html/assets/img/blog05.png" alt="자연1">
                            </figure>
                            <div class="card__title">
                                <h3>패럴렉스 사이트 기본 구조 스..</h3>
                                <p>어떤 일이라도 노력하고 즐기면  그 결과는 빛을 바란다고 생각합니다. 신입의 열정과 도전정신을 깊숙히 새기며 배움에 있어 겸손함을 유지하며 세부적인 곳까지 파고드는 개발자가 되겠습니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                            </div>
                        </div>
                    </div> 
                    -->
                    <div class="cards__inner col3 line3">
<?php
    $sql = "SELECT * FROM blog WHERE blogDelete = 0 ORDER BY blogID DESC";
    $result = $connect -> query($sql);
?>
    <?php foreach($result as $blog){ ?>
        <div class="card">
            <figure class="card__img">
                <a href="blogView.php?blogID=<?=$blog['blogID']?>">
                    <img src="../assets/blog/<?=$blog['blogImgFile']?>" alt="<?=$blog['blogTitle']?>">
                </a>
            </figure>
            <div class="card__title">
                <h3><?=$blog['blogTitle']?></h3>
                <p><?=$blog['blogContents']?></p>
            </div>
            <div class="card__info">
                <a href="#" class="more">더보기</a>
            </div>
        </div>
    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="blog__aside">
                    <div class="intro">
                        <picture class="img">
                            <source srcset="../html/assets/img/intro01.png, ../html/assets/img/intro01@2x.png 2x, ../html/assets/img/intro01@3x.png 3x" />
                            <img src="../html/assets/img/intro01.png" alt="소개이미지">
                        </picture> 
                        <p class="text">우리는 끊임없이 성장하고 발전하는 노력을 기울여야 한다.</p>
                    </div>
                    <div class="cate">
                       <?php include "../include/blogCate.php" ?>
                    </div>
                    <div class="cate">
                        <h4>인기 글</h4>
                    </div>
                    <div class="cate">
                        <h4>최신 댓글</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- 
            <div class="intro__inner"></div>    각 페이지 소개 배너
            <div class="join__inner"></div>     회원 가입 페이지
            <div class="login__inner"></div>    로그인 페이지
            <div class="board__inner"></div>    게시판 페이지
            <div class="blog__inner"></div>     블로그 메인
            

            <div class="sliders__inner"></div>
            <div class="banners__inner"></div>
            <div class="cards__inner"></div>
            <div class="images__inner"></div>
            <div class="ads__inner"></div>
            <div class="texts__inner"></div>
            <div class="login__inner"></div>
            <div class="join__inner"></div>
            <div class="bolg__inner"></div>
         -->
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>