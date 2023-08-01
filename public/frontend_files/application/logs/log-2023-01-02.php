<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-01-02 01:27:41 --> Severity: Notice --> Undefined index: callback /home/mimsbang/public_html/application/controllers/CommonMethods.php 39
ERROR - 2023-01-02 10:14:35 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-01-02 10:14:35 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-01-02 10:14:35 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-01-02 10:14:35 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-01-02 10:14:35 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-01-02 10:14:35 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-01-02 10:14:35 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-01-02 10:14:35 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-01-02 10:14:35 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-01-02 10:14:35 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-01-02 10:14:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND `j`.`ID` <> 
WHERE `j`.`IsActive` = 1
AND `j`.`IsDeleted` = 0
AND `j`.`Pu...' at line 3 - Invalid query: SELECT `j`.`ID`, `j`.`Title`, `j`.`Description`, `j`.`Organization`, `j`.`OrganizationLogo`, `j`.`OrganizationLogo`, `j`.`Position`, `j`.`ApplicationDeadline`, `j`.`Salary`, `j`.`EducationalRequirement`, `j`.`ExperienceRequirement`, `j`.`NumberOfVacancy`, `j`.`AgeLimit`, `j`.`Location`, `j`.`JobSource`, `j`.`JobType`, `j`.`EmploymentType`, `j`.`JobNature`, `j`.`ApplyingProcedure`, `j`.`PublishDate`, `j`.`JobCircularImagePath`, DATEDIFF(CURDATE(), j.PublishDate) AS NumberOfDatePublished
FROM `mims_jobinformation` AS `j`
INNER JOIN `mims_jobinformation` AS `sj` ON `j`.`JobCategory` = `sj`.`JobCategory` AND `j`.`Position` = `sj`.`Position` AND `sj`.`ID` =  AND `j`.`ID` <> 
WHERE `j`.`IsActive` = 1
AND `j`.`IsDeleted` = 0
AND `j`.`PublishDate` <= '2023-01-02'
AND `j`.`ApplicationDeadline` >= '2023-01-02'
AND `sj`.`IsActive` = 1
AND `sj`.`IsDeleted` = 0
AND `sj`.`PublishDate` <= '2023-01-02'
AND `sj`.`ApplicationDeadline` >= '2023-01-02'
ORDER BY `j`.`PublishDate` DESC
 LIMIT 10
ERROR - 2023-01-02 10:14:43 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 76
ERROR - 2023-01-02 10:14:43 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 76
ERROR - 2023-01-02 10:14:43 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 82
ERROR - 2023-01-02 10:14:43 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 82
ERROR - 2023-01-02 10:14:43 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 150
ERROR - 2023-01-02 10:14:43 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 150
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: Name /home/mimsbang/public_html/application/controllers/Brand.php 108
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: ManufacturerName /home/mimsbang/public_html/application/controllers/Brand.php 108
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: Classification /home/mimsbang/public_html/application/controllers/Brand.php 108
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: DosageForm /home/mimsbang/public_html/application/controllers/Brand.php 108
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: StrengthName /home/mimsbang/public_html/application/controllers/Brand.php 108
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: IndicationTags /home/mimsbang/public_html/application/controllers/Brand.php 108
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: Name /home/mimsbang/public_html/application/controllers/Brand.php 109
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: ManufacturerName /home/mimsbang/public_html/application/controllers/Brand.php 109
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: Classification /home/mimsbang/public_html/application/controllers/Brand.php 109
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: DosageForm /home/mimsbang/public_html/application/controllers/Brand.php 109
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: StrengthName /home/mimsbang/public_html/application/controllers/Brand.php 109
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: IndicationTags /home/mimsbang/public_html/application/controllers/Brand.php 109
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: ProductType /home/mimsbang/public_html/application/controllers/Brand.php 114
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: Name /home/mimsbang/public_html/application/views/front-end/herbal-detail.php 76
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: GenericName /home/mimsbang/public_html/application/views/front-end/herbal-detail.php 82
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: GenericName /home/mimsbang/public_html/application/views/front-end/herbal-detail.php 82
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: ManufacturerName /home/mimsbang/public_html/application/views/front-end/herbal-detail.php 86
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: ManufacturerName /home/mimsbang/public_html/application/views/front-end/herbal-detail.php 86
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: Classification /home/mimsbang/public_html/application/views/front-end/herbal-detail.php 90
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: SafetyRemark /home/mimsbang/public_html/application/views/front-end/herbal-detail.php 94
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: DosageForm /home/mimsbang/public_html/application/views/front-end/herbal-detail.php 98
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: StrengthName /home/mimsbang/public_html/application/views/front-end/herbal-detail.php 102
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: PackSize /home/mimsbang/public_html/application/views/front-end/herbal-detail.php 106
ERROR - 2023-01-02 10:14:46 --> Severity: Notice --> Undefined index: PriceInBDT /home/mimsbang/public_html/application/views/front-end/herbal-detail.php 110
