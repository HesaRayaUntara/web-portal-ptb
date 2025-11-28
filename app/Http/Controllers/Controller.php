<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\LogActivity;
use App\Models\Admin;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Helper function untuk logging aktivitas
     */
    protected function logActivity($aktivitas, $dataYangDiubah = null)
    {
        $adminId = session('admin_id');
        if ($adminId) {
            $admin = Admin::find($adminId);
            if ($admin) {
                LogActivity::create([
                    'nama_admin' => $admin->username,
                    'aktivitas' => $admin->username . ' ' . $aktivitas,
                    'data_yang_diubah' => $dataYangDiubah,
                    'waktu' => now(),
                ]);
            }
        }
    }
}
