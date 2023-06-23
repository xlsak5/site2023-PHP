<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $memberID = $_SESSION['memberID'];
    $blogAuthor = $_SESSION['youName'];
    $blogCategory = $_POST['blogCategory'];
    $blogTitle = $_POST['blogTitle'];
    $blogContents = nl2br($_POST['blogContents']);

    echo $blogContents;

    $blogView = 1;
    $blogLike = 0;
    $regTime = time();
    $blogImgFile = $_FILES['blogFile'];
    $blogImgSize = $_FILES['blogFile']['size'];
    $blogImgType = $_FILES['blogFile']['type'];
    $blogImgName = $_FILES['blogFile']['name'];
    $blogImgTmp = $_FILES['blogFile']['tmp_name'];

    // post방식이여도 파일은 $_FILES로 적어야함
    // 1.파일 선택은 form태그로 전달 후 echo로 검사하면 에러가 나옴
    // 2.form태그에 enctype="multipart/form-data" 적어야 함. 
    // 3.echo로 확인할때 
    //    echo "<pre>"  
    //    echovar_dump($변수이름) 
    //    echo "</pre>"
    // 4. 파일이름과 파일형식을 데이터베이스에 저장해야 함.
    // 성공했을때 파일선택 형식
    // array(5) {
    //     ["name"]=>
    //     string(13) "222213213.png"
    //     ["type"]=>
    //     string(9) "image/png"
    //     ["tmp_name"]=>
    //     string(44) "C:\Users\line\AppData\Local\Temp\php8178.tmp"
    //     ["error"]=>
    //     int(0)
    //     ["size"]=>
    //     int(1549959)
    // }
    if($blogImgType){
        $fileTypeExtension = explode("/", $blogImgType);
        $fileType = $fileTypeExtension[0];       //image
        $fileExtension = $fileTypeExtension[1];   //jpeg
        
        // 이미지 타입 확인
        if($fileType == "image"){
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $blogImgDir = "../assets/blog/";
                $blogImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                echo "이미지 파일이 맞습니다.";
                $sql = "INSERT INTO blog(memberID, blogTitle, blogContents, blogCategory, blogAuthor, blogView, blogLike, blogImgFile, blogImgSize, blogDelete, blogRegTime) VALUES('$memberID', '$blogTitle', '$blogContents', '$blogCategory', '$blogAuthor', '$blogView', '$blogLike', '$blogImgName', '$blogImgSize', '0', '$regTime')";
            } else {
                echo "<script>alert('이미지 파일이 아닙니다.')</script>";
            }
        } else {
            echo "<script>alert('이미지 파일이 아닙니다.')</script>";
        }
    } else {
        echo "이미지 파일을 첨부하지 않았습니다.";
        $sql = "INSERT INTO blog(memberID, blogTitle, blogContents, blogCategory, blogAuthor, blogView, blogLike, blogImgFile, blogImgSize, blogDelete, blogRegTime) VALUES('$memberID', '$blogTitle', '$blogContents', '$blogCategory', '$blogAuthor', '$blogView', '$blogLike', 'Img_default.jpg', '$blogImgSize', '0', '$regTime')";
    }
    // 이미지 사이즈 확인
    if($blogImgSize > 10000000){
        echo "<script>alert('이미지 파일 용량이 1메가를 초과했습니다.')</script>";
    }
    $result = $connect -> query($sql);
    $result = move_uploaded_file($blogImgTmp, $blogImgDir.$blogImgName);
    Header("Location: blog.php");
?>