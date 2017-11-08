<html>
<head>
<script>
function autoClick(){
	document.getElementById('linkToClick').click();
}
</script>
</head>
<body onload="setTimeout('autoClick();',3000);">
<a id="linkToClick" href="sms://0852887878" target="_blank">GOOGLE</a>
</body>
</html>