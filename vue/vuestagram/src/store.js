import { createStore } from 'vuex';
import axios from 'axios';


const store = createStore({
	//state() : data를 저장하는 영역
	state() {
		return {
			boardData: [], // 게시글 저장용
			flgTapUI: 0, // 탭ui용 플래그
			imgURL: '',
			postFileData: null,
			lastBoardId: 0, // 가장 마지막 로드 된 게시글 번호 저장용
			flgBtnMoreView: true, // 더보기 버튼 활성여부 플래그
		}
	},
	// mutations : 데이터 수정용 함수 저장 영역
	mutations: {
		// 초기 데이터 셋팅용
		setBoardList(state, data) { //mutations 첫번째 파라미터 state(data 지정영역 이름고정)
			state.boardData = data;
			state.lastBoardId = data[data.length - 1].id; // 제일 마지막
		},
		//  탭ui 셋팅요
		setFlgTapUI(state, num) {
			state.flgTapUI = num;
		},
		setImgURL(state, url) {
			state.imgURL = url;
		},
		setPostFileData(state, file) {
			state.postFileData = file;
		},
		// 작성 된 글 삽입용
		setUnshiftBoard(state, data) {
			state.boardData.unshift(data);
			// unshift 배열 내 데이터를 [0] 방 부터 추가 삽입
		},
		// 작성 후 최기화 처리
		setClearAddData(state) {
			state.imgURL = '';
			state.postFileData = null;
		},
		// 더보기 버튼
		setPushBoard(state, data) {
			state.boardData.push(data);
			console.log(data);
			state.lastBoardId = data.id;
		},
		// 더보기 버튼 활성화
		setflgBtnMoreView(state, boo) {
			state.flgBtnMoreView = boo;
		}
	},
	// actions: ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의 , 외부에서 받아오는데이터
	actions: {
		// 초기 게시글 데이터 획득 ajax 처리
		actionGetBoardList(context) { // actions 첫번째 파라미터 context 이름 고정
			const url = 'http://112.222.157.156:6006/api/boards';
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat'
				}
			};
			axios.get(url, header)
			.then(res => {
				// console.log(res.data);
				// console.log(res.status);
				context.commit('setBoardList', res.data); // mutations 호출 할때 commit으로 호출 (보드에, data 사용)
			})
			.catch(err => {
				console.log(err);
			})
		},
		// 글작성 처리
		actionPostBoardAdd(context) {
			const url = 'http://112.222.157.156:6006/api/boards';
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat',
					'Content-Type' : 'multipart/form-data',
				}
			};
			const data = {
				name: '호처리',
				img: context.state.postFileData,
				content: document.getElementById('content').value,
			};
		axios.post(url, data, header)
			.then(res => {
				// 작성글 데이터 저장
				context.commit('setUnshiftBoard', res.data);
				// 리스트 UI로 전환
				context.commit('setFlgTapUI', 0);
				// 작성 후 초기화 처리
				context.commit('setClearAddData');
			})
			.catch(err => {
				console.log(err);
			});
		},
		// 더보기 버튼
		actionGetBoardplus(context){
			const url = 'http://112.222.157.156:6006/api/boards/' + context.state.lastBoardId;
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat',
				}
			};
			axios.get(url, header)
			.then(res => {
				if(res.data) {
					context.commit('setPushBoard', res.data);
				} else {
					context.commit('setflgBtnMoreView', false);
				}
			})
			.catch(err => {
				console.log(err);
			})
		} 

	}
});

export default store;