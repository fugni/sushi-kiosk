<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sushi</title>
    <link href="assets/style.css" rel="stylesheet">

</head>
<body>

    <?php
        include "sql-connection.php";
    ?>

    <div class="leftcolumn">
        <div class="logo"><img id="img" src="assets/img/ShabuShabuLogo.png"> </div>
        <div id="sushibutton" class="sidebutton">Sushi</div>
        <div id="voordeelbox" class="sidebutton">Voordeel</div>
        <div id="pokebowls" class="sidebutton">Poke</div>
        <div id="dranken" class="sidebutton">Dranken</div>
    </div>
    <div class="rightcolumn">
        <div class="title">Sushi</div>
        <div class="container">
            <div class="item1 item"><img src="assets/img/sushi/salmon-ebi-roll.png">
                <p>Salmon Ebi Roll</p><br>
                <p>8st.</p>
                <p>13,80</p>
            </div>
            <div class="item2 item">Item 2</div>
            <div class="item3 item">Item 3</div>
            <div class="item4 item">Item 4</div>
            <div class="item5 item">Item 5</div>
            <div class="item6 item">Item 6</div>
            <div class="item7 item">Item 7</div>
            <div class="item8 item">Item 8</div>
            <div class="item9 item">Item 9</div>
            <div class="item10 item">Item 10</div>
        </div>
    </div>

    <script>
        console.log(sushi);
        console.log(voordeel);
        console.log(pokebowl);
        console.log(dranken);
    </script>

</body>

</html>