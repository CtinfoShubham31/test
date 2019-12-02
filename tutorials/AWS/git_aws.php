<?php

# https://github.com/CtinfoShubham31/

github.com
shubham.ctinfotech@gmail.com
CtinfoShubham31
webdunia88

# Linkdin
webdunia88

# Skype
sumsuser@gmail.com/ionic8890
shubham.sharma0340

# Godaddy
username - karnishm
password - Omsairam2@

Database : anggdb
User : angguser
Password : angg@user

http://mysqlgyan.com/blogging/youb/

# Udemy
https://cgdcx.udemy.com/angular-crash-course/learn/v4/content
vikram.c.singh@capgemini.com
TeHgdf@321

# https://www.hirist.com
shubham4destiny@gmail.com
myjobmail02

__________________________________________________________________________________
# Git Command
https://github.com/joshnh/Git-Commands

github.com is a cloud storage. It is a remote server.
https://www.youtube.com/watch?v=eL_0Ok_Gkas

How to sync that up to our local computer.

"git commit" adds your changes to local version control database. We have still not pushed these changes to remote server(github in this case)

"git difftool" shows diffrence between your local changes and previous version of the file.

# How undo, reset and revert.   
We will see how to,t
1) Undo uncommited changes.
git checkout -- first.php
git checkout -- .              //It will undo all the file changes

2) Undo commited changes,
git revert

get last commit it using "git log" command
git revert "commit id"

3) Resetting changes
git reset


https://www.youtube.com/watch?v=FdZecVxzJbk

?>

Why version control system is needed.
https://www.youtube.com/watch?v=-3XC1gX2n-E
<?php
Version Control System startted by Linux

# A way to keep track of changes in filesize
# Collaboration between developers
# Keep track of all WHO Did What
# Merge and Revert
# Easy recovery if something is messed up
?>

<?php 
# Make git repository
=> git init
Example:
$ git init
Initialized empty Git repository in E:/git_repo/.git/

Shubham@Shubham-PC MINGW64 /e/git_repo (master)

And one hidden file .git is created inside the folder.

# To display the hidden .git file
=> ls -a
./  ../  .git/

Now,
git config --global user.ema"shubham.ctinfotech@gmail.com"
git config --global user.name "CtinfoShubham31"

> Staging area is a file that stores information of the changes that need to be committed.

> The file contents should be added to the staging area, before commiting them.

> When we attain  a particular stage, we can save our work in the repository.

> Each commit is saved with the information of username, email-id, date, time and commit message.

> To see the log of our history:
git log 
it will show Author and Date
?>

Git and GitHub Training Introduction
<?php
Our all over code store in Central(machine) Location.

?>

(Spoken-Tutorial IIT Bombay) https://spoken-tutorial.org
Simple Basic Starting Process Of Git
<?php 
> Create a directory in your machine and make it as a repository.
> Create a text file and add content into it
> Add the file to the staging area of the Git repository
> Commit the file and
> See the commit details using "git log" command

# The git checkout command
> Add multiple files to Git repository
> Remove a file from Git repository
> Restore the removed file
> Discard the changes made to a file
> Revert to an earlier revision

1. Add multiple files to Git repository
=> git add .
Now modify, tst.html and test.html
=> git status
On branch master
Your branch is up to date with 'origin/master'.

Untracked files:
  (use "git add <file>..." to include in what will be committed)

        test.html
        tst.html

nothing added to commit but untracked files present (use "git add" to track)

=> git commit -a -m "Added two files"


# -a amd -m flags
> -a flag is used to add the files to the staging area
> -m flag is used to give commit message in the command line
> We can use the flags -a and -m as -am

# If we add some wrong file in the repo, so it can be easily remove.
Example: Suppose we want to remove file: "tst.html" from repository
=> git rm --cached tst.html
=> git status
=> rm tst.html	
=> git commit -m "deleted tst.html"

Now we again restore file "tst.html"

=> git checkout 42d56 tst.html
=> git status
=> git commit -m "Restore tst.html"
=> ls

?>

What is Git and GitHub
<?php 
Git is an version controlling system. and command line interface.

Github is cloud hosting service
?>

<?php 
git config --global user.email "shubham.ctinfotech@gmail.com"
git config --global user.name "CtinfoShubham31"

Above two command is used to just know who is working on project.
?>

Learn Git & Github Basics commands
<?php 

?>

Git Branch
<?php 
# Check How many branch are there
=> git branch
Example :
Shubham@Shubham-PC MINGW64 /e/git/test (master)
$ git branch
 b1
* master

# Create branch
=> git branch "branch_name"
Example: 
git branch b1

