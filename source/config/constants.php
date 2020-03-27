<?php

define('WWW_ROOT_UPLOADS', WWW_ROOT . 'uploads' . DS);
define('Free_Ship', [
	2000000 => '2000000',
	
]);

define('Distance', [
	2 => '2km',
	5 => '5km',
	9 => '9km',
]);

define('STATUS_ORDER', [
	0=>'Hủy',
	1=>'Đã đặt hàng',
	2=>'Đang vận chuyển',
	3=>'KH chưa nhận',
	4=>'KH đã nhận',
	5=>'KH không nhận',
	6=>'Đơn sai',
	7=>'Đã cọc',
	8=>'Đã thanh toán',
	9=>'Giao nhanh',
	10=>'Đơn hết hạn',

]);

define('TYPE_SHIP', [
	0=>'Thường',
	1=>'Nhanh',
	2=>'Giao ngay',
]);


define('STATUS_PRODUCT', [
	0=>'public',
	1=>'private',
	2=>'Hạn chế',
	3=>'Sắp bán',
	4=>'Khuyến mãi',
	5=>'Ưu tiên',
]);

define('CART', // Tóm lại cái này là hiển thị bên ngoài giỏ
 	[
		'code' => '',// ma giam gia
		'total_cost' =>'', // tong tien thanh toan
		'count'=>'', // so luong san pham ngoài giỏ
		'products' => [	
		],
		
	]
);

define('product',[
	'path_image' => '',
	'product_title' => '',
	'price' => '',
	'price_sale' => '',
	'quantity' => '5',
	'sub_total' => '',
	'product_id' => '',
	'link_product' => '',
]);


define('STATUS_PAGE',[
	0=>'Riêng tư',
	1=>'Công khai',
	2=>'Online',

]);
define('gender',[
	0=>'Nam',
	1=>'Nữ',
	2=>'Giới tính khác',
]);
define('SORT_PRODUCT_CATE',[
		1=>'Thứ tự mặc định',
		2=>'Thứ tự theo mức độ phổ biến',
		3=>'Thứ tự theo điểm đánh giá',
		4=>'Mới nhất',
		5=>'Thứ tự theo giá: thấp đến cao',
		6=>'Thứ tự theo giá: cao xuống thấp'
	]);

return [
	'FREE_SHIP' => 2000000
];

return [
	'HOTLINE' => '0123456789',
	'EMAIL_ADMIN'=>'thuhan97.jvb@gmail.com',
	'SORT_DEFAULT'=>1,
	'SORT_POPULAR'=>2,
	'SORT_RATE'=>3,
	'SORT_NEW'=>4,
	'SORT_PRICE_ASC'=>5,
	'SORT_PRICE_DESC'=>6
];

