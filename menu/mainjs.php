		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="js/jquery.alsEN-1.0.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() 
			{
				$("#lista1").als({
					visible_items: 4,
					scrolling_items: 2,
					orientation: "horizontal",
					circular: "yes",
					autoscroll: "no",
					interval: 5000,
					direction: "right"
				});
				
				$("#lista2").als({
					visible_items: 2,
					scrolling_items: 1,
					orientation: "vertical",
					circular: "no",
					autoscroll: "no"
				});
				
				//logo hover
				$("#logo_img").hover(function()
				{
					$(this).attr("src","images/als_logo_hover212x110.png");
				},function()
				{
					$(this).attr("src","images/als_logo212x110.png");
				});
				
				//logo click
				$("#logo_img").click(function()
				{
					location.href = "http://als.musings.it/index.php";
				});
				
				$("a[href^='http://']").attr("target","_blank");
				$("a[href^='http://als']").attr("target","_self");
			});
		</script>
	</head>
	<body>
		<header>
		</header>	
			<div id="lista1" class="als-container">
				<span class="als-prev"><img src="./images/thin_left_arrow_333.png" alt="prev" title="previous" /></span>
				<div class="als-viewport">
					<ul class="als-wrapper">
						<li class="als-item"><img src="./images/a.gif" width="128px" height="128px" alt="" title="calculator" /></li>
						<li class="als-item"><img src="./images/b.gif" width="128px" height="128px" alt="" title="light bulb" /></li>
						<li class="als-item"><img src="./images/c.gif" width="128px" height="128px" alt="" title="card" /></li>
						<li class="als-item"><img src="./images/d.gif" width="128px" height="128px" alt="" title="chess" /></li>
						<li class="als-item"><img src="./images/e.gif" width="128px" height="128px" alt="" title="alarm clock" /></li>
						<li class="als-item"><img src="./images/f.gif" width="128px" height="128px" alt="" title="scissors" /></li>
						<li class="als-item"><img src="./images/g.gif" width="128px" height="128px" alt="" title="heart" /></li>
						<li class="als-item"><img src="./images/h.gif" width="128px" height="128px" alt="" title="pin" /></li>
						<li class="als-item"><img src="./images/i.gif" width="128px" height="128px" alt="" title="mobile phone" /></li>
						<li class="als-item"><img src="./images/j.gif" width="128px" height="128px" alt="" title="camera" /></li>
					</ul>
				</div>
				<span class="als-next"><img src="./images/thin_right_arrow_333.png" alt="next" title="next" /></span>
			</div>