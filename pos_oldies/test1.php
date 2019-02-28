<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>jQuery Bootstrap Pincode Input Demos</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://www.jqueryscript.net/demo/Custom-Pin-Code-Input-Plugin-with-jQuery-Bootstrap/css/bootstrap-pincode-input.css" rel="stylesheet">
    <style>
        body{
 background-color:#fafafa;
        }
        .container { margin:30px auto; max-width:640px; text-align:center;}
    </style>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://www.jqueryscript.net/demo/Custom-Pin-Code-Input-Plugin-with-jQuery-Bootstrap/js/bootstrap-pincode-input.js"></script>
    <script>
        $(document).ready(function() {
            $('#pincode-input1').pincodeInput({complete:function(value, e, errorElement){

            	$("#pincode-callback").html("This is the 'complete' callback firing. Current value: " + value);

            	// check the code
            	if(value!="1234"){
            		$(errorElement).html("The code is not correct. Should be '1234'");
            	}else{
            		alert('code is correct!');
            	}

            }});

            $('#pincode-input2').pincodeInput({hideDigits:false,inputs:4,complete:function(value, e, errorElement){
            	$("#pincode-callback").html("Complete callback from 6-digit test: Current value: " + value);
            }});


        });
    </script>
    </head>
    <body>

    <div class="container">
        <h1>jQuery Bootstrap Pincode Input Demos</h1>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4>Basic Example (normal input box)</h4>
                    <br/>
                    <br/>
                    <input type="text" id="pincode-input1"  >
            		<br/>
                    <br/>
                    <b>Methods:</b><br/>
                    <a href="#" onclick="javascript:$('#pincode-input1').pincodeInput().data('plugin_pincodeInput').focus()" class="btn btn-danger">focus</a>
                    <a href="#" onclick="javascript:$('#pincode-input1').pincodeInput().data('plugin_pincodeInput').clear()" class="btn btn-danger">clear</a><br/>
                    <br/>
                    <div class="well">complete callback:
                    <span id="pincode-callback"></span></div>
                    <h4>6 visible digits example</h4>
                    <br/>
                    <br/>
                    <input type="text" id="pincode-input2"  >
            		<br/>
                </div>
            </div>
        </div>




        </div>

    </body>
</html>
