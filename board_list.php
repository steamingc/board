<?php 
include "db/db.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css?after" />
    <title>게시판 리스트</title>
</head>

<body>
    <div id="board_area">
        <h1>자유 게시판</h1>
        <table class="list-table">
            <thead>
                <tr>
                    <th width="70">글 번호</th>
                    <th width="500">제목</th>
                    <th width="120">작성자</th>
                    <th width="200">작성일</th>
                </tr>
            </thead>

            <?php 
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $sql = query("select * from board");
                $row_num = mysqli_num_rows($sql);   //게시판 총 레코드 수
                $list = 10; //한 페이지에 보여줄 개수
                $block_ct = 5; //블록당 보여줄 페이지 개수

                $block_num = ceil($page/$block_ct); //현재 페이지 블록 구하기
                $block_start = (($block_num - 1) * $block_ct) + 1;  //블록의 시작 번호
                $block_end = $block_start + $block_ct - 1; //블록의 마지막 번호

                $total_page = ceil($row_num / $list);   //페이징한 페이지 수 구하기
                if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지막 번호가 페이지 수보다 많다면 마지막 번호는 페이지 수
                $total_block = ceil($total_page/$block_ct); //블럭 총 개수
                $start_num = ($page - 1) * $list;   //시작번호 (page - 1)에서  $list를 곱한다.


                //글 리스트 불러오기
                $sql2 = query("select * from board order by id desc limit $start_num, $list");
                while($board = $sql2 -> fetch_array()) {
                    $title = $board['title'];
                    if(strlen($title)>30) {
                        $title = str_replace($board['title'], mb_substr($board['title'], 0, 30, "utf-8")."...", $board['title']);
                    }
            ?>

            <tbody>
                <tr>
                    <th width="70"><?php echo $board['id']; ?></th>
                    <th width="500"><a href=""><?php echo $title; ?></th>
                    <th width="120"><?php echo $board['name']; ?></th>
                    <th width="200"><?php echo $board['ct']; ?></th>
                </tr> 
            </tbody>
            <?php } ?>
        </table>
        
        <div id="list-footer">
            <!-- 페이징 넘버 -->
            <div id="page_num">
                <ul>
                    <?php
                            //이전
                        if($page <= 1){
                        } else {
                            $pre = $page - 1;   //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전 버튼을 누르면 2번 페이지로 갈 수 있게 함
                            echo "<li><a href='?page=$pre'>이전</a></li>";  //이전 글자에 pre변수를 링크
                        }
        
                        for($i=$block_start; $i<=$block_end; $i++){ //초기값을 블록의 시작 번호를 조건으로 블록 시작번호가 마지막 블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if($page == $i) {
                                echo "<li class='thispage'>[$li]</li>";
                            } else {
                                echo "<li><a href='?page=$i'>[$i]</a></li>";
                            }
                        }

                            //다음
                        if($page >= $total_page){  //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈값 
                        } else {
                            $next = $page + 1;
                            echo "<li><a href='?page=$next'>다음</a></li>";
                        }
                    ?>
                </ul>
            </div> 

            <!-- 등록 버튼 -->
            <div id="write_btn">
                <a href="board_write.php"><button>글쓰기</button></a>
            </div>
        </div> <!-- list-footer -->
    </div>
</body>
</html>