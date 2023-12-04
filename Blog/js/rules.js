document.getElementById('terms').addEventListener('change', function() {
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var confirm = document.getElementById('confirm').value;
    var terms = document.getElementById('terms').checked;

    if (username && email && password && confirm && terms) {
        document.getElementById('submitButton').disabled = false;
    } else {
        document.getElementById('submitButton').disabled = true;
    }
});