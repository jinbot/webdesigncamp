
	<section id="slider">
		<div>
			<img src="/public_html/images/slide1.jpg" width="960" height="640" alt="슬라이드 이미지" />
			<img src="/public_html/images/slide2.jpg" width="960" height="640" alt="슬라이드 이미지" />
			<img src="/public_html/images/slide3.jpg" width="960" height="640" alt="슬라이드 이미지" />
			<img src="/public_html/images/slide4.jpg" width="960" height="640" alt="슬라이드 이미지" />
			<img src="/public_html/images/slide5.jpg" width="960" height="640" alt="슬라이드 이미지" />
		</div>
		<h1>환영합니다! 한국대학교 동문여러분</h1>
		<span class="slide-btn slide-left" id="slideLeft">&lsaquo;</span>
		<span class="slide-btn slide-right" id="slideRight">&rsaquo;</span>
		<span class="slide-btn slide-up" id="slideUp">&lsaquo;</span>
		<span class="slide-btn slide-down" id="slideDown">&rsaquo;</span>
	</section>

	<section id="contents_wrapper">
		<article id="notices">
			<h2>공지 사항 
				<a href="#" class="btn-write btn btn-primary">
					<span class="glyphicon glyphicon-pencil"></span>
					글쓰기
				</a>
			</h2>
			<div id="newslist"></div>
		</article>

		<article id="ad_contents_wrapper">
			<h2>파트너</h2>
			<img src="/public_html/images/파트너.jpg" alt="파트너 광고" /><br/>

			<strong>능력을 담다 희망을 담다</strong>
			<ul>
				<li>- 센서알고리즘 개발</li>
				<li>- 인공지능 로봇연구</li>
				<li>- 전자보안제품 생산</li>
			</ul>
		</article>

		<article id="icon_contents_wrapper">

		</article>
	</section>

	
	<div id="newsview">
		
		<h1 id="newstitle"></h1>
		<p id= "newscontent"></p>
		<p id="newsdate"></p>
	</div>
	<div id="newswrite">
		<form onsubmit="return false">
			<input type="hidden" name="act" id="act" >
			<input type="hidden" name="id" id="id" >
			<div class="form-group">	
				<input type="text" name="title" id="title" placeholder="제목을 입력하세요." class="form-control">
			</div>
			<div class="form-group">	
				<textarea name="content" id="content" rows="5" class="form-control" placeholder="본문을 입력하세요."></textarea>
			</div>
		</form>
	</div>
