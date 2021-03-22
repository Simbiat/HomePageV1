<?php
$pagecode = str_replace("\t", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", highlight_file(__FILE__, true));
echo "<head><title>Test For Inetcom</title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
<script src=\"../js/jquery-2.1.1.min.js\"></script>
<script>
	function IPcheck(){
		var re = /^(10\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])|172\.16|192\.168)\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/; 
		var re2 = /^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/;
		var ip = document.getElementById('ipcheck').value.trim();
		var m;
		if (ip !== null && ip.trim !== \"\") {
			if ((m = re.exec(ip)) !== null) {
				document.getElementById('ipresult').style.color=\"lightgreen\";
				document.getElementById('ipresult').innerHTML = m[0] + ' is a proper IP!';
				ping(ip);
			} else {
				if ((m = re2.exec(ip)) !== null) {
					document.getElementById('ipresult').style.color=\"orange\";
					document.getElementById('ipresult').innerHTML = 'IP is valid, but not from private network pool!';
				} else {
					document.getElementById('ipresult').style.color=\"red\";
					document.getElementById('ipresult').innerHTML = 'Not an IP!';
				}
			}
		} else {
			document.getElementById('ipresult').style.color=\"red\";
			document.getElementById('ipresult').innerHTML = 'Empty string was provided!';
		}
	}
	function ping(ip) {
		if (!this.inUse) {
			this.status = 'unchecked';
			this.inUse = true;
			this.ip = ip;
			var _that = this;
			this.img = new Image();
			this.img.onload = function () {
				_that.inUse = false;
				document.getElementById('ipresult').innerHTML = document.getElementById('ipresult').innerHTML + ' And it even responded to ping!';
	
			};
			this.img.onerror = function (e) {
			if (_that.inUse) {
				_that.inUse = false;
				document.getElementById('ipresult').innerHTML = document.getElementById('ipresult').innerHTML + ' And it even responded to ping!';
			}
		};
	        this.start = new Date().getTime();
	        this.img.src = \"http://\" + ip;
	        this.timer = setTimeout(function () {
				if (_that.inUse) {
					_that.inUse = false;
				}
			}, 1500);
		}
	}
