<?php
	//Här kommer koden...

	//Skapa variabel med default-värde
	$disabled = true;
	$bgColor = "#ffffff";
	$fgColor = "#000000";
	$css = "body { color: $fgColor; background-color: $bgColor;}";

	if( isset( $_POST["btnSend"] ) ) {

		$bgColor = $_POST["backgroundcolor"];
		$fgColor = $_POST["foregroundcolor"];

		setcookie("fgColor", $fgColor, time() + 3600);
		setcookie("bgColor", $bgColor, time() + 3600);

		$css = "body { color: $fgColor; background-color: $bgColor;}";	
		$disabled = false;	


	}

	if( isset( $_POST["btnReset"] ) && isset( $_COOKIE["fgColor"] ) && isset( $_COOKIE["bgColor"] ) ) {

		setcookie("fgColor", "", time() - 3600);
		setcookie("bgColor", "", time() - 3600);

	}

	if( !isset( $_POST["btnSend"] ) && !isset( $_POST["btnReset"] ) && isset( $_COOKIE["bgColor"] ) && isset( $_COOKIE["fgColor"] ) ) {

		$bgColor = $_COOKIE["bgColor"];
		$fgColor = $_COOKIE["fgColor"];

		$css = "body { color: $fgColor; background-color: $bgColor;}";	
		$disabled = false;

	}


?>
<!doctype html>
<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<title>Ett exempel med kakor</title>
		<style>
			<?php
				//Skriv ut CSS-instruktionerna...
                if( isset ( $css ) ) {
				    echo($css);
                }
			?>
		</style>
	</head>
	<body>
		<div>
			
			<form action="<?php echo( $_SERVER["PHP_SELF"] ); ?>" method="post">
		
				<input type="color" name="backgroundcolor" value="<?php if( isset( $bgColor )) { echo( $bgColor ); } ?>" > <!-- Skriv ut färgvärdet -->
				<input type="color" name="foregroundcolor" value="<?php if( isset( $fgColor )) { echo( $fgColor ); } ?>" > <!-- Skriv ut färgvärdet -->

				<input type="submit" name="btnSend" value="Send" >
				<input type="submit" name="btnReset" value="Reset" <?php if($disabled) { echo("disabled"); } ?> > <!-- Skriv ut disabled om true -->
			
			</form>
		
			<?php
			
				//Utskrifter
				echo("<p>\$_POST</p>" . PHP_EOL);
				echo( "<pre>" );
				print_r( $_POST );
				echo( "</pre>" );

				echo("<p> \$_COOKIE</p>" . PHP_EOL);
				echo( "<pre>" );
				print_r( $_COOKIE );
				echo( "</pre>" );
				
				
			?>
			
		</div>
	</body>
</html>