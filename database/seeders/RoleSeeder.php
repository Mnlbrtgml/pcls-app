<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::create(['name' => 'admin']);
        $staff_role = Role::create(['name' => 'staff']);


        $create_transaction_permission = Permission::create(['name' => 'create transaction']);
        $read_transaction_permission = Permission::create(['name' => 'read transaction']);
        $update_transaction_permission = Permission::create(['name' => 'update transaction']);
        $delete_transaction_permission = Permission::create(['name' => 'delete transaction']);

        $create_schedule_permission = Permission::create(['name' => 'create schedule']);
        $read_schedule_permission = Permission::create(['name' => 'read schedule']);
        $update_schedule_permission = Permission::create(['name' => 'update schedule']);
        $delete_schedule_permission = Permission::create(['name' => 'delete schedule']);

        $create_customer_permission = Permission::create(['name' => 'create customer']);
        $read_customer_permission = Permission::create(['name' => 'read customer']);
        $update_customer_permission = Permission::create(['name' => 'update customer']);
        $delete_customer_permission = Permission::create(['name' => 'delete customer']);

        $create_user_permission = Permission::create(['name' => 'create user']);
        $read_user_permission = Permission::create(['name' => 'read user']);
        $update_user_permission = Permission::create(['name' => 'update user']);
        $delete_user_permission = Permission::create(['name' => 'delete user']);

        $read_dashboard_permission = Permission::create(['name' => 'read dashboard']);
        $read_report_permission = Permission::create(['name' => 'read report']);


        $admin_permission_list = [
            $create_transaction_permission,
            $read_transaction_permission,
            $update_transaction_permission,
            $delete_transaction_permission,
            $create_schedule_permission,
            $read_schedule_permission,
            $update_schedule_permission,
            $delete_schedule_permission,
            $create_customer_permission,
            $read_customer_permission,
            $update_customer_permission,
            $delete_customer_permission,
            $create_user_permission,
            $read_user_permission,
            $update_user_permission,
            $delete_user_permission,
            $read_dashboard_permission,
            $read_report_permission
        ];
        $staff_permission_list = [
            $create_transaction_permission,
            $read_transaction_permission,
            $update_transaction_permission,
            $create_schedule_permission,
            $read_schedule_permission,
            $update_schedule_permission,
            $read_customer_permission,
            $read_dashboard_permission
        ];


        $admin_role->syncPermissions($admin_permission_list);
        $staff_role->syncPermissions($staff_permission_list);
    }
}
