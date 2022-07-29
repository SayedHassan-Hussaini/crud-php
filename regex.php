<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/index.css">
    <title>ReGex with php</title>
</head>
<body>
    <h1>Regular Expersion</h1>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore tenetur quo mollitia perspiciatis fuga, architecto, distinctio vero earum ut officiis quidem! Ullam unde fuga numquam quidem iste laudantium corporis? Animi expedita veniam tempora debitis. Accusamus unde ab veritatis quibusdam voluptatem quam tempora amet praesentium similique, deserunt, laboriosam odit consequatur deleniti.</p>
    <h4>we want to find <q><i>dolor</i></q> word in above string, if found the preg_match() function will return 1 if not return 0</h4>
    <?php
    $str = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore tenetur quo mollitia perspiciatis fuga, architecto, distinctio vero earum ut officiis quidem! Ullam unde fuga numquam quidem iste laudantium corporis? Animi expedita veniam tempora debitis. Accusamus unde ab veritatis quibusdam voluptatem quam tempora amet praesentium similique, deserunt, laboriosam odit consequatur deleniti";
    $pattern = "/dolor/i";

    echo 'preg_match(/dolor/i, $str) => '. preg_match($pattern, $str);

    ?>
    <h3>Find dynamically</h3>
    <form method="GET">
        <label for="text">Text</label>
        <input type="text" name="text">
        <input type="submit">
    </form>
    <?php
    $text = 'text';
    if(isset($_GET[$text])){
        if(preg_match_all("/$_GET[$text]/i", $str, $matches)){
            echo "we found <strong>$_GET[$text]</strong> in above string ".count($matches[0])." times<br>";
            print_r($matches[0]);
        } else echo 'Not found<br>';
    }
    ?>

    <h3>Repalce</h3>
    <form method="GET">
        <label for="text1">find</label>
        <input type="text" name="text1">
        <label for="text2">repalce</label>
        <input type="text" name="text2">
        <input type="submit">
    </form>
    <?php
    $text1 = 'text1';
    $text2 = 'text2';
    if(isset($_GET[$text1]) && $_GET[$text2]){
        echo preg_replace("/$_GET[$text1]/i", "$_GET[$text2]", $str);
        
    }

    ?>
    </body>
</html>