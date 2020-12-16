<?php
if (empty($_GET['next'])) { //get la variable par URL next si elle existe
    if (empty($_GET['prev'])) { 
        $dateDuJourChiffre = strftime("%m"); //donne le mois en cours sous forme de chiffre de 1 a 12
    }
    else{
        $dateDuJourChiffre = $_GET['prev'];
    }
}
else if (empty($dateDuJourChiffre)){ //Si ni next ni prev existent alors c'est la loose !
    $dateDuJourChiffre = $_GET['next'];
}
else {
    $dateDuJourChiffre = strftime("%m"); //donne le mois en cours sous forme de chiffre de 1 a 12
}

if ($dateDuJourChiffre > 12){ //vérifie qu'on essaie pas de toucher le 13eme mois... Dans ma vie ca existe pas
    $dateDuJourChiffre = 1;
}
else if($dateDuJourChiffre<1){ //Verifie qu'on essaie pas d'aller au mois 00 ... Qui n'existe pas non plus dans ma vie
    $dateDuJourChiffre = 12;
}
else if ($dateDuJourChiffre == NULL){
    $dateDuJourChiffre = strftime("%m"); //donne le mois en cours sous forme de chiffre de 1 a 12 (une seconde fois pour etre vraiment certain !)
}

$mois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
@date_default_timezone_set("Europe/Paris"); // fuseau horaire
@setlocale(LC_TIME, "fr_FR.utf8","fra"); // jours et mois en français
$dateDuJour = $mois[$dateDuJourChiffre-1];
$pathJsonProducts = "produits.json"; //Va chercher le fichier Json
$contentJsonProducts  = file_get_contents($pathJsonProducts); //Lit le fichier
$arrayContentJsonProducts   = json_decode($contentJsonProducts, true); //Converti en array ?
$arrayLength = count($arrayContentJsonProducts); //compte le nombre d'élément du tableau
$legumesDuMois = []; //liste vide des légumes du mois
$legumesImages = []; //liste les images des légumes

for($i=0; $i<count($mois);$i++){ //cherche le mois en cours
    if($dateDuJour == $mois[$i] ){ //s'arrete sur le bon mois
        for($y=0; $y<count($arrayContentJsonProducts);$y++){ //recherche dans tous les élément du Json
            $produit = $arrayContentJsonProducts[$y];
            $moisProduit = explode(",", $produit['mois']);//casse la caractere de mois en la met sous forme d'arrays dans moisProduit         
            for( $z=0; $z<count($moisProduit) ; $z++){
                if($moisProduit[$z] == $mois[$i]){//boucle pour remplir les arrays
                    array_push($legumesDuMois, $produit['nom']);//remplit les noms de légumes
                    array_push($legumesImages, $produit['image']);//remplit les images
                }
            }
        }
    }
}



/*
si next et que var = 12 alors var = 1
si prev et que var = 1 alors var = 12
*/
// idem mais en mode étape par étape


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Biocoop</title>
</head>

<body>

    <header> 
        <img src="logo.png" class="head" alt="BIOCOOP" height=80px;>
    </header>
    
    </br>
   
    <?php


echo ("<div class='container'>");
for($f=0; $f<count($legumesImages);$f++){
    echo("<div class='item'>");
    echo ("<img class='image'src='".$legumesImages[$f]."'width='140px' height='140px'>");
    echo ("<p class='legume'>".$legumesDuMois[$f]."<p>");
    echo ("</div>");
    echo "&nbsp"; 
    echo "&nbsp"; 
    echo "&nbsp"; 
    echo "&nbsp";
    echo "&nbsp"; 
   
    
  
}
echo ("</div>");

/*
for($n=0; $n<count($legumesDuMois);$n++){
    echo ("<p class='legume'>".$legumesDuMois[$n]."<p>");
    echo "&nbsp"; 
    echo "&nbsp"; 
    echo "&nbsp"; 
    echo "&nbsp"; 
}
*/
?>

<footer><div class="mois"> </div></footer>
        <div class= button ><a href="index.php?prev=<?php echo($dateDuJourChiffre-1); ?>"><</a><?php echo($mois[$dateDuJourChiffre-1]); ?><a href="index.php?next=<?php echo($dateDuJourChiffre+1); ?>">></div>
        <form method="get" action="index.php">
</form>
</body>

</html>