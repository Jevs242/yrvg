            <?php
            
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "SurveyDB";
            
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
            
                $sql = "INSERT INTO surveygames (Nombre, Email, Game, Review , Console , Ratings)
                    VALUES ('Jose', 'Email', 'Console' , 'Ratings' , 'Review' , 'Game')";
            
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            
                $conn->close();
            ?>