<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "7160822357:AAGxqBhDmPxAwE6Xy2cqWF7GjinS5wYl0sM";

//Сюда вставляем chat_id
$chat_id = "-4192653041";

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $phone = ($_POST['phone']);
    $form = ($_POST['form']);

//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Форма:' => $form,
        'Телефон:' => $phone,
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "".$key." ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Выводим сообщение об успешной отправке
    if ($sendToTelegram) {
        alert('Все ок погнали');
    }

//А здесь сообщение об ошибке при отправке
    else {
        alert('Что-то пошло не так. ПОпробуйте отправить форму ещё раз.');
    }
}

?>