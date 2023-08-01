<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-11-15 08:26:04 --> Severity: Warning --> mysqli::real_connect(): (28000/1045): Access denied for user 'root'@'localhost' (using password: YES) /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-11-15 08:26:04 --> Unable to connect to the database
ERROR - 2022-11-15 08:33:51 --> Severity: Warning --> mysqli::real_connect(): (28000/1045): Access denied for user 'root'@'localhost' (using password: YES) /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-11-15 08:33:51 --> Unable to connect to the database
ERROR - 2022-11-15 08:39:56 --> Severity: Warning --> mysqli::real_connect(): (28000/1045): Access denied for user 'root'@'localhost' (using password: YES) /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-11-15 08:39:56 --> Unable to connect to the database
ERROR - 2022-11-15 08:40:07 --> Severity: Warning --> mysqli::real_connect(): (28000/1045): Access denied for user 'root'@'localhost' (using password: YES) /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-11-15 08:40:07 --> Unable to connect to the database
ERROR - 2022-11-15 08:40:10 --> Severity: Warning --> mysqli::real_connect(): (28000/1045): Access denied for user 'root'@'localhost' (using password: YES) /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-11-15 08:40:10 --> Unable to connect to the database
ERROR - 2022-11-15 08:40:12 --> Severity: Warning --> mysqli::real_connect(): (28000/1045): Access denied for user 'root'@'localhost' (using password: YES) /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-11-15 08:40:12 --> Unable to connect to the database
ERROR - 2022-11-15 08:40:14 --> Severity: Warning --> mysqli::real_connect(): (28000/1045): Access denied for user 'root'@'localhost' (using password: YES) /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-11-15 08:40:14 --> Unable to connect to the database
ERROR - 2022-11-15 08:50:14 --> Severity: Warning --> mysqli::real_connect(): (28000/1045): Access denied for user 'root'@'localhost' (using password: YES) /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-11-15 08:50:14 --> Unable to connect to the database
ERROR - 2022-11-15 08:59:47 --> Severity: Warning --> mysqli::real_connect(): (28000/1045): Access denied for user 'root'@'localhost' (using password: YES) /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-11-15 08:59:47 --> Unable to connect to the database
ERROR - 2022-11-15 09:08:30 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 09:08:32 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 09:09:12 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 09:09:14 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 09:09:17 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 09:09:36 --> Severity: Warning --> mysqli::real_connect(): (42000/1044): Access denied for user 'mimsbang_dbb'@'localhost' to database 'mims_prod' /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-11-15 09:09:36 --> Unable to connect to the database
ERROR - 2022-11-15 09:10:03 --> Severity: Warning --> mysqli::real_connect(): (42000/1044): Access denied for user 'mimsbang_dbb'@'localhost' to database 'mims_prod' /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-11-15 09:10:03 --> Unable to connect to the database
ERROR - 2022-11-15 09:44:13 --> Severity: Warning --> mysqli::real_connect(): (42000/1044): Access denied for user 'mimsbang_dbb'@'localhost' to database 'mims_prod' /home/mimsbang/public_html/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-11-15 09:44:13 --> Unable to connect to the database
ERROR - 2022-11-15 09:50:29 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 09:51:27 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 09:51:33 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 09:51:44 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 09:58:52 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 09:59:44 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 09:59:46 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 10:17:21 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 10:17:26 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 10:24:47 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 10:30:40 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 10:30:42 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 10:30:44 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 10:33:05 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 10:35:20 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 10:35:20 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 10:35:21 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 10:35:23 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 10:35:26 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 10:38:04 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 10:40:12 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 10:42:29 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 10:45:06 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 11:13:40 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 11:13:41 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 11:13:45 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 11:21:55 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 11:47:56 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 11:48:00 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 11:52:01 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 11:52:07 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 11:53:41 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 11:57:57 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 11:58:16 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 11:58:17 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 11:58:18 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 12:01:20 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 12:01:58 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 12:03:17 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 12:04:21 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 12:04:42 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 12:15:39 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 12:15:43 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 12:15:44 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 12:50:04 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 12:50:22 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 12:50:22 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 13:14:25 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 13:49:05 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 13:49:06 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 13:49:09 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 13:49:10 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 14:40:49 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 14:40:50 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 14:40:52 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 14:40:57 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 14:59:42 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 14:59:43 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 14:59:44 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 14:59:45 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 15:09:55 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 15:35:46 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 15:50:48 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 16:15:30 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 17:08:49 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 17:15:00 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 17:27:26 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 17:28:41 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 17:38:40 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 17:46:40 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 17:46:55 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 17:48:41 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 17:49:46 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 17:49:49 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 17:50:57 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 17:51:18 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 17:51:29 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 17:58:41 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:01:21 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:01:26 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:01:30 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:01:36 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:03:18 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:08:41 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:12:36 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:18:41 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:25:28 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:28:41 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:34:09 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:38:41 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:43:33 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:43:34 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:46:39 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:46:58 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:48:01 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:48:09 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:48:40 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 18:58:41 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 19:03:28 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 19:03:56 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 19:08:41 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 19:18:41 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
ERROR - 2022-11-15 19:28:41 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
FROM `mims_brandinformation` AS `b`
INNER JOIN `mims_genericinformation` AS `g` ON `b`.`GenericID` = `g`.`ID`
INNER JOIN `mims_manufacturerinformation` AS `m` ON `b`.`ManufacturerID` = `m`.`ID`
INNER JOIN `mims_dosageforminformation` AS `df` ON `b`.`DosageFormID` = `df`.`ID`
INNER JOIN `mims_strengthinformation` AS `s` ON `b`.`StrengthID` = `s`.`ID`
INNER JOIN `mims_packsizeinformation` AS `ps` ON `b`.`PackSizeID` = `ps`.`ID`
WHERE g.IsActive =  1
AND m.IsActive =  1
AND df.IsActive =  1
AND s.IsActive =  1
AND ps.IsActive =  1
AND b.IsHighlighted =  1
AND b.ImagePath <> ''
AND b.IsDeleted =  0
AND g.IsDeleted =  0
AND m.IsDeleted =  0
AND df.IsDeleted =  0
AND s.IsDeleted =  0
AND ps.IsDeleted =  0
ORDER BY rand()
 LIMIT 3
