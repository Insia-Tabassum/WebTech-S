&lt;?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}
?&gt;
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Login&lt;/title&gt;
    &lt;style&gt;
        body { font-family: Arial, sans-serif; margin: 50px; }
        form { max-width: 300px; margin: auto; }
        input { display: block; width: 100%; margin: 10px 0; padding: 8px; }
        button { padding: 10px; width: 100%; background: #2196F3; color: white; border: none; cursor: pointer; }
        .error { color: red; }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h2&gt;Login&lt;/h2&gt;
    &lt;form action="login.php" method="post"&gt;
        &lt;input type="email" name="email" placeholder="Email" value="&lt;?php echo isset($_COOKIE['remember_email']) ? htmlspecialchars($_COOKIE['remember_email']) : ''; ?&gt;" required&gt;
        &lt;input type="password" name="password" placeholder="Password" required&gt;
        &lt;button type="submit"&gt;Login&lt;/button&gt;
    &lt;/form&gt;
    &lt;p&gt;Don't have an account? &lt;a href="register.php"&gt;Register&lt;/a&gt;&lt;/p&gt;

    &lt;?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require 'config.php';

        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT id, name, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];

            // Set cookies
            setcookie('remember_email', $email, time() + (86400 * 30), "/"); // 30 days
            setcookie('last_login', date('Y-m-d H:i:s'), time() + (86400 * 30), "/");

            header("Location: dashboard.php");
            exit;
        } else {
            echo "&lt;p class='error'&gt;Invalid email or password.&lt;/p&gt;";
        }
    }
    ?&gt;
&lt;/body&gt;
&lt;/html&gt;