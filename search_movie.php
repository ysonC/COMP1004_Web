<html>
    <head>
        <title>Blockbuster</title>
        <link REL='stylesheet' TYPE='text/css' HREF='dbicw.css'
        <script type="text/javascript" src="dbicw.js"></script>
       
    </head>
    <body>
        <h1>Search for a Movie by Title</h1>
        <h2>In here contains all my favorite movies!!</h2>
        <?php
        $titlesearch = $_GET['title'];
        
        $db_host = 'mysql.cs.nott.ac.uk';
        $db_name = "efyhc5_COMP1004";
        $db_user = "efyhc5_COMP1004";
        $db_pass = "000222isa";

        $conn = new mysqli($db_user, $db_pass, $db_name);
        if ($conn-> connect_errno) die ("failed to connect to database\n</body>\n</html>");

        $sql = "Select * From Moive where title = '$titlesearch'";
        $stmt = $conn-> prepare($sql);
        $stmt->execute();
        $stmt->bind_result($ID, $Title, $Price, $Year, $Genre);
        ?>
        <table width="750" border="1" cellspacing="1" cellspacing="1">
            <tr> <th>ID:</th> <th>Title:</th> <th> Price:</th> <th>Year:</th> <th>Genre:</th> </tr>
    
        <?php
        while ($stmt-> fetch())
        {
            echo "<tr>";
            echo "<td>".htmlentities($ID)."</td>";
            echo "<td>".htmlentities($Title)."</td>";
            echo "<td>".htmlentities($Price)."</td>";
            echo "<td>".htmlentities($Year)."</td>";
            echo "<td>".htmlentities($Genre)."</td>";
            echo "</tr>";
        }
        ?>
        </table>
    </body>
</html>