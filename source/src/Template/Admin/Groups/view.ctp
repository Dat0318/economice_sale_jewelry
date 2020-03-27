<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <?php if (iterator_count($listPermissions)): ?>
                    <div class="row">
                        <?php $moduleTemp = ''; ?>
                        <?php foreach ($listPermissions as $listPermission): ?>
                            <?php
                                $key = $listPermission->id;
                                $module = $listPermission->module;
                                $bSeparate = false;
                                if ($moduleTemp != $module) {
                                    $moduleTemp = $module;
                                    $bSeparate = true;
                                }
                            ?>

                            <?php if ($bSeparate): ?>
                                <div class="col-md-12">
                                    <h4 class="page-header"><?= $listPermission->module_value ?></h4>
                                </div>
                            <?php endif; ?>

                            <div class="col-md-4">
                                <ul class="list-group">
                                    <li class="list-group-item" style="padding-right: 74px;">
                                        <h5 style="margin: 0;" class="text-line"><strong><?= $listPermission->module_name; ?></strong></h5>
                                        <div class="text-muted text-line"><?= $listPermission->description; ?></div>
                                        <?= $this->Form->create('', [
                                            'onsubmit' => 'main.changePermission(this);',
                                            'url' => ['controller' => 'Permissions', 'action' => 'changePermission']
                                        ]) ?>
                                        <div style="" class="template-toggle-checkbox">
                                            <?= $this->Form->hidden('groups_id', ['value' => $listPermission->Permissions[0]['groups_id']]); ?>
                                            <?= $this->Form->hidden('list_permissions_id', ['value' => $listPermission->Permissions[0]['list_permissions_id']]); ?>
                                            <?= $this->Form->checkbox('', [
                                                'hiddenField' => false,
                                                'label' => false,
                                                'class' => 'toggle toggle-ios',
                                                'id' => 'toggle_ios_' . $key,
                                                'checked' => $listPermission->Permissions[0]['value'],
                                                'onchange' => '$(this).submit();'
                                            ]); ?>
                                            <label class="toggle-btn" for="toggle_ios_<?= $key; ?>">
                                                <span class="on"></span>
                                                <span class="off"></span>
                                            </label>
                                        </div>
                                        <?= $this->Form->end() ?>
                                    </li>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?= $this->element('pagination'); ?>
                <?php else: ?>
                    <?= $this->HtmlCustom->getMessageNoItemDisplay(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>