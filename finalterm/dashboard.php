&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Dashboard&lt;/title&gt;
    &lt;style&gt;
        body { font-family: Arial, sans-serif; margin: 50px; }
        .dashboard { max-width: 600px; margin: auto; }
        .logout { float: right; }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div class="dashboard"&gt;
        &lt;a href="logout.php" class="logout"&gt;Logout&lt;/a&gt;
        &lt;h2&gt;Welcome, &lt;?php echo htmlspecialchars($_SESSION['user_name']); ?&gt;!&lt;/h2&gt;
        &lt;p&gt;You are now logged in to your dashboard.&lt;/p&gt;
        &lt;?php if (isset($_COOKIE['last_login'])): ?&gt;
            &lt;p&gt;Last login: &lt;?php echo htmlspecialchars($_COOKIE['last_login']); ?&gt;&lt;/p&gt;
        &lt;?php endif; ?&gt;
    &lt;/div&gt;

&lt;?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?&gt;
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Dashboard&lt;/title&gt;
    &lt;style&gt;
        body { font-family: Arial, sans-serif; margin: 50px; }
        .dashboard { max-width: 600px; margin: auto; }
        .logout { float: right; }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div class="dashboard"&gt;
        &lt;a href="logout.php" class="logout"&gt;Logout&lt;/a&gt;
        &lt;h2&gt;Welcome, &lt;?php echo htmlspecialchars($_SESSION['user_name']); ?&gt;!&lt;/h2&gt;
        &lt;p&gt;You are now logged in to your dashboard.&lt;/p&gt;
        &lt;?php if (isset($_COOKIE['last_login'])): ?&gt;
            &lt;p&gt;Last login: &lt;?php echo htmlspecialchars($_COOKIE['last_login']); ?&gt;&lt;/p&gt;
        &lt;?php endif; ?&gt;
    &lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;</content>
<parameter name="filePath">c:\xampp\htdocs\WebTech-S\dashboard.php