<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
// use App\Model\Entity\Config;
use Cake\ORM\TableRegistry;
/**
 * Configs helper
 */
class ConfigsHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function getText() {
    	return 'fdsaf';
    }
    // public function getValue($valueKey){
    	
    // 	$value = Config::getValueByNameKey($valueKey);
    // 	return $value->value;
    // }

    public function getValueByKey($valuekey){
        $configTable = TableRegistry::get('Configs'); 
        $value=$configTable->getValueByNameKey($valuekey);
        return $value->value;
    }
}
