<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-02-16 03:42:48 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ascorbic acid')
AND `a`.`PublishDate` <= '2023-02-16'
AND `a`.`UnpublishedDate` >= '2023-02-16'
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
ERROR - 2023-02-16 03:42:48 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ascorbic acid')
AND `a`.`PublishDate` <= '2023-02-16'
AND `a`.`UnpublishedDate` >= '2023-02-16'
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
ERROR - 2023-02-16 03:42:56 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ascorbic acid')
AND `a`.`PublishDate` <= '2023-02-16'
AND `a`.`UnpublishedDate` >= '2023-02-16'
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
ERROR - 2023-02-16 03:42:56 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ascorbic acid')
AND `a`.`PublishDate` <= '2023-02-16'
AND `a`.`UnpublishedDate` >= '2023-02-16'
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
ERROR - 2023-02-16 03:58:06 --> 404 Page Not Found: User/dW5zdWJzY3
ERROR - 2023-02-16 03:58:08 --> 404 Page Not Found: User/dW5zdWJzY3
ERROR - 2023-02-16 04:04:08 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/controllers/Job.php 272
ERROR - 2023-02-16 04:33:27 --> Severity: Notice --> Undefined index: Title /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 37
ERROR - 2023-02-16 04:33:27 --> Severity: Notice --> Undefined index: Description /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 39
ERROR - 2023-02-16 04:33:27 --> Severity: Notice --> Undefined index: ImagePath /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 41
ERROR - 2023-02-16 04:33:27 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 04:33:27 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 04:33:27 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 04:33:27 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 04:33:27 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 04:33:27 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 04:33:27 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 04:33:27 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 04:33:27 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 04:33:27 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 04:38:59 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:38:59 --> Unable to connect to the database
ERROR - 2023-02-16 04:38:59 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:38:59 --> Unable to connect to the database
ERROR - 2023-02-16 04:38:59 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:38:59 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:38:59 --> Unable to connect to the database
ERROR - 2023-02-16 04:38:59 --> Unable to connect to the database
ERROR - 2023-02-16 04:38:59 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:38:59 --> Unable to connect to the database
ERROR - 2023-02-16 04:38:59 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:38:59 --> Unable to connect to the database
ERROR - 2023-02-16 04:39:00 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:39:00 --> Unable to connect to the database
ERROR - 2023-02-16 04:39:00 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:39:00 --> Unable to connect to the database
ERROR - 2023-02-16 04:39:35 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:39:35 --> Unable to connect to the database
ERROR - 2023-02-16 04:39:42 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:39:42 --> Unable to connect to the database
ERROR - 2023-02-16 04:39:49 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:39:49 --> Unable to connect to the database
ERROR - 2023-02-16 04:39:57 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:39:57 --> Unable to connect to the database
ERROR - 2023-02-16 04:52:35 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:52:35 --> Unable to connect to the database
ERROR - 2023-02-16 04:52:35 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:52:35 --> Unable to connect to the database
ERROR - 2023-02-16 04:52:35 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:52:35 --> Unable to connect to the database
ERROR - 2023-02-16 04:52:35 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:52:35 --> Unable to connect to the database
ERROR - 2023-02-16 04:52:35 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:52:35 --> Unable to connect to the database
ERROR - 2023-02-16 04:52:35 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:52:35 --> Unable to connect to the database
ERROR - 2023-02-16 04:52:35 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 04:52:35 --> Unable to connect to the database
ERROR - 2023-02-16 05:13:25 --> 404 Page Not Found: User/dW5zdWJzY3
ERROR - 2023-02-16 05:13:27 --> 404 Page Not Found: User/dW5zdWJzY3
ERROR - 2023-02-16 05:31:54 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:31:54 --> Unable to connect to the database
ERROR - 2023-02-16 05:31:54 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:31:54 --> Unable to connect to the database
ERROR - 2023-02-16 05:31:54 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:31:54 --> Unable to connect to the database
ERROR - 2023-02-16 05:31:54 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:31:54 --> Unable to connect to the database
ERROR - 2023-02-16 05:31:54 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:31:54 --> Unable to connect to the database
ERROR - 2023-02-16 05:31:54 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:31:54 --> Unable to connect to the database
ERROR - 2023-02-16 05:31:54 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:31:54 --> Unable to connect to the database
ERROR - 2023-02-16 05:31:54 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:31:54 --> Unable to connect to the database
ERROR - 2023-02-16 05:31:54 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:31:54 --> Unable to connect to the database
ERROR - 2023-02-16 05:31:54 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:31:54 --> Unable to connect to the database
ERROR - 2023-02-16 05:31:55 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:31:55 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:00 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:00 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:04 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:04 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:04 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:04 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:04 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:04 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:04 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:04 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:04 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:04 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:04 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:04 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:04 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:04 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:04 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:04 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:04 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:04 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:04 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:04 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:05 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:05 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:05 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:05 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:06 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:06 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:10 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:10 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:10 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:10 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:10 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:10 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:10 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:10 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:10 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:10 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:10 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:10 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:11 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:11 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:11 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:11 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:11 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:11 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:11 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:11 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:12 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:12 --> Unable to connect to the database
ERROR - 2023-02-16 05:32:12 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:32:12 --> Unable to connect to the database
ERROR - 2023-02-16 05:33:28 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:33:28 --> Unable to connect to the database
ERROR - 2023-02-16 05:33:28 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:33:28 --> Unable to connect to the database
ERROR - 2023-02-16 05:33:28 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:33:28 --> Unable to connect to the database
ERROR - 2023-02-16 05:33:28 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:33:28 --> Unable to connect to the database
ERROR - 2023-02-16 05:33:28 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:33:28 --> Unable to connect to the database
ERROR - 2023-02-16 05:33:28 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:33:28 --> Unable to connect to the database
ERROR - 2023-02-16 05:33:28 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:33:28 --> Unable to connect to the database
ERROR - 2023-02-16 05:33:28 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:33:28 --> Unable to connect to the database
ERROR - 2023-02-16 05:33:28 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:33:28 --> Unable to connect to the database
ERROR - 2023-02-16 05:33:28 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:33:28 --> Unable to connect to the database
ERROR - 2023-02-16 05:33:39 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:33:39 --> Unable to connect to the database
ERROR - 2023-02-16 05:33:39 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:33:39 --> Unable to connect to the database
ERROR - 2023-02-16 05:33:39 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:33:39 --> Unable to connect to the database
ERROR - 2023-02-16 05:33:40 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:33:40 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:05 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:05 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:05 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:05 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:05 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:05 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:05 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:05 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:05 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:05 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:05 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:05 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:05 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:05 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:05 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:05 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:05 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:05 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:05 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:05 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:05 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:05 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:06 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:06 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:06 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:06 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:21 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:21 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:21 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:21 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:21 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:21 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:21 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:21 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:21 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:21 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:21 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:21 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:21 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:21 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:22 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:22 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:22 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:22 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:22 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:22 --> Unable to connect to the database
ERROR - 2023-02-16 05:34:32 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-16 05:34:32 --> Unable to connect to the database
ERROR - 2023-02-16 05:57:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND b.IsActive =  1
AND b.IsDeleted =  0
AND df.IsActive =  1
AND df.IsDelete...' at line 5 - Invalid query: SELECT DISTINCT(CONCAT(UPPER(TRIM(b.Name)), ' ', UPPER(TRIM(df.Name)))) AS bName
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
WHERE b.ProductType =  
AND b.IsActive =  1
AND b.IsDeleted =  0
AND df.IsActive =  1
AND df.IsDeleted =  0
ORDER BY `bName`
ERROR - 2023-02-16 08:26:36 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ganciclovir')
AND `a`.`PublishDate` <= '2023-02-16'
AND `a`.`UnpublishedDate` >= '2023-02-16'
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
ERROR - 2023-02-16 08:26:36 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ganciclovir')
AND `a`.`PublishDate` <= '2023-02-16'
AND `a`.`UnpublishedDate` >= '2023-02-16'
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
ERROR - 2023-02-16 08:26:36 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ganciclovir')
AND `a`.`PublishDate` <= '2023-02-16'
AND `a`.`UnpublishedDate` >= '2023-02-16'
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
ERROR - 2023-02-16 08:26:43 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ganciclovir')
AND `a`.`PublishDate` <= '2023-02-16'
AND `a`.`UnpublishedDate` >= '2023-02-16'
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
ERROR - 2023-02-16 08:28:12 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'aspirin')
AND `a`.`PublishDate` <= '2023-02-16'
AND `a`.`UnpublishedDate` >= '2023-02-16'
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
ERROR - 2023-02-16 08:28:12 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'aspirin')
AND `a`.`PublishDate` <= '2023-02-16'
AND `a`.`UnpublishedDate` >= '2023-02-16'
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
ERROR - 2023-02-16 08:28:23 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'aspirin')
AND `a`.`PublishDate` <= '2023-02-16'
AND `a`.`UnpublishedDate` >= '2023-02-16'
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
ERROR - 2023-02-16 08:28:23 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'aspirin')
AND `a`.`PublishDate` <= '2023-02-16'
AND `a`.`UnpublishedDate` >= '2023-02-16'
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
ERROR - 2023-02-16 10:39:16 --> 404 Page Not Found: Home/medical
ERROR - 2023-02-16 15:59:54 --> Severity: Notice --> Undefined index: Title /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 37
ERROR - 2023-02-16 15:59:54 --> Severity: Notice --> Undefined index: Description /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 39
ERROR - 2023-02-16 15:59:54 --> Severity: Notice --> Undefined index: ImagePath /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 41
ERROR - 2023-02-16 15:59:54 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 15:59:54 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 15:59:54 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 15:59:54 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 15:59:54 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 15:59:54 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 15:59:54 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 15:59:54 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 15:59:54 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 15:59:54 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 18:15:20 --> Severity: Notice --> Undefined index: Title /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 37
ERROR - 2023-02-16 18:15:20 --> Severity: Notice --> Undefined index: Description /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 39
ERROR - 2023-02-16 18:15:20 --> Severity: Notice --> Undefined index: ImagePath /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 41
ERROR - 2023-02-16 18:15:20 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 18:15:20 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 18:15:20 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 18:15:20 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 18:15:20 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 18:15:20 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 18:15:20 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 18:15:20 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 18:15:20 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 18:15:20 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-02-16 18:22:55 --> 404 Page Not Found: Home/ourdoctor
