<?php
include "db/db.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>게시판 만들기 - 글 쓰기</title>
    <script>
        function print_console() {
            let title = document.getElementById("title").value;
            let name = document.getElementById("name").value;
            let content = document.getElementById("content").value;

            console.log("제목 : " + title);
            console.log("작성자 : " + name);
            console.log("내용 : " + content);
        };
    </script>
</head>

<body>
    <form action="/db/insert.php" method="post">
    <div class="main">
        <div>
            <table>
                <tr>
                    <td colspan="2"><h3 class="board-title">자유 게시판 - 글 쓰기</h3></td>
                </tr>
                
                <tr>
                    <td class="col1">제목</td>
                    <td class="col2"><input id="title" type="text" name="title" placeholder="제목"></td>
                </tr>
                <tr>
                    <td class="col1">작성자</td>
                    <td class="col2"><input id="name" type="text" name="name" placeholder="작성자"></td>
                </tr>
                <tr>
                    <td class="col1" rowspan="2">내용</td>
                    <td class="col2"><textarea id="content" name="content"></textarea></td>
                </tr>
                <tr>
                    <td class="col2"><input type="file" name="SelectFile"></input></td>
                </tr>
            </table>
        <div>
        
        <div class="buttons">
            <button><a href="board_list.php">이전</a></button>
            <button type="submit" class="rgt-btn">등록</button>
        </div>
    </div>
    </form>
</body>
</html>