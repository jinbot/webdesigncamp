// myslider.js
var Slider = function(slides, sno, x, y, direction, slideBtns){
	var self = this;
	this.slides = slides;
	this.sno = sno;
	this.max = this.slides.length - 1;
	this.x = x;
	this.y = y;
	this.dirs = {};
	this.dirs.left = [[x,-x],[0,0]];
	this.dirs.right = [[-x,x],[0,0]];
	this.dirs.up = [[0,0],[y,-y]];
	this.dirs.down = [[0,0],[-y,y]];
	this.dirset = direction;
	this.timer = null;

	this.slide = function(direction){
		if( direction ) self.dirset = direction;
		var slideDir = [];
		if( self.dirset == "left") slideDir = self.dirs.left;
		else if( self.dirset == "right" ) slideDir = self.dirs.right;
		else if( self.dirset == "up" ) slideDir = self.dirs.up;
		else if( self.dirset == "down" ) slideDir = self.dirs.down;
		else slideDir = self.dirs.right;

		$(self.slides[self.sno]).siblings().css({"left":slideDir[0][0]+"px","top":slideDir[1][0]+"px"});
		if( $(self.slides[this.sno]).is(":animated") ) return;
		//var firstImg = $(this.slides[this.sno]);
		$(self.slides[this.sno]).animate({"left":slideDir[0][1]+"px","top":slideDir[1][1]+"px"},1000,function(){ 
			$(this).css({"left":slideDir[0][0]+"px","top":slideDir[1][0]+"px"}); 
		});
		this.sno++;	
		if( self.sno > self.max ) this.sno = 0;
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