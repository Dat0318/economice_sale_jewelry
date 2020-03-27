 
<div class="box">
    <div class="box-header">
        <h3 class="box-title">THÔNG TIN PAGES</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover dataTable">
            <thead>
                 <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                  <!--   <th scope="col"><?= $this->Paginator->sort('type') ?></th> -->
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('count_views') ?></th>
                    <!-- <th scope="col"><?= $this->Paginator->sort('lang') ?></th> -->
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                 </tr>
            </thead>
           <tbody>
            <?php foreach ($pages as $page): ?>
            <tr>
                <td><?= $this->Number->format($page->id) ?></td>
                <td><?= h($page->title) ?></td>
                <td><?= STATUS_PAGE[$page->status]?></td>
                <td><?= $page->has('user') ? $this->Html->link($page->user->id, ['controller' => 'Users', 'action' => 'view', $page->user->id]) : '' ?></td>
                <td><?= h($page->created_at) ?></td>
                <td><?= h($page->updated_at) ?></td>
                <td><?= h($page->slug) ?></td>
                <td><?= $this->Number->format($page->count_views) ?></td>
                <!-- <td><?= $this->Number->format($page->lang) ?></td> -->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $page->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $page->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $page->id], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]) ?>
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





