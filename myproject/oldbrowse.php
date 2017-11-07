<?php include ("config.php");?>
<?php include ("header.php");?>


		<?php

#create an array of books

$books = array();
$books[] = array("title" => "Harry Potter and the Chamber of Secrets", "author" => "J.K Rowlings");
$books[] = array("title" => "Harry Potter and the Order of the Phoenix", "author" => "J.K Rowling");
$books[] = array("title" => "Harry Potter and the Half-Blood Prince", "author" => "Hello");
$books[] = array("title" => "Harry Potter and the Prisoner of Azkaban", "author" => "J.K Rowling");

                ?>

<body>
		<div id="main">
			
<h3>Use your search</h3>
            <hr>
            By title:<br>
            <form action="browse.php" method="GET">
                <table bgcolor="#bdc0ff" cellpadding="6">
                    <tbody>
                        <tr>
                            <td>Title:</td>
                            <td><INPUT type="text" name="searchtitle"></td>
                        </tr>
                        <tr>
                            <td>Author:</td>
                            <td><INPUT type="text" name="searchauthor"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><INPUT type="submit" name="submit" value="Submit"></td>
                        </tr>
                    </tbody>
                </table>
            </form>

            <h3>Book List</h3>
            <hr>
		</div>

		 <?php
            #check if the GET/POST has been used, meaning if the Submit button has been pressed.
            if (isset($_GET) && !empty($_GET)) {
            # Get data from form
                
                #first trim the search, so no white spaces appear prior to the text entered
                $searchtitle = trim($_GET['searchtitle']);
                $searchauthor = trim($_GET['searchauthor']);
                
                #after that it is wise to use addslashes, it adds slashes if there's an apostrophe or quotation mark
                $searchtitle = addslashes($searchtitle);
                $searchauthor = addslashes($searchauthor);
                
                 #here we create a variable $id and basically say that we want the data from the array matching the search criteria
                $id = array_search($searchtitle, array_column($books, 'title'));
                $id2 = array_search($searchauthor, array_column($books, 'author'));
                #echo $id;

                echo '<table id="table" bgcolor="#bdc0ff" cellpadding="6">';
                echo '<tr id="tr"><b><td>Title</td> <td>Author</td> <td>Reserve</td> </b> </tr>';
                #now we check if we have the ID or not in our array. If the search was a hit, it will assign something to our DB, if not, then it will not work.
                if ($id !== FALSE) {
                    $book = $books[$id];
                    $title = $book['title'];
                    $author = $book['author'];
                    echo "<tr>";
                    echo "<td> $title </td><td> $author </td>";
                    echo '<td><a href="reserve.php?reservation=' .  urlencode($title) . '"> Reserve </a></td>';
                    echo "</tr>";
                } elseif ($id2 !== FALSE) {
	                	$book = $books[$id2];
	                    $title = $book['title'];
	                    $author = $book['author'];
	                    echo "<tr>";
	                    echo "<td> $title </td><td> $author </td>";
	                    echo '<td><a href="reserve.php?reservation=' .  urlencode($title) . '"> Reserve </a></td>';
	                    echo "</tr>";
	                	}

	                echo "</table>";
	                
	                }	
                 else {                
                echo '<table id="table" bgcolor="#bdc0ff" cellpadding="6">';
                echo '<tr id="tr"><b><td>Title</td> <td>Author</td> <td>Reserve</td> </b> </tr>';
                foreach ($books as $book) {
                    $title = $book['title'];
                    $author = $book['author'];
                    echo "<tr>";
                    echo "<td> $title </td><td> $author </td>";
                    echo '<td><a href="reserve.php?reservation=' . urlencode($title) . '"> Reserve </a></td>';
                    echo "</tr>";
                }
                
            }

                
             
                echo "</table>";

            
            # in this else under, you basically show the book-list.
            # above you checked in the GET method has been set, if it has display the results of the "search"
            # if they have not been set, just display the list instead. In this case "book-list" is insufficient
            # all you have to do is merge book-list.php with book-search.php and create one master page
            # define the array at the start in PHP and manipulate it later on.
            
          
            ?>

            
            
            
            <!--
        
            WHAT WOULD THIS PART OF CODE DO???
            
            
            -->
            
            <?php
//            if (isset($_COOKIE['colourpreference']))
//                    $colourpreference = $_COOKIE['colourpreference'];
//                else
//                    $colourpreference = "#dddddd";
//                echo '<table bgcolor="' . $colourpreference . '" cellpadding="6">';
//                
//                ?>

<?php include ("footer.php");?>
