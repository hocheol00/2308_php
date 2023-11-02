<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>자유게시판</title>
	<link rel="stylesheet" href="/view/css/common.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="vh-100">
	<?php require_once("view/inc/header.php"); ?>

	<div class="text-center mt -5 mt-3">
		<h1>자유게시판</h1>
		<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16"  data-bs-toggle="modal" data-bs-target="#Modalinsert">
			<path data-bs-toggle="modal" data-bs-target="#exampleModal" fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
		  </svg>
	</div>

	<main>
		<div class="card">
			<img src="https://picsum.photos/200/300.jpg" class="card-img-top" alt="...">
			<div class="card-body">
			  <h5 class="card-title">Card title</h5>
			  <p class="card-text">make up the bulk of the card's content.</p>
			  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		  </div>
		  <div class="card">
			<img src="https://picsum.photos/200/300.jpg" class="card-img-top" alt="...">
			<div class="card-body">
			  <h5 class="card-title">Card title</h5>
			  <p class="card-text">make up the bulk of the card's content.</p>
			  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		  </div>
		  <div class="card">
			<img src="https://picsum.photos/200/300.jpg" class="card-img-top" alt="...">
			<div class="card-body">
			  <h5 class="card-title">Card title</h5>
			  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		  </div>
		  <div class="card">
			<img src="https://picsum.photos/200/300.jpg" class="card-img-top" alt="...">
			<div class="card-body">
			  <h5 class="card-title">Card title</h5>
			  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		  </div>
		  <div class="card">
			<img src="https://picsum.photos/200/300.jpg" class="card-img-top" alt="...">
			<div class="card-body">
			  <h5 class="card-title">Card title</h5>
			  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		  </div>
	</main>
  
  <!-- Modal -->
  <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		  ...
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		</div>
	  </div>
	</div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		<input type="text" class="form-control" placeholder="제목을 입력하세요">
		</div>
		<div class="modal-body">
		  <textarea class="form-control" id="" cols="30" rows="10" placeholder="내용입력하세요"></textarea>
		  <br><br>
		  <input type="file" accept="image/*">
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-primary">Save changes</button>
		</div>
	  </div>
	</div>
  </div>

	<footer class="fixed-bottom bg-dark text-light text-center p-3">저작권</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html> 

