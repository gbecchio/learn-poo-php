<html>
<head>
    <title>Hello Ext</title>

    <link rel="stylesheet" type="text/css" href="ext/resources/css/ext-all.css">
    <script type="text/javascript" src="ext/ext-all-debug.js"></script>
    <!-- script type="text/javascript" src="app.js"></script -->
    <script type="text/javascript" src="hello_world2.js"></script>
</head>
<body>
  <div id='div1' class="myDiv">
    <div id='child1'>Child 1</div>
    <div class='child2'>Child 2</div>
    <div class='child3'>Child 3</div>
    <div id='child4' class='sameClass'>
      <span class="spanipez">AZERTY</span>
      <div id="nestedChild1" class='sameClass'>Nest Child 1</div>
    </div>
  <div>Child 5</div>
</div>
<div>
  Hello there! This is an HTML fragment.
<script type="text/javascript">
  Ext.getBody().highlight();
</script>
</div>
<span id='deux' name="deux">
  ici
</span>
</body>
</html>