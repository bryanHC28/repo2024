
<!DOCTYPE html>
<html>
<head>
  <title>gauge.js</title>
  <meta name="description" content="100% native and cool looking animated JavaScript/CoffeeScript gauge">
  <meta name="viewport" content="width=1024, maximum-scale=1">
  <meta property="og:image" content="http://bernii.github.com/gauge.js/assets/preview.jpg?v=1" />
  <link rel="shortcut icon" href="favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
  <link href="assets/bootstrap.min.css" type="text/css" rel="stylesheet">
  <link href="assets/main.css?v=5" type="text/css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Amaranth:400,700|Just+Another+Hand' rel='stylesheet' type='text/css'>
  <link href="assets/prettify.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/fd-slider/fd-slider.css?v=2">
  <link rel="stylesheet" type="text/css" href="assets/fd-slider/fd-slider-tooltip.css">
  <script type="text/javascript" src="assets/prettify.js"></script>
  <script type="text/javascript" src="assets/jscolor.js"></script>
  <!--[if lt IE 9]><script type="text/javascript" src="assets/excanvas.compiled.js"></script><![endif]-->
</head>
<body>

<div id="logo">
  <h1>gauge.js</h1>
  <h2>100% native and cool looking animated JavaScript/CoffeeScript gauge</h2>
  <div id="its-coffee">coffee</div>
  <div id="strike-it"></div>
  <!--
  <div id="mask">
    <div id="dot"></div>
  </div>
  -->
</div>

<a id="ribbon" href="http://github.com/bernii/gauge.js"></a>

<div id="content">

<div id="download">
  <a href="dist/gauge.coffee" class="btn btn-primary btn-large">gauge.coffee</a>
  <a href="dist/gauge.min.js" class="btn btn-large">gauge.min.js</a>
</div>

<div id="example" class="gauge">
  <h2>Example</h2>

  <h4>Variant selection</h4>
  <ul class="horiz-list" id="type-select">
  	<li class="active" type="gauge"><canvas width=80 height=50 id="select-1"></canvas></li>
  	<li type="donut"><canvas width=80 height=40 id="select-2"></canvas></li>
    <li type="zones"><canvas width=80 height=50 id="select-3"></canvas></li>
    <li type="new"><canvas width=80 height=50 id="select-4"></canvas></li>
  </ul>
  <div id="preview">
  	<canvas width=380 height=150 id="canvas-preview"></canvas>
  	<div id="preview-textfield"></div>
  </div>
  <form id="opts" class="opts">
  	<h4>Options:</h4>
  	<label>Current Val:</label><input type="text" name="currval" min="0" max="3000" step="25" value="1244"><br>
    <label>Anim speed:</label><input type="text" name="animationSpeed" min="1" max="128" step="1" value="32"><br><br>
    <label>Angle:</label><input id="input-angle" type="text" name="angle" min="-50" max="50" step="1" value="15"><br>
    <label>Line width:</label><input id="input-line-width" type="text" name="lineWidth" min="0" max="70" value="44"><br>
    <label>Radius:</label><input id="input-radius-scale" type="text" name="radiusScale" min="50" max="100" value="100"><br>
    <label>Ptr length:</label><input id="input-ptr-len" type="text" name="pointer.length" min="0" max="100" value="60"><br>
    <label>Ptr color:</label><input id="input-ptr-color" type="text" class="color" name="pointer.color" value="000000"><br>
    <label>Ptr stroke:</label><input id="input-ptr-stroke" type="text" name="pointer.strokeWidth" min="0" max="300" value="35"><br>
    <label>Font size:</label><input id="input-font-size" type="text" name="fontSize" min="0" max="100" value="41"><br>
    <label>Color start:</label><input type="text" name="colorStart" class="color" value="6FADCF"><br>
    <label>Color stop:</label><input type="text" name="colorStop" class="color" value="8FC0DA"><br>
    <label>Background:</label><input type="text" name="strokeColor" class="color" value="E0E0E0"><br>

    <label>Ticks:</label><input type="checkbox" id="divisionsCbx" class="renderTicks"><br>

    <div class="subDivisions" style="display: none;">
    <label>Divisions:</label><input type="text" name="divisions" value="5" min="0" max="20" class="renderTicks"><br>
    <label>Divisions Length:</label><input type="text" name="divLength" value="70" min="0" max="100" class="renderTicks"><br>
    <label>Division Color:</label><input type="text" name="divColor" value="333333" class="color renderTicks"><br>
    <label>Division indicator width:</label><input type="text" name="divWidth" value="11" min="1" max="100" class="renderTicks"><br>
    <label>SubDivisions:</label><input type="text" name="subDivisions" value="3" min="0" max="20" class="renderTicks"><br>
    <label>SubDivisions Length:</label><input type="text" name="subLength" value="50" min="0" max="100" class="renderTicks"><br>
    <label>SubDivisions Color:</label><input type="text" name="subColor" value="666666" class="color renderTicks"><br>
    <label>SubDivisions indicator width:</label><input type="text" name="subWidth" value="6" min="1" max="100" class="renderTicks"><br>
    </div>
  </form>

  <br clear="left">
  <input type="checkbox" id="share">
  <label for="share">
    <b>Share it!</b> If checked, the option values will be stored in the URL so that you can easily share your settings.
  </label>
