<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $permissionList = [];

        $tables = [
            'users',
            'patients',
            'treatments',
            'owners',
            'roles',
            'permissions',
        ];

        $permissionType = [
            'view',
            'viewAny',
            'create',
            'update',
            'delete',
            'forceDelete',
        ];

        foreach ($tables as $table) {
            foreach ($permissionType as $type) {
                $permissionList[] = [
                    'name' => $type . '-' . $table,
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('permissions')->insert($permissionList);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
