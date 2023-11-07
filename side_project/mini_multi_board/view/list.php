<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $this->titleBoardName ?> 페이지</title>
	<link rel="stylesheet" href="/view/css/common.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="vh-100">
	<?php require_once("view/inc/header.php"); ?>

	<div class="text-center mt -5 mt-3">
		<h1><?php echo $this->titleBoardName ?></h1>
		<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16"  data-bs-toggle="modal" data-bs-target="#Modalinsert">
			<path data-bs-toggle="modal" data-bs-target="#exampleModal" fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
		  </svg>
	</div>

	<main>
		<?php
			foreach($this->arrBoardInfo as $item) {
		?>

		<div class="card" id="<?php echo $item["id"];?>">
			<img src="<?php echo isset($item["b_img"]) ? "/"._PATH_USERIMG.$item["b_img"] : ""; ?>" class="card-img-top" alt="이미지 없음">
			<div class="card-body">
			  <h5 class="card-title"><?php $item["b_title"]?></h5>
			  <p class="card-text"><?php echo mb_substr( $item["b_content"], 0, 10 )."..." ?></p>
			  <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button> -->
			  <button class="btn btn-primary" onclick="openDetail(<?php echo $item['id'] ?>); return false;">상세</button>
			</div>
		  </div>

		<?php
			}
		?>
	</main>
  
  <!-- Modal -->
  <div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="b_title">개발자입니다</h5>
		  <button type="button" onclick="closeDetailModal(); return false;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		  <p>작성일 :<span id="created_at"></span></p>
		  <p>수정일 :<span id="updated_at"></span></p>
		  <br><br>
		  <span id="b_content">살려주세요</span>
		 
		  <br><br>
		  <img id="b_img" src="" claas="card-img-top" alt="">
		</div>
		<div class="modal-footer">
		  <button type="button" onclick="closeDetailModal(); return false;" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		</div>
	  </div>
	</div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<form action="/board/add" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="b_type" value="<?php echo $this->boardType; ?>">
		<div class="modal-header">
		<input type="text" name="b_title" class="form-control" placeholder="제목을 입력하세요">
		</div>
		<div class="modal-body">
		  <textarea name="b_content" class="form-control" id="" cols="30" rows="10" placeholder="내용입력하세요"></textarea>
		  <br><br>
		  <input type="file" name="b_img" accept="image/*">
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
		  <button type="submit" class="btn btn-primary">작성</button>
		</div>
		</form>
	  </div>
	</div>
  </div>

	<footer class="fixed-bottom bg-dark text-light text-center p-3">저작권</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="/view/js/common.js"></script>
</body>
</html> 

