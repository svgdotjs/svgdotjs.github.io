
Array.prototype.forEach.call(document.querySelectorAll('.sidebar-nav'), function(el, i){
  accordion(el);
});

hljs.initHighlightingOnLoad();