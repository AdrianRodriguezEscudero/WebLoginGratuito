
<?php
    include 'database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuario WHERE username = '$username' AND password = BINARY '$password'";
    
    $result = SQL_Query($sql);

    // Variable $row hold the result of the query
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0)
    {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
    
        echo json_encode('correct');        
    } 
    else 
    {
        echo json_encode('incorrect');        
    }
?>
