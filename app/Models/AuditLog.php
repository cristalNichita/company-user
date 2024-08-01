<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuditLog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ip_address', 'action', 'description', 'url', 'access_mode', 'browser'];

    public static function getAuditList(): array
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            $query = AuditLog::selectRaw('audit_logs.*, DATE_FORMAT(audit_logs.created_at,"%b %d, %Y | %h:%i:%s %p") as createdAtFormat');
        } else {
            $query = AuditLog::selectRaw('audit_logs.*, DATE_FORMAT(audit_logs.created_at,"%b %d, %Y | %h:%i:%s %p") as createdAtFormat')->where('user_id', $user->id);
        }
        $lastUpdate = $query->selectRaw('DATE_FORMAT(audit_logs.created_at,"%b %d, %Y %h:%i:%s %p") as lastUpdateAtFormat, DATE_FORMAT(audit_logs.created_at,"%h:%i %p") as lastUpdateAtTimeFormat')->orderBy('audit_logs.created_at', 'desc')->first();

        return ['query' => $query, 'lastUpdate' => $lastUpdate->lastUpdateAtFormat ?? 'N/A', 'lastUpdateAtTimeFormat' => $lastUpdate->lastUpdateAtTimeFormat ?? 'N/A'];
    }

    public static function activityDetails(): Builder
    {
        return self::selectRaw('audit_logs.*, DATE_FORMAT(audit_logs.created_at,"%b %d, %Y | %h:%i:%s %p") as createdAtFormat, users.email as userEmail, organization_custom_roles.roleName, CONCAT(users.firstName," ",users.lastName) as fullName, users.userName, users.role')
            ->leftJoin('users', 'users.id', 'audit_logs.user_id')
            ->leftJoin('user_roles', 'user_roles.userId', 'audit_logs.user_id')
            ->leftJoin('organization_custom_roles', 'organization_custom_roles.id', 'user_roles.roleId')
            ->orderBy('audit_logs.created_at', 'desc');
    }
}
