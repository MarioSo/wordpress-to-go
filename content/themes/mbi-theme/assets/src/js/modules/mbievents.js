/**
 * Descrition
 */
define(function () {
    "use strict";

    /**
     * This is our classes constructor;
     */
    function MbiEvents() {
        if (!(this instanceof MbiEvents)) {
            throw new TypeError("mbiEvents constructor cannot be called as a function.");
        }
    }


    MbiEvents.prototype = {
        constructor: MbiEvents,
        addListener: addListener,
        removeListener: removeListener
    };


    function addListener(element, eventName, handler) {
      if (element.addEventListener) {
        element.addEventListener(eventName, handler, false);
      }
      else if (element.attachEvent) {
        element.attachEvent('on' + eventName, handler);
      }
      else {
        element['on' + eventName] = handler;
      }
    }

    function removeListener(element, eventName, handler) {
      if (element.addEventListener) {
        element.removeEventListener(eventName, handler, false);
      }
      else if (element.detachEvent) {
        element.detachEvent('on' + eventName, handler);
      }
      else {
        element['on' + eventName] = null;
      }
    }

    return new MbiEvents();
});
