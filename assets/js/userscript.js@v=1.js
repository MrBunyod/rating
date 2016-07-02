// JavaScript Document
/// <reference path="jquery-1.4.1-vsdoc.js" />

function bAccordion(Element, lang) {
    if (Element == undefined)
        return false;
	if (lang == undefined)
		lang = "читать далее";

    Element = $(Element);

    var AElements = Element.find('.picNode');
    if (AElements.length == 0) {
        var pics = Element.find('a');
        pics.wrap('<div class="picNode">');        
    }
    AElements = Element.find('.picNode');

    if (AElements.length == 0) {
        var pics = Element.find('img');
        pics.wrap('<div class="picNode">');
    }
    AElements = Element.find('.picNode');


    AElements.each(function (i, e) {
        e = $(e);
        e.attr('iWidth', e.find('img').first().width());
    });

    var mainHeight = 0;
    for (var i = 0; i < AElements.length; i++) {
        if ($(AElements[i]).height() > mainHeight) mainHeight = $(AElements[i]).height();
    }

    var mainWidth = Element.width();

    Element.height(mainHeight);

    AElements.each(function (i, e) {
        e = $(e);
        var img = e.find('img').first();
        var wraper = $('<div>').addClass('AccardionImageWraper');

        img.wrap(wraper);
        img.addClass('colorImage');
        var sImg = $('<img>').addClass('greyImage');
        sImg[0].src = img[0].src;
        img.after(sImg);
        wraper = $('.AccardionImageWraper', e);
        wraper.css({ position: 'relative', width: img.width(), height: img.height() });
        img.css({ position: 'absolute', top: '0', left: '0'});
        sImg.css({ position: 'absolute', top: '0', left: '0', display: 'none'  });

        if ($.browser.msie)
            grayscaleImageIE(sImg[0]);
        else {
            img[0].onload = function () {
                sImg[0].src = grayscaleImage(img[0]);

            }
        }

        var bottomLine = $('<div>').addClass('BottomLine').addClass('BottomLine' + i);
        var bottomLineHeader = $('<div>').addClass('BottomLineHeader');
        bottomLine.append(bottomLineHeader);

        var title = $('<h2>').html(img.attr('title') + '<br />' + img.attr('sLine'));
        bottomLineHeader.append(title);

        var content = $('<div>').addClass('content').html(img.attr('desc'));
        bottomLine.append(content);

        var toA = $('<a>').addClass('sliderLink'); //.attr('href', e.find('img').first().attr('href'));
        toA.html(lang);
        toA.attr('href', e.find('a').first().attr('href'));
        bottomLine.append(toA);

        wraper.append(bottomLine);
		
		var shadow = $('<div>').addClass('shadow');
		e.prepend(shadow);
		
		content.fadeOut(0);
		toA.fadeOut(0);

        wraper.mouseover(function () {
            sImg.fadeOut(800);
            img.fadeIn(800);
			{
				var otherW = $('.AccardionImageWraper', Element).not(wraper);
				$('img.colorImage', otherW).fadeOut(800);
				$('img.greyImage', otherW).fadeIn(800);
			}
			
			content.fadeIn(800);
			toA.fadeIn(800);
        }).mouseleave(function () {
            sImg.fadeIn(800);
            img.fadeOut(800);
			{
				/*var otherW = $('.AccardionImageWraper', Element).not(wraper);
				$('img.colorImage', otherW).fadeIn(800);
				$('img.greyImage', otherW).fadeOut(800);*/
			}			
			
			content.fadeOut(800);
			toA.fadeOut(800);
        });



    });
	
	Element.mouseleave(function() {
			var otherW = $('.AccardionImageWraper', Element);
			$('img.colorImage', otherW).fadeIn(800);
			$('img.greyImage', otherW).fadeOut(800);	
	});

    var closeElementWidth = mainWidth / AElements.length;

    FirstView();

    function FirstView() {
        AElements.each(function (i, e) {
            var e = $(e);
            e.css({ position: 'absolute', top: '0', left: (i * closeElementWidth), width: closeElementWidth, overflow: 'hidden' });
        });
    }    

    function grayscaleImageIE(imgObj) {
        imgObj.style.filter = 'progid:DXImageTransform.Microsoft.BasicImage(grayScale=1)';
    }

    function grayscaleImage(imgObj) {
        var canvas = document.createElement('canvas');
        var canvasContext = canvas.getContext('2d');

        var imgW = imgObj.width;
        var imgH = imgObj.height;
        canvas.width = imgW;
        canvas.height = imgH;

        canvasContext.drawImage(imgObj, 0, 0);
        var imgPixels = canvasContext.getImageData(0, 0, imgW, imgH);

        for (var y = 0; y < imgPixels.height; y++) {
            for (var x = 0; x < imgPixels.width; x++) {
                var i = (y * 4) * imgPixels.width + x * 4;
                var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
                imgPixels.data[i] = avg;
                imgPixels.data[i + 1] = avg;
                imgPixels.data[i + 2] = avg;
            }
        }

        canvasContext.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
        return canvas.toDataURL();
    }

    AElements.mouseover(function () {
        AElements.clearQueue().stop();
        var e = $(this);
        var newCloseElementWidth = ((mainWidth - e.attr('iWidth')) / (AElements.length - 1));
        AElements.removeClass('Active');
        e.addClass('Active');

        var activeIndex = 0;
        var activeWidth = 0;

        AElements.each(function (i, e) {
            var e = $(this);
            if (e.hasClass('Active')) {
                activeIndex = i;
                activeWidth = e.attr('iWidth');
            }
        });

        AElements.each(function (i, e) {
            var e = $(this);

            if (e.hasClass('Active')) {

                e.animate({ width: e.attr('iWidth') },
                    {
                        duration: 500,
                        step: function (now, fx) {
                            var el = $(AElements[i + 1]);
                            var normalPosition = 0;
                            if (((i + 1) < activeIndex) || ((i + 1) == activeIndex))
                                normalPosition = newCloseElementWidth * (i + 1);
                            else
                                normalPosition = (newCloseElementWidth * (activeIndex) + parseInt(activeWidth)) + (((i) - activeIndex) * newCloseElementWidth);
                            var _minus = parseInt(el.css('left')) - normalPosition;
                            if (_minus < 0) _minus = _minus * (-1);
                            if (_minus > 1)
                                el.css('left', (parseInt(e.css('left')) + now));
                        }
                    });
            }
            else {

                e.animate({ width: newCloseElementWidth },
                    {
                        duration: 500,
                        step: function (now, fx) {
                            var el = $(AElements[i + 1]);
                            var normalPosition = 0;
                            if (((i + 1) < activeIndex) || ((i + 1) == activeIndex))
                                normalPosition = newCloseElementWidth * (i + 1);
                            else
                                normalPosition = (newCloseElementWidth * (activeIndex) + parseInt(activeWidth)) + (((i) - activeIndex)  * newCloseElementWidth);
                            var _minus = parseInt(el.css('left')) - normalPosition;
                            if (_minus < 0) _minus = _minus * (-1);
                            if (_minus > 1)
                                el.css('left', (parseInt(e.css('left')) + now));
                        }
                    });

            }

        });

    });

    Element.mouseleave(function () {
        AElements.clearQueue().stop();
        AElements.each(function (i, e) {
            var e = $(this);
            e.animate({ width: closeElementWidth },
                    {
                        duration: 500,
                        step: function (now, fx) {
                            var el = $(AElements[i + 1]);
                            el.css('left', (parseFloat(e.css('left')) + now));
                        }
                    });


        });

    });
}

