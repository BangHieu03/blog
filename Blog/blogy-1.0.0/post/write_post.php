<! <?php

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
                $stmt = $db->prepare('INSERT INTO techno_blog (articleTitle,articleDescrip,articleContent,articleDate) VALUES (:articleTitle, :articleDescrip, :articleContent, :articleDate)');




                $stmt->execute(array(
                    ':articleTitle' => $articleTitle,
                    ':articleDescrip' => $articleDescrip,
                    ':articleContent' => $articleContent,
                    ':articleDate' => date('Y-m-d H:i:s'),

                ));
                //add categories



                //redirect to index page
                header('Location: ./index.php?pages=index&action=home');
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
    ?>-- Form đăng bài viết -->

    <div class="form-popup" id="postForm">
        <label for="license">Giấy phép:</label><br>
        <select id="license" name="license" class="form-control">
            <option value="public">Công khai</option>
            <option value="scheduled">Đặt lịch</option>
            <option value="anyone_with_link">Bất kì ai có liên kết</option>
            <option value="only_me">Chỉ mình tôi</option>
            <input type="submit" value="Lưu và xuất" class="btn btn-primary">
        </select><br>
    </div>

    <form class="m-5" action="submit_post.php" method="post" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="post_title">Tiêu đề:</label>
            <input type="text" id="post_title" name="articleTitle" class="form-control" required value="<?php if (isset($error)) {
                                                                                                            echo $_POST['articleTitle'];
                                                                                                        } ?>">>
        </div>
        <div class="form-group">
            <label for="post_tags">Thẻ:</label>
            <input type="text" id="post_tags" name="articleDescrip" class="form-control" required value="<?php if (isset($error)) {
                                                                                                                echo $_POST['articleDescrip'];
                                                                                                            } ?>">>
        </div>
        <div class="form-group">
            <label for="post_content">Nội dung:</label>
            <textarea name="post_content" id="articleContent" class="form-control" oninput="updateWordAndLineCount()" required value="<?php if (isset($error)) {
                                                                                                                                            echo $_POST['articleContent'];
                                                                                                                                        } ?>">></textarea>
        </div>
        <p id="word_and_line_count"></p>
        <!-- <input class="btn btn-primary" type="submit" class="btn btn-primary" name="submit" class="subbtn" value="Xuất bài viết"></input> -->
        <button name="submit" class="subbtn">Submit</button>
    </form>


    <!-- Khởi tạo CKEditor cho textarea -->