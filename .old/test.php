<!DOCTYPE html>
<head>
	<title>Hello World!</title>
	<script type="text/javascript">
		function doSomething () {
			if ('mediaDevices' in navigator && 'getUserMedia' in navigator.mediaDevices) {
				alert ("Let's get this party started")
			} else {
				alert ("No!")
			}

			navigator.mediaDevices.getUserMedia({video: true})
		} </script> </head>

<body>
	<h1>Hello World!</h1>
	<input type="submit" onclick="doSomething ()" value="Do Something!" />
	</body> </html>
