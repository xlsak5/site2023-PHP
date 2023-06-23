<?php
  include "../connect/connect.php";
  include "../connect/session.php";
  include "../connect/sessionCheck.php";

//   $blogID = $_GET['blogID'];
//   $blogSql = "SELECT * FROM blog WHERE blogID = '$blogID'";
//   $blogResult = $connect -> query($blogSql);
//   $blogInfo = $blogResult -> fetch_array(MYSQLI_ASSOC);

  $memberID = $_SESSION['memberID'];

//   $sql = "SELECT * FROM userMembers WHERE memberID = {$memberID}";
  $result = $connect -> query($sql);
  $info = $result -> fetch_array(MYSQLI_ASSOC);

//   echo "<pre>";
//   var_dump($info);
//   echo "</pre>";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이페이지 정보 수정</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../html/assets/css/style.css">
    <!-- SCRIPT -->
    <script defer src="assets/js/common.js"></script>

    <style>

    </style>
</head>
<body>
    <div id="wrap">
        <?php include "../include/skip.php"; ?>
        <!-- //SKIP -->
        <?php include "../include/header.php"; ?>
        <!-- //header -->
        <div class="slider__wrap">
            <div class="slider__img">
                <div class="slider">
                    <img src="../html/assets/img/slider_01.png" class="img__logo">
                </div>
            </div>
        </div>
        <!-- banner -->

        <section id="section__mypage">
            <div class="container">
                <h1 class="mypage">마이페이지</h1>
                <h2>정보 수정</h2>
                <div class="modify__box">
                    <form action="mypageModifySave.php" name="mypageModifySave" method="post" enctype="multipart/form-data" onsubmit="return joinChecks()">
                        <fieldset class="modify__left">
                            <img id="preview" src="../assets/profile/img_16844044236455.png" alt="마이페이지 프로필 사진" />
                            <legend class="blind">마이페이지 프로필 사진 변경</legend>
                            <label for="userImgSrc">프로필 사진 변경
                                <input type="file" id="userImgSrc" name="userImgSrc" accept=".jpg, .jpeg, .png, .gif" onchange="loadFile(event)">
                            </label>
                            <span>* jpg, jpeg, png, gif 파일만 넣을 수 있습니다. 이미지 용량은 1MB를 넘을 수 없습니다.</span>
                        </fieldset>
                        <fieldset class="modify__right">
                            <legend class="blind">마이페이지 정보 수정 영역입니다.</legend>
                            <?php
                                if($result && $result -> num_rows > 0){
                                    echo "<div class='box'><label for='userName'>이름: </label><input name='userName' id='userName' type='text' value='".$info['userName']."' readonly></div>";

                                    echo "<div class='box'><label for='userEmail'>이메일: </label><div class='check__wrap'><div class='input__wrap'><input name='userEmail' id='userEmail' type='email' placeholder='".$info['userEmail']."' required>";
                                    echo "<a href='#c' class='btnStyleM' onclick='emailChecking()'>중복 확인</a></div>";
                                    echo "<p class='warning' id='userEmailComment'><!--이메일 검사--></p></div></div>";

                                    echo "<div class='box'><label for='userNickname'>닉네임: </label><div class='check__wrap'><div class='input__wrap'><input name='userNickname' id='userNickname' type='text' placeholder='".$info['userNickname']."' required>";
                                    echo "<a href='#c' class='btnStyleM' onclick='nickChecking()'>중복 확인</a></div>";
                                    echo "<p class='warning' id='userNicknameComment'><!--닉네임 검사--></p></div></div>";

                                    echo "<div class='box'><label for='userPhone'>연락처: </label><div class='input__wrap2'><input name='userPhone' id='userPhone' type='text' placeholder='".$info['userPhone']."' required>";
                                    echo "<p class='warning' id='userPhoneComment'><!--연락처 검사--></p></div></div>";
                                    echo "<button type='submit'>수정 완료</button>";
                                }
                            ?>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>
        <!-- //#section -->

        <?php include "../include/footer.php"; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // 이미지 미리보기
        let loadFile = function(event) {
            let output = document.getElementById('preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

        // 유효성 검사
        let isEmailCheck = false;
        let isNickCheck = false;

        function emailChecking(){
            let userEmail = $("#userEmail").val();
            // 이메일 유효성 검사
            if($("#userEmail").val() == ''){
                $("#userEmailComment").text("* 이메일을 입력해주세요!");
                $("#userEmail").focus();
                return false;
            }
            let getuserEmail = RegExp(/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([\-.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i);
            if(!getuserEmail.test($("#userEmail").val())){
                $("#userEmailComment").text("* 이메일 형식에 맞게 작성해주세요!");
                $("#userEmail").val('');
                $("#userEmail").focus();
                return false;
            }
            if(userEmail == null || userEmail == ''){
                $("#userEmailComment").text("* 이메일을 입력해주세요");
            }else {
                $.ajax({
                    type : "POST",
                    url : "mypageEnd.php",
                    data : {"userEmail" : userEmail, "type" : "isEmailCheck"},
                    dataType : "json",
                    success : function(data){
                        if(data.result == "good"){
                            $("#userEmailComment").text("* 사용 가능한 이메일 입니다");
                            isEmailCheck = true;
                        }else {
                            $("#userEmailComment").text("* 이미 존재하는 이메일 입니다");
                            isEmailCheck = false;
                        }
                    },
                    error : function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        }
        function nickChecking(){
            let userNickname = $("#userNickname").val();
            // 닉네임 유효성 검사
            if($("#userNickname").val() == ''){
                $("#userNicknameComment").text("* 닉네임을 입력해주세요!");
                $("#userNickname").focus();
                return false;
            }
            let getuserNickname = RegExp(/^[가-힣|0-9]+$/);
            if(!getuserNickname.test($("#userNickname").val())){
                $("#userNicknameComment").text("* 닉네임은 한글 또는 숫자만 사용 가능합니다.");
                $("#userNickname").val('');
                $("#userNickname").focus();
                return false;
            }
            if(userNickname == null || userNickname == ''){
                $("#userNicknameComment").text("* 닉네임을 입력해주세요!");
            } else {
                $.ajax({
                    type : "POST",
                    url : "mypageEnd.php",
                    data : {"userNickname" : userNickname, "type" : "isNickCheck"},
                    dataType : "json",
                    success : function(data){
                        if(data.result == "good"){
                            $("#userNicknameComment").text("* 사용 가능한 닉네임 입니다");
                            isNickCheck = true;
                        }else {
                            $("#userNicknameComment").text("* 이미 존재하는 닉네임 입니다");
                            isNickCheck = true;
                        }
                    },
                    error : function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        }

        function joinChecks(){
            // 연락처 유효성 검사
            if($("#userPhone").val() == ''){
                $("#userPhoneComment").text("* 연락처를 입력해주세요!");
                $("#userPhone").focus();
                return false;
            }
            let getuserPhone = RegExp(/01[016789]-[^0][0-9]{2,3}-[0-9]{3,4}/);
            if(!getuserPhone.test($("#userPhone").val())){
                $("#userPhoneComment").text("* 휴대폰 번호가 정확하지 않습니다.(000-0000-000)");
                $("#userPhone").val('');
                $("#userPhone").focus();
                return false;
            }

                // 중복 검사를 통과했는지 확인
            if (!isEmailCheck){
                $("#userEmailComment").text("* 이메일 중복을 확인해주세요.");
                return false;
            }

            if (!isNickCheck){
                $("#userNicknameComment").text("* 닉네임 중복을 확인해주세요.");
                return false;
            }
        }
</script>
</body>
</html>