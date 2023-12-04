// // Lấy phần tử span để đóng popup
// var span = document.getElementsByClassName("close")[0];

// // Khi span (x) được click, đóng popup
// span.onclick = function () {
//   popup.style.display = "none";
// };

// // Khi người dùng click ra ngoài popup, đóng nó lại
// window.onclick = function (event) {
//   if (event.target == popup) {
//     popup.style.display = "none";
//   }
// };

// // Kiểm tra xem người dùng đã đăng nhập hay chưa
// var isLoggedIn = document.body.dataset.loggedIn === 'true';

// // Nếu người dùng đã đăng nhập, không hiển thị popup
// if (!isLoggedIn) {
//   // Hiển thị popup sau 3 giây
//   setTimeout(function () {
//     popup.style.display = "block";
//   }, 3000);
// }
