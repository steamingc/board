<?php
include "db/db.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>게시판 만들기 - 글 보기</title>
</head>

<body>
    <?php ?>

    <div class="main">
        <div>
            <table>
                <tr>
                    <td colspan="2"><h3 class="board-title">자유 게시판 - 글 쓰기</h3></td>
                </tr>
                
                <tr>
                    <td class="col1">제목</td>
                    <td class="col2"></td>
                </tr>
                <tr>
                    <td class="col1">작성자</td>
                    <td class="col2"></td>
                </tr>
                <tr>
                    <td class="col1" rowspan="2">내용</td>
                    <td class="col2"></td>
                </tr>
            </table>
        <div>
    </div>
</body>
</html>