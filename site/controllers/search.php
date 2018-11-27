<?php

return function($site, $pages, $page) {

  $query = get('q');
  $results = $site->index()->visible()->search($query, 'title|text');

  return array(
    'query'   => $query,
    'results' => $results
  );
};
?>
