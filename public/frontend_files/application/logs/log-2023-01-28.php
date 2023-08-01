<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-01-28 19:39:59 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 76
ERROR - 2023-01-28 19:39:59 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 76
ERROR - 2023-01-28 19:39:59 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 82
ERROR - 2023-01-28 19:39:59 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 82
ERROR - 2023-01-28 19:39:59 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 150
ERROR - 2023-01-28 19:39:59 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 150
ERROR - 2023-01-28 20:35:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 's' OR LOWER(TRIM(m.Name)) = 'doctor's')' at line 12 - Invalid query: SELECT COUNT(b.ID) AS Total
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
WHERE b.ProductType =  1
AND b.IsActive =  1
AND g.IsActive =  1
AND m.IsActive =  1
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND (LOWER(TRIM(m.Name)) = 'doctor's' OR LOWER(TRIM(m.Name)) = 'doctor's')
