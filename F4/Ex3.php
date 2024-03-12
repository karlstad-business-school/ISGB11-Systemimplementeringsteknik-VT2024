<!doctype html>
<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<title>Ett exempel med kakor</title>
	</head>
	<body>
		<div>
            <?php
                /*
                    Vilken utskrift genererar programmet och varför om du som användare genomför följande (i given ordning):

                        1. Ladda sidan till webbläsaren
                        2. Klickar på btnInc 
                        3. Klickar igen på btnInc
                        4. Klickar på btnDec
                        5. Klickar på btnRemove
                        6. Klickar på btnInc
                        7. Klickar på btnDec
                */
                if(!isset($_COOKIE["demo"])) {
                    setcookie("demo", 0, time() + 3600);
                }
                if(isset($_POST["btnInc"])) {
                    setcookie("demo", ($_COOKIE["demo"] + 1), time() + 3600);
                }
                if(isset($_POST["btnDec"])) {
                    setcookie("demo", ($_COOKIE["demo"] - 1), time() + 3600);
                }
                if(isset($_POST["btnRemove"])) {
                    setcookie("demo", "", time() - 3600);
                }
                echo("<p>Kakan innehåller: " . $_COOKIE["demo"] . "</p>");
            ?>
			<form action="Ex3.php" method="post">
                <input type="submit" value="Inc" name="btnInc" />
                <input type="submit" value="Dec" name="btnDec" />
                <input type="submit" value="Remove" name="btnRemove" />
            </form>
		</div>
	</body>
</html>