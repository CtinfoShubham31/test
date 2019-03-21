<?php

# Credential:
USERNAME: gaurav@rocsdev.tekeniko.solutions
HOST NAME: rocsdev.tekeniko.solutions
PORT NUMBER: 22222

# https://rocsdev.tekeniko.solutions
rocs@rocsweb.com
111222333

# For installing process of mongodb
http://carlofontanos.com/installing-mongodb-in-xampp-windows/
https://www.journaldev.com/6128/install-mongodb-windows-start-uninstall
https://stackoverflow.com/questions/2404742/how-to-install-mongodb-on-windows

https://www.youtube.com/watch?v=sReI0-QnDJk				
http://www.solutionsatexperts.com/mongodb-installation-steps-on-windows-7/  ------(Good)

https://www.youtube.com/watch?v=Phe9B2HRVmc  ------(Good)

# Uninstall MongoDB Windows
C:\mongodb\bin\mongod.exe --config C:\mongodb\mongod.conf --remove


#
Start MongoDB in your command prompt by executing the following command: 
C:\mongodb\bin\mongod.exe

To start MongoDB, open the command prompt and write the following statements there:
C:\>cd mongodb\bin
C:\mongodb\bin> mongod

Now after that start and stop the service MongoDB via command line:
net start MongoDB
net stop MongoDB

# Invoke another cmd command window to establish connection to database terminal shell
c:\mongodb\bin\mongo.exe

>show databases;

# For show all dbs
> show dbs

# Display all collections
> show collections

# Switch to db 
use dbname


# MongoClient, connect with '@' in password
new MongoClient("mongodb://localhost:27017", array("username" => "joe", "password" => "test"));

# Download center like - msvcp140 (64-Bit) dll and vcruntime140.dll (64-Bit)
https://www.sts-tutorial.com/sites/downloadCenter.php

# Import json
https://stackoverflow.com/questions/15171622/mongoimport-of-json-file

mongorestore -d databasename /Path/databasefoldername

Example:
C:\mongodb\bin>mongorestore -d rocsDB c:/mongodb/rocsDB

# Backup the training database
mongodump --db training

# Restore the training database to a new database called training2
mongorestore --db training2 dump/training

# Drop db name and it's json
mongorestore --drop -d  databasename /Path/databasefoldername

# mongorestore  -d databasename  /Path/databasefoldername

# Drop the collection name
>db.mycollection.drop()
here, mycollection is the name of collection.

# To dump your database for backup you call this command on your terminal
mongodump --db database_name --collection collection_name
mongodump --db rocsDB --collection User

# To import your backup file to mongodb you can use the following command on your terminal
mongorestore --db database_name path_to_bson_file

# 
use rocsDB;
db.getCollection("User").find({});

# Mongodb Find Query Example:
http://makble.com/mongodb-find-query-examples-with-php

# Use a regular expression:
db.streets.find( { street_name : /^Al/i } );
or:

db.streets.find( { street_name : { $regex : '^Al', $options: 'i' } } );
http://www.mongodb.org/display/DOCS/Advanced+Queries#AdvancedQueries-RegularExpressions

Turning this into PHP:

$regex = new MongoRegex("/^Al/i");
$collection->find(array('street_name' => $regex));

# How to escape special characters using Mongo regex in PHP format
It seems it uses PCRE style expressions, in that case preg_quote is used:

new MongoRegex("/".preg_quote($hotel_name, '/')."/i")

# Mongo date: 
http://php.net/manual/en/class.mongodate.php
https://stackoverflow.com/questions/38563329/mongodb-isodate-query-with-php
https://stackoverflow.com/questions/32977181/mongodb-php-aggregation-empty-results-with-date-lte-gte-in-match
https://stackoverflow.com/questions/2008032/mongodb-query-with-an-or-condition


Just thought I'd update in-case anyone stumbles across this page in the future. As of 1.5.3, mongo now supports a real $or operator: http://www.mongodb.org/display/DOCS/Advanced+Queries#AdvancedQueries-%24or
'
Your query of "(expires >= Now()) OR (expires IS NULL)" can now be rendered as:

{$or: [{expires: {$gte: new Date()}}, {expires: null}]}

# Mongodb php query, search in array:
https://stackoverflow.com/questions/8561147/mongodb-php-query-search-in-array
$answers = $collection->find( array('formId' => 6, '$or' => array('answers.field1'=> 'Henrik', 'answers.field6' => 'Henrik', 'answers.field7' => 'Henrik')));

# Remove all Documents
If you want to remove all the documents from a collection but does not want to remove the collection itself then you can use remove() method like this:

db.collection_name.remove({})

# STUDIO 3T SQL QUERY Example
https://studio3t.com/knowledge-base/articles/sql-query/

# Sort by date:
db.getCollection("Learner").find({}).sort({date_of_registration: -1}).skip(0).limit(50);

# Save isodate in mongoDB:

$stringtime = "2016-04-09 00:00:00";

$inputdate = strtotime($stringtime);

echo $r = new MongoDate($inputdate);die;

# Get single data with sorting by date:
db.getCollection("Traffic").find({"code_nrc" : "503047521"}).limit(1).sort({ time_stamp: -1 })

# Mongo query for update:
db.Learner.update({_id:ObjectId("5b3e9304b0a2971b6dcab557")}, {$set: {"firstname" : "Patrickkk"}})

# Mongo query for delete:
$collection->remove(array('_id'=> new MongoID( '51ee74e944670a09028d4fc9' )));

==============================================================================================================
QUERIES EQUAL:


###############
select *
from Traffic where (senders_number LIKE'%260955771123%' OR message LIKE'%260955771123%') AND (isValid='invalid') ;
// Requires official MongoShell 3.6+
use rocsDB;
db.getCollection("Traffic").find(
    { 
        "$or" : [
            {
                "senders_number" : /^.*260955771123.*$/i
            }, 
            {
                "message" : /^.*260955771123.*$/i
            }
        ], 
        "isValid" : "invalid"
    }
);






================================================================================================================
--------------------------------------------------------------------------------------------------------------
<h1>Application error:</h1>Failed to connect to: localhost:27017: SASL Authentication failed on database
 'rocsDB': Authentication failed.

<h1>Application error:</h1>Failed to connect to: localhost:27017: SASL Authentication failed on database
 'mongodb/database/rocsDB': Invalid database name: 'mongodb/database/rocsDB'

<h1>Application error:</h1>Failed to connect to: localhost:27017: SASL Authentication failed on database
 'rocsDB': Authentication failed.


<h1>Application error:</h1>Failed to connect to: localhost:27017: No connection could be made because
 the target machine actively refused it.





signin
print_r($UserData);die('SSS');


mongoimport --db dbName --collection collectionName --file fileName.json --jsonArray

mongoimport --db local --collection articles --file ActivityLog.metadata.json --jsonArray



db.getCollection("Traffic").find({ senders_number: 3})

db.getCollection("User").find("type" : { "$in": ["WebUser", "User"] })

170108181

db.emp.find({
    "type" : { "$in": ["WebUser", "User"] },
    "city" : { "$in": ["Pune", "Mumbai"] }
})

use rocsDB;
db.getCollection("Traffic").find(
    { 
        "contactAuthorisation" : "unauthorized"
    }
);


db.car.find( { _id: 3} )

https://www.journaldev.com/6178/mongodb-find

rocs@rocsweb.com





# We have three types of system users, that is administrator , coordinator, followers. Adm has unlimiterd access, this are the superuser of the system. They can view any data and edit, create, delete any data they want.
Adminsistrator can see any data in any province





var_dump($collection->findOne(array('name' => 'john', 'password' => '334c4a4c42fdb79d7ebc3e73b517e6f8')));

https://stackoverflow.com/questions/10836637/convert-html-to-csv-in-php





ssh-rsa AAAAB3NzaC1yc2EAAAABJQAAAQEA8tcoBhgIwMirQmSFS9tCtCeF+2/g4t0gUsi7ZMl+NPIW4o+5aw7obOfrRdMqHou+BX7/urGo6Rgc9QnCapDIjHOXXDL+gI2XYrNj+uTlQRaLAXZUizUP2UYyLBWJTOD0HlMsZwyAa0LW4Bj2UOUwsJBL1LpMhzIhDvgcrUts/7mFBHahLUbeqrnvdDLsjTFA7QI7FmfvNbvLNcBTObFtuJth5id0Wk2iw890HPePW7CfEQNtmXY14uD1n36wq/CVSXj4VLRiEgTQQ+Ih8Sw5vPij7owh+3tYRVXvC5cydKlCAZ4ezBqYdcCrpRpOVaEMq2S7eqeVIDUfUtzpNWuRNw== rsa-key-20181010

#####################################################################################

Issues:Traffic
# Add logo in login page.
# Traffic > Remove blank column in excel sheet. -----------(Done)
# Traffic > Downloaded excel sheet name should be new and unique. -----------(Done)
# Scroll horizontally from the top.
# Traffic > When tick only invalid check-box it take all data simultaneously, which take more to load all data, should be load-more button there.
# Show latest date first.
# Traffic > Search by sender phone not data found return. ---------(Done)

Issues:Learners
# Scroll horizontally from the top

----------------------------------------------------------------------

General requirments for all sections

# A “+” should be automatically added in front of the contact number from CSV or Web form(though this should be working). If there is no plus the system will not work accordingly.

