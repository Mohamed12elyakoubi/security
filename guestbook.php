<?php
session_start();
$host = 'localhost:3306';
$db = "leaky_guest_book1";
$username = "root";
$password = "";
$conn;
try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
} catch (Exception $e) {
    die("Failed to open database connection, did you start it and configure the credentials properly?");
}

if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

function userIsAdmin($conn)
{
    if (isset($_COOKIE['admin'])) {
        $adminCookie = $_COOKIE['admin'];

        $result = $conn->query("SELECT cookie FROM `admin_cookies`");

        foreach ($result as $row) {
            if ($adminCookie === $row['cookie']) {
                return true;
            }
        }
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $text = $_POST['text'];
    $admin = userIsAdmin($conn) ? 1 : 0;
    $color = ($admin) ? $_POST['color'] : 'red';

    // Voorkom scriptinjectie door tekst te ontsnappen
    $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');

    $conn->query(
        "INSERT INTO `entries`(`email`, `color`, `admin`, `text`) 
         VALUES ('$email', '$color', '$admin', '$text');"
    );
}
?>
<html>

<head>
    <title>Leaky-Guestbook</title>
    <style>
        body {
            width: 100%;
        }

        .body-container {
            background-color: aliceblue;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 100px;
            padding-right: 100px;
            padding-bottom: 20px;
        }

        .heading {
            text-align: center;
        }

        .disclosure-notice {
            color: lightgray;
        }
    </style>
</head>
<pre>
    <script>
        alert('Hallo ik ben XSS');
        window.onload = function() {
            document.body.style.backgroundColor = "red";
        }
    </script>
</pre>

<body>
    <div class="body-container">
        <h1 class="heading">Gastenboek 'De lekkage'</h1>
        <form action="guestbook.php" method="post">
            Email: <input type="email" name="email"><br />
            Bericht: <textarea name="text" minlength="4"></textarea><br />
            <?php if (userIsAdmin($conn)) { ?>
                Kleur: <input type="text" name="color" value="blue"><br />
            <?php } else { ?>
                <input type="hidden" name="color" value="red">
            <?php } ?>
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <input type="submit">
        </form>
        <hr />
        <?php
        $result = $conn->query("SELECT `email`, `text`, `color`, `admin` FROM `entries`");
        foreach ($result as $row) {
            $entryText = htmlspecialchars($row['text'], ENT_QUOTES, 'UTF-8');
            print "<div style=\"color: " . $row['color'] . "\">Email: " . $row['email'];
            if ($row['admin']) {
                print '&#9812;';
            }
            print ": " . $entryText . "</div><br/>";
        }
        $email = "username@domain.com";
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "This is a valid email address.";
        } else {
            echo "This is not a valid email address.";
        }
        ?>
        <hr />
        <div class="disclosure-notice">
            <p>
                Hierbij krijgt iedereen expliciete toestemming om dit Gastenboek zelf te gebruiken voor welke doeleinden dan
                ook.
            </p>
            <p>
                Onthoud dat je voor andere websites altijd je aan de principes van
                <a href="https://en.wikipedia.org/wiki/Responsible_disclosure" target="_blank" style="color: lightgray;">
                    Responsible Disclosure
                </a> wilt houden.
            </p>
        </div>
    </div>
</body>

</html>
