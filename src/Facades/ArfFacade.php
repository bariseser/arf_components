<?php

namespace ArfLabsOu\Components\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string generateUniqKey($length, $table, $field, $ext = '')
 * @method static string formatCurrencyAmount($value)
 * @method static string numberFormat($value = '', $length = 2)
 * @method static array getPayoutSchema($schema, $senderType, $beneficiaryType)
 * @method static array arrayKeyValueToValue(array $values = [])
 * @method static array resultData($type, array $error = [], array $data = [])
 * @method static array getErrorMessageArray($id, array $attr = [])
 */
class ArfFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'arf_helper';
    }
}