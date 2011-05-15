jQuery.fn.extend({
	uiPod: function(options) {
		options = jQuery.extend({
			rootTitle: 'Menu', 								// the text to appear as the title of the top-level menu.
			initial: null, 									// the path to the initial menu item.
			separator: '|', 								// the separator used in the path of the 'initial' property above.
			scrollSpeed: 20, 							// the scrolling speed for the menu (lower is faster)
			duration: 500, 									// the time taken to complete the drill down/up animation.
			inDuration: null, 							// the time taken to complete the drill down animation.
			outDuration: null, 							// the time taken to complete the drill up animation.
			easing: 'swing', 								// the easing used at the start and/or end of the animation. This default
			// value is available with or without the jQuery Easing plugin, so said
			// plugin isn't necessary. However, many more options are available with it.
			inEasing: null, 								// easing specifically for drilldown down.
			outEasing: null, 							// easing specifically for drilldown up.
			direction: 'east', 							// the direction from and to which a new menu panel slides in and out.
			inDirection: null, 							    // the direction from which a new menu panel should slide in.
			outDirection: null, 							// the direction to which an old menu panel should slide out.
			height: '200px',
			trueHeight: 0,
			width: '',
			useSideScroller: false,
			fnTitleClick: function(o) {
				jQuery(o).click(function() {}).addClass('deadTitle').hide();
				drillDown();
				drillUp();
			},
			fnPanelAnimateIn: function(o, l, t, skip, fn) {
				var duration = (skip ? 0 : (options.inDuration ? options.inDuration : options.duration));
				var effect = (skip ? "" : (options.inEasing ? options.inEasing : options.easing));
				o.animate({left: l, top: t, opacity: 1}, duration, effect, fn);
			},
			fnPanelAnimateOut: function(o, l, t, skip, fn) {
				var duration = (skip ? 0 : (options.outDuration ? options.outDuration : options.duration));
				var effect = (skip ? "" : (options.outEasing ? options.outEasing : options.easing));
				o.animate({left: l, top: t, opacity: .30}, duration, effect, fn);
			},
			fnAfter: function() {
				
			}
		}, options);
		
		var themeRoller = jQuery.uiPod.themeRoller;
		var getObj = jQuery.uiPod.getObj;
		var obj = {
			titleRoot: function() { return jQuery('<div style="position: relative; overflow: hidden ! important;height: 27px;" id="titleRoot" />'); },
			slideRoot: function(height) { return jQuery('<div id="slideRoot" class="' + themeRoller.menu + '" style="position: relative; overflow: hidden ! important; height: ' + height + ';" />'); },
			slideChild: function() { return jQuery('<div class="slideChild" style="position: relative; margin: 0px ! important; padding: 0px ! important;" />'); },
			label: function() { return jQuery('<div class="' + themeRoller.text + '" style="cursor: pointer; position: relative; margin: 0px;"></div>'); },
			ul: function() { return fixOffsets(jQuery('<ul class="' + themeRoller.labelHover + '" />')); },
			title: function(title) { return jQuery('<div class="' + themeRoller.header + '" style="z-index: 9999; position: relative; height: inherit;">' + title + '</div>'); },
			titleBack: function() { return jQuery('<span style="font-size: x-small; top: -1px; position: relative; display: none;">back | </span>'); },
			titleBaseIcon: function() { return jQuery('<span style="float: left; margin: 1px 4px 0 0;" class="ui-icon ui-icon-help"></span>'); },
			titleRegIcon: function() { return jQuery('<span style="float: left; margin: 1px 4px 0 0; cursor: pointer; z-index: 9999;" class="ui-icon ui-icon-circle-arrow-w"></span>'); },
			labelIcon: function() { return jQuery('<span class="ui-icon ui-icon-carat-1-e" style="position: relative; margin: 1px 10px auto auto; float: right; top: 0px;"></span>'); },
			scrollUpper: function() { return jQuery('<div class="' + themeRoller.scrollBar + ' upperArrow" style="z-index:99999; position: absolute; width: 100%; vertical-align: bottom; overflow: hidden; top: 0px; height: 12px; cursor: pointer; text-align: center;"></div>').fadeTo(0, 0.85); },
			scrollLower: function() { return jQuery('<div class="' + themeRoller.scrollBar + ' lowerArrow" style="z-index:99999; position: absolute; width: 100%; vertical-align: top; overflow: hidden; bottom: -1px; height: 12px; cursor: pointer; text-align: center;"></div>').fadeTo(0, 0.85); },
			scrollUpperIcon: function() { return jQuery('<span class="ui-icon ui-icon-triangle-1-n" style="position: relative; margin: auto;"> &nbsp;&nbsp;&nbsp; </span>'); },
			scrollLowerIcon: function() { return jQuery('<span class="ui-icon ui-icon-triangle-1-s" style="position: relative; margin: auto;"> &nbsp;&nbsp;&nbsp; </span>'); }
		};

		

		var root = jQuery(this);

		function fixOffsets(item) {
			item
				.find('ul').andSelf().attr('style', 'padding: 0px ! important;' +
					'margin: 0px ! important;' +
					'list-style-type: none;' +
					'list-style-image: none;' +
					'position: relative;' +
					'cursor: pointer;' +
					'width: 100%;' +
					'border: none;')
				.find('li').attr('style', 'padding: 0px ! important;' +
					'margin: 0px ! important;' +
					'cursor: pointer;' +
					'position: relative;')
				.find('ul').hide();
			
			item.find('a').attr('style', 'width: 100%;');
			return item;
		}

		function manageScrollers(pane, skip) {
			setScrollPaneDimensions(pane);
			addScrollButtons(pane, skip);
		}


		/*
		* Function: init
		*
		* Sets up the DrillDown Menu on the object supplied as the root in the constructor. This function adds divs and classes to
		* the user-supplied structure like this (* indicates a user-supplied menu tag, while ** indicates a user-supplied item
		* tag and *** a user-supplied label tag):
		*
		*div#titleRoot
		*div#slideRoot
		*	+-- .slideChild
		*		+-- ul
		*			+-- li
		*			|   +-- div.MainMenuItem
		*			|   +-- ul <--starts agian in same pattern
		*			|	+-- span.ui-icon
		*			+-- li
		*			|   +-- div.MainMenuItem
		*
		*/
		function init() {
			if (!root.attr('uiPodActive')) {
				root.before(obj.titleRoot());
				fixOffsets(root);
				options.width = root.addClass(themeRoller.menu).width();
				root.find('li > *:first-child').wrap(obj.label());
				root.find('div').each(function() {
					addInteraction(jQuery(this));
				});

				root.find('ul').hide(); 		// hide all submenus that are not the root submenu
				addTitle(options.rootTitle, true);

				options.trueHeight = root.find('ul:first').height();
				var height = options.height == 'auto' ? root.find('ul:first').height() + 'px' : options.height;
				var slideRoot = obj.slideRoot(height);

				root.wrap(slideRoot).wrap(obj.slideChild()).addClass('firstMenu ' + themeRoller.labelHover);
				manageScrollers(getObj.slideChild('first'));
				options.fnAfter();
				root.attr('uiPodActive', 'true')
			}
		}

		/*
		* Function: drillDown
		*
		* Drills down to the next submenu according to the selected li containing a single ul
		*
		* Parameters:
		* 		item -> the selected li
		*/
		function drillDown(item, skipAnimation) {
			var panel;
			var pos;
			var runManageScrollers = false;
			if (item) {
				//panel = choosePanel(menu).append(obj.ul().append(cloneSubmenu(item)));
				panel = obj.slideChild().append(obj.ul().append(cloneSubmenu(item)));

				var title = item.text();

				var dir = (options.inDirection ? options.inDirection : options.direction);
				// adds the new div.menuPanelClass to the end inside the div.menuClass.
				var menu = getObj.slideRoot().append(panel);

				pos = getPanelPosition(root, panel, dir);

				panel.css({
					position: 'relative',
					left: pos.outside.left,
					top: pos.outside.top
				});

				panel.show();

				drillUp(panel.prev(), true, true);

				// this must be done with each drilldown because there's a good chance that the submenu with the initial label has been
				// destroyed at some point (on a drillup).
				runManageScrollers = true;
			} else {
				panel = getObj.slideChild('prev');
				pos = getPanelPosition(root, panel, dir);
			}
			options.fnPanelAnimateIn(panel, pos.inside.left, pos.inside.top, skipAnimation, function() {
				//for some reason in firefox animation is really choppy if you run this before animation of pane, like the panel and the pane are disconnected
				if (runManageScrollers) {
					manageScrollers(panel);
					addTitle(title, false);
				};
			});
		}

		/*
		* Function: drillUp
		*
		* Drills up to the parent submenu of the currently displayed submenu. This is simpler than drilling down because no menu
		* need be cloned and positioned; the current div.menuPanel need only be animated out of sight in the appropriate direction
		* and then destroyed once out of sight.
		*
		* Parameters:
		* 		panel -> the div.menuPanel to animate out and destroy.
		*/
		function drillUp(obj, keep, flip) {
			panel = (obj ? obj : getObj.slideChild('last'));
			panel.css('overflow', '').stop();
			var dir = (options.outDirection ? options.outDirection : options.direction);
			var pos = getPanelPosition(root, panel, dir, (flip ? flip : ''));
			
			options.fnPanelAnimateOut(panel, pos.outside.left, pos.outside.top, false, function() {
				addScrollButtons(jQuery(this).prev(), true);
				if (!keep) {
					jQuery(this).remove();
					getObj.titleRoot().find('.deadTitle').remove();
				}
			});
			
		}

		/*
		* Function: choosePanel
		*
		* Recursively displays each submenu in the path indicated by the 'initial' property. Each menu is on top of the next, so at
		* the end, the result is the same as if the menus had been drilled into (except that there is no animation). If the
		* 'initial' path is invalid, this will drill down as far as it can and then stop, so be careful to get the paths right.
		*
		* Parameters:
		* 		menu -> the div.menuClass object that encapsulates the entire menu whose initial panel is being selected.
		*/
		function choosePanel(menu) {
			if (options.initial != null) {
				var parts = options.initial.split(options.separator);
				var current = getObj.slideChild('last');

				for (var i in parts) {
					// ignore if we're on the last part of the path; highlight() handles this instead
					if (i < parts.length - 1) {
						var label = current
							.find("div:contains('" + parts[i] + "')");
						if (label) {
							var submenu = label.parent().children('ul');
							if (submenu) {
								// this section does pretty much the same thing as drillDown(), except that it always places the
								// menu panel atop the current one and does no animation.
								var panel = cloneSubmenu(submenu);
								menu.after(panel);
								setOuterHeight(panel, menu.height(), true);

								var dir = options.inDirection ? options.inDirection : options.direction;
								var pos = getPanelPosition(menu, panel, dir);

								panel.css({ position: 'relative', top: pos.inside.top, left: pos.inside.left });
								panel.show();
								addTitle(parts[i], false);
							}
						}
					}
				}
			}
		}

		/*
		* Function: getPanelPosition
		*
		* Calculates the expected positions at the beginnings and ends of animations for the supplied panel in the given menu when
		* the panel is to be animated in the selected direction. This function takes borders, paddings, and margins into account
		* properly. The calcualted positions are relative to where the panel would be placed by natural page layout, and therefore
		* they are appropriate to use as 'top' and 'left' properties in a 'position: relative' panel.
		*
		* Parameters:
		* 		menu -> the div.menuClass to which the panel belongs.
		* 		panel -> the div.menuPanelClass whose positions are being calculated.
		* 		dir -> the direction from which the drilldown animation starts.
		* Returns: Object
		* 		an object of two properties, 'inside' and 'outside'. Each of these properties are in turn objects, each with two
		* 		properties, 'top' and 'left'. Thus, 'value.inside.top' is the expected 'top' offset if the panel is positioned
		* 		inside the div.menuClass (i.e., if it's visible), while 'value.outside.left' would be the 'left' offset if the panel
		* 		is placed outside the div.menuClass; i.e., where it begins its drilldown animation.
		*/
		function getPanelPosition(menu, panel, dir, flip) {
			var left, top;
			var panels = panel.prevAll(); 	// this is important because even when a panel is placed relatively, the next
			// panel is by default positioned where it would be if the first panel was
			// placed normally. Thus, we need to determine how many times to multiply the
			// offset, which is based on how deep the submenu is in the hierarchy.
			var offset = 0;
			jQuery(panels).each(function(i) {
				offset += jQuery(this).outerHeight(true);
			});

			switch (dir) {
				case (flip ? 'east' : 'west'):
					left = -panel.outerWidth();
					top = -offset;
					break;
				case (flip ? 'south' : 'north'):
					left = 0;
					top = -(menu.outerHeight() + offset);
					break;
				case (flip ? 'north' : 'south'):
					left = 0;
					top = panel.outerHeight() - offset;
					break;
				case (flip ? 'west' : 'east'): default:
					left = menu.outerWidth();
					top = -offset;
					break;
			}
			return {
				outside: { top: top, left: left },
				inside: { top: -offset, left: 0 }
			}
		}

		/*
		* Function: cloneSubmenu
		*
		* Clones the inner ul and returns it styled in themeRoller
		*/
		function cloneSubmenu(item) {
			return item
				.parent()
				.parent()
					.clone(true)
						.children('ul')
							.addClass(themeRoller.menu)
							.show();
		}
		
		/*
		* Function: addTitle
		*
		* Adds a title to the #titleRoot
		*
		* Parameters:
		* 		title -> the text of the title.
		* 		root -> a Boolean indicating whether this menu is the root. This determines which class is added to the new title
		* 				element and also whether it has an icon.
		*/
		function addTitle(title, root) {
			var titleObj = obj.title(title);
			var icon = obj.titleBaseIcon();

			if (!root) {
				icon = obj.titleRegIcon();
				
				titleObj
					.css('white-space', 'nowrap')
					.css('cursor', 'pointer')
					.click(function() {
						options.fnTitleClick(this);
					})
					.hover(function() {
						jQuery(this).css('background-position', 'bottom right');
					}, function() {
						jQuery(this).css('background-position', '');
					})
					.prepend(obj.titleBack());
			}
			titleObj
				.prepend(icon)
				.prependTo(getObj.titleRoot())
		}


		/*
		* Function: addInteraction
		*
		* Adds all of the hover and click functionalities to parts of a label. This is a set up function, running only once upon
		* the menu setup.
		*
		* Parameters:
		* 		label -> the label being set up with interactive functionality.
		*/
		function addInteraction(label) {
			if (label.children().size() != 1) {
				var link = label.find('a[href]');
				if (!link.length == 1) {
					label
						.parent()
						.prepend(obj.labelIcon())
						.click(function() {
							drillDown(label);
							return false;
						});
				}
			}
		}

		/*
		* Function: addScrollButtons
		*
		* As the name suggests, this function adds the up and down scroll buttons to a scroll pane. This function is run only once
		* per panel, when it's created, and it only acts if the panel is longer than the menu itself (i.e., if scrolling might
		* be necessary). The "scroll up" button is initially hidden, since the menu starts in its topmost position anyway.
		*
		* Parameters:
		* 		panel -> the scroll pane for the panel, where the scroll buttons will be added.
		*/
		function addScrollButtons(pane, skip) {
			pane = (!pane ? getObj.slideChild('last') : pane);
			var panel = pane.find('ul:first');
			
			if (pane.height() < panel.height()) {
				if (options.useSideScroller) {
					pane
						.css('overflow-y', 'scroll')
						.css('overflow-x', 'hidden');
				} else {
					pane.css('overflow', 'hidden');
					if (!skip) {
						var up = obj.scrollUpper().append(obj.scrollUpperIcon()).append('&nbsp');
						var down = obj.scrollLower().append(obj.scrollLowerIcon()).append('&nbsp');

						pane.prepend(down).prepend(up);
						var position = getScrollPosition(panel, pane);
						up
							.mousedown(function() {
								up.scroll = true;
								scroll(panel, up, down, position);
								return false;
							})
							.mouseup(function() {
								up.scroll = false;
							})
						down
							.mousedown(function() {
								down.scroll = true;
								scroll(panel, up, down, position);
								return false;
							})
							.mouseup(function() {
								down.scroll = false;
							});

						up.hide();
					}
				}
			}
		}

		/*
		* Function: scroll
		*
		* Scrolls the supplied menu panel down. This is presumably done in response to a click on the "scroll down" button. This
		* automatically handles the display of each of the buttons in relation to the current position of the panel.
		*
		* Parameters:
		* 		panel -> the panel that is actually being scrolled.
		* 		up -> the "scroll up" button element.
		* 		down -> the "scroll down" button element.
		* 		position -> an object denoting the starting and ending position for scrolling the panel. This comes directly from
		* 				getScrollPosition().
		*/
		function scroll(panel, up, down, position) {
			var newTop;
			if (down.scroll) {
				newTop = getWidth(panel, 'top') - 2;
				panel.css('top', newTop);
				up.show();
				if (newTop <= position.end) {
					panel.css('top', position.end);
					down.hide();
					down.scroll = false;
				}
				else {
					setTimeout(function() { scroll(panel, up, down, position) }, options.scrollSpeed);
				}
			}
			
			if (up.scroll) {
				newTop = getWidth(panel, 'top') + 2;
				panel.css('top', newTop);
				down.show();
				if (newTop >= position.start) {
					panel.css('top', position.start);
					up.hide();
					up.scroll = false;
				}
				else {
					setTimeout(function() { scroll(panel, up, down, position) }, options.scrollSpeed);
				}
			}
		}

		/*
		* Function: getScrollPosition
		*
		* Returns an object detailing the starting and ending "top" parameters for the given panel within the supplied pane. Note
		* that if the panel is smaller than the scroll pane, 'start' and 'end' will have the same values.
		*
		* Parameters:
		* 		pane -> the scroll pane in which a panel is being scrolled.
		* 		panel -> the panel whose starting and ending scroll position is being queried.
		* Returns: Object
		* 		an object with two members: 'start', which gives the value of the 'top' property of the panel when it is at its
		* 		starting scroll position, and 'end', which is the value of the same property when the panel is scrolled all the
		* 		way up.
		*/
		function getScrollPosition(panel, pane) {
			var initialTop = getWidth(panel, 'top');
			var submenuHeight = panel.outerHeight(true);
			var paneHeight = pane.height();
			if (submenuHeight <= paneHeight) {
				return { start: initialTop, end: initialTop };
			}
			return { start: initialTop, end: initialTop - ((submenuHeight - paneHeight)) };
		}

		function setScrollPaneDimensions(pane) {
            pane.height(getObj.slideRoot().height());
		}

		/*
		* Function: getWidth
		*
		* Determines the numerical pixel value for the supplied property on a given element. This discards any 'px' suffixes and
		* returns a number. If the value returned by the browser does not start with a number (like IE returning 'medium'), this
		* function will return 0. Best to set borders and the like to numerical values rather than the keyword values.
		*
		* Parameters:
		* 		element -> the element whose property's value is being returned.
		* 		property -> the property whose value is being returned.
		* Returns: Number
		* 		the numerical value of the property supplied, stripped of any of its textual component (like 'px').
		*/
		function getWidth(element, property) {
			var value = '';
			try {
				value = element.css(property).replace(/\D\-/g, '')
			} catch (e) { };

			// IE FIX
			if (value != NaN && value != '') {
				return parseInt((isNaN(parseInt(value)) ? 0 : value), 10);
			}
			return 0;
		}

		init();
	}
});

