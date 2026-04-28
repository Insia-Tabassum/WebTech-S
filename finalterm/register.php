&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Register&lt;/title&gt;
    &lt;style&gt;
        body { font-family: Arial, sans-serif; margin: 50px; }
        form { max-width: 300px; margin: auto; }
        input { display: block; width: 100%; margin: 10px 0; padding: 8px; }
        button { padding: 10px; width: 100%; background: #4CAF50; color: white; border: none; cursor: pointer; }
        .error { color: red; }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h2&gt;Register&lt;/h2&gt;
    &lt;form action="register.php" method="post"&gt;
        &lt;input type="text" name="name" placeholder="Name" required&gt;
        &lt;input type="email" name="email" placeholder="Email" required&gt;
        &lt;input type="password" name="password" placeholder="Password" required&gt;
        &lt;button type="submit"&gt;Register&lt;/button&gt;
    &lt;/form&gt;
    &lt;p&gt;Already have an account? &lt;a href="login.php"&gt;Login&lt;/a&gt;&lt;/p&gt;

    &lt;?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require 'config.php';

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $password]);
            echo "&lt;p style='color: green;'&gt;Registration successful! &lt;a href='login.php'&gt;Login here&lt;/a&gt;&lt;/p&gt;";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // Duplicate entry
                echo "&lt;p class='error'&gt;Email already exists.&lt;/p&gt;";
            } else {
                echo "&lt;p class='error'&gt;Registration failed.&lt;/p&gt;";
            }
        }
    }
    ?&gt;
&lt;/body&gt;
&lt;/html&gt;