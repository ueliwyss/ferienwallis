Did you use this script?  Do you like this site?  Please link to us!

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>distance and perception - Interactive DHTML art-demos</title>
<meta name="Author" content="Gerard Ferrandez at http://www.dhteumeuleu.com">
<meta http-equiv="imagetoolbar" content="no">
<style type="text/css">
	html {
		overflow: hidden;
	}
	body {
		position: absolute;
		margin: 0px;
		padding: 0px;
		background: #111;
		width: 100%;
		height: 100%;
	}
	#center {
		position: absolute;
		left: 50%;
		top:  50%;
	}
	#slider {
		position: absolute;
		width: 820px;
		height: 333px;
		left: -430px;
		top: -186px;
		overflow: hidden;
		background: #000;
		border: 20px solid #000;
	}
	#slider .slide {
		position: absolute;
		top: 0px;
		height: 333px;
		width: 500px;
		background: #000;
		overflow: hidden;
		border-left: #000 solid 1px;
		cursor: default;
	}
	#slider .title   {
		color: #F80;
		font-weight: bold;
		font-size: 1.2em;
		margin-right: 1.5em;
		text-decoration: none;
	}
	#slider .backgroundText {
		position: absolute;
		width: 100%;
		height: 100%;
		top: 100%;
		background: #000;
		filter: alpha(opacity=40);
		opacity: 0.4;
	}
	#slider .text {
		position: absolute;
		top: 1%;
		top: 100%;
		color: #FFF;
		font-family: verdana, arial, Helvetica, sans-serif;
		font-size: 0.9em;
		text-align: justify;
		width: 470px;
		left: 10px;
	}
	#slider .diapo {
		position: absolute;
		filter: alpha(opacity=100);
		opacity: 1;
		visibility: hidden;
	}
</style>

<script type="text/javascript">
// ========================================================
//              ===== images slider ====
// script: Gerard Ferrandez - Ge-1-doot - February 2008
// http://www.dhteumeuleu.com
// CC-BY-NC
// ========================================================

