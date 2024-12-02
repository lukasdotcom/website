<?php
require_once "api.php";
require_once "../include/logic.php";
if (array_key_exists("solved", $_GET)) {

  $solved = GetLogicSolved();
  $complexity = GetLogicTotalComplexity();
  $complexity += $_GET["solved"];
  $solved++;
  dbCommand("DELETE FROM information WHERE pointer='logicSolved'");
  dbCommand("DELETE FROM information WHERE pointer='logicComplexity'");
  dbCommand("INSERT INTO information VALUES ('logicComplexity', ?)", [$complexity]);
  dbCommand("INSERT INTO information VALUES ('logicSolved', ?)", [$solved]);
  echo json_encode([
    "solved" => $solved,
    "average" => GetLogicAverageComplexity()
  ]);
}
