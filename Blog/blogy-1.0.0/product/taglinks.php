<div class="section search-result-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">Tags: <?php echo htmlspecialchars($_GET['id']); ?></div>
            </div>
        </div>
        <div class="row posts-entry">
            <div class="col-lg-8">

                <?php
                try {

                    $stmt = $db->prepare('SELECT articleId, articleTitle, articleSlug, articleDescrip, articleDate, articleTags FROM techno_blog WHERE articleTags like :articleTags ORDER BY articleId DESC');
                    $stmt->execute(array(':articleTags' => '%' . $_GET['id'] . '%'));
                    while ($row = $stmt->fetch()) {
                        $timestamp = DateTime::createFromFormat('Y-m-d H:i:s', $row['articleDate'])->getTimestamp();
                        echo '<div>';
                        echo '<h1><a href="./index.php?pages=index&action=deltal&id=' . $row['articleSlug'] . '">' . $row['articleTitle'] . '</a></h1>';
                        echo "Thời gian đăng bài viết là: " . time_ago($timestamp);

                        $stmt2 = $db->prepare('SELECT categoryName, categorySlug FROM techno_category, techno_cat_links WHERE techno_category.categoryId = techno_cat_links.categoryId AND techno_cat_links.articleId = :articleId');
                        $stmt2->execute(array(':articleId' => $row['articleId']));

                        $catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                        $links = array();
                        foreach ($catRow as $cat) {
                            $links[] = "<a href='./index.php?pages=index&action=category&id=" . $cat['categorySlug'] . "'>" . $cat['categoryName'] . "</a>";
                        }

                        echo '</p>';
                        echo '<p>Tagged as: ';
                        $links = array();
                        $parts = explode(',', $row['articleTags']);
                        foreach ($parts as $tags) {
                            $links[] = "<a href='./index.php?pages=index&action=tag&id=" . $tags . "'>" . $tags . "</a>";
                        }
                        echo implode(", ", $links);
                        echo '</p>';
                        echo '<p>' . $row['articleDescrip'] . '</p>';
                        echo '<p><button class="readbtn"><a href="./index.php?pages=index&action=deltal&id=' . $row['articleSlug'] . '">Đọc ngay</a></button></p>';


                        echo '</div>';
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                ?>

                <div class="row text-start pt-5 border-top">
                    <div class="col-md-12">
                        <div class="custom-pagination">
                            <span>1</span>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <span>...</span>
                            <a href="#">15</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 sidebar">

                <div class="sidebar-box search-form-wrap mb-4">
                    <form action="#" class="sidebar-search-form">
                        <span class="bi-search"></span>
                        <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                    </form>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
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
                        <!-- <ul>
							<li>
								<a href="">
									<img src="images/img_1_sq.jpg" alt="Image placeholder" class="me-4 rounded">
									<div class="text">
										<h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
										<div class="post-meta">
											<span class="mr-2">March 15, 2018 </span>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="">
									<img src="images/img_2_sq.jpg" alt="Image placeholder" class="me-4 rounded">
									<div class="text">
										<h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
										<div class="post-meta">
											<span class="mr-2">March 15, 2018 </span>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="">
									<img src="images/img_3_sq.jpg" alt="Image placeholder" class="me-4 rounded">
									<div class="text">
										<h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
										<div class="post-meta">
											<span class="mr-2">March 15, 2018 </span>
										</div>
									</div>
								</a>
							</li>
						</ul> -->
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        <li><a href="#">Food <span>(12)</span></a></li>
                        <li><a href="#">Travel <span>(22)</span></a></li>
                        <li><a href="#">Lifestyle <span>(37)</span></a></li>
                        <li><a href="#">Business <span>(42)</span></a></li>
                        <li><a href="#">Adventure <span>(14)</span></a></li>
                    </ul>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Tags</h3>
                    <ul class="tags">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Adventure</a></li>
                        <li><a href="#">Food</a></li>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Freelancing</a></li>
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Adventure</a></li>
                        <li><a href="#">Food</a></li>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Freelancing</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>