</div>

<h2>Features</h2>
<ul>
  <li>No images, no external CSS - pure canvas</li>
  <li>No dependencies (jQuery is <a href="#jquery">supported</a>, but not required)</li>
  <li>Highly configurable</li>
  <li>Resolution independent</li>
  <li>Animated guage value changes (!)</li>
  <li>Works in all major browsers</li>
  <li>MIT License</li>
</ul>

<h2 id="usage">Usage</h2>
<pre class="prettyprint">
var opts = {
  angle: <span id="opt-angle" class="lit">7</span>, // The span of the gauge arc
  lineWidth: <span id="opt-lineWidth" class="lit">5</span>, // The line thickness
  radiusScale: <span id="opt-radiusScale" class="lit">1.0</span>, // Relative radius
  pointer: {
    length: <span id="opt-pointer-length" class="lit">10</span>, // // Relative to gauge radius
    strokeWidth: <span id="opt-pointer-strokeWidth" class="lit">0</span>, // The thickness
    color: '<span id="opt-pointer-color" class="lit">#000000</span>' // Fill color
  },
  limitMax: <span id="opt-limitMax" class="lit">false</span>,     // If false, max value increases automatically if value > maxValue
  limitMin: <span id="opt-limitMin" class="lit">false</span>,     // If true, the min value of the gauge will be fixed
  colorStart: '<span id="opt-colorStart" class="lit">0</span>',   // Colors
  colorStop: '<span id="opt-colorStop" class="lit">0</span>',    // just experiment with them
  strokeColor: '<span id="opt-strokeColor" class="lit">0</span>',  // to see which ones work best for you
  generateGradient: true,
  highDpiSupport: true,     // High resolution support
  <span  id="subDivisions" style="display: none;">// renderTicks is Optional
  renderTicks: {
    divisions: <span id="opt-divisions" class="lit">8</span>,
    divWidth: <span id="opt-divWidth" class="lit">1</span>,
    divLength: <span id="opt-divLength" class="lit">0.8</span>,
    divColor: '<span id="opt-divColor" class="lit">#333333</span>',
    subDivisions: <span id="opt-subDivisions" class="lit">3</span>,
    subLength: <span id="opt-subLength" class="lit">0.5</span>,
    subWidth: <span id="opt-subWidth" class="lit">0.5</span>,
    subColor: '<span id="opt-subColor" class="lit">#333333</span>'
  }
  </span>
};
var target = document.getElementById('foo'); // your canvas element
var gauge = new <span id="class-code-name" class="typ">Gauge</span>(target).setOptions(opts); // create sexy gauge!
gauge.maxValue = <span id="opt-maxval" class="lit">3000</span>; // set max gauge value
gauge.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge.animationSpeed = <span id="opt-animationSpeed" class="lit">3000</span>; // set animation speed (32 is default value)
gauge.set(<span id="opt-currval" class="lit">1500</span>); // set actual value
</pre>
<p>
  The <code>Gauge</code> class handles drawing on canvas and starts the animation.
</p>

