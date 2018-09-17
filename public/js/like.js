/**
 * demo.js
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2016, Codrops
 * http://www.codrops.com
 */
;(function(window) {

	'use strict';

	// taken from mo.js demos
	function isIOSSafari() {
		var userAgent;
		userAgent = window.navigator.userAgent;
		return userAgent.match(/iPad/i) || userAgent.match(/iPhone/i);
	};

	// taken from mo.js demos
	function isTouch() {
		var isIETouch;
		isIETouch = navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
		return [].indexOf.call(window, 'ontouchstart') >= 0 || isIETouch;
	};
	
	// taken from mo.js demos
	var isIOS = isIOSSafari(),
		clickHandler = isIOS || isTouch() ? 'touchstart' : 'click';

	function extend( a, b ) {
		for( var key in b ) { 
			if( b.hasOwnProperty( key ) ) {
				a[key] = b[key];
			}
		}
		return a;
	}

	function Animocon(el, options) {
		this.el = el;
		this.options = extend( {}, this.options );
		extend( this.options, options );

		this.checked = false;

		this.timeline = new mojs.Timeline();
		
		for(var i = 0, len = this.options.tweens.length; i < len; ++i) {
			this.timeline.add(this.options.tweens[i]);
		}

		var self = this;
		this.el.addEventListener(clickHandler, function() {
			if( self.checked ) {
				self.options.onUnCheck();
			}
			else {
				self.options.onCheck();
				self.timeline.replay();
			}
			self.checked = !self.checked;
		});
	}

	Animocon.prototype.options = {
		tweens : [
			new mojs.Burst({})
		],
		onCheck : function() { return false; },
		onUnCheck : function() { return false; }
	};

	// grid items:
	var items = [].slice.call(document.querySelectorAll('ol.grid > .grid__item'));

	function init() {
		/* Icon 1 */
		var el1 = items[0].querySelector('button.icobutton'), el1span = el1.querySelector('span');
		new Animocon(el1, {
			tweens : [
				// burst animation
				new mojs.Burst({
					parent: 			el1,
					radius: 			{30:90},
					count: 				6,
					children : {
						fill: 			'#C0C1C3',
						opacity: 		0.6,
						radius: 		15,
						duration: 	1700,
						easing: 		mojs.easing.bezier(0.1, 1, 0.3, 1)
					}
				}),
				// ring animation
				new mojs.Shape({
					parent: 		el1,
					type: 			'circle',
					radius: 		{0: 60},
					fill: 			'transparent',
					stroke: 		'#C0C1C3',
					strokeWidth: {20:0},
					opacity: 		0.6,
					duration: 	700,
					easing: 		mojs.easing.sin.out
				}),
				// icon scale animation
				new mojs.Tween({
					duration : 1200,
					onUpdate: function(progress) {
						if(progress > 0.3) {
							var elasticOutProgress = mojs.easing.elastic.out(1.43*progress-0.43);
							el1span.style.WebkitTransform = el1span.style.transform = 'scale3d(' + elasticOutProgress + ',' + elasticOutProgress + ',1)';
						}
						else {
							el1span.style.WebkitTransform = el1span.style.transform = 'scale3d(0,0,1)';
						}
					}
				})
			],
			onCheck : function() {
				el1.style.color = '#de6551';
			},
			onUnCheck : function() {
				el1.style.color = '#C0C1C3';
			}
		});
		/* Icon 1 */

		/* Icon 2 */
		var el2 = items[1].querySelector('button.icobutton'), el2span = el2.querySelector('span');
		new Animocon(el2, {
			tweens : [
				// burst animation
				new mojs.Burst({
					parent: 		el2,
					count: 			6,
					radius: 		{ 40 : 90 },
					timeline:   { delay: 300 },
					children: {
						fill: 			'#C0C1C3',
						radius:     7,
						opacity: 		0.6,
						duration: 	1500,
						easing: 		mojs.easing.bezier(0.1, 1, 0.3, 1)
					}
				}),
				// ring animation
				new mojs.Shape({
					parent: 		el2,
					radius: 		{0: 50},
					fill: 			'transparent',
					stroke: 		'#C0C1C3',
					strokeWidth: {35:0},
					opacity: 			0.6,
					duration: 		600,
					easing: mojs.easing.ease.inout
				}),
				// icon scale animation
				new mojs.Tween({
					duration : 1100,
					onUpdate: function(progress) {
						if(progress > 0.3) {
							var elasticOutProgress = mojs.easing.elastic.out(1.43*progress-0.43);
							el2span.style.WebkitTransform = el2span.style.transform = 'scale3d(' + elasticOutProgress + ',' + elasticOutProgress + ',1)';
						}
						else {
							el2span.style.WebkitTransform = el2span.style.transform = 'scale3d(0,0,1)';
						}
					}
				})
			],
			onCheck : function() {
				el2.style.color = '#de6551';
			},
			onUnCheck : function() {
				el2.style.color = '#C0C1C3';
			}
		});
		/* Icon 2 */

		/* Icon 3 */
		var el3 = items[2].querySelector('button.icobutton'), el3span = el3.querySelector('span');
		new Animocon(el3, {
			tweens : [
				// burst animation
				new mojs.Burst({
					parent: 		el3,
					count: 			6,
					radius: 		{40:90},
					children: {
						fill: 			[ '#988ADE', '#DE8AA0', '#8AAEDE', '#8ADEAD', '#DEC58A', '#8AD1DE' ],
						opacity: 		0.6,
						scale: 			1,
						radius:     { 7: 0 },
						duration: 	1500,
						delay: 			300,
						easing: 		mojs.easing.bezier(0.1, 1, 0.3, 1)
					}
				}),
				// ring animation
				new mojs.Shape({
					parent: 			el3,
					type: 				'circle',
					scale:        { 0: 1 },
					radius: 			50,
					fill: 				'transparent',
					stroke: 			'#de6551',
					strokeWidth: 	{35:0},
					opacity: 			0.6,
					duration:  		750,
					easing: 			mojs.easing.bezier(0, 1, 0.5, 1)
				}),
				// icon scale animation
				new mojs.Tween({
					duration : 1100,
					onUpdate: function(progress) {
						if(progress > 0.3) {
							var elasticOutProgress = mojs.easing.elastic.out(1.43*progress-0.43);
							el3span.style.WebkitTransform = el3span.style.transform = 'scale3d(' + elasticOutProgress + ',' + elasticOutProgress + ',1)';
						}
						else {
							el3span.style.WebkitTransform = el3span.style.transform = 'scale3d(0,0,1)';
						}
					}
				})
			],
			onCheck : function() {
				el3.style.color = '#de6551';
			},
			onUnCheck : function() {
				el3.style.color = '#C0C1C3';
			}
		});
		/* Icon 3 */

		/* Icon 4 */
		var el4 = items[3].querySelector('button.icobutton'), el4span = el4.querySelector('span');
		var scaleCurve4 = mojs.easing.path('M0,100 L25,99.9999983 C26.2328835,75.0708847 19.7847843,0 100,0');
		new Animocon(el4, {
			tweens : [
				// burst animation
				new mojs.Burst({
					parent: 	el4,
					count: 		6,
					radius: 	{40:120},
					children: {
						fill : 		[ '#988ADE', '#DE8AA0', '#8AAEDE', '#8ADEAD', '#DEC58A', '#8AD1DE' ],
						opacity: 	0.6,
						radius: 	20,
						direction: [ -1, -1, -1, 1, -1 ],
						swirlSize: 'rand(10, 14)',
						duration: 1500,
						easing: 	mojs.easing.bezier(0.1, 1, 0.3, 1),
						isSwirl: 	true
					}
				}),
				// ring animation
				new mojs.Shape({
					parent: 			el4,
					radius: 			50,
					scale: 				{ 0 : 1 },
					fill: 				'transparent',
					stroke: 			'#988ADE',
					strokeWidth: 	{15:0},
					opacity: 			0.6,
					duration: 		750,
					easing: 			mojs.easing.bezier(0, 1, 0.5, 1)
				}),
				// icon scale animation
				new mojs.Tween({
					duration : 900,
					onUpdate: function(progress) {
						var scaleProgress = scaleCurve4(progress);
						el4span.style.WebkitTransform = el4span.style.transform = 'scale3d(' + scaleProgress + ',' + scaleProgress + ',1)';
					}
				})
			],
			onCheck : function() {
				el4.style.color = '#988ADE';
			},
			onUnCheck : function() {
				el4.style.color = '#C0C1C3';
			}
		});
		/* Icon 4 */

		/* Icon 5 */
		var el5 = items[4].querySelector('button.icobutton'), el5span = el5.querySelector('span');
		var scaleCurve5 = mojs.easing.path('M0,100 L25,99.9999983 C26.2328835,75.0708847 19.7847843,0 100,0');
		new Animocon(el5, {
			tweens : [
				// burst animation
				new mojs.Burst({
					parent: 	el5,
					count: 		15,
					radius: 	{20:80},
					angle: 		{ 0: 140, easing: mojs.easing.bezier(0.1, 1, 0.3, 1) },
					children: {
						fill: 			'#988ADE',
						radius: 		20,
						opacity: 		0.6,
						duration: 	1500,
						easing: 		mojs.easing.bezier(0.1, 1, 0.3, 1)
					}
				}),
				// icon scale animation
				new mojs.Tween({
					duration : 800,
					easing: mojs.easing.bezier(0.1, 1, 0.3, 1),
					onUpdate: function(progress) {
						var scaleProgress = scaleCurve5(progress);
						el5span.style.WebkitTransform = el5span.style.transform = 'scale3d(' + progress + ',' + progress + ',1)';
					}
				})
			],
			onCheck : function() {
				el5.style.color = '#988ADE';
			},
			onUnCheck : function() {
				el5.style.color = '#C0C1C3';
			}
		});
		/* Icon 5 */

		/* Icon 6 */
		var el6 = items[5].querySelector('button.icobutton'), el6span = el6.querySelector('span');
		var scaleCurve6 = mojs.easing.path('M0,100 L25,99.9999983 C26.2328835,75.0708847 19.7847843,0 100,0');
		new Animocon(el6, {
			tweens : [
				// burst animation
				new mojs.Burst({
					parent: 			el6,
					radius: 			{40:110},
					count: 				20,
					children: {
						shape: 			'line',
						fill : 			'white',
						radius: 		{ 12: 0 },
						scale: 			1,
						stroke: 		'#988ADE',
						strokeWidth: 2,
						duration: 	1500,
						easing: 		mojs.easing.bezier(0.1, 1, 0.3, 1)
					},
				}),
				// ring animation
				new mojs.Shape({
					parent: 			el6,
					radius: 			{10: 60},
					fill: 				'transparent',
					stroke: 			'#988ADE',
					strokeWidth: 	{30:0},
					duration: 		800,
					easing: 			mojs.easing.bezier(0.1, 1, 0.3, 1)
				}),
				// icon scale animation
				new mojs.Tween({
					duration : 800,
					easing: mojs.easing.bezier(0.1, 1, 0.3, 1),
					onUpdate: function(progress) {
						var scaleProgress = scaleCurve6(progress);
						el6span.style.WebkitTransform = el6span.style.transform = 'scale3d(' + progress + ',' + progress + ',1)';
					}
				})
			],
			onCheck : function() {
				el6.style.color = '#988ADE';
			},
			onUnCheck : function() {
				el6.style.color = '#C0C1C3';
			}
		});
		/* Icon 6 */

		// bursts when hovering the mo.js link
		var molinkEl = document.querySelector('.special-link'),
			moTimeline = new mojs.Timeline(),
			moburst1 = new mojs.Burst({
				parent: 			molinkEl,
				count: 				6,
				left: 				'0%',
				top:  				'-50%',
				radius: 			{0:60},
				children: {
					fill : 			[ '#988ADE', '#DE8AA0', '#8AAEDE', '#8ADEAD', '#DEC58A', '#8AD1DE' ],
					duration: 	1300,
					easing: 		mojs.easing.bezier(0.1, 1, 0.3, 1)
				}
			}),
			moburst2 = new mojs.Burst({
				parent: 	molinkEl,
				left: '-100%', top: '-20%',
				count: 		14,
				radius: 		{0:120},
				children: {
					fill: 			[ '#988ADE', '#DE8AA0', '#8AAEDE', '#8ADEAD', '#DEC58A', '#8AD1DE' ],
					duration: 	1600,
					delay: 			100,
					easing: 		mojs.easing.bezier(0.1, 1, 0.3, 1)
				}
			}),
			moburst3 = new mojs.Burst({
				parent: 			molinkEl,
				left: '130%', top: '-70%',
				count: 				8,
				radius: 			{0:90},
				children: {
					fill: 			[ '#988ADE', '#DE8AA0', '#8AAEDE', '#8ADEAD', '#DEC58A', '#8AD1DE' ],
					duration: 	1500,
					delay: 			200,
					easing: 		mojs.easing.bezier(0.1, 1, 0.3, 1)
				}
			}),
			moburst4 = new mojs.Burst({
				parent: molinkEl,
				left: '-20%', top: '-150%',
				count: 		14,
				radius: 	{0:60},
				children: {
					fill: 			[ '#988ADE', '#DE8AA0', '#8AAEDE', '#8ADEAD', '#DEC58A', '#8AD1DE' ],
					duration: 	2000,
					delay: 			300,
					easing: 		mojs.easing.bezier(0.1, 1, 0.3, 1)
				}
			}),
			moburst5 = new mojs.Burst({
				parent: 	molinkEl,
				count: 		12,
				left: '30%', top: '-100%',
				radius: 		{0:60},
				children: {
					fill: 			[ '#988ADE', '#DE8AA0', '#8AAEDE', '#8ADEAD', '#DEC58A', '#8AD1DE' ],
					duration: 	1400,
					delay: 			400,
					easing: 		mojs.easing.bezier(0.1, 1, 0.3, 1)
				}
			});

		moTimeline.add(moburst1, moburst2, moburst3, moburst4, moburst5);
		// molinkEl.addEventListener('mouseclick', function() {
		// 	moTimeline.replay();
		// });
	}
	
	init();

})(window);