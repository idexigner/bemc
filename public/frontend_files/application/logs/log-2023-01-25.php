<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-01-25 04:51:41 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'atenolol   chlortalidone')
AND `a`.`PublishDate` <= '2023-01-25'
AND `a`.`UnpublishedDate` >= '2023-01-25'
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
ERROR - 2023-01-25 04:51:41 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'atenolol   chlortalidone')
AND `a`.`PublishDate` <= '2023-01-25'
AND `a`.`UnpublishedDate` >= '2023-01-25'
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
ERROR - 2023-01-25 04:51:41 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'atenolol   chlortalidone')
AND `a`.`PublishDate` <= '2023-01-25'
AND `a`.`UnpublishedDate` >= '2023-01-25'
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
ERROR - 2023-01-25 04:51:41 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'atenolol   chlortalidone')
AND `a`.`PublishDate` <= '2023-01-25'
AND `a`.`UnpublishedDate` >= '2023-01-25'
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
ERROR - 2023-01-25 07:23:11 --> Query error: Duplicate entry 'Avanafil-1' for key 'Name' - Invalid query: INSERT INTO `mims_genericinformation` (`CreatedBy`, `Name`, `Classification`, `SafetyRemark`, `Indication`, `IndicationTags`, `DosageAdministration`, `ContraindicationPrecaution`, `Composition`, `Pharmacology`, `Interaction`, `SideEffect`, `OverdoseEffect`, `StorageCondition`, `PregnancyLactation`) VALUES (219, 'Avanafil', ' Erectile Dysfunction & Ejaculatory Disorders', 'As per physician', '<p>It is a phosphodiesterase 5 (PDE5) inhibitor indicated for the treatment of erectile dysfunction.&nbsp;</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', ' Avanafil is indicated for the treatment of erectile dysfunction', '<p>For most patients, the starting dose is 100 mg taken approximately 30 minutes before sexual activity, on an as needed basis.&nbsp;</p>\r\n\r\n<p>The dose may be increased to 200 mg or decreased to 50 mg based on efficacy and/or tolerability. Use the lowest dose that provides benefit</p>\r\n\r\n<p>If taking a moderate CYP3A4 inhibitor, the dose should be no more than 50 mg in a 24-hour period.&nbsp;In patients on stable alpha-blocker therapy, the recommended starting dose is 50 mg.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>Administration ofthis drug to patients using any form of organic nitrate is contraindicated.&nbsp;Hypersensitivity to any component of the this tablet.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>&nbsp;</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>Avanafil inhibits the cGMP-specific phosphodiesterase type 5 (PDE5) which is responsible for the degradation of cGMP in the corpus cavernosum located around the penis. Sexual arousal results in the local release of nitric oxide, which in turn stimulates the enzyme guanylate cyclase to produce cGMP. Elevated levels of cGMP result in local smooth muscle relaxation and increased blood flow to the penis (i.e. an erection)</p>\r\n\r\n<p>As PDE5 inhibitors like avanafil require the endogenous release of nitric oxide in order to exert their pharmacologic effect, they have no effect on the user in the absence of sexual stimulation/arousal.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>A product that may interact with this drug is: riociguat. Avanafil&nbsp;can cause a serious drop in your blood pressure when used with nitrates, which can lead to dizziness, fainting, and rarely heart attack or stroke.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>Headache, skin flushing, nasal symptoms, and back pain&nbsp;are the most common avanafil side effects.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>Single doses up to 800 mg have been given to healthy subjects, and multiple doses up to 300 mg have been given to patients. In cases of overdose, standard supportive measures should be adopted as required. Renal dialysis is not expected to accelerate clearance because avanafil is highly bound to plasma proteins and is not significantly eliminated in the urine.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>Store avanafil at (20&deg;C to 25&deg;C).</p>\r\n\r\n<p>Store avanafil out of the light.</p>\r\n\r\n<p>Keep this and all medicines out of the reach of children.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>Avanafil can not used woman.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>')
ERROR - 2023-01-25 07:24:20 --> Query error: Duplicate entry 'Avanafil-1' for key 'Name' - Invalid query: INSERT INTO `mims_genericinformation` (`CreatedBy`, `Name`, `Classification`, `SafetyRemark`, `Indication`, `IndicationTags`, `DosageAdministration`, `ContraindicationPrecaution`, `Composition`, `Pharmacology`, `Interaction`, `SideEffect`, `OverdoseEffect`, `StorageCondition`, `PregnancyLactation`) VALUES (219, 'Avanafil', ' Dysfunction & Ejaculatory Disorders', 'As per physician', '<p>It is a phosphodiesterase 5 (PDE5) inhibitor indicated for the treatment of erectile dysfunction.&nbsp;</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '', '<p>For most patients, the starting dose is 100 mg taken approximately 30 minutes before sexual activity, on an as needed basis.&nbsp;</p>\r\n\r\n<p>The dose may be increased to 200 mg or decreased to 50 mg based on efficacy and/or tolerability. Use the lowest dose that provides benefit</p>\r\n\r\n<p>If taking a moderate CYP3A4 inhibitor, the dose should be no more than 50 mg in a 24-hour period.&nbsp;In patients on stable alpha-blocker therapy, the recommended starting dose is 50 mg.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>Administration ofthis drug to patients using any form of organic nitrate is contraindicated.&nbsp;Hypersensitivity to any component of the this tablet.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>&nbsp;</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>Avanafil inhibits the cGMP-specific phosphodiesterase type 5 (PDE5) which is responsible for the degradation of cGMP in the corpus cavernosum located around the penis. Sexual arousal results in the local release of nitric oxide, which in turn stimulates the enzyme guanylate cyclase to produce cGMP. Elevated levels of cGMP result in local smooth muscle relaxation and increased blood flow to the penis (i.e. an erection)</p>\r\n\r\n<p>As PDE5 inhibitors like avanafil require the endogenous release of nitric oxide in order to exert their pharmacologic effect, they have no effect on the user in the absence of sexual stimulation/arousal.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>A product that may interact with this drug is: riociguat. Avanafil&nbsp;can cause a serious drop in your blood pressure when used with nitrates, which can lead to dizziness, fainting, and rarely heart attack or stroke.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>Headache, skin flushing, nasal symptoms, and back pain&nbsp;are the most common avanafil side effects.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>Single doses up to 800 mg have been given to healthy subjects, and multiple doses up to 300 mg have been given to patients. In cases of overdose, standard supportive measures should be adopted as required. Renal dialysis is not expected to accelerate clearance because avanafil is highly bound to plasma proteins and is not significantly eliminated in the urine.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>Store avanafil at (20&deg;C to 25&deg;C).</p>\r\n\r\n<p>Store avanafil out of the light.</p>\r\n\r\n<p>Keep this and all medicines out of the reach of children.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>Avanafil can not used woman.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>')
ERROR - 2023-01-25 07:31:50 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'azelaic acid')
AND `a`.`PublishDate` <= '2023-01-25'
AND `a`.`UnpublishedDate` >= '2023-01-25'
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
ERROR - 2023-01-25 07:31:50 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'azelaic acid')
AND `a`.`PublishDate` <= '2023-01-25'
AND `a`.`UnpublishedDate` >= '2023-01-25'
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
ERROR - 2023-01-25 07:31:50 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'azelaic acid')
AND `a`.`PublishDate` <= '2023-01-25'
AND `a`.`UnpublishedDate` >= '2023-01-25'
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
ERROR - 2023-01-25 07:31:50 --> Query error: Unknown column 'b.DosageFormID' in 'on clause' - Invalid query: SELECT `a`.`Title`, `a`.`BodyText`, `a`.`LinkURL`, `a`.`ImagePath`, `p`.`Interval`, `p`.`ClassName`
FROM `mims_categorywiseadvertisement` AS `ca`
INNER JOIN `mims_advertisementinformation` AS `a` ON `ca`.`AdvertisementID` = `a`.`ID`
INNER JOIN `mims_advertisementpositioninformation` AS `p` ON `a`.`AdvertisementPositionID` = `p`.`ID`
WHERE `ca`.`CategoryID` = '1'
AND `ca`.`CategoryValue` IN (SELECT b.ID FROM mims_genericinformation AS b INNER JOIN mims_dosageforminformation AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = 'azelaic acid')
AND `a`.`PublishDate` <= '2023-01-25'
AND `a`.`UnpublishedDate` >= '2023-01-25'
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
ERROR - 2023-01-25 23:50:46 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 77
ERROR - 2023-01-25 23:50:46 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 77
ERROR - 2023-01-25 23:50:46 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2023-01-25 23:50:46 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2023-01-25 23:50:46 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2023-01-25 23:50:46 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2023-01-25 23:50:46 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2023-01-25 23:50:46 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2023-01-25 23:50:46 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2023-01-25 23:50:46 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
