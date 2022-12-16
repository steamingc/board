<?php
    include "db.php";

    // $host = 'localhost';
    // $user = 'root';
    // $pw = '1234';
    // $dbName = 'notice';
    // $conn = mysqli_connect($host, $user, $pw, $dbName);
    // $conn->set_charset("utf8"); //한글 인코딩

    // function query($query) {
    //     global $conn;       //global : 외부에서 선언된 $query를 함수 내에서 쓸 수 있도록 해준다
    //     return $conn->query($query);
    // }

    $title = $_POST['title'];
    $name = $_POST['name'];
    $content = $_POST['content'];
    date_default_timezone_set('Asia/Seoul');    //서울 기준 현재 서버시간 설정
    $ct = date("Y-m-d H:i:s");

    // var_dump($_POST['title']);
    // var_dump(mysqli_query($conn, $sql));
        
    if(!$title) {   //제목 빈칸
        echo "<script>
                alert('제목을 입력해주세요.');
                history.back();
                </script>";
    } else if(!$name) { //작성자명 빈칸
        echo "<script>
                alert('작성자를 입력해주세요.');
                history.back();
                </script>";
    } else if(!$content) {  //내용 빈칸
        echo "<script>
                alert('내용을 입력해주세요.');
                history.back();
                </script>";
    } else if ($title && $name && $content && $ct) {    //글 등록 성공
        $sql = query("insert into board (title, name, content, ct) values('".$title."', '".$name."', '".$content."', '".$ct."')");
        echo "<script>
                alert('글을 등록하였습니다!!');
                location.href ='../board_list.php';
                </script>";
    } else {
        echo "<script>
                alert('글 등록에 실패하였습니다.');
                history.back();
                </script>";
        error_log(mysqli_error($conn));
    }

    

    // if ($title && $name && $content && $ct) {
    //     $sql = query("insert into board (title, name, content, ct) values('".$title."', '".$name."', '".$content."', '".$ct."')");
    //     echo "<script>
    //             alert('글을 등록하였습니다!!');
    //             location.href ='board_list.php';
    //             </script>";
    //     // echo '글을 등록하였습니다. <a href="board_list.php>"돌아가기</a>';
    // } else {
    //     echo "<script>
    //             alert('글 등록에 실패하였습니다.');
    //             history.back();
    //             </script>";
    //     error_log(mysqli_error($conn));
    // }

?>