# Date of registration should be automatically inserted into the DB using current date whether its data entered via CSV or via Web Form.

# Remove excess columns from Exported CSV (for results or retained data) without
headings.

# Remove Administrator, Co-ordinator, Follower, Learner buttons at the top right corner of each page. See picture below:
-------------(Done) //tab.php

# Only Province Name should show and not Province Code e.g. in the picture below, WEP(instead of Western Province) and LUP(Instead of Lusaka Province) are showing:
Province Code is for coding purposes only, not display.
--------------

# “Date of User Update” field should be added and updated to the current date every time an update happens or to the same date as “Date of User Creation” if its a new record.

# All data entered via web forms or CSV should be inserted to the database as STRING.
No other format, apart from the date fields. Contact number fields should be STRING because of the “+”.

# Fix horizontal scroll bar to also respond to left and right arrow keys and/or also make it floating like the right hand vertical scroll bar is made.
-----------(Done)

# Also make load more work when results are loaded through use of filters, to avoid the
user waiting for a long time. See how that works when no filters are applied.
-----------(Loadmore)

# Fix email verification to include all the current valid domain names e.g. .solutions, .mobi, .tv etc.
-------------(Done learner section) //addlearner/index.tpl

# An extra is thicken the right hand side vertical scroll bar slightly.
-----------(Done) //assets/sl/js/scripts.js

# Improve loading speed for all pages.
---------------(Loading speed)


2. Learners Management


3. COMMON POINTS:

Implement unique and meaningful naming for the sample file being downloaded e.g. for Administrators, it can be named ROCS_Admins_Upload_YYYYMMDD_XXX.csv where YYYY equals current year, MM equals current month, DD equals current date and XXX equals the numbers of times the user has downloaded that file on that day, starting with 000 as the first and 999 as the last download for sample upload file and ROCS_Admins_Export_YYYYMMDD_XXX.csv where YYYY equals current year, MM equals current month, DD equals current date and XXX equals the numbers of times the user has downloaded that file on that day, starting with 000 as the first and 999 as the last download for Export file.

4. Administrator Management:
> Administrators

# Only data for Administrators should be returned.
----------(Done)

# Fix “Search by Keyword” not working. One should be able to search using any keyword
e.g. first or last name, nrc, district, province, contact number etc. Whether its a partial or complete word or number(i.e. contact number or nrc number).
----------(Done)

# Fix both province and district filters to only return Administrator data only. Currently it is also picking data for other users.
----------(Done)

# When “Edit” is clicked, editable fields should be the same as those found on both the
web form and CSV add Administrator. At the moment, the presented fields on “Edit” are much fewer than the required.
----------(Done)


> Add Administrator
# User name should not be just restricted to email, but the user should also be able to use
contact number or nrc aswell.

# From CSV Administrator creation form, “date_of_user_creation” field should be done away with and the date should be automatically inserted using current date.
----------(Done)



# A method to auto-generate a password at user creation should be created and the created password should be both SMSed(this system already exists, API details shall be shared) and emailed(for those with valid emails) to user upon creation and should be resent when user clicks “forgot password” at login.
---------(Disscuss with client)

# Implement unique and meaningful naming for the sample file being downloaded e.g. for Administrators, it can be named ROCS_Admins_Upload_YYYYMMDD_XXX.csv where YYYY equals current year, MM equals current month, DD equals current date and XXX equals the numbers of times the user has downloaded that file on that day, starting with 000 as the first and 999 as the last download for sample upload file and ROCS_Admins_Export_YYYYMMDD_XXX.csv where YYYY equals current year, MM equals current month, DD equals current date and XXX equals the numbers of times the user has downloaded that file on that day, starting with 000 as the first and 999 as the last download for Export file.
----------(Done)

> File Upload:
- csv/admin.csv


5. Coordinators Management
> Coordinators
# Fix “Load More” button and functionality
-------(Done)
# Fix “Search by Keyword” not working. One should be able to search using any keyword
e.g. first or last name, nrc, district, province, contact number etc. Whether its a partial or complete word or number(i.e. contact number or nrc number).
-------(Done)
# Fix “Function” filter returning nothing.
-------(Done)
# Fix “Date” filter returning nothing.
-------(Done)
# Add missing fields to what’s being displayed. These are NRC, user category and function
-------(Done)
# “Function” Field should be made optional in in the “Edit” window as it is for both Web
and CSV forms.
-------(Done)
# “Function” field on web form and edit window should be changed from dropdown menu to allow manual entry with auto-completion options when two or more characters are entered.
---------(Done)
# “Edit” window should auto update with current record’s data. Currently province is not being picked.
-------(Done)

# Add missing headers to exported CSV which are, NRC, user category and function.
-------(Done)

> Add Coordinators
# “Email Address(Required)” should be optional for both CSV and web form and if left blank should be automatically generated as {Learner’s NRC Number}@rocs.web replace {Learner’s NRC Number} with the actual NRC number of the Learner as input in the web form or CSV.
-------(Done)

# Implement unique and meaningful naming for the sample file being downloaded e.g. for Coordinators, it can be named ROCS_Coordinators_Upload_YYYYMMDD_XXX.csv where YYYY equals current year, MM equals current month, DD equals current date and XXX equals the numbers of times the user has downloaded that file on that day, starting with 000 as the first and 999 as the last download for sample upload file and ROCS_Coordinators_Export_YYYYMMDD_XXX.csv where YYYY equals current year, MM equals current month, DD equals current date and XXX equals the numbers of times the user has downloaded that file on that day, starting with 000 as the first and 999 as the last download for Export file.

-------(Done)


# A method to auto-generate a password at user creation should be created and the created password should be both SMSed(this system already exists, API details shall be shared) and emailed(for those with valid emails) to user upon creation and should be resent when user clicks “forgot password” at login.
----------(Discuss)


ADD LEARNER:

# “Date Of Appointment(Required)” on web form and edit window should be changed to year only so that it tallies with those uploaded by CSV.
-------(Done)

# “Zone(Required)” on web form and edit window should be changed from dropdown
menu to allow manual entry with auto-completion options when two or more characters are entered.

# “Name of School(Required)” on web form and edit window should be changed from dropdown menu to allow manual entry with auto-completion options when two or more characters are entered.

# “EMIS(Required)” on web form and edit window should be changed from dropdown menu to allow manual entry with auto-completion options when two or more characters are entered.

# “Direct Facilitator(Required)” on web form and edit window should be changed from dropdown menu to allow manual entry with auto-completion options when two or more characters are entered.

# “Tablet Serial Number(Required)” on web form and edit window should have auto- completion option added when two or more characters are entered.

# “Email Address(Required)” should be optional for both CSV and web form and if left
blank should be automatically generated as {Learner’s NRC Number}@rocs.web replace {Learner’s NRC Number} with the actual NRC number of the Learner as input in the web form or CSV.


> Learners
# Fix “Search by Keyword” to search for any word or number input.

# Fix Search by “Learner’s NRC #” so that results for a user can be returned using the “NRC” field.

# Fix Search by “Tablet Serial #” so that Learner’s using the same tablet can be retrieved
when the serial number of the tablet is entered.

# Fix “Province” filter so that all results for that particular province are returned. At the moment only few results are returned and it seem to search for the Province as District
e.g. search for Lusaka Province only brings results which also have Lusaka as District. A
check in in the database will show you that there are far more results from Lusaka Province.

# Fix “District” filter to return correct results for the particular district being searched for.
e.g. search for Kafue District under Lusaka Province only brings out results for Lusaka District(which is wrong) and nothing for Kafue District.

# Fix “Zone” filter to get correct zone data.

# Fix “School” Filter to get correct data.

# Fix “EMIS” Filter to get correct data. At the moment even other data is being returned where EMIS is not what was entered in the search.

# Fix “Direct Facilitator” Filter to return the correct data.

# Fix “Highest Level of Education” Filter to return correct data. At the moment no data is returned.

# Fix the gender ticks i.e. “Male” or “Female” to return data for only the selected gender.
At the moment tick male only also returns results with female and vice versa.

# Fix “Government School” and “Community school” to return correct results. At the moment ticking “Government School” only also returns results with “Community school” and vice versa.

# Add Filter by “Date of Registration”




Array ( [load] => learners/export ) zzqqq


valid - 45285
invalid - 8617

53092


Queries:
We have option for Date Of Appointment and email field in add learner section
but this field not available in learner database table. My question is both field have useful or not?


<select class="form-control chosen-select" name="zone" id="zone">
	
</select>

<link href="<?php echo BASE_BACK; ?>css/chosen.css" rel="stylesheet">
<script src="<?php echo BASE_BACK; ?>js/chosen.jquery.js"></script>

<a href="<?php echo BASE_HREF;?>addadministrator/csvSample?module_name=1">[Sample]</a>

