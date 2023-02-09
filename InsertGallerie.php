
<?php

$html = file_get_contents("pictures.html");

$doc = new DOMDocument();
@$doc->loadHTML($html);

$images = $doc->getElementsByTagName("img");

$db = new mysqli("localhost", "root", "root", "restaurant");
foreach ($images as $image) {
    $src = $image->getAttribute("src");
    $image_data = file_get_contents($src);
    $name = basename($src);
   // $stmt = $db->prepare( "UPDATE `images` SET `image`=?,`name`=?");
  
    $stmt = $db->prepare("INSERT INTO images (image, name) VALUES (?, ?)");
    $stmt->bind_param("bs", $image_data, $name);
    $stmt->execute();
}

?>


