<?php

declare(strict_types=1);

namespace App\Models\Aspirantes;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModelAspirantes extends ShieldUserModel
{
    protected function initialize(): void
    {
        parent::initialize();

        $this->allowedFields = [
            ...$this->allowedFields,

            // 'first_name',
        ];
    }

    /**
     * Save Email Identity
     *
     * Model event callback called by `afterInsert` and `afterUpdate`.
     *
     * Función customizada para guardar aspirantes
     */
    protected function saveEmailIdentity(array $data): array
    {
        // If insert()/update() gets an array data, do nothing.
        if ($this->tempUser === null) {
            return $data;
        }

        // Insert
        if ($this->tempUser->id === null) {
            /** @var User $user */
            $user = $this->find($this->db->insertID());

            // If you get identity (email/password), the User object must have the id.
            $this->tempUser->id = $user->id;

            $user->email = $this->tempUser->email ?? ''; // Número de solicitud
            $user->password = $this->tempUser->password ?? ''; // Nip
            $user->password_hash = $this->tempUser->password_hash ?? ''; // Nip hash

            // Agregamos los demas campos
            $user->name = $this->tempUser->name ?? ''; // Nombre del aspirante

            $user->saveAspiranteIdentity();
            $this->tempUser = null;

            return $data;
        }

        // Update
        $this->tempUser->saveAspiranteIdentity();
        $this->tempUser = null;

        return $data;
    }
}
