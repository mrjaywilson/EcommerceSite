<?php session_start(); ?>

<!DOCTYPE html>

<html>

    <head>
    
        <Meta charset="UTF-8">
        
        <title>Ecommerce Site</title>
        
        <link 
        	rel="stylesheet"
        	href="../scripts/style.css"
        	crossorigin="anonymous">
        	
		<link rel="stylesheet"
			href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
			integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" 
			crossorigin="anonymous">

        <link 
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
            crossorigin="anonymous">
        	
        <script
        	src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        	crossorigin="anonymous">
    	</script>
        	
    	<script 
        	src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
        	integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
        	crossorigin="anonymous">
    	</script>

		<script 
    		src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" 
    		integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" 
    		crossorigin="anonymous">
		</script>
		
		<script
			src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
		</script>
		
	
		<script>

//             $(document).ready(function() {
//             	$("#command_input").keyup(function(event) {
//             	    if (event.keyCode === 13) {
//             	        var command = $("#command_input").val();
//             	        loadDoc(command);
            
//             	        $("#command_input").val("");
//             	    }
//             	});
//             });

//             $(document).ready(function() {
// //             	$( "#button" ).click(function() {
// //             		  alert( "Handler for .click() called." );
// //             		});
//                	$("#button").click(function() {
//                	        loadLogin();
//                		//alert("Hello! I am an alert box!!");
//                	    }
//                	});
//             });

function getLogin()
{
	#(document).ready(function() {
		$.ajax({
			type: "GET",
			url: "Login.php",
			data: "id=5",
			success: function(data) {
				$('#content').html(data);
			}
		});
	});
}
            

		</script>
		
		<script>
    		function loadLogin() {
    			var xhttp = new XMLHttpRequest();
    
    			xhttp.onreadystatechange = function() {
    				if (this.readyState == 4 && this.status == 200) {
    					document.getElementById("content").innerHTML = this.responseText;
    				}
    			};
    
    			xhttp.open("GET", "_footer.php", true);
    			xhttp.send();
    		}
		</script>
    </head>

    <body>
    
    	<header>

    		<?php include ('layout/_menu.php'); ?>

    	</header>
    
    	<div id="content">
    
    		<?php include ('layout/_content.php'); ?>
    
    	</div>
    
        <footer> 
        
            <?php include('layout/_footer.php'); ?>
            
            <button id="button" onlick="getLogin()"> test </button>
        
        </footer>
    
    </body>

</html>