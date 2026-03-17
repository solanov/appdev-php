<?php
    include('database.php');
    //get Id

    $id=$_GET['id']??null;

    if(!$id){
        header('Location: main.php');
        exit;
    }

    //SELECT statement with placeholder for id

    $sql = 'SELECT * FROM posts WHERE id=:id';

    //prepare the SELECt statement

    $stmt = $pdo->prepare($sql);

    $params=['id'=>$id];

    $stmt->execute($params);

    //fetch the post from the database
    $post = $stmt->fetch();

    //var_dump($post);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selected Record</title>
</head>
<body>
    <table border="1">
        <tr>
            <td><?= $post['title'] ?></td>
        </tr>
        <tr>
            <td><?= $post['body'] ?></td>
        </tr>
        <tr>
            <td><a href="main.php">Back to Main</a></td>
        </tr>
    </table>
    
</body>
</html>