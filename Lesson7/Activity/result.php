<?php
    include('db.php');

    // Prepare a SELECT statement
    $sql = "SELECT id, title, author, DATE_FORMAT(publicationDate, '%M %e, %Y') AS formattedDate, descriptions, bookCover FROM books";
    $stmt = $pdo->prepare($sql);

    // Execute the statement
    $stmt->execute();

    // Fetch the results
    $books = $stmt->fetchAll(); 

    $keyword = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['keyword'])) {
        $keyword = $_POST['keyword'];   
        
        // If the keyword isn't empty, filter the books
        if (!empty($keyword)) {
            $books = array_filter($books, function($b) use ($keyword) {
                return stripos($b['title'], $keyword) !== false || stripos($b['author'], $keyword) !== false || stripos($b['formattedDate'], $keyword) !== false;
            });
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Information</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <style>
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
            vertical-align: middle; 
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
            <div style="margin-bottom: 20px;">
                <form action="result.php" method="POST">
                    <div class="form-group">
                        <label for="searchKeyword" class="control-label">Search Books</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchKeyword" name="keyword" placeholder="Enter keyword...">
                            <span class="input-group-btn">
                                <input type="submit" class="btn btn-primary" name="submit" value="Go">
                            </span>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr class="info"> 
                            <th style="width: 15%; text-align: center;">Book Cover</th>
                            <th style="width: 20%;">Title</th>
                            <th style="width: 15%;">Author</th>
                            <th style="width: 15%;">Publication Date</th>
                            <th style="width: 35%;">Description</th>
                            
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
                                    <td><?= htmlspecialchars($book['formattedDate']) ?></td>
                                    <td><?= htmlspecialchars($book['descriptions']) ?></td>
                                </tr>
                        <?php endforeach;?>
                        
                        <?php if(empty($books)): ?>
                        <tr>
                            <td colspan="5" class="text-center" style="padding: 30px; color: #777;">
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