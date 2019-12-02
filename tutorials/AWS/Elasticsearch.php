<?php

# AWS Elasticsearch
Elastic Search is a free open source engine which is used for searching their loggs.
Elasticsearch is one such NOSQL distributed database.
Relational database works comparatively slow when it comes to huge data and fetching search results through queries from the database. (There are ways to optimize this like indexing but then there are related limitations like we can’t index every field. Row updates to heavily indexed tables would take time. People also scale their RDBMS vertically to improve performance.) This is a problem is overcome by Elasticsearch.

Like MongoDB, ElasticSearch is also a Document-based NoSQL Data Store.

https://cloudncode.blog/2017/01/16/how-to-set-up-elastic-search-kibana-on-aws/
https://dzone.com/articles/23-useful-elasticsearch-example-queries
https://www.slideshare.net/AmazonWebServices/amazon-elasticsearch-and-databases
https://www.joomlageek.com/documentation/component-geek-elasticsearch


=> Different Elastic Search
https://medium.com/@factoryhr/elasticsearch-introduction-implementation-and-example-17dd66c35c35
https://www.aurigait.com/how-to-use-elastic-search-with-php-tutorial/
https://www.cloudways.com/blog/configure-elasticsearch-php-sites/
https://github.com/elastic/elasticsearch-php


,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.
=> elasticsearch.bat double click this file
Open a browser and type localhost:9200

If you can see the message on the browser that means your Elastic search is up and running.
	
name	"SHUBHAM-PC"
cluster_name	"elasticsearch"
cluster_uuid	"P6agu-n4RW2g18h4B0Eqlw"
version	
number	"7.0.1"
build_flavor	"default"
build_type	"zip"
build_hash	"e4efcb5"
build_date	"2019-04-29T12:56:03.145736Z"
build_snapshot	false
lucene_version	"8.0.0"
minimum_wire_compatibility_version	"6.7.0"
minimum_index_compatibility_version	"6.0.0-beta1"
tagline	"You Know, for Search"

=> You need to add the sense plugin which will act as an developer interface to Elasticsearch.
,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.



# Elastic search imp
=> Run elastic search - localhost:9200

=> Run kibana -  localhost:5601

we need to run the batch file for ES and Kibana all the time to run this url.


?>

# Elasticsearch Defination
<?php

- Elasticsearch is a search engine based on Lucene.
- It provides a distributed, full text search engine with an http web interface and schema free JSON documents.
- Elastic search is developed in java and is relased as open source under the term of Apache license


Suppose as a customer I am searching for some products on the ecommerce websites sometime it take too much time to retrival of the product and these leads to a poor user experience, To Avoid this kind of issues we implement Elasticsearch to :
> Implement simple/fuzzy search.
> Implement Analytics
> Autocomplete and instant search(When typing we will get some suggestion)

?>

<?php
# https://www.toolsbuzz.com/query-converter

?>

KIBANA => 
<?php
Operation like query writing, Index writing, Create Index On developer tool on kibana.
It enables visual exploration and real time analysis of your data in elastic search.

Elasticsearch API =>
- Document API
- Search API
- Indices API
- cat API
- Cluster API

Document API =>
1. Single Document APIs
- Index API 
- Get API 
- Delete API
- Update API

Index API => The index API adds or updates a typed JSON document in a specific index, making it searchable.

# For add new records
POST employees-details/doc/106
{
	"EmpUserID":106
	"EmpName":"Annie",
	"Age":32,
	"Gender":"Female",
	"Address":[{"AddressID":111,"AddressNumber":198}]
}

o/p => 
{
	"_index":"employees-details",
	"_type":"doc",
	"_id":"106",
	"_version":2,
	"result":"updated",
	"_shards":{
		"total":2,
		"successful":1,
		"failed":0
	},
	"_seq_no":10,
	"_primary_term":2
	
}

Get API => The Get API allows to get a typed JSOn document from the index based on it`s id.
Means Getting all the records.
# Search Queries
GET employees-details/doc/_search
It will fetch all the records

Delete API => The Delete API allows to delete a typed JSON document from a specific index based on it`s id.
# Delete Query
DELETE employees-details/doc/106
o/p =>
{
	"_index":"employees-details",
	"_type":"doc",
	"_id":"106",
	"_version":6,
	"result":"deleted",
	"_shards":{
		"total":2,
		"successful":1,
		"failed":0
	},
	"_seq_no":14,
	"_primary_term":2
	
}

