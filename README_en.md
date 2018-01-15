# Introduction
It is a "web" terminal where you can input commands.
![画像](https://raw.githubusercontent.com/nnahito/TerminalLike_onWeb/master/images/pic01.png)

# Data
- index.php
- css

Only (Since I am a beginner with Git, I don't know how to make proper commits so please forgive me).

# Mandatory Plug-in - Framework
- jQuery

# Input acquisition part
On the 69th line, I've put some Javascript.
And I use jQuery.

```JavaScript
<script>
	/* キーが押された時に呼びされるJavaScript */
	$(document).keypress( function ( e ) {
		// 13番（Enterキー）が押された時
		if ( e.which == 13 ) {
			// 入力されたコマンドを取得
			var text = $("#code").val();

			 // コマンドを探す
			 sp = text.split(" ");

			 // XSS対策
			 text = text.replace(/</g, "&lt;");
			 text = text.replace(/>/g, "&gt;");
			 text = text.replace(/ /g, "&nbsp;");
			 text = text.replace(/"/g, "&quot;");

			 // ターミナルにコマンドを表示
			 $("#history").append("&nbsp;command$&nbsp;" + text + "<br>");

			 // コマンド入力ボックスを空に
			 $("#code").val("");

			 // 一番下までスクロール
			 $('#history').animate({scrollTop: $('#history')[0].scrollHeight}, 'fast');

		}
	});
	</script>
```