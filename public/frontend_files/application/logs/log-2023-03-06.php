<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-03-06 02:18:06 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 76
ERROR - 2023-03-06 02:18:06 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 76
ERROR - 2023-03-06 02:18:06 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 82
ERROR - 2023-03-06 02:18:06 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 82
ERROR - 2023-03-06 02:18:06 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 150
ERROR - 2023-03-06 02:18:06 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 150
ERROR - 2023-03-06 04:35:26 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'esomeprazole')
AND `a`.`PublishDate` <= '2023-03-06'
AND `a`.`UnpublishedDate` >= '2023-03-06'
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
ERROR - 2023-03-06 04:35:26 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'esomeprazole')
AND `a`.`PublishDate` <= '2023-03-06'
AND `a`.`UnpublishedDate` >= '2023-03-06'
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
ERROR - 2023-03-06 04:35:26 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'esomeprazole')
AND `a`.`PublishDate` <= '2023-03-06'
AND `a`.`UnpublishedDate` >= '2023-03-06'
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
ERROR - 2023-03-06 04:35:26 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'esomeprazole')
AND `a`.`PublishDate` <= '2023-03-06'
AND `a`.`UnpublishedDate` >= '2023-03-06'
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
ERROR - 2023-03-06 04:47:21 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-03-06 04:47:21 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-03-06 04:47:21 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-03-06 04:47:21 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-03-06 04:47:21 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-03-06 04:47:21 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-03-06 04:47:21 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-03-06 04:47:21 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-03-06 04:47:21 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-03-06 04:47:21 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-03-06 04:52:03 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-03-06 04:52:03 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-03-06 04:52:03 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-03-06 04:52:03 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-03-06 04:52:03 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-03-06 04:52:03 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-03-06 04:52:03 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-03-06 04:52:03 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-03-06 04:52:03 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-03-06 04:52:03 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:13 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 10:16:58 --> Severity: Notice --> Undefined index: status /home/mimsbang/public_html/application/views/admin/advertisement.php 85
ERROR - 2023-03-06 12:19:22 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 76
ERROR - 2023-03-06 12:19:22 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 76
ERROR - 2023-03-06 12:19:22 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 82
ERROR - 2023-03-06 12:19:22 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 82
ERROR - 2023-03-06 12:19:22 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 150
ERROR - 2023-03-06 12:19:22 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 150
ERROR - 2023-03-06 13:14:00 --> Severity: Notice --> Undefined index: Title /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 37
ERROR - 2023-03-06 13:14:00 --> Severity: Notice --> Undefined index: Description /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 39
ERROR - 2023-03-06 13:14:00 --> Severity: Notice --> Undefined index: ImagePath /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 41
ERROR - 2023-03-06 13:14:00 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-06 13:14:00 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-06 13:14:00 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-06 13:14:00 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-06 13:14:00 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-06 13:14:00 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-06 13:14:00 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-06 13:14:00 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-06 14:34:03 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-06'
AND `a`.`UnpublishedDate` >= '2023-03-06'
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
ERROR - 2023-03-06 14:34:04 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-06'
AND `a`.`UnpublishedDate` >= '2023-03-06'
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
ERROR - 2023-03-06 14:34:04 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-06'
AND `a`.`UnpublishedDate` >= '2023-03-06'
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
ERROR - 2023-03-06 14:34:41 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-06'
AND `a`.`UnpublishedDate` >= '2023-03-06'
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
ERROR - 2023-03-06 14:43:53 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'betacarotene   vitamin c   vitamin e')
AND `a`.`PublishDate` <= '2023-03-06'
AND `a`.`UnpublishedDate` >= '2023-03-06'
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
ERROR - 2023-03-06 14:43:53 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'betacarotene   vitamin c   vitamin e')
AND `a`.`PublishDate` <= '2023-03-06'
AND `a`.`UnpublishedDate` >= '2023-03-06'
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
ERROR - 2023-03-06 14:44:45 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'betacarotene   vitamin c   vitamin e')
AND `a`.`PublishDate` <= '2023-03-06'
AND `a`.`UnpublishedDate` >= '2023-03-06'
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
ERROR - 2023-03-06 14:44:45 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'betacarotene   vitamin c   vitamin e')
AND `a`.`PublishDate` <= '2023-03-06'
AND `a`.`UnpublishedDate` >= '2023-03-06'
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
ERROR - 2023-03-06 14:45:05 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-06'
AND `a`.`UnpublishedDate` >= '2023-03-06'
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
ERROR - 2023-03-06 14:45:05 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-06'
AND `a`.`UnpublishedDate` >= '2023-03-06'
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
ERROR - 2023-03-06 14:45:22 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-06'
AND `a`.`UnpublishedDate` >= '2023-03-06'
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
ERROR - 2023-03-06 14:45:22 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-06'
AND `a`.`UnpublishedDate` >= '2023-03-06'
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
ERROR - 2023-03-06 17:37:53 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 76
ERROR - 2023-03-06 17:37:53 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 76
ERROR - 2023-03-06 17:37:53 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 82
ERROR - 2023-03-06 17:37:53 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 82
ERROR - 2023-03-06 17:37:53 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 150
ERROR - 2023-03-06 17:37:53 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 150
ERROR - 2023-03-06 21:19:53 --> Severity: Notice --> Undefined index: Title /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 37
ERROR - 2023-03-06 21:19:53 --> Severity: Notice --> Undefined index: Description /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 39
ERROR - 2023-03-06 21:19:53 --> Severity: Notice --> Undefined index: ImagePath /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 41
ERROR - 2023-03-06 21:19:53 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-06 21:19:53 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-06 21:19:53 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-06 21:19:53 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-06 21:19:53 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-06 21:19:53 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-06 21:19:53 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-06 21:19:53 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
