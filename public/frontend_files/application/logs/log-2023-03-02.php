<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-03-02 01:15:56 --> Severity: Notice --> Undefined index: callback /home/mimsbang/public_html/application/controllers/User.php 142
ERROR - 2023-03-02 03:35:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND `j`.`ID` <> 
WHERE `j`.`IsActive` = 1
AND `j`.`IsDeleted` = 0
AND `j`.`Pu...' at line 3 - Invalid query: SELECT `j`.`ID`, `j`.`Title`, `j`.`Description`, `j`.`Organization`, `j`.`OrganizationLogo`, `j`.`OrganizationLogo`, `j`.`Position`, `j`.`ApplicationDeadline`, `j`.`Salary`, `j`.`EducationalRequirement`, `j`.`ExperienceRequirement`, `j`.`NumberOfVacancy`, `j`.`AgeLimit`, `j`.`Location`, `j`.`JobSource`, `j`.`JobType`, `j`.`EmploymentType`, `j`.`JobNature`, `j`.`ApplyingProcedure`, `j`.`PublishDate`, `j`.`JobCircularImagePath`, DATEDIFF(CURDATE(), j.PublishDate) AS NumberOfDatePublished
FROM `mims_jobinformation` AS `j`
INNER JOIN `mims_jobinformation` AS `sj` ON `j`.`JobCategory` = `sj`.`JobCategory` AND `j`.`Position` = `sj`.`Position` AND `sj`.`ID` =  AND `j`.`ID` <> 
WHERE `j`.`IsActive` = 1
AND `j`.`IsDeleted` = 0
AND `j`.`PublishDate` <= '2023-03-02'
AND `j`.`ApplicationDeadline` >= '2023-03-02'
AND `sj`.`IsActive` = 1
AND `sj`.`IsDeleted` = 0
AND `sj`.`PublishDate` <= '2023-03-02'
AND `sj`.`ApplicationDeadline` >= '2023-03-02'
ORDER BY `j`.`PublishDate` DESC
 LIMIT 10
ERROR - 2023-03-02 12:47:56 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-03-02 12:47:56 --> Unable to connect to the database
ERROR - 2023-03-02 13:15:29 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-03-02 13:15:29 --> Unable to connect to the database
ERROR - 2023-03-02 13:15:29 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-03-02 13:15:29 --> Unable to connect to the database
ERROR - 2023-03-02 13:15:29 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-03-02 13:15:29 --> Unable to connect to the database
ERROR - 2023-03-02 13:24:35 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-03-02 13:24:35 --> Unable to connect to the database
ERROR - 2023-03-02 13:24:35 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-03-02 13:24:35 --> Unable to connect to the database
ERROR - 2023-03-02 13:24:36 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-03-02 13:24:36 --> Unable to connect to the database
ERROR - 2023-03-02 13:24:36 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-03-02 13:24:36 --> Unable to connect to the database
ERROR - 2023-03-02 13:24:36 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-03-02 13:24:36 --> Unable to connect to the database
ERROR - 2023-03-02 13:24:36 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-03-02 13:24:36 --> Unable to connect to the database
ERROR - 2023-03-02 13:24:37 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-03-02 13:24:37 --> Unable to connect to the database
ERROR - 2023-03-02 13:24:37 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-03-02 13:24:37 --> Unable to connect to the database
ERROR - 2023-03-02 13:24:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-03-02 13:24:44 --> Unable to connect to the database
ERROR - 2023-03-02 13:24:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-03-02 13:24:44 --> Unable to connect to the database
ERROR - 2023-03-02 13:24:57 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'test')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 13:24:57 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'test')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 13:24:57 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'test')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 13:24:57 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'test')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 13:27:57 --> Severity: Warning --> mysqli::real_connect(): (42000/1203): User mimsbang_mimsbang already has more than 'max_user_connections' active connections /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-03-02 13:27:57 --> Unable to connect to the database
ERROR - 2023-03-02 13:35:57 --> Severity: Notice --> Undefined index: bio_notes /home/mimsbang/public_html/application/libraries/entities/DoctorInformationEntity.php 62
ERROR - 2023-03-02 13:35:57 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:36:04 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:36:14 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:36:22 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:36:28 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:36:33 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:36:37 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:36:41 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:36:46 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:36:50 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:36:54 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:36:58 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:37:02 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:37:07 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:37:12 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:37:19 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:37:24 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:37:30 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:37:32 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:37:38 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:37:43 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:37:47 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:37:53 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:37:57 --> Severity: Notice --> Undefined index: bio_notes /home/mimsbang/public_html/application/libraries/entities/DoctorInformationEntity.php 62
ERROR - 2023-03-02 13:37:57 --> Severity: Notice --> Undefined variable: Link /home/mimsbang/public_html/application/views/front-end/emailTemplate.php 16
ERROR - 2023-03-02 13:43:19 --> Severity: Notice --> Undefined variable: require_fields /home/mimsbang/public_html/application/models/DoctorInformation_model.php 348
ERROR - 2023-03-02 13:43:19 --> Severity: Warning --> Invalid argument supplied for foreach() /home/mimsbang/public_html/application/core/MY_Model.php 32
ERROR - 2023-03-02 13:43:19 --> Severity: Notice --> Undefined index: bio_notes /home/mimsbang/public_html/application/libraries/entities/DoctorInformationEntity.php 62
ERROR - 2023-03-02 13:43:19 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/controllers/Doctor.php 247
ERROR - 2023-03-02 13:46:30 --> Severity: Notice --> Undefined variable: require_fields /home/mimsbang/public_html/application/models/DoctorInformation_model.php 348
ERROR - 2023-03-02 13:46:30 --> Severity: Warning --> Invalid argument supplied for foreach() /home/mimsbang/public_html/application/core/MY_Model.php 32
ERROR - 2023-03-02 13:46:30 --> Severity: Notice --> Undefined index: bio_notes /home/mimsbang/public_html/application/libraries/entities/DoctorInformationEntity.php 62
ERROR - 2023-03-02 13:46:30 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/controllers/Doctor.php 247
ERROR - 2023-03-02 14:04:07 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/controllers/Job.php 272
ERROR - 2023-03-02 14:21:06 --> Severity: Notice --> Undefined index: Title /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 37
ERROR - 2023-03-02 14:21:06 --> Severity: Notice --> Undefined index: Description /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 39
ERROR - 2023-03-02 14:21:06 --> Severity: Notice --> Undefined index: ImagePath /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 41
ERROR - 2023-03-02 14:21:06 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-02 14:21:06 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-02 14:21:06 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-02 14:21:06 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-02 14:21:06 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-02 14:21:06 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-02 14:21:06 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-02 14:21:06 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-02 14:21:06 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-03-02 14:45:06 --> Util::uploadThe filetype you are attempting to upload is not allowed.
ERROR - 2023-03-02 14:46:32 --> Util::uploadThe filetype you are attempting to upload is not allowed.
ERROR - 2023-03-02 14:48:15 --> Severity: error --> Exception: Call to undefined method JournalInformation_model::getJournalDetailInformation() /home/mimsbang/public_html/application/controllers/Journal.php 160
ERROR - 2023-03-02 14:49:36 --> Severity: error --> Exception: Call to undefined method JournalInformation_model::getJournalDetailInformation() /home/mimsbang/public_html/application/controllers/Journal.php 160
ERROR - 2023-03-02 15:46:25 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 's-amlodipine besilate (levamlodipine)')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 15:46:25 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 's-amlodipine besilate (levamlodipine)')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 15:46:25 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 's-amlodipine besilate (levamlodipine)')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 15:46:25 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 's-amlodipine besilate (levamlodipine)')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 15:53:14 --> Util::uploadThe filetype you are attempting to upload is not allowed.
ERROR - 2023-03-02 16:02:19 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'dabigratrian etexilate')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:02:19 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'dabigratrian etexilate')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:02:19 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'dabigratrian etexilate')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:02:19 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'dabigratrian etexilate')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:24:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND b.IsActive =  1
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
ERROR - 2023-03-02 16:28:20 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:20 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:20 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:20 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:20 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:20 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:20 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:20 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:21 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:21 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:31 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:31 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:31 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:31 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:31 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:31 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:31 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:31 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:31 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:31 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:31 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:31 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:31 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:31 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:35 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:35 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:36 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:36 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:36 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:36 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:37 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:37 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:37 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:37 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:37 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:37 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:42 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:42 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:43 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:43 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:44 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:28:44 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:29:09 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:29:09 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:29:09 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:29:09 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:29:09 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:29:09 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:38 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:38 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:40 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:40 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:40 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:40 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:41 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:41 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:41 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:41 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:41 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:41 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:41 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:41 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:41 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:41 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:41 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:41 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:43 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:43 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:43 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:43 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:43 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:43 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:43 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:43 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:44 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:44 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:44 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:44 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:44 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:44 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:44 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:44 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:45 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:45 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:45 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:45 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:45 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:45 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:49 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:49 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:49 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:49 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:50 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:50 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:50 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:50 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:50 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:50 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:50 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:50 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:51 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:30:51 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/models/BrandInformation_model.php 1316
ERROR - 2023-03-02 16:34:24 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:34:24 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:34:24 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:34:24 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:35:41 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:35:41 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:35:41 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:35:41 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:36:07 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ascorbic acid')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:36:07 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ascorbic acid')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:36:19 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ascorbic acid')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:36:19 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'ascorbic acid')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:43:32 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:43:32 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:43:32 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:43:32 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:43:43 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:43:43 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:43:43 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:43:43 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:44:02 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:44:02 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:44:02 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:44:02 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:45:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND b.IsActive =  1
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
ERROR - 2023-03-02 16:47:46 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:47:46 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:47:52 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:47:52 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:49:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND b.IsActive =  1
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
ERROR - 2023-03-02 16:50:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND b.IsActive =  1
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
ERROR - 2023-03-02 16:56:05 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a sukanya neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:56:05 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a sukanya neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:56:05 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a sukanya neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 16:56:05 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'a sukanya neutral premixed product consisting of 30% soluble human monocomponent insulin')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:00:46 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:00:46 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:00:57 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:00:57 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:01:32 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:01:33 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:01:33 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:01:33 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:02:16 --> Query error: Duplicate entry 'A neutral premixed product consisting of 30% soluble human mo...' for key 'Name' - Invalid query: UPDATE `mims_genericinformation` SET `Name` = 'A neutral premixed product consisting of 30% soluble human monocomponent Insulin &  70% isophane hum', `Classification` = 'Insulin analog; Pancreatic Hormones', `SafetyRemark` = 'P© L', `Indication` = '<p>Insulin is always used for the treatment of insulin-dependent diabetes mellitus (type I diabetes) and occasionally also for the treatment of therapy refractory non-insulin-dependent diabetes mellitus (type II).</p>\r\n', `IndicationTags` = 'Type I diabetes,Type II diabete', `DosageAdministration` = '<p>INTRAMUSCULAR Diabetic ketoacidosis: Adult: As soluble insulin, initial loading dose of 20 units, followed by 6 units/hr until blood glucose drops to 10 mmoI/l, when the dose is given 2 hrly. INTRAVENOUS Diabetic ketoacidosis: Adult: As soluble insulin, given in conc of 1 unit/mI using an infusion pump: Initially infuse at a rate of 6 unitsThr, double or quadruple the rate if blood glucose conc do not decrease by about 5 mmol/l/hr. If blood glucose concentrations have decreased to 10 mmol/l, reduce the infusion rate to 3 units/ hr &amp; continue w/ 5% glucose to prevent hypoglycaemia, until the patient can eat orally. Do not stop the insulin infusion before SC insulin is started. Ensure adequate fluid replacement &amp; include K Cl in the infusion to prevent insulin-induced hypokalaemia. Child: As soluble insulin, given in conc of 1 unit/mI using an infusion pump: Initially infuse at a rate of 0.1 units/ kg/hr, double or quadruple the rate if blood glucose conc do not decrease by about 5 mmol/l/hr. If blood glucose concentrations have decreased to 10 mmol/l, reduce the infusion rate to 0.05 units/kg/hr &amp; continue w/ 5% glucose to prevent hypoglycaemia, until the patient can eat orally. Do not stop the insulin infusion before SC insulin is started. Ensure adequate fluid replacement &amp; include K Cl in the infusion to prevent insulin-induced hypokalaemia. SUBCUTANEOUS Diabetes mellitus: Adult: Admin accoiding to requirements: inject into thighs, upper arms, buttocks, or abdomen.</p>\r\n', `ContraindicationPrecaution` = '<p>Hypoglycaemia. Pregnancy (insulin requirements tend to fall during the 1st trimester, increase during the 2nd &amp; 3rd) &amp; lactation. Regular monitoring of HbA1c &amp; blood glucose concentrations.</p>\r\n', `Composition` = '', `Pharmacology` = '', `Interaction` = '', `SideEffect` = '<p>Hypoglycaemia, insulin resistance, lipoatrophy, hypokalaemia, blurred vision.</p>\r\n', `OverdoseEffect` = '', `StorageCondition` = '', `PregnancyLactation` = '<p>Insulin has been assigned to pregnancy category B. It is the drug of choice for the treatment of diabetes during pregnancy. Data from human pregnancy have revealed an increased incidence of teratogenicity associated with diabetes mellitus; the association with the use of insulin is probably coincidental. Because of the strong association between diabetes or hyperglycemia and perinatal morbidity and multiple congenital malformations, most experts recommend strict control of maternal plasma glucose with the use of insulin during pregnancy. Insulin should only be given during pregnancy when need has been clearly established. Limited data reveal that the milk of women with insulin dependent diabetes mellitus (IDDM) has significantly lower lactose and higher total nitrogen relative to nondiabetic women. The infants of women with IDDM in this study had significantly less milk intake. The data indicate delayed lactogenesis for women with IDDM. The differences in milk composition of women with IDDM do not preclude them from breast-feeding.</p>\r\n', `LastUpdate` = '2023-03-02 17:02:16'
WHERE `ID` = '2344'
ERROR - 2023-03-02 17:02:36 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:02:36 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:02:36 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:02:36 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:05:07 --> Query error: Duplicate entry 'A neutral premixed product consisting of 30% soluble human mo...' for key 'Name' - Invalid query: UPDATE `mims_genericinformation` SET `Name` = 'A neutral premixed product consisting of 30% soluble human monocomponent Insulin &  70% isophane hum', `Classification` = 'Insulin analog; Pancreatic Hormones', `SafetyRemark` = 'P© L', `Indication` = '<p>Insulin is always used for the treatment of insulin-dependent diabetes mellitus (type I diabetes) and occasionally also for the treatment of therapy refractory non-insulin-dependent diabetes mellitus (type II).</p>\r\n', `IndicationTags` = 'Type I diabetes,Type II diabete', `DosageAdministration` = '<p>INTRAMUSCULAR Diabetic ketoacidosis: Adult: As soluble insulin, initial loading dose of 20 units, followed by 6 units/hr until blood glucose drops to 10 mmoI/l, when the dose is given 2 hrly. INTRAVENOUS Diabetic ketoacidosis: Adult: As soluble insulin, given in conc of 1 unit/mI using an infusion pump: Initially infuse at a rate of 6 unitsThr, double or quadruple the rate if blood glucose conc do not decrease by about 5 mmol/l/hr. If blood glucose concentrations have decreased to 10 mmol/l, reduce the infusion rate to 3 units/ hr &amp; continue w/ 5% glucose to prevent hypoglycaemia, until the patient can eat orally. Do not stop the insulin infusion before SC insulin is started. Ensure adequate fluid replacement &amp; include K Cl in the infusion to prevent insulin-induced hypokalaemia. Child: As soluble insulin, given in conc of 1 unit/mI using an infusion pump: Initially infuse at a rate of 0.1 units/ kg/hr, double or quadruple the rate if blood glucose conc do not decrease by about 5 mmol/l/hr. If blood glucose concentrations have decreased to 10 mmol/l, reduce the infusion rate to 0.05 units/kg/hr &amp; continue w/ 5% glucose to prevent hypoglycaemia, until the patient can eat orally. Do not stop the insulin infusion before SC insulin is started. Ensure adequate fluid replacement &amp; include K Cl in the infusion to prevent insulin-induced hypokalaemia. SUBCUTANEOUS Diabetes mellitus: Adult: Admin accoiding to requirements: inject into thighs, upper arms, buttocks, or abdomen.</p>\r\n', `ContraindicationPrecaution` = '<p>Hypoglycaemia. Pregnancy (insulin requirements tend to fall during the 1st trimester, increase during the 2nd &amp; 3rd) &amp; lactation. Regular monitoring of HbA1c &amp; blood glucose concentrations.</p>\r\n', `Composition` = '', `Pharmacology` = '', `Interaction` = '', `SideEffect` = '<p>Hypoglycaemia, insulin resistance, lipoatrophy, hypokalaemia, blurred vision.</p>\r\n', `OverdoseEffect` = '', `StorageCondition` = '', `PregnancyLactation` = '<p>Insulin has been assigned to pregnancy category B. It is the drug of choice for the treatment of diabetes during pregnancy. Data from human pregnancy have revealed an increased incidence of teratogenicity associated with diabetes mellitus; the association with the use of insulin is probably coincidental. Because of the strong association between diabetes or hyperglycemia and perinatal morbidity and multiple congenital malformations, most experts recommend strict control of maternal plasma glucose with the use of insulin during pregnancy. Insulin should only be given during pregnancy when need has been clearly established. Limited data reveal that the milk of women with insulin dependent diabetes mellitus (IDDM) has significantly lower lactose and higher total nitrogen relative to nondiabetic women. The infants of women with IDDM in this study had significantly less milk intake. The data indicate delayed lactogenesis for women with IDDM. The differences in milk composition of women with IDDM do not preclude them from breast-feeding.</p>\r\n', `LastUpdate` = '2023-03-02 17:05:07'
WHERE `ID` = '2344'
ERROR - 2023-03-02 17:14:55 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:14:55 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:14:55 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:14:55 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:15:04 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:15:04 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:15:04 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:15:04 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:17:32 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:17:32 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:17:32 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
ERROR - 2023-03-02 17:17:32 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'favipiravir')
AND `a`.`PublishDate` <= '2023-03-02'
AND `a`.`UnpublishedDate` >= '2023-03-02'
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