function HeaderSlider(Element) {
    if (Element == undefined)
        return false;

    Element = $(Element);

    var AElements = Element.find('.picNode');
	if (AElements.length == 0) {
		var pics = Element.find('img');
		pics.wrap('<div class="picNode">');
	}
	AElements = Element.find('.picNode');
    var mainHeight = 0;
    for (var i = 0; i < AElements.length; i++) {
        if ($(AElements[i]).height() > mainHeight) mainHeight = $(AElements[i]).height();
    }

    Element.height(mainHeight);

    /*var divPictures = $(document.createElement('div'));

    AElements.clone().appendTo(divPictures);

    Element.children().detach();
    Element.append(AElements);*/

    AElements.each(function (Index, ElementThis) {
        $(ElementThis).css('position', 'absolute');
        $(ElementThis).css('top', '0');
        $(ElementThis).css('left', '0');
        $(ElementThis).attr('enumber', (Index + 1));
        $(ElementThis).attr('show', 'none');
        $(ElementThis).fadeOut(0);
    });

    AElements.first().attr('show', 'yes'); ;
    AElements.first().fadeIn(0);
    //Element.height(AElements.first().height());

    function StartSwitch() {
        var ShowElement = AElements.filter('.picNode[show="yes"]');
        var indexThis = parseInt(ShowElement.attr('enumber'));
        if (indexThis == AElements.length) indexThis = 1; else indexThis++;
        var hideElement = AElements.filter('.picNode[enumber="' + indexThis + '"]');

        ShowElement.attr('show', 'none');
        hideElement.attr('show', 'yes');

        Element.height(hideElement.height());
        hideElement.fadeIn(3000);
        ShowElement.fadeOut(3000);
    }

    this.repeatGo = function () {
		if (AElements.length > 1) {
			stopthis = false;
			GoStep1();
		}
    }

    this.stop = function () {
        stopthis = true;
        clearTimeout(animation);
    }

    var stopthis = false;
    var animation;

    function GoStep1() {
        if (!stopthis) {
            animation = setTimeout(function () { StartSwitch(); GoStep1(); }, 9000);
        }
    }

}

