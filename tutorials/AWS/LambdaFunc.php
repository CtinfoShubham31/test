<?php 
# Where is Lambda used?
==================================================
Simplilearn
https://www.youtube.com/watch?v=97q30JjEq9Y  -------------(good)
==================================================

AWS Lambda is used to process images when it`s uploaded.

Adding images into s3 bucket => AWS Lambda is triggered => The images are processed and converted into Thumbnails based on the device.

Another use Lambda is to used analyze social media data



Here clients send data to Lambda. and client could be any one who`s sending requests to AWS Lambda. It could be an application or other Amzon services. 
And Lambda receive the services and depending on the size of the data and depending upon the amount or volume of data it runs on the defined number of containers if is it a single request.
So these request are given to a container to handle. A container contains the code the user has provided to satisfy the query.


You are only chared for the amount of time that a function running inside these container.

Creating two s3 buckets. So here one of the bucket is the source(Where the data is uploaded) and the other one is where the data is to be backed up.
And Create IAM role and policies.
Create a Lambda function to copy files between buckets.

This Lambda function is invoked every time there`s upload into the bucket.This data is uploaded into the backed up bucket.



We dont have to worry about server. We dont have to worry about scaling. It automatically scals up and scales down









?>