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


// Get parameters
function getParameterByName(name, url) {
  if (! url)
    url = window.location.href;

  name = name.replace( /[\[\]]/g, "\\$&" )

  var regex   = new RegExp( "[?&]" + name + "(=([^&#]*)|&|#|$)" )
    , results = regex.exec( url )

  if ( ! results )    return null
  if ( ! results[2] ) return ''

  return decodeURIComponent( results[2].replace( /\+/g, ' ' ))
}


// Activate search
;( function() {
  var input = document.querySelector( '.search input[name=q]' )
    , list  = document.querySelector( '.search .results' )
    , aside = document.querySelector( '.sidebar-menu' )
    , limit = 15
    , results, selected, searchTimeout, cancelTimeout

  addEvent( input, 'keyup', query )
  addEvent( input, 'focus', query )
  addEvent( input, 'keyup', navigate )

  addEvent( input, 'blur', function() {
    clearTimeout( cancelTimeout )

    cancelTimeout = setTimeout( function() {
      removeClass( aside, 'searched' )
    }, 500 )
  })


  function query( event ) {
    if ( [13, 38, 40].indexOf( event.keyCode ) > -1 )
      return false

    clearTimeout( searchTimeout )

    searchTimeout = setTimeout( function() {
      if ( input.value == '' ) {
        removeClass( aside, 'searched' )
      } else {
        results = fuse.search( input.value )
        results = results.slice( 0, limit )

        addClass( aside, 'searched' )
        list.innerHTML  = ''

        if ( results.length == 0 ) {
          addResult( 'Nothing found' )
        } else {
          results.forEach( function( result, i ) {
            var li = addResult( result.item.title, result.item.uri )

            if ( i == 0 )
              addClass( li, 'selected' )
          })
        }

        selected = 0
      }
    }, 100 )
  }

  function navigate( event ) {
    switch( event.keyCode ) {
      case 13: // enter
        if ( results[selected] )
          window.location.href = '/' + results[selected].item.uri + '?q=' + input.value
      break
      case 38: // arrow up
        selected--

        if ( selected < 0 )
          selected = 0

        activate( selected )
      break
      case 40: // arrow down
        selected++

        if ( selected > limit - 1 )
          selected = limit - 1

        activate( selected )
      break
    }
  }

  function addResult( title, uri ) {
    var li = document.createElement( 'li' )
      , a  = document.createElement( 'a' )

    if ( uri ) {
      a.innerHTML = title
      a.href = '/' + uri + '?q=' + input.value
      li.appendChild( a )
    } else {
      li.innerHTML = title
    }
    
    addClass( li, 'result' )
    list.appendChild( li )

    return li
  }

  function activate( i ) {
    list.querySelectorAll( '.result' ).forEach( function( result ) {
      removeClass( result, 'selected' )
    })
    
    if ( list.childNodes[i] )
      addClass( list.childNodes[i], 'selected' )
  }

})()