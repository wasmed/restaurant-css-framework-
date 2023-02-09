

  <?php
  // Connectez-vous à la base de données et sélectionnez les noms des images
  $conn = mysqli_connect("localhost", "root", "root", "restaurant");
  mysqli_set_charset($conn, "utf8");
  $sql = "SELECT name FROM images";
  $result = $conn->query($sql);

  // Boucle à travers les résultats pour afficher chaque image
  while ($row = $result->fetch_assoc()) {
      $nom = $row['name'];
      $chemin = "images/galerie/" . $nom;
      echo "<img src='$chemin' alt='$nom'>";
  }
  $conn->close();
?>