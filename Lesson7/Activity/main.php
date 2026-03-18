<?php
    include('db.php');

    // Prepare a SELECT statement
    $stmt = $pdo->prepare('SELECT * FROM books');

    // Execute the statement
    $stmt->execute();

    // Fetch the results
    $books = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <style>
        /* A little custom CSS to make it look modern and "pop" off the page */
        body { 
            background-color: #f4f7f6; 
            padding-top: 40px; 
            padding-bottom: 40px; 
        }
        .content-box { 
            background: #ffffff; 
            padding: 30px; 
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.05); 
        }
        .table > tbody > tr > td {
            vertical-align: middle; /* Keeps text centered with the images */
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="content-box">
            
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-8">
                    <h2 style="margin-top: 0;">Library Dashboard</h2>
                </div>
                <div class="col-md-4 text-right">
                    <a href="create.php" class="btn btn-success">
                        <span class="glyphicon glyphicon-plus"></span> Add New Book
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr class="info"> 
                            <th style="width: 15%; text-align: center;">Book Cover</th>
                            <th style="width: 25%;">Title</th>
                            <th style="width: 20%;">Author</th>
                            <th style="width: 40%;">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($books as $book):?>
                        <tr>
                            <td class="text-center">
                                <?php if($book['bookCover']): ?>
                                    <img src="uploads/<?= htmlspecialchars($book['bookCover']) ?>" class="img-thumbnail" style="width: 120px; height: auto;" alt="Cover">
                                <?php else: ?>
                                    <span class="text-muted"><i>No Cover</i></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="selected.php?id=<?= $book['id'] ?>"><strong><?= htmlspecialchars($book['title']) ?></strong></a>
                            </td>
                            <td><?= htmlspecialchars($book['author']) ?></td>
                            <td><?= htmlspecialchars($book['descriptions']) ?></td>
                        </tr>
                        <?php endforeach;?>
                        
                        <?php if(empty($books)): ?>
                        <tr>
                            <td colspan="4" class="text-center" style="padding: 30px; color: #777;">
                                No books found in the database. Click "Add New Book" to get started!
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>
</html>