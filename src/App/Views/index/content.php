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
            <td><img src="<?= $user->photo->path ?>" alt="<?= $lang->findByKey('photo'); ?>"/></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('lastName'); ?></td>
            <td><?= $user->lastName ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('firstName'); ?></td>
            <td><?= $user->firstName ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('patronymic'); ?></td>
            <td><?= $user->patronymic ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('birthday'); ?></td>
            <td><?= $user->yearOfBirth ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('paul'); ?></td>
            <td><?= $user->sex == 1 ? $lang->findByKey('man') : ($user->sex == 2 ? $lang->findByKey('women') : '') ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('email'); ?></td>
            <td><?= $user->email ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('password'); ?></td>
            <td><?= $user->password ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('education'); ?></td>
            <td><?= $user->education->{$lang->getLang()} ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('locations'); ?></td>
            <td><?= $user->location->name ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('maritalStatus'); ?></td>
            <td><?= $user->maritalStatus->name ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('about'); ?></td>
            <td><?= $user->about->about ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('organization'); ?></td>
            <td><?= $user->work->organization ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('post'); ?></td>
            <td><?= $user->work->post ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('gettingStarted'); ?></td>
            <td><?= isset($user->work->jobStartMonth) && $user->work->jobStartMonth !== 0 ? $lang->findByKey('month' . $user->work->jobStartMonth) . ' ' . $user->work->jobStartYear : '' ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('gettingStoped'); ?></td>
            <?php if ($user->work->forNow) { ?>
                <td><?= $lang->findByKey('forNow') ?></td>
            <?php } else { ?>
                <td><?= isset($user->work->jobStopMonth) && $user->work->jobStartMonth !== 0 ? $lang->findByKey('month' . $user->work->jobStopMonth) . ' ' . $user->work->jobStopYear : '' ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('function'); ?></td>
            <td><?= $user->work->duties ?></td>
        </tr>
        <tr>
            <td class="tblIfoLabel"><?= $lang->findByKey('mobilePhone'); ?></td>
            <td>+7 <?= $user->phone->phone ?></td>
        </tr>
    </table>
</div>
