$(document).on('keyup', '.result_password', function() {
    var $select = $(this);
    var text = $select.val();
    if(text.length > 10){
        $select.css({'box-shadow': '0 0 0 0.2rem rgba(0,255,0,.25)'});
    }else{
        $select.css({'box-shadow':'0 0 0 0.2rem rgba(0,123,255,.25)'});
    }
    if(text.length > 20){
        $select.val(text.substring(0, text.length - 1))
    }

});

$(document).on('click', '.result_btn', function() {

    checkPassword();

});

function checkPassword() {
    var password = document.getElementById('result_password').value; // Получаем пароль из формы
    console.log(password);
    var s_letters = "qwertyuiopasdfghjklzxcvbnm"; // Буквы в нижнем регистре
    var b_letters = "QWERTYUIOPLKJHGFDSAZXCVBNM"; // Буквы в верхнем регистре
    var digits = "0123456789"; // Цифры
    var specials = "!@#$%^&*()_-+=\|/.,:;[]{}"; // Спецсимволы
    var is_s = false; // Есть ли в пароле буквы в нижнем регистре
    var is_b = false; // Есть ли в пароле буквы в верхнем регистре
    var is_d = false; // Есть ли в пароле цифры
    var is_sp = false; // Есть ли в пароле спецсимволы
    for (var i = 0; i < password.length; i++) {
        /* Проверяем каждый символ пароля на принадлежность к тому или иному типу */
        if (!is_s && s_letters.indexOf(password[i]) != -1) is_s = true;
        else if (!is_b && b_letters.indexOf(password[i]) != -1) is_b = true;
        else if (!is_d && digits.indexOf(password[i]) != -1) is_d = true;
        else if (!is_sp && specials.indexOf(password[i]) != -1) is_sp = true;
    }
    var rating = 0;
    var text = "";
    if (is_s) rating++; // Если в пароле есть символы в нижнем регистре, то увеличиваем рейтинг сложности
    if (is_b) rating++; // Если в пароле есть символы в верхнем регистре, то увеличиваем рейтинг сложности
    if (is_d) rating++; // Если в пароле есть цифры, то увеличиваем рейтинг сложности
    if (is_sp) rating++; // Если в пароле есть спецсимволы, то увеличиваем рейтинг сложности
    /* Далее идёт анализ длины пароля и полученного рейтинга, и на основании этого готовится текстовое описание сложности пароля */

    if (password.length < 10 && rating < 3) text = "Простой";
    else if (password.length < 10 && rating >= 3) text = "Средний";
    else if (password.length >= 15 && rating < 3) text = "Средний";
    else if (password.length >= 15 && rating >= 3) text = "Сложный";
    else if (password.length >= 10 && rating == 1) text = "Простой";
    else if (password.length >= 10 && rating > 1 && rating < 4) text = "Средний";
    else if (password.length >= 10 && rating == 4) text = "Сложный";
    var result_rating = 0;
    if (password.length < 10 && rating < 3) result_rating = 30;
    else if (password.length < 10 && rating >= 3) result_rating = 60;
    else if (password.length >= 15 && rating < 3) result_rating = 60;
    else if (password.length >= 15 && rating >= 3) result_rating = 100;
    else if (password.length >= 10 && rating == 1) result_rating = 30;
    else if (password.length >= 10 && rating > 1 && rating < 4) result_rating = 60;
    else if (password.length >= 10 && rating == 4) result_rating = 100;
    text = 'Ваш пароль соответствует уровню : "' + text + '". ';

    if(result_rating == 30){text = text + '\n НЕ стоит использовать пароли такого типаю'}
    if(result_rating == 60){text = text + '\n Такой пароль имеет более сильную устойчивость к взлому, но не является совершенством.'}
    if(result_rating == 100){text = text + '\n Такой пароль можно использовать без боязни, что хакер смогут взломать его перебором'}
    $.ajax({
        url: "<?= Yii::app()->createAbsoluteUrl('site/saveResult'); ?>",
        type: 'post',
        dataType: 'json',
        data: {progress: result_rating, level: 1},
        success : function(responce) {
            if (responce.success) {

            }
        }
    });

    alert(text);
}
