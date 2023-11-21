<template>
<!-- <div class="bg_black" v-if="modalFlg">
<div class="bg_white">
<img :src="products[id].img" :style="img_size" alt="img">
<h4>{{ products[id].Name }}</h4>
<p>{{ products[id].content }}</p>
<p>{{ products[id].price }}</p>
<p>{{ products[id].reportCnt }}</p>
<button @click="$emit('closeModal')">닫 기</button>
</div>
</div> -->


<!-- 선생님 방법 -->
	<div class="bg_black">
		<div class="bg_white">
		<img :src="data.img" :style="imgdata" alt="img">
		<br>
			<h4>{{ data.Name }}</h4>
			<p>{{ data.content }}</p>
			<p>{{ data.price }}</p>
			<input type="text" v-model="productCnt">
			<p>총 가격 : {{ productCnt * data.price }} 원</p>
			<p>신고 수 : {{ data.reportCnt}}</p>
			<button class="close" type="button" @click="$emit('closeModal')">닫기</button>
		</div>
	</div>

</template>
<script>
export default {
	name: 'Modal',
	data() {
		return {
			productCnt: 0,
		}
	},
	// watch : data를 감시하는 함수를 정의하는 영역
	// 함수명은 감시하고 싶은 데이터바인딩명과 동일 해야합니다
	
	watch: {
		// if문으로 0개이하 10개 이상 막는 함수
		// productCnt(input) {
		// 	if(input > 10) {
		// 		alert('안돼!');
		// 		this.productCnt = 10;
		// 	} else if(input < 0) {
		// 		alert('안돼!');
		// 		this.productCnt = 0;
		// 	}
		// }
		productCnt(input) {
			if(input > 10) return alert('안돼!'), this.productCnt = 10;
			if(input < 0) this.productCnt = 0;
		}


	},


	props: {
		data: Object,
		imgdata: String,
	}
}
</script>
<style lang="">
	
</style>