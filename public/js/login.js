
window.onload = function () {
    var aEmail = document.getElementById('aEmail');
    if (isNaN(aEmail)) {
        aEmail.focus();
    }

    var lastName = document.getElementById('lastName');
    if (isNaN(lastName)) {
        lastName.focus();
    }
};

/**
 * Функция показывает/скрывает подсказку
 * @param {string} id - Указатель на элемент
 * @param {string} display - Показать (""), скрыть ("none")
 */
function elementDisplay(id, display) {
    document.getElementById(id).style.display = display;
}

/**
 * Функция обработки события фокус на поле ввода фамилии.
 * Показываем подсказку (введите данные) и прячем остальные сообщения (данные корректны/некорректны)
 * @param {this} lastName - Ссылка на поле вода фамилии
 */
function lastNameOnFocus(lastName) {
    elementDisplay('lastNameHint', "");
    elementDisplay('lastNameSuccessHint', "none");
    elementDisplay('lastNameErrorHint', "none");
}

/**
 * Функция обработки события потеря фокуса на поле ввода фамилии
 * Если поле ввода не пустое/пустое, то показываем сообщение (данные корректны/некорректны)
 * @param {this} lastName - Ссылка на поле вода фамилии
 */
function lastNameOnBlur(lastName) {
    elementDisplay('lastNameHint', "none");
    if (lastName.value == '') {
        elementDisplay('lastNameErrorHint', "");
    } else {
        elementDisplay('lastNameSuccessHint', "");
    }
}

/**
 * Функция обработки события фокус на поле ввода имени
 * Показываем подсказку (введите данные) и прячем остальные сообщения (данные корректны/некорректны)
 * @param {this} firstName - Ссылка на поле вода имени
 */
function firstNameOnFocus(firstName) {
    elementDisplay('firstNameHint', "");
    elementDisplay('firstNameSuccessHint', "none");
    elementDisplay('firstNameErrorHint', "none");
}

/**
 * Функция обработки события потеря фокуса на поле ввода имени
 * Если поле ввода не пустое/пустое, то показываем сообщение (данные корректны/некорректны)
 * @param {this} firstName - Ссылка на поле вода имени
 */
function firstNameOnBlur(firstName) {
    elementDisplay('firstNameHint', "none");
    if (firstName.value == '') {
        elementDisplay('firstNameErrorHint', "");
    } else {
        elementDisplay('firstNameSuccessHint', "");
    }
}

/**
 * Функция обработки события фокус на поле ввода отчества
 * Показываем подсказку (введите данные) и прячем остальные сообщения (данные корректны/некорректны)
 * @param {this} patronymic - Ссылка на поле вода отчество
 */
function patronymicOnFocus(patronymic) {
    elementDisplay('patronymicHint', "");
    elementDisplay('patronymicSuccessHint', "none");
    elementDisplay('patronymicErrorHint', "none");
}

/**
 * Функция обработки события потеря фокуса на поле ввода отчества
 * Если поле ввода не пустое/пустое, то показываем сообщение (данные корректны/некорректны)
 * @param {this} patronymic - Ссылка на поле вода отчество
 */
function patronymicOnBlur(patronymic) {
    elementDisplay('patronymicHint', "none");
    if (patronymic.value == '') {
        elementDisplay('patronymicErrorHint', "");
    } else {
        elementDisplay('patronymicSuccessHint', "");
    }
}

/**
 * Функция обработки события фокус
 * Один обработчик на поля ввода день рождения (день/месяц/год)
 * Показываем подсказку (введите данные) и прячем остальные сообщения (данные корректны/некорректны)
 * @param {this} yearOfBirth - Ссылка на поле вода (день/месяц/год)
 */
function yearOfBirthOnFocus(yearOfBirth) {
    elementDisplay('yearOfBirthHint', "");
    elementDisplay('yearOfBirthSuccessHint', "none");
    elementDisplay('yearOfBirthErrorHint', "none");
    elementDisplay('yearOfBirthErrorHint2', "none");
}

/**
 * Функция обработки события потеря фокуса
 * Один обработчик на поля ввода день рождения (день/месяц/год)
 * Если поля ввода не пустые/пустые, то показываем сообщение (данные корректны/некорректны)
 * @param {this} yearOfBirth - Ссылка на поле вода (день/месяц/год)
 */
function yearOfBirthOnBlur(yearOfBirth) {
    elementDisplay('yearOfBirthHint', "none");

    var day = document.getElementById('day').value;
    var month = document.getElementById('month').value;
    var year = document.getElementById('year').value;

    if (day == '' || month == '' || year == '') {
        elementDisplay('yearOfBirthErrorHint', "");
    } else {
        if (isValidDate(day, month, year)) {
            elementDisplay('yearOfBirthSuccessHint', "");
        } else {
            elementDisplay('yearOfBirthErrorHint2', "");
        }
    }
}

/**
 * Функция обработки события фокус на поле ввода место проживания
 * Если фокус установлен тогда прячем сообщение
 * @param {this} locations - Ссылка на поле ввода место проживания
 */
