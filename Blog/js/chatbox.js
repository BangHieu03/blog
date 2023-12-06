
document.getElementById('sendBtn').addEventListener('click', function() {
    var userInput = document.getElementById('userInput').value;
    $.ajax({
        url: 'https://api.openai.com/v1/engines/davinci-codex/completions',
        type: 'POST',
        headers: {
            'Authorization': 'Bearer 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',
            'Content-Type': 'application/json'
        },
        data: JSON.stringify({
            'prompt': userInput,
            'max_tokens': 60
        }),
        success: function(data) {
            var chatContent = document.getElementById('chatContent');
            var response = data.choices[0].text;
            chatContent.innerHTML += '<p>User: ' + userInput + '</p>';
            chatContent.innerHTML += '<p>Chatbot: ' + response + '</p>';
        }
    });
});