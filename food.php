<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShabuShabu</title>
    <link href="assets/style.css" rel="stylesheet">

</head>
<body>

    <?php
        include "sql-connection.php";

        $categorie = $_GET['categorie'];

        switch ($categorie) {
            case "sushi":
                $categorieDB = $sushi;
                break;
            case "voordeel":
                $categorieDB = $voordeel;
                break;
            case "pokebowl":
                $categorieDB = $pokebowl;
                break;
            case "dranken":
                $categorieDB = $dranken;
                break;
        }
    ?>



    <div class="leftcolumn">
        <div class="logo"><img id="img" src="assets/img/ShabuShabuLogo.png"></div>
        <a href="food.php?categorie=sushi"><div id="sushibutton" class="sidebutton">Sushi</div></a>
        <a href="food.php?categorie=voordeel"><div id="voordeelbox" class="sidebutton">Voordeel</div></a>
        <a href="food.php?categorie=pokebowl"><div id="pokebowls" class="sidebutton">Poke</div></a>
        <a href="food.php?categorie=dranken"><div id="dranken" class="sidebutton">Dranken</div></a>
    </div>
    <div class="rightcolumn">
        <div class="title">
            <?php
            switch ($categorie) {
                case "sushi":
                    echo "Sushi";
                    break;
                case "voordeel":
                    echo "Voordeel-box";
                    break;
                case "pokebowl":
                    echo "Pokebowl";
                    break;
                case "dranken":
                    echo "Dranken";
                    break;
            }
            ?>
        </div>
        <div class="container">
            <?php
                foreach ($categorieDB as $item) {
                    // if price has only 1 decimal, add a 0
                    if (strlen(strstr($item["Price"], ".")) == 2) {
                        $price = $item["Price"] . "0";
                    } else {
                        $price = $item["Price"];
                    }

                    if ($item["Type"] == "dranken") {
                        $amounttype = "ml";
                    } else {
                        $amounttype = " stuk";
                    };

                    echo "<div class='item" . $item["ID"] . " item'><img src='assets/img/sushi/" . $item['Image'] . "'>
                    <p>" . $item['Name'] . "</p><br>
                    <p>" . $item['Amount'] . $amounttype . "</p>
                    <p>€" . $price . "</p></div>";
                }
            ?>
        </div>
    </div>

    <!-- <script>
        console.log(sushi);
        console.log(voordeel);
        console.log(pokebowl);
        console.log(dranken);
    </script> -->

</body>

</html>