<?php
    include "connexion.php";
    if (isset($_GET['motclef'])){
        $motclef = $_GET['motclef'];
        $q = array('motclef'=>'%'.$motclef.'%');
        $sql = 'SELECT jeux, description, img_link, link FROM recherche WHERE jeux LIKE :motclef ORDER BY jeux';
        $req = $bdd->prepare($sql);
        $req->execute($q);
        $count = $req->rowCount($sql);

        if ($count){
            echo "<div class='container row'>";
            while ($result = $req->fetch(PDO::FETCH_OBJ)){
                echo "<div class='col s6'>";
                echo "<div class='card container_card'>
                        <div class='card-image'>
                            <img class='activator img_size' src='$result->img_link'>
                            <span class='card-title jeux activator'>".$result->jeux."</span>
                        </div>
                        <div class='card-action'>
                            <span class='activator'><i class='material-icons right'>more_vert</i></span>
                            <a href='$result->link' target='blank_'>Lien vers la page officielle du jeu</a>
                        </div>
                        <div class='card-reveal'>
                            <p class='description'>
                            <span class='card-title'>".$result->jeux."<i class='material-icons right'>close</i></span>
                            <span class='highlight'>Description :<br></span> ".$result->description."</p>
                        </div>
                    </div>";
                echo "</div>";
            }
            echo "</div>";
        }else{
            echo "<div class='card container'>";
            echo "<p class='founder'>Aucun résultat trouvé pour :  ".$motclef."</p>";
            echo "</div>";
        }
    }
?>

