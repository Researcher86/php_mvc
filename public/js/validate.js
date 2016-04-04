/**
 * Проверка валидности e-mail адреса
 * @param {string} emailAddress
 * @returns {Boolean}
 */
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

/**
 * Проверка на число
 * @param {int} number
 * @returns {Boolean}
 */
function isValidNumber(number) {
    return number >= 48 && number <= 57;
}

/**
 * Функция проверки валидности даты
 * @param {int} day - день
 * @param {int} month - месяц
 * @param {int} year - год
 * @returns {Boolean}
 */
function isValidDate(day, month, year) {
    // В JS месяцы считаются с 0 до 11
    var myDate = new Date(year, month - 1, day);
    return myDate.getDate() == day && myDate.getMonth() + 1 == month && myDate.getFullYear() == year;
}

/**
 * Функция проверки расширения файла изображения
 * @param {string} fileName - Файл
 * @returns {Boolean}
 */
function isValidImage(fileName) {
    var extension = fileName.substr(fileName.lastIndexOf('.') + 1).toLowerCase();
    var allowedExtensions = ['gif', 'jpg', 'png'];

    if (!allowedExtensions.indexOf) {
        allowedExtensions.indexOf = function (obj, start) {
            for (var i = (start || 0), j = this.length; i < j; i++) {
                if (this[i] === obj) {
                    return i;
                }
            }
            return -1;
        }
    }

    return fileName.length > 0 && allowedExtensions.indexOf(extension) !== -1;
}