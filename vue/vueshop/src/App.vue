<template>
  <img alt="Vue logo" src="./assets/logo.png">
  
  <!-- 헤더 -->
  <div class="nav">
    <!-- <a href="#">홈</a> 
    <a href="#">상품</a>
    <a href="#">기타</a> -->
    
    <!-- for문 사용 (반복문) -->
    <!-- 컴포넌트로 이관 -->
    <Header :data="navList"></Header>
    <!-- <a v-for="item in navList" :key="item">{{ item }}</a> -->

    <!-- div로 연습 해봄 / key가 필요할때 key값 같이 정해주기 -->
    <!-- <div v-for="(item, i) in navList" :key="i">{{ i + ':' + item }}</div> -->
  </div>

  <!-- 할인 배너 -->
  <Discount></Discount>
  <!-- 컴포넌트로 이관 -->
<!-- <div class="discount">
  <p>지금 당장 구매하시면, 30% 할인</p>
</div> -->

  <!-- 모달 -->
  <!-- 이관 -->
  <Transition name="modalAni">
  <modal
  v-if="modalFlg"
  :data = "modalproducts"
  :imgdata = "img_size"
  @closeModal ="modalClose">
  </modal>
    <!-- <div class="bg_black" v-if="modalFlg">
        <div class="bg_white">
          <img :src="products[id].img" :style="img_size" alt="img">
          <h4>{{ products[id].Name }}</h4>
          <p>{{ products[id].content }}</p>
          <p>{{ products[id].price }}</p>
          <p>{{ products[id].reportCnt }}</p>
        <button @click="modalClose()">닫 기</button>
        </div>
    </div> -->
</Transition> 
<!-- 선생님 방법 -->
  <!-- <div class="bg_black" v-if="modalFlg">
    <div class="bg_white">
      <h4>{{ modalproducts.Name }}</h4>
      <p>{{ modalproducts.content }}</p>
      <p>{{ modalproducts.price }}</p>
      <p>신고 수 : {{ modalproducts.reportCnt}}</p>
      <button class="close" type="button" @click="modalFlg = false">닫기</button>
    </div>
  </div> -->

  <!-- 상품 리스트 -->
  <div>
    <div>
      <h4 :style="sty_color_red">티셔츠</h4>
      <p :style="sty_color[2]">24000 원</p>
    </div>
    <!-- <div>
      <h4>{{ products[0] }}</h4>
      <p :style="sty_color_red">{{prices[0]}}</p>
    </div>
    <div>
      <h4>{{ products[1] }}</h4>
      <p :style="sty_color_blue">{{ prices[1] }} 원</p>
    </div>
    <div>
      <h4>{{ products[2] }}</h4>
      <p :style="sty_color_blue">{{ prices[2] }} 원</p>
    </div> -->

    <!-- for문 사용 -->
    <!-- <div>
      <div v-for="(item, i) in products" :key="i">
          <h4 @click="modalFlg = true, id=i" >{{ item.Name }}</h4>
          <p>{{ item.price }}</p>
          <button @click="plusOne(i)">허위 매물 신고</button>
          <span>신고수 : {{ item.reportCnt }}</span>
      </div>
    </div> -->
    
      <!-- for문 사용한 모달창 띄웠을대 보인는 값 선생님 방법 -->
      <!-- 컴포넌트 이관 -->
    <div>
      <Products
          v-for="(item, i) in products" :key="i"
          :data = "item"
          :productKey = "i"
          @OpenModal ="modalOpen"
          @OnePlus ="plusOne">
      </Products>
    </div>
    
      <!-- <div>
    <div v-for="(item, i) in products" :key="i">
      <h4 @click="modalOpen(item);" :style="sty_color_blue">{{ item.Name }}</h4> 
      <p>{{ item.price }}</p>
        <button @click="plusOne(i)">허위 매물 신고</button><br>
        <span>신고 수 : {{ item.reportCnt }}</span>
    </div>
  </div> -->


  </div>
</template>

<script>
import data from './assets/js/data.js';

import Discount from './components/Dicount.vue';
import Header from './components/Header.vue';
import Modal from './components/Modal.vue';
import Products from './components/Products.vue';

export default {
  name: 'App',

  // 데이터 바인딩 (데이터 저장소) : 우리가 사용할 데이터를 저장하는 공간
  data() {
    return {
      navList: ['홈', '상품', '기타', '문의'],
      prices : ['품절', '20000', '30000'],
      sty_color_red: 'color: red',
      img_size: 'width: 400px; height: 500px;',
      // sty_color_blue: 'color: blue; font-size : 100px', css 여러개 주는법
      sty_color_blue: 'color: blue',
      sty_color: ['color: blue', 'color: red', 'color: green'],
      // products : ['여중기', '바지', '반바지'],
      products: data,

      // modalproducts:{},
      // products: [
      //   '여중기', '품절',
      //   '바지', '24000',
      //   '반바지', '30000'
      // ]

      // reportCnt: 0,
      id: null,
      modalFlg: false, // true 모달생성, flase 모달 생성x 클릭이벤트 이용해서 응용
    }
  },

  // methods() : 함수를 정의하는 영역
  // 함수로 카운트 올리는 방법
  methods: {
    plusOne(i) {
      this.products[i].reportCnt++;
    },

    modalOpen(item) {
      this.modalFlg = true;
      this.modalproducts = item;
    },


    modalClose() {
        this.modalFlg = false;
      }
  },
    // components : 컴포넌트를 등록하는 영역 (다른 뷰 파일을 사용할려면 등록하기)
    components: {
    Discount,
    Header,
    Modal,
    Products,
  }
    // 함수사용하는 모달 창띄우기 쌤 방법
    // modalOpen(item) {
    //   this.modalFlg = true;
    //   this.modalproducts = item;
    // },
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
/* css 이관 */
/* .nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}
.nav a {
  color: #fff;
  padding: 10px;
  text-decoration: none;
} */
/* .nav div {
  color: #fff;
  padding: 10px;
  display: inline-block;
} */


</style>
