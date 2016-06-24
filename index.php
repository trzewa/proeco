<html>

	<head>
		<link rel="stylesheet" type="text/css" href="test.css">
		
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
		google.charts.load('current', {'packages':['gauge']});
		google.charts.setOnLoadCallback(drawGauge);
		
		var gaugeOptions = {min: 0, max: 280, yellowFrom: 200, yellowTo: 250,
		  redFrom: 250, redTo: 280, minorTicks: 5};
		var gauge;

		function drawGauge() {
		  gaugeData = new google.visualization.DataTable();
		  gaugeData.addColumn('number', 'pm10');
		  gaugeData.addColumn('number', 'pm2.5');		  
		  gaugeData.addRows(2);
		  gaugeData.setCell(0, 0, 120);
		  gaugeData.setCell(0, 1, 80);		  

		  gauge = new google.visualization.Gauge(document.getElementById('gauge_div'));
		  gauge.draw(gaugeData, gaugeOptions);
		}

		function changeTemp(dir) {
		  gaugeData.setValue(0, 0, gaugeData.getValue(0, 0) + dir * 25);
		  gaugeData.setValue(0, 1, gaugeData.getValue(0, 1) + dir * 20);
		  
		  gauge.draw(gaugeData, gaugeOptions);
		}
		
		function image() {
			var img = document.createElement("IMG");
			img.src = "http://www.eko-sztuka-pakowania.pl/znaki/recycling_12arr_symbols.jpg";
			document.getElementById('pict').appendChild(img);
		}
		function image2() {
			var img = document.createElement("IMG");
			img.src = "https://s-media-cache-ak0.pinimg.com/236x/72/1d/88/721d882e88a74c5f4704c18617739207.jpg";
			document.getElementById('pict').appendChild(img);
		}
	  </script>

		<script>
			function stackTrace() {
    		var err = new Error();
    		return err.stack;
			}

			function highlight(cls, name)
			{
				objects = document.getElementsByClassName(cls);
				for(var i=0; i<objects.length; ++i)
				{
					if(objects[i].id == name)
					{
						objects[i].style.opacity = "1"
					}
					else
					{
						fade(objects[i].id)
					}
				}
			}

			function fade(name)
			{
				obj = document.getElementById(name)
				obj.style.opacity = "0.5"
			}

			var opened = ""
			function resize(cls, name)
			{
				console.log("resize")
				objects = document.getElementsByClassName(cls);
				for(var i=0; i<objects.length; ++i)
				{
					if(objects[i].id == name && objects[i].id == opened)
					{
						objects[i].style.height = "10%"
						opened = ""
					}
					else if(objects[i].id == name)
					{
						objects[i].style.height = "95%"
						opened = objects[i].id
					}
					else
					{
						objects[i].style.height = "10%"
					}
				}
			}

			function addText(event, name)
			{
				if(event.propertyName != "width") //execute only if transition was on width change
					return obj = document.getElementById(name)
				if(obj.innerText == "") {
				}
				else {
					obj.innerText 
				}
			}

			function addTextField(name)
			{
				console.log("addTextField")
				obj = document.getElementById(name)
				console.log(obj.firstChild)
				if(obj.innerText == "")
				{
					obj.innerText = name
					newDiv = document.createElement("div")
					newDiv.class = "contentField"
					newDiv.id = "contentField"
					newDiv.style.left = obj.style.left;
					newDiv.addEventListener('transitionend', function(event) {addText(event, "contentField"); event.stopPropagation()}, false)
					obj.appendChild(newDiv)
					setTimeout(function() {
						newDiv.style.width = "100%"
						newDiv.style.left = "0%"
				}, 0);
				}
				else
				{
					console.log("remove parent " + obj.name)
					obj.innerText
					newDiv = document.getElementById("contentField")
					//newDiv.style.width = "24%"
					obj.removeChild(newDiv)
				}
			}

			window.onload = function()
			{
				console.log("onload")
			  objects = document.getElementsByClassName("button")
				for(var i=0; i<objects.length; ++i)
				{
					objects[i].addEventListener('transitionend', function() {addTextField(this.id);}, false)
					objects[i].addEventListener('mouseover', function() {highlight('button',this.id)}, false)
					objects[i].addEventListener('mouseout', function() {fade(this.id);}, false)
					objects[i].addEventListener('click', function() {resize('button',this.id)}, false)
				}
			}
			function show_image(src, width, height, alt) {
			var img = document.createElement("img");
			img.src = src;
			img.width = width;
			img.height = height;
			img.alt = alt;

    // This next line will just add it to the <body> tag
    document.body.appendChild(img);
}
function addimage() {
    var img = new Image();
    img.src = "https://www.google.com/images/srpr/logo4w.png"
    img_home.appendChild(img);
}
		</script>
	</head>
	
	<body>
		<?php			
				
				require 'polutions.php';
			?>	
		<div id="mainBody" style="width:100%;height:100%;">
				
			<div class="button" id="button1" style="left:0.5%;">
			<?php			
				dane_view(1, 4);				
			?>				
			</div>
			<div class="button" id="button2" style="left:25.5%;">
			 <div id="gauge_div" style="position: absolute; top:10%; left:20%; width:280px; height: 140px;"></div>			 
			</div>
			<div class="button" id="button3" style="left:50.5%;">
				<div id="pict" style="position: absolute; top:10%; left:0%; width:450px; height: 140px;"> <script> image()</script><br><br><script>   image2()</script></div> 
			</div>
			<div class="button" id="button4" style="left:75.5%;">
			
			</div>
		</div>		
	</body>
</html>