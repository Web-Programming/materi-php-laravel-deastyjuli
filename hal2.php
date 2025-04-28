<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo "Welcome to PHP --- Selamat Datang di PHP";?></h1>

    <?php

    echo "<br/>";
    //Variabel
    $jam = 12;
    if($jam < 12) 
    {
        echo "<h3>Selamat Pagi</h3>";
    }
    else 
    {
        echo "<h3>Selamat Siang</h3>";
    }

    echo "<br/>";
    //Variabel Array
    $hoby = ['Makan', 'Minum', 'Tidur'];
    var_dump(value: $hoby);
    if(is_array(value:$hoby))
    {
        echo "Hobby saya ada ". count(value :$hoby);
    }

    echo "<br/>";
    //Type Data Null
    $nilaiuts = NULL;
    if(is_null(value:$nilaiuts))
    {
        echo "Nilai UTS BELUM KELUAR";
    }
    ?>
</body>
</html>