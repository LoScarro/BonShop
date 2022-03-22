<?php
$count = 0;
while ($row = mysqli_fetch_assoc($res)) {
    echo '
    <div>
        <div class="product">
            <img class="productImage" src="' . $row['immagine'] . '" alt="' . $row['nome'] . '">
            <p class="productName" id = "product_' . $count . '" >' . $row['nome'] . '</p>
            <p class="productDescription">' . $row['descrizione'] . ' <br>
            Valutazione: ';

    for ($i = 0; $i < 5; $i++) {        //stampo le stelle in base alla valutazione
        if ($i < $row['voto']) {
            echo '<i class="fa fa-star checked"></i>';      //stellina piena
        } else {
            echo '<i class="fa fa-star"></i>';      //stellina vuota
        }
    }
    
    echo '</p>
    </div>
            <p class="prezzo">Prezzo: ' . $row['prezzo'] . '$, Quantità:</p><input type="number" id = "quantity_' . $count . '" class="number_items" name="quantita" min="1" max="20" value="1">

            <div class="button1" onclick="addToCart(' . $count . ')">
                <p class="center" >Aggiungi al Carello</p>
            </div>
        </div>';
    $count++;
}
?>