# Switch to branch
=> git checkout branch_name
Example :
$ git checkout b1
Switched to branch 'b1'

# upload changes of branch b1 to live(master) branch
=> git checkout master
Switched to branch 'master'
Your branch is up to date with 'origin/master'.

created file now removed from their location.
Now merge it
=> git merge b1
Updating 53a4561..8366f84
Fast-forward
 dummy_b1.php | 1 +
 1 file changed, 1 insertion(+)
 create mode 100644 dummy_b1.php

 And then,
 => git push

?>
git log
<?php 
# https://www.youtube.com/watch?v=kulnqUlp6GA
git log -oneline

# Merging and Deleting branches
https://www.youtube.com/watch?v=Uu6-6PIU3v4
?>


<?php 
=======================================================================================
===================================AWS=================================================
=======================================================================================
AWS Elastic Beanstalk.

Follow the steps below to deploy the demo application to an Elastic Beanstalk PHP environment. Accept the default settings unless indicated otherwise in the steps below:

Download the ZIP file from the Releases section of this repository.
Login to the Elastic Beanstalk Management Console
Click Create New Application and give your app a name and description
Choose 'PHP' in the 'Predefined configuration' dropdown and click Next
Upload the ZIP file downloaded in Step 1
Choose 'Create an RDS DB Instance with this environment' in the 'Additional Resources' step
Allocate 5GB of storage and provide a username and password for your database
Review and launch the application

AWS Elastic Beanstalk is an easy way to deploy and scale applications written in Python, Ruby, Java, Node.js, Go, or PHP in familiar environments like Apache, Nginx, Passenger, and IIS, without worrying about the infrastructure that runs those applications.

In this Lab, you will learn how to upload your code and deploy it with monitoring, auto-scaling, and load-balancing. Elastic Beanstalk is also free - you only pay for the AWS resources your application needs to run. Elastic Beanstalk lets you directly control the underlying AWS resources if required.

https://comtechies.com/how-to-host-a-dynamic-php-website-on-amazon-ec2-and-static-website-on-s3.html

https://comtechies.com/how-to-connect-an-amazon-ec2-ubuntu-linux-instances-using-putty.html

https://www.youtube.com/watch?v=ZHjOF4XBdiw

===========================================================================================
# AWS Lambda:

> It is automated version of EC2. 
> No worries about the underlying Architecture.
> For executing background tasks.


AWS Lambda as a serveless compute service, meaning the developers, don`t have to worry about which AWS resource to launch, or how will they manage them, they just put the code on lambda and it runs. it`s that simple! Although Lambhda can only be used to execute background tasks.
Example : Our aim is to create an application which will upload a file on S3, this file will be processed by Lambda and in turn will send you an email with all the files destails. 

(SelfTuts) => https://www.youtube.com/watch?v=4toBhwOj_48


> Function as a service Architecture. Basically this architecture is servless in nature. Which means a single function act as service. And there as no need to server. And that single function perform some action.

> Compute service from AWS. 
Means doing some logical calculation. So basically it`s comes under the compute section. 

Lambda function 
We r trying to send data to this simple function.
Data send through CLI to Lambda1 function, and this Lambda1 function has to responsiblity to write that data to our DynamoDB.
DynamoDB is the database provided by aws.


Now imagine we have a web app which upload images and user can upload that image like 5mb or 10mb, and if u want to show that images every where in your mobile and tab, that can cause a heavy lost of our bandwidth. So user has the ability to upload 5mb image size but what we do that every time out image comes through our s3 bucket then event is fired to that lambda function and that lambda function has the responsiblity to take that 5mb image and reduced the size of it. So the every time a new image come to amazon s3 bucket

> Don`t worry about infrastructure only focus on code.

> Auto Scaling.
Aws lambda function does the auto scaling part itself. Suppose the number of request increses, then aws lambda handle this.

> Pay for use
Aws charges only when Lambda function is run.

> We can write code using Either Node.js, Java, C# and Paython. 
=================================================================================================

The echo might be wrong, it`s been a while since I`ve used ===================================================================================================

?>
RDS 
<?php 
# Launch a RDS my sql instance (free tier) in default vpc.

# Launch a Amazon Linux EC2 instance (free tier) in default vpc with public IP.
?>

DNS
<?php 
Our system work with IP address. DNS server stored the IP address.
DNS Client - Laptop, Smart Phone Or Computer.

For ex, We open google.com. Then DNS client request to DNS server by sending google.com and resolve it and replay to DNS client after 

Whe you type in a web address, e.g., google.com 
Our computer send this query to DNS server 
?>

Security Group
<?php 

