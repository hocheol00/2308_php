// vuex 기본형태
import { createStore } from 'vuex';
import axios from 'axios'; //ajax통신을 위한 라이브러리 기술
import router from './router';

const store = createStore({
    state() { // state : data 저장영역
        return {
          boardData: [], // 게시글 저장용
          flgTapUI: 0, // 탭ui용 플래그
          // BoardId: null,
          saveData: {},
        }
    },
    // mutations : 데이터 수정용 함수 저장 영역
    // state에 작성시 mutations 필수 작성
    mutations: {
      // 초기 데이터 셋팅(라라벨에서 받은)
      setBoardList(state, data) { //mutations 첫번째 파라미터 state(data 지정영역 이름고정)
        state.boardData = data;
        // state.BoardId = id;
      },
      //  탭ui 셋팅요
		setFlgTapUI(state, num) {
			state.flgTapUI = num;
    },
    loginSubmit(state, saveData) {
      saveData.userId = this.userId;
      saveData.userPassword = this.userPassword;
		},

    },
    // actions : ajax로 서버에 데이터를 요청할 때 or 시간 함수 등 비동기 처리 정의
    actions: {
      actionGetBoardList(context, paramsId) {
        const url = "/api/boards/"+ paramsId;
        axios.get(url)
        .then(res => {
          context.commit('setBoardList', res.data);
          // console.log(res.data);
        })
        .catch(err => {
          console.log(err);
        })
      },

      actionLogin(context) {
        let id = document.querySelector('#email').value;
			  let pw = document.querySelector('#password').value;

        const url = "/api/login"
        const header = {
          headers: {
              "Content-Type": 'application/json',
          },
        }
        // stringfy로 js배열이나 객체를 json형태로 바꿀수 있을걸여~?
        const formData = new FormData();
        formData.append('email', id)
        formData.append('password', pw)

        axios.post(url,formData,header)
        .then(res => {
          console.log(res.data.data);
          
        })
        .catch(err => {
          console.log(err);
        })
      }
    }
});

export default store;