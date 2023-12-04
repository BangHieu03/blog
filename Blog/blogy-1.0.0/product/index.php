<section class="section bg-light">
	<div class="container d-flex justify-content-center align-items-center" style="background-color: #3D5662; max-width: 100%;">
		<img src="/images/banner.png" class="img-fluid" alt="" style="height: 597px; background-color: #3D5662; width: 100%;">
	</div>
</section>
<!-- End retroy layout blog posts -->
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

									<?php
									define("PER_PAGE_LIMIT", 7); //Set blog posts limit
									$searching = '';
									if (!empty($_POST['search']['keyword'])) {
										$searching = $_POST['search']['keyword'];
									}
									/* PHP Blog Search*/
									$search_query = 'SELECT * FROM  techno_blog WHERE articleTitle LIKE :keyword OR articleDescrip LIKE :keyword OR articleTags LIKE :keyword OR articleContent LIKE :keyword ORDER BY articleId DESC ';

									/* PHP Blog Pagination*/
									$per_page_item = '';
									$page = 1;
									$start = 0;
									if (!empty($_POST["page"])) {
										$page = $_POST["page"];
										$start = ($page - 1) * PER_PAGE_LIMIT;
									}
									$limit = " limit " . $start . "," . PER_PAGE_LIMIT;
									$pagination_stmt = $db->prepare($search_query);
									$pagination_stmt->bindValue(':keyword', '%' . $searching . '%', PDO::PARAM_STR);
									$pagination_stmt->execute();

									$row_count = $pagination_stmt->rowCount();
									if (!empty($row_count)) {
										$per_page_item .= '<div style="text-align:center;margin:0px 0px;">';
										$page_count = ceil($row_count / PER_PAGE_LIMIT);
										if ($page_count > 1) {
											for ($i = 1; $i <= $page_count; $i++) {
												if ($i == $page) {
													$per_page_item .= '<input type="submit" name="page" value="' . $i . '" class="pagination_btn current">';
												} else {
													$per_page_item .= '<input type="submit" name="page" value="' . $i . '" class="pagination_btn">';
												}
											}
										}
										$per_page_item .= "</div>";
									}
									$query = $search_query . $limit;
									$pdo_stmt = $db->prepare($query);
									$pdo_stmt->bindValue(':keyword', '%' . $searching . '%', PDO::PARAM_STR);
									$pdo_stmt->execute();
									$result = $pdo_stmt->fetchAll();
									?>
									<form action="" method="post">
										<div class="search_box"><input type="text" name="search[keyword]" value="<?php echo $searching; ?>" id="keyword" maxlength="30"></div>


										<?php
										if (!empty($result)) {
											foreach ($result as $row) {
										?>

												<?php
												$timestamp = DateTime::createFromFormat('Y-m-d H:i:s', $row['articleDate'])->getTimestamp();
												echo '<h1> <a href="./index.php?pages=index&action=deltal&id=' . $row['articleSlug'] . '">' . $row['articleTitle'] . '</a></h1>';
												echo '<hr>';
												echo "Thời gian đăng bài viết là: " . time_ago($timestamp);
												echo '</p>';
												echo '<p>Thể loại: ';
												$stmt2 = $db->prepare('SELECT categoryName, categorySlug   FROM techno_category, techno_cat_links WHERE techno_category.categoryId = techno_cat_links.categoryId AND techno_cat_links.articleId = :articleId');
												$stmt2->execute(array(':articleId' => $row['articleId']));
												$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);
												$links = array();
												foreach ($catRow as $cat) {

													$links[] = "<a href='./index.php?pages=index&action=category&id=" . $cat['categorySlug'] . "'>" . $cat['categoryName'] . "</a>";
												}
												echo implode(", ", $links);
												echo '</p>';
												echo '<p>Tag: ';

												$links = array();
												$parts = explode(',', $row['articleTags']);
												foreach ($parts as $tags) {
													$links[] = "<a href='./index.php?pages=index&action=tag&id=" . $tags . "'>" . $tags . "</a>";
												}
												echo implode(", ", $links);
												echo '<p>' . $row['articleDescrip'] . '</p>';
												echo '<hr>';
												echo '<p><button class="readbtn"><a href="./index.php?pages=index&action=deltal&id=' . $row['articleSlug'] . '">XEM</a></button></p>';
												echo '<hr>';
												?>

										<?php
											}
										} else {
											echo "Không tìm thấy " . $searching;
										}
										?>
										<table>
											<tbody>
												<tr></tr>
											</tbody>
										</table>
										<?php echo $per_page_item; ?>
								</div>
							</div>
						</div>
					</div>
					<!-- Thêm các bài viết khác tại đây -->
				</div>
				<div class="col-md-3">
					<h2>Bài viết gần đây</h2>
					<?php
					$sidebar = $db->query('SELECT articleTitle, articleSlug FROM techno_blog ORDER BY articleId DESC LIMIT 6');
					while ($row = $sidebar->fetch()) {
						echo '<p></p>';
						echo ' <a href="./index.php?pages=index&action=deltal&id=' . $row['articleSlug'] . '" >' . $row['articleTitle'] . ' </a >';
					}
					?>

					<h2>Categories</h2>

					<?php
					$stmt = $db->query('SELECT categoryName, categorySlug FROM techno_category ORDER BY categoryId DESC');
					while ($row = $stmt->fetch()) {
						echo '<p></p>';
						echo '<a href="./index.php?pages=index&action=category&id=' . $row['categorySlug'] . '">' . $row['categoryName'] . '</a>';
					}
					?>

					<h2>Tags </h2>
					<?php
					$tagsArray = [];
					$stmt = $db->query('select distinct LOWER(articleTags) as articleTags from techno_blog where articleTags != "" group by articleTags');
					while ($row = $stmt->fetch()) {
						$parts = explode(',', $row['articleTags']);
						foreach ($parts as $tag) {
							$tagsArray[] = $tag;
						}
					}

					$finalTags = array_unique($tagsArray);
					foreach ($finalTags as $tag) {
						echo '<p></p>';
						echo "<a href='./index.php?pages=index&action=tag&id=" . $tag . "'>" . ucwords($tag) . "</a>";
					}

					?>
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

