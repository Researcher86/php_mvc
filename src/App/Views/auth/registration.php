<div id="reg">
    <form enctype="multipart/form-data" name="userReg" method="POST" onsubmit="regOnSubmit(this); return false;">
        <table>
            <tr>
                <td style="width: 220px;"></td>
                <td colspan="2">
                    <span><?= $lang->findByKey('newUserReg'); ?></span><br/>
                    <span style="font-size: 12px; font-weight: normal; color: #656972;">
                        <?= $lang->findByKey('newUserRegHint'); ?>
                    </span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td><?= $lang->findByKey('lastName'); ?> <span>*</span></td>
                <td>
                    <input id="lastName" name="lastName" class="inPut" type="text" value="<?= $lastName; ?>" autofocus="" onfocus="lastNameOnFocus(this)" onblur="lastNameOnBlur(this)"/>
                </td>
                <td class="hint">
                    <span id="lastNameHint" style="display: none;"><nobr><?= $lang->findByKey('lastNameHint'); ?></nobr></span>
                    <span id="lastNameSuccessHint" style="display: none;"><img src="/images/OK2.png" alt=""/></span>
                    <span id="lastNameErrorHint" style="display: none; color: red;"><?= $lang->findByKey('lastNameErrorHint'); ?></span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td><?= $lang->findByKey('firstName'); ?> <span>*</span></td>
                <td>
                    <input id="firstName" class="inPut" name="firstName" value="<?= $firstName ?>" type="text" onfocus="firstNameOnFocus(this)" onblur="firstNameOnBlur(this)"/>
                </td>
                <td class="hint">
                    <span id="firstNameHint" style="display: none;"><?= $lang->findByKey('firstNameHint'); ?></span>
                    <span id="firstNameSuccessHint" style="display: none;"><img src="/images/OK2.png" alt=""/></span>
                    <span id="firstNameErrorHint" style="display: none; color: red;"><?= $lang->findByKey('firstNameErrorHint'); ?></span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td><?= $lang->findByKey('patronymic'); ?> <span>*</span></td>
                <td>
                    <input id="patronymic" class="inPut" name="patronymic" value="<?= $patronymic ?>" type="text" onfocus="patronymicOnFocus(this)" onblur="patronymicOnBlur(this)"/>
                </td>
                <td class="hint">
                    <span id="patronymicHint" style="display: none;"><?= $lang->findByKey('patronymicHint'); ?></span>
                    <span id="patronymicSuccessHint" style="display: none;"><img src="/images/OK2.png" alt=""/></span>
                    <span id="patronymicErrorHint" style="display: none; color: red;"><?= $lang->findByKey('patronymicErrorHint'); ?></span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>
                    <nobr><?= $lang->findByKey('birthday'); ?> <span>*</span></nobr>
                </td>
                <td>
                    <select id="day" name="day" onfocus="yearOfBirthOnFocus(this)" onblur="yearOfBirthOnBlur(this)">
                        <option value="" selected=""><?= $lang->findByKey('day'); ?></option>
                        <?php for ($i = 1; $i <= 31; $i++): ?>
                            <option value="<?= $i ?>" <?= $day == $i ? 'selected' : ''; ?>><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                    <select id="month" name="month" onfocus="yearOfBirthOnFocus(this)" onblur="yearOfBirthOnBlur(this)">
                        <option value="" selected=""><?= $lang->findByKey('month'); ?></option>
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <option value="<?= $i ?>" <?= $month == $i ? 'selected' : ''; ?>><?= $lang->findByKey('month' . $i); ?></option>
                        <?php endfor; ?>
                    </select>
                    <select id="year" name="year" onfocus="yearOfBirthOnFocus(this)" onblur="yearOfBirthOnBlur(this)">
                        <option value="" selected=""><?= $lang->findByKey('year'); ?></option>
                        <?php for ($i = date('Y'); $i >= 1910; $i--) { ?>
                            <option value="<?= $i ?>" <?= $year == $i ? 'selected' : ''; ?>><?= $i ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td class="hint">
                    <span id="yearOfBirthHint" style="display: none;"><?= $lang->findByKey('yearOfBirthHint'); ?></span>
                    <span id="yearOfBirthSuccessHint" style="display: none;"><img src="/images/OK2.png" alt=""/></span>
                    <span id="yearOfBirthErrorHint" style="display: none; color: red;"><?= $lang->findByKey('yearOfBirthErrorHint'); ?></span>
                    <span id="yearOfBirthErrorHint2" style="display: none; color: red;"><?= $lang->findByKey('yearOfBirthErrorHint2'); ?></span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>
                    <nobr><?= $lang->findByKey('locations'); ?></nobr>
                </td>
                <td>
                    <input id="locations" class="inPut" name="locations" value="<?= $locations; ?>" type="text" onfocus="locationsOnFocus(this)" onblur="locationsOnBlur(this)"/>
                </td>
                <td class="hint">
                    <span id="locationsHint"><?= $lang->findByKey('notNecessarily'); ?></span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td><?= $lang->findByKey('paul'); ?></td>
                <td>
                    <input id="sex1" name="sex" type="radio" value="1" <?= $sex == 1 ? 'checked' : ''; ?>/>
                    <label for="sex1"><?= $lang->findByKey('man'); ?></label>

                    <input id="sex2" name="sex" type="radio" value="2" <?= $sex == 2 ? 'checked' : ''; ?>/>
                    <label for="sex2"><?= $lang->findByKey('women'); ?></label>
                </td>
                <td class="hint"></td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>
                    <nobr><?= $lang->findByKey('maritalStatus'); ?></nobr>
                </td>
                <td>
                    <input id="maritalStatus" class="inPut" value="<?= $maritalStatus; ?>" name="maritalStatus" type="text" onfocus="maritalStatusOnFocus(this)" onblur="maritalStatusOnBlur(this)"/>
                </td>
                <td class="hint">
                    <span id="maritalStatusHint"><?= $lang->findByKey('notNecessarily'); ?></span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>
                    <nobr><?= $lang->findByKey('education'); ?></nobr>
                </td>
                <td>
                    <select id="education" style="width: 100%;" name="education" onfocus="educationOnFocus(this)" onblur="educationOnBlur(this)">
                        <?php foreach ($educations as $value) { ?>
                            <option value="<?= $value->id ?>" <?= $education->id == $value->id ? 'selected' : ''; ?>><?= $value->{$lang->getLang()} ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td class="hint">
                    <span id="educationHint"><?= $lang->findByKey('notNecessarily'); ?></span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>
                    <nobr><?= $lang->findByKey('about'); ?></nobr>
                </td>
                <td>
                    <textarea id="about" name="about" onfocus="aboutOnFocus(this)" onblur="aboutOnBlur(this)"><?= $about; ?></textarea>
                </td>
                <td class="hint" style="vertical-align: top;">
                    <span id="aboutHint"><?= $lang->findByKey('notNecessarily'); ?></span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>
                    <nobr><?= $lang->findByKey('photo'); ?></nobr>
                </td>
                <td>
                    <input id="photo" class="inPut" type="file" name="photo" accept="image/jpeg,image/gif,image/x-png" accesskey="" onchange="photoChange(this)"/>
                </td>
                <td class="hint">
                    <span id="photoSuccessHint" style="display: none;"><img src="/images/OK2.png" alt=""/></span>
                    <span id="photoErrorHint" style="display: none; color: red;"><?= $lang->findByKey('photoErrorHint'); ?></span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <span><?= $lang->findByKey('workExperience'); ?></span><br/>
                    <span style="font-size: 12px; font-weight: normal; color: #656972;">
                        <?= $lang->findByKey('workExperienceHint'); ?>
                    </span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>
                    <nobr><?= $lang->findByKey('organization'); ?></nobr>
                </td>
                <td>
                    <input id="organization" class="inPut" type="text" name="organization" value="<?= $organization ?>"/>
                </td>
                <td class="hint"></td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>
                    <nobr><?= $lang->findByKey('post'); ?></nobr>
                </td>
                <td>
                    <input id="post" class="inPut" type="text" name="post" value="<?= $post ?>"/>
                </td>
                <td class="hint"></td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>
                    <nobr><?= $lang->findByKey('gettingStarted'); ?></nobr>
                </td>
                <td>
                    <select id="workMonth1" name="workMonth1" style="width: 90px;">
                        <option value="" selected=""><?= $lang->findByKey('month'); ?></option>
                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                            <option value="<?= $i ?>" <?= $workMonth1 == $i ? 'selected' : ''; ?>><?= $lang->findByKey('month' . $i); ?></option>
                        <?php } ?>
                    </select>

                    <input id="workYear1" name="workYear1" type="text" value="<?= $workYear1 ?>" style="width: 50px;" maxlength="4" onKeyPress="return phoneOnKeyPress(event)"/>
                    <input id="forNow" name="forNow" type="checkbox" <?= $forNow == 'on' ? 'checked' : ''; ?> onclick="forNowClick(this)"/>
                    <label for="forNow"><?= $lang->findByKey('forNow'); ?></label>
                </td>
                <td class="hint"></td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>
                    <nobr><?= $lang->findByKey('gettingStoped') ?></nobr>
                </td>
                <td>
                    <select id="workMonth2" name="workMonth2" style="width: 90px;">
                        <option value="" selected=""><?= $lang->findByKey('month'); ?></option>
                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                            <option value="<?= $i ?>" <?= $workMonth2 == $i ? 'selected' : ''; ?>><?= $lang->findByKey('month' . $i); ?></option>
                        <?php } ?>
                    </select>
                    <input id="workYear2" name="workYear2" type="text" value="<?= $workYear2 ?>" style="width: 50px;" maxlength="4" onKeyPress="return phoneOnKeyPress(event)"/>
                </td>
                <td class="hint"></td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>
                    <nobr><?= $lang->findByKey('function'); ?></nobr>
                </td>
                <td>
                    <textarea id="function" name="function"><?= $function ?></textarea>
                </td>
                <td class="hint"></td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <span><?= $lang->findByKey('authorizationData'); ?></span><br/>
                    <span style="font-size: 12px; font-weight: normal; color: #656972;">
                        <?= $lang->findByKey('authorizationDataHint'); ?>
                    </span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>
                    <nobr><?= $lang->findByKey('email'); ?> <span>*</span></nobr>
                </td>
                <td>
                    <input id="email" class="inPut" name="email" type="text" value="<?= $email ?>" onfocus="emailOnFocus(this)" onblur="emailOnBlur(this)"/>
                </td>
                <td class="hint">
                    <span id="emailHint" style="display: none;"><?= $lang->findByKey('emailHint'); ?></span>
                    <span id="emailSuccessHint" style="display: none;"><img src="/images/OK2.png" alt=""/></span>
                    <span id="emailErrorHint" style="display: none; color: red;"><?= $lang->findByKey('emailErrorHint'); ?></span>
                    <span id="emailErrorHint2" style="display: none; color: red;"><?= $lang->findByKey('emailErrorHint2'); ?></span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td><?= $lang->findByKey('password'); ?> <span>*</span></td>
                <td>
                    <input id="pass1" name="pass1" class="inPut" type="password" onfocus="pass1OnFocus(this)" onblur="pass1OnBlur(this)"/>
                </td>
                <td class="hint">
                    <span id="pass1Hint" style="display: none;"><?= $lang->findByKey('pass1Hint'); ?></span>
                    <span id="pass1SuccessHint" style="display: none;"><img src="/images/OK2.png" alt=""/></span>
                    <span id="pass1ErrorHint" style="display: none; color: red;"><?= $lang->findByKey('pass1ErrorHint'); ?></span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>
                    <nobr><?= $lang->findByKey('pass2'); ?> <span>*</span></nobr>
                </td>
                <td>
                    <input id="pass2" class="inPut" name="pass2" type="password" onfocus="pass2OnFocus(this)" onblur="pass2OnBlur(this)"/>
                </td>
                <td class="hint" style="width: 245px;">
                    <span id="pass2Hint" style="display: none;"></span>
                    <span id="pass2SuccessHint" style="display: none;"><img src="/images/OK2.png" alt=""/></span>
                    <span id="pass2ErrorHint" style="display: none; color: red;"><?= $lang->findByKey('pass2ErrorHint'); ?></span>
                    <span id="pass2ErrorHint2" style="display: none; color: red;"><?= $lang->findByKey('pass2ErrorHint2'); ?></span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <span><?= $lang->findByKey('phone1'); ?></span><br/>
                    <span style="font-size: 12px; font-weight: normal; color: #656972;">
                        <?= $lang->findByKey('phone1Hint'); ?>
                    </span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>
                    <nobr><?= $lang->findByKey('mobilePhone'); ?></nobr>
                </td>
                <td>
                    <strong style="float: left;">+7</strong>
                    <input id="phone" class="inPut" name="phone" value="<?= $phone ?>" style="width: 92%; float: right;" type="text" maxlength="10" onKeyPress="return phoneOnKeyPress(event)"/>
                </td>
                <td class="hint">
                    <!--<span id="phoneHint" style="display: none;">Телефон</span>-->
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <span id="warning"><?= $warning ?></span>
                    <span id="error"><?= $error ?></span>
                </td>
            </tr>
            <tr class="br">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <input type="submit" value="<?= $lang->findByKey('signUp'); ?>"/>
                </td>
            </tr>
        </table>
    </form>
</div>