Update API => The Update API allows to update a documnet based on a script provided. The operation gets the document (collected with the shard) from the index, run the script (with optional script language and parameters), and index back the result(also allow to delete, or ignore the operation)

POST employees-details/doc/104/_update
{
	"script":{
		"source":"ctx._source.age=parmams.val",
		"lang":"painless",
		"params":{
			"val":30
		}
	}
}

# Want to add nested data in address
POST employees-details/doc/106/_update
{
	"script":{
		"source":"ctx._source.Address.add(parmams.tag)",
		"lang":"painless",
		"params":{
			"tag":{
				"AddressID":144,
				"AddressNumber":458
			}
		}
	}
}

# Suppose we want to update the person name
POST employees-details/doc/106/_update
{
	"doc" : {
		"EmpName":"Jennifer"
	}
}

2. Multi Document APIs
- Multi get API
- Bulk API
- Delete by query API
- Update by query API
- Reindex API

# Delete by query API => 
Suppose We want to specific cities. Suppose I want to delete Specific Emplyee by name

POST employees-details/_delete_by_query
{
	"query":{
		"match":{
			"EmpName":"Arvind"
		}
	}
}

# Update by query API => 
POST employees-details/_update_by_query
{
	"query":{
		"match":{
			"EmpName":"Arvind"
		}
	},
	"script":{
		"source":"ctx._source.Address.add(parmams.tag)",
		"lang":"painless",
		"params":{
			"tag":{
				"AddressID":144,
				"AddressNumber":458
			}
		}
	}
	
}

----------------------------------------------------

# Create Index:
=> PUT labels?pretty

o/p => 
{
  "acknowledged" : true,
  "shards_acknowledged" : true,
  "index" : "labels"
}
Here, pretty is used to data as human readble form.

After creating an index add document for newly created index.

# Add Document In Index
POST /labels/default/
{
	"name":"Processing Events",
	"instructor":{
		"firstName":"Shubham",
		"lastName":"Sharma"
	}
}

o/p =>
#! Deprecation: [types removal] Specifying types in document index requests is deprecated, use the typeless endpoints instead (/{index}/_doc/{id}, /{index}/_doc, or /{index}/_create/{id}).
{
  "_index" : "labels",
  "_type" : "default",
  "_id" : "tejfq2oB-p1oE_gLI21p",
  "_version" : 1,
  "result" : "created",
  "_shards" : {
    "total" : 2,
    "successful" : 1,
    "failed" : 0
  },
  "_seq_no" : 0,
  "_primary_term" : 1
}



==============================================================================
**************************************
https://github.com/confact/elasticsearch-codeigniter-library  -----------(Good)

https://github.com/niranjan-uma-shankar/Elasticsearch-PHP-class

https://www.cloudways.com/blog/setup-elasticsearch-with-mysql/  -----------(Good)
https://www.cloudways.com/blog/elasticsearch-codeigniter/

https://www.simplicity.be/article/using-elasticsearch-php/

https://www.codementor.io/ashish1dev/getting-started-with-elasticsearch-du107nett
-----------(Good)

https://www.phpclasses.org/package/10168-PHP-Index-and-search-MySQL-records-with-Elastic-Search.html

https://aws.amazon.com/blogs/database/elasticsearch-tutorial-a-quick-start-guide/
----------------(vGood)

**************************************
==============================================================================

There are only a few basic steps to getting an Amazon Elasticsearch Service domain up and running:

Define your domain
Configure your cluster
Set up access
Review

# Setting up AWS’s Elastic Search as a Service
1. Defining domain name & ES version

Give your ES a domain name, choose your ES version here, choose the latest version (5.1 at the time of writing this article), 

2. Cluster sizing
Instance count defines the number of VM’s you want your ES to be sharded across
Instance type
Enabling dedicated master,
Enable zone awareness
Storage Configuration
Automated snapshots 
Setting up access policy 

In the next screen you get to review your settings, after you have done the latter, click on the Confirm and Create button, we’ll learn how to setup replica’s before we move to the next section.

Then launch Kibana. Kibana is available via a link in your domain overview. To access it, you need to set up the appropriate permissions.  


Before you can search data, you must index it. Indexing is the method by which search engines organize data for fast retrieval.

Upload data to Amazon ES for indexing and searching





















