<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-11-18 09:25:31 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
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
ERROR - 2022-11-18 09:35:31 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
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
ERROR - 2022-11-18 09:45:31 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
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
ERROR - 2022-11-18 09:52:26 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
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
ERROR - 2022-11-18 09:55:31 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
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
ERROR - 2022-11-18 10:05:36 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
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
ERROR - 2022-11-18 10:15:31 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
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
ERROR - 2022-11-18 10:17:33 --> Query error: FUNCTION mimsbang_dbb.CamelCase does not exist - Invalid query: SELECT `b`.`ID`, UPPER(TRIM(b.Name)) AS Name, `b`.`PriceInBDT`, `b`.`ImagePath`, `g`.`ID` AS `GenericID`, CamelCase(g.Name) AS GenericName, `g`.`Classification`, `g`.`SafetyRemark`, `g`.`Indication`, `g`.`DosageAdministration`, `g`.`ContraindicationPrecaution`, `g`.`Composition`, `g`.`Pharmacology`, `g`.`Interaction`, `g`.`SideEffect`, `g`.`OverdoseEffect`, `g`.`StorageCondition`, `g`.`PregnancyLactation`, `m`.`ID` AS `ManufacturerID`, CamelCase(m.Name) AS ManufacturerName, `df`.`ID` AS `DosageFormID`, `df`.`Name` AS `DosageForm`, `s`.`ID` AS `StrengthID`, `s`.`Name` AS `StrengthName`, `ps`.`ID` AS `PackSizeID`, `ps`.`Name` AS `PackSize`, `b`.`IsHighlighted`, `b`.`IsNewProduct`, `b`.`IsNewBrand`, `b`.`IsNewPresentation`, `b`.`IsActive`
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
ERROR - 2022-11-18 20:44:33 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 77
ERROR - 2022-11-18 20:44:33 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2022-11-18 20:44:33 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2022-11-18 20:44:33 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2022-11-18 20:44:33 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2022-11-18 21:05:46 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 77
ERROR - 2022-11-18 21:05:46 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2022-11-18 21:05:46 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 83
ERROR - 2022-11-18 21:05:46 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
ERROR - 2022-11-18 21:05:46 --> Severity: Notice --> Undefined offset: 0 /home/mimsbang/public_html/application/views/front-end/search-result-herbal.php 87
