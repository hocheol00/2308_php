<template>
<!-- Main -->
	<div id="main">
		<div class="inner">
			<header>
				<h1>놓칠 수 없는 이야기<br />
					편안하고 우아한 무드<a href="http://html5up.net"></a></h1>
				<p>"요즘 감성, 요즘 가구"는 현대적이고 세련된 감성을 반영한 가구를 의미합니다. 이러한 가구는 디자인과 기능성을 결합하여 삶의 편리함과 아름다움을 동시에 제공합니다. 요즘 감성 가구는 트렌디하면서도 실용적인 솔루션을 제공하여 사용자의 삶을 더 풍요롭게 만듭니다.</p>
			</header>
			<section class="tiles">
				<article class="style1">
					<span class="image">
						<img src="images/pic01.jpg" alt="" />
					</span>
					<router-link to="/detail/1">
						<h2>침실가구</h2>
						<div class="content">
							<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
						</div>
					</router-link>
				</article>
				<article class="style2">
					<span class="image">
						<img src="images/pic02.jpg" alt="" />
					</span>
					<router-link to="/detail/2">
						<h2>거실가구</h2>
						<div class="content">
							<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
						</div>
					</router-link>
				</article>
				<article class="style3">
					<span class="image">
						<img src="images/pic03.jpg" alt="" />
					</span>
					<router-link to="/detail/3">
						<h2>주방가구</h2>
						<div class="content">
							<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
						</div>
					</router-link>
				</article>
			</section>
		</div>
	</div>
</template>
<script>
export default {
	name: 'MainComponent',
}
</script>
<style>
	
</style>