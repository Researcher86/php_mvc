<div id="auth">
    <form name="auth" method="POST" onsubmit="authOnSubmit(this); return false;">
        <img src="/images/lock.png" alt=""/>
        <span><?= $lang->findByKey('loginAuthTitle') ?></span>
        <table>
            <tr>
                <td>
                    <input id="aEmail" type="email" name="email" value="" autofocus=""
                           placeholder="<?= $lang->findByKey('email') ?>"
                           onfocus="email2OnFocus(this)"
                           onblur="email2OnBlur(this)"/>
                </td>
            </tr>
            <tr>
                <td>
                    <input id="aPassword" type="password" name="password" value=""
                           placeholder="<?= $lang->findByKey('password') ?>"
                           onfocus="password2OnFocus(this)"/>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    <span style="color: red; font-size: 13px;"><?= $error ?></span>
                </td>
            </tr>
        </table>
        <div>
            <input id="ch" type="checkbox" name="remember"/><label for="ch"><?= $lang->findByKey('remember') ?></label>
            <input type="submit" value="<?= $lang->findByKey('login') ?>"/>
        </div>
        <a href="/auth/registration"><?= $lang->findByKey('signUp') ?></a>
    </form>
</div>