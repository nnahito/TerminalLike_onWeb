# はじめに
ターミナルっぽいデザインをWeb上に表示するだけのもの。  
一応、入力もできます。  
![画像](https://raw.githubusercontent.com/nnahito/TerminalLike_onWeb/master/images/pic01.png)


# データ
- index.php
- css
のみ。（GitHub初心者なのでコミットの仕方が下手なのは許して）


# 必須プラグイン・フレームワーク
- jQuery


# 入力取得部分
69行目付近からのJavaScriptです。  
jQueryを利用。
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
