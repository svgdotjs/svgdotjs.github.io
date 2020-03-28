#!/bin/bash

BRANCHES=$(git branch --list "*source*" -r --no-color)
NEWEST=$(git branch --list "*source*" -r --no-color --points-at origin/HEAD | sed -r 's/^.+source-//g')

for i in $BRANCHES; do
  TEMP=$(echo "${i}" | sed -r 's/^.+\///g')
  git checkout -f $TEMP 2>/dev/null || git checkout -f -b $TEMP
  php statify.php
done

mv docs docs_temp
git checkout master 2>/dev/null || git checkout -b master
rm -r docs
mv docs_temp docs

echo "<?php header('Location: /docs/${NEWEST}/'); ?>" > index.php

git add .
git commit -m "Update docs"
git push master