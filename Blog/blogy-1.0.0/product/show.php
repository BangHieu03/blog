<?php require('./includes/config.php');

$stmt = $db->prepare('SELECT articleId,articleDescrip, articleSlug ,articleTitle, articleContent, articleTags, articleDate  FROM techno_blog WHERE articleSlug = :articleSlug');
$stmt->execute(array(':articleSlug' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if ($row['articleId'] == '') {
    header('Location: ./');
    exit;
}
?>

<?php include("head.php");  ?>

<title><?php echo $row['articleTitle']; ?>Poly blog</title>
<meta name="description" content="<?php echo $row['articleDescrip']; ?>">
<meta name="keywords" content="<?php echo $row['articleTags']; ?>">

<?php include("header.php");  ?>
<div class="container">
    <div class="content">
        <p>Articles in tag:- <?php echo htmlspecialchars($_GET['id']); ?></p>

        <?php
        echo '<div>';
        echo '<h1>' . $row['articleTitle'] . '</h1>';

        echo '<p>Thời gian đăng ' . date('jS M Y H:i:s', strtotime($row['articleDate'])) . ' in ';

        $stmt2 = $db->prepare('SELECT categoryName, categorySlug   FROM techno_category, techno_cat_links WHERE techno_category.categoryId = techno_cat_links.categoryId AND techno_cat_links.articleId = :articleId');
        $stmt2->execute(array(':articleId' => $row['articleId']));

        $catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        $links = array();
        foreach ($catRow as $cat) {
            $links[] = "<a href='category/" . $cat['categorySlug'] . "'>" . $cat['categoryName'] . "</a>";
        }
        echo implode(", ", $links);
        echo '</p>';
        echo '<p>Tagged as: ';
        $links = array();
        $parts = explode(',', $row['articleTags']);
        foreach ($parts as $tags) {
            $links[] = "<a href='" . $tags . "'>" . $tags . "</a>";
        }
        echo implode(", ", $links);
        echo '</p>';
        echo '<hr>';



        echo '<p>' . $row['articleContent'] . '</p>';

        echo '</div>';
        ?>
        <?php
        $baseUrl = "/";
        $slug = $row['articleSlug'];
        $articleIdc = $row['articleId'];


        ?>

        <p><strong>Share </strong></p>
        <ul>

            <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $baseUrl . $slug; ?>"> <img src="assets/img/Facebook_Logo_(2019).png" style="width:45px;">

                <a target="_blank" href="http://twitter.com/share?text=Visit the link &url=<?php echo $baseUrl . $slug; ?>&hashtags=blog,technosmarter,programming,tutorials,codes,examples,language,development">
                    <img src="assets/img/png-transparent-twitter-logo-social-media-iphone-organization-logo-twitter-computer-network-leaf-media-removebg-preview.png" style="width:45px;">

                    <a target=" _blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $baseUrl . $slug; ?>"> <img src="assets/img/instagram-png-instagram-png-logo-1455-removebg-preview.png" style="width:45px;">

        </ul>
        <hr>


        <div>
            <h2> Recomended Posts:</h2>
            <?php

            // run query//select by current id and display the next 5 blog posts 

            $recom = $db->query("SELECT * from techno_blog where articleId>$articleIdc order by articleId ASC limit 5");

            // look through query
            while ($row1 = $recom->fetch()) {
                echo '<h2><a href="' . $row1['articleSlug'] . '">' . $row1['articleTitle'] . '</a></h2>';
            }
            ?>
            <h2> Previous Posts:</h2>
            <?php

            // run query//select by current id and display the previous 5 posts

            $previous = $db->query("SELECT * from techno_blog where articleId<$articleIdc order by articleId DESC limit 5");

            // look through query
            while ($row1 = $previous->fetch()) {
                echo '<h2><a href="' . $row1['articleSlug'] . '">' . $row1['articleTitle'] . '</a></h2>';
            }


            ?>

        </div>
    </div>

    <?php //sidebar content 
    include("sidebar.php");  ?>
</div>

<?php include("footer.php");  ?>