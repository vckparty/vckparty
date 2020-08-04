<?php

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
                'title' => 'districtposting_create',
            ],
            [
                'id'    => 18,
                'title' => 'districtposting_edit',
            ],
            [
                'id'    => 19,
                'title' => 'districtposting_show',
            ],
            [
                'id'    => 20,
                'title' => 'districtposting_delete',
            ],
            [
                'id'    => 21,
                'title' => 'districtposting_access',
            ],
            [
                'id'    => 22,
                'title' => 'application_create',
            ],
            [
                'id'    => 23,
                'title' => 'application_edit',
            ],
            [
                'id'    => 24,
                'title' => 'application_show',
            ],
            [
                'id'    => 25,
                'title' => 'application_delete',
            ],
            [
                'id'    => 26,
                'title' => 'application_access',
            ],
            [
                'id'    => 27,
                'title' => 'category_create',
            ],
            [
                'id'    => 28,
                'title' => 'category_edit',
            ],
            [
                'id'    => 29,
                'title' => 'category_show',
            ],
            [
                'id'    => 30,
                'title' => 'category_delete',
            ],
            [
                'id'    => 31,
                'title' => 'category_access',
            ],
            [
                'id'    => 32,
                'title' => 'master_access',
            ],
            [
                'id'    => 33,
                'title' => 'post_create',
            ],
            [
                'id'    => 34,
                'title' => 'post_edit',
            ],
            [
                'id'    => 35,
                'title' => 'post_show',
            ],
            [
                'id'    => 36,
                'title' => 'post_delete',
            ],
            [
                'id'    => 37,
                'title' => 'post_access',
            ],
            [
                'id'    => 38,
                'title' => 'district_create',
            ],
            [
                'id'    => 39,
                'title' => 'district_edit',
            ],
            [
                'id'    => 40,
                'title' => 'district_show',
            ],
            [
                'id'    => 41,
                'title' => 'district_delete',
            ],
            [
                'id'    => 42,
                'title' => 'district_access',
            ],
            [
                'id'    => 43,
                'title' => 'block_create',
            ],
            [
                'id'    => 44,
                'title' => 'block_edit',
            ],
            [
                'id'    => 45,
                'title' => 'block_show',
            ],
            [
                'id'    => 46,
                'title' => 'block_delete',
            ],
            [
                'id'    => 47,
                'title' => 'block_access',
            ],
            [
                'id'    => 48,
                'title' => 'panchayat_create',
            ],
            [
                'id'    => 49,
                'title' => 'panchayat_edit',
            ],
            [
                'id'    => 50,
                'title' => 'panchayat_show',
            ],
            [
                'id'    => 51,
                'title' => 'panchayat_delete',
            ],
            [
                'id'    => 52,
                'title' => 'panchayat_access',
            ],
            [
                'id'    => 53,
                'title' => 'townpanchayat_create',
            ],
            [
                'id'    => 54,
                'title' => 'townpanchayat_edit',
            ],
            [
                'id'    => 55,
                'title' => 'townpanchayat_show',
            ],
            [
                'id'    => 56,
                'title' => 'townpanchayat_delete',
            ],
            [
                'id'    => 57,
                'title' => 'townpanchayat_access',
            ],
            [
                'id'    => 58,
                'title' => 'townvattam_create',
            ],
            [
                'id'    => 59,
                'title' => 'townvattam_edit',
            ],
            [
                'id'    => 60,
                'title' => 'townvattam_show',
            ],
            [
                'id'    => 61,
                'title' => 'townvattam_delete',
            ],
            [
                'id'    => 62,
                'title' => 'townvattam_access',
            ],
            [
                'id'    => 63,
                'title' => 'municipality_create',
            ],
            [
                'id'    => 64,
                'title' => 'municipality_edit',
            ],
            [
                'id'    => 65,
                'title' => 'municipality_show',
            ],
            [
                'id'    => 66,
                'title' => 'municipality_delete',
            ],
            [
                'id'    => 67,
                'title' => 'municipality_access',
            ],
            [
                'id'    => 68,
                'title' => 'municipalityvattam_create',
            ],
            [
                'id'    => 69,
                'title' => 'municipalityvattam_edit',
            ],
            [
                'id'    => 70,
                'title' => 'municipalityvattam_show',
            ],
            [
                'id'    => 71,
                'title' => 'municipalityvattam_delete',
            ],
            [
                'id'    => 72,
                'title' => 'municipalityvattam_access',
            ],
            [
                'id'    => 73,
                'title' => 'metropolitan_create',
            ],
            [
                'id'    => 74,
                'title' => 'metropolitan_edit',
            ],
            [
                'id'    => 75,
                'title' => 'metropolitan_show',
            ],
            [
                'id'    => 76,
                'title' => 'metropolitan_delete',
            ],
            [
                'id'    => 77,
                'title' => 'metropolitan_access',
            ],
            [
                'id'    => 78,
                'title' => 'area_create',
            ],
            [
                'id'    => 79,
                'title' => 'area_edit',
            ],
            [
                'id'    => 80,
                'title' => 'area_show',
            ],
            [
                'id'    => 81,
                'title' => 'area_delete',
            ],
            [
                'id'    => 82,
                'title' => 'area_access',
            ],
            [
                'id'    => 83,
                'title' => 'metrovattam_create',
            ],
            [
                'id'    => 84,
                'title' => 'metrovattam_edit',
            ],
            [
                'id'    => 85,
                'title' => 'metrovattam_show',
            ],
            [
                'id'    => 86,
                'title' => 'metrovattam_delete',
            ],
            [
                'id'    => 87,
                'title' => 'metrovattam_access',
            ],
            [
                'id'    => 88,
                'title' => 'subcategory_create',
            ],
            [
                'id'    => 89,
                'title' => 'subcategory_edit',
            ],
            [
                'id'    => 90,
                'title' => 'subcategory_show',
            ],
            [
                'id'    => 91,
                'title' => 'subcategory_delete',
            ],
            [
                'id'    => 92,
                'title' => 'subcategory_access',
            ],
            [
                'id'    => 93,
                'title' => 'assembly_create',
            ],
            [
                'id'    => 94,
                'title' => 'assembly_edit',
            ],
            [
                'id'    => 95,
                'title' => 'assembly_show',
            ],
            [
                'id'    => 96,
                'title' => 'assembly_delete',
            ],
            [
                'id'    => 97,
                'title' => 'assembly_access',
            ],
            [
                'id'    => 98,
                'title' => 'posting_create',
            ],
            [
                'id'    => 99,
                'title' => 'posting_edit',
            ],
            [
                'id'    => 100,
                'title' => 'posting_show',
            ],
            [
                'id'    => 101,
                'title' => 'posting_delete',
            ],
            [
                'id'    => 102,
                'title' => 'posting_access',
            ],
            [
                'id'    => 103,
                'title' => 'pondichery_master_access',
            ],
            [
                'id'    => 104,
                'title' => 'category_pondichery_create',
            ],
            [
                'id'    => 105,
                'title' => 'category_pondichery_edit',
            ],
            [
                'id'    => 106,
                'title' => 'category_pondichery_show',
            ],
            [
                'id'    => 107,
                'title' => 'category_pondichery_delete',
            ],
            [
                'id'    => 108,
                'title' => 'category_pondichery_access',
            ],
            [
                'id'    => 109,
                'title' => 'subcategory_pondichery_create',
            ],
            [
                'id'    => 110,
                'title' => 'subcategory_pondichery_edit',
            ],
            [
                'id'    => 111,
                'title' => 'subcategory_pondichery_show',
            ],
            [
                'id'    => 112,
                'title' => 'subcategory_pondichery_delete',
            ],
            [
                'id'    => 113,
                'title' => 'subcategory_pondichery_access',
            ],
            [
                'id'    => 114,
                'title' => 'subsubcategory_create',
            ],
            [
                'id'    => 115,
                'title' => 'subsubcategory_edit',
            ],
            [
                'id'    => 116,
                'title' => 'subsubcategory_show',
            ],
            [
                'id'    => 117,
                'title' => 'subsubcategory_delete',
            ],
            [
                'id'    => 118,
                'title' => 'subsubcategory_access',
            ],
            [
                'id'    => 119,
                'title' => 'pondicheryapplication_create',
            ],
            [
                'id'    => 120,
                'title' => 'pondicheryapplication_edit',
            ],
            [
                'id'    => 121,
                'title' => 'pondicheryapplication_show',
            ],
            [
                'id'    => 122,
                'title' => 'pondicheryapplication_delete',
            ],
            [
                'id'    => 123,
                'title' => 'pondicheryapplication_access',
            ],
            [
                'id'    => 124,
                'title' => 'applicationsmenu_access',
            ],
            [
                'id'    => 125,
                'title' => 'pondicheryposting_create',
            ],
            [
                'id'    => 126,
                'title' => 'pondicheryposting_edit',
            ],
            [
                'id'    => 127,
                'title' => 'pondicheryposting_show',
            ],
            [
                'id'    => 128,
                'title' => 'pondicheryposting_delete',
            ],
            [
                'id'    => 129,
                'title' => 'pondicheryposting_access',
            ],
            [
                'id'    => 130,
                'title' => 'districtspondichery_create',
            ],
            [
                'id'    => 131,
                'title' => 'districtspondichery_edit',
            ],
            [
                'id'    => 132,
                'title' => 'districtspondichery_show',
            ],
            [
                'id'    => 133,
                'title' => 'districtspondichery_delete',
            ],
            [
                'id'    => 134,
                'title' => 'districtspondichery_access',
            ],
            [
                'id'    => 135,
                'title' => 'pondicheryassembly_create',
            ],
            [
                'id'    => 136,
                'title' => 'pondicheryassembly_edit',
            ],
            [
                'id'    => 137,
                'title' => 'pondicheryassembly_show',
            ],
            [
                'id'    => 138,
                'title' => 'pondicheryassembly_delete',
            ],
            [
                'id'    => 139,
                'title' => 'pondicheryassembly_access',
            ],
            [
                'id'    => 140,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
