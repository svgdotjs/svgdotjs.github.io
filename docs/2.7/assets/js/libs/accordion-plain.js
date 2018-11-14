/*
Author: Nate Steiner <nate@natesteiner.com>
Inspired by https://github.com/18F/web-design-standards/blob/v0.8/assets/js/components.js#L202-L258
But re-written to avoid requiring jQuery
*/

function Accordion(el) {
  var self = this;
  this.root = el;
  var buttons = el.querySelectorAll('.expand-subnav');

  buttons.forEach(function(btn){
    btn.addEventListener('click', function(e){
      if(e.target && e.target.nodeName == "BUTTON") {
        e.preventDefault();
        if(btn.getAttribute('aria-expanded') === 'true' ) {
          self.hide(btn);
        } else {
          self.show(btn);
        }
      }
      });
  });
}

Accordion.prototype.zrfind = function(selector) {
  return this.root.querySelector(selector);
}

Accordion.prototype.hide = function(button) {
  var selector = button.getAttribute('aria-controls'),
      content = this.zrfind('#' + selector);
  button.setAttribute('aria-expanded', false);
  content.setAttribute('aria-hidden', true);
};

Accordion.prototype.show = function(button) {
  var selector = button.getAttribute('aria-controls'),
      content = this.zrfind('#' + selector);
  button.setAttribute('aria-expanded', true);
  content.setAttribute('aria-hidden', false);
};


function accordion(el) {
  return new Accordion(el);
}
