var inputs = document.querySelectorAll('form input[type="text"], form input[type="date"]');

// Thêm sự kiện 'blur' (khi người dùng nhấp ra khỏi trường input) cho mỗi trường input
inputs.forEach(function(input) {
    input.addEventListener('blur', function() {
        // Kiểm tra xem trường input có được điền hay không
        if (input.value.trim() === '') {
            // Nếu không, thêm class 'is-invalid' để hiển thị cảnh báo
            input.classList.add('is-invalid');
            // Kiểm tra xem đã có thông báo lỗi chưa, nếu chưa thì thêm vào
            var errorDiv = input.parentNode.querySelector('.invalid-feedback');
            if (!errorDiv) {
                errorDiv = document.createElement('div');
                errorDiv.className = 'invalid-feedback';
                input.parentNode.appendChild(errorDiv);
            }
            errorDiv.textContent = 'Không được để trống.';
        } else {
            // Nếu có, xóa class 'is-invalid' và thông báo lỗi
            input.classList.remove('is-invalid');
            var errorDiv = input.parentNode.querySelector('.invalid-feedback');
            if (errorDiv) {
                input.parentNode.removeChild(errorDiv);
            }
        }
    });
});

// Kiểm tra xem tất cả các trường input có hợp lệ không khi người dùng nhấp vào nút đăng nhập
document.querySelector('form input[type="submit"]').addEventListener('click', function(event) {
    var allValid = true;
    inputs.forEach(function(input) {
        if (input.classList.contains('is-invalid')) {
            allValid = false;
        }
    });
    if (!allValid) {
        event.preventDefault();
        alert('Vui lòng hoàn thành form đúng như đã quy định.');
    }
});