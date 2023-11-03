MVC 패턴
	MVC 패턴은 Model, View, Controller의 약자로 소프트웨어 디자인패턴 중 하나입니다.
		- Model : DATE, 정보들의 가공을 책임지는 컴포넌트
		- View : 사용자 인터페이스 요소로, 데이타를 기반으로 사용자들이 볼 수 있는 화면 (js,css)
		- Controller : 모델과 뷰를 연결해주는 다리 역할


4. DataBase
	1) user Table
		-  pk, 아이디, 비밀번호, 이름, 가입일자, 탈퇴일자, 수정일자
	2) board(게시판) table
		- pk, 유저pk, 게시판타입, 제목, 내용, 이미지파일, 작성일자, 수정일자, 삭제일자
	3) boardname(게시판 기본 정보) table


	//암호화 echo base64_encode('12345678');