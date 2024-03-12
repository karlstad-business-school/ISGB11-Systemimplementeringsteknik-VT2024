<?php

    //Ex1 med sessioner och översätt sedan till kakor (Ex2)!

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

    }

    function update(&$feedback, &$errorMsg) {
        
    }

	function delete(&$feedback, &$errorMsg) {

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