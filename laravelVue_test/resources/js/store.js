// vuex 기본형태
import { createStore } from 'vuex';
// import axios from 'axios'; //ajax통신을 위한 라이브러리 기술

const store = createStore({
    state() { // state : data 저장영역
        return {
          boardData: [], // 게시글 저장용
        }
    },
    // mutations : 데이터 수정용 함수 저장 영역
    // state에 작성시 mutations 필수 작성
    mutations: {
		// 초기 데이터 셋팅(라라벨에서 받은)
		setBoardList(state, data) { //mutations 첫번째 파라미터 state(data 지정영역 이름고정)
			state.boardData = unshift(data);
    },
    // actions : ajax로 서버에 데이터를 요청할 때 or 시간 함수 등 비동기 처리 정의
    actions: {

    }
  }
});

export default store;