<h2 id="advanced-options">Advanced options</h2>
<ul>
  <li>
    <b>Percentage color</b>
    <p>If you want to control how Gauge behaves in relation to the displayed value you can use the Guage option called <b>percentColors</b>. To use it add following entry to the options:
<pre class="prettyprint">
percentColors = [[0.0, "#a9d70b" ], [0.50, "#f9c802"], [1.0, "#ff0000"]];
</pre>
    see working example at <a href="http://jsfiddle.net/berni/Yb4d7/">JSFiddle</a></p>
  </li>
  <li>
    <b>Value labels</b>
    <p>For displaying value labels, enable the staticLabels option. A label will be printed at the given value just outside the display arc. </p>
<pre class="prettyprint">
staticLabels: {
  font: "10px sans-serif",  // Specifies font
  labels: [100, 130, 150, 220.1, 260, 300],  // Print labels at these values
  color: "#000000",  // Optional: Label text color
  fractionDigits: 0  // Optional: Numerical precision. 0=round off.
},

</pre>
  </li>
  <li>
    <b>Static zones</b>
    <p>When separating the background sectors or zones to have static colors, you must supply the staticZones property in the Gauge object's options.</p>
<pre class="prettyprint">
staticZones: [
   {strokeStyle: "#F03E3E", min: 100, max: 130}, // Red from 100 to 130
   {strokeStyle: "#FFDD00", min: 130, max: 150}, // Yellow
   {strokeStyle: "#30B32D", min: 150, max: 220}, // Green
   {strokeStyle: "#FFDD00", min: 220, max: 260}, // Yellow
   {strokeStyle: "#F03E3E", min: 260, max: 300}  // Red
],
</pre>
<p>staticZones, percentColors and gradient are mutually exclusive. If staticZones is defined, it will take precedence.</p>
<p>Note: Zones should always be defined within the gauge objects .minValue and .maxValue limits.</p>
</li>
<li>
    <p>Additionally, a <b>height</b> parameter may be passed in to increase the size of the zone (see example 4 gauge above).</p>
  <pre class="prettyprint">
  staticZones: [
    {strokeStyle: "rgb(255,0,0)", min: 0, max: 500, height: 1.4},
    {strokeStyle: "rgb(200,100,0)", min: 500, max: 1000, height: 1.2},
    {strokeStyle: "rgb(150,150,0)", min: 1000, max: 1500, height: 1},
    {strokeStyle: "rgb(100,200,0)", min: 1500, max: 2000, height: 0.8},
    {strokeStyle: "rgb(0,255,0)", min: 2000, max: 3100, height: 0.6}
  ],
  </pre>
  <p>Note:
    <pre class="prettyprint">{strokeStyle: "rgb(80,80,80)", min: 2470, max: 2530, height: 1.3}</pre> 
    You can use this as an additional indicator (like in example 4) by making its color stand out, having a tall height and narrow range.</p>
  </li>
  <li>
    <b>Tick marks</b>
    <p>Now you may also add Ticks on two levels, major and minor (or divisions and sub divisions).</p>
    renderTicks options:
    <ul>
      <li><b>divisions</b> This is the number of major divisions around your arc.</li>
      <li><b>divWidth</b> This is to set the width of the indicator.</li>
      <li><b>divLength</b> This is a fractional percentage of the height of your arc line (0.5 = 50%)</li>
      <li><b>divColor</b> This sets the color of the division markers</li>
      <li><b>subDivisions</b> This sets the minor tick marks count between major ticks.</li>
      <li><b>subLength</b> This is a fractional percentage of the height of your arc line (0.5 = 50%)</li>
      <li><b>subWidth</b> This is to set the width of the indicator.</li>
      <li><b>subColor</b> This sets the color of the subdivision markers</li>
    </ul>
    <p>Example:</p>
    <pre class="prettyprint">
        renderTicks: {
          divisions: 5,
          divWidth: 1.1,
          divLength: 0.7,
          divColor: #333333,
          subDivisions: 3,
          subLength: 0.5,
          subWidth: 0.6,
          subColor: #666666
        }
    </pre>
  </li>
  <li>
    <b>Gauge pointer tip icon</b>
    <p>From <a src="https://github.com/bernii/gauge.js/pull/133">pull request 133</a>: You can add an icon (image) to the tip of the gauge pointer with the iconPath and iconScale options. The icon also rotates with the angle of the pointer.</p>