function menuFix (Element) {
	if (Element != undefined) {
		if ($('#'+Element).length > 0) {
			var elements = $('#'+Element).children('li').find('ul');
			for (var i = 0; i < elements.length; i++) {
				var sub = $(elements[i]).children('li');
				var longest = 100;
				for(var j = 0; j < sub.length; j++) {
					if (longest < $(sub[j]).width()) {
						longest = $(sub[j]).width();
					}
				}
				$(elements[i]).width(longest+'px');
			}
		}
	}
}

function ImgRamka () {
	$('.newsPic').not('.et-news .newsPic').each(function(index, Element) {
		var e = $(Element);		
		var d = $('<div>').addClass('newsPicRamka');
		e.after(d);
		d.html('<div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div><div class="tc"></div><div class="bc"></div><div class="lc"></div><div class="rc"></div>');
		e.appendTo(d);
	});
}

function contanerRamka(Element) {
	if ($(Element).length > 0) {
		$(Element).children().each(function(index, Element) {
			var e = $(Element);		
			var d = $('<div>').addClass('newsPicRamka');
			e.after(d);
			d.html('<div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div><div class="tc"></div><div class="bc"></div><div class="lc"></div><div class="rc"></div>');
			e.appendTo(d);
		});		
	}
}

$(document).ready(function () {
    /*if ($('.topBannerTextBlock>.gallery').length > 0) {
        var HeaderBanner = new HeaderSlider($('.topBannerTextBlock>.gallery'));
        HeaderBanner.repeatGo();
    }*/
	if ($('#mainPageBannerRotator').length > 0) {
        //var HeaderMainBanner = new HeaderSlider($('#mainPageBannerRotator'));
        //HeaderMainBanner.repeatGo();	
	}
	
});

$(document).ready(function () {
    var contacts = $('.contactsThis');
    if (contacts.length > 0) {
        var parentDiv = contacts.parent();
        var formForm = parentDiv.find('.form');
        var table = $('<table>').attr({ 'width': '100%', 'cellpadding': '0', 'cellspacing': '0', 'border': '0' });
        parentDiv.prepend(table);

        var tr = $('<tr>');
        table.append(tr);

        var tdData = $('<td>').attr({ 'width': '30%', 'valign': 'top' }).css({ 'border-right': '1px solid gray' });
        tr.append(tdData);

        var tdForm = $('<td>').attr({ 'width': '70%' });
        tr.append(tdForm);

        formForm.appendTo(tdForm);
        parentDiv.children().not(table).appendTo(tdData);

        formForm = parentDiv.find('.form');
        var nameArray = new Array();
        formForm.find('td').each(function (i, e) {
            e = $(e);
            if ((i + 1) % 2 != 0) {
                e.addClass('tdToDelete');
                nameArray.push(e.text());
            }
        });

        parentDiv.find('.tdToDelete').detach();
        var formTable = formForm.children().children('table');

        var tempTr = $('<tr>');
        formTable.prepend(tempTr);

        var tempTd = $('<td>').css('padding', '0');
        tempTr.prepend(tempTd);

        table = $('<table>').attr({ 'width': '100%', 'cellpadding': '0', 'cellspacing': '0', 'border': '0' });
        tempTd.append(table);
        tempTr = $('<tr>');
        table.prepend(tempTr);

        tempTd = $('<td>');
        tempTr.append(tempTd);

        tempTd.html($(formTable.children().children('tr')[1]).children('td').html());
        $(formTable.children().children('tr')[1]).detach();

        tempTd = $('<td>');
        tempTr.append(tempTd);

        tempTd.html($(formTable.children().children('tr')[1]).children('td').html());
        $(formTable.children().children('tr')[1]).detach();

        $(formTable).find('input[type="text"], textarea').each(function (i, e) {
            e = $(e);
            if (e.val() == '') {
                e.val(nameArray[i]);
            }
            e.focus(function () {
                if (e.val() == nameArray[i]) {
                    e.val('');
                }
            }).blur(function () {
                if (e.val() == '') {
                    e.val(nameArray[i]);
                }
            });
        });
        $(formTable).find('input[type="submit"]').click(function () {
            $(formTable).find('input[type="text"], textarea').each(function (i, e) {
                e = $(e);
                if (e.val() == nameArray[i]) {
                    e.val('');
                }
            });
            return true;
        });

    }
});