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
    public string $defaultGroup = 'superadmin';

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
        'aspirante' => [
            'title' => 'Aspirante',
            'description' => 'Aspirante a estudiante del TecNM Campus Ocotlan',
        ],
        'recursos_financieros' => [
            'title' => 'Recursos Financieros',
            'description' => 'Administrativo del area de servicios financieros',
        ],
        'desarrollo_academico' => [
            'title' => 'Desarrollo Academico',
            'description' => 'Administrativo del area de desarrollo academico',
        ],
        'servicios_escolares' => [
            'title' => 'Servicios Escolares',
            'description' => 'Administrativo del area de Servicios Escolares',
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
        // Aspirante permissions
        'aspirante.access' => 'Puede acceder a los sitios del area de aspirantes',
        // Financieros permissions
        'financieros.access' => 'Puede acceder a los sitios del area de servicios financieros',
        // Desarrollo academico permissions
        'desarrollo_academico.access' => 'Puede acceder a los sirios del area de desarrollo academico',
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
            'aspirantes.*',
            'financieros.*',
            'desarrollo.academico.*',
        ],
        'aspirante' => [
            'aspirante.*',
        ],
        'financieros' => [
            'financieros.*',
        ],
        'desarrollo_academico' => [
            'desarrollo_academico.*',
        ],
    ];
}
