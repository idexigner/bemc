<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-12-16 04:14:33 --> Severity: Notice --> Undefined index: Doctor /home/mimsbang/public_html/application/views/front-end/home.php 955
ERROR - 2022-12-16 04:14:59 --> Severity: Notice --> Undefined index: Doctor /home/mimsbang/public_html/application/views/front-end/home.php 955
ERROR - 2022-12-16 04:15:29 --> Severity: Notice --> Undefined index: Doctor /home/mimsbang/public_html/application/views/front-end/home.php 955
ERROR - 2022-12-16 06:33:09 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'levocarnitine')
AND `a`.`PublishDate` <= '2022-12-16'
AND `a`.`UnpublishedDate` >= '2022-12-16'
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
ERROR - 2022-12-16 06:33:09 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'levocarnitine')
AND `a`.`PublishDate` <= '2022-12-16'
AND `a`.`UnpublishedDate` >= '2022-12-16'
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
ERROR - 2022-12-16 06:33:09 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'levocarnitine')
AND `a`.`PublishDate` <= '2022-12-16'
AND `a`.`UnpublishedDate` >= '2022-12-16'
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
ERROR - 2022-12-16 06:33:19 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'levocarnitine')
AND `a`.`PublishDate` <= '2022-12-16'
AND `a`.`UnpublishedDate` >= '2022-12-16'
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
ERROR - 2022-12-16 07:28:11 --> Query error: Unknown column 'mims_b.ID' in 'field list' - Invalid query: SELECT `mims_b`.`ID`
FROM `mims_brandinformation`
WHERE ProductType =  2
AND IsActive =  1
AND IsDeleted =  0
ERROR - 2022-12-16 07:28:28 --> Query error: Unknown column 'mims_b.ID' in 'field list' - Invalid query: SELECT `mims_b`.`ID`
FROM `mims_brandinformation`
WHERE ProductType =  2
AND IsActive =  1
AND IsDeleted =  0
ERROR - 2022-12-16 07:28:31 --> Query error: Unknown column 'mims_b.ID' in 'field list' - Invalid query: SELECT `mims_b`.`ID`
FROM `mims_brandinformation`
WHERE ProductType =  2
AND IsActive =  1
AND IsDeleted =  0
ERROR - 2022-12-16 07:28:32 --> Query error: Unknown column 'mims_b.ID' in 'field list' - Invalid query: SELECT `mims_b`.`ID`
FROM `mims_brandinformation`
WHERE ProductType =  2
AND IsActive =  1
AND IsDeleted =  0
ERROR - 2022-12-16 07:28:48 --> Query error: Unknown column 'mims_b.ID' in 'field list' - Invalid query: SELECT `mims_b`.`ID`
FROM `mims_brandinformation`
WHERE ProductType =  2
AND IsActive =  1
AND IsDeleted =  0
ERROR - 2022-12-16 07:28:50 --> Query error: Unknown column 'mims_b.ID' in 'field list' - Invalid query: SELECT `mims_b`.`ID`
FROM `mims_brandinformation`
WHERE ProductType =  2
AND IsActive =  1
AND IsDeleted =  0
ERROR - 2022-12-16 07:28:51 --> Query error: Unknown column 'mims_b.ID' in 'field list' - Invalid query: SELECT `mims_b`.`ID`
FROM `mims_brandinformation`
WHERE ProductType =  2
AND IsActive =  1
AND IsDeleted =  0
ERROR - 2022-12-16 11:54:37 --> Query error: Unknown column 'mims_m.IsActive' in 'where clause' - Invalid query: SELECT `ID`
FROM `mims_manufacturerinformation`
WHERE `mims_m`.`IsActive` = 1
AND `mims_m`.`IsDeleted` = 0
ERROR - 2022-12-16 11:55:02 --> Query error: Unknown column 'mims_m.IsActive' in 'where clause' - Invalid query: SELECT `ID`
FROM `mims_manufacturerinformation`
WHERE `mims_m`.`IsActive` = 1
AND `mims_m`.`IsDeleted` = 0
ERROR - 2022-12-16 11:55:05 --> Query error: Unknown column 'mims_m.IsActive' in 'where clause' - Invalid query: SELECT `ID`
FROM `mims_manufacturerinformation`
WHERE `mims_m`.`IsActive` = 1
AND `mims_m`.`IsDeleted` = 0
ERROR - 2022-12-16 11:55:07 --> Query error: Unknown column 'mims_m.IsActive' in 'where clause' - Invalid query: SELECT `ID`
FROM `mims_manufacturerinformation`
WHERE `mims_m`.`IsActive` = 1
AND `mims_m`.`IsDeleted` = 0
ERROR - 2022-12-16 11:55:25 --> Query error: Unknown column 'mims_m.IsActive' in 'where clause' - Invalid query: SELECT `ID`
FROM `mims_manufacturerinformation`
WHERE `mims_m`.`IsActive` = 1
AND `mims_m`.`IsDeleted` = 0
ERROR - 2022-12-16 11:55:27 --> Query error: Unknown column 'mims_m.IsActive' in 'where clause' - Invalid query: SELECT `ID`
FROM `mims_manufacturerinformation`
WHERE `mims_m`.`IsActive` = 1
AND `mims_m`.`IsDeleted` = 0
