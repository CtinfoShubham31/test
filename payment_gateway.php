<?php


#PayPal

With 20 million accounts in the UK and over 140 million worldwide, PayPal is a popular payment method amongst millions of online shoppers and one of the global leaders in online payments.

It's a fast and secure way for customers to pay online via all major debit and credit cards, online bank transfers and via payments from PayPal account holders. Customers don't even need a PayPal account to pay with PayPal.

PayPal is affordable for businesses of all sizes.
PayPal offers chargeback protection on qualifying transactions.
PayPal offers different products to suit your business needs and size.

Add PayPal Website Payments Standard to your website

Website Payments Standard is an easy and secure way for customers to pay online. Buyers shop on your website, pay on PayPal and return to your site. Set up can be completed in as little as a few minutes.

Accept payments via all major debit and credit cards as well as bank transfers. Customers do not need to have a PayPal account to pay you.
No set-up or monthly fees - you typically just pay a small amount for each payment received.
No approval required - start accepting online payments today.

https://www.create.net/paypal-standard-shopping-cart.phtml

Add PayPal Express Checkout to your website

Express Checkout is PayPals fastest checkout solution. Customers can pay easily, quickly, and securely in as few as three clicks. The customer initiates and approves PayPal payments earlier in the checkout process and shipping and billing information is sent immediately from PayPal to your website.

Add PayPal Website Payments Pro to your website

PayPal Pro Payments is currently on request. Please contact your Customer Account Manager for more information.

Website Payments Pro is an all-in-one payments solution that enables a merchant to accept debit and credit card payments as well as bank transfers directly on your website, over the phone, by fax and by mail order. You also gain the benefits of PayPal Express Checkout. Its the smart, scaleable way to grow business.

#IPN
http://www.evoluted.net/thinktank/web-development/paypal-php-integration

To make the PayPal Payment more secure, you can use PayPal Instant Payment Notification (IPN). To Use this feature, you should need to enable IPN in PayPal account and define notify_url in PayPal HTML Variables. 

------------------------------------------------------------------------------------------------------------------
# CCavenue

CCavenue is authorized by Indian financial institutions and one of the most secure payment gateway to transact money for an online shopping. It accepts and validates most of the online payments modes via Credit and Debit Card, Net banking, ATM-cum-Debit Card, Cash Card and Mobile Payment from the end customers in a real-time. It provides a secure link between a Merchant’s website and acquiring Banks, various issuing institutions, and the payment gateway providers.

To integrate CCAvenue payment gateway in your website, you should have CCAvenue account and they will give you a merchant id and a unique key for your website to perform transaction.

For Integrate it with your website you should have CCavenue account and they give you amerchant id and a unique key for your site that is most important for money transaction.

The CCAvenue system expects certain input data with specific names to be sent to the CCAvenue website. For this reason, it is essential that the names of the input fields on the merchant website and the CCAvenue website should match exactly. Also there are some input filed values are mandatory like Merchant_Id, Amount and Order_Id. The Merchant_Id and working key will be assigned to you by CCAvenue.

http://www.phpzag.com/ccavenue-payment-gateway-integration-in-php/

http://phptechnicalgroups.blogspot.in/2013/09/easy-way-to-integration-of-ccavenue.html

https://bharathiphp.wordpress.com/2013/11/22/ccavenue-payment-gateway-integration/

CCAvenue Advantage:

Easy to implement.
Minimizes your costs and risks.
Optimum transaction time.
Verified By Visa & Master Card Secure Code enabled gateway.
Visa and MasterCard Debit Cards issued by Indian banks
7 Credit Cards
6 ATM cum Debit Cards from prominent Indian banks
44 Net Banking Options
Verified By Visa and MasterCard Secure Code Security Protocols
Online Payment Processing, Fraud Control, Financial Reporting and Tracking – all integrated into one Solution
------------------------------------------------------------------------------------------------------------------

# Authorized.Net
advanced integration method authorize.net
Integrating Authorize.net ARB payment gateway in php

To authenticate with the Authorize.Net API you will need to retrieve your API Login ID and Transaction Key from the Merchant Interface.

define("AUTHORIZENET_API_LOGIN_ID", "YOURLOGIN");
define("AUTHORIZENET_TRANSACTION_KEY", "YOURKEY");

http://stackoverflow.com/questions/37409295/integrating-authorize-net-arb-payment-gateway-in-php?rq=1
		
		http://technet.massivetechnolab.co.in/authorize-net-payment-gateway-integration-using-php
		
		http://www.johnconde.net/blog/tutorial-integrate-authorize-net-xml-api-universal-php-class/
		
		http://www.99points.info/2010/04/how-can-we-integrate-the-authorize-net-payment-gateway-i-codeigniter/
		
		
