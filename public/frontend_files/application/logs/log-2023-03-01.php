<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-03-01 08:27:11 --> 404 Page Not Found: Admin/index
ERROR - 2023-03-01 08:27:15 --> 404 Page Not Found: Login/index
ERROR - 2023-03-01 08:29:40 --> 404 Page Not Found: Adminpanel/index
ERROR - 2023-03-01 08:29:42 --> 404 Page Not Found: Login/index
ERROR - 2023-03-01 08:30:18 --> 404 Page Not Found: Admin/index
ERROR - 2023-03-01 08:31:38 --> 404 Page Not Found: Mims/index
ERROR - 2023-03-01 08:56:59 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'brimonidine')
AND `a`.`PublishDate` <= '2023-03-01'
AND `a`.`UnpublishedDate` >= '2023-03-01'
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
ERROR - 2023-03-01 08:56:59 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'brimonidine')
AND `a`.`PublishDate` <= '2023-03-01'
AND `a`.`UnpublishedDate` >= '2023-03-01'
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
ERROR - 2023-03-01 08:56:59 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'brimonidine')
AND `a`.`PublishDate` <= '2023-03-01'
AND `a`.`UnpublishedDate` >= '2023-03-01'
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
ERROR - 2023-03-01 08:56:59 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'brimonidine')
AND `a`.`PublishDate` <= '2023-03-01'
AND `a`.`UnpublishedDate` >= '2023-03-01'
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
ERROR - 2023-03-01 11:14:58 --> Severity: Notice --> Undefined index: Title /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 37
ERROR - 2023-03-01 11:14:58 --> Severity: Notice --> Undefined index: Description /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 39
ERROR - 2023-03-01 11:14:58 --> Severity: Notice --> Undefined index: ImagePath /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 41
ERROR - 2023-03-01 11:14:58 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-01 11:14:58 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-01 11:14:58 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-01 11:14:58 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-01 11:14:58 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-01 11:14:58 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-01 11:14:58 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-01 11:14:58 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-01 19:48:52 --> Severity: Notice --> Undefined index: callback /home/mimsbang/public_html/application/controllers/News.php 161
