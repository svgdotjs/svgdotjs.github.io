<?php
global $availableVersions;
$availableVersions = getAvailableVersions();
$newestVersion = getNewestVersion();

global $currentVersion;
$currentVersion = getCurrentVersion();

define( 'DOCS_VERSION', $currentVersion );

function getAvailableVersions() {
  $commandBranches = 'git branch --list "*source*" -r --no-color';
  
  $branches = [];
  $retValue = 0;
  exec($commandBranches, $branches, $retValue);
  
  if ($retValue != 0) {
    die("Could not fetch branch names. Is git installed? Output was: \n".implode("\n", $output));
  }

  return array_map('getVersionFromBranchName', $branches);
}

function getNewestVersion() {
  $commandHead = 'git branch --list "*source*" -r --no-color --points-at HEAD';
  return getVersionFromBranchName(exec($commandHead));
}
function getCurrentVersion() {
  $commandHead = 'git rev-parse --abbrev-ref HEAD';
  return getVersionFromBranchName(exec($commandHead));
}

function getVersionFromBranchName($branch) {
  $parts = explode('/', $branch);
  $source = array_pop($parts);
  $parts = explode('-', $branch);
  $version = array_pop($parts);
  return $version;
}