It`s a policy. Amazon Firewall.
AWS Security Groups are a flexible tool to help you secure your Amazon EC2 instances.
AWS Security Groups act like a firewall for your Amazon EC2 instances controlling both inbound and outbound traffic.
When you launch an instance on Amazon EC2, you need to assign it to a particular security group.

After that, you can set up ports and protocols, which remain open for users and computers over the internet.
?>

RDS Dashboard
<?php 
RDS > Launch DB Instance >
Select Engine

# UserName/Password/DB Instance = mysqldb2018

# Launch a RDS MYSQL instance (free tier) in derfault VPC.

> Click RDS 
1. Create Database 
2. Select Engine - Tic Only enable options eligible for RDS Free Usage Tier. And Choose Mysql and Next button.
3. Specify DB Details
   - DB Engine(MySql 8.0.11).
   The Amazon RDS free Tier provides a single db.t2.micro instance as well as upto 20 GB storage.
   - Settings
	DB instance identifier : mysqldb2018
	Master username : mysqldb2018
	Master Password : mysqldb2018
	Confirm Password : mysqldb2018
   
   NEXT 
   
4. Configure Advanced Settings
- Network & Security : 
	Virtual Cloud Private(VPC) : Default VPC
	Subnet group : Default
	Public Accessibility : No
	Availablity Zone : us-east 1a
	VPC Security Group: Create new VPC security group.
	
- Database Option
     Database name: Leave empty 
	 Port: 3306
	 
- Backup

- Deletion Protection
  Unchecked
  
  
Click on >Create Database   

Now Your DB instance is being created.
Lets go and view the instance details.


Connect > Endpoint

	 

# Launch a Amazon Linux EC2 instance (free tier) in default VPC with Public IP.
Click EC2
Click On "Launch Instance" button

STEP 1. Choose an Amazon Machine Image(AMI)
Tic Free Tier Only. And Select "Amazon Linux 2 AMI(HVM), SSD Volume Type".

STEP 2. Choose an Instance Type
Family : General Purpose
Type   : t2.micro
vCPUs  : 1
Memory(GiB) : 1
Instance Storage : EBS only

STEP 3. Configure Instance Details
Number of instance : 1
Subnet : Same as We choose in RDS => subnet-d5485 | Default in us-east 1a
Auto-assign public IP : Enable

And Click on 'Add Storage' Button


STEP 4. Add Storage

STEP 5. Add Tags
Key : Name
Value : EC2 - MySql

STEP 6. Configure Security Group 
Security Group Name : EC2-Mysql-SG
Description :  EC2-Mysql-SG

Rules
Type : SSH
Protocol : TCP
Port Range : 22

But. Sice we will be need to connect RDS instance.
We Create another rule => 
Type: Mysql/Auror
Protocol : TCP
Port Range : 3306

Now, Click on 'Review & Launch'.

We gonna use AWS key pair. Tic and Launch Instances.

After that, 

Instances > 
IPv4 Public IP : 34201.114.46
Copy that Public IP.

# Connect to our Linux instance via SSH.
Now we will connect putty.exe click

Putty Configuration POPup Box will Appear.
Host Name Ip Address : 34201.114.46.

And Go to SSH and Choose auth and the select Private key authentication => Privatekey.ppk and click on open and click on yes.
Black window will appear.
loadin as: ec2-user

NOW WE ARE IN OUR EC2 INSTANCE
The first thing we will do change our root user as => sudo su



# Install MySql Client on your EC2 instance.
Black Screen
Install Mysql :
Command : yum install mysql


# Connect to our Mysql RDS instance.
Click RDS > instances 

Endpoint : mysqldb2018.....rds.amazonaws.com

copy that endpoint

Now, This is the command to connect to our mysql server using mysql client
=> mysql -h <<mysql instance dns>> -P 3306 -u mysqldb2018 -p
=> mysql -h mysqldb2018.....rds.amazonaws.com -P 3306 -u mysqldb2018 -p

Now go back to our ssh window.
mysql -h mysqldb2018.....rds.amazonaws.com -P 3306 -u mysqldb2018 -p  
Enter 
Password : mysqldb2018

Now we r in our mysql propmt.

Now Lets us Click on security group. If I click on inbound, we will see the type is MYSQL/Aurora , Protocol: TCP, Source : 73.178.97.123/32 is the IP address of RDs Instance.
Edit
Source => Custom : sg-01291ea5293 Ec2mysqlsg  So we r able to connect our EC2 instance.

mysql -h mysqldb2018.....rds.amazonaws.com -P 3306 -u mysqldb2018 -p  
Now  we r able to connect our mysql server.
?>

================================================================================

<?php 
# EC2 instance: 
A virtual server on Amazone`s Elastic Compute Cloud (EC2) to run your business software.