-------------------------------------------------------------------------------------------------------------------

# Stripe:		

http://www.stepblogging.com/how-to-integrate-stripe-payment-gateway-using-php/

https://code.tutsplus.com/tutorials/how-to-accept-payments-with-stripe--pre-80957

http://www.phpgang.com/how-to-integrate-stripe-payment-gateway-in-php-1_1027.html  -------------(Good)

http://technet.massivetechnolab.co.in/stripe-payment-gateway-php-tutorial

https://stripe.com/docs/checkout/php

https://github.com/stripe/wilde-things

http://wsmoak.net/stripe/docs/PHPCheckoutGuide.html

https://stripe.com/docs/testing

Stripe take care the processing and keeping client’s card data so no information of essence would be stored on our server and you would not have to comply with all the rules that come with storing credit/debit cards.
		
		
A service built by developers for developers. What a thought! Enter Stripe; no merchant accounts, no gateways. An API call, along with a few safety guidelines, is all that you need to begin accepting credit card payments today.


While Stripe isn’t free, they only ask for 2.9% of each charge (plus .30 cents). That’s it. No setup fees, storage fees, hidden costs - none of that. Just 2.9%. Not bad!

Stripe currently accepts UK, US and Canada Sellers. If you are a seller from another country you will need to use another payment gateway provider at this time. 


Step 01:
Create developer Sendbox account in stripe.com https://manage.stripe.com/register

Step 02:
Stripe.com will send you a link to verify your email address and once your email address is verified you are ready to use stripe.com. Log in https://dashboard.stripe.com/login. after successful log in you will be redirected to an url like: https://dashboard.stripe.com/test/dashboard. right under the logo you will get a switching button to switch from Text to Live and vice versa. we will later discuss about it.

Step 03:
From left menu. General->Payments. Click "Create your first payment". In test mode, you cant enter any credit card number you wish. instead you have to use credit cards mentioned https://stripe.com/docs/testing. (For example, 4242424242424242 is a VISA Card)You can put blank CVC field and card expiration date can be any future date.

Step 04:
From left menu. General->Customer, Transfer, Recipient. you can create these from here.

Step 05:
From top right corner, beside your picture click on the down arrow. Click "Account Settings" click API Keys and collect secret and publishable keys from here.

Step 06:
Now download php library from https://github.com/stripe/stripe-php

Step 07:
Download very good 07 examples from https://github.com/stripe/wilde-things. i really appreciate their effort.


---------------------------------------------------------------------------------------------------------------

# Integrating CCAvenue with php

http://www.phpzag.com/ccavenue-payment-gateway-integration-in-php/

http://stackoverflow.com/questions/13858882/cc-avenue-php-integration-not-working

CCavenue is most popular Payment gateway for online Shopping. It provide payment through using International credit card as well using your Bank (who have bond with CCavenue) online Account or using its debit card(ATM card). It is one of the most secure place for given your money to online shop.

For Integrate it with your website you should have ccavenue account and they give you a merchant id and a unique key for your site that is most important for money transaction.

To integrate CCAvenue payment gateway in your website, you should have CCAvenue account and they will give you a merchant id and a unique key for your website to perform transaction. 

Also there are some input filed values are mandatory like Merchant_Id, Amount and Order_Id. The Merchant_Id and working key will be assigned to you by CCAvenue. Below is form with action URL to CCAvenue and input field with required values.

 CCAvenue claims to be the oldest Payment Gateway in India! CCAvenue, the world’s premier payment gateway solution was launched in 2001, & today, it is the largest and most popular online payment gateway solution in South Asia. With over 5000 websites relying on their services. 

 I have downloaded their Intergration kit, Included my merchant id and working key



Before integrating CCavenue payment gateway to your website, you have to create a CCavenue account to get Merchant ID and a Unique key required for money transaction.

Procedures and Steps to Integrate CCavenue Payment Gateway

1) Create an CCavenue account.

2) Verify your mobile and email.

3) Your account will be activated within one hour.

4) You will get username and password

5) CCavenue’s technical team will check your website and content and based and on that they will Authenticate you to use services.

Important: There are some document you need to provide them like one cancelled cheque, undertaking form etc.

6) After that they will give you Marchant ID, Working Key, Integration Plugin based on your website.

7) Upload the Integration Plugin to your Website Server.

10) Furnish it with details of Merchant ID and Unique Working Key.

11) CC Avenue Payment Gateway will be integrated to your website.




		
		
		
		