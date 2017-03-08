// Original KDoc
Array.prototype.forEach.call(document.querySelectorAll('.sidebar-nav'), function(el, i){
  accordion(el);
});

hljs.initHighlightingOnLoad();

// Helpers
function addEvent(el, type, handler) {
  if (el.attachEvent) el.attachEvent('on'+type, handler); else el.addEventListener(type, handler);
}

function hasClass(el, className) {
  return el.classList ? el.classList.contains(className) : new RegExp('\\b'+ className+'\\b').test(el.className);
}

function addClass(el, className) {
  if (el.classList) el.classList.add(className);
  else if (!hasClass(el, className)) el.className += ' ' + className;
}

function removeClass(el, className) {
  if (el.classList) el.classList.remove(className);
  else el.className = el.className.replace(new RegExp('\\b'+ className+'\\b', 'g'), '');
}


// Make h1-h6 clickable
var htags = document.querySelectorAll( 'h1,h2,h3,h4,h5,h6' )

htags.forEach( function( h ) {
  if ( h.id ) {
    h.onclick = function() {
      window.location.hash = this.id
    }
  }
})