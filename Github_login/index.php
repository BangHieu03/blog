<?php
// Include configuration file 
require_once  '../Blog/blogy-1.0.0/pdo/pdo.php';
require_once '../Github_login/config.php';

// Include and initialize user class 

$user = new user();

if (isset($accessToken)) {
    // Get the user profile data from Github 
    $gitUser = $gitClient->getAuthenticatedUser($accessToken);

    if (!empty($gitUser)) {
        // Getting user profile details 
        $gitUserData = array();
        $gitUserData['oauth_uid'] = !empty($gitUser->id) ? $gitUser->id : '';
        $gitUserData['name'] = !empty($gitUser->name) ? $gitUser->name : '';
        $gitUserData['username'] = !empty($gitUser->login) ? $gitUser->login : '';
        $gitUserData['email'] = !empty($gitUser->email) ? $gitUser->email : '';
        $gitUserData['location'] = !empty($gitUser->location) ? $gitUser->location : '';
        $gitUserData['picture'] = !empty($gitUser->avatar_url) ? $gitUser->avatar_url : '';
        $gitUserData['link'] = !empty($gitUser->html_url) ? $gitUser->html_url : '';

        // Insert or update user data to the database 
        $gitUserData['oauth_provider'] = 'github';
        $userExists = $user->checkUser($gitUserData['username']);

        if (!$userExists) {
            $user->addUser($gitUserData['username'], $gitUserData['email'], '', '', $gitUserData['picture'], $gitUserData['name'], '', '', '', '', date("Y-m-d H:i:s"));
        }

        $userData = $user->getUserByName($gitUserData['username']);

        if (is_array($userData) && !empty($userData)) {
            // Storing user data in the session 
            $_SESSION['userData'] = $userData;

            // Render Github profile data 
            $output     = '<h2>GitHub Account Details</h2>';
            $output .= '<div class="ac-data">';
            $output .= '<img src="/images/' . $userData['avatar'] . '">';
            $output .= '<p><b>ID:</b> ' . $userData['user_id'] . '</p>';
            $output .= '<p><b>Name:</b> ' . $userData['name_real'] . '</p>';
            $output .= '<p><b>Login Username:</b> ' . $userData['name'] . '</p>';
            $output .= '<p><b>Email:</b> ' . $userData['email'] . '</p>';
            $output .= '<p><b>Location:</b> ' . $gitUserData['location'] . '</p>';
            $output .= '<p><b>Profile Link:</b> <a href="' . $gitUserData['link'] . '" target="_blank">Click to visit GitHub page</a></p>';
            $output .= '<p>Logout from <a href="./index.php?pages=index&action=home">GitHub</a></p>';
            $output .= '</div>';
        } else {
            $output = '<h3 style="color:red">Something went wrong, please try again!</h3>';
        }
    }
} else if (isset($_GET['code'])) {
    // Verify the state matches the stored state 
    if (!$_GET['state'] || $_SESSION['state'] != $_GET['state']) {
        header("Location: " . $_SERVER['PHP_SELF']);
    }

    // Exchange the auth code for a token 
    $accessToken = $gitClient->getAccessToken($_GET['state'], $_GET['code']);

    $_SESSION['access_token'] = $accessToken;

    header('Location: ./index.php?pages=index&action=home');
} else {
    // Generate a random hash and store in the session for security 
    $_SESSION['state'] = hash('sha256', microtime(TRUE) . rand() . $_SERVER['REMOTE_ADDR']);

    // Remove access token from the session 
    unset($_SESSION['access_token']);

    // Get the URL to authorize 
    $authUrl = $gitClient->getAuthorizeURL($_SESSION['state']);

    // Render Github login button 
    $output = '<a href="' . htmlspecialchars($authUrl) . '"><img src="images/github-login.png"></a>';
}
?>

<div class="container">
    <!-- Display login button / GitHub profile information -->
    <?php echo $output; ?>
</div>
