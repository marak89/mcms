    $.cookie = function(name, value, options) {
        if (typeof value != 'undefined') { //set cookie
            options = options || {};
            if (value === null) {
                value = '';
                options.expires = -1;
            }
            var expires = '';
            if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
                var date;
                if (typeof options.expires == 'number') {
                    date = new Date();
                    date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
                } else {
                    date = options.expires;
                }
                expires = '; expires=' + date.toUTCString();
            }

            var path = options.path ? '; path=' + (options.path) : '';
            var domain = options.domain ? '; domain=' + (options.domain) : '';
            var secure = options.secure ? '; secure' : '';
            document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
        } else { //get cookie
            var cookieValue = null;
            if (document.cookie && document.cookie != '') {
                var cookies = document.cookie.split(';');
                for (var i = 0; i < cookies.length; i++) {
                    var cookie = jQuery.trim(cookies[i]);
                    if (cookie.substring(0, name.length + 1) == (name + '=')) {
                        cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                        break;
                    }
                }
            }
            return cookieValue;
        }
    };

	function destroyCookie() {
		$.cookie('hideCookieBar', 1, {expires : 100}) //na 100 dni
	}

	$(function() {
		if ($.cookie('hideCookieBar')) {
			$('.cookie-bar').remove();
		} else {
			$('.cookie-bar').show();
		}

		$(document).keyup(function(e) {
		    e.preventDefault();
		    if (e.keyCode == 27) {
		        $('.cookie-bar .close').click();	        
		    }
		});
		$('.cookie-bar .close').on('click', function(e) {
		    e.preventDefault();
		    $(this).parents('.cookie-bar').animate({'bottom' : -100}, function() {
		    	destroyCookie();
		    });
		});
	})
