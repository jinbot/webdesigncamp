<footer id="main_footer">
		<small>법적고지</small>
		<small>개인정보취급방침</small>
		<small>개인정보처리방침</small>

		<address>
			사업자번호: 228-81-03754
			상호명: (주)아이엔에스컴퍼니
			대표자: 김형주
			통신판매업 신고: 제2016-인천중구-0617호<br/>
			개인정보관리책임자: 김동호
			상담전화: 1588-2600
			사업장주소: 인천광역시 중구 개항로 49(내동,INS 6층) (주)아이엔에스컴퍼니<br/>
			E-mail: master@comeins.com
		</address>	
	</footer>

	<script src="/public_html/script/slide.js"></script>
	<script src="/public_html/script/myslider.js"></script>
	<script>
		var slides = $("#slider > div > img");
		var sno = 0;
		var x = 960;
		var y = 640;	
		var slideBtns = {"up":".slide-up","right":".slide-right","down":".slide-down","left":".slide-left"};
		var slider = new Slider(slides, sno, x, y, "right", slideBtns);
		slider.loop("start",2000);
	</script>
</body>
</html>