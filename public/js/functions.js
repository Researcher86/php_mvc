/**
 * Функция переключения языков
 * @param {this} lang - Ссылка на поле ввода переключения языков
 */
function langCanche(lang) {
    document.cookie = "lang=" + lang.value + ";path=/";
    window.location.reload(window.location.href);
}


