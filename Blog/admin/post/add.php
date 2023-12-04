<?php
require_once('./includes/config.php');

//if form has been submitted process it
if (isset($_POST['submit'])) {



    //collect form data
    extract($_POST);

    //very basic validations
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
            $articleSlug = slug($articleTitle);

            //insert into database
            $stmt = $db->prepare('INSERT INTO techno_blog (articleTitle,articleSlug,articleDescrip,articleContent,articleDate,articleTags) VALUES (:articleTitle, :articleSlug, :articleDescrip, :articleContent, :articleDate, :articleTags)');

            $stmt->execute(array(
                ':articleTitle' => $articleTitle,
                ':articleSlug' => $articleSlug,
                ':articleDescrip' => $articleDescrip,
                ':articleContent' => $articleContent,
                ':articleDate' => date('Y-m-d H:i:s'),
                ':articleTags' => $articleTags
            ));
            //add categories

            $articleId = $db->lastInsertId();
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


//check for any errors
if (isset($error)) {
    foreach ($error as $error) {
        echo '<p class="message">' . $error . '</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container bg-light rounded shadow-sm p-4">
        <h4 class="text-center">Thêm mới người dùng</h4>
        <form action="" method="post">

            <h2><label>Article Title</label><br>
                <input type="text" name="articleTitle" style="width:100%;height:40px" value="<?php if (isset($error)) {
                                                                                                    echo $_POST['articleTitle'];
                                                                                                } ?>">
            </h2>

            <h2><label>Short Description(Meta Description) </label><br>
                <textarea name="articleDescrip" cols="120" rows="6"><?php if (isset($error)) {
                                                                        echo $_POST['articleDescrip'];
                                                                    } ?></textarea>
            </h2>

            <h2><label>Long Description(Body Content)</label><br>
                <textarea name="articleContent" id="editor" class="mceEditor" cols="120" rows='20'><?php if (isset($error)) {
                                                                                                        echo $_POST['articleContent'];
                                                                                                    } ?></textarea>

            </h2>
            <script>
                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
            <fieldset>
                <h2>
                    <legend>Categories</legend>

                    <?php
                    $checked = null;
                    $stmt2 = $db->query('SELECT categoryId, categoryName FROM techno_category ORDER BY categoryName');

                    while ($row2 = $stmt2->fetch()) {

                        if (isset($_POST['categoryId'])) {

                            if (in_array($row2['categoryId'], $_POST['categoryId'])) {
                                $checked = "checked='checked'";
                            } else {
                            }
                        }

                        echo "<input type='checkbox' name='categoryId[]' value='" . $row2['categoryId'] . "' $checked> " . $row2['categoryName'] . "<br />";
                    }

                    ?>
                </h2>
            </fieldset>
            <h2><label>Articles Tags (Separated by comma without space)</label><br>
                <input type='text' name='articleTags' value='<?php if (isset($error)) {
                                                                    echo $_POST['articleTags'];
                                                                } ?>' style="width:100%;height:40px">
            </h2>








            <button name="submit" class="subbtn">Submit</button>


        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

</html>