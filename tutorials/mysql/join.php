<?php

# Self Join:


employeeid	last_name	firstname	reportsto
1			Sharma		Andrew		2
2			Joshi		Bob			NULL
3			Mishra		Tom			2
4			Diwedi		Ban			2
5			Vyas		Rob			2
6			Tiwari		Harry		5
7			Pandey		Tim			5
8			Bhatt		Mac			2
9			Dubey		Sandy		5

SELECT 
    concat(e.firstname,' ',e.lastname) employee,
    concat(m.firstname,' ',m.lastname) manager
FROM
    employee_info e
INNER JOIN
    employee_info m ON m.employeeid = e.reportsto;
	
	
OUTPUT =>
(employee)			(manager)
Andrew	Sharma		Bob Joshi
Tom Mishra 			Bob Joshi
Ban Diwedi			Bob Joshi
Rob Vyas			Bob Joshi
Harry Tiwari		Rob Vyas
Tim Pandey			Rob Vyas
Mac Bhatt			Bob Joshi
Sandy Dubey			Rob Vyas


SELECT 
    concat(e.firstname, e.lastname) employee,
    concat(m.firstname, m.lastname) manager
FROM
    employee_info e
LEFT JOIN
    employee_info m ON m.employeeid = e.reportsto
ORDER BY manager;


OUTPUT =>
(employee)			(manager)
Bob Joshi			NULL
Andrew	Sharma		Bob Joshi
Tom Mishra 			Bob Joshi
Ban Diwedi			Bob Joshi
Rob Vyas			Bob Joshi
Harry Tiwari		Rob Vyas
Tim Pandey			Rob Vyas
Mac Bhatt			Bob Joshi
Sandy Dubey			Rob Vyas
======================================================================================

Notes Table:
╔══════════╦═════════════════╗
║ nid      ║    forDepts     ║
╠══════════╬═════════════════╣
║ 1        ║ 1,2,4           ║
║ 2        ║ 4,5             ║
╚══════════╩═════════════════╝

Positions Table:
╔══════════╦═════════════════╗
║ id       ║    name         ║
╠══════════╬═════════════════╣
║ 1        ║ Executive       ║
║ 2        ║ Corp Admin      ║
║ 3        ║ Sales           ║
║ 4        ║ Art             ║
║ 5        ║ Marketing       ║
╚══════════╩═════════════════╝

OUTPUT:
╠══════════╬════════════════════════════╣
║ 1        ║ Executive, Corp Admin, Art ║
║ 2        ║ Art, Marketing             ║
╚══════════╩════════════════════════════╝


SELECT  a.nid,
        GROUP_CONCAT(b.name ORDER BY b.id) DepartmentName
FROM    Notes a
        INNER JOIN Positions b
            ON FIND_IN_SET(b.id, a.forDepts) > 0
GROUP   BY a.nid