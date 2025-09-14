<?php

/**
 * Retrieves the number of logic problems solved from the database.
 *
 * Queries the 'information' table for the entry with the pointer 'logicSolved'.
 * If no entry is found, returns 0. Otherwise, returns the first element of the
 * result, which represents the number of logic problems solved.
 *
 * @return int The number of logic problems solved.
 */
function GetLogicSolved()
{
  $result = dbRequest2("SELECT data FROM information WHERE pointer='logicSolved'", "data");
  if (!$result) {
    $result = 0;
  } else {
    $result = $result[0];
  }
  return $result;
}
/**
 * Retrieves the total complexity of all logic problems solved from the database.
 *
 * Queries the 'information' table for the entry with the pointer 'logicComplexity'.
 * If no entry is found, returns 0. Otherwise, returns the first element of the
 * result, which represents the total complexity of all logic problems solved.
 *
 * @return int The total complexity of all logic problems solved.
 */
function GetLogicTotalComplexity()
{
  $total = dbRequest2("SELECT data FROM information WHERE pointer='logicComplexity'", "data");
  if (!$total) {
    $total = 0;
  } else {
    $total = $total[0];
  }
  return $total;
}
/**
 * Retrieves the average complexity of all logic problems solved from the database.
 *
 * Calculates the average complexity of all logic problems solved by dividing the
 * total complexity of all logic problems solved by the number of logic problems
 * solved.
 *
 * @return float The average complexity of all logic problems solved.
 */
function GetLogicAverageComplexity()
{
  $solved = GetLogicSolved();
  if ($solved == 0) {
    return 0;
  }
  return GetLogicTotalComplexity() / $solved;
}
