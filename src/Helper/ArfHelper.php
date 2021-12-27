<?php

namespace ArfLabsOu\Components\Helper;

use ArfLabsOu\Components\Enums\ErrorEnums;
use Illuminate\Support\Str;

class ArfHelper
{

    /**
     * @param $length
     * @param $table
     * @param $field
     * @param string $ext
     * @return string
     */
    public function generateUniqKey($length, $table, $field, string $ext = ''): string
    {
        do {
            $value = $ext . Str::uuid();
            $c = $table::where($field, $value)->count();
        } while ($c != 0);

        return $value;
    }

    /**
     * @param $value
     * @return string
     */
    public function formatCurrencyAmount($value): string
    {
        return number_format($value, 2, '.', ',');
    }

    /**
     * @param string $value
     * @param int $length
     * @return string
     */
    public function numberFormat(string $value = '', int $length = 2): string
    {
        $value = $value;
        if (strpos($value, '.')) {
            $valueArray = explode('.', $value);
            $value = $valueArray[0];
            if (strlen($valueArray[1]) >= $length) {
                $value .= '.' . substr($valueArray[1], 0, $length);
            } else {
                $value .= '.' . $valueArray[1];
                $loopMax = $length - strlen($valueArray[1]);
                for ($i = 0; $i < $loopMax; $i++) {
                    $value .= 0;
                }
            }
        }
        return $value;
    }

    /**
     * @param $schema
     * @param $senderType
     * @param $beneficiaryType
     * @return array
     */
    public function getPayoutSchema($schema, $senderType, $beneficiaryType): array
    {
        $rules = [];
        foreach ($schema['schemas'] as $key => $values) {

            if (isset($values['fields'])) {

                if (in_array($values['type'], ['payout', $senderType . '_sender', $beneficiaryType . '_beneficiary'])) {

                    foreach ($values['fields'] as $sKey => $value) {

                        $type = $values['type'];
                        if (in_array($type, [$senderType . '_sender', $beneficiaryType . '_beneficiary'])) {
                            $ar = explode('_', $type);
                            $type = end($ar);
                        }

                        if ($type == 'payout') {
                            $type = 'payout_method';
                        }

                        if (isset($value['fields'])) {

                            foreach ($value['fields'] as $subKey => $v) {

                                if ($v['is_required']) {
                                    $rules[$type . '.' . $value['name'] . '.' . $v['name']][] = 'required';
                                }

                                if ($v['type'] == 'string') {
                                    $rules[$type . '.' . $value['name'] . '.' . $v['name']][] = 'max:255';
                                }
                            }
                        } else {

                            if ($value['is_required']) {
                                $rules[$type . '.' . $value['name']][] = 'required';
                            }

                            if ($value['type'] == 'string') {
                                $rules[$type . '.' . $value['name']][] = 'max:255';
                            }

                            if ($value['format'] != null) {
                                $rules[$type . '.' . $value['name']][] = 'date_format:Y/m/d';
                            }
                        }

                    }
                }
            } else if ($values['fields'] == null) {
                if (in_array($values['type'], [$senderType . '_sender', $beneficiaryType . '_beneficiary'])) {

                    $type = $values['type'];
                    if (in_array($type, [$senderType . '_sender', $beneficiaryType . '_beneficiary'])) {
                        $ar = explode('_', $type);
                        $type = end($ar);
                    }

                    $rules[$type][] = function ($attribute, $v, $fail) {
                        if ($v !== 'foo') {
                            $fail('The ' . $attribute . '.type is invalid.');
                        }
                    };

                }
            }

        }

        if (isset($schema['acceptable_linked_codes']) && count($schema['acceptable_linked_codes']) > 0) {
            foreach ($schema['acceptable_linked_codes'] as $key => $value) {
                $rules['payout_meta' . '.' . $value['type']][] = 'required';
            }
        }

        return $rules;
    }

    /**
     * @param array $values
     * @return array
     */
    public function arrayKeyValueToValue(array $values = []): array
    {
        return array_values($values);
    }

    /**
     * @param $type
     * @param array $error
     * @param array $data
     * @return array
     */
    public function resultData($type, array $error = [], array $data = []): array
    {

        $resultData = [];
        $resultData['status'] = $type;
        if (count($error) > 0) {
            $resultData['error'] = $error;
        }

        if (count($data) > 0) {
            $resultData['result'] = $data;
        }

        $resultData['timestamp'] = time();
        return $resultData;
    }

    /**
     * @param $id
     * @param array $attr
     * @return array
     */
    public function getErrorMessageArray($id, array $attr = []): array
    {
        $error = ErrorEnums::ERROR_MAP[$id];
        $message = $error['message'];
        if (isset($attr['{?}'])) {
            $message = str_replace('{?}', $attr['{?}'], $message);
            unset($attr['{?}']);
        }
        return ['code' => $error['code'], 'message' => $message] + $attr;
    }
}