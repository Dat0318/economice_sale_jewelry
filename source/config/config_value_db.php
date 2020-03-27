<?php
use Cake\Core\Configure;

$config =[];
$config['USERS_STATUS'] = [
  SYSTEM_STATUS_0 => _('Đang hoạt động'), // Đang hoạt động
  SYSTEM_STATUS_1 => _('Chưa kích hoạt'), // Chưa kích hoạt
];

$config['USERS_LIST_STATUS'] = [
  SYSTEM_STATUS_0, // Đang hoạt động
  SYSTEM_STATUS_1, // Chưa kích hoạt
];

$config['USERS_GENDER'] = [
  SYSTEM_GENDER_0 => _('Chưa xác định'),
  SYSTEM_GENDER_1 => _('Nam'),
  SYSTEM_GENDER_2 => _('Nữ'),
];

$config['USERS_LIST_GENDER'] = [
  SYSTEM_GENDER_0, // Chưa xác định
  SYSTEM_GENDER_1, // Nam
  SYSTEM_GENDER_2, // Nữ
];
$config['ROLES_KEYS_MODULE'] = [
  SYSTEM_MODULE_USER       => _('Thành viên'),
  SYSTEM_MODULE_ROLES      => _('Nhóm thành viên'),
  SYSTEM_MODULE_ROLES_KEYS => _('Phân quyền'),

];
$config['CATEGORIES_ATTRIBUTES_ACTIVE'] = [
  SYSTEM_ACTIVE_0 => _('Hoạt động'),
  SYSTEM_ACTIVE_1 => _('Vô hiệu hóa'),
];
return $config;