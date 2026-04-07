<?php
    include('db.php');
    
    //get Id
    $id=$_GET['id']??null;

    if(!$id){
        header('Location: main.php');
        exit;
    }

    //SELECT statement with placeholder for id
    $sql = "SELECT id, title, author, DATE_FORMAT(publicationDate, '%M %e, %Y') AS formattedDate, descriptions, bookCover FROM books WHERE id=:id";

    //prepare the SELECt statement
    $stmt = $pdo->prepare($sql);
    $params=['id'=>$id];
    $stmt->execute($params);

    //fetch the post from the database
    $book = $stmt->fetch();

    // Safety check: If someone types a fake ID in the URL, send them back to main
    if(!$book) {
        header('Location: main.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details: <?= htmlspecialchars($book['title']) ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        body { 
            background-color: #f4f7f6; 
            padding-top: 40px; 
            padding-bottom: 40px; 
        }
        .description-text {
            font-size: 16px;
            line-height: 1.6;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-info-sign"></span> Book Information</h3>
                    </div>
                    
                    <div class="panel-body">
                        <div class="row">
                            
                            <div class="col-md-4 text-center">
                                <?php if($book['bookCover']): ?>
                                    <img src="uploads/<?= htmlspecialchars($book['bookCover']) ?>" class="img-thumbnail img-responsive" alt="<?= htmlspecialchars($book['title']) ?> Cover">
                                <?php else: ?>
                                    <div class="well"><i>No cover available</i></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-8">
                                <h2 style="margin-top: 0; color: #333;"><strong><?= htmlspecialchars($book['title']) ?></strong></h2>
                                <h4 class="text-muted">by <?= htmlspecialchars($book['author']) ?></h4>
                                <h4 class="text-muted">Published on: <?= htmlspecialchars($book['formattedDate']) ?></h4>
                                
                                <div class="description-text">
                                    <p><?= nl2br(htmlspecialchars($book['descriptions'])) ?></p>
                                </div>
                            </div>
                            
                        </div> </div> <div class="panel-footer">
                        
                        <a href="main.php" class="btn btn-default">
                            <span class="glyphicon glyphicon-arrow-left"></span> Back to Main
                        </a>
                        
                        <div class="pull-right">
                            <a href="edit.php?id=<?= $book['id'] ?>" class="btn btn-primary">
                                <span class="glyphicon glyphicon-pencil"></span> Edit
                            </a>
                            
                            <form action="delete.php" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you completely sure you want to delete this book? This cannot be undone!');">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="id" value="<?= $book['id'] ?>">
                                <button type="submit" name="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span> Delete
                                </button>
                            </form>
                        </div>
                        
                        <div class="clearfix"></div>
                        
                    </div>
                </div> </div>
        </div>
    </div>

</body>
</html>