# Key pair: 
The EC2 platform uses a public key cryptography algorithm to encrypt and decrypt the login info. According to this, the public key encrypts a piece of data (read a password) while the recipient uses a private key to decrypt the same. The combination of public and private keys are called a key pair.

# SSH: 
Known as Secure Shell, SSH is a network protocol to operate secured network services in a client-server architecture. The examples are accessing the shell accounts on multi operating systems like Unix.

# Puttygen software: 
As a key generator and a free and open source network file transfer application, it generates key pairs related to public and private keys.

# how to use Amazon AWS EC2 for deploying servers very quickly, and getting Apache, PHP, and MySQL setup & configured. 
https://www.webguru-india.com/blog/hosting-your-site-on-the-aws-cloud-server-a-tutorial/
https://rapidpurple.com/tutorials/linux-server-tutorials/setup-linux-amazon-ec2-apache-php-mysql/

# AWS Lambda
AWS Lambda is a service which computes the code without any server. It is said to be serverless compute. The code is executed based on the response of events in AWS services such as adding/removing files in S3 bucket, updating Amazon DynamoDB tables, HTTP request from Amazon API Gateway etc.
To get working with AWS Lambda, we just have to push the code in AWS Lambda service. All other tasks and resources such as infrastructure, operating system, maintenance of server, code monitoring, logs and security is taken care by AWS.

- Upload AWS lambda code in any of languages AWS lambda supports, that is NodeJS, Java, Python, C# and Go.

- Executes AWS Lambda Code only when triggered by AWS services under the scenarios such as −

1. User uploads files in S3 bucket
2. http get/post endpoint URL is hit
3. data is added/updated/deleted in dynamo dB tables
4. push notification
5. data streams collection
6. hosting of website
7. email sending
8. mobile app, etc.

- AWS Lambda is a Stateless Serverless system which helps us run our background tasks in the most efficient manner possible.

- Remember that AWS charges only when the AWS lambda code executes, and not otherwise.

#
AWS Elastic Beanstalk, It is a stateful system.

#  What is Amazon Elastic Load Balancer (ELB)
Amazon ELB allows you to make your applications highly available by using health checks and distributing traffic across a number of instances.

Consider that you have a WordPress blog which is running on a single t2-micro EC2 instance.

Now you publish an article, it goes viral and your site gets hundreds of thousands of requests. Since you are using a single t2-micro, your website will probably crash.

So, what can you do to avoid this?

You may decide to launch a larger instance like an m5-large in place of t2-micro. This is called vertical scaling when you replace an instance with a more powerful instance.

But vertical scaling isn’t always economical.

Another approach can be to use a bunch of smaller instances like t2-micros and distribute the website traffic between them. And Elastic Load Balancer allows you to do just that. Load balancer automatically scales up your resource which is sufficient enough to handle the large incoming traffic. 

There are three types of Elastic Load Balancers available.
1. Classic Load Balancer(CLB)
2. Application Load Balancer
3. Network Load Balancer

https://www.edureka.co/blog/elastic-load-balancer-tutorial-application-load-balancer
?>

==============================================================================
AWS Security Groups
<?php 
A security group is a set of firewall rules that control the traffic for your instance. On this page, You can add rules to allow specific traffic to reach your instance. For example you want to set up a webserver and allow Internet traffic to reach your instance, add rules that allow unrestricted access to the HTTP and HTTPS ports.
- Aws firewall solution
- Filters incoming and outgoing traffic from an instance. 
- IP protocols, ports and source/destination IP addresses

Type : SSH(Secured Shell) default protocol, Through which we can get secure access to remote Linux machine. And SSH always communicate to TCP(Protocol) And Port 22 . And Using SSH we can get route access to this Linux instance.
- Http communicate through port 80
- Https communicate through port 443.
- Any IP can access through the internet. If we set Source = "Anywhere"
WARNING => Rules with source of 0.0.0.0/0 allow all IP addresses to access your instance. We recommend setting security group rules to allow access from unknown IP addresses only.

If we choose source = My IP it will automtically show the IP. Or choose custom IP. 103.57.84.0/24 (84.1 - 84.255 => 256 IP address would be authorized to access it)

If route access is window system the TYPE = RDP(Remote Desktop Protocol)

# Inbound Rules:

Type 		Protocol	Port Range		Source
SSH			TCP			22				Custom(103.57.84.0/24)
Http		TCP			80				Anywhere(0.0.0.0/0 , ::/0)
Https		TCP			443				Anywhere(0.0.0.0/0 , ::/0)

After Launch instances we add outbound rule.
?>

























