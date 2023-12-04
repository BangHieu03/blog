<?php
require_once('./includes/config.php');



if (isset($_POST['submit'])) {


    //collect form data
    extract($_POST);

    //very basic validation
    if ($articleId == '') {
        $error[] = 'This post is missing a valid id!.';
    }

    if ($articleTitle == '') {
        $error[] = 'Please enter the title.';
    }

    if ($articleDescrip == '') {
        $error[] = 'Please enter the description.';
    }

    if ($articleContent == '') {
        $error[] = 'Please enter the content.';
    }



    if (!isset($error)) {
        try {



            //insert into database
            $stmt = $db->prepare('UPDATE techno_blog SET articleTitle = :articleTitle, articleSlug = :articleSlug, articleDescrip = :articleDescrip, articleContent = :articleContent,articleTags = :articleTags WHERE articleId = :articleId');
            $stmt->execute(array(
                ':articleTitle' => $articleTitle,
                ':articleSlug' => $articleSlug,
                ':articleDescrip' => $articleDescrip,
                ':articleContent' => $articleContent,
                ':articleTags' => $articleTags,
                ':articleId' => $articleId
            ));


            $stmt = $db->prepare('DELETE FROM techno_cat_links WHERE articleId = :articleId');
            $stmt->execute(array(':articleId' => $articleId));

            if (is_array($categoryId)) {
                foreach ($_POST['categoryId'] as $categoryId) {
                    $stmt = $db->prepare('INSERT INTO techno_cat_links (articleId,categoryId)VALUES(:articleId,:categoryId)');
                    $stmt->execute(array(
                        ':articleId' => $articleId,
                        ':categoryId' => $categoryId
                    ));
                }
            }

            //redirect to index page
            header('Location: ./index.php?act=products&action=list');
            exit;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>


<?php
//check for any errors
if (isset($error)) {
    foreach ($error as $error) {
        echo $error . '<br>';
    }
}

try {

    $stmt = $db->prepare('SELECT articleId, articleSlug,articleTitle, articleDescrip, articleContent,articleTags FROM techno_blog WHERE articleId = :articleId');
    $stmt->execute(array(':articleId' => $_GET['id']));
    $row = $stmt->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CẬP NHẬT SẢN PHẨM</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container  bg-light rounded shadow-sm p-4">
        <h4 class="text-center">Cập nhật sản phẩm</h4>
        <form method="POST" action="#" enctype="multipart/form-data" class="row g-3 needs-validation was-validated container bg-light p-4 rounded">
            <form action='' method='post'>
                <input type='hidden' name='articleId' value="<?php echo $row['articleId']; ?>">

                <h2><label>Article Title</label><br>
                    <input type='text' name='articleTitle' style="width:100%;height:40px" value="<?php echo $row['articleTitle']; ?>">
                </h2>

                <h2><label>Article Slug(Manual Customize)</label><br>
                    <input type='text' name='articleSlug' style="width:100%;height:40px" value='<?php echo $row['articleSlug']; ?>'>
                </h2>




                <h2><label>Short Description(Meta Description) </label><br>
                    <textarea name='articleDescrip' cols='120' rows='6'><?php echo $row['articleDescrip']; ?></textarea>
                </h2>

                <h2><label>Long Description(Body Content)</label><br>
                    <textarea name='articleContent' id='editor' class='mceEditor' cols='120' rows='20'><?php echo $row['articleContent']; ?></textarea>
                </h2>

                <fieldset>
                    <h2>
                        <legend>Categories</legend>

                        <?php
                        $checked = null;
                        $stmt2 = $db->query('SELECT categoryId, categoryName FROM techno_category ORDER BY categoryName');
                        while ($row2 = $stmt2->fetch()) {

                            $stmt3 = $db->prepare('SELECT categoryId FROM techno_cat_links WHERE categoryId = :categoryId AND articleId = :articleId');
                            $stmt3->execute(array(':categoryId' => $row2['categoryId'], ':articleId' => $row['articleId']));
                            $row3 = $stmt3->fetch();

                            if ($row3['categoryId'] == $row2['categoryId']) {
                                $checked = 'checked=checked';
                            } else {
                                $checked = null;
                            }

                            echo "<input type='checkbox' name='categoryId[]' value='" . $row2['categoryId'] . "' $checked> " . $row2['categoryName'] . "<br />";
                        }

                        ?>
                    </h2>
                </fieldset>
                <h2><label>Articles Tags (Seprated by comma without space)</label><br>
                    <input type='text' name='articleTags' style="width:100%;height:40px;" value='<?php echo $row['articleTags']; ?>'>
                    <br>
                </h2>

                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .catch(error => {
                            console.error(error);
                        });
                </script>




                <button name='submit' class="subbtn"> Update</button>

            </form>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
</body>

</html>