function locationsOnFocus(locations) {
    elementDisplay('locationsHint', "none");
}

/**
 * Функция обработки события потеря фокуса на поле ввода место проживания
 * Если фокус потерян и поле пустое тогда показываем сообщение
 * @param {type} locations - Ссылка на поле ввода место проживания
 */
function locationsOnBlur(locations) {
    if (locations.value == '') {
        elementDisplay('locationsHint', "");
    }
}

/**
 * Функция обработки события фокус на поле ввода семейное положение
 * Если фокус установлен тогда прячем сообщение
 * @param {this} maritalStatus - Ссылка на поле ввода семейное положение
 */
function maritalStatusOnFocus(maritalStatus) {
    elementDisplay('maritalStatusHint', "none");
}

/**
 * Функция обработки события потеря фокуса на поле ввода семейное положение
 * Если фокус потерян и поле пустое тогда показываем сообщение
 * @param {type} maritalStatus - Ссылка на поле ввода семейное положение
 */
function maritalStatusOnBlur(maritalStatus) {
    if (maritalStatus.value == '') {
        elementDisplay('maritalStatusHint', "");
    }
}

/**
 * Функция обработки события фокус на поле ввода образование
 * Если фокус установлен тогда прячем сообщение
 * @param {this} education - Ссылка на поле ввода образование
 */
function educationOnFocus(education) {
    elementDisplay('educationHint', "none");
}

/**
 * Функция обработки события потеря фокуса на поле ввода образование
 * Если фокус потерян и поле пустое тогда показываем сообщение
 * @param {this} education - Ссылка на поле ввода образование
 */
function educationOnBlur(education) {
    if (education.value == 1) {
        elementDisplay('educationHint', "");
    }
}

/**
 * Функция обработки события фокус на поле ввода обо мне
 * Если фокус установлен тогда прячем сообщение
 * @param {this} about - Ссылка на поле ввода обо мне
 */
function aboutOnFocus(about) {
    elementDisplay('aboutHint', "none");
}

/**
 * Функция обработки события потеря фокуса на поле ввода обо мне
 * Если фокус потерян и поле пустое тогда показываем сообщение
 * @param {this} about - Ссылка на поле ввода обо мне
 */
function aboutOnBlur(about) {
    if (about.value == '') {
        elementDisplay('aboutHint', "");
    }
}

/**
 * Функция отслеживает изменения в поле ввода фото
 * Если выбранный файл имеет корректное расширение (*.gif, *.jpg, *.png)
 * То показываем сообщение что данные корректны, иначе показываем сообщение об ошибке
 * @param {this} photo - Ссылка на поле ввода фото
 */
function photoChange(photo) {
    if (isValidImage(photo.value)) {
        elementDisplay('photoSuccessHint', "");
        elementDisplay('photoErrorHint', "none");
    } else if (photo.value != '') {
        elementDisplay('photoErrorHint', "");
        elementDisplay('photoSuccessHint', "none");
    }
}

/**
 * Функция обработки приключения флажка "По настоящее время".
 * Если флаг равен True тогда деактивируем пункт дата окончания, иначе активируем.
 * @param {this} forNow - Ссылка на переключатель "По настоящее время"
 */
function forNowClick(forNow) {
    if (forNow.checked) {
        document.getElementById('workMonth2').disabled = true;
        document.getElementById('workYear2').disabled = true;
    } else {
        document.getElementById('workMonth2').disabled = false;
        document.getElementById('workYear2').disabled = false;
    }
}

/**
 * Функция обработки события фокус на поле ввода e-mail
 * Показываем подсказку (введите данные) и прячем остальные сообщения (данные корректны/некорректны)
 * @param {this} email - Ссылка на поле ввода e-mail
 */
function emailOnFocus(email) {
    elementDisplay('emailHint', "");
    elementDisplay('emailSuccessHint', "none");
    elementDisplay('emailErrorHint', "none");
    elementDisplay('emailErrorHint2', "none");
}

/**
 * Функция обработки события потеря фокуса на поле ввода e-mail
 * Проверяем на корректность E-mail
 * @param {this} email - Ссылка на поле ввода e-mail
 */
function emailOnBlur(email) {
    elementDisplay('emailHint', "none");

    if (isValidEmailAddress(email.value)) {
        elementDisplay('emailSuccessHint', "");
    } else if (email.value == '') {
        elementDisplay('emailErrorHint', "");
    } else {
        elementDisplay('emailErrorHint2', "");
    }
}

//=================================Auth=========================================
/**
 * Функция обработки события фокус на поле ввода e-mail
 * Удаляем красный бордер
 * @param {this} email - Ссылка на поле ввода e-mail
 */
function email2OnFocus(email) {
    email.className = "";
}

/**
 * Функция обработки события потеря фокуса на поле ввода e-mail
 * Если не корректный e-mail подсвечиваем красным бордером
 * @param {this} email - Ссылка на поле ввода e-mail
 */
function email2OnBlur(email) {
    if (email.value != '' && !isValidEmailAddress(email.value)) {
        email.className = 'emailError';
    } else if (email.value != '') {
        email.className = 'emailOk';
    }
}

