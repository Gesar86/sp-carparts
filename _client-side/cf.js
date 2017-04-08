function bindSEvent(obj, eventName, func) {
	
		if (document.attachEvent)
			obj.attachEvent("on"+eventName, func);
		else if (document.addEventListener) {
			obj.addEventListener(eventName, func, 0);
		}
	
}

function isIE6(){
	var browser = navigator.appName;
	if (browser == "Microsoft Internet Explorer"){
		var b_version = navigator.appVersion;
		var re = /\MSIE\s+(\d\.\d\b)/;
		var res = b_version.match(re);
		if (res[1] <= 6){
			return true;
		}
	}
  return false;
}

function getWidth(id) {
	
	return (document.getElementById(id).scrollWidth > document.getElementById(id).offsetWidth)?document.getElementById(id).scrollWidth:document.getElementById(id).offsetWidth;
		
}

function getWidthByObj(obj) {
	
	return (obj.scrollWidth > obj.offsetWidth)?obj.scrollWidth:obj.offsetWidth;
		
}

function getMinWidth(id) {
	
	return (document.getElementById(id).scrollWidth < document.getElementById(id).offsetWidth)?document.getElementById(id).scrollWidth:document.getElementById(id).offsetWidth;
		
}

function getWidthByObj(obj) {
	
	return (obj.scrollWidth > obj.offsetWidth)?obj.scrollWidth:obj.offsetWidth;
		
}

function getSumWidth(els) {
	
	var sumWidth = 0;
	$$(els).each(function(elm) {
		sumWidth = sumWidth + getWidthByObj(elm);
	});
	
	return sumWidth;
	
}

var setWidth = function() {

		var blocks = ['wrapper','footer'];

        for (var key in blocks) {
            try{
                document.getElementById(blocks[key]).style.minWidth = '';
                if (isIE6()) {
                    document.getElementById(blocks[key]).style.width = '';
                }
            } catch(e) {}
        }

		var content_block = 'content_inner';

		document.getElementById(content_block).style.overflow = 'hidden';
		
		var wrapperWidth = getMinWidth(blocks[0]);
		var contentWidthHidden = getMinWidth(content_block);
		var constWidth = wrapperWidth - contentWidthHidden;
		
		//alert(wrapperWidth);
		//alert(contentWidthHidden);
		//alert(constWidth);

		document.getElementById(content_block).style.overflow = 'auto';
		
		var contentWidth = getWidth(content_block);

        var mWidth = constWidth+contentWidth+'px';

        for (var key in blocks) {
            try{
                document.getElementById(blocks[key]).style.minWidth = mWidth;
                if (isIE6()) {
                    document.getElementById(blocks[key]).style.width = mWidth;
                }
            } catch(e) {}
        }

		//document.getElementById(content_block).style.overflow = 'hidden';
		document.getElementById(content_block).style.overflow = 'visible';
		
}
	
function fixWidth() {
	bindSEvent(window, 'load', setWidth);
	//bindSEvent(window, 'resize', setWidth);
}

//bindSEvent(window, 'load', setWidth);
//bindSEvent(window, 'resize', setWidth);

window.addEvent('load', setWidth);

function replaceSelect(el) {
	new MavSelectBox({
		elem: el.id,
		onSelect: el.onchange
	});
}

window.addEvent('domready', function () {
	setTimeout(function () {
		$$('.tipz').each(function(element,index) {
			var content = element.get('title');
			element.store('tip:title', '');
			element.store('tip:text', content);
		});
		var tipz = new Tips('.tipz',{
			fixed: false,
			hideDelay: 50,
			showDelay: 50
		});
	}, 1000)
});

function getWidthForce(el) {
	var size = el.measure(function(){
		return this.getSize();
	});

	return size.x;
}

function getHeightForce(el) {
	var size = el.measure(function(){
		return this.getSize();
	});

	return size.y;
}