<!-- <div class="section bg-light">
	<div class="container">

		<div class="row mb-4">
			<div class="col-sm-6">
				<h2 class="posts-entry-title">Travel</h2>
			</div>
			<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
		</div>

		<div class="row align-items-stretch retro-layout-alt">

			<div class="col-md-5 order-md-2">
				<a href="single.html" class="hentry img-1 h-100 gradient">
					<div class="featured-img" style="background-image: url('images/img_2_vertical.jpg');"></div>
					<div class="text">
						<span>February 12, 2019</span>
						<h2>Meta unveils fees on metaverse sales</h2>
					</div>
				</a>
			</div>

			<div class="col-md-7">

				<a href="single.html" class="hentry img-2 v-height mb30 gradient">
					<div class="featured-img" style="background-image: url('images/img_1_horizontal.jpg');"></div>
					<div class="text text-sm">
						<span>February 12, 2019</span>
						<h2>AI can now kill those annoying cookie pop-ups</h2>
					</div>
				</a>

				<div class="two-col d-block d-md-flex justify-content-between">
					<a href="single.html" class="hentry v-height img-2 gradient">
						<div class="featured-img" style="background-image: url('images/img_2_sq.jpg');"></div>
						<div class="text text-sm">
							<span>February 12, 2019</span>
							<h2>Don’t assume your user data in the cloud is safe</h2>
						</div>
					</a>
					<a href="single.html" class="hentry v-height img-2 ms-auto float-end gradient">
						<div class="featured-img" style="background-image: url('images/img_3_sq.jpg');"></div>
						<div class="text text-sm">
							<span>February 12, 2019</span>
							<h2>Startup vs corporate: What job suits you best?</h2>
						</div>
					</a>
				</div>

			</div>
		</div>

	</div>
</div> -->