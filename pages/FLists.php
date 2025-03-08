<!doctype html>

<html>
    <head>
        <title>YRVG | List</title>

        <style>
            @import "../style/style.css";
        </style>
    </head>
    <body>
        <div id="Banner">
            <header>
               
                <h1 id = "izquierda">YRVG<span> List</span></h1>

                <nav id = "derecha">
                    <a href="../index.php">Home</a>
                    <a href="FGame.php">Create Review</a>
                    <a href="FSearch.php">Modify or Delete Review</a>
                    <a href="FLists.php">List Review</a>
                </nav>
            </header>

            <div id="Pagina">

                <main>
                    <h2>User Reviews</h2>
                    <br>
                    <br>
                    
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "surveydb";

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT Nombre, email, game , Review , Console , Ratings FROM surveygames";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) 
                        {
                            $Counter = 1;
                            while($row = $result->fetch_assoc()) {
                                echo "#" .$Counter++ . "-"  ." Nombre: " . $row["Nombre"]. "<br>Email: " . $row["email"]. "<br>Game: " . $row["game"]. 
                                "<br>Review: " . $row["Review"]. "<br>Console: " . $row["Console"]. "<br>Ratings: " . $row["Ratings"]. "<br><br>";
                            }
                        } else
                        {
                            echo "0 results";
                        }
                        $conn->close();
                    ?>
                </main>
    
                <hr><footer><p>Hecho Jose E Velazquez Sepulveda</p>&copy;2021 YRVG Inc.</footer>
            </div>
        </div>
    </body>
</html>
