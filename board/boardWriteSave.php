<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $boardView = 1;
    $regTime = time();
    $memberID = $_SESSION['memberID'];

    // 해킹 방지?
    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);
    $sql = "INSERT INTO board(memberID, boardTitle, boardContents, boardView, regTime) VALUES('$memberID', '$boardTitle', '$boardContents', ' $boardView', '$regTime')";
    $connect -> query($sql);
?>
<script>
    location.href = "board.php"//게시판으로다시돌아가기
</script>