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

echo '<!doctype html>'"<html><head><meta http-equiv=\"refresh\" content=\"0; url=http://svgjs.com/docs/${NEWEST}\"></head><body>You are redirected. If not, click <a href=\"http://svgjs.com/docs/${NEWEST}\">here</a></body></html>" > index.html

# make sure that we restore the file
# this is done in another process because the file itself
# cant be executed while restored
$(sleep 1 && git checkout -- statify.sh) &