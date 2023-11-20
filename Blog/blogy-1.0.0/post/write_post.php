<!-- Form đăng bài viết -->

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
        <input type="text" id="post_title" name="post_title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="post_tags">Thẻ:</label>
        <input type="text" id="post_tags" name="post_tags" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="post_content">Nội dung:</label>
        <textarea name="post_content" id="post_content" class="form-control" oninput="updateWordAndLineCount()" required></textarea>
    </div>
    <p id="word_and_line_count"></p>
    <input class="btn btn-primary" type="submit" class="btn btn-primary" onclick="openForm()" value="Xuất bài viết"></input>
</form>


<!-- Khởi tạo CKEditor cho textarea -->