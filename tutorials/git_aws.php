<?php

https://github.com/CtinfoShubham31/

github.com
shubham.ctinfotech@gmail.com
CtinfoShubham31
webdunia88

# Linkdin
webdunia88

# Skype
sumsuser@gmail.com/ionic8890

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
Example: Suppose we want to remove file: "tst.html"
=> git rm --cached tst.html
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








