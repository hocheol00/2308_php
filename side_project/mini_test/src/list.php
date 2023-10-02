<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
define("FILE_HEADER", ROOT."header.php"); // 해더 패스
require_once(ROOT."lib/lib.php"); // db관련 라이브러리

$conn = null;
$list_cnt = 5;
$page_num = 1;

try {
    // DB 접속
    if(!my_db_conn($conn))
    {
        throw new Exception("DB Error : PDO Instance");	
    }
    //총 게시글 수 검색
    $test_cnt = db_select_test_cnt($conn);
    if($test_cnt === false) {
        throw new Exception("DB Error : SELECT Count");
    }

    $max_page_num = ceil($test_cnt / $list_cnt);

    if(isset($_GET["page"])) { 
        $page_num = $_GET["page"]; //유저가 보내온 페이지 셋팅
    }
    $offset = ($page_num - 1) * $list_cnt;

    //이전버튼
    $prev_page_num = $page_num -1;
    if($prev_page_num === 0) {
        $prev_page_num = 1;
    }
    //다음버튼
    $next_page_num = $page_num +1;
    if($next_page_num > $max_page_num) {
        $next_page_num = $max_page_num;
    }
    //DB 조회시 사용할 데이터 배열
    $arr_param = [
        "list_cnt" => $list_cnt
        ,"offset" => $offset
    ];

    //게시글 리스트 조회
    $result = my_db_select_test_paging($conn, $arr_param);
		if(!$result)
		{
			throw new Exception("DB Error : SELECT test");
			exit;
		}
    }

    catch(Exception $e) {
		echo $e->getMessage();
		exit;
	}
	finally {
		my_db_destroy_conn($conn);
}
?>



<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_test/src/css/img/test.css">
    <title>메인 페이지</title>
</head>
<body>
    <div class="header">
    <?php
		require_once(FILE_HEADER);
	?>
        <div class="subhead">   
            <h3>회원게시판</h3>
            <h3>문의게시판</h3>
            <h3>마이페이지</h3>
        </div>
    </div>
    <table>
        <colgroup>
            <col width="20%" />
            <col width="20%" />
            <col width="20%" />
            <col width="20%" />
            <col width="20%" />
        </colgroup>
        <tr>
            <th>POST ID</th>
            <th>제목</th>
            <th>작성자</th>
            <th>작성일</th>
            <th>조회수</th>
        </tr>
       
        <?php
				foreach($result as $item)
				{
			?>
				<tr>
					<td><?php echo $item["id"]?></td>
					<td><?php echo $item["title"];?></td>
					<td><?php echo $item["name_t"];?></td>
                    <td><?php echo $item["creat_at"];?></td>
                    <td><?php echo $item["views"];?></td>
				</tr>
			
			<?php
				}
			?>
    </table>
    <section>
    <a class="num" href="/mini_test/src/list.php/?page=<?php echo $prev_page_num ?>">이전</a>
        <?php
            for($i = 1; $i <= $max_page_num; $i++) {
                if((int)$page_num === $i) {
                    ?>
                    <a class="page_btn num" href="/mini_test/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php
                } else {
        ?>
            <a class="num" href="/mini_test/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php
                }
            }
        ?>
         <!-- <a href="#">1</a>
         <a href="#">2</a>
         <a href="#">3</a>
        <a href="#">4</a>
         <a href="#">5</a> -->
         <a class="num" href="/mini_test/src/list.php/?page=<?php echo $next_page_num ?>">다음</a>
    </section>
</body>
</html>