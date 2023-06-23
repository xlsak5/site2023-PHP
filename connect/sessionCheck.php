<?php
    //!은 없다면[참-> 거짓 // 거짓->참]
    if(!isset($_SESSION['memberID'])){  
        // Header("Location: ../login/login.php");
        echo "<script>alert('로그인을 먼저 해야합니다.')</script>";
        echo "<script>location.href='../login/login.php'</script>";
    }
?>