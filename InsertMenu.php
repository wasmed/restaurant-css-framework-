<?php
// Récupérer le contenu de la page
$html = file_get_contents('menu/cartePlats.html');

// Charger le contenu dans un objet DOM
$dom = new DOMDocument();
@$dom->loadHTML($html);

// Extraire les éléments souhaités
$xpath = new DOMXPath($dom);
$nodes = $xpath->query('//h5[@class="mt-0 font-weight-bold mb-2"] | //h6[@class="font-weight-bold my-2"]');

// Connecter à la base de données
$conn = new mysqli('localhost', 'root', 'root', 'restaurant');
mysqli_set_charset($conn, "utf8");

// Préparer la requête d'insertion
$sql = "INSERT INTO menu (plat, prix) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sd", $plat, $prix);

// Boucler sur les éléments extraits
foreach ($nodes as $node) {
  if ($node->nodeName == 'h5') {
    $plat = $node->nodeValue;
  } elseif ($node->nodeName == 'h6') {
    $prix = str_replace(',', '.', str_replace('€', '', $node->nodeValue));
    $stmt->execute();
  }
}

// Fermer la connexion à la base de données
$stmt->close();
$conn->close();
?>