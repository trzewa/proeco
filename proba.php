<html>

	<head>
		<link rel="stylesheet" type="text/css" href="test.css">
	</head>
	<body>
		<script>
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

			function addText(name)
			{
				obj = document.getElementById(name)
				console.log(obj)
				if(obj.innerText == "")
					obj.innerText = name + "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam molestie est sed mattis imperdiet. Vivamus molestie purus sed libero varius sagittis. Nulla cursus non arcu eget egestas. Nullam malesuada, libero lobortis malesuada commodo, tellus erat commodo arcu, a interdum nisl arcu eu felis. Morbi ultrices vel est sed porttitor. Praesent sagittis sollicitudin ante, ut tempor velit. Proin non lobortis lacus. Nulla posuere arcu sed turpis tempor tristique. Pellentesque dictum ex at venenatis consequat. In in nisl quam. Nam ex sem, consequat vel erat vel, luctus interdum est. Donec eu bibendum arcu. Phasellus vel mattis tortor. Ut semper, tortor nec tristique rutrum, justo lectus interdum nisl, vel elementum libero augue ut elit. Mauris eu mi libero."
				else {
					obj.innerText = "dsd"
				}
			}

			function addTextField(name)
			{
				obj = document.getElementById(name)
				if(obj.innerText == "")
				{
					obj.innerText = name
					newDiv = document.createElement("div")
					newDiv.class = "contentField"
					newDiv.id = "contentField"
					newDiv.style.left = obj.style.left;
					obj.appendChild(newDiv)
					setTimeout(function() {
						newDiv.style.width = "100%"
						newDiv.style.left = "0%"
				}, 0);
				}
				else
				{
					obj.innerText = ""
					obj.removeChild(document.getElementById("contentField"))
				}
			}

			function animateField(name)
			{
				addTextField(name)
				addText(content.id)
			}

			window.onload = function()
			{
			  objects = document.getElementsByClassName("button")
				for(var i=0; i<objects.length; ++i)
				{
					objects[i].addEventListener('transitionend', function() {animateField(this.id);}, false)
					objects[i].addEventListener('mouseover', function() {highlight('button',this.id)}, false)
					objects[i].addEventListener('onmouseout', function() {fade(this.id);}, false)
					objects[i].addEventListener('click', function() {resize('button',this.id)}, false)										
				}
			}
		</script>
		<div id="mainBody" style="width:100%;height:100%;">
			<div class="button" id="button1" style="left:0.5%;">
			<?php	
				include polutions.php;
			?>
			</div>
			<div class="button" id="button2" style="left:25.5%;">
			</div>
			<div class="button" id="button3" style="left:50.5%;">
			</div>
			<div class="button" id="button4" style="left:75.5%;">
			</div>
		</div>
	</body>
</html>