jQuery.extend({
	uiPod: {
		getObj: {
			titleRoot: function() { return jQuery('#titleRoot'); },
			slideRoot: function() { return jQuery('#slideRoot'); },
			slideChild: function(s) {
				switch(s) {
					case null:
						return jQuery('.slideChild');
						break;
					case 'last':
						//This return that very last .slideChild in the #slideRoot, but makes sure that the first one isn't selected.
						var sC = jQuery('.slideChild');
						var i = sC.length - 1;
						return sC.eq(i > 0 ? i : 1);
						break;
					case 'prev':
						//If we are selecting the prev we want to make sure we are selecting for a valid slideChild.
						//An invalid would be one that's currently in animation that is the last one.  Which would mean it's been deleted.
						jQuery('.slideChild:animated').filter(':first').stop().hide().remove();
						return jQuery('.slideChild:last').prev();
						break;
					case 'prevAll':
						return jQuery('.slideChild:last').prevAll();
						break;
					case 'first':
						return jQuery('.slideChild:first');
						break;
					case 'animated':
						return jQuery('.slideChild').filter('.firstMenu');
						break;
				}
			},
			scrollUpper: function() { return jQuery('#slideRoot .upperArrow'); },
			scrollLower: function() { return jQuery('#slideRoot .lowerArrow'); }
		},
		urlHelper: function(url) {
			jQuery.uiPod.getObj.slideRoot().find('a[href*="' + url + '"]').parent().parent().parent().parent().find('div:first').click();
		},
		drillUp: function() {
			jQuery.uiPod.getObj.titleRoot().find('div:last').click();
		},
		themeRoller: {
			header: 'ui-helper-reset ui-helper-clearfix ui-widget-header MainMenuHeader',
			headerHover: 'ui-helper-reset ui-helper-clearfix ui-widget-header ui-state-default ui-state-hover MainMenuHeader',
			label: 'ui-state-default',
			labelHover: 'ui-state-hover',
			icon: 'ui-icon ui-icon-circle-triangle-e',
			menu: 'ui-widget',
			text: 'MainMenuItem ui-state-default',
			scrollBar: 'ui-state-highlight'
		}
	}
});