/* ==== slider nameSpace ==== */
var slider = function() {
	/* ==== private methods ==== */
	function getElementsByClass(object, tag, className) {
		var o = object.getElementsByTagName(tag);
		for ( var i = 0, n = o.length, ret = []; i < n; i++) {
			if (o[i].className == className) ret.push(o[i]);
		}
		if (ret.length == 1) ret = ret[0];
		return ret;
	}
	function setOpacity (obj,o) {
		if (obj.filters) obj.filters.alpha.opacity = Math.round(o);
		else obj.style.opacity = o / 100;
	}
	/* ==== Slider Constructor ==== */
	function Slider(oCont, speed, iW, iH, oP) {
		this.slides = [];
		this.over   = false;
		this.S      = this.S0 = speed;
		this.iW     = iW;
		this.iH     = iH;
		this.oP     = oP;
		this.oc     = document.getElementById(oCont);
		this.frm    = getElementsByClass(this.oc, 'div', 'slide');
		this.NF     = this.frm.length;
		this.resize();
		for (var i = 0; i < this.NF; i++) {
			this.slides[i] = new Slide(this, i);
		}
		this.oc.parent = this;
		this.view      = this.slides[0];
		this.Z         = this.mx;
		/* ==== on mouse out event ==== */
		this.oc.onmouseout = function () {
			this.parent.mouseout();
			return false;
		}
	}
	Slider.prototype = {
		/* ==== animation loop ==== */
		run : function () {
			this.Z += this.over ? (this.mn - this.Z) * .5 : (this.mx - this.Z) * .5;
			this.view.calc();
			var i = this.NF;
			while (i--) this.slides[i].move();
		},
		/* ==== resize  ==== */
		resize : function () {
			this.wh = this.oc.clientWidth;
			this.ht = this.oc.clientHeight;
			this.wr = this.wh * this.iW;
			this.r  = this.ht / this.wr;
			this.mx = this.wh / this.NF;
			this.mn = (this.wh * (1 - this.iW)) / (this.NF - 1);
		},
		/* ==== rest  ==== */
		mouseout : function () {
			this.over      = false;
			setOpacity(this.view.img, this.oP);
		}
	}
	/* ==== Slide Constructor ==== */
	Slide = function (parent, N) {
		this.parent = parent;
		this.N      = N;
		this.x0     = this.x1 = N * parent.mx;
		this.v      = 0;
		this.loaded = false;
		this.cpt    = 0;
		this.start  = new Date();
		this.obj    = parent.frm[N];
		this.txt    = getElementsByClass(this.obj, 'div', 'text');
		this.img    = getElementsByClass(this.obj, 'img', 'diapo');
		this.bkg    = document.createElement('div');
		this.bkg.className = 'backgroundText';
		this.obj.insertBefore(this.bkg, this.txt);
		if (N == 0) this.obj.style.borderLeft = 'none';
		this.obj.style.left = Math.floor(this.x0) + 'px';
		setOpacity(this.img, parent.oP);
		/* ==== mouse events ==== */
		this.obj.parent = this;
		this.obj.onmouseover = function() {
			this.parent.over();
			return false;
		}
	}
	Slide.prototype = {
		/* ==== target positions ==== */
		calc : function() {
			var that = this.parent;
			// left slides
			for (var i = 0; i <= this.N; i++) {
				that.slides[i].x1 = i * that.Z;
			}
			// right slides
			for (var i = this.N + 1; i < that.NF; i++) {
				that.slides[i].x1 = that.wh - (that.NF - i) * that.Z;
			}
		},
		/* ==== HTML animation : move slides ==== */
		move : function() {
			var that = this.parent;
			var s = (this.x1 - this.x0) / that.S;
			/* ==== lateral slide ==== */
			if (this.N && Math.abs(s) > .5) {
				this.obj.style.left = Math.floor(this.x0 += s) + 'px';
			}
			/* ==== vertical text ==== */
			var v = (this.N < that.NF - 1) ? that.slides[this.N + 1].x0 - this.x0 : that.wh - this.x0;
			if (Math.abs(v - this.v) > .5) {
				this.bkg.style.top = this.txt.style.top = Math.floor(2 + that.ht - (v - that.Z) * that.iH * that.r) + 'px';
				this.v = v;
				this.cpt++;
			} else {
				if (!this.pro) {
					/* ==== adjust speed ==== */
					this.pro = true;
					var tps = new Date() - this.start;
					if(this.cpt > 1) {
						that.S = Math.max(2, (28 / (tps / this.cpt)) * that.S0);
					}
				}
			}
			if (!this.loaded) {
				if (this.img.complete) {
					this.img.style.visibility = 'visible';
					this.loaded = true;
				}
			}
		},
		/* ==== light ==== */
		over : function () {
			this.parent.resize();
			this.parent.over = true;
			setOpacity(this.parent.view.img, this.parent.oP);
			this.parent.view = this;
			this.start = new Date();
			this.cpt = 0;
			this.pro = false;
			this.calc();
			setOpacity(this.img, 100);
		}
	}
	/* ==== public method - script initialization ==== */
	return {
		init : function() {
			// create instances of sliders here
			// parameters : HTMLcontainer name, speed (2 fast - 20 slow), Horizontal ratio, vertical text ratio, opacity
			this.s1 = new Slider("slider", 12, 1.84/3, 1/3.2, 70);
			setInterval("slider.s1.run();", 16);
		}
	}
}();

</script>
</head>

