<?php

    session_start();

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

    function create(&$feedback) {
        $time = time();
        if(isset($_SESSION["timestamp"])) {
            $feedback = "Det är " . ($time - $_SESSION["timestamp"]) . " s sedan du besökte sessionen senast.";
        } else {
            $feedback = "timestamp är just nu " . $time;
        }
        $_SESSION["timestamp"] = $time;
    }

    function update(&$feedback, &$errorMsg) {
        $time = time();
        if( isset( $_SESSION["timestamp"] ) ) {
            $feedback = "Det är " . ($time - $_SESSION["timestamp"]) . " s sedan du besökte sessionen senast.";
            $_SESSION["timestamp"] = time();
        }
        else {
            $errorMsg = "Du behöver skapa sessionen först med ?a=c";
        }
    }

	function delete(&$feedback, &$errorMsg) {
        $time = time();
        if( isset( $_SESSION["timestamp"]) ) {
            $feedback = "Det är " . ($time - $_SESSION["timestamp"]) . " s sedan du besökte sessionen senast.";
            session_unset();
            session_destroy();
        } else {
            $errorMsg = "Du behöver skapa sessionen först med ?a=c";
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
		</div>
	</body>
</html>