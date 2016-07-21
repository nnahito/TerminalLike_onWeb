<!DOCTYPE html>
<html lang="ja">

<head>
	<!-- このページのタイトル -->
	<title>Terminal Window on WEB</title>

	<!-- メタタグエリア -->
	<meta charset="utf-8">

	<!-- 外部JavaScript読み込み -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<!-- 外部CSS読み込み -->
	<link href="./css/main.css" rel="stylesheet" type="text/css">

</head>


<body>
	<div id="wrapper">

		<!-- ターミナルウインドウ -->
		<div class="terminal">

			<!-- ターミナルタイトルバー -->
			<div class="terminal_title">
				<table width="100%">
					<tr>
						<td style="width: 15%;">
							&nbsp;<span style="color: #DE5855;">●</span>
							&nbsp;<span style="color: #FDC041;">●</span>
							&nbsp;<span style="color: #35CC4B;">●</span>
						</td>
						<td align="center">
							<span style="font-size: 14px;">Terminal</span>
						</td>
					</tr>
				</table>
			</div>

			<div id="history" class="terminal_body">
				&nbsp;Hello World!<br>
			</div>

			<div class="tarminal_input_back">
				<table style="width: 100%;">
					<tr>
						<td width="10%">
							command$&nbsp;
						</td>
						<td>
							<input type="text" id="code" class="terminal_input" placeholder="input command here...">
						</td>
					</tr>
				</table>
			</div>

		</div>


		<!-- 結果などを表示する領域 -->
		<div id="subwindow"></div>

	</div>



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
</body>
</html>