</script>
</head>";
header('Content-Type: text/html; charset=UTF-8');
echo "<div id=1st style=\"border: 2px solid black\"><b>Решение задачи 1:</b> <i>\"Написать регулярное выражение пулов частных ip-адресов на JavaScript\"</i><br><br>
	Я не знаток JavaScript, но загуглил диапазоны частных адресов, загуглил ReGex для \"валидации\" IP, немного модифицировал найденное выражение,<br> подстраивая под задачу
	(тестировал через <a href=\"http://regex101.com\" target=\"_blank\">ReGex101</a>) и потом сделал эту страничку для проверки кода (=<br><br>

<input placeholder=\"192.168.1.1\" id=ipcheck name=ipcheck onkeydown=\"if (event.keyCode == 13) IPcheck()\">
<button onclick=\"IPcheck()\">Check IP</button>
<span id=ipresult name=ipresult style=\"font-weight:bold\"></span></div><br>
<div id=2nd style=\"border: 2px solid black\"><b>Решение задачи 2:</b> <i>\"jQuery, в чем разница между $('#abc').attr('id'); $('#abc').get(0).id; $('#abc')[0].id; $('#abc').prop('id')\"</i><br><br>
Я не знаток jQuery, хоть и использовал его, но Гугл и метод тыка и здесь помогают (=<br>
Введём элемент div с id abc и будем эксперементировать:<br>
<div style=\"display: inline-block;border:1px dashed black\"><div id=abc>Test div in here, if you can believe that</div></div><br>
<button onclick=\"(function(){ document.getElementById('result1').innerHTML = $('#abc').attr('id'); })(event)\">$('#abc').attr('id')</button>
<button onclick=\"(function(){ document.getElementById('result1').innerHTML = $('#abc').get(0).id; })(event)\">$('#abc').get(0).id</button>
<button onclick=\"(function(){ document.getElementById('result1').innerHTML = $('#abc')[0].id) })(event)\">$('#abc')[0].id</button>
<button onclick=\"(function(){ document.getElementById('result1').innerHTML = $('#abc').prop('id'); })(event)\">$('#abc').prop('id')</button>
<span id=result1><i>Click buttons to see result!</i></span>
<br>
Они все выдают одно и тоже. В чём подвох?<br>
Документация говорит о первом следующее: <i>Get the value of an attribute for the first element in the set of matched elements</I>.<br>
О втором: <i>Retrieve one of the elements matched by the jQuery object</i>.<br>
Третий способ находится на той же странице документации и делает тоже самое.<br>
Про четвёртый пишется тоже самое, что и про первый способ.<br>
Дьявол в деталях, которые мы не увидим на примере ID. Потому что ID меняется довольно редко, а впример вобще статичен.<br><br>
$('#abc').get(0).id отличается от $('#abc')[0].id, по сути, лишь тем, что get() позволяет использовать негативные значения. А так оба варианта создают массив из элементов с ID равным abc<br>
ИМХО, оба способа лучше использовать при наличии элемементов с одинаковым классом или просто набором одинаковых элементов (100500 div, например), а не с ID.<br><br>
Разница между $('#abc').attr('id') и $('#abc').prop('id') более тонкая, так как они, по сути, общаются с разными сущностями:<br>
attr обращается с <i>атрибутам</i> объектов DOM, тогда как prop общается со <i>свойствами</i> объектов jQuery. Некоторые атрибуты и свойства перекликаются (как ID), но вот, например style вернут разные объекты.<br><br>
Ради интереса, создадим ещё один тестовый див, но с другим ID и со стилем:<br>
<div style=\"display: inline-block;border:1px dashed black\"><div id=abc2 style=\"color:violet\">2nd test div in here, if you can believe that</div></div><br>
<div id=result2><i>Click buttons to see result!</i></div>
<button onclick=\"(function(){ document.getElementById('result2').innerHTML = $('#abc2').attr('style'); })(event)\">$('#abc2').attr('style')</button><br>
Возвращает наш стиль.<br>
<button onclick=\"(function(){ document.getElementById('result2').innerHTML = $('#abc2').prop('style'); })(event)\">$('#abc2').prop('style')</button><button onclick=\"(function(){ document.getElementById('result2').innerHTML = $('#abc2').prop('style').cssText; })(event)\">$('#abc2').prop('style').cssText</button><br>
Возвращает CSSStyleDeclaration, что является уже свойством объекта JS, и имеется всегда (ну или почти всегда), но без деталей. А при нажатии на вторую кнопку мы увидем пустоту текст нашего стиля, но в формате отличном от .attr('style').<br>
<button onclick=\"(function(){ document.getElementById('result2').innerHTML = ''; document.getElementById('result2').innerHTML = $('div').get(-4).innerHTML; })(event)\">$('div').get(-4).innerHTML</button><button onclick=\"(function(){ document.getElementById('result2').innerHTML = ''; document.getElementById('result2').innerHTML = $('div')[2].innerHTML; })(event)\">$('div')[2].innerHTML</button><br>
Возвращают текст второго и первого div соответсвенно.</div>
<br>
<div id=footer style=\"border: 2px solid black\">
Понимаю, что знатоки своего дела решили бы эти задачи быстрее и, возможно, элегантней, но у меня была также задача показать, что я могу решить задачу, даже если у меня не хватает знаний (=<br>
Посмотреть некоторые из моих \"работ\" можно <a href=\"..\" target=\"_blank\">здесь</a>.<br>
Скачать резюме <a href=\"resume.docx\" target=\"_blank\">здесь</a>. Или смотреть на <a target=\"_blank\" href=\"http://hh.ru/resume/f5d8e190ff02e025be0039ed1f306a6e614258\">hh.ru</a><br><br>
<b><a href=\"#\" onclick=\"(function(){ if (document.getElementById('pagecode').style.display == 'none') {document.getElementById('pagecode').style.display = 'inline'} else {document.getElementById('pagecode').style.display = 'none'}; })(event)\">Page Code</a></b><br>
<div id=\"pagecode\" style=\"display: none;\"><br>".$pagecode."</div>
</div>
";
?>