<pre class="prettyprint">
pointer: {
  // Extra optional pointer options:
  iconPath: 'myicon.png',  // Icon image source
  iconScale: 1,    // Size scaling factor
  iconAngle: 90.0  // Rotation offset angle, degrees
},
</pre>
  </li>
</ul>

<h3 id="jquery">jQuery plugin</h3>
<p>
  Gauge.js does not require jQuery. Anyway, if you use jQuery you may use the following plugin:
</p>
<pre class="prettyprint">
$.fn.gauge = function(opts) {
  this.each(function() {
    var $this = $(this),
        data = $this.data();

    if (data.gauge) {
      data.gauge.stop();
      delete data.gauge;
    }
    if (opts !== false) {
      data.gauge = new Gauge(this).setOptions(opts);
    }
  });
  return this;
};
</pre>
<h2>Supported browsers</h2>
<img src="assets/browsers.png">
<p>
  Gauge.js has been (not yet!) successfully tested in the following browsers:
  <ul>
    <li>Chrome</li>
    <li>Safari 3.2+</li>
    <li>Firefox 3.5+</li>
    <li>IE 9</li>
    <li>Opera 10.6+</li>
    <li>Mobile Safari (iOS 3.2+)</li>
    <li>Android 2.3+</li>
  </ul>
</p>

<h2>Changes</h2>


<h3 id="v1.3.7">Version 1.3.7 (15.06.2019)</h3>
<p>
<ul>
<li>AnimationUpdater now removes references finished rendering to prevent memory leaks.</li>
</ul>
</p>

<h3 id="v1.3.6">Version 1.3.6 (28.11.2017)</h3>
<p>
<ul>
<li>Added support for scalable staticzone sections</li>
<li>Added optional Ticks(Major/Minor)</li>
<li>Fixed <a href='https://github.com/bernii/gauge.js/pull/146'>issue #146</a>: Prevent requestAnimationFrame() callbacks from piling up</li>
<li>Fixed <a href='https://github.com/bernii/gauge.js/pull/147'>issue #147</a>: Correct use of options.generateGradient for Donut </li>
</ul>
</p>

<h3 id="v1.3.5">Version 1.3.5 (08.07.2017)</h3>
  <p>
<ul>
  <li>Fixed <a href="https://github.com/bernii/gauge.js/issues/139">issue #139</a>: Donut support for limitMin and -Max.
</ul>
  </p>

<h3 id="v1.3.4">Version 1.3.4 (13.05.2017)</h3>
  <p>
<ul>
  <li>New feature: Add icon to tip of gauge pointer <a href="https://github.com/bernii/gauge.js/pull/133">PR #133</a>
  <li>Fixed <a href="https://github.com/bernii/gauge.js/issues/124">issue #17</a> for Donut.
</ul>
  </p>

