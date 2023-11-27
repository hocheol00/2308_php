<template>
  <!-- 헤더 -->
  <div class="header">
    <ul>
      <li
        v-if="$store.state.flgTapUI !== 0"
        @click="listGo()"
        class="header-button header-button-left">취소</li>
      <li><img class="logo" alt="Vue logo" src="./assets/logo.png"></li>
      <li
        v-if="$store.state.flgTapUI === 1"
        @click="addBoard()"
        class="header-button header-button-right">작성</li>
    </ul>
  </div>
  <!-- <p>{{ $store.state.phptest }}</p>스토어.js 데이터 불러오기도 가능 -->
  <!-- 컨테이너 -->
  <ContainerComponent></ContainerComponent>

  <!-- 더보기 버튼 -->
  <button
      @click="actionGetBoardplus()"
      v-if="$store.state.flgBtnMoreView && $store.state.flgTapUI === 0">더보기</button>

  <!-- 푸터 -->
  <div class="footer">
    <div class="footer-button-store">
      <label for="file" class="label-store">+</label>
      <input @change="updateImg" accept="image/*" type="file" id="file" class="input-file">
    </div>
  </div>

</template>

<script>
import ContainerComponent from './components/ContainerComponent.vue'

export default {
  name: 'App',
  created() {
    // sotre의 action 호출
    this.$store.dispatch('actionGetBoardList');
    // 1. [APP]store 접근 위해 this 사용
    // 2. [store]store 접근하여 dispatch 메소드 사용하여 action 영역 내 actionGetBoardList 메소드 호출
    // 2-1. actionGetBoardList(context) : store 접근용으로 고정 파라미터 context 설정
    // 2-2. url 선언, header 선언(권한 여부)
    // 2-3. axios.get : get메소드 axios(서버&DB 송수신)
    // 2-4. array 내 객체로 데이터 전송 받은 데이터를 res.data에 저장
    // 2-5. store 접근, mutation 영역 내 setBoardList 메소드 호출하여 res.data 파라미터로 전달
    // 2-6. setBoardList(state, data) : state 접근용으로 고정 파라미터 state 설정, 두번째 파라미터 res.data 전달
    // 2-7. state 접근, boardData : [] 내 res.data 저장
    // 2-8. state 접근, lastBoardId: 0 내 array로 넘어온 객체 총 3개, 길이3-1=2/ data[2].id 인덱스 2번의 id 값이 저장
    // App 상속받는 ContainerComponent, ContainerComponent 상속받는 PostComponent 내 for문 실행
    // [PostComponent]res.data 저장한 boardData img, likes, name, content, created_at 출력
  },
  methods: {
    updateImg(e) {
      const file = e.target.files;
      const imgURL = URL.createObjectURL(file[0]); //브라우저에 임시저장
      // 작성 영역에 이미지를 표시하기위한 데이터 저장
      this.$store.commit('setImgURL', imgURL);
      // 작성 처리시 보낼 파일 데이터 저장
      this.$store.commit('setPostFileData', file[0]);
      // 작성 UI 변경을 위한 플래그 수정
      this.$store.commit('setFlgTapUI', 1);
      
      // 이벤트 타켓 초기화
      e.target.value = '';
    },
    listGo() {
      this.$store.commit('setFlgTapUI', 0);

    },
    // 글 작성 처리
    addBoard() {
      // 글작성 처리 호출
      this.$store.dispatch('actionPostBoardAdd'); // actions를 호출하기위한 메소드dispatch사용
    },
    //더보기 버튼
    actionGetBoardplus() {
      this.$store.dispatch('actionGetBoardplus');
    },
  },
  components: {
    ContainerComponent,
  }
}
</script>

<style>
@import url('./assets/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
