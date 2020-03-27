<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Page Entity
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int|null $type
 * @property int $status
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property string $slug
 * @property int $count_views
 * @property int|null $lang
 *
 * @property \App\Model\Entity\User $user
 */
class Page extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'content' => true,
        'type' => true,
        'status' => true,
        'users_id' => true,
        'created_at' => true,
        'updated_at' => true,
        'slug' => true,
        'count_views' => true,
        'lang' => true,
        'user' => true,
        'image' => true,
    ];
}
