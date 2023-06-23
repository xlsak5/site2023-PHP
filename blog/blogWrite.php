<?php
    include "../connect/connect.php";
    include "../connect/session.php";

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

     <!-- Toast UI Editor API -->
     <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
    <style>
        .toastui-editor-md-mode .toastui-editor-md-vertical-style {
            background-color: #fff;
        }
        /* .ProseMirror > div span {
           display: none;
           display: none;
            position: absolute;
            top: -9999px;
            left: -9999px;
            width: 0px;
            height: 0px;
            overflow: hidden;
        }
        .toastui-editor-md-link .toastui-editor-md-link-url .toastui-editor-md-marked-text{
            display: none;
            position: absolute;
            top: -9999px;
            left: -9999px;
            width: 0px;
            height: 0px;
            overflow: hidden;
        } */
    </style>
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
                    <h2>개발자 블로그 게시글 작성</h2>
                    <p>개발과 관련된 글들만 작성할 수 있습니다.</p>
                </div>
            </div>
            <div class="blog__write">
                <!-- 이미지 form으로 받을려면 enctype="multipart/form-data" 적어야 함. -->
                <form action="blogWriteSave.php" name="blogWriteSave" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="blind">게시글 작성하기</legend>
                        <div>
                            <label for="blogCategory">카테고리</label>
                            <select name="blogCategory" id="blogCategory">
                                <option value="javascript">javascript</option>
                                <option value="jquery">jquery</option>
                                <option value="react">react</option>
                                <option value="html">html</option>
                                <option value="css">css</option>
                            </select>
                        </div>
                        <div>
                            <label for="blog__title">제목</label>
                            <input type="text" class="inputStyle" id="blog__title" name="blog__title" required>
                        </div>
                        <div>
                            <label for="blogContents">내용</label>
                            <!-- <div id="editor"></div> -->
                            <textarea name="blogContents" class="inputStyle" id="blogContents" rows="20"></textarea>
                        </div>
                        <div class="mt30">
                            <label for="blogFile">파일</label>
                            <input type="file" name="blogFile" id="blogFile" acccept=".jpg, .jpeg, .png, .gif" placeholder="jpg, gif, png 파일만 넣을 수 있습니다. 이미지 용량은 1메가 넘길 수 없습니다.">
                        </div>
                        <button type="submit" class="btnStyle3">저장하기</button>
                    </fieldset>
                </form>
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

    <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>
    <script>
        let proseMirror = document.querySelector("span.toastui-editor-md-link");
        const Editor = toastui.Editor;

        const editor = new Editor({
            el: document.querySelector('#editor'),
            height: '1000px',
            initialEditType: 'markdown',
            previewStyle: 'vertical'
        });

        if(proseMirror){
            console.log("true");
            proseMirror.innerText = "1";
        }
        else {
            console.log("false");
            proseMirror.innerText = "1";
        }
    </script>
</body>
</html>