<body>
<div id="center">
	<div id="slider">
		<div class="slide">
			<img class="diapo" src="sf10.jpg" alt="">
			<div class="text">
				  <span class="title">The best</span>
				  The offspring of a customized orbiter, O�kostem arose as the best balanced
				  home for our plans. So we submitted to its conditions.
			</div>
		</div>
		<div class="slide">
			<img class="diapo" src="sf14.jpg" alt="">
			<div class="text">
				<span class="title">Prototype</span>
				O�kostem's deep impulse flow is selectively regulated by a molecule
				originated in the prototype model, that creates its own variational
				principles, as oriented by the first local generation of terminable androids.
			</div>
		</div>
		<div class="slide">
			<img class="diapo" src="sf24.jpg" alt="">
			<div class="text">
				  <span class="title">Has been reduced</span>
				  Paired hosts come out nicely after only two cycles now. Their size has been
				  reduced to a half the original as planned, and indeed they show an
				  evolutionary advantage in the process of fixing self-generated instructions.
				  Plus, they are beautiful.
			</div>
		</div>
		<div class="slide">
			<img class="diapo" src="sf04.jpg" alt="">
			<div class="text">
				<span class="title">By close-alikes</span>
				Now I have regained hopes in someday finding myself surrounded by
				close-alikes to us. However, they will not be audible, at least not in my
				life span. We resolved the low freq vibration a superior solution for our
				communicational goals ...
			</div>
		</div>
		<div class="slide">
			<img class="diapo" src="sf01.jpg" alt="">
			<div class="text">
				  <span class="title">To bear</span>
				  We did not expect their surface to produce such a carbon powder coat, though
				  this is the best model so far. I shall have to bear with the inconveniences.
				  They seem to establish a parallel communication through that carbon coat and
				  I find myself unable to decodify the signal into anything meaningful.
			</div>
		</div>
		<div class="slide">
			<img class="diapo" src="sf15.jpg" alt="">
			<div class="text">
				  <span class="title">The zero level</span>
				  Today a set of vibration came up from the zero level;  we expect to launch
				  the transitional program in no longer than five basetime units. Psykesoma�
				  galore and we'll betray our very nature into infinite, unending 2D surfaces.
				  We do need that vibration, and we will conquer its source.
			</div>
		</div>
		<div class="slide">
			<img class="diapo" src="sf41.jpg" alt="">
			<div class="text">
				  <span class="title">Beautifully</span>
				  To keep my sanity I wear the tactile sensors all the time. They translate
				  beautifully; I can even see distances while still on Psykesoma. This was
				  quite a discovery. We have grown more adaptable than expected.
			</div>
		</div>
		<div class="slide">
			<img class="diapo" src="sf26.jpg" alt="">
			<div class="text">
				  <span class="title">Uneasy to match</span>
				  Yewoona had to travel farther and longer than I did. Her base orbiter was
				  set to keep a complex combinational path that made it uneasy to match our
				  circuits. But her nature showed stronger than programmed.
			</div>
		</div>
		<div class="slide">
			<img class="diapo" src="sf50.jpg" alt="">
			<div class="text">
				  <span class="title">Adapted to serve</span>
				  Keep feeding them. We will never be this lucky again; an autogenerated
				  species adapted to serve all our needs!
			</div>
		</div>
		<div class="slide">
			<img class="diapo" src="sf19.jpg" alt="">
			<div class="text">
				  <a class="title" href="http://www.dhteumeuleu.com">At soonest</a>
				  "Blood is dark red, iron dark blue, this tale is blissful and so are you". I
				  should get to the hotel at soonest. The agency guy must be there already,
				  with some luck we'll have some nice dinner on him. How's that?
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
/* ==== start script ==== */
slider.init();
</script>
</body>
</html>


--------------------------------------------------------------------------------
Resource Images :

../images/sf10.jpg


../images/sf14.jpg


../images/sf24.jpg


../images/sf04.jpg


../images/sf01.jpg


../images/sf15.jpg


../images/sf41.jpg


../images/sf26.jpg


../images/sf50.jpg


../images/sf19.jpg




--------------------------------------------------------------------------------
Resource music/sound :

../sound/memories.mid

All sounds and images are credited to the respective author(s).