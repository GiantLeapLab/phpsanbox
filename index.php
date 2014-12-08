<?php 
error_reporting(E_ALL);
ini_set('display_errors','On');
	if (isset($_POST['code'])) {
		$_POST['code'] = str_replace("<?php", '', $_POST['code']);
		$f = fopen("codecache.code", 'w');
		fwrite($f, $_POST['code']);
		fclose($f);
	} else {
		$f = fopen("codecache.code", 'r');
		$code = fread($f, filesize("codecache.code"));
		// $_POST['code'] = $code;
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />

  <link rel="stylesheet" href="codemirror/lib/codemirror.css">
  <link rel="stylesheet" href="codemirror/theme/eclipse.css">
  
  <script src="codemirror/lib/codemirror.js"></script>
  <script src="codemirror/mode/php/php.js"></script>
  <script src="codemirror/addon/edit/matchbrackets.js"></script>
  <script src="codemirror/mode/htmlmixed/htmlmixed.js"></script>
  <script src="codemirror/mode/php/php.js"></script>
  <script src="codemirror/mode/xml/xml.js"></script>
  <script src="codemirror/mode/javascript/javascript.js"></script>
  <script src="codemirror/mode/css/css.js"></script>
  <script src="codemirror/mode/clike/clike.js"></script>

  <style>

  .code-input {
    width:40%;
    border: none;
    height: auto;
  }

  .CodeMirror {
    position:fixed;
    top:18px;
    bottom:0px;
    left: 0;
    width:40%;
    height: auto;
    border-top: 1px #66c solid;
  }

  .output_container {
    position:fixed;
    top:18px;
    bottom:0px;
    right:0;
    left:40%;
    padding-left: 2px;
    padding-top: 2px;
    overflow:auto;
    font-family:'courier new';
    border-top: 1px #66c solid;
    border-left: 2px #66c solid;
  }

  .output_result {
    position:relative;
    margin: 0px 0 0 0px;
  }

  .info {
      background-color: lavender;
      color: #05a;
  }

  .highlight 
      font-style: italic;
      font-weight: bold;
      color: blue;
  }

  </style>

</head>

<body style="margin:0;padding:0;">
    <div class="info">Press <span class='highlight'>Ctrl+Enter</span> for evaluate</div>

<div class='input_container'>
<form method="post" name='myeditor'>
  <textarea name="code" class="code-input" id='code-input'><?php echo ( isset($_POST['code']) ? str_replace('&','&amp;',$_POST['code']) : str_replace('&','&amp;',$code) ); ?></textarea>
</form>
</div>

<script>
      CodeMirror.commands.dosubmit = function() {
        editor.save();
        document.myeditor.submit();
      }

      var editor = CodeMirror.fromTextArea(document.getElementById("code-input"), {
        mode : 'text/x-php',
        matchBrackets: true,
        lineNumbers : true, 
        indentUnit : 4, 
        tabSize : 4, 
        electricChars : true,
        smartIndent: true,
        indentWithTabs:false,
        autofocus: true,
        theme : 'default',
        extraKeys: {"Ctrl-Enter": "dosubmit"}
      });
    </script>
<div class="output_container">
    <pre class="output_result"><?php if (isset($_POST['code'])) { eval($_POST['code']);} ?></pre>
</div>



</body>
</html>