//echo $_GET['load'];
        if(!empty($_GET['load'])){
            $str_arr = explode('/', $_GET['load']);
            $module = end($str_arr);
<a href="<?php echo BASE_HREF;?>addadministrator/csvSample/1">[Sample]</a>
<a href="<?php echo BASE_HREF;?>addadministrator/csvSample/2">[Sample]</a>
<a href="<?php echo BASE_HREF;?>addadministrator/csvSample/3">[Sample]</a>


Hi Mundiya,
Following Points below is done.

# Traffic > Search by date.
# An extra is thicken the right hand side vertical scroll bar slightly.
# Fix horizontal scroll bar to also respond to left and right arrow keys and/or also make it floating like the right hand vertical scroll bar is made.
# Add logo in login page.



require '/var/www/html/vendor/autoload.php';   
$m = new MongoClient(MONGO_URL, array("username" => MONGO_USER , "password" => MONGO_PASS));





















///////////////////////////////////CLIENT/////////////////////////////////////////////
Date:12oct2018

Ok, I will have a look.

I can always increase the memory for the development server, but it is imperative that you start working from the server ASAP. Otherwise you wont be able to access some resources needed for the job.

You may update the code on the server for me so that I may also check it from there.

 Please note on the credentials in config.php should not be over written.

You may use rsync, scp, sftp or whatever you prefer.

i.e. via ssh.

/////////////////////////////////////////////////////////////////////////////////////

Date: 14oct2018

From the contract you signed for saturday as a working day!

Please read the contract.

Anyway a quick questions

1. What do the numbers mean when you are exporting a csv?

I had given what each file exported from each section should be called.

For traffic:

Implement unique and meaningful naming
ROCS_Traffic_Export_YYYYMMDD_XXX.csv where YYYY equals current year, MM
equals current month, DD equals current date and XXX equals the numbers of times the user
has downloaded that file on that day, starting with 000 as the first and 999 as the last
download for Export file.

Each section has an explanation of what the files should be called, please implement likewise.

2. For search keyword, can search any field, or is just the contact number field?

The search should actually be for any keyword, in any field: nrc, date, message, etc.

NOTES:
● A working day shall be defined as as any day from Monday to Saturday,
both days inclusive.
● Sunday shall not be counted as a working day.
● Deadline for all works is twenty(20) working days.
● If the project shall be completed in fifteen(15) working days, a bonus of
$100(One hundred Dollars) shall be added to the above mentioned total
amount.
● If the project shall be delivered between fifteen(15) and twenty(20)
working days, a bonus of $50(Fifty Dollars) shall be added to the above
mentioned total amount.
● If the project is delivered beyond twenty(20) working days, a penalty of
$100(One hundred Dollars) shall be deducted from the above mentioned
total amount.



So originally, 20 days ends 25th of October, 2018

15 days is on 19th of October, 2018

Yeah..i am facing problem here and haven't started yet. We can wrap up the configuration and start from monday.
Gaurav Sharma, 10/6/2018

But since you asked to start Monday 8th, October, 2018:

20 days ends on 30th October, 2018

and 15 days is on 24th October, 2018.

Please take note of these dates!

////////////////////////////////////////////////////////////////////////////////////////
'
Number of active learner in the last 10 days register.
How many number of learner active from the last date of registration.
===========================================================================================================

# admin_charts & reports
- Number of tablet active in the last 10 days out of number of delivered tablets.	(Active and In-active) (Circle)

- Number of learners active in the last 10 days out of number of learners registered.
(Circle - Active and Inactive) (Pie statistic - Active, Inactive and All)

- Average number of tests done out of number of test expected at that time.
(Circle - Done and Not Done) (Pie statistic - Done, Not Done and All)

-visit Reports
When Visit report is chosen, a new drop-down menu appears where a particular visit report may be
picked and the filters may also still be used to get the desired results.

Report performed by 
(1) Situation of monitoring	visit
(2) # Teacher at school
(3) Performance with tablet
(4) Performance with test codes
(5) Most Virulent Questions by Teachers


==========================================================================================================

Hi @Gaurav  and @Shubham! Will you be able to finish these changes today? So that Monday we finish off on user access control(Admins, Coordinators and Follower), I will give guidance on this on Sunday, but you should still feel free to seek any clarity.

# For CSV upload, if upload a learner with the same NRC does the same user get updated? This should be the functionality.
=> Extra time.

# When Province and District are already chosen, please filter the zone data to only have zones from that particular district only.
=> Extra time.

# Also, I have noticed that last number used is showing NA  in every record. last phone number used should be picked from the traffic DB. search by NRC pick the latest message received and pick the number which was used.
=> Extra time.

===========================================================================================================
# For CSV upload, if upload a learner with the same NRC does the same user get updated? This should be the functionality.
=> Extra time.

# When Province and District are already chosen, please filter the zone data to only have zones from that particular district only.
=> Extra time.

# Also, I have noticed that last number used is showing NA  in every record. last phone number used should be picked from the traffic DB. search by NRC pick the latest message received and pick the number which was used.
--------(Done)

UNSERSTANDING => When you check the traffic DB you shall see, NRC field, that is the same as NRC field you find in Learner DB. NRC which stands for National Registration Card Number, is a unique number identifying each individual in Zambia and is unique to each person. No two people can hold the same NRC.

The traffic DB receives Sms from learners everyday.

100s come through everyday.

So you pick the last number used to send the Sms by the learner, who shall be identified by NRC, and pick the number from the last message sent in by that paarticular learner.

On the other hand, Contact Number, is the number the learner registers as being there own during registration, either via Sms or add learner form or CSV upload. So these two numbers are different.

ME => what I understand that, I will search nrc in traffic(module) and pick up the latest sender phone as last phone number and put it into learner (module) row "Last Phone Number Used" column   
=> Extra time.

# PS: Contact Number, Tablet Serial Number, Direct Facilitator and Email Address fields are missing in CSV upload form.
Please add those aswell.
=> direct, tabsernum, email
******(Under Testing)*******

# When in Edit screen, the main scroll bar keep coming in the way of the edit form scroll bar. Please hide the main scroll bar permanently when in the edit for until one exits it.
=> Design.

# Also ensure that the current province for the user is auto picked like the other fields, instead of the user being forced to pick again. This is still in the Edit Form. Same the email field, same comment as above.
******(Under Testing)*******

# Also Highest level of Education is missing from Edit form hence causing the form to insert wrong data in the field. 
=> It's working already.
'

I have also noticed, that what I enterd as Contact number:

in the edit window or web form is displayed as last phone number used.

This is not correct! Actually we need to add a new column just between "NRC#" and "Last Phone Number Used" and this column shall be called "Contact Number" and this is where the contact number entered in Edit form, Add Learner Form and CSV shall be displayed.

"Last Phone Number Used" is to be retrieved as I descrebed ealier above, fro the traffic table.


Hi mundiya, Some points you mention in query not clear to me.



what I understand that, I will search nrc in traffic(module) and pick up the latest sender phone as last phone number and put it into learner (module) row "Last Phone Number Used" column . and every learner has unique nrc number. 


And from where I get zone according to district.

==============================================================================================

Date: 03Nov2018 FEEDBACK


Noted, I will check and revert, just no power.
Test results from M3 Test Week1 Pass1 upwards not displaying correctly.
One example for results showing:

30/10/2018	NA	NA	963587111	NA	NA	NA	NA	NA	NA	NA	NA	NA	NA	NA	NA	NA	NA	2	2	3	3	3	3	1	2	NA	NA	4	4	2	3	3	4	3	4	1	2	22	22	44	44	11	11	33	33	33	55	11	22	11	22	NA0	44	22	44	22	22	1540930617	5bd8bc50d2f620087684ce86	" 
                              
                                Edit 
								but from the DB:
								
								
{ 
    "_id" : ObjectId("5bd8bc50d2f620087684ce86"), 
    "date_of_registration" : ISODate("2018-10-30T20:16:57.140+0000"), 
    "nrc" : "963587111", 
    "sample_test_results" : "1812171", 
    "__v" : NumberInt(0), 
    "m1w1_pass2" : "2", 
    "m1w1_pass1" : "2", 
    "m1w2_pass2" : "3", 
    "m1w2_pass1" : "3", 
    "m2w5_pass2" : "2", 
    "m2w5_pass1" : "1", 
    "m4w3_pass2" : "4", 
    "m4w3_pass1" : "0", 
    "m1w3_pass2" : "3", 
    "m1w3_pass1" : "3", 
    "m1w4_pass2" : "2", 
    "m1w4_pass1" : "1", 
    "m3w1_pass2" : "2", 
    "m3w1_pass1" : "2", 
    "m3w4_pass2" : "3", 
    "m3w4_pass1" : "3", 
    "m2w3_pass2" : "4", 
    "m2w3_pass1" : "3", 
    "m2w1_pass2" : "4", 
    "m2w1_pass1" : "4", 
    "m4w4_pass2" : "4", 
    "m4w4_pass1" : "2", 
    "m3w2_pass2" : "4", 
    "m3w2_pass1" : "4", 
    "m3w3_pass2" : "1", 
    "m3w3_pass1" : "1", 
    "m2w4_pass2" : "4", 
    "m2w4_pass1" : "3", 
    "m4w1_pass2" : "2", 
    "m4w1_pass1" : "1", 
    "m4w2_pass2" : "2", 
    "m4w2_pass1" : "1", 
    "m2w2_pass2" : "3", 
    "m2w2_pass1" : "2", 
    "m4w5_pass2" : "2", 
    "m4w5_pass1" : "2", 
    "m3w5_pass2" : "5", 
    "m3w5_pass1" : "3"
}								
								
Please check.

[Fri Nov 02 19:08:48.595114 2018] [:error] [pid 6763] [client 10.99.0.12:52777] PHP Fatal error:  require(): Failed opening required '/var/www/html/mongodb/vendor/autoload.php' (include_path='.:/usr/share/php') in /var/www/html/utilities/model.php on line 889

Thats error from current version on the server.								
								
[Fri Nov 02 19:08:48.595114 2018] [:error] [pid 6763] [client 10.99.0.12:52777] PHP Fatal error: require(): Failed opening required '/var/www/html/mongodb/vendor/autoload.php' (include_path='.:/usr/share/php') in /var/www/html/utilities/model.php on line 889
Managed to sort it, I will check new developments and revert.

							
# Also ensure that the current province for the user is auto picked like the other fields, instead of the user being forced to pick again. This is still in the Edit Form
-------------(Done under testing)
This is done, but the email field on Edit screen is still not being auto filled, please check that aswell.								
								
								
I have noticed that email field is missing on the results page, I guess thats why its not being autopicked in the Edit Screen. Please correct.

# Also, I have noticed that last number used is showing NA in every record. last phone number used should be picked from the traffic DB. search by NRC pick the latest message received and pick the number which was used.
-------------(Done under testing)
Confirmed amd working.

								
A bug, when I filter the data by province or district, last number used goes to NA, please check why.Dont worry, its not your fault, it is because non of those filtere students has sent in results.								
								
# For CSV upload, if upload a learner with the same NRC does the same user get updated? This should be the functionality.
-------------(Done under testing)
This is still not working, please check.								
								
# PS: Contact Number, Tablet Serial Number, Direct Facilitator and Email Address fields are missing in CSV upload form.
Please add those aswell.
-------------(Done under testing)
This has been done, but, Add Learner or update not working via CSV, please check.								
								
#								
[Fri Nov 02 20:20:29.728939 2018] [:error] [pid 6764] [client 10.99.0.12:53002] PHP Fatal error: Class 'ImgController' not found in /var/www/html/utilities/bootstrap.php on line 26, referer: https://rocsdev.tekeniko.solutions/learners
[Fri Nov 02 20:20:37.804576 2018] [:error] [pid 6761] [client 10.99.0.12:53004] PHP Fatal error: Class 'AssetsController' not found in /var/www/html/utilities/bootstrap.php on line 26, referer: https://rocsdev.tekeniko.solutions/assets/sl/css/chosen.css

# Please auto capitalize the First Letter for manually entered fields on add learner webform. Even if someone uses small letters like in "akuna" above should have been "Akuna"

#
Test results from M3 Test Week1 Pass1 upwards not displaying correctly.
I have managed to sort this. You were echoing the resuts twice had to remove one set.
in index.tpl
COMMENT: Ok


What is the progress with making this header sticky(fixed)?

Here are some articles wich might help with the same:


https://www.w3schools.com/howto/howto_js_sticky_header.asp


https://stackoverflow.com/questions/13959500/how-to-keep-table-headers-fixed-while-scrolling-down-a-table


https://stackoverflow.com/questions/8321849/how-to-scroll-tables-tbody-independent-of-thead


http://jsfiddle.net/nyCKE/2/

https://www.sitepoint.com/community/t/css-how-can-i-keep-the-header-of-an-html-table-fixed-while-scrolling-the-page/236073

https://codepen.io/tjvantoll/pen/JEKIu

This is actually the best! Very similar to our needs.

=============================================================================

Date: 06nov2018 (Feedback)

Basic oeprations of the users:

Administrator:

These shall have unrestricted CRUD operstions to all sections, provinces, didtricts, zones etc. And all other oarts of the website.

Coordinators:

These shall have CRUD operations, but only  for there particular district.

Followers:

These shall have READ-ONLY access, for there particular level.

There are National Followers - These can access information, to all provinces districts, zones etc. But the access is read only.

Provincial Followers - These can access information for the entire Province they belong to, but not other provinces.

District Followers - These can access information for the entire District they belong to, but not other districts.

Zonal Followers - These can access information for the entire Zone they belong to, but not other zones. Amongst the followers these are the only ones with CRUD operations, but only for their zone.

They are also the ones who show in the "Direct Facilitator" field in Learners.



.............................
You can have a quick look in the specs doc to see which views are available to each user type.


For example, there will be no user managements view when Followers are logged in.

But you can have a quick glimpse and feel free to ask where you shall not be clear.

Dont be overwhelmed it is mostly filled with frames than writtings.


......................


Hi @Shubham! capitalization is working for all field. But one thing I have noticed is that when you are inserting in the db you are not capitalizing the first letter. May you please capitalize the first letter on inserting to the database. This is because we already have another app running, the sms app collecting data from the field. For it   "district" : "luena" AND "district" : "Luena" are two different things. This will cause it to break. So please capitalize before inserting to the db aswell.

When you check District DB, district names have the first letter capitalized

apart from email, date, contact number, last number used and tablet serial number, the rest of the fields can have the first letter capitalized on insert.Please also feel free to, if you have any questions on the user modules!


================================================================================


Under User management, The administrator and district coordinator(restricted to their district) shall
be able to manage user from this page. The page is designed as follows, Tabs at the top right for
choosing the type of user to be managed:


Admins and Coordinators are also allowed to view activity logs which displays various information
activity on the system:

The District Coordinator’s Traffic page, shall show only traffic specific to their District. Like the
Admins, the may also be able to filter Traffic based on the same filters.

The Coordinator’s Results Page shall also be restricted to results from their District. Their filters
shall be as follows:

District shall be able to manage Learners and Followers within their District only. Their filters shall
be as follows:

The rest shall be the same as Admins.


They will be able to create new Learners just specific to their districts.

Manage Followers specific to their district.

Create new followers specific to their district.

They will be able to view notifications sent to them or their group.

Send Notification to Learners specific to their Districts and Zones and also to Admins or Fellow
Coordinators

All charts and Reports the Coordinator can view are just for their District and Zones within. They
will still be able to use limited filters to help them choose specific charts and reports. Everything
else is the same as Admins.

The “more” drop-down menu is the same as the Admin’s with similar functionality

The Coordinator shall be able to enter a Tablet Tracking Form for their District and Zones under
control.

The Coordinator shall view activity Logs specific to their District and Zones under control.

..............................................................

The Follower shall have view only rights specific to what kind of follower they are logged in as i.e. 

• National Follower – shall be able to view everything

• Provincial Follower – Shall view everything specific to their Province, including all
Districts and Zones within that particular province.

• District Follower – Shall view everything specific to their Districts including all Zones
within that particular district.

• Zonal Follower – Shall view everything specific to their Zone, including all schools within
that particular zone.

All Followers shall be able to view Notifications sent to them or their group.

All Followers shall be able to send Notifications specific to their roles:
• National – can send to all
• Provincial – can send to all in the province
• District – can send to all in district
• Zonal – can send to all in zone

Charts and Reports can be view as per Follower level:
• National – can view all
• Provincial – can view all for particular province
• District – can view all for particular district
• Zonal – can view all for particular zone



The “more” drop-down menu is slightly different from the Admin’s and Coordinator’s:
Otherwise, all other functions work the same.


Filters show as per Follower Level logged in.


=====================================================================================
Hi @Gaurav and @Shubham!Please give me an update on the project!
Works seem to have stalled for the past one week.What is the progress???Please respond ASAP!I need to give feedback to the client.


Other very important fields you missed from the CSV upload are school name and EMIS.

Please check web add learner form a direction on which fields are required.

Thats the current CSV, please compare filed with web Add Learner and see the missing ones.

Great, please also check all other previously raised issues after the CSV upload is done.


=================================================================================================
Date: 13nov2018


Facilitator showing NA.
But I have entered it from the CSV.
Please check.


Please also note that the direct facilitator should be linked to a Zonal Follower, if the Facilitator entered does not exist in the Followers DB, then they have to be created. The link is the zone to ensure unambiguity.
For example in this case:
ROCS_Learners_Upload_20181112_.csv

If Grace Sakala(Please also correct it in the sample so that users know that they need to start with the first name and end with the last for the facilitator to lessen coding for verification)  does not exist for that zone "Mutuwandi", in the Followers DB(you can check to see required fields), then that Facilitator needs to be created from the available data like province, district, zone name, etc.

Sorry, its actually User DB.

This is a typical zonal follower's records:
'
{ 
    "_id" : ObjectId("5a69bd878b43d101ecb59304"), 
    "contact_number" : "+260966326188", 
    "district" : "Lusaka", 
    "email" : "Horward@rocsweb.com", 
    "firstname" : "Horward", 
    "follower_category" : "ZF", 
    "function" : "rocs", 
    "gender" : "M", 
    "lastname" : "Muyuni", 
    "nrc" : "234567711", 
    "organisation" : null, 
    "position" : "ZIC", 
    "province" : "Lusaka", 
    "user_category" : "FO", 
    "zone" : "Yamunzelu"
}


…ROCS is working through the government structures, i.e. in December they will train DRCCs and DESOs (the Resource Center Coordinators and Education Standards Officer at district level, both reporting to the DEBS, the District Education Board Secretary). These two will train and supervise the Zonal In-service Coordinators in their district (who are teachers at government schools, zonal centers, with the additional responsibility to do similar things like the DRCC, just on zonal level). The ZICs then will train and supervise/support the teachers (course participants).

In terms of roles, DEBS/DRCC/DESO are typical functions which will have the (read-only) role at district level. ZICs and ZHs (Zonal Heads) are typical functions which will have the (read-only) role at zonal level. All of them might send a School Visit Report code…


Thats the document which describes what should be found under position dropdown.

In short:

Roles for Coordinators - DEBS/DRCC/DESO
Roles for Zonal Followers - ZIC/ZH

The document is just there to help you understand how they all work together.


What we understand till now, If grace sakla is not in user db with zone "Mutuwandi" then we need to create new user entry in user db named grace sakala with zone "Mutuwandi"

Correct!

And they will have to be Zonal Follower with position ZIC.

{ 
"_id" : ObjectId("5a69bd878b43d101ecb59304"), 
"contact_number" : "+260966326188", 
"district" : "Lusaka", 
"email" : "Horward@rocsweb.com", 
"firstname" : "Horward", 
"follower_category" : "ZF", 
"function" : "rocs", 
"gender" : "M", 
"lastname" : "Muyuni", 
"nrc" : "234567711", 
"organisation" : null, 
"position" : "ZIC", 
"province" : "Lusaka", 
"user_category" : "FO", 
"zone" : "Yamunzelu"
}

Thats an example.

Position shall come under "Function" dropdown + manual entry.

So when filtered to only ZIC, it should show only direct facilitators.


All you explain above is related to followers module?


Yes the Zonal Follower show up under Follower's module.

The top record is just an example of how a typical zonal follower's record should look.

But Functions shall also show under all users as described in the shared document.

Suggestion on how the headers should be arranged in CSV if this is ok with you.

Hi @Shubham!

How come the upload only always shows "Success 2 Records Uploaded" even when more than that has been uploaded?

Please let it show the correct number of uploaded documents and also the number of failed ones.

================================================================================

However, I don't understand why you have eliminated the geo information columns (province, district, zone) from the list (https://rocsweb.tekeniko.solutions/learners)???

'
This is also new, a I will also check on it. Just currently not in the office, but these should be small bugs which can be quickly finished.
These are bugs noticed by the client, I am currently not in the office, please check

More importantly, the export function doesn't produce the filtered (or non-filtered) participants, but just 60. This is useless. Once this bug is repaired, we are happy to do more testing.


However, I don't understand why you have eliminated the geo information columns (province, district, zone) from the list (https://rocsweb.tekeniko.solutions/learners)???
What I have noticed is that the header is actually not moving together with the text. I am sure this can be quickly repaired.


I only uploaded 2700+ learners, but afterwards I get over 4800 with data! Something is wrong, please check.

That's the file, I just changed date of appointment to 2015, don't have direct access to the file I edited, its on the computer, but difference is just date of appointment.


“More importantly, the export function doesn't produce the filtered (or non-filtered) participants, but just 60. This is useless. Once this bug is repaired, we are happy to do more testing.”I have tried to export 120 results, but I get slightly over 300That's is the file.


Those are just actually the first 60 results repeated over and over.Four times to be precise.Please check that.

I thought, it happen, when page load took to much time to load(Export records not setup properly), but when I check it in local server, it is working fine.


But have you seen that when exported from the server, only the 60 are exported, but if its 120 there will be four of each record, if 180 there will be six of each record, etc.



Hi @Shubham and Gaurav!Whats the progress on my inputs from last week to today? But more urgently, the issues raised for the learners section.

---------------------------------------------------------------------------------------
Date: 14nov2018

What I have noticed:

When you upload CSV, even test results are being deleted. This should not happen.

e.g.

Kaluba Zipe

NRC Number 142526461

It shows last phone number used.

But all test results show NA.

A check in the DB shows this user has sent in test results for a Pre Course Assesssment.

{ 
    "_id" : ObjectId("5a969dc0f360fe1e0d001f7e"), 
    "time_stamp" : ISODate("2018-02-28T12:17:04.447+0000"), 
    "code_type" : "Registration", 
    "code_emis" : "0014066", 
    "code_nrc" : "142526461", 
    "code_test_result" : "NA", 
    "code_checksum" : "9", 
    "isValid" : "valid", 
    "senders_number" : "+260965837544", 
    "message" : "100140661425264619", 
    "contactAuthorisation" : "authorized", 
    "__v" : NumberInt(0)
}
{ 
    "_id" : ObjectId("5a96a49df360fe1e0d001f84"), 
    "time_stamp" : ISODate("2018-02-28T12:46:21.275+0000"), 
    "code_type" : "Pre-course self-assessment", 
    "code_emis" : "NA", 
    "code_nrc" : "142526461", 
    "code_test_result" : "1681147", 
    "code_checksum" : "7", 
    "isValid" : "valid", 
    "senders_number" : "+260965837544", 
    "message" : "514252646116811477", 
    "contactAuthorisation" : "authorized", 
    "__v" : NumberInt(0)
}
{ 
    "_id" : ObjectId("5b0c66741c1198055005fe6d"), 
    "time_stamp" : ISODate("2018-05-28T20:28:36.023+0000"), 
    "code_type" : "Pre-course self-assessment", 
    "code_emis" : "NA", 
    "code_nrc" : "142526461", 
    "code_test_result" : "1681147", 
    "code_checksum" : "7", 
    "isValid" : "valid", 
    "senders_number" : " 260965837544", 
    "message" : "514252646116811477", 
    "contactAuthorisation" : "authorized", 
    "__v" : NumberInt(0)
}
{ 
    "_id" : ObjectId("5b0c66741c1198055005fe86"), 
    "time_stamp" : ISODate("2018-05-28T20:28:36.175+0000"), 
    "code_type" : "Registration", 
    "code_emis" : "0014066", 
    "code_nrc" : "142526461", 
    "code_test_result" : "NA", 
    "code_checksum" : "9", 
    "isValid" : "valid", 
    "senders_number" : " 260965837544", 
    "message" : "100140661425264619", 
    "contactAuthorisation" : "authorized", 
    "__v" : NumberInt(0)
}

Direct Facilitator also showing NA.

Please check.

These are bugs which need to be soughted before we can fully close this section.


Otherwise: Headers are now ok. and also CSV export is good. JOB VERY WELL DONE!

please just check for me why results are being deleted on CSV upload and also why Direct Facilitator is showing NA.

On the latter, what I have noticed is that, you are saving "Direct Facilitator" just as "direct":


While in the website, you are calling it "Facilitator":

The correct key should actually be "direct_facilitator":

I have increased memory for the server, please check it there is improvement and let me know if you require further adjustment.

I have change the key in the database from just "direct" to "direct_facilitator" and now they are showing please also correct in the code for CSV upload aswell. 

PS: Are the direct facilitators being saved as zonal followers? Please check on that and also correct the code not to be deleting test results.


This is correct, but update only data input in CSV upload. Not test result data.

can you explain me, when the test data is update?
Is it update from any api?

Test codes come via SMS.

The SMS app populates both the traffic and learner DBs

When you app is uploading a CSV which has user already in the DBs.

with test results. It deletes everything and only leaves the data coming from your CSV.

Let me fetch an example for you so that you see.

Test modules are:

This is how a leaner with some result looks:

{ 
    "_id" : ObjectId("5b3e9304b0a2971b6dcab557"), 
    "nrc" : "353143531", 
    "date_of_registration" : ISODate("2018-07-05T21:51:06.109+0000"), 
    "school_emis" : "0008750", 
    "__v" : NumberInt(0), 
    "pre_c_sa_test_results" : "3", 
    "m4w5_pass2" : "2", 
    "m4w5_pass1" : "2", 
    "m4w1_pass2" : "4", 
    "m4w1_pass1" : "3", 
    "m3w2_pass2" : "3", 
    "m3w2_pass1" : "3", 
    "m3w1_pass2" : "3", 
    "m3w1_pass1" : "1", 
    "m3w5_pass2" : "4", 
    "m3w5_pass1" : "4", 
    "m2w2_pass2" : "5", 
    "m2w2_pass1" : "5", 
    "m2w1_pass2" : "3", 
    "m2w1_pass1" : "3", 
    "m3w4_pass2" : "3", 
    "m3w4_pass1" : "3", 
    "m2w5_pass2" : "5", 
    "m2w5_pass1" : "5", 
    "m1w3_pass2" : "4", 
    "m1w3_pass1" : "3", 
    "m1w2_pass2" : "3", 
    "m1w2_pass1" : "3", 
    "m1w1_pass2" : "3", 
    "m1w1_pass1" : "3", 
    "m2w4_pass2" : "5", 
    "m2w4_pass1" : "3", 
    "m1w4_pass2" : "3", 
    "m1w4_pass1" : "1"
}

Those are not the only test modules, I will share the complete list with you or you can check the code_table.xls which I shared at the beggining of the project.

When whe do a CSV upload for the user above, all that data shall be deleted and we shall just remain with data from the CSV.

Let me search for a real life example:

..............................
..............................

Let me share results for four other learners so that you see.
These are just random Learners, when you check NRC you will see that these are different users:

{ 
    "_id" : ObjectId("5b455e218b20dbc80910c99b"), 
    "nrc" : "222705161", 
    "date_of_registration" : ISODate("2018-07-10T22:41:25.918+0000"), 
    "sample_test_results" : "2331", 
    "__v" : NumberInt(0), 
    "pre_c_sa_test_results" : "3", 
    "m1w1_pass2" : "1", 
    "m1w1_pass1" : "0", 
    "m1w3_pass2" : "1", 
    "m1w3_pass1" : "1", 
    "m2w5_pass2" : "1", 
    "m2w5_pass1" : "1", 
    "m2w1_pass2" : "1", 
    "m2w1_pass1" : "1", 
    "m3w5_pass2" : "3", 
    "m3w5_pass1" : "3", 
    "m3w1_pass2" : "2", 
    "m3w1_pass1" : "2", 
    "m2w2_pass2" : "3", 
    "m2w2_pass1" : "3", 
    "m2w4_pass2" : "3", 
    "m2w4_pass1" : "3", 
    "lastname" : null, 
    "firstname" : null, 
    "province" : null, 
    "district" : null, 
    "zone" : null, 
    "school_emis" : null, 
    "grades_taught" : null, 
    "highest_education" : null, 
    "govt_teacher" : null, 
    "gender" : null, 
    "m1w2_pass1" : null, 
    "m1w2_pass2" : null, 
    "m1w4_pass1" : null, 
    "m1w4_pass2" : null, 
    "m1w5_pass1" : null, 
    "m1w5_pass2" : null, 
    "m2w3_pass1" : null, 
    "m2w3_pass2" : null, 
    "m3w2_pass1" : null, 
    "m3w2_pass2" : null, 
    "m3w3_pass1" : null, 
    "m3w3_pass2" : null, 
    "m3w4_pass1" : null, 
    "m3w4_pass2" : null, 
    "m4w1_pass1" : null, 
    "m4w1_pass2" : null, 
    "m4w2_pass1" : null, 
    "m4w2_pass2" : null, 
    "m4w3_pass1" : null, 
    "m4w3_pass2" : null, 
    "m4w4_pass1" : null, 
    "m4w4_pass2" : null, 
    "m4w5_pass1" : null, 
    "m4w5_pass2" : null, 
    "post_c_sa_test_results" : null
}

{ 
    "_id" : ObjectId("5a7af98bf3e8350e6b46e43e"), 
    "date_of_registration" : ISODate("2018-02-07T10:15:11.794+0000"), 
    "nrc" : "199321751", 
    "sample_test_results" : "1771115", 
    "__v" : NumberInt(0), 
    "pre_c_sa_test_results" : "4", 
    "lastname" : null, 
    "firstname" : null, 
    "province" : null, 
    "district" : null, 
    "zone" : null, 
    "school_emis" : null, 
    "grades_taught" : null, 
    "highest_education" : null, 
    "govt_teacher" : null, 
    "gender" : null, 
    "m1w1_pass1" : null, 
    "m1w1_pass2" : null, 
    "m1w2_pass1" : null, 
    "m1w2_pass2" : null, 
    "m1w3_pass1" : null, 
    "m1w3_pass2" : null, 
    "m1w4_pass1" : null, 
    "m1w4_pass2" : null, 
    "m1w5_pass1" : null, 
    "m1w5_pass2" : null, 
    "m2w1_pass1" : null, 
    "m2w1_pass2" : null, 
    "m2w2_pass1" : null, 
    "m2w2_pass2" : null, 
    "m2w3_pass1" : null, 
    "m2w3_pass2" : null, 
    "m2w4_pass1" : null, 
    "m2w4_pass2" : null, 
    "m2w5_pass1" : null, 
    "m2w5_pass2" : null, 
    "m3w1_pass1" : null, 
    "m3w1_pass2" : null, 
    "m3w2_pass1" : null, 
    "m3w2_pass2" : null, 
    "m3w3_pass1" : null, 
    "m3w3_pass2" : null, 
    "m3w4_pass1" : null, 
    "m3w4_pass2" : null, 
    "m3w5_pass1" : null, 
    "m3w5_pass2" : null, 
    "m4w1_pass1" : null, 
    "m4w1_pass2" : null, 
    "m4w2_pass1" : null, 
    "m4w2_pass2" : null, 
    "m4w3_pass1" : null, 
    "m4w3_pass2" : null, 
    "m4w4_pass1" : null, 
    "m4w4_pass2" : null, 
    "m4w5_pass1" : null, 
    "m4w5_pass2" : null, 
    "post_c_sa_test_results" : null
}

{ 
    "_id" : ObjectId("5a7afa20f3e8350e6b46e443"), 
    "date_of_registration" : ISODate("2018-02-07T10:15:11.794+0000"), 
    "school_emis" : "0123456", 
    "nrc" : "380859611", 
    "__v" : NumberInt(0), 
    "sample_test_results" : "2300", 
    "pre_c_sa_test_results" : "3", 
    "m1w1_pass2" : "1", 
    "m1w1_pass1" : "1", 
    "district" : "Kafue", 
    "zone" : "Mutuwandi", 
    "province" : "Lusaka", 
    "lastname" : null, 
    "firstname" : null, 
    "grades_taught" : null, 
    "highest_education" : null, 
    "govt_teacher" : null, 
    "gender" : null, 
    "m1w2_pass1" : null, 
    "m1w2_pass2" : null, 
    "m1w3_pass1" : null, 
    "m1w3_pass2" : null, 
    "m1w4_pass1" : null, 
    "m1w4_pass2" : null, 
    "m1w5_pass1" : null, 
    "m1w5_pass2" : null, 
    "m2w1_pass1" : null, 
    "m2w1_pass2" : null, 
    "m2w2_pass1" : null, 
    "m2w2_pass2" : null, 
    "m2w3_pass1" : null, 
    "m2w3_pass2" : null, 
    "m2w4_pass1" : null, 
    "m2w4_pass2" : null, 
    "m2w5_pass1" : null, 
    "m2w5_pass2" : null, 
    "m3w1_pass1" : null, 
    "m3w1_pass2" : null, 
    "m3w2_pass1" : null, 
    "m3w2_pass2" : null, 
    "m3w3_pass1" : null, 
    "m3w3_pass2" : null, 
    "m3w4_pass1" : null, 
    "m3w4_pass2" : null, 
    "m3w5_pass1" : null, 
    "m3w5_pass2" : null, 
    "m4w1_pass1" : null, 
    "m4w1_pass2" : null, 
    "m4w2_pass1" : null, 
    "m4w2_pass2" : null, 
    "m4w3_pass1" : null, 
    "m4w3_pass2" : null, 
    "m4w4_pass1" : null, 
    "m4w4_pass2" : null, 
    "m4w5_pass1" : null, 
    "m4w5_pass2" : null, 
    "post_c_sa_test_results" : null
}

{ 
    "_id" : ObjectId("5b3e9304b0a2971b6dcab557"), 
    "nrc" : "353143531", 
    "date_of_registration" : ISODate("2018-07-05T21:51:06.109+0000"), 
    "school_emis" : "0008750", 
    "__v" : NumberInt(0), 
    "pre_c_sa_test_results" : "3", 
    "m4w5_pass2" : "2", 
    "m4w5_pass1" : "2", 
    "m4w1_pass2" : "4", 
    "m4w1_pass1" : "3", 
    "m3w2_pass2" : "3", 
    "m3w2_pass1" : "3", 
    "m3w1_pass2" : "3", 
    "m3w1_pass1" : "1", 
    "m3w5_pass2" : "4", 
    "m3w5_pass1" : "4", 
    "m2w2_pass2" : "5", 
    "m2w2_pass1" : "5", 
    "m2w1_pass2" : "3", 
    "m2w1_pass1" : "3", 
    "m3w4_pass2" : "3", 
    "m3w4_pass1" : "3", 
    "m2w5_pass2" : "5", 
    "m2w5_pass1" : "5", 
    "m1w3_pass2" : "4", 
    "m1w3_pass1" : "3", 
    "m1w2_pass2" : "3", 
    "m1w2_pass1" : "3", 
    "m1w1_pass2" : "3", 
    "m1w1_pass1" : "3", 
    "m2w4_pass2" : "5", 
    "m2w4_pass1" : "3", 
    "m1w4_pass2" : "3", 
    "m1w4_pass1" : "1", 
    "lastname" : null, 
    "firstname" : null, 
    "province" : null, 
    "district" : null, 
    "zone" : null, 
    "grades_taught" : null, 
    "highest_education" : null, 
    "govt_teacher" : null, 
    "gender" : null, 
    "sample_test_results" : null, 
    "m1w5_pass1" : null, 
    "m1w5_pass2" : null, 
    "m2w3_pass1" : null, 
    "m2w3_pass2" : null, 
    "m3w3_pass1" : null, 
    "m3w3_pass2" : null, 
    "m4w2_pass1" : null, 
    "m4w2_pass2" : null, 
    "m4w3_pass1" : null, 
    "m4w3_pass2" : null, 
    "m4w4_pass1" : null, 
    "m4w4_pass2" : null, 
    "post_c_sa_test_results" : null
}


The test results are stored in fields:

"pre_c_sa_test_results"

"sample_test_results"

"post_c_sa_test_results"

For weekly test:

there are four (4) modules

And each module has five(5) weeks

hence the naming:

m1w1_pass1

meaning Module 1 Week 1 attempt(pass) 1

Each test result shall have two passes recorded.

m1w1_pass1 and m1w1_pass2 etc.

so the m goes from m1-4 and the weeks go from w1-5 and pass 1&2

If the learner only did one attempt, pass1 and pass2 shall have the same result.

If the learner did two attempts then pass1 and pass2 shall be different.

I hope this makes sense?

That document explains everything about the code, but dont go into detail very much as the other sister app(SMS) does processing of the codes.

Please also confirm if you have corrected the the direct_facilitator in your code?

Results for this Learner before CSV upload:
{ 
    "_id" : ObjectId("5b3e9304b0a2971b6dcab557"), 
    "nrc" : "353143531", 
    "date_of_registration" : ISODate("2018-07-05T21:51:06.109+0000"), 
    "school_emis" : "0008750", 
    "__v" : NumberInt(0), 
    "pre_c_sa_test_results" : "3", 
    "m4w5_pass2" : "2", 
    "m4w5_pass1" : "2", 
    "m4w1_pass2" : "4", 
    "m4w1_pass1" : "3", 
    "m3w2_pass2" : "3", 
    "m3w2_pass1" : "3", 
    "m3w1_pass2" : "3", 
    "m3w1_pass1" : "1", 
    "m3w5_pass2" : "4", 
    "m3w5_pass1" : "4", 
    "m2w2_pass2" : "5", 
    "m2w2_pass1" : "5", 
    "m2w1_pass2" : "3", 
    "m2w1_pass1" : "3", 
    "m3w4_pass2" : "3", 
    "m3w4_pass1" : "3", 
    "m2w5_pass2" : "5", 
    "m2w5_pass1" : "5", 
    "m1w3_pass2" : "4", 
    "m1w3_pass1" : "3", 
    "m1w2_pass2" : "3", 
    "m1w2_pass1" : "3", 
    "m1w1_pass2" : "3", 
    "m1w1_pass1" : "3", 
    "m2w4_pass2" : "5", 
    "m2w4_pass1" : "3", 
    "m1w4_pass2" : "3", 
    "m1w4_pass1" : "1", 
    "lastname" : null, 
    "firstname" : null, 
    "province" : null, 
    "district" : null, 
    "zone" : null, 
    "grades_taught" : null, 
    "highest_education" : null, 
    "govt_teacher" : null, 
    "gender" : null, 
    "sample_test_results" : null, 
    "m1w5_pass1" : null, 
    "m1w5_pass2" : null, 
    "m2w3_pass1" : null, 
    "m2w3_pass2" : null, 
    "m3w3_pass1" : null, 
    "m3w3_pass2" : null, 
    "m4w2_pass1" : null, 
    "m4w2_pass2" : null, 
    "m4w3_pass1" : null, 
    "m4w3_pass2" : null, 
    "m4w4_pass1" : null, 
    "m4w4_pass2" : null, 
    "post_c_sa_test_results" : null
}

As you can see there are several test results, but see below after CSV upload:

{ 
    "_id" : ObjectId("5b3e9304b0a2971b6dcab557"), 
    "firstname" : "Patrick", 
    "lastname" : "Mwanza", 
    "nrc" : "353143531", 
    "gender" : "M", 
    "govt_teacher" : "N", 
    "community_school" : "N", 
    "highest_education" : "SC", 
    "dateofappo" : "2015", 
    "grades_taught" : "3", 
    "province" : "Eastern", 
    "district" : "Petauke", 
    "zone" : "Minga", 
    "contact_number" : "", 
    "tabsernum" : "HGAFCLOX", 
    "email" : "", 
    "date_of_registration" : ISODate("2018-11-13T20:03:39.730+0000"), 
    "school_name" : "Chifundo", 
    "school_emis" : "8550", 
    "direct_facilitator" : "Sakala Grace", 
    "__v" : NumberInt(0), 
    "sample_test_results" : null, 
    "pre_c_sa_test_results" : null, 
    "m1w1_pass1" : null, 
    "m1w1_pass2" : null, 
    "m1w2_pass1" : null, 
    "m1w2_pass2" : null, 
    "m1w3_pass1" : null, 
    "m1w3_pass2" : null, 
    "m1w4_pass1" : null, 
    "m1w4_pass2" : null, 
    "m1w5_pass1" : null, 
    "m1w5_pass2" : null, 
    "m2w1_pass1" : null, 
    "m2w1_pass2" : null, 
    "m2w2_pass1" : null, 
    "m2w2_pass2" : null, 
    "m2w3_pass1" : null, 
    "m2w3_pass2" : null, 
    "m2w4_pass1" : null, 
    "m2w4_pass2" : null, 
    "m2w5_pass1" : null, 
    "m2w5_pass2" : null, 
    "m3w1_pass1" : null, 
    "m3w1_pass2" : null, 
    "m3w2_pass1" : null, 
    "m3w2_pass2" : null, 
    "m3w3_pass1" : null, 
    "m3w3_pass2" : null, 
    "m3w4_pass1" : null, 
    "m3w4_pass2" : null, 
    "m3w5_pass1" : null, 
    "m3w5_pass2" : null, 
    "m4w1_pass1" : null, 
    "m4w1_pass2" : null, 
    "m4w2_pass1" : null, 
    "m4w2_pass2" : null, 
    "m4w3_pass1" : null, 
    "m4w3_pass2" : null, 
    "m4w4_pass1" : null, 
    "m4w4_pass2" : null, 
    "m4w5_pass1" : null, 
    "m4w5_pass2" : null, 
    "post_c_sa_test_results" : null
}


No results remain!

Please repair.


Please also correct the CSV upload success message to show the correct number of success and failed documents.

curretly it just shows 2 documents uploaded successfully no matter what number is uploaded.


===========================================================================================================

Date: 12Nov2018

Hi! Mundiya I added those fields in csv as well.
And Working on Administrator section.


============================================================================================================
Date: 20Nov2018

I will try to find bottle necks on the network.

How are the user control sections coming up?


Yes, I update you soon about administrator module

# If grace sakla is not in user db with zone "Mutuwandi" then we need to create new user entry in user db named grace sakala with zone "Mutuwandi".
COMMENT => If this is case occur in learner module, then I have to add new user grace sakla(direct facilitator) with zone  "Mutuwandi". So my quries id I have add only two value in user db? and what will be the category of user?

Mundiya
I will soon share the fields or you can go to user DB and check zonal follower fields.


ok


Hi @Shubham!

Did you manage to have a look at the user db?

Here is an example record of a zonal follower:

{ "_id" : ObjectId("5ace456b6360441661f92ea2"), "contact_number" : "+260977236946", "district" : "Lusaka", "email" : "Doroth@rocsweb.com", "firstname" : "Dorothy", "follower_category" : "ZF", "function" : "ZIC", "gender" : "F", "lastname" : "Kasaka", "nrc" : "148559651", "organisation" : "NA", "position" : "rocs", "province" : "Lusaka", "user_category" : "Follower", "zone" : "Matero" }


So required fields are: "contact_number"; "province"; "district"; "email"; "firstname"; "lastname"; "follower_category"; "function"(function for zonal follwer is always ZIC); "gender"; "nrc"; "organisation";  "user_category"(Is always Follower) ; "zone"; "position"(Is no longer needed)

.............................

The above example happen when we add learner and direct facilitator not in user db with the zone I type at the time of add new learner .... Just confirming

Yes that is correct, but even the other fields have to be added on insert.

................................

You remember that document I shared with you for function? Was the functions filters updated?

Is it for follower section?

Those functions are for all user sections.
===========================================================================
Date: 21Nov2018

Hi @Shubham!My inputs:I will start with the edit screen:

Province Name should be ato picked to the current province, like all the other fields are picked.
vokoscreen-2018-11-21_08-49-33.mkv

When Province is picked, district should only be filtered to districts from the picked province. At the moment all districts are retained. this makes it hard to pick. View video above.

vokoscreen-2018-11-21_08-52-48.mkv

The main scroll bar should be disabled for the edit window, so that it does not get in the way if the windows scroll bar. See video above.

Main window:

Export CSV:

Screenshot from 2018-11-21 10-16-26.png

Please remove the "EDIT" column from the exported CSV. See image above.

Screenshot from 2018-11-21 10-19-16.png

Please add a "Delete" link aswell next to "Edit". To Delete a particular record.

Please note that, only a Super Administrator, "user_category" : "SUAD" from User DB and { 
"_id" : ObjectId("5a69b6afe2c7e37ae6da1228"), 
"category_name" : "Super Administrator", 
"category_code" : "SUAD"
} from user_category DB. Can edit and delete other admins."Super Administrator" can only be edited by self and only deletable from DB.

Administrators can only view other admins records, but cannot edit or delete or create an administrator.

That is:

{ 
    "_id" : ObjectId("5a69b6afe2c7e37ae6da1229"), 
    "category_name" : "Administrator", 
    "category_code" : "AD"
} fro UserCategory DB and "user_category" : "AD" from User DB.


However these admins(together with Super Admin) can edit, create and delete other user(i.e Coordinators and Followers) and also Learners aswell. 

Cordinataors have functions just like an admin, but can only view records for other cordinators but cannot create, edit or delete them. On the other hand, they can create, edit and delete Followers and Learners, but only for their particular District. They cannot view Admin or Super Admin records. { 
    "_id" : ObjectId("5a69b6afe2c7e37ae6da122a"), 
    "category_name" : "Coordinator", 
    "category_code" : "CO"
} from UserCategory DB and "user_category" : "CO" from User DB.

Followers are view only purposes. They can view Coordinator, follwer and Learner records, but only for their level i.e.

National Followers: Can view all records fo the entire country without restrictions, but the cannot edit, delete or create. And they can only view Coordinator, Follower and Learner Records, but not Admins and Super Admins. { 
    "_id" : ObjectId("5a69b6afe2c7e37ae6da122b"), 
    "category_name" : "Follower", 
    "category_code" : "FO"
} from UserCategory DB and Fields from User DB: "user_category" : "FO" and "follower_category" : "NF"


Provintial Followers: Can view all records fo the entire province without restrictions, but the cannot edit, delete or create. And they can only view Coordinator, Follower and Learner Records, but not Admins and Super Admins. { 
"_id" : ObjectId("5a69b6afe2c7e37ae6da122b"), 
"category_name" : "Follower", 
"category_code" : "FO"
} from UserCategory DB and Fields from User DB: "user_category" : "FO" and "follower_category" : "PF"


District Followers: Can view all records fo the entire district without restrictions, but the cannot edit, delete or create. And they can only view Coordinator, Follower and Learner Records, but not Admins and Super Admins. { 
"_id" : ObjectId("5a69b6afe2c7e37ae6da122b"), 
"category_name" : "Follower", 
"category_code" : "FO"
} from UserCategory DB and Fields from User DB: "user_category" : "FO" and "follower_category" : "DF"


Zonal Followers: Can view all records fo the entire zone without restrictions, and these are the only follwer type who can edit, delete or create. But this only for Learner, only within their zone. And they can only view Zonal Follower and Learner Records, only within their zone. They cannot view Cordinators, other Followers, Admins and Super Admins. { 
"_id" : ObjectId("5a69b6afe2c7e37ae6da122b"), 
"category_name" : "Follower", 
"category_code" : "FO"
} from UserCategory DB and Fields from User DB: "user_category" : "FO" and "follower_category" : "ZF"


Level of access for all users also extend to other sections i.e. notifications (e.g. a zonal follower can only send notification to their zone only), tablets (e.g. a district follower can only track tablets only for their district), activity logs (e.g. a district cordinator can only view activity logs only for their district while an admin can view all log records), charts and reports(e.g. a zonal follower can view records for only their zone, while a narional follower can view all), traffic and learners shall also be the same according to levels of access.

ADD Admin:

vokoscreen-2018-11-21_10-23-35.mkv

Creation of Admins by Form, not working. See video above.

vokoscreen-2018-11-21_10-33-58.mkv


Creation of Admin by CSV, also not working. See video above.

------------------------------------------------------------------------------------------
Date: 22nov2018

# Concept Admin and super admin

You are mostly correct apart from the quoted. Administrators can create, edit or delete all other users and learners apart from other Administrators, whom they can just view.

Super Admin can create, edit, delete all other users and learners, including Administrators. They only user they cannot create is another Super Administrator.

Whom they can just view.

------------------------------------------------------------------------------------------

Date: 25nov2018  (Client chat)

Good day @Gaurav and @Shubham!

Please give the current status.


Mundiya, 2:23 PM
Hi again @Shubham 

We need to finish off this project very quickly.
Mundiya Muyunda Kwalombota, Yesterday at 2:11 PM

The client shall be closing for holidays on the 10th of December.
Mundiya Muyunda Kwalombota, Yesterday at 2:11 PM

So if we want to get our money this year, we need to finish before then.
Mundiya Muyunda Kwalombota, Yesterday at 2:11 PM

otherwise it will only be after second week of january.
Mundiya Muyunda Kwalombota, Yesterday at 2:12 PM

Please give your feedback!


Gaurav, 2:36 PM
Shubham is responsible for development only..rest of the matter i am responsible

One thing which is important to meet the deadline is - we need to keep the discussion as short as possible..so that Shubham gets enough time for implementation

Thanks


Mundiya, 2:39 PM
That is well noted, but where clarity is required, I think it is better he is clear of what needs to be done, than for him to spend time developing wrong things. that will be more of a worst of time than having everything clear the first time around.

I the end if we keep on coming back to the same thing which was not clear, you will claim it is scope lag!

So I really do feel it is better we get things clear the first time around! We just need to pull up our speed. Our discussion dont go beyond 30mins, so I doubt they are what is delaying us.


Gaurav, 2:42 PM
Okay


So I really do feel it is better we get things clear the first time around! We just need to pull up our speed. Our discussion dont go beyond 30mins, so I doubt they are what is delaying us.
Mundiya Muyunda Kwalombota, Yesterday at 2:42 PM
You both can discuss initially before he starts regarding updates and further work. We hope to deliver this at the earliest


Mundiya, 8:44 PM
Hi Shubham! Success message has stopped showing again on upload together with number of successfully uploaded.

Please give me progress on the current works aswell.


Gaurav, 10:40 PM
ok shubham will provide you tomorrow

--------------------------------------------------------------------------------

Date: 03dec2018

The system is exporting 0 Byte files, when several documents are loaded! Please check urgently!Mundiya, 11:45 AM Hallo Team!I am still waiting for your feedback on a multitude of issues!Give your input.

---------------------------------------------------------------------------------

Date: 06dec2018

Hi @Shubham how do I create and receive a password for a user?

The client needs a load-all button to be added in addition to the already existing load more button.	
	
Secondly, for each filter, he would like an extra selection "empty" in order to select records where a particular applied filter does not exist.

Hi @Shubham please ask what is not clear? But basically this means when one selects "empty" under any filter, district, province, zone, facilitator, or any filter one decides to choose, then this means selecting user or learners who do not have that selected item. for example, if it is province where "empty" is selected, then that means choosing every record that does not have that field present. In this case selecting records with no province field or field value equals to NULL. Same with every other selected field.


------------------------------------------------------------------------------------




-------------------------------------------------------------------------------------

# SMS API:

"https://10.99.0.10:4657/sms_forwarder/v1/index?receiver=%2B260969680242&sender=iactrocs&
action=snd&msg={Place your URLencoded message here}"
Parameters:
receiver – Is the URLencoded number of the person to receive the message.
sender – Is the ID the receiver shall see as the sender, this is always “iact-rocs”.
action – is the action you inform the API of what you want to do. In your case, this shall always be
“snd” meaning send.
msg – Is the URLencoded message you would like to send. Please always ensure that this is
URLencoded.

%2B260969680242
Your+newly+generated+password%3A+123456%22

$contact_number = "+260969680242";
$message = "Your newly generated password: 123456";

https://10.99.0.10:4657/sms_forwarder/v1/index?receiver=%2B260969680242&sender=iactrocs&
action=snd&msg=Your+newly+generated+password%3A+123456%22

urlencode()
https://10.99.0.10:4657/sms_forwarder/v1/index?receiver=$contact_number&sender=iactrocs&
action=snd&msg=$message


# EMAIL API:


Username – rocs@tekeniko.solutions
Password – r0c5w3b!
Server Name – https://mailhub.digitstechnologysolutions.com(certificates are self signed, so please
ignore the security warning and accept the certificate)
SMTP port – 587
IMAP port - 143
Connection Security – STARTTLS or TLS
Authentication Method – Normal Password
We shall soon be migrating from this server, so please show us where we shall be able to change the
API in the code, for future reference.

