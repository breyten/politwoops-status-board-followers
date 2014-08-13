
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
		<meta http-equiv="Cache-control" content="no-cache" />
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>		
		<style type="text/css">
			@font-face
			{
				font-family: "Roadgeek2005SeriesD";
				src: url("http://panic.com/fonts/Roadgeek 2005 Series D/Roadgeek 2005 Series D.otf");
			}

			@media screen {
				body {
					background: black;
				}
			}			
			html, body, *
			{
				background: #444;			
			}
			body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,form,fieldset,input,textarea,p,blockquote,th,td
			{ 
				margin: 0;
				padding: 0;
			}
				
			fieldset,img
			{ 
				border: 0;
			}
			
				
			/* Settin' up the page */
			
			html, body, #main
			{
				overflow: hidden; /* */
			}
			
			body
			{
				color: white;
				font-family: 'Roadgeek2005SeriesD', sans-serif;
				font-size: 20px;
				line-height: 24px;
			}
			body, html, #main
			{
			/*	background: transparent !important; */
			}
			
			#spacepeopleContainer
			{
				width: 250px;
				height: 250px;
				text-align: center;
				background-size: 250px 187px;
			}
			#spacepeopleContainer *
			{
				font-weight: normal;
			}
			
			h2
			{
				width: 100px;
				margin: 0px auto;
				padding-top: 2px;
				font-size: 16px;
				line-height: 14px;
				color: #7e7e7e;
				text-transform: uppercase;
			}
			.counter {
				width: 125px;
				float: left;
			}
                        .counter-full {
                            clear: both;
                            float: none;
                        }
		</style>
	
		<script type="text/javascript">
function refresh() {
    $.get('update.php', function (data) {
        console.log(data);
        var total = 0;
        $('#listing').empty();
        $.each(data, function (idx, item) {
          var counter = $('<div class="counter"></div>');
          var link = $('<a href="https://twitter.com/' + item.user_name + '" target="_blank" />');
          if (typeof(item.flag) != 'undefined') {
              link.append($('<img src="http://www.politwoops.nl/images/flags/' + item.flag + '.png" />'));
          } else {
              link.append($('<img src="http://www.politwoops.nl/images/favicon.png" />'));
              //counter.append($('<h2>' + item.user_name + '</h2>'));
          }
          counter.append(link);
          counter.append(item.followers);
          $('#listing').append(counter);
          total += item.followers;
        });
        $('#total span').text(total);
    }, 'json');
}

function init() {
    refresh();
    var int=self.setInterval(function(){refresh()},300000);
}
		</script>
	</head>
	
	<body onload="init()">
		<div id="main">
	            <div class="counteri counter-full" id="total">
                        <h2>total</h2>
                        <span>0</span>
                    </div>
                    <div id="listing">
                    </div>
		</div><!-- main -->
	</body>
</html>

