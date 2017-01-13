<?php if(!defined('KIRBY')) exit ?>

title: Page
pages: true
files: true
fields:
  title:
    label: Title
    type:  text
  description:
    label: Description (SEO)
    type:  text
    validate:
      minLength: 80
      maxLength: 160
  text:
    label: Text
    type:  textarea