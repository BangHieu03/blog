$(document).ready(function(){
    $('.el-submenu__title').click(function(){
        $(this).parent().toggleClass('is-opened');
    });
    $('.btn-collapse').click(function(){
        $('.el-aside').toggleClass('collapsed');
    });
});

// Lấy tất cả các mục menu
var menuItems = document.querySelectorAll('.el-menu-item');

// Lặp qua từng mục menu
for (var i = 0; i < menuItems.length; i++) {
    // Thêm sự kiện click cho từng mục menu
    menuItems[i].addEventListener('click', function() {
        // Xóa class 'is-active' khỏi tất cả các mục menu
        for (var j = 0; j < menuItems.length; j++) {
            menuItems[j].classList.remove('is-active');
        }
        
        // Thêm class 'is-active' cho mục menu được click
        this.classList.add('is-active');
    });
}

