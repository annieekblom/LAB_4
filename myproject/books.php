<?php include ("config.php");?>
<?php include ("header.php");?>
<body>
	<div id="main">


        <div class="container">
            <?php

            @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

			if ($db->connect_error) {
			    echo "could not connect: " . $db->connect_error;
			    printf("<br><a href=index.php>Return to home page </a>");
			}

			if (isset($_GET['ISBN'])) {
			# Get data from form
			  echo "You have successfully returned book number ". ($_GET['ISBN']);
			   $query = "update Book set Reserved = 0 where ISBN = ".($_GET['ISBN']);
			   $db->query($query);
}

            $query = " select * from Book where Reserved like 1";
            
  			$result = $db->query($query);
			  echo "<p> $result->num_rows matching books found </p>";
			  echo "<table border=1>";
			  echo "<tr>
			          
			          <td>Title</td>
			          <td>Author</td>
          			  <td>Return</td>
          
      			  </tr>";
 
			  while($Book = $result->fetch_assoc()) {
			  	echo "<form type='GET'><tr>
			  
						<td>
						<input type='hidden' value='" . $Book['ISBN'] . "' name='ISBN'>" . $Book['Title'] . "</td> 
			       
			          	<td>" . $Book['Author'] . "</td><td>";
			         
					        echo "<INPUT type='submit' name='Return' value='Return'>";

					        echo "</td></tr></form>";
					  };
           	 	
			  echo "</table>";


          
/*
            session_start();
            if (!isset($_SESSION['reservedbooklist'])) {
                echo "You have no reserved books";
                echo "<br><a href=index.php>Return to home page</a>";
                exit;
            }
            echo "You have reserved these books: <br> <br>";
// The list is maintained as a single string
// with the titles separated by slashes
// Split the list into separate titles and print them out
            #here you simply convert the list that looks like this "title/title/title/title"
            #test by running an echo of the session:
            echo $_SESSION['reservedbooklist'];
            
            
            #what you do here is actually convert above list into an array of strings for easier manipulation
            $reservedbooklist = explode("/", $_SESSION['reservedbooklist']);
            
            #go in with a foreach to echo out all of the titles.
            foreach ($reservedbooklist as $reservedbook) {
                echo $reservedbook . "<br>";
            }
            echo "<br><a href=index.php>Return to home page</a>";
            */
            ?>

        </div>

	</div>

<?php include ("footer.php");?>