----------------------------------------------------------------------------------------------
Date: 13dec2018

It wont send internationaly, we have restricted it. You can use my number +260969680242
----------------------------------------------------------------------------------------------

https://github.com/PHPMailer/PHPMailer/issues/340

https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting

-----------------------------------------------------------------------------------------------

Date: 17dec2018

public function curl_send(){
	$receiver = urlencode("2B26096968024285");
	$msg = urlencode("Test Message");
	$url = 'https://10.99.0.10:4657/sms_forwarder/v1/index?receiver=%2B260969680242&sender=iactrocs&action=snd&msg=hello%20just%20test';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	//curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POST, 0);
	curl_setopt($ch, CURLOPT_HTTPGET, 1);
	// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	//curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	$result = curl_exec($ch);           
	if ($result == FALSE) {
		die('Curl failed: ' . curl_error($ch));
	}
	curl_close($ch); 
	echo"<pre>";
	print_r($result);
	die();
	
}

Is the VAR DAMP INSIDE SendSMS:
string(8) "iactrocs"
string(13) "+260969680242"
string(15) "hello just test"
string(13) "sms_forwarder"
string(8) "routeSMS"
int(1545039679)
string(9) "iact_rocs"

VAR DUMP INSIDE SendSMS ENDs
Prepare sucessfull in SendSMS
Bind sucessfull in SendSMS
Execute sucessfull in SendSMS
bool(true)
string(26) "DATA_INSERTED_SUCCESSFULLY"
Is the $send var_dump

Is the VAR DAMP INSIDE InsertIntoOutbox:
string(8) "iactrocs"
string(13) "+260969680242"
string(15) "hello just test"
string(19) "2018-12-17 11:41:19"
int(1545039679)
string(23) "Sent from SMS Forwarder"

VAR DUMP INSIDE InsertIntoOutbox ENDs
Prepare sucessfull in InsertIntoOutbox
Bind sucessfull in InsertIntoOutbox
Execute sucessfull in InsertIntoOutbox
bool(true)
string(26) "DATA_INSERTED_SUCCESSFULLY"
Is the $outbox var_dump


























