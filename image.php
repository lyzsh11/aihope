<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <title></title>
		<meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/slicebox.css" />
		<link rel="stylesheet" type="text/css" href="css/custom.css" />
		<style>
		.top-banner {
			background-color: rgba(255, 255, 255, 0.55);
		}
		.top-banner a {
			color: #019135;
		}
		h1 {
			margin-top: 100px;
			font-family: 'Microsoft Yahei';
			font-size: 36px;
			color: #019157;
		}		
		</style>
		<script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
	</head>
	<body>
			<div class="wrapper" style="height:350px; width:400px">
				<ul id="sb-slider" class="sb-slider">
					<!--<li>
						<a href="http://www.cnblogs.com/lhb25/" target="_blank"><img src="images/1.jpg" alt="image1"/></a>
						<div class="sb-description">
							<h3>Creative Lifesaver</h3>
						</div>
					</li>-->
					<?php
						require_once ($path."db.php") ; 
						$db_con = @mysql_connect($dbhost, $dbuser, $dbpasswd) or $my_err = true;
						@mysql_select_db($dbname);
						//$sql="insert into teacher (name,create_time) values (\"测试3\",NOW())";
						$sql="select * from teacher where recommender='admin'";
						$dbres = mysql_query($sql, $db_con);
						$active=" active";
						while($teacher = (mysql_fetch_array($dbres))) {
							echo "<li>\n";
							echo '<a href="'.$tseacher['url'].'"><img src="'.$teacher['pic'].'" alt="'.$teacher['name'].'" /></a>';
							//echo '<a href="'.$teacher['url'].'"><img height=500 src="'.$path.'/pic/'.$teacher['pic'].'" alt="'.$teacher['name'].'"/></a>';
							echo "</li>\n";
						}

						mysql_close($db_con);
					?>
				</ul>

				<div id="nav-arrows" class="nav-arrows">
					<a href="#">Next</a>
					<a href="#">Previous</a>
				</div>
			</div><!-- /wrapper -->
		<script type="text/javascript" src="http://cdn.staticfile.org/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.slicebox.js"></script>
		<script type="text/javascript">
			$(function() {

				var Page = (function() {

					var $navArrows = $( '#nav-arrows' ).hide(),
						$navDots = $( '#nav-dots' ).hide(),
						$nav = $navDots.children( 'span' ),
						$shadow = $( '#shadow' ).hide(),
						slicebox = $( '#sb-slider' ).slicebox( {
							onReady : function() {

								$navArrows.show();
								$navDots.show();
								$shadow.show();

							},
							onBeforeChange : function( pos ) {

								$nav.removeClass( 'nav-dot-current' );
								$nav.eq( pos ).addClass( 'nav-dot-current' );

							}
						} ),
						
						init = function() {

							initEvents();
							
						},
						initEvents = function() {

							// add navigation events
							$navArrows.children( ':first' ).on( 'click', function() {

								slicebox.next();
								return false;

							} );

							$navArrows.children( ':last' ).on( 'click', function() {
								
								slicebox.previous();
								return false;

							} );

							$nav.each( function( i ) {
							
								$( this ).on( 'click', function( event ) {
									
									var $dot = $( this );
									
									if( !slicebox.isActive() ) {

										$nav.removeClass( 'nav-dot-current' );
										$dot.addClass( 'nav-dot-current' );
									
									}
									
									slicebox.jump( i + 1 );
									return false;
								
								} );
								
							} );

						};

						return { init : init };

				})();

				Page.init();

			});
		</script>
	</body>
</html>	
