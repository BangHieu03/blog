$(document).ready(function(){
    $('ul.js-clone-nav li a').click(function(){
        $('li.active').removeClass("active");
        $(this).parent().addClass('active');
    });
});
