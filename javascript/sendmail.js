////////////////////////////////////////////////////////
/////// Отправка формы с помощью ajax-запросов
////////////////////////////////////////////////////////

$(document).ready(function() {

  $("#id-booking-form__btn").on("click", function() {
    let name = $("#id-booking-form__name").val(); // Получаем имя через ID соответствующего поля
    let tel = $("#id-booking-form__tel").val(); // Получаем e-mail через ID соответствующего поля
    let email = $("#id-booking-form__email").val(); // Получаем сообщение через ID соответствующего поля
    let typeOfWork = $("input[name=typeOfWork]:checked").val(); // Получаем сообщение через ID соответствующего поля
    let control = $("#id-control-field").val(); // Получаем содеримое контрольного поля
      
    $.ajax({
      
      url: "/php/sendmail.php", // Куда отправляем данные (обработчик)
      type: "post",
  
      data: {
        "name": name,
        "tel": tel,
        "email": email,
        "typeOfWork": typeOfWork,
        "control": control
      },
  
      success: function(data) {
        
        $("#id-booking-form__result").html(data); // Выводим результат
      }
        
    });
      
  });
    
});