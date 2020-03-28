#!/bin/bash

BRANCHES=$(git branch --list "*source*" -r --no-color)
NEWEST=$(git branch --list "*source*" -r --no-color --points-at origin/HEAD | sed -r 's/^.+source-//g')

for i in $BRANCHES; do
  TEMP=$(echo "${i}" | sed -r 's/^.+\///g')
  git checkout -f $TEMP 2>/dev/null || git checkout -f -b $TEMP
  git pull
  php statify.php
done

mv docs docs_temp
git checkout -f master
rm -rf docs
mv docs_temp docs

echo "<?php header('Location: /docs/${NEWEST}/'); ?>" > index.php
