<?php

namespace App\Validations;

class CustomRules
{
    /**
     * Regla para validar que un campo sea un boolean valido
     *
     */
    public function validBool($value, string $params = null, array $data = null, string &$error = null): bool
    {
        if (!array_key_exists($params, $data)) {
            return true;
        }

        if (is_bool($value)) {
            return true;
        }

        if (is_string($value)) {
            $value = strtolower($value);
            if ($value === '1' || $value === 'true') {
                return true;
            } elseif ($value === '0' || $value === 'false') {
                return true;
            }
        }

        if (is_int($value)) {
            if ($value === 1 || $value === 0) {
                return true;
            }
        }

        return false;
    }
}