/**
 * Функция обработки события фокус на поле ввода password
 * Удаляем красный бордер
 * @param {this} email - Ссылка на поле ввода password
 */
function password2OnFocus(password) {
    password.className = "";
}
//=================================Auth=========================================

/**
 * Функция обработки события фокус на поле ввода пароль
 * Показываем подсказку (введите данные) и прячем остальные сообщения (данные корректны/некорректны)
 * @param {this} pass1 - Ссылка на поле ввода пароль
 */
function pass1OnFocus(pass1) {
    elementDisplay('pass1Hint', "");
    elementDisplay('pass1SuccessHint', "none");
    elementDisplay('pass1ErrorHint', "none");
}

/**
 * Функция обработки события потеря фокуса на поле ввода пароль
 * Если поле ввода не пустое/пустое, то показываем сообщение (данные корректны/некорректны)
 * @param {this} pass1 - Ссылка на поле ввода пароль
 */
function pass1OnBlur(pass1) {
    elementDisplay('pass1Hint', "none");
    if (pass1.value == '') {
        elementDisplay('pass1ErrorHint', "");
    } else {
        elementDisplay('pass1SuccessHint', "");
    }
}

/**
 * Функция обработки события фокус на поле ввода повторите пароль
 * Показываем подсказку (введите данные) и прячем остальные сообщения (данные корректны/некорректны)
 * @param {this} pass2 - Ссылка на поле ввода повторите пароль
 */
function pass2OnFocus(pass2) {
    elementDisplay('pass2Hint', "");
    elementDisplay('pass2SuccessHint', "none");
    elementDisplay('pass2ErrorHint', "none");
    elementDisplay('pass2ErrorHint2', "none");
}

/**
 * Функция обработки события потеря фокуса на поле ввода повторите пароль
 * Проверяем корректность и равенство паролей
 * @param {type} pass2 - Ссылка на поле ввода повторите пароль
 */
function pass2OnBlur(pass2) {
    elementDisplay('pass2Hint', "none");
    if (pass2.value == '') {
        elementDisplay('pass2ErrorHint', "");
    } else if (pass2.value != document.getElementById('pass1').value) {
        elementDisplay('pass2ErrorHint2', "");
    } else {
        elementDisplay('pass2SuccessHint', "");
    }
}

/**
 * Функция проверки корректности ввода телефонного номера
 * Разрешены только цифры
 * @param {event} obj - Ссылка на событие поля ввода телефон
 * @returns {Boolean}
 */
function phoneOnKeyPress(obj) {
    obj = (obj) ? obj : window.obj
    var charCode = (obj.which) ? obj.which : obj.keyCode
    if (charCode > 31 && (!isValidNumber(charCode))) {
        return false;
    }
    return true;
}

/**
 * Функция проверки корректности данных пользователя перед отправкой запроса авторизации
 * @param {this} authForm - Ссылка на форму авторизации
 */
function authOnSubmit(authForm) {

    var email = document.getElementById('aEmail');
    var password = document.getElementById('aPassword');

    if (email.value == '' || !isValidEmailAddress(email.value)) {
        email.className = 'emailError';
        return;
    }

    if (password.value == '') {
        password.className = 'emailError';
        return;
    }

    authForm.submit();
}

/**
 * Функция проверки корректности данных пользователя, перед отправкой запроса регистрации
 * @param {this} regForm - Ссылка на форму регистрации
 */
function regOnSubmit(regForm) {
    var error = false;

    var lastName = document.getElementById('lastName'); // Фамилия
    if (lastName.value == '') {
        lastNameOnBlur(lastName);
        error = true;
    }

    var firstName = document.getElementById('firstName'); // Имя
    if (firstName.value == '') {
        firstNameOnBlur(firstName);
        error = true;
    }

    var patronymic = document.getElementById('patronymic'); // Отчество
    if (patronymic.value == '') {
        patronymicOnBlur(patronymic);
        error = true;
    }

    // День рождения
    var day = document.getElementById('day');
    if (day.value == '') {
        yearOfBirthOnBlur(day);
        error = true;
    }

    var month = document.getElementById('month');
    if (month.value == '') {
        yearOfBirthOnBlur(month);
        error = true;
    }

    var year = document.getElementById('year');
    if (year.value == '') {
        yearOfBirthOnBlur(year);
        error = true;
    }

    var photo = document.getElementById('photo');
    if (photo.value != '' && !isValidImage(photo.value)) {
        error = true;
    }

    // Данные авторизации
    var email = document.getElementById('email');
    if (email.value == '') {
        emailOnBlur(email);
        error = true;
    }

    var pass1 = document.getElementById('pass1');
    if (pass1.value == '') {
        pass1OnBlur(pass1);
        error = true;
    }

    var pass2 = document.getElementById('pass2');
    if (pass2.value == '' || pass2.value != pass1.value) {
        pass2OnBlur(pass2);
        error = true;
    }

    if (error) {
        return false;
    } else {
        regForm.submit();
    }

}