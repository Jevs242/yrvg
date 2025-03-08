<!doctype html>

<html>
    <head>
        <title>YRVG | Search</title>

        <style>
            @import "../style/style.css";
        </style>
    </head>
    <body>

        <header>
    
            <h1 id = "izquierda">YRVJ<span> Search</span></h1>

            <nav id = "derecha">
                <a href="../index.php">Home</a>
                <a href="FGame.php">Create Review</a>
                <a href="FSearch.php">Modify or Delete Review</a>
                <a href="FLists.php">List Review</a>
            </nav>
        </header>  
            
        <div id="Pagina">
            <h2>Survey VideoGame</h2>
            <?php
                $Errorid = "";
                $id = "";
                $url = "";

                if (empty($_POST["id"])) 
                {
                    $id = "";
                } 
                else 
                {
                    $id = form_input($_POST["id"]);
                    session_start();
                    $_SESSION['Var'] = $id;
                }

                function form_input($input) 
                {
                    $input = trim($input);
                    $input = stripslashes($input);
                    $input = htmlspecialchars($input);
                    return $input;
                }

                if(isset($_POST['submit']) && !empty($_POST["id"]))
                {
                    $Errorid = "Go to Seach";
                    $url = "FModifyDelete.php";
                }
                else
                {
                    $Errorid = "Summit";
                }
            ?>
            
            <main>
                
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <p><span class="error">* required field</span></p>
                    ID: 
                        <input type="number" name="id" value="<?php echo $id;?>">
                        <span class="error"> *<?php echo $Errorid;?></span>
                    <br><br>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" name="reset" value="Reset">      
                    <a href=<?php echo $url?>><input type="button" value="Search"></a>           
                </form>              
            </main>
            <hr><footer><p>Hecho Jose E Velazquez Sepulveda</p>&copy;2021 YRVG Inc.</footer>
        </div>   
    </body>
</html>