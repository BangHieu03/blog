CKEDITOR.replace('post_content');

    function updateWordAndLineCount() {
        var text = CKEDITOR.instances.post_content.getData();
        var words = text.split(/\s+/).filter(function(word) { return word.length > 0; }).length;
        var lines = text.split(/\n/).length;
        document.getElementById('word_and_line_count').textContent = words + ' words, ' + lines + ' lines';
    }

    // Gọi hàm updateWordAndLineCount mỗi khi nội dung của trình soạn thảo thay đổi
    CKEDITOR.instances.post_content.on('change', updateWordAndLineCount);

    // Gọi hàm updateWordAndLineCount mỗi khi người dùng gõ hoặc xóa một ký tự
    CKEDITOR.instances.post_content.on('key', function() {
        // Sử dụng setTimeout để đảm bảo rằng hàm updateWordAndLineCount được gọi sau khi nội dung của trình soạn thảo đã được cập nhật
        setTimeout(updateWordAndLineCount, 0);
    });

    function openForm() {
        var title = document.getElementById('post_title').value;
        var tags = document.getElementById('post_tags').value;
        var content = document.getElementById('post_content').value;
        var content = CKEDITOR.instances.post_content.getData();

        if (!title || !tags || !content) {
            alert('Thêm tiêu đề, chọn ít nhất một thẻ và bắt đầu viết một cái gì đó để xuất bài viết.');
        } else {
            document.getElementById("postForm").style.display = "block";
        }
    }

    function closeForm() {
        document.getElementById("postForm").style.display = "none";
    }