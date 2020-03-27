<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
/**
 * Config Entity
 *
 * @property int $id
 * @property string $key
 * @property int $type
 * @property string|null $description
 * @property string $value
 * @property string|null $special
 * @property int $created_id
 * @property int|null $updated_id
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\User $user
 */
class Config extends Entity
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
        'name_key' => true,
        'type' => true,
        'description' => true,
        'value' => true,
        'special' => true,
        'created_id' => true,
        'updated_id' => true,
        'created_at' => true,
        'updated_at' => true,
        'users_id' => true,
        'user' => true
    ];
    // public static function getValueByNameKey($nameKey){
    //       $configTable = TableRegistry::get('Configs');
    //       $result = $configTable->find()->select(['name_key','value'])->where(['name_key' => $nameKey])->first();
    //       return $result;
    // }
}
