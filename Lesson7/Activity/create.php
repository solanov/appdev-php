<?php
include('db.php');

$errors = [];
$title = '';
$author = '';
$descriptions = '';

if($_SERVER['REQUEST_METHOD']==='POST'&&isset($_POST['submit'])){
    $title=htmlspecialchars($_POST['title']??'');
    $author=htmlspecialchars($_POST['author']??'');
    $descriptions=htmlspecialchars($_POST['descriptions']??'');
    $file=null;

    if(empty(trim($title))) {
        $errors[] = "The Title field cannot be empty.";
    }
    if(empty(trim($author))) {
        $errors[] = "The Author field cannot be empty.";
    }
    if(empty(trim($descriptions))) {
        $errors[] = "The Description field cannot be empty.";
    }

    if(!isset($_FILES['cover']) || $_FILES['cover']['error'] === UPLOAD_ERR_NO_FILE) {
        $errors[] = "Please upload a Book Cover image.";
    }

    if(empty($errors)) {
        $filename = null; 

        if(isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK){
            $file = $_FILES['cover'];       
            $uploadDir = 'uploads/';

            if(!is_dir($uploadDir)){
                mkdir($uploadDir, 0755, true);
            }

            $filename = uniqid() . '-' . basename($file['name']);
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if(in_array($fileExtension, $allowedExtensions)){
                if(!move_uploaded_file($file['tmp_name'], $uploadDir . $filename)){
                    die('Failed to move uploaded file.');
                }
            } else {
                die('Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.');
            }
        }

        $sql='INSERT INTO books(title, author, descriptions, bookCover) VALUES(:title, :author, :descriptions, :bookCover)';
        $stmt = $pdo->prepare($sql);
        
        $params = [
            'title'=>$title,
            'author'=>$author,
            'descriptions'=>$descriptions,
            'bookCover'=>$filename
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
    <title>Add Book</title>
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
                
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Add a New Book</h3>
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
                            
                            <div class="form-group">
                                <label for="title">Book Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="<?= $title ?>" placeholder="e.g., The Great Gatsby">
                            </div>
                            
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" name="author" id="author" value="<?= $author ?>" placeholder="e.g., F. Scott Fitzgerald">
                            </div>
                            
                            <div class="form-group">
                                <label for="descriptions">Description</label>
                                <textarea class="form-control" name="descriptions" id="descriptions" rows="4" placeholder="Write a short summary..."><?= $descriptions ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="logo">Book Cover Image</label>
                                <input type="file" id="logo" name="cover">
                                <p class="help-block">Allowed files: JPG, JPEG, PNG, GIF.</p>
                            </div>
                            
                            <hr>
                            
                            <button type="submit" name="submit" class="btn btn-success btn-block">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Save Book
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