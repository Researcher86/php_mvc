<div id="mainContent">
    <table>
        <tr>
            <td colspan="2"><span><?= $lang->findByKey('userInfo'); ?></span></td>
        </tr>
        <tr class="br">
            <td colspan="2"></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('photo'); ?></td>
            <td><img src="<?= $photoSrc ?>" alt="<?= $lang->findByKey('photo'); ?>"/></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('lastName'); ?></td>
            <td><?= $lastName ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('firstName'); ?></td>
            <td><?= $firstName ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('patronymic'); ?></td>
            <td><?= $patronymic ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('birthday'); ?></td>
            <td><?= $birthday ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('paul'); ?></td>
            <td><?= $sex ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('email'); ?></td>
            <td><?= $email ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('password'); ?></td>
            <td><?= $password ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('education'); ?></td>
            <td><?= $education ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('locations'); ?></td>
            <td><?= $locations ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('maritalStatus'); ?></td>
            <td><?= $maritalStatus ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('about'); ?></td>
            <td><?= $about ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('organization'); ?></td>
            <td><?= $organization ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('post'); ?></td>
            <td><?= $post ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('gettingStarted'); ?></td>
            <td><?= $gettingStarted ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('gettingStoped'); ?></td>
            <?php if ($forNow) { ?>
                <td><?= $forNowTitle ?></td>
            <?php } else { ?>
                <td><?= $gettingStoped ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('function'); ?></td>
            <td><?= $function ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('mobilePhone'); ?></td>
            <td>+7 <?= $mobilePhone ?></td>
        </tr>
    </table>
</div>
