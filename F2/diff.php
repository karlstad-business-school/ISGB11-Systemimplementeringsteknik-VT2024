<!doctype html>
<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<title>Repetition</title>
	</head>
	<body>
		<div>
			
			<form action="diff.php" method="post">
				<input type="submit" name="btnSend" value="Send" >
			</form>

            <a href="diff.php?linkSend=true">Send</a>
		
			<?php

                /*
                    $ 
                    . 
                    -> 
                    === 
                    !== 
                    echo()
                    isset() 
                    $_GET[] 
                    $_POST[]
                */

                /*
                $tal1 = 5;
                $tal2 = "5";

                if($tal1 == $tal2) {
                    echo("japp men datatyperna kan skilja åt");
                } else {
                    echo("nepp");
                }

                if($tal1 === $tal2) {
                    echo("japp och samma datatyp");
                } else {
                    echo("nepp");
                }*/

                include("include/OneDice.php");
                include("include/SixDices.php");

                if( isset( $_POST["btnSend"] ) ) {

                    $oneDice = new OneDice( 3 );
                    echo("oneDice innehåller " . $oneDice->getNbr() );

                }

                if( isset( $_GET["linkSend"] ) ) {

                    $sixDices = new SixDices();
                    $sixDices->rollDices();

                    echo( $sixDices->sumDices() );
                    echo( $sixDices->svgDices() );
                }

			
            ?>
			
		</div>
	</body>
</html>