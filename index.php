<html>
<head>
    <title>LibreSpeed</title>
    <link rel="shortcut icon" href="favicon.ico">
	<meta charset="UTF-8" />
</head>
<script type="text/javascript" src="speedtest.js"></script>
<body>
<p id='demo'></p>
    <script type="text/javascript">
        var s=new Speedtest();
        s.onupdate = function (data) { // when status is received, put the values in the appropriate fields
       var obj = { "ip":data.clientIp, "download":data.ulStatus, "upload":data.ulStatus,"ping":data.pingStatus,"jitter":data.jitterStatus};
	   var myJSON = JSON.stringify(obj);
document.getElementById("demo").innerHTML = myJSON;
	   }
		
        s.start(); // start the speedtest with default settings
	
    </script>

</body>
</html>

