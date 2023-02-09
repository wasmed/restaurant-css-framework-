
<?php
session_start();

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "restaurant";

// Créer la connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("La connexion a échoué : " . mysqli_connect_error());
}

if(isset($_POST['submit'])){
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE mail='$mail' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Connexion réussie
        $_SESSION['mail'] = $mail;
        header('Location: back.php');
    } else {
        // Connexion échouée
        echo "Mail d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Login</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto ">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <svg  xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                            <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                        </svg>
                        <form action="back.php" method="post">
                            <input class="form-control my-3 py-2" type="email" name="mail" placeholder="votre mail" required>
                            <input type="password" name="password" placeholder="Mot de passe" required>
                            <div class="text-center">
                                <button class="btn btn-primary"  type="submit" name="submit">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
</body>
</html>
