<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-04-24 00:01:26 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 00:01:26 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 00:01:26 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 00:01:26 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 00:01:26 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 00:01:26 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 00:01:26 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 00:01:26 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 00:01:26 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 00:01:26 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 00:08:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND `j`.`ID` <> 
WHERE `j`.`IsActive` = 1
AND `j`.`IsDeleted` = 0
AND `j`.`Pu...' at line 3 - Invalid query: SELECT `j`.`ID`, `j`.`Title`, `j`.`Description`, `j`.`Organization`, `j`.`OrganizationLogo`, `j`.`OrganizationLogo`, `j`.`Position`, `j`.`ApplicationDeadline`, `j`.`Salary`, `j`.`EducationalRequirement`, `j`.`ExperienceRequirement`, `j`.`NumberOfVacancy`, `j`.`AgeLimit`, `j`.`Location`, `j`.`JobSource`, `j`.`JobType`, `j`.`EmploymentType`, `j`.`JobNature`, `j`.`ApplyingProcedure`, `j`.`PublishDate`, `j`.`JobCircularImagePath`, DATEDIFF(CURDATE(), j.PublishDate) AS NumberOfDatePublished
FROM `mims_jobinformation` AS `j`
INNER JOIN `mims_jobinformation` AS `sj` ON `j`.`JobCategory` = `sj`.`JobCategory` AND `j`.`Position` = `sj`.`Position` AND `sj`.`ID` =  AND `j`.`ID` <> 
WHERE `j`.`IsActive` = 1
AND `j`.`IsDeleted` = 0
AND `j`.`PublishDate` <= '2023-04-24'
AND `j`.`ApplicationDeadline` >= '2023-04-24'
AND `sj`.`IsActive` = 1
AND `sj`.`IsDeleted` = 0
AND `sj`.`PublishDate` <= '2023-04-24'
AND `sj`.`ApplicationDeadline` >= '2023-04-24'
ORDER BY `j`.`PublishDate` DESC
 LIMIT 10
ERROR - 2023-04-24 01:42:19 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 75
ERROR - 2023-04-24 01:42:19 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 75
ERROR - 2023-04-24 01:42:19 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 81
ERROR - 2023-04-24 01:42:19 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 81
ERROR - 2023-04-24 01:42:19 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 189
ERROR - 2023-04-24 01:42:19 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 189
ERROR - 2023-04-24 03:21:29 --> Severity: Notice --> Undefined index: Title /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 37
ERROR - 2023-04-24 03:21:29 --> Severity: Notice --> Undefined index: Description /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 39
ERROR - 2023-04-24 03:21:29 --> Severity: Notice --> Undefined index: ImagePath /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 41
ERROR - 2023-04-24 03:21:29 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 03:21:29 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 03:21:29 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 03:21:29 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 03:21:29 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 03:21:29 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 03:21:29 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 03:21:29 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 03:25:56 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 03:25:56 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 03:25:56 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 03:25:56 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 03:25:56 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 03:25:56 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 03:25:56 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 03:25:56 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 03:25:56 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 03:25:56 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 03:29:07 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 03:29:07 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 03:29:07 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 03:29:07 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 03:29:07 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 03:29:07 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 03:29:07 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 03:29:07 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 03:29:07 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 03:29:07 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 03:32:00 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 03:32:00 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 03:32:00 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 03:32:00 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 03:32:00 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 03:32:00 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 03:32:00 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 03:32:00 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 03:32:00 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 03:32:00 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 03:41:23 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 03:41:23 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 03:41:23 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 03:41:23 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 03:41:23 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 03:41:23 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 03:41:23 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 03:41:23 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 03:41:23 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 03:41:23 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 04:42:31 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 04:42:31 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 04:42:31 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 04:42:31 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 04:42:31 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 04:42:31 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 04:42:31 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 04:42:31 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 04:42:31 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 04:42:31 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 04:45:28 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 04:45:28 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 04:45:28 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 04:45:28 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 04:45:28 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 04:45:28 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 04:45:28 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 04:45:28 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 04:45:28 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 04:45:28 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 04:51:59 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 04:51:59 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 04:51:59 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 04:51:59 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 04:51:59 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 04:51:59 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 04:51:59 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 04:51:59 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 04:51:59 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 04:51:59 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 04:57:43 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 04:57:43 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 04:57:43 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 04:57:43 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 04:57:43 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 04:57:43 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 04:57:43 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 04:57:43 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 04:57:43 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 04:57:43 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 05:16:30 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 77
ERROR - 2023-04-24 05:16:30 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 77
ERROR - 2023-04-24 05:16:30 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2023-04-24 05:16:30 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2023-04-24 05:16:30 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2023-04-24 05:16:30 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2023-04-24 05:16:30 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2023-04-24 05:16:30 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2023-04-24 05:16:30 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2023-04-24 05:16:30 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2023-04-24 05:51:19 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 75
ERROR - 2023-04-24 05:51:19 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 75
ERROR - 2023-04-24 05:51:19 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 81
ERROR - 2023-04-24 05:51:19 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 81
ERROR - 2023-04-24 05:51:19 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 189
ERROR - 2023-04-24 05:51:19 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-herbal-generic.php 189
ERROR - 2023-04-24 05:53:45 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 05:53:45 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 05:53:45 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 05:53:45 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 05:53:45 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 05:53:45 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 05:53:45 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 05:53:45 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 05:53:45 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 05:53:45 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 05:57:42 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 05:57:42 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 05:57:42 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 05:57:42 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 05:57:42 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 05:57:42 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 05:57:42 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 05:57:42 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 05:57:42 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 05:57:42 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 05:59:44 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 05:59:44 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 05:59:44 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 05:59:44 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 05:59:44 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 05:59:44 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 05:59:44 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 05:59:44 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 05:59:44 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 05:59:44 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 06:04:48 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 06:04:48 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 06:04:48 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 06:04:48 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 06:04:48 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 06:04:48 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 06:04:48 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 06:04:48 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 06:04:48 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 06:04:48 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 06:14:14 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 06:14:14 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 06:14:14 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 06:14:14 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 06:14:14 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 06:14:14 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 06:14:14 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 06:14:14 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 06:14:14 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 06:14:14 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 06:58:44 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 06:58:44 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 06:58:44 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 06:58:44 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 06:58:44 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 06:58:44 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 06:58:44 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 06:58:44 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 06:58:44 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 06:58:44 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 06:58:53 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 06:58:53 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 06:58:53 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 06:58:53 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 06:58:53 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 06:58:53 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 06:58:53 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 06:58:53 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 06:58:53 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 06:58:53 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:00:21 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 07:00:21 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 07:00:21 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:00:21 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:00:21 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:00:21 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:00:21 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:00:21 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:00:21 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:00:21 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:02:58 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 07:02:58 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 07:02:58 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:02:58 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:02:58 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:02:58 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:02:58 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:02:58 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:02:58 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:02:58 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:09:15 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 76
ERROR - 2023-04-24 07:09:15 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 76
ERROR - 2023-04-24 07:09:15 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 82
ERROR - 2023-04-24 07:09:15 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 82
ERROR - 2023-04-24 07:09:15 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 150
ERROR - 2023-04-24 07:09:15 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-generic.php 150
ERROR - 2023-04-24 07:09:34 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 07:09:34 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 07:09:34 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:09:34 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:09:34 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:09:34 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:09:34 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:09:34 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:09:34 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:09:34 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:18:42 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 07:18:42 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 07:18:42 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:18:42 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:18:42 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:18:42 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:18:42 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:18:42 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:18:42 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:18:42 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:19:38 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 07:19:38 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 07:19:38 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:19:38 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:19:38 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:19:38 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:19:38 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:19:38 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:19:38 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:19:38 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:22:18 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 07:22:18 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 07:22:18 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:22:18 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:22:18 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:22:18 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 07:22:18 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:22:18 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:22:18 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:22:18 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 07:43:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND b.IsActive =  1
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
ERROR - 2023-04-24 07:44:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND b.IsActive =  1
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
ERROR - 2023-04-24 08:02:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND b.IsActive =  1
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
ERROR - 2023-04-24 08:03:00 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 08:03:00 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 08:03:00 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 08:03:00 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 08:03:00 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 08:03:00 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 08:03:00 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 08:03:00 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 08:03:00 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 08:03:00 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 08:06:26 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 08:06:26 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 78
ERROR - 2023-04-24 08:06:26 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 08:06:26 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 08:06:26 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 08:06:26 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 84
ERROR - 2023-04-24 08:06:26 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 08:06:26 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 08:06:26 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 08:06:26 --> Severity: Notice --> Trying to access array offset on value of type null /home/mimsbang/public_html/application/views/front-end/search-result-drug.php 88
ERROR - 2023-04-24 08:39:59 --> Severity: Notice --> Undefined index: Title /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 37
ERROR - 2023-04-24 08:39:59 --> Severity: Notice --> Undefined index: Description /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 39
ERROR - 2023-04-24 08:39:59 --> Severity: Notice --> Undefined index: ImagePath /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 41
ERROR - 2023-04-24 08:39:59 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 08:39:59 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 08:39:59 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 08:39:59 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 08:39:59 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 08:39:59 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 08:39:59 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 08:39:59 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 08:43:40 --> Severity: Notice --> Undefined index: Title /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 37
ERROR - 2023-04-24 08:43:40 --> Severity: Notice --> Undefined index: Description /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 39
ERROR - 2023-04-24 08:43:40 --> Severity: Notice --> Undefined index: ImagePath /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 41
ERROR - 2023-04-24 08:43:40 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 08:43:40 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 08:43:40 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 08:43:40 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 08:43:40 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 08:43:40 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 08:43:40 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
ERROR - 2023-04-24 08:43:40 --> Severity: Notice --> Undefined index: ID /home/mimsbang/public_html/application/views/front-end/local-news-detail.php 47
