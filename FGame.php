<!doctype html>

<html>
    <head>
        <title>YRVG | Game</title>

        <style>
            @import "style.css";
        </style>
    </head>
    <body>

        
       <header>
           
           <h1 id = "izquierda">YRVG<span> Survey Game</span></h1>

           <nav id = "derecha">
               <a href="FHome.php">Home</a>
               <a href="FGame.php">Create Review</a>
               <a href="FSearch.php">Modify or Delete Review</a>
               <a href="FLists.php">List Review</a>
           </nav>
          
       </header>
       
        

       <?php

            $ErrorName = $ErrorEmail = $ErrorGame = $ErrorConsole = $ErrorRatings = "";
            $name = $Email = $Console = $Ratings = $Review = $Game = "";
            $Error = false;

            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                
                if (empty($_POST["name"])) 
                {
                    $ErrorName = "Name is required";
                    $Error = true;
                } 
                else 
                {
                    $name = form_input($_POST["name"]);
                    if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
                    {
                        $ErrorName = "Only letters";
                        $Error = true;
                    }
                }
                if (empty($_POST["Email"]))
                {
                    $ErrorEmail = "Email is required";
                    $Error = true;
                }
                else 
                {
                    $Email = form_input($_POST["Email"]);
                    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) 
                    {
                        $ErrorEmail = "Incorrect Email format";
                        $Error = true;
                    }
                }
                
                if (empty($_POST["Game"])) 
                {
                    $ErrorGame = "Game is required";
                    $Error = true;
                } 
                else 
                {
                    $Game = form_input($_POST["Game"]);
                    if (!preg_match("/^[a-z A-Z 0-9]*$/",$Game)) 
                    {
                        $ErrorGame = "Only letters and number";
                        $Error = true;
                    }
                }
                if (empty($_POST["Review"])) 
                {
                    $Review = "";
                } 
                else 
                {
                    $Review = form_input($_POST["Review"]);
                }
                if (empty($_POST["Console"])) 
                {
                    $ErrorConsole = "Console is required";
                    $Error = true;
                } 
                else 
                {
                    $Console = form_input($_POST["Console"]);
                }
                if (empty($_POST["Ratings"]))
                {
                    $ErrorRatings = "Ratings is required";
                    $Error = true;
                } 
                else 
                {
                    $Ratings = form_input($_POST["Ratings"]);
                }
            }
            
            function form_input($input) 
            {
                $input = trim($input);
                $input = stripslashes($input);
                $input = htmlspecialchars($input);
                return $input;
            }
            if(isset($_POST['reset']))
            {
                $ErrorName = $ErrorEmail = $ErrorGame = $ErrorConsole = $ErrorRatings = "";
                $name = $Email = $Console = $Ratings = $Review = $Game = "";
            }     
       ?>

       <div id="Pagina">
            
            <main>
                    <h2>Survey VideoGame</h2>
                
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <p><span class="error">* required field</span></p>
                            Name: 
                                <input type="text" name="name" value="<?php echo $name;?>">
                                <span class="error"> *<?php echo $ErrorName;?></span>
                                <br><br>
                            E-mail: 
                                <input type="text" name="Email" value="<?php echo $Email;?>">
                                <span class="error"> *<?php echo $ErrorEmail;?></span>
                                <br><br>
                            Game: 
                                <input type="text" name="Game" value="<?php echo $Game;?>">
                                <span class="error"> *<?php echo $ErrorGame;?></span>
                                <br><br>
                            Review: 
                                <textarea name="Review" rows="5" cols="40"><?php echo $Review;?>
                                </textarea>
                                <br><br>
                            Console:
                                <input type="radio" name="Console" <?php if (isset($Console) && $Console=="PS4") echo "checked";?> value="PS4">PS4
                                <input type="radio" name="Console" <?php if (isset($Console) && $Console=="PS5") echo "checked";?> value="PS5">PS5
                                <input type="radio" name="Console" <?php if (isset($Console) && $Console=="X One") echo "checked";?> value="X One">X One
                                <input type="radio" name="Console" <?php if (isset($Console) && $Console=="X Series") echo "checked";?> value="X Series">X Series
                                <input type="radio" name="Console" <?php if (isset($Console) && $Console=="Switch") echo "checked";?> value="Switch">Switch
                                <input type="radio" name="Console" <?php if (isset($Console) && $Console=="PC") echo "checked";?> value="PC">PC
                                <span class="error"> *<?php echo $ErrorConsole;?></span>
                            <br><br>
                            <br><br>
                            Ratings:
                                <input type="radio" name="Ratings" <?php if (isset($Ratings) && $Ratings=="1 Star") echo "checked";?> value="1 Star">1 Star
                                <input type="radio" name="Ratings" <?php if (isset($Ratings) && $Ratings=="2 Star") echo "checked";?> value="2 Star">2 Star
                                <input type="radio" name="Ratings" <?php if (isset($Ratings) && $Ratings=="3 Star") echo "checked";?> value="3 Star">3 Star
                                <input type="radio" name="Ratings" <?php if (isset($Ratings) && $Ratings=="4 Star") echo "checked";?> value="4 Star">4 Star
                                <input type="radio" name="Ratings" <?php if (isset($Ratings) && $Ratings=="5 Star ") echo "checked";?> value="5 Star ">5 Star 
                                <span class="error"> *<?php echo $ErrorRatings;?></span>
                            <br><br>
                            <input type="submit" name="submit" value="Submit">  
                            <input type="reset" name="reset" value="Reset">
                        </form> 

                        <?php
                            if(!$Error && $name != "")
                            {

                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "surveydb";
                                
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                if ($conn->connect_error) 
                                {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                
                                $sql = "INSERT INTO surveygames (Nombre, Email, Game, Review , Console , Ratings)
                                VALUES ('$name', '$Email', '$Game' , '$Review' , '$Console' , '$Ratings')";

                                if ($conn->query($sql) === TRUE) 
                                {
                                    echo "New record created successfully.";
                                    $last_id = $conn->insert_id;
                                    echo "<p>You ID is: " . $last_id . " in case you want to Modify or delete it.</p>";
                                } 
                                else 
                                {
                                    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
                                }

                                $conn->close();
                            }
                        ?>
                    </main>
            <hr><footer><p>Hecho Jose E Velazquez Sepulveda</p>&copy;2021 YRVG Inc.</footer>
       </div>
    </body>
</html>
