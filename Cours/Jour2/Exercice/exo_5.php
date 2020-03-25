<?php
    /*
        1. Créez un formulaire en HTML renseignant les caractéristiques d'un véhicule
        (poids, chevaux, vitesse de pointe, type de boite..)

        2. Créez un script PHP `enregistrer_vehicule.php` qui simulera l'insertion
        du véhicule en base de données.
        Ce script affichera en réalité un message "Le véhicule a bien été ajouté en base de données"
        seulement si tous les champs sont remplis

        3. Dans la page de confirmation, ajoutez si besoin un message
        "Merci d'entrer les champs suivants :
        - Chevaux
        - Vitesse de pointe
        (et les autres champs manquants)"

     */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo véhicule</title>
</head>
<body>
    <form action="enregistrer_vehicule.php" method="post">
        <!-- (div>label>input:text)*4 -->
        <div><label>Marque :<input type="text" name="brand" id=""></label></div>
        <div><label>Modèle :<input type="text" name="model" id=""></label></div>
        <div><label>Poids :<input type="text" name="weight" id=""></label></div>
        <div>
            <label> Type de boîte
                <select name="type">
                    <option value="manual">Manuelle</option>
                    <option value="auto">Automatique</option>
                </select>
            </label>
        </div>
        <div>
            <label>Disponible <input type="checkbox" name="dispo" ></label>
        </div>
        <button type="submit" >Enregistrer</button>
    </form>
</body>
</html>