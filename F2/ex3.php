<?php
	//Här kommer koden...

	//Skapa variabel med default-värde
	$disabled = true;

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
				echo("<p>\$_POST</p>") . PHP_EOL;
				echo( "<pre>" );
				print_r( $_POST );
				echo( "</pre>" );

				echo("<p> \$_COOKIE</p>") . PHP_EOL;
				echo( "<pre>" );
				print_r( $_COOKIE );
				echo( "</pre>" );
				
				
			?>
			
		</div>
	</body>
</html>