<?php  
     include_once 'Database.php';
     $db = new Database();
    //search Data
    if(isset($_POST['submit'])){
        $search = $_POST['search'];
        $tasks = $db->searchData($search);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <input type="text" name="search">
        <button type="submit" name="submit" >Search</button>
    </form>
    <br><br><br>
    <hr>
    <h1>Search Result</h1>

    <?php
        foreach($tasks as $data):
    ?>
    <h4><span style="color: red;"> Post Title: </span> <?=$data['title']?></h4>
    <h4><span style="color: red;">Post Description: </span><?=$data['description']?></h4>
    <h4><span style="color: red;">Post Date: </span><?=$data['post_date']?></h4>

    <?php  
        endforeach;
    ?>
    



</body>
</html>