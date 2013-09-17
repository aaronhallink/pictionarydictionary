
<html>

	<head>
		<!-- inlclude boot strap stuff and libraries-->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="http://code.jquery.com/jquery.js"></script>
	    	<script src="js/bootstrap.min.js"></script>
	    	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	    	<!-- function to reload page content  -->
	    	<script>
	    		function GetWord(){
	    		//show animation for loading, delay to give animation a chance to show.
	    		$( "#loadingProgressG" ).show(0).delay(500);


	    		//get new word from page
	    		var q = $('<div></div>').load( "index.php #wordarea" );
	    		console.log(q);

	    		//place new word in page
	    		$( "#wordarea" ).replaceWith(q);

	    		//hide animation
	    		$( "#loadingProgressG" ).toggle(0).delay(500);
	    	}
	    	</script>

		
	</head>
	<body>
		<div id="wrapper">
			<h1 id="title">Pictionary Dictionary</h1>

			<?php 
				//get word and definitition, format it into proper json
				$word = file_get_contents('http://www.ypass.net/misc/dictionary/random-word.php.json');
				preg_match('/{(.*?)}/', $word ,$match);

				// decode json
				$word = json_decode($match[0]);

				//print out related information
				echo "
				<div id='loadingProgressG'>
				<div id='loadingProgressG_1' class='loadingProgressG'>
				</div>
				</div> ";

				echo "<div id='wordarea'>";
				echo   "<h1 id='word'>" . $word->word . " (".$word->part.")"."</h1>";
				echo "<h3 id='definition'> " .$word->definition. "</h3>";
				echo "</div>";
			?>
				
			<button class="btn" onclick="GetWord()" id="refresh">Get another word</button>

			<div class="footer">
				<p>Aaron Hallink <a href="MAILTO:me@aaronhallink.com">me@aaronhallink.com</a></p>
		            </div>
		</div>


	</body>

</html>