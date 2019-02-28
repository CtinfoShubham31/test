<!DOCTYPE html>

<html>

<body>

<?php 
die('zzz');
$payment_amounts = array('cash'=>50);
$payment_amounts['mswipe'] = 10;
$payment_amounts['razorpay'] = 20;
print_r($payment_amounts);die('ZZ');

$payment_amounts['mswipe'] = 30;
array_push($payment_amounts,'','');


$string = "Some text to be encrypted";
$secret_key = "This is my secret key";

// Create the initialization vector for added security.
$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);

// Encrypt $string
$encrypted_string = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $secret_key, $string, MCRYPT_MODE_CBC, $iv);

// Decrypt $string
$decrypted_string = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $secret_key, $encrypted_string, MCRYPT_MODE_CBC, $iv);

echo "Original string : " . $string . "<br />\n";
echo "Encrypted string : " . $encrypted_string . "<br />\n";
echo "Decrypted string : " . $decrypted_string . "<br />\n";

die('WWWWW');


$signupdate='2014-05-17';
echo $signupweek=date("W",strtotime($signupdate)).'<br/>';
echo $year=date("Y",strtotime($signupdate)).'<br/>';
echo $currentweek = date("W").'<br/>';

$dto = new DateTime();
echo $start = $dto->setISODate('2014', '20', 0)->format('Y-m-d').'<br/>';
echo $end = $dto->setISODate('2014', '20', 6)->format('Y-m-d');
?>

<!--<input id="txt1" onkeydown="tryThis(event)" onkeypress="keyPress(event)">-->

<!--<input id="txt2" onkeydown="tryThis(event)"  onkeypress="keyPress(event)">-->

<input id="txt3" onkeydown="tryThis(event)" onkeypress="keyPress(event)">

<input id="txt4" onkeydown="tryThis(event)" onkeypress="keyPress(event)">

test

<script>

function keyPress(event){

    	if(event.srcElement.id.includes("1"))

        {

        	document.getElementById("txt2").focus();	

        }

        else if(event.srcElement.id.includes("2"))

        {

        	document.getElementById("txt3").focus();	

        }

        else if(event.srcElement.id.includes("3"))

        {

        	document.getElementById("txt4").focus();	

        }

    }



function tryThis(event){

	var key = event.keyCode;

    console.log(event);

    if(key == 8 && event.srcElement.value == "")

    {

    	if(event.srcElement.id.includes("4"))

        {

        	document.getElementById("txt3").focus();	

        }

        else if(event.srcElement.id.includes("3"))

        {

        	document.getElementById("txt2").focus();	

        }

        else if(event.srcElement.id.includes("2"))

        {

        	document.getElementById("txt1").focus();	

        }

        event.returnValue = false;

    }

} s

</script>



</body>

</html>