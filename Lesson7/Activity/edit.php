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
    $stmt = $pdo->prepare($sql);
    $params=['id'=>$id];
    $stmt->execute($params);
    $book = $stmt->fetch();

    if(!$book) {
        header('Location: main.php');
        exit;
    }

    $errors = [];

    $title = $_POST['title'] ?? $book['title'];
    $author = $_POST['author'] ?? $book['author'];
    $descriptions = $_POST['descriptions'] ?? $book['descriptions'];

    $isPutRequest=($_SERVER['REQUEST_METHOD']==='POST' && ($_POST['_method']??'')==='put');
    
    if($isPutRequest){
        $title = trim(htmlspecialchars($_POST['title']??''));
        $author = trim(htmlspecialchars($_POST['author']??''));
        $descriptions = trim(htmlspecialchars($_POST['descriptions']??'')); 

        if(empty($title)) {
            $errors[] = "The Title field cannot be empty.";
        }
        if(empty($author)) {
            $errors[] = "The Author field cannot be empty.";
        }
        if(empty($descriptions)) {
            $errors[] = "The Description field cannot be empty.";
        }

        if(empty($errors)) {
            $filename = $book['bookCover']; 

            if(isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK){
                $file = $_FILES['cover'];
                $uploadDir = 'uploads/';

                if(!is_dir($uploadDir)){
                    mkdir($uploadDir, 0755, true);
                }

                $newFilename = uniqid() . '-' . basename($file['name']);
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileExtension = strtolower(pathinfo($newFilename, PATHINFO_EXTENSION));

                if(in_array($fileExtension, $allowedExtensions)){
                    if(move_uploaded_file($file['tmp_name'], $uploadDir . $newFilename)){
                        $filename = $newFilename; 

                        if($book['bookCover'] && file_exists($uploadDir . $book['bookCover'])){
                            unlink($uploadDir . $book['bookCover']); 
                        }
                    }
                } else {
                    die('Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.');
                }
            }

            $sql = 'UPDATE books SET title=:title, author=:author, descriptions=:descriptions, bookCover=:bookCover WHERE id=:id';
            $stmt=$pdo->prepare($sql);

            $params=[
                'title'=>$title,
                'author'=>$author,
                'descriptions'=>$descriptions,
                'bookCover'=>$filename, 
                'id'=>$id 
            ];

            $stmt->execute($params);

            header('Location: main.php');
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        body { 
            background-color: #f4f7f6; 
            padding-top: 40px; 
            padding-bottom: 40px; 
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span> Edit Book Details</h3>
                    </div>
                    <div class="panel-body">
                        
                        <?php if(!empty($errors)): ?>
                            <div class="alert alert-danger">
                                <strong><span class="glyphicon glyphicon-exclamation-sign"></span> Please fix the following errors:</strong>
                                <ul style="margin-bottom: 0; padding-left: 20px; margin-top: 10px;">
                                    <?php foreach($errors as $error): ?>
                                        <li><?= $error ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="id" value="<?= $book['id'] ?>">
                            
                            <div class="form-group">
                                <label for="title">Book Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="<?= htmlspecialchars($title) ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" name="author" id="author" value="<?= htmlspecialchars($author) ?>">
                            </div>

                            <div class="form-group">
                                <label for="publicationDate">Publication Date</label>
                                <input type="date" class="form-control" name="publicationDate" id="publicationDate" value="<?= htmlspecialchars($formattedDate) ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="descriptions">Description</label>
                                <textarea class="form-control" name="descriptions" id="descriptions" rows="4"><?= htmlspecialchars($descriptions) ?></textarea>
                            </div>

                            
                            
                            <div class="well well-sm">
                                <div class="form-group">
                                    <label>Current Cover</label><br>
                                    <?php if($book['bookCover']): ?>
                                        <img src="uploads/<?= htmlspecialchars($book['bookCover']) ?>" class="img-thumbnail" style="width: 120px; height: auto;" alt="Current Cover">
                                    <?php else: ?>
                                        <span class="text-muted"><i>No cover uploaded</i></span>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label for="cover">Change Cover Image</label>
                                    <input type="file" id="cover" name="cover">
                                    <p class="help-block" style="margin-bottom: 0;">Leave this blank to keep the current cover. Allowed: JPG, PNG, GIF.</p>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <button type="submit" name="submit" class="btn btn-primary btn-block">
                                <span class="glyphicon glyphicon-ok"></span> Save Changes
                            </button>
                            <a href="main.php" class="btn btn-default btn-block">Cancel and go back</a>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>