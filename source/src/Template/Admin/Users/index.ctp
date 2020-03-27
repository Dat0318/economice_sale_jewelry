
<div class="box">
    <div class="box-header">
        <h3 class="box-title">THÔNG TIN USERS</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover dataTable">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('firstname') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('lastname') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                    
                     <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                    
                    <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                   
                    <th scope="col"><?= $this->Paginator->sort('groups_id') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->firstname) ?></td>
                    <td><?= h($user->lastname) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= gender[$user->gender]   ?></td>
                    <td><?= h($user->created_at) ?></td>
                    <td><?= h($user->updated_at) ?></td>
                    <td><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
</div>
