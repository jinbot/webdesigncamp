// myslider.js
var Slider = function(slides, sno, x, y, direction, slideBtns){
	var self = this; //메서드(함수) 안에서는 this가 함수 자신을 가리킬 수 있으므로 다른 이름으로 복사해 둠.
	this.slides = slides;
	this.sno = sno;
	this.max = this.slides.length - 1;
	this.dirs = {
		"left":{ 
			"x": {"start":x,"end":-x}, 
			"y": {"start":0,"end":0} 
		},
		"right":{ 
			"x":{"start":-x,"end":x}, 
			"y":{"start":0,"end":0}
		},
		"up":{ 
			"x":{"start":0,"end":0}, 
			"y":{"start":y,"end":-y} 
		},
		"down":{ 
			"x":{"start":0,"end":0}, 
			"y":{"start":-y,"end":y} 
		}
	};

	this.dirset = direction ? direction : "right";
	this.timer = null;

	this.slide = function(direction){
		if( direction ) self.dirset = direction;

		var slideDir = [];
		if( self.dirset == "left") slideDir = self.dirs.left;
		else if( self.dirset == "right" ) slideDir = self.dirs.right;
		else if( self.dirset == "up" ) slideDir = self.dirs.up;
		else if( self.dirset == "down" ) slideDir = self.dirs.down;
		else slideDir = self.dirs.right;

		$(self.slides[self.sno]).siblings().css({"left":slideDir.x.start+"px","top":slideDir.y.start+"px"});
		if( $(self.slides[this.sno]).is(":animated") ) return;
		$(self.slides[self.sno]).animate({"left":slideDir.x.end+"px","top":slideDir.y.end+"px"},1000,function(){ 
			$(this).css({"left":slideDir.x.start+"px","top":slideDir.y.start+"px"}); 
		});
		self.sno++;	
		if( self.sno > self.max ) self.sno = 0;
		$(self.slides[self.sno]).animate({"left":"0","top":"0"},1000);	
	};

	this.loop = function(act, ms) {
		if( act == "start" ) {
			self.timer = setInterval(function(){self.slide();},ms);
		} else if( act == "stop" ) {
			clearInterval(self.timer);
			self.timer = null;
		}
	};

	if( slideBtns ) {
		if( slideBtns.up ) { 
			$(slideBtns.up).on("click",function(){self.slide("up");});
		}
		if( slideBtns.down ) { 
			$(slideBtns.down).on("click",function(){self.slide("down");});
		}
		if( slideBtns.right ) { 
			$(slideBtns.right).on("click",function(){self.slide("right");});
		}
		if( slideBtns.left ) { 
			$(slideBtns.left).on("click",function(){self.slide("left");});
		}
	}
};