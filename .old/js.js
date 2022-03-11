function actvte () {
	let stream = document.getElementById ("feed");
	navigator.mediaDevices.getUserMedia ({video: true})
		.then (function (mediaStream ) {
			document.getElementById ("feed").srcObject = mediaStream;
			document.getElementById ("feed").play();
		})
		.catch (function (err) {
			alert ("An error occurred: " + err);
		});
	/*
	document.getElementById ("shot").getContext('2d').
		drawImage(document.getElementById ("feed"), 0, 0, 1200, 800);	
	document.getElementById ("quick").innerHTML = document.getElementById ("shot").
		toDataURL ("image/jpg");
	*/
	document.getElementById ("button_01").innerHTML = "Deactivate";
	document.getElementById ("button_01").onclick = function () {dctvte ();};
}

function dctvte () {
	document.getElementById ("button_01").innerHTML = "Activate";
	document.getElementById ("button_01").onclick = function () {actvte ();};
	document.getElementById ("feed").stop ();
}

function cpture () {
	document.getElementById ("button_02").style.display = "none";
	document.getElementById ("button_set_01").style.display = "flex";
	document.getElementById ("shot").getContext('2d').fillStyle = "#ff0000"
	document.getElementById ("shot").getContext('2d').
		fillRect (0, 0, 400, 400);
	document.getElementById ("shot").getContext('2d').
		drawImage (document.getElementById ("feed"), 0, 0, 400, 400);	
	data = document.getElementById ("shot").toDataURL ("image/png");
	document.getElementById ("quick").innerHTML = data;
	document.getElementById ("seed").setAttribute ("src", data);
}
function upload () {
	document.getElementById ("button_02").style.display = "";
	document.getElementById ("button_set_01").style.display = "none";
	document.getElementById ("shot").getContext('2d').fillStyle = "#ff0000"
	document.getElementById ("shot").getContext('2d').
		fillRect (0, 0, 400, 400);
	document.getElementById ("shot").getContext('2d').
		drawImage (document.getElementById ("feed"), 0, 0, 400, 400);	
	data = document.getElementById ("shot").toDataURL ("image/png");
	document.getElementById ("quick").innerHTML = data;
	document.getElementById ("seed").setAttribute ("src", data);
}
function new_ () {
	document.getElementById ("button_02").style.display = "";
	document.getElementById ("button_set_01").style.display = "none";
	document.getElementById ("shot").getContext('2d').fillStyle = "#ff0000"
	document.getElementById ("shot").getContext('2d').
		fillRect (0, 0, 400, 400);
	document.getElementById ("shot").getContext('2d').
		drawImage (document.getElementById ("feed"), 0, 0, 400, 400);
	data = document.getElementById ("shot").toDataURL ("image/png");
	document.getElementById ("quick").innerHTML = data;
	document.getElementById ("seed").setAttribute ("src", data);
}
