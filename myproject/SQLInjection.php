<?php include("config.php"); ?>
<?php include("header.php"); ?>

<?php 

@ $db = new mysqli('localhost', 'root', '', 'testinguser');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

    #the mysqli_real_espace_string function helps us solve the SQL Injection
    #it adds forward-slashes in front of chars that we can't store in the username/pass
    #in order to excecute a SQL Injection you need to use a ' (apostrophe)
    #Basically we want to output something like \' in front, so it is ignored by code and processed as text
if (isset($_POST['username'], $_POST['userpass'])) {


    $uname = mysqli_real_escape_string($db, $_POST['username']);
    
    $upass = sha1($_POST['userpass']);
    
    // echo $upass;
    // echo "</br>";
    // echo $upass;
    #just to see what we are selecting, and we can use it to test in phpmyadmin/heidisql
    
    $query = ("SELECT * FROM user WHERE username = '{$uname}' "."AND userpass = '{$upass}'");
       
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result(); 
    
    #here we create a new variable 'totalcount' just to check if there's at least
    #one user with the right combination. If there is, we later on print out "access granted"
    $totalcount = $stmt->num_rows();
    
    
    
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        
        if (isset($totalcount)) {
            if ($totalcount == 0) {
                echo '<h2>You got it wrong. Can\'t break in here!</h2>';
            } else {
                echo '<h2>Welcome! Correct password.</h2><a href="fileUpload.php">Here is the link </a>';
            }
        }
        ?>
        <form method="POST" action="">
            <input type="text" name="username" >
            <input type="password" name="userpass" >
            <input type="submit" value="Go">
        </form>
       <?php include("footer.php"); ?>
    </body>
</html>
