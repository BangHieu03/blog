<?php
require_once('./includes/config.php');

?>

<div class="content">
    <H2>Edit</H2>

    <?php

    //if form has been submitted process it
    if (isset($_POST['submit'])) {

        $_POST = array_map('stripslashes', $_POST);

        //collect form data
        extract($_POST);

        //very basic validation
        if ($categoryId == '') {
            $error[] = 'Invalid id.';
        }

        if ($CategoryName == '') {
            $error[] = 'Please enter the Category Title .';
        }

        if (!isset($error)) {

            try {

                $categorySlug = slug($CategoryName);

                //insert into database
                $stmt = $db->prepare('UPDATE techno_category SET CategoryName = :CategoryName, categorySlug = :categorySlug WHERE categoryId = :categoryId');
                $stmt->execute(array(
                    ':CategoryName' => $CategoryName,
                    ':categorySlug' => $categorySlug,
                    ':categoryId' => $categoryId
                ));

                //redirect to categories  page
                header('Location: ./index.php?act=products&action=blog-categories');
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

        $stmt = $db->prepare('SELECT categoryId, CategoryName FROM techno_category WHERE categoryId = :categoryId');
        $stmt->execute(array(':categoryId' => $_GET['id']));
        $row = $stmt->fetch();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    ?>

    <form action="" method="post">
        <input type='hidden' name='categoryId' value='<?php echo $row['categoryId']; ?>'>

        <p><label>Category Title</label><br>
            <input type='text' name='CategoryName' value='<?php echo $row['CategoryName']; ?>'>

        </p>
        <p><input type="submit" name="submit" value="Update"></p>

    </form>
</div>