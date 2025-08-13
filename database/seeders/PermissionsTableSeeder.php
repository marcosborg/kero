<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'category_create',
            ],
            [
                'id'    => 18,
                'title' => 'category_edit',
            ],
            [
                'id'    => 19,
                'title' => 'category_show',
            ],
            [
                'id'    => 20,
                'title' => 'category_delete',
            ],
            [
                'id'    => 21,
                'title' => 'category_access',
            ],
            [
                'id'    => 22,
                'title' => 'vendor_create',
            ],
            [
                'id'    => 23,
                'title' => 'vendor_edit',
            ],
            [
                'id'    => 24,
                'title' => 'vendor_show',
            ],
            [
                'id'    => 25,
                'title' => 'vendor_delete',
            ],
            [
                'id'    => 26,
                'title' => 'vendor_access',
            ],
            [
                'id'    => 27,
                'title' => 'address_create',
            ],
            [
                'id'    => 28,
                'title' => 'address_edit',
            ],
            [
                'id'    => 29,
                'title' => 'address_show',
            ],
            [
                'id'    => 30,
                'title' => 'address_delete',
            ],
            [
                'id'    => 31,
                'title' => 'address_access',
            ],
            [
                'id'    => 32,
                'title' => 'country_create',
            ],
            [
                'id'    => 33,
                'title' => 'country_edit',
            ],
            [
                'id'    => 34,
                'title' => 'country_show',
            ],
            [
                'id'    => 35,
                'title' => 'country_delete',
            ],
            [
                'id'    => 36,
                'title' => 'country_access',
            ],
            [
                'id'    => 37,
                'title' => 'product_create',
            ],
            [
                'id'    => 38,
                'title' => 'product_edit',
            ],
            [
                'id'    => 39,
                'title' => 'product_show',
            ],
            [
                'id'    => 40,
                'title' => 'product_delete',
            ],
            [
                'id'    => 41,
                'title' => 'product_access',
            ],
            [
                'id'    => 42,
                'title' => 'cart_create',
            ],
            [
                'id'    => 43,
                'title' => 'cart_edit',
            ],
            [
                'id'    => 44,
                'title' => 'cart_show',
            ],
            [
                'id'    => 45,
                'title' => 'cart_delete',
            ],
            [
                'id'    => 46,
                'title' => 'cart_access',
            ],
            [
                'id'    => 47,
                'title' => 'cart_item_create',
            ],
            [
                'id'    => 48,
                'title' => 'cart_item_edit',
            ],
            [
                'id'    => 49,
                'title' => 'cart_item_show',
            ],
            [
                'id'    => 50,
                'title' => 'cart_item_delete',
            ],
            [
                'id'    => 51,
                'title' => 'cart_item_access',
            ],
            [
                'id'    => 52,
                'title' => 'order_create',
            ],
            [
                'id'    => 53,
                'title' => 'order_edit',
            ],
            [
                'id'    => 54,
                'title' => 'order_show',
            ],
            [
                'id'    => 55,
                'title' => 'order_delete',
            ],
            [
                'id'    => 56,
                'title' => 'order_access',
            ],
            [
                'id'    => 57,
                'title' => 'order_item_create',
            ],
            [
                'id'    => 58,
                'title' => 'order_item_edit',
            ],
            [
                'id'    => 59,
                'title' => 'order_item_show',
            ],
            [
                'id'    => 60,
                'title' => 'order_item_delete',
            ],
            [
                'id'    => 61,
                'title' => 'order_item_access',
            ],
            [
                'id'    => 62,
                'title' => 'payment_create',
            ],
            [
                'id'    => 63,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 64,
                'title' => 'payment_show',
            ],
            [
                'id'    => 65,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 66,
                'title' => 'payment_access',
            ],
            [
                'id'    => 67,
                'title' => 'shipment_create',
            ],
            [
                'id'    => 68,
                'title' => 'shipment_edit',
            ],
            [
                'id'    => 69,
                'title' => 'shipment_show',
            ],
            [
                'id'    => 70,
                'title' => 'shipment_delete',
            ],
            [
                'id'    => 71,
                'title' => 'shipment_access',
            ],
            [
                'id'    => 72,
                'title' => 'refund_create',
            ],
            [
                'id'    => 73,
                'title' => 'refund_edit',
            ],
            [
                'id'    => 74,
                'title' => 'refund_show',
            ],
            [
                'id'    => 75,
                'title' => 'refund_delete',
            ],
            [
                'id'    => 76,
                'title' => 'refund_access',
            ],
            [
                'id'    => 77,
                'title' => 'commission_rule_create',
            ],
            [
                'id'    => 78,
                'title' => 'commission_rule_edit',
            ],
            [
                'id'    => 79,
                'title' => 'commission_rule_show',
            ],
            [
                'id'    => 80,
                'title' => 'commission_rule_delete',
            ],
            [
                'id'    => 81,
                'title' => 'commission_rule_access',
            ],
            [
                'id'    => 82,
                'title' => 'payout_create',
            ],
            [
                'id'    => 83,
                'title' => 'payout_edit',
            ],
            [
                'id'    => 84,
                'title' => 'payout_show',
            ],
            [
                'id'    => 85,
                'title' => 'payout_delete',
            ],
            [
                'id'    => 86,
                'title' => 'payout_access',
            ],
            [
                'id'    => 87,
                'title' => 'site_setting_create',
            ],
            [
                'id'    => 88,
                'title' => 'site_setting_edit',
            ],
            [
                'id'    => 89,
                'title' => 'site_setting_show',
            ],
            [
                'id'    => 90,
                'title' => 'site_setting_delete',
            ],
            [
                'id'    => 91,
                'title' => 'site_setting_access',
            ],
            [
                'id'    => 92,
                'title' => 'vendor_menu_access',
            ],
            [
                'id'    => 93,
                'title' => 'site_settings_menu_access',
            ],
            [
                'id'    => 94,
                'title' => 'items_menu_access',
            ],
            [
                'id'    => 95,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 96,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 97,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 98,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 99,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 100,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 101,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 102,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 103,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 104,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 105,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 106,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 107,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 108,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 109,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 110,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 111,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 112,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 113,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 114,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 115,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 116,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 117,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 118,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 119,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 120,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 121,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 122,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 123,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 124,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
