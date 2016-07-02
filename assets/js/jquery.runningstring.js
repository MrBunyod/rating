jQuery.fn.runningString = function(_options){	return this.each(function(){		var _element = $(this);		_element.css({width:(_element.parent().parent().width()-16)+'px',overflow:'hidden'});
		var _ew = _element.outerWidth(true);

		var _span = $(document.createElement('span'));
		_span.css({paddingRight:'15px',whiteSpace:'nowrap'});
		_span.html(_element.html());

		var _bar = $(document.createElement('div'));
		_bar.css({marginLeft:_ew+'px',width:_ew+'px'});
		_bar.append(_span);

		_element.empty();
		_element.append(_bar);

		var _sw = _span.outerWidth(true);
		var c = Math.ceil(_ew / _sw) + 1;
		for (var i=2;i<=c;i++) {
			_bar.append(_span.clone(true));
		}
		_bar.css({width:_sw*c+'px'});

		var _speed = (_ew + _sw) * 1000 / 75;
		var animate = function (_speed) {			_bar.animate({marginLeft:-_sw+'px'}, _speed, 'linear', function(){				_bar.css({marginLeft:'0px'});
				var _speed = _sw * 1000 / 75;
				animate(_speed);
			});		}
		animate(_speed);	});
}