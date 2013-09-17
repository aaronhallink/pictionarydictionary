
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<!-- inlclude boot strap stuff and libraries-->
		<script src="http://code.jquery.com/jquery.js"></script>
	    	<script src="js/bootstrap.min.js"></script>
	    	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	    	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	    	<!-- function to reload page content  -->
	    	<script>
	    		function GetWord(){
	    		var q = $('<div></div>').load( "index.php #wordarea" );
	    		console.log(q);
	    		$( "#wordarea" ).replaceWith(q);
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