<h3 id="v1.3.3">Version 1.3.3 (09.04.2017)</h3>
  <p>
  Improved protection for non-numerical inputs to .set(), which could cause problems like <a href="https://github.com/bernii/gauge.js/issues/124">#124</a>.
  </p>

  <h3 id="v1.3.2">Version 1.3.2 (11.02.2017)</h3>
  <p>
  Bug-fixes (<a href="https://github.com/bernii/gauge.js/issues/116">#116</a> and <a href="https://github.com/bernii/gauge.js/issues/117">#117</a>), performance improvements.
  </p>

<h3 id="v1.3.1">Version 1.3.1 (05.02.2017)</h3>
  Highlights:
<ul>
  <li>Added option 'minLimit' and improved max/min-hit value a lot (<a href="https://github.com/bernii/gauge.js/issues/84">issue #84</a>).</li>
  <li>Fixed multiple pointers color problem, issue <a href="https://github.com/bernii/gauge.js/issues/26">#26</a> and <a href="https://github.com/bernii/gauge.js/issues/72">#72</a>.</li>
  <li>Added ability to scale the gauge radius to deal with issue <a href="https://github.com/bernii/gauge.js/issues/112">#112</a>.</li>
</ul>
  <p>
  A couple of other bugs and issues sorted out as well.
  </p>

<h3 id="v1.3">Version 1.3 (07.01.2017)</h3>
  <p>
  This version is a mix of new functionality and various smaller fixes and improvements. Some of the inner transformations
  and options definition have been slightly altered/improved and made more consistent.
  </p>
  Highlights:
<ul>
  <li>New feature: Value lables above the dial.</li>
  <li>New feature: Static color setting of the dial <a href="https://github.com/bernii/gauge.js/issues/81">issue #81</a>. Based on <a href="https://github.com/rsreimer">rsreimer</a>'s work.</li>
  <li>Gauge dial can be more than 180 degress. Negative options.angle allowed. (New feature)</li>
  <li>Better scaling in parent canvas. (Improvement)</li>
  <li>Set numerical precision for value fiels (Improvement)</li>
</ul>

<h3 id="v1.2.1">Version 1.2.1 (9.03.2014)</h3>
<ul>
  <li>Proper handling of color params <a href="https://github.com/bernii/gauge.js/issues/47">issue #47</a>.</li>
  <li>Moved percentage color to example/docs + <a href="http://jsfiddle.net/berni/Yb4d7/">JSFiddle</a></li>
</ul>

<h3 id="v1.2">Version 1.2 (16.08.2012)</h3>
<ul>
  <li>Prototype chain fix. See <a href="https://github.com/bernii/gauge.js/issues/7">issue #7</a>.</li>
  <li>Refactored code a bit to make it more flexible. Default class that has some extra features like gradient shadows is called Donut while more flexible one (for devs) is called BaseDonut - use it if you would don't need extra automatic stuff.</li>
  <li>Ability to scale gauges (requested via email) - example at <a href="http://jsfiddle.net/7Z2z2/">JSFiddle</a></li>
</ul>

<h3 id="v1.1">Version 1.1 (15.08.2012)</h3>
<ul>
  <li>Fixed color picker <a href="https://github.com/bernii/gauge.js/issues/2">bug</a> in FF & Opera</li>
  <li>Added a shadow option. See <a href="https://github.com/bernii/gauge.js/pull/5">issue #5</a>.</li>
  <li>Added multiple pointer option (requested via email). This needed some code refactoring. No demo for it yet. Use array of values to check it ex. gauge.set([44, 554]);</li>
  <li>Added wrapper for formatting text output <a href="https://github.com/bernii/gauge.js/issues/4">issue #4</a>.</li>
</ul>

<h3 id="v1.0">Version 1.0 (27.6.2012)</h3>
<ul>
  <li>Initial release</li>
</ul>

<h2>Contact</h2>
<p id="contact">
  <img width="57" height="57" src="http://www.gravatar.com/avatar/429e77b5fd1904a032be360339e0bf74">
  If you encounter any problems, please use the <a href="https://github.com/bernii/gauge.js/issues">GitHub issue tracker</a>.<br>
  If you like gauge.js and use it in the wild, let me know.<br>
  If you want to contact me, drop me a message <a href="mailto:bkobos+githubp@extensa.pl">via email</a><br>
</p>
</div>
<div id="footer">
  <a class="github" href="http://github.com">Hosted on GitHub</a>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="assets/fd-slider/fd-slider.js"></script>
<script src="dist/gauge.js"></script>

<script type="text/javascript">
  prettyPrint();

  $('#divisionsCbx').click(function(){
    $('.subDivisions').toggle();
    $('#subDivisions').toggle();
    fdSlider.redrawAll();
  })

  function update() {
    var opts = {};
    var tmp_opts = opts;
    tmp_opts.renderTicks = {};

    if ($('.subDivisions:visible').length) {
    $('.renderTicks').each(function() {
      var val = $(this).hasClass("color") ? this.value : parseFloat(this.value);
      if($(this).hasClass("color")){
        val = "#" + val;
      }
      if (this.name.indexOf("divLength") != -1 ||
      this.name.indexOf("subLength") != -1) {
        val /= 100;
      }
      if (this.name.indexOf("divWidth") != -1 ||
      this.name.indexOf("subWidth") != -1) {
        val /= 10;
      }

      $('#opt-' + this.name.replace(".", "-")).text(val);

      if(this.name.indexOf(".") != -1){
      	var elems = this.name.split(".");

      	for (var i=0; i < elems.length - 1; i++) {
      		if (!(elems[i] in tmp_opts)) {
      			tmp_opts.renderTicks[elems[i]] = {};
      		}
      		tmp_opts = tmp_opts.renderTicks[elems[i]];
      	}
      	tmp_opts.renderTicks[elems[elems.length - 1]] = val;
      } else if ($(this).hasClass("color")) {
        // color picker is removing # from color values
      	opts.renderTicks[this.name] = "#" + this.value
        $('#opt-' + this.name.replace(".", "-")).text("#" + this.value);
      } else {
      	opts.renderTicks[this.name] = val;
      }
    });
  }


    $('.opts input[min], .opts .color').not('.renderTicks').each(function() {
      var val = $(this).hasClass("color") ? this.value : parseFloat(this.value);
      if($(this).hasClass("color")){
        val = "#" + val;
      }
      if(this.name.indexOf("lineWidth") != -1 ||
        this.name.indexOf("radiusScale") != -1 ||
        this.name.indexOf("angle") != -1 ||

        this.name.indexOf("pointer.length") != -1){
        val /= 100;
      }else if(this.name.indexOf("pointer.strokeWidth") != -1){
        val /= 1000;
      }
      $('#opt-' + this.name.replace(".", "-")).text(val);
      if(this.name.indexOf(".") != -1){
      	var elems = this.name.split(".");
      	var tmp_opts = opts;
      	for(var i=0; i<elems.length - 1; i++){
      		if(!(elems[i] in tmp_opts)){
      			tmp_opts[elems[i]] = {};
      		}
      		tmp_opts = tmp_opts[elems[i]];
      	}
      	tmp_opts[elems[elems.length - 1]] = val;
      }else if($(this).hasClass("color")){
        // color picker is removing # from color values
      	opts[this.name] = "#" + this.value
        $('#opt-' + this.name.replace(".", "-")).text("#" + this.value);
      }else{
      	opts[this.name] = val;
      }
      if(this.name == "currval"){
      	// update current demo gauge
      	demoGauge.set(parseInt(this.value));
      	AnimationUpdater.run();
      }
    });
    $('#opts input:checkbox').each(function() {
      opts[this.name] = this.checked;
      $('#opt-' + this.name).text(this.checked);
    });
    demoGauge.animationSpeed = opts.animationSpeed;
    opts.generateGradient = true;
    console.log(opts);
    demoGauge.setOptions(opts);
    demoGauge.ctx.clearRect(0, 0, demoGauge.ctx.canvas.width, demoGauge.ctx.canvas.height);
    demoGauge.render();
    if ($('#share').is(':checked')) {
      window.location.replace('#?' + $('form').serialize());
    }

  }
  function initGauge(){
    document.getElementById("class-code-name").innerHTML = "Gauge";
    demoGauge = new Gauge(document.getElementById("canvas-preview"));
    demoGauge.setTextField(document.getElementById("preview-textfield"));
    demoGauge.maxValue = 3000;
    demoGauge.set(1244);
  };
  function initDonut(){
    document.getElementById("class-code-name").innerHTML = "Donut";
    demoGauge = new Donut(document.getElementById("canvas-preview"));
    demoGauge.setTextField(document.getElementById("preview-textfield"));
    demoGauge.maxValue = 3000;
    demoGauge.set(1244);
  };
  function initZones(){
    document.getElementById("class-code-name").innerHTML = "Gauge";
    demoGauge = new Gauge(document.getElementById("canvas-preview"));
    var opts = {
      angle: -0.25,
      lineWidth: 0.2,
      radiusScale:0.9,
      pointer: {
        length: 0.6,
        strokeWidth: 0.05,
        color: '#000000'
      },
      staticLabels: {
        font: "10px sans-serif",
        labels: [200, 500, 2100, 2800],
        fractionDigits: 0
      },
      staticZones: [
         {strokeStyle: "#F03E3E", min: 0, max: 200},
         {strokeStyle: "#FFDD00", min: 200, max: 500},
         {strokeStyle: "#30B32D", min: 500, max: 2100},
         {strokeStyle: "#FFDD00", min: 2100, max: 2800},
         {strokeStyle: "#F03E3E", min: 2800, max: 3000}
      ],
      limitMax: false,
      limitMin: false,
      highDpiSupport: true
    };
    demoGauge.setOptions(opts);
    demoGauge.setTextField(document.getElementById("preview-textfield"));
    demoGauge.minValue = 0;
    demoGauge.maxValue = 3000;
    demoGauge.set(1244);
  };
  function initNew(){
    document.getElementById("class-code-name").innerHTML = "Gauge";
    demoGauge = new Gauge(document.getElementById("canvas-preview"));
    var bigFont = "14px sans-serif";
    var opts = {
      angle: 0.1,
      radiusScale:0.9,
      lineWidth: 0.2,
      pointer: {
        length: 0.6,
        strokeWidth: 0.05,
        color: '#000000'
      },
      staticLabels: {
        font: "10px sans-serif",
        labels: [{label:200, font: bigFont}, 
        {label:750}, 
        {label:1500}, 
        {label:2250}, 
        {label:3000}, 
        {label:3500, font: bigFont}],
        fractionDigits: 0
      },
      staticZones: [
        {strokeStyle: "rgb(255,0,0)", min: 0, max: 500, height: 1.2},
        {strokeStyle: "rgb(200,100,0)", min: 500, max: 1000, height: 1.1},
        {strokeStyle: "rgb(150,150,0)", min: 1000, max: 1500, height: 1},
        {strokeStyle: "rgb(100,200,0)", min: 1500, max: 2000, height: 0.9},
        {strokeStyle: "rgb(0,255,0)", min: 2000, max: 3100, height: 0.8},
        {strokeStyle: "rgb(80,255,80)", min: 3100, max: 3500, height: 0.7},
        {strokeStyle: "rgb(130,130,130)", min: 2470, max: 2530, height: 1}        
      ],
      limitMax: false,
      limitMin: false,
      highDpiSupport: true
    };
    demoGauge.setOptions(opts);
    document.getElementById("preview-textfield").className = "preview-textfield"; 
    demoGauge.setTextField(document.getElementById("preview-textfield"));
    demoGauge.minValue = 0;
    demoGauge.maxValue = 3500;
    demoGauge.set(2122);
  };
  $(function() {
    var params = {};
    var hash = /^#\?(.*)/.exec(location.hash);
    if (hash) {
      $('#share').prop('checked', true);
      $.each(hash[1].split(/&/), function(i, pair) {
        var kv = pair.split(/=/);
        params[kv[0]] = kv[kv.length-1];
      });
    }
    $('.opts input[min], #opts .color').each(function() {
      var val = params[this.name];
      if (val !== undefined) this.value = val;
      this.onchange = update;
    });
    $('.opts input[name=currval]').mouseup(function(){
    	AnimationUpdater.run();
    });

    $('.opts input:checkbox').each(function() {
      this.checked = !!params[this.name];
      this.onclick = update;
    });
    $('#share').click(function() {
      window.location.replace(this.checked ? '#?' + $('form').serialize() : '#!');
    });

    $("#type-select li").click(function(){
    	$("#type-select li").removeClass("active")
    	$(this).addClass("active");
    	var type = $(this).attr("type");
    	if(type=="donut") {
          initDonut();
          $("input[name=lineWidth]").val(10);
          $("input[name=fontSize]").val(24);
          $("input[name=angle]").val(35);
          $("#preview-textfield").removeClass("reset");
          $("input[name=colorStart]").val("6F6EA0")[0].color.importColor();
          $("input[name=colorStop]").val("C0C0DB")[0].color.importColor();
          $("input[name=strokeColor]").val("EEEEEE")[0].color.importColor();

          fdSlider.disable('input-ptr-len');
          fdSlider.disable('input-ptr-stroke');
          $("#input-ptr-color").prop('disabled', true);

          selectGaguge1.set(1);
          selectGaguge2.set(3000);
          selectGauge3.set(1);
          selectGauge4.set(1);
          
        } else if (type=="zones") {
          initZones();
          fdSlider.disable('input-ptr-len');
          fdSlider.disable('input-ptr-stroke');
          $("#preview-textfield").removeClass("reset").addClass("reset");
          $("input[name=angle]").val(-20);
          $("input[name=lineWidth]").val(20);

          fdSlider.enable('input-ptr-len');
          fdSlider.enable('input-ptr-stroke');
          $("input[name=colorStart]").prop('disabled', true);
          $("input[name=colorStop]").prop('disabled', true);
          $("input[name=strokeColor]").prop('disabled', true);

          $("input[name=colorStop]").prop('disabled', true);
          $("input[name=strokeColor]").prop('disabled', true);

          selectGaguge1.set(1);
          selectGaguge2.set(1);
          selectGauge3.set(3000);
          selectGauge4.set(1);
          
      } else if (type=="new") {
        initNew();
        $("input[name=lineWidth]").val(30);
    		$("input[name=fontSize]").val(41);
        $("input[name=angle]").val(10);
        $("#preview-textfield").removeClass("reset").addClass("reset");
        selectGaguge1.set(1);
        selectGaguge2.set(1);
        selectGauge3.set(1);
        selectGauge4.set(2213);
      } else{
    		initGauge();
    		$("input[name=lineWidth]").val(44);
    		$("input[name=fontSize]").val(41);
        $("input[name=angle]").val(15);
        $("#preview-textfield").removeClass("reset").addClass("reset");
        

    		$("input[name=colorStart]").val("6FADCF")[0].color.importColor();
    		$("input[name=colorStop]").val("8FC0DA")[0].color.importColor();
    		$("input[name=strokeColor]").val("E0E0E0")[0].color.importColor();

    		fdSlider.enable('input-ptr-len');
    		fdSlider.enable('input-ptr-stroke');
            $("#input-ptr-color").prop('disabled', false);
            selectGaguge1.set(3000);
            selectGaguge2.set(1) ;
            selectGauge3.set(1);
            selectGauge4.set(1);
    	}
    	//fdSlider.updateSlider('input-line-width');
    	fdSlider.updateSlider('input-font-size');
    	fdSlider.updateSlider('input-angle');
    	$("#example").removeClass("donut, gauge").addClass(type);
    	update();
    });

    selectGaguge1 = new Gauge(document.getElementById("select-1"));
    selectGaguge1.maxValue = 3000;
    selectGaguge1.set(1552);

    selectGauge4 = new Gauge(document.getElementById("select-4"));
    var opts2 = {
      angle: 0.1,
      lineWidth: 0.2,
      pointer: {
        length: 0.5,
        strokeWidth: 0.05,
        color: '#000000'
      },
      staticZones: [
         {strokeStyle: "#F03E3E", min: 0, max: 500, height: 2},
         {strokeStyle: "#FFDD00", min: 500, max: 1000, height: 1.5},
         {strokeStyle: "#30B32D", min: 1000, max: 1500, height: 1},
         {strokeStyle: "#FFDD00", min: 1500, max: 2000, height: 0.7},
         {strokeStyle: "#F03E3E", min: 2000, max: 3000, height: 0.3}
      ],
      limitMax: false,
      limitMin: false,
      highDpiSupport: true
    };
    selectGauge4.minValue = 0;
    selectGauge4.maxValue = 3000;
    selectGauge4.setOptions(opts2);
    selectGauge4.set(2122);

    selectGaguge2 = new Donut(document.getElementById("select-2"));
    selectGaguge2.maxValue = 3000;
    selectGaguge2.set(1844);

    selectGauge3 = new Gauge(document.getElementById("select-3"));
    var opts = {
      angle: -0.25,
      lineWidth: 0.2,
      pointer: {
        length: 0.6,
        strokeWidth: 0.05,
        color: '#000000'
      },
      staticZones: [
         {strokeStyle: "#F03E3E", min: 0, max: 200},
         {strokeStyle: "#FFDD00", min: 200, max: 500},
         {strokeStyle: "#30B32D", min: 500, max: 2100},
         {strokeStyle: "#FFDD00", min: 2100, max: 2800},
         {strokeStyle: "#F03E3E", min: 2800, max: 3000}
      ],
      limitMax: false,
      limitMin: false,
      strokeColor: '#E0E0E0',
      highDpiSupport: true
    };
    selectGauge3.minValue = 0;
    selectGauge3.maxValue = 3000;
    selectGauge3.setOptions(opts);
    selectGauge3.set(1607);

    initGauge();
    update();

  });
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11790841-11']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
