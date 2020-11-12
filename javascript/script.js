// Открытие (на весь экран) и закрытие формы обратной связи с помощью класса .booking--active
document.getElementById('id-booking-open-btn').addEventListener('click', showHideOrderForm);
document.getElementById('id-booking-close-btn').addEventListener('click', showHideOrderForm);

// Навешиваем обрабочик на каждую кнопку "Выбрать" в разделе Стоимость услуг
let priceCardBtnArray = [...document.querySelectorAll('.price-card__btn')];
priceCardBtnArray.forEach(item => {
    item.addEventListener('click', showHideOrderForm);
});


function showHideOrderForm() {
    document.getElementById('id-booking').classList.toggle('booking--active');
}




// Открытие (на весь экран) и закрытие меню <nav class="navigation"> с помощью класса .navigation--active и .menu-btn__icon--active
document.getElementById('id-menu-btn').addEventListener('click', showHideNavigation);

function showHideNavigation() {
    document.getElementById('id-navigation').classList.toggle('navigation--active');
    document.getElementById('id-menu-btn__icon').classList.toggle('menu-btn__icon--active');
}



// Навешиваем на каждый пункт меню .navigation обработчик, который скрывает меню navigation при клике на пункт меню
function hideNavigation() {
    document.getElementById('id-navigation').classList.remove('navigation--active');
    document.getElementById('id-menu-btn__icon').classList.remove('menu-btn__icon--active');
}

let navItemsArray = [...document.querySelectorAll('.navigation__item')];
navItemsArray.forEach(item => {
    item.addEventListener('click', hideNavigation);
});