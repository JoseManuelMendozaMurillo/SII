<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    public string $defaultGroup = 'student';

    /**
     * --------------------------------------------------------------------
     * Groups
     * --------------------------------------------------------------------
     * An associative array of the available groups in the system, where the keys
     * are the group names and the values are arrays of the group info.
     *
     * Whatever value you assign as the key will be used to refer to the group
     * when using functions such as:
     *      $user->addGroup('superadmin');
     *
     * @var array<string, array<string, string>>
     *
     * @see https://github.com/codeigniter4/shield/blob/develop/docs/quickstart.md#change-available-groups for more info
     */
    public array $groups = [
        'superadmin' => [
            'title' => 'Super Admin',
            'description' => 'Complete control of the site.',
        ],
        'bossdepartment' => [
            'title' => 'Boss of Department',
            'description' => 'Gestionar maestros y alumnos',
        ],
        'master' => [
            'title' => 'Master',
            'description' => 'Actualizar alumnos',
        ],
        'student' => [
            'title' => 'Student',
            'description' => 'Ver listado de alumnos',
        ],
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system.
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        'admin.access' => 'Can access the sites admin area',
        'admin.settings' => 'Can access the main site settings',
        'bossdepartment.list' => 'Can see the list of bosses of department',
        'bossdepartment.create' => 'Can create new boss of department',
        'bossdepartment.update' => 'Can edit existing boss of department',
        'bossdepartment.delete' => 'Can delete existing boss of department',
        'master.list' => 'Can see the list of masters',
        'master.create' => 'Can create new master',
        'master.update' => 'Can edit existing master',
        'master.delete' => 'Can delete existing master',
        'student.list' => 'Can see the list of students',
        'student.create' => 'Can create new student',
        'student.update' => 'Can edit existing student',
        'student.delete' => 'Can delete existing student',
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     *
     * This defines group-level permissions.
     */
    public array $matrix = [
        'superadmin' => [
            'admin.*',
            'bossdepartment.*',
            'master.*',
            'student.*',
        ],
        'bossdepartment' => [
            'admin.access',
            'bossdepartment.list',
            'master.*',
            'student.*',
        ],
        'master' => [
            'master.list',
            'student.list',
            'student.update',
        ],
        'student' => [
            'student.list',
        ],

    ];
}
