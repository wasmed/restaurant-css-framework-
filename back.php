<?php

$host = 'localhost';
$dbname = 'restaurant';
$username = 'root';
$password = 'root';
$dsn = "mysql:host=$host;dbname=$dbname";
$pdo = new PDO($dsn, $username, $password);

    //afficher les données SQL associées à "submit2"
    $sql = "SELECT * FROM `menu`";
    try {

        $stmt1 = $pdo->query($sql);

        if ($stmt1 === false) {
            die("Erreur");
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }



    //afficher les données SQL associées à "submit2"
    $sql = "SELECT * FROM `images`";
    try {

        $stmt2 = $pdo->query($sql);

        if ($stmt2 === false) {
            die("Erreur");
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }


    //afficher les données SQL associées à "submit2"
    $sql = "SELECT * FROM `contact`";
    try {

        $stmt3 = $pdo->query($sql);

        if ($stmt3 === false) {
            die("Erreur");
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $sql = "SELECT * FROM `comment`";
    try {

        $stmt = $pdo->query($sql);

        if ($stmt === false) {
            die("Erreur");
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }


?>
<!DOCTYPE html>
<html lang="en">
<head> <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/styleBack.css" /></head>
<body>
 <h1>Back Office</h1>
 <div class="d-flex" id="wrapper">
     <!-- Sidebar -->
     <div class="bg-white" id="sidebar-wrapper">
         <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                     class="fas fa-user-secret me-2"></i>Wasmed</div>
         <form action="" method="post">
             <div class="list-group list-group-flush my-3">
                 <button type="submit" name="submit1"  class="list-group-item list-group-item-action bg-transparent second-text active"><i
                             class="fas fa-tachometer-alt me-2"></i>Dashboard</button>
                 <button type="submit" name="submit2"  class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                             class="fas fa-project-diagram me-2"></i>Menus</button>
                 <button type="submit" name="submit3" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                             class="fas fa-chart-line me-2"></i>gallerie</button>
                 <button type="submit" name="submit4"  class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                             class="fas fa-paperclip me-2"></i>Contact</button>
                 <button type="submit" name="submit5" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                             class="fas fa-shopping-cart me-2"></i>List comment</button>
         </form>
         <a href="index.html" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                     class="fas fa-power-off me-2"></i>Logout</a>
     </div>
 </div>
 <!-- /#sidebar-wrapper -->

 <!-- Page Content -->
 <div id="page-content-wrapper">
     <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
         <div class="d-flex align-items-center">
             <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
             <h2 class="fs-2 m-0">Dashboard</h2>
         </div>

         <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                 aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         <i class="fas fa-user me-2"></i>
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <li><a class="dropdown-item" href="#">Profile</a></li>
                         <li><a class="dropdown-item" href="index.html">Logout</a></li>
                     </ul>
                 </li>
             </ul>
         </div>
     </nav>
 <div class="row my-5">
     <h3 class="fs-4 mb-3">Recent données :</h3>
     <div class="col">
         <table class="table bg-white rounded shadow-sm  table-hover">
             <thead>

             <?php
             if (isset($_POST['submit2'])) {

             echo "<tr>";
                 echo "<th>" . '#' . "</th>";
                 echo "<th>" . 'plat' . "</th>";
                 echo "<th>" . 'prix' . "</th>";
                 echo "<td>" . 'delete' . "</td>";
                 echo "</tr>";

             } elseif (isset($_POST['submit3'])) {

             echo "<tr>";
                 echo "<th>" . '#' . "</th>";
                 echo "<td>" . 'name' . "</td>";
                 echo "<td>" . 'delete' . "</td>";
                 echo "</tr>";

             } elseif (isset($_POST['submit4'])) {

             echo "<tr>";
                 echo "<th>" . '#' . "</th>";
                 echo "<td>" . 'name' . "</td>";
                 echo "<td>" . 'email' . "</td>";
                 echo "<td>" . 'message' . "</td>";
                 echo "<td>" . 'delete' . "</td>";
                 echo "</tr>";

             } elseif (isset($_POST['submit5'])) {

             echo "<tr>";
                 echo "<th>" . '#' . "</th>";
                 echo "<td>" . 'name' . "</td>";
                 echo "<td>" . 'comment' . "</td>";
                 echo "<td>" . 'rating' . "</td>";
                 echo "<td>" .'date'. "</td>";
                 echo "</tr>";

             }
             ?>

             </thead>
   <tbody>

<?php
if (isset($_POST['submit2'])) {
    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['plat'] . "</td>";
        echo "<td>" . $row['prix'] . "</td>";
        echo "<td>" .'<input type="checkbox"' . "</td>";
        echo "</tr>";
    }
} elseif (isset($_POST['submit3'])) {
    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" .'<input type="checkbox"' . "</td>";
        echo "</tr>";
    }
} elseif (isset($_POST['submit4'])) {
    while ($row = $stmt3->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['message'] . "</td>";
        echo "<td>" .'<input type="checkbox"' . "</td>";
        echo "</tr>";
            }
} elseif (isset($_POST['submit5'])) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['comment'] . "</td>";
        echo "<td>" . $row['rating'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "</tr>";
    }
}
?>
             </tbody>
         </table>
     </div>
 </div>

 </div>
 </div>
 </div>
 <!-- /#page-content-wrapper -->
 </div>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
         <script>
             var el = document.getElementById("wrapper");
             var toggleButton = document.getElementById("menu-toggle");

             toggleButton.onclick = function () {
                 el.classList.toggle("toggled");
             };
         </script>
</body>
</html>