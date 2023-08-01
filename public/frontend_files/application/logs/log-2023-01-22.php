<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-01-22 04:15:27 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'abiraterone acetate')
AND `a`.`PublishDate` <= '2023-01-22'
AND `a`.`UnpublishedDate` >= '2023-01-22'
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
ERROR - 2023-01-22 04:15:27 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'abiraterone acetate')
AND `a`.`PublishDate` <= '2023-01-22'
AND `a`.`UnpublishedDate` >= '2023-01-22'
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
ERROR - 2023-01-22 04:15:27 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'abiraterone acetate')
AND `a`.`PublishDate` <= '2023-01-22'
AND `a`.`UnpublishedDate` >= '2023-01-22'
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
ERROR - 2023-01-22 04:15:34 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'abiraterone acetate')
AND `a`.`PublishDate` <= '2023-01-22'
AND `a`.`UnpublishedDate` >= '2023-01-22'
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
ERROR - 2023-01-22 04:31:59 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'abiraterone acetate')
AND `a`.`PublishDate` <= '2023-01-22'
AND `a`.`UnpublishedDate` >= '2023-01-22'
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
ERROR - 2023-01-22 04:31:59 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'abiraterone acetate')
AND `a`.`PublishDate` <= '2023-01-22'
AND `a`.`UnpublishedDate` >= '2023-01-22'
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
ERROR - 2023-01-22 04:31:59 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'abiraterone acetate')
AND `a`.`PublishDate` <= '2023-01-22'
AND `a`.`UnpublishedDate` >= '2023-01-22'
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
ERROR - 2023-01-22 04:31:59 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'abiraterone acetate')
AND `a`.`PublishDate` <= '2023-01-22'
AND `a`.`UnpublishedDate` >= '2023-01-22'
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
ERROR - 2023-01-22 04:37:33 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'azelastine')
AND `a`.`PublishDate` <= '2023-01-22'
AND `a`.`UnpublishedDate` >= '2023-01-22'
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
ERROR - 2023-01-22 04:37:38 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'azelastine')
AND `a`.`PublishDate` <= '2023-01-22'
AND `a`.`UnpublishedDate` >= '2023-01-22'
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
ERROR - 2023-01-22 04:37:38 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'azelastine')
AND `a`.`PublishDate` <= '2023-01-22'
AND `a`.`UnpublishedDate` >= '2023-01-22'
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
ERROR - 2023-01-22 04:37:38 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'azelastine')
AND `a`.`PublishDate` <= '2023-01-22'
AND `a`.`UnpublishedDate` >= '2023-01-22'
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
ERROR - 2023-01-22 06:43:00 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ascorbic acid')
AND `a`.`PublishDate` <= '2023-01-22'
AND `a`.`UnpublishedDate` >= '2023-01-22'
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
ERROR - 2023-01-22 06:43:00 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ascorbic acid')
AND `a`.`PublishDate` <= '2023-01-22'
AND `a`.`UnpublishedDate` >= '2023-01-22'
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
ERROR - 2023-01-22 06:43:00 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ascorbic acid')
AND `a`.`PublishDate` <= '2023-01-22'
AND `a`.`UnpublishedDate` >= '2023-01-22'
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
ERROR - 2023-01-22 06:43:00 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ascorbic acid')
AND `a`.`PublishDate` <= '2023-01-22'
AND `a`.`UnpublishedDate` >= '2023-01-22'
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
