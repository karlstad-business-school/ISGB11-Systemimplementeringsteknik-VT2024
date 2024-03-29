<?php

    //Ex1 med kakor och översätt sedan till sessioner (Ex2)!

    $errorMsg = "";
    $feedback = "";

	if( isset( $_GET["a"] ) ) {

        switch ( $_GET["a"]) {
            case "c":
                create($feedback);
                break;
            case "u":
                update($feedback, $errorMsg);
                break;
            case "d":
                delete($feedback, $errorMsg);
                break;
            default:
                $errorMsg = "Använd modurl med ?a=c, ?a=u och ?a=d";
        }

	} else {
        $errorMsg = "Använd modurl med ?a=c, ?a=u och ?a=d";
    }

    //Kakan skall bara innehålla en tidsstämpel (time()).
    //Kontroller mot att kakan finns eller inte och lämpliga utskrifter genom feedback och errorMsg skall genomföras.

    function create(&$feedback) {

        $time = time();
        if( isset( $_COOKIE["timestamp"] ) ) {
            $feedback = $time - $_COOKIE["timestamp"];
        } else {
            $feedback = $time;
        }

        setcookie("timestamp", $time, $time + 3600 );
    }

    function update(&$feedback, &$errorMsg) {

        $time = time();
        if( isset( $_COOKIE["timestamp"])) {
            $feedback = $time - $_COOKIE["timestamp"];
            setcookie("timestamp", $time, $time + 3600 );

        } else {
            $errorMsg = "Du behöver skapa en kaka först med ?a=c!";
        }
        
    }

	function delete(&$feedback, &$errorMsg) {

        $time = time();
        if( isset( $_COOKIE["timestamp"])) {
            $feedback = $time - $_COOKIE["timestamp"];
            setcookie("timestamp", "", $time - 3600 );

        } else {
            $errorMsg = "Du behöver skapa en kaka först med ?a=c!";
        }

    }

?>
<!doctype html>
<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<title>Ett exempel med sessioner</title>
	</head>
	<body>
		<div>
			<!-- I detta exempel använder vi modurl -->
            <?php

                if( $errorMsg !== "" ) {
                    echo("<p>$errorMsg</p>");
                }

                if($feedback !== "") {
                    echo("<p>$feedback</p>");
                }

            ?>

            <a href="Ex1.php?a=c">Create</a>

            <a href="Ex1.php?a=u">Update</a>

            <a href="Ex1.php?a=d">Delete</a>

            <a href="?a=t">Test</a>

            <a href="Ex1.php">Utan variabeln a</a>

           
		</div>
	</body>
</html>