<!doctype html>
<html>
<head>
  <meta charset='utf-8'>
  <title>Handsontable - jQuery grid editor. Excel-like grid editing with HTML &amp; JavaScript</title>

  <!--
  Loading Handsontable (full distribution that includes all dependencies apart from jQuery)
  -->
  <script src="lib/jquery.min.js"></script>
  <script src="https://www.jqueryscript.net/demo/Excel-like-Data-Grid-Editor-For-jQuery-handsontable/dist/jquery.handsontable.full.js"></script>
  <link rel="stylesheet" media="screen" href="https://www.jqueryscript.net/demo/Excel-like-Data-Grid-Editor-For-jQuery-handsontable/dist/jquery.handsontable.full.css">

  <!--
  Loading demo dependencies. They are used here only to enhance the examples on this page
  -->
  <link rel="stylesheet" media="screen" href="https://www.jqueryscript.net/demo/Excel-like-Data-Grid-Editor-For-jQuery-handsontable/demo/css/samples.css">

  <!--
  Facebook open graph. Don't copy this to your project :)
  -->
  <meta property="og:title" content="Handsontable - jQuery grid editor">
  <meta property="og:description" content="Excel-like data grid with HTML &amp; JavaScript">
  <meta property="og:url" content="http://handsontable.com/">
  <meta property="og:image" content="http://handsontable.com/demo/image/og-image.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="409">
  <meta property="og:image:height" content="164">
  <link rel="canonical" href="https://handsontable.com/">

  <!--
  Google Analytics for GitHub Page. Don't copy this to your project :)
  -->
  <link href="https://www.jqueryscript.net/css/top.css" rel="stylesheet" type="text/css">
</head>

<body class="home">
<div id="menu">
<div class="w">
<a href="https://www.jqueryscript.net/table/Excel-like-Data-Grid-Editor-For-jQuery-handsontable.html">Download</a> - <a href="https://www.jqueryscript.net/">Back To jQueryScript.Net</a></div>
</div>
<div id="container" style="margin-top:100px;">

  <div class="centerLayout">
    <h1>
    <a href="index.html">Handsontable <span class="ver small"></span></a></h1>

    <div class="tagline">a minimalistic Excel-like <span class="nobreak">data grid</span> editor
      for HTML, JavaScript &amp; jQuery
    </div>

    <div class="warning" id="domainNotice">
      This page has been moved to
      <a href="http://handsontable.com/">http://handsontable.com/</a>. Please update your bookmarks.
    </div>

   

    <div id="example"></div>

    <script>
      var data = [
        ["", "Maserati", "Mazda", "Mercedes", "Mini", "Mitsubishi"],
        ["2009", 0, 2941, 4303, 354, 5814],
        ["2010", 5, 2905, 2867, 412, 5284],
        ["2011", 4, 2517, 4822, 552, 6127],
        ["2012", 2, 2422, 5399, 776, 4151]
      ];

      $('#example').handsontable({
        data: data,
        minRows: 5,
        minCols: 6,
        minSpareRows: 1,
        autoWrapRow: true,
        colHeaders: true,
        contextMenu: true
      });

      $('.ver').html($('#example').data('handsontable').version);
    </script>

    <h2>Examples and how-to's</h2>

    <div class="linkColumn first">
      <h3>Appearance</h3>
      <ul>
        <li>
          <a href="demo/renderers.html">Cell renderers</a>
        </li>
        <li>
          <a href="demo/renderers_html.html">Custom HTML</a>
        </li>
        <li>
          <a href="demo/scroll.html">Scroll bars / Column stretch</a>
        </li>
        <li>
          <a href="demo/conditional.html">Conditional formatting</a>
        </li>
        <li>
          <a href="demo/prepopulate.html">Pre-populate new rows</a>
        </li>
        <li>
          <a href="demo/current.html">Highlight current row &amp; column</a>
        </li>
        <li>
          <a href="demo/sorting.html">Column sorting</a>
        </li>
        <li>
          <a href="demo/column_resize.html">Manual column resize &amp; move</a>
        </li>
      </ul>
    </div>

    <div class="linkColumn">
      <h3>Editing</h3>
      <ul>
        <li>
          <a href="demo/autocomplete.html">Autocomplete</a>
        </li>
        <li>
          <a href="demo/validation.html">Validation</a>
        </li>
        <li>
          <a href="demo/dragdown.html">Drag-down</a>
        </li>
        <li>
          <a href="demo/buttons.html">Custom buttons</a>
        </li>
        <li>
          <a href="demo/contextmenu.html">Context menu</a>
        </li>
        <li>
          <a href="demo/readonly.html">Read-only cells</a>
        </li>
      </ul>
    </div>

    <div class="linkColumn">
      <h3>Integration</h3>
      <ul>
        <li>
          <a href="demo/understanding_reference.html">Understanding binding as reference</a>
        </li>
        <li>
          <a href="demo/datasources.html">Array and object data sources</a>
        </li>
        <li>
          <a href="demo/ajax.html">Load &amp; Save (Ajax)</a>
        </li>
      </ul>
    </div>

    <div class="linkColumn">
      <h3>GitHub</h3>
      <ul>
        <li>
          <a href="https://github.com/warpech/jquery-handsontable">API reference, Source</a>
        </li>
        <li>
          <a href="https://github.com/warpech/jquery-handsontable/wiki/Changelog">Changelog</a>
        </li>
        <li>
          <a href="https://github.com/warpech/jquery-handsontable/issues">Issues</a>
        </li>
      </ul>
    </div>

    <div class="clear"></div>

    <h2>Authors</h2>

    <p>
      Marcin Warpechowski / <a href="http://www.nextgen.pl/">Nextgen.pl</a>
    </p>
  </div>

</div>

</body>
</html>