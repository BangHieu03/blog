<body data-logged-in="<?php echo isset($_SESSION['user_info']) ? 'true' : 'false'; ?>">
	<section class="section bg-light">
		<div class="container d-flex justify-content-center align-items-center" style="background-color: #3D5662; max-width: 100%;">
			<img src="/images/banner.png" class="img-fluid" alt="" style="height: 597px; background-color: #3D5662; width: 100%;">
		</div>
	</section>
	
	<!-- End retroy layout blog posts -->
	<div id="myPopup" class="popup">
		<div class="popup-content">
			<span class="close">×</span>
			<h2>Cùng nhau chia sẽ trên</h2>
			<img src="./blogy-1.0.0/favicon.png" alt="Logo" style="width:200px;height:200px;">
			<hr>
			<p>Đăng nhập hoặc đăng ký</p>
			<button onclick="window.location.href='./index.php?pages=login&action=home'">Đăng nhập</button>
			<span><a href="./index.php?pages=login&action=fogot"></a></span>
			<button onclick="window.location.href='./index.php?pages=register&action=home'">Đăng ký</button>
		</div>
	</div>


	<!--Start crossbar layout blog posts -->
	<nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					<div class="row g-0 align-items-center">
						<div class="col-5 text-center">
							<ul class="text-start site-menu mx-auto">
								<li><a href="#">Đang theo dõi <span class="position-absolute top-5 start-20 translate-middle p-2 bg-danger border border-light rounded-circle">
											<span class="visually-hidden">New alerts</span>
										</span></a></li>
								<li><a href="#">Mới nhất<span class="position-absolute top-5 start-20 translate-middle p-2 bg-danger border border-light rounded-circle">
											<span class="visually-hidden">New alerts</span>
										</span></a></li>
								<li><a href="#">Series</a></li>
							</ul>
						</div>
						<div class="col-1 text-center">
							<button type="button" class="btn btn-primary btn-lg"><a href="./index.php?pages=post&action=home">Viết bài</a></button>
						</div>
						<div class="col-5 text-center">
							<ul class="text-start site-menu mx-auto">
								<li><a href="#">Video</a></li>
								<li><a href="#">Trending</a></li>
								<li><a href="#">Bài viết đã lưu</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<!-- End  crossbar layout blog posts -->

	<div class="menu-bg-wrap">
		<div class="site-navigation">
			<div class="row g-0 align-items-center" style="background-color: #3D5662;">
				<div class="m-3 text-center">
					<h5><a class="text-light" href="https://www.facebook.com/groups/895365322303983" target="_blank"> >>Tham gia facebook group "PolyBlog" cùng nhau chia sẽ câu chuyện của mình<< </a>
					</h5>
				</div>
			</div>
		</div>
	</div>
	<div id="chatbot" class="chatbox">
		<div class="chat-header">
			<h2>ChatGPT</h2>
		</div>
		<div class="chat-content" id="chatContent">
			<!-- Messages will be added here -->
		</div>
		<div class="chat-footer">
			<input type="text" id="userInput" placeholder="Type your message...">
			<button id="sendBtn">Send</button>
		</div>
	</div>
	<!-- Start posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-5 d-flex align-items-center">
				<div class="col-sm-4">
					<h2 class="posts-entry-title">Mới nhất</h2>
				</div>
				<div class="col-sm-3 ms-auto text-sm-end ">
					<i class="fa-sharp fa-solid fa-list fa-2xl me-4" style="color: #757575;"></i>
					<i class="fa-sharp fa-solid fa-newspaper fa-2xl" style="color: #757575;"></i>
				</div>
				<div class="col-sm-4 text-sm-end">
					<a href="./index.php?pages=category&action=home" class="read-more">Xem tất cả</a>
				</div>
			</div>
			<div class="container">
				<div class="row g-3">
					<div class="col-md-9">
						<div class="card mb-4">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-2">
										<img class="rounded-circle" src="avatar.png" alt="Avatar người dùng">
									</div>
									<div class="col-lg-10">
										<h5 class="card-title">Tiêu đề bài viết</h5>
										<h6 class="card-subtitle mb-2 text-muted">Đăng bởi: Tên người đăng</h6>
										<p class="card-subtitle mb-2 text-muted">Ngày đăng, Thời gian đăng</p>
										<p class="card-text">Nội dung bài viết...</p>
										<a href="#" class="btn btn-primary">Đọc thêm</a>
									</div>
								</div>
							</div>
						</div>
						<!-- Thêm các bài viết khác tại đây -->
					</div>
					<div class="col-md-3">
						<ul class="list-unstyled blog-entry-sm">
							<li>
								<span class="date">Apr. 14th, 2022</span>
								<h3><a href="single.html">Don’t assume your user data in the cloud is safe</a></h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore
									vel voluptas.</p>
								<p><a href="#" class="read-more">Continue Reading</a></p>
							</li>
							<li>
								<span class="date">Apr. 14th, 2022</span>
								<h3><a href="single.html">Don’t assume your user data in the cloud is safe</a></h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore
									vel voluptas.</p>
								<p><a href="#" class="read-more">Continue Reading</a></p>
							</li>
							<li>
								<span class="date">Apr. 14th, 2022</span>
								<h3><a href="single.html">Don’t assume your user data in the cloud is safe</a></h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore
									vel voluptas.</p>
								<p><a href="#" class="read-more">Continue Reading</a></p>
							</li>
							<!-- Thêm các mục khác tại đây -->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End posts-entry -->

	<!-- Start posts-entry -->
	<section class="section posts-entry posts-entry-sm bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-3">
					<div class="blog-entry">
						<a href="single.html" class="img-link">
							<img src="images/img_1_horizontal.jpg" alt="Image" class="img-fluid">
						</a>
						<span class="date">Apr. 14th, 2022</span>
						<h2><a href="single.html">Thought you loved Python? Wait until you meet Rust</a></h2>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						<p><a href="#" class="read-more">Continue Reading</a></p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="blog-entry">
						<a href="single.html" class="img-link">
							<img src="images/img_2_horizontal.jpg" alt="Image" class="img-fluid">
						</a>
						<span class="date">Apr. 14th, 2022</span>
						<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						<p><a href="#" class="read-more">Continue Reading</a></p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="blog-entry">
						<a href="single.html" class="img-link">
							<img src="images/img_3_horizontal.jpg" alt="Image" class="img-fluid">
						</a>
						<span class="date">Apr. 14th, 2022</span>
						<h2><a href="single.html">UK sees highest inflation in 30 years</a></h2>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						<p><a href="#" class="read-more">Continue Reading</a></p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="blog-entry">
						<a href="single.html" class="img-link">
							<img src="images/img_4_horizontal.jpg" alt="Image" class="img-fluid">
						</a>
						<span class="date">Apr. 14th, 2022</span>
						<h2><a href="single.html">Don’t assume your user data in the cloud is safe</a></h2>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						<p><a href="#" class="read-more">Continue Reading</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End posts-entry -->

	<!-- Start posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">NỖI BẬT</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>
			<div class="row g-3">
				<div class="col-md-9 order-md-2">
					<div class="row g-3">
						<div class="col-md-6">
							<div class="blog-entry">
								<a href="single.html" class="img-link">
									<img src="images/img_1_sq.jpg" alt="Image" class="img-fluid">
								</a>
								<span class="date">Apr. 14th, 2022</span>
								<h2><a href="single.html">Thought you loved Python? Wait until you meet Rust</a></h2>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis
									inventore vel voluptas.</p>
								<p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="blog-entry">
								<a href="single.html" class="img-link">
									<img src="images/img_2_sq.jpg" alt="Image" class="img-fluid">
								</a>
								<span class="date">Apr. 14th, 2022</span>
								<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis
									inventore vel voluptas.</p>
								<p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<ul class="list-unstyled blog-entry-sm">
						<li>
							<span class="date">Apr. 14th, 2022</span>
							<h3><a href="single.html">Don’t assume your user data in the cloud is safe</a></h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore
								vel voluptas.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</li>

						<li>
							<span class="date">Apr. 14th, 2022</span>
							<h3><a href="single.html">Meta unveils fees on metaverse sales</a></h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore
								vel voluptas.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</li>

						<li>
							<span class="date">Apr. 14th, 2022</span>
							<h3><a href="single.html">UK sees highest inflation in 30 years</a></h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore
								vel voluptas.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">TỔNG HỢP</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>

			<div class="row">
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="images/img_7_horizontal.jpg" alt="Image" class="img-fluid"></a>
						<div class="excerpt">


							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="images/img_6_horizontal.jpg" alt="Image" class="img-fluid"></a>
						<div class="excerpt">


							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="images/person_2.jpg" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="images/img_5_horizontal.jpg" alt="Image" class="img-fluid"></a>
						<div class="excerpt">


							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="images/person_3.jpg" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>


				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="images/img_4_horizontal.jpg" alt="Image" class="img-fluid"></a>
						<div class="excerpt">


							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="images/person_4.jpg" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="images/img_3_horizontal.jpg" alt="Image" class="img-fluid"></a>
						<div class="excerpt">


							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="images/person_5.jpg" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="images/img_2_horizontal.jpg" alt="Image" class="img-fluid"></a>
						<div class="excerpt">


							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="images/person_4.jpg" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>


				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="images/img_1_horizontal.jpg" alt="Image" class="img-fluid"></a>
						<div class="excerpt">


							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="images/person_3.jpg" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="images/img_4_horizontal.jpg" alt="Image" class="img-fluid"></a>
						<div class="excerpt">



							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="images/person_2.jpg" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="images/img_3_horizontal.jpg" alt="Image" class="img-fluid"></a>
						<div class="excerpt">



							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="images/person_5.jpg" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
</body>
<script>
	document.getElementById('sendBtn').addEventListener('click', function() {
		var userInput = document.getElementById('userInput').value;
		$.ajax({
			url: 'http://blog.com/index.php?pages=index&action=home',
			type: 'POST',
			headers: {
				'Authorization': 'Bearer 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',
				'Content-Type': 'application/json'
			},
			data: JSON.stringify({
				'prompt': userInput,
				'max_tokens': 60
			}),
			success: function(data) {
				var chatContent = document.getElementById('chatContent');
				var response = data.choices[0].text;
				chatContent.innerHTML += '<p>User: ' + userInput + '</p>';
				chatContent.innerHTML += '<p>Chatbot: ' + response + '</p>';
			}
		});
	});
</script>