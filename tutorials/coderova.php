<?php

# Cordova:
Apache Cordova is a mobile application development framework originally created by Nitobi.

Cordova is a platform that is used for building mobile apps using HTML, CSS and JS. We can think of Cordova as a container for connecting our web app with native mobile functionalities. Web applications cannot use native mobile functionalities by default. This is where Cordova comes into picture. It offers a bridge for connection between web app and mobile device. By using Cordova, we can make hybrid mobile apps that can use camera, geolocation, file system, GPS, Accelerometer , Contacts  and other native mobile functions.

Cordova ,formerly called as Phone Gap is a platform to build Native Mobile Applicatons using HTML5, CSS and Java Script. Typically Web applications cannot use the native device functionality like Camera, GPS, Accelerometer , Contacts etc. With Cordova we can very much achieve this and package the web application in the devices installer format.

# Device installer formats :
Android – .apk (Android Application Package)
IOS – .ipa (iPhone Application Archive) 
Windows Phone .xap (Silverlight Application Package) 

# Are PhoneGap and Apache Cordova different ?
Both are the same . But we can say that Apache Cordova as an engine that powers PhoneGap , like how Webkit is an engine that powers Chrome.

# But my Application Requirement is not completely satisfied with the list of plugins API ‘s available. How should i proceed ?
No problem . It is completely extensible . If cordova does not provide an API to complete your Application requirement , then a custom Native Plugin can be created and used.

# Cordova Core Components
Cordova offers a set of core components that every mobile application needs. These components will be used for creating base of the app so we can spend more time to implement our own logic.

# Cordova Plugins
Cordova offers API that will be used for implementing native mobile functions to our JavaScript app.

# To install cordova
npm install -g cordova

Cordova is the framwork for mobile application. which is run on all the native application.

# To create an application:
cordova create MyApp com.app.myapp MyApp



# Run application on web platform
cordvoa serve

cordvoa platform add android

# Android Studio for sdk
sdk pathh need be setup

ANDROID_HOME and JAVA_HOME in environment variable.