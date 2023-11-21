<template>
  <img alt="Vue logo" src="./assets/logo.png">



<!-- 자세히 모달 -->
<div class="bg_black" v-if="modalFlg">
  <div class="bg_white">
    <h3>{{modalproducts.name}}</h3>
    <p>{{modalproducts.characteristic}}</p>
    <p>{{modalproducts.main_line}}</p>
    <h4>{{modalproducts.price}}</h4>
    <button @click="modalFlg = false">취 소</button>
  </div>
</div>
  

<!-- list for 문 -->
<div>
  <div v-for="(item, i) in products" :key="i">
    <h3>{{item.name}}</h3>
    <p>{{item.characteristic}}</p>
    <p>{{item.main_line}}</p>
    <h4>{{item.price}}</h4>
    <button @click="modalOpen(item)">자세히</button>
  </div>
</div>


</template>

<script>


export default {
  


  // 데이터 바인딩
  data() {
    return {

      products: [
        {name: '그웬', characteristic: '전사', main_line: 'TOP', price: '1350' },
        {name: '갱플랭크', characteristic: '전사,', main_line: 'TOP', price: '3150' },
        {name: '문도', characteristic: '탱커', main_line: 'TOP', price: '450' },
      ],

      modalFlg: false,
      id: null,
    } 
  },

  methods: {
    modalOpen(item) {
      this.modalFlg = true;
      // this.modalproducts = item;
      this.modalproducts = item;
    },

   modalClose() {
      this.modalFlg = false;
    }
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

.bg_black {
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 0.7);
	position: fixed;
	top: 0;
	right: 0;
}

.bg_white {
	width: 80%;
	background-color: #fff;
	padding: 20px;
	margin: 20px auto;
	border-radius: 10px;
}
</style>
