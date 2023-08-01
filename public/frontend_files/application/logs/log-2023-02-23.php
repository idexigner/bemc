<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-02-23 02:19:16 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 77
ERROR - 2023-02-23 02:19:16 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 77
ERROR - 2023-02-23 02:19:16 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2023-02-23 02:19:16 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2023-02-23 02:19:16 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2023-02-23 02:19:16 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2023-02-23 02:19:16 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2023-02-23 02:19:16 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2023-02-23 02:19:16 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2023-02-23 02:19:16 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2023-02-23 04:03:33 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ascorbic acid')
AND `a`.`PublishDate` <= '2023-02-23'
AND `a`.`UnpublishedDate` >= '2023-02-23'
AND `ca`.`IsActive` = 1
AND `a`.`IsActive` = 1
AND `p`.`IsActive` = 1
AND `a`.`ImagePath` <> ''
AND p.ID =  177
AND `ca`.`IsDeleted` = 0
AND `a`.`IsDeleted` = 0
AND `p`.`IsDeleted` = 0
ORDER BY rand()
 LIMIT 1
ERROR - 2023-02-23 04:03:33 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ascorbic acid')
AND `a`.`PublishDate` <= '2023-02-23'
AND `a`.`UnpublishedDate` >= '2023-02-23'
AND `ca`.`IsActive` = 1
AND `a`.`IsActive` = 1
AND `p`.`IsActive` = 1
AND `a`.`ImagePath` <> ''
AND p.ID =  176
AND `ca`.`IsDeleted` = 0
AND `a`.`IsDeleted` = 0
AND `p`.`IsDeleted` = 0
ORDER BY rand()
 LIMIT 1
ERROR - 2023-02-23 04:03:33 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ascorbic acid')
AND `a`.`PublishDate` <= '2023-02-23'
AND `a`.`UnpublishedDate` >= '2023-02-23'
AND `ca`.`IsActive` = 1
AND `a`.`IsActive` = 1
AND `p`.`IsActive` = 1
AND `a`.`ImagePath` <> ''
AND p.ID =  175
AND `ca`.`IsDeleted` = 0
AND `a`.`IsDeleted` = 0
AND `p`.`IsDeleted` = 0
ORDER BY rand()
 LIMIT 1
ERROR - 2023-02-23 04:03:42 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ascorbic acid')
AND `a`.`PublishDate` <= '2023-02-23'
AND `a`.`UnpublishedDate` >= '2023-02-23'
AND `ca`.`IsActive` = 1
AND `a`.`IsActive` = 1
AND `p`.`IsActive` = 1
AND `a`.`ImagePath` <> ''
AND p.ID =  178
AND `ca`.`IsDeleted` = 0
AND `a`.`IsDeleted` = 0
AND `p`.`IsDeleted` = 0
ORDER BY rand()
 LIMIT 1
ERROR - 2023-02-23 05:36:34 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 77
ERROR - 2023-02-23 05:36:34 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 77
ERROR - 2023-02-23 05:36:34 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2023-02-23 05:36:34 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2023-02-23 05:36:34 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2023-02-23 05:36:34 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2023-02-23 05:36:34 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2023-02-23 05:36:34 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2023-02-23 05:36:34 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2023-02-23 05:36:34 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2023-02-23 09:50:17 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:50:17 --> Unable to connect to the database
ERROR - 2023-02-23 09:50:17 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:50:17 --> Unable to connect to the database
ERROR - 2023-02-23 09:50:17 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:50:17 --> Unable to connect to the database
ERROR - 2023-02-23 09:50:17 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:50:17 --> Unable to connect to the database
ERROR - 2023-02-23 09:50:17 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:50:17 --> Unable to connect to the database
ERROR - 2023-02-23 09:50:17 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:50:17 --> Unable to connect to the database
ERROR - 2023-02-23 09:50:17 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:50:17 --> Unable to connect to the database
ERROR - 2023-02-23 09:50:17 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:50:17 --> Unable to connect to the database
ERROR - 2023-02-23 09:54:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:54:44 --> Unable to connect to the database
ERROR - 2023-02-23 09:54:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:54:44 --> Unable to connect to the database
ERROR - 2023-02-23 09:54:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:54:44 --> Unable to connect to the database
ERROR - 2023-02-23 09:54:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:54:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:54:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:54:44 --> Unable to connect to the database
ERROR - 2023-02-23 09:54:44 --> Unable to connect to the database
ERROR - 2023-02-23 09:54:44 --> Unable to connect to the database
ERROR - 2023-02-23 09:54:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:54:44 --> Unable to connect to the database
ERROR - 2023-02-23 09:54:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:54:44 --> Unable to connect to the database
ERROR - 2023-02-23 09:54:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:54:44 --> Unable to connect to the database
ERROR - 2023-02-23 09:54:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-23 09:54:45 --> Unable to connect to the database
ERROR - 2023-02-23 10:08:21 --> Severity: Error --> Maximum execution time of 300 seconds exceeded /home/mimsbang/public_html/system/libraries/Session/drivers/Session_files_driver.php 212
ERROR - 2023-02-23 10:08:21 --> Severity: Warning --> Unknown: Cannot call session save handler in a recursive manner Unknown 0
ERROR - 2023-02-23 10:08:21 --> Severity: Warning --> Unknown: Failed to write session data using user defined save handler. (session.save_path: /home/mimsbang/public_html/application/cache) Unknown 0
ERROR - 2023-02-23 10:14:59 --> Severity: Error --> Maximum execution time of 300 seconds exceeded /home/mimsbang/public_html/system/libraries/Session/drivers/Session_files_driver.php 420
ERROR - 2023-02-23 10:14:59 --> Severity: Warning --> Unknown: Cannot call session save handler in a recursive manner Unknown 0
ERROR - 2023-02-23 10:14:59 --> Severity: Warning --> Unknown: Failed to write session data using user defined save handler. (session.save_path: /home/mimsbang/public_html/application/cache) Unknown 0
ERROR - 2023-02-23 10:21:06 --> Severity: Error --> Maximum execution time of 300 seconds exceeded /home/mimsbang/public_html/system/libraries/Session/drivers/Session_files_driver.php 212
ERROR - 2023-02-23 10:21:06 --> Severity: Warning --> Unknown: Cannot call session save handler in a recursive manner Unknown 0
ERROR - 2023-02-23 10:21:06 --> Severity: Warning --> Unknown: Failed to write session data using user defined save handler. (session.save_path: /home/mimsbang/public_html/application/cache) Unknown 0
ERROR - 2023-02-23 10:27:45 --> Severity: Error --> Maximum execution time of 300 seconds exceeded /home/mimsbang/public_html/system/libraries/Session/drivers/Session_files_driver.php 212
ERROR - 2023-02-23 10:27:45 --> Severity: Warning --> Unknown: Cannot call session save handler in a recursive manner Unknown 0
ERROR - 2023-02-23 10:27:45 --> Severity: Warning --> Unknown: Failed to write session data using user defined save handler. (session.save_path: /home/mimsbang/public_html/application/cache) Unknown 0
ERROR - 2023-02-23 16:43:53 --> Severity: Notice --> Undefined index: callback /home/mimsbang/public_html/application/controllers/User.php 142
ERROR - 2023-02-23 19:45:56 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 75
ERROR - 2023-02-23 19:45:56 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 75
ERROR - 2023-02-23 19:45:56 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 81
ERROR - 2023-02-23 19:45:56 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 81
ERROR - 2023-02-23 19:45:56 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 189
ERROR - 2023-02-23 19:45:56 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 189
