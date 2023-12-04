$(document).ready(function(){
  $('[data-toggle="popover"]').popover(); 
});

// Hiện lên cập nhập thành công

document.getElementById('updateSuccess').style.display = 'block';
setTimeout(function() {
    document.getElementById('updateSuccess').style.display = 'none';
}, 2000);

var updateSuccess = document.getElementById('updateSuccess');
updateSuccess.style.display = 'block';
setTimeout(function() {
    updateSuccess.firstChild.style.transform = 'translateY(0)';
    updateSuccess.firstChild.style.opacity = '1';
}, 500);
setTimeout(function() {
    updateSuccess.firstChild.style.transform = 'translateY(-50px)';
    updateSuccess.firstChild.style.opacity = '0';
}, 3000);
setTimeout(function() {
    updateSuccess.style.display = 'none';
}, 3500);


