<?php

header("Content-Type: text/html; charset=utf-8");

// Проверяем, идет ли к нас запрос и является ли он запросом ajax
// isset() - определяет, установлена ли переменная. Возвращает TRUE, если var существует; иначе FALSE.
// HTTP_X_REQUESTED_WITH - это сам запрос. empty() проверяет, не пустой ли он
// Сам Ajax запрос = запросу xmlhttprequest
	
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) === "xmlhttprequest") {

	// Проверяем, заполнены ли поля. Если нет, то выходим. die() - это псевдоним функции exit()
	if(!isset($_POST["name"]) || !isset($_POST["tel"]) || !isset($_POST["email"])) {
		
		die();

	}
		//Описываем фукнцию отправки сообщения
		function send_form($message) {
	
			$mail_to = "info@kx7.ru"; // Адрес, куда отправляем письма
			$subject = "Письмо с сайта kx7.ru"; // Тема письма
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=utf-8\r\n";
			$headers .= "From: Система уведомлений <no-reply@".$_SERVER['HTTP_HOST'].">\r\n";

			mail($mail_to, $subject, $message, $headers);
		
		}

		$name = strip_tags($_POST["name"]); // Имя
		$tel = strip_tags($_POST["tel"]); // Телефон
		$email = strip_tags($_POST["email"]); // Дата
		$typeofwork = strip_tags($_POST["typeOfWork"]); // Дата
		$control = strip_tags($_POST["control"]); // Содержимое контрольного поля (должно быть пустым)

		if($name == "") { // Если Имя не заполнено
			echo "Поле «Имя» не заполнено";
			die();
		}

		// Текст сообещния, которое будет приходить на почту

		$message = <<<HTML
			
			Вам пришло сообщение с сайта https://kx7.ru<br>
			Информация о бронировании<br><br>
			<b>Имя отправителя</b>: {$name}<br><br>
			<b>Телефон</b>: {$tel}<br><br>
			<b>Email</b>: {$email}<br><br>
			<b>Вид работ</b>: {$typeofwork}

HTML;
// ВАЖНО! Перед HTML; не должно быть пробелов или знаков табуляции! После HTML; не должно быть ничего, даже комментариев. Иначе не будет работать!

		// Если поле control пустое, тогда отправляем сообщение
		if ($control == "") {
			send_form($message); // Если ранее описанных ошибок нет - отправляем сообщение
		
			echo "Сообщение успешно отправлено!";
		}

	} else {
		die();
	}
?>