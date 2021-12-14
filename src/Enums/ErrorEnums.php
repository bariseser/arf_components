<?php

namespace ArfLabsOu\Components\Enums;

class ErrorEnums
{
    const ERROR_MAP = [
        10 => array(
            'code' => 'INPUT_REQUIRED',
            'message' => 'You must fill in the required fields.'
        ),
        20 => array(
            'code' => 'TIME_FAILED',
            'message' => 'Please check your time. It must be between our time.'
        ),
        30 => array(
            'code' => 'SIGNATURE_FAILED',
            'message' => 'Please check your signature.'
        ),
        40 => array(
            'code' => 'AUTHENTICATION_FAILED',
            'message' => 'Please check your api key.'
        ),
        50 => array(
            'code' => 'STATUS_ERROR',
            'message' => 'Status value must be in those values ( {?} ) '
        ),
        60 => array(
            'code' => 'ACCOUNT_NOT_FOUND',
            'message' => 'This account can not be found. Please check the Account ID.'
        ),
        70 => array(
            'code' => 'WALLET_NOT_FOUND',
            'message' => 'This wallet can not be found. Please check the Wallet ID.'
        ),
        80 => array(
            'code' => 'CLIENT_HAS_NO_DEFINED_COMMISSION',
            'message' => 'This client has no defined commission record for this currency pair. Please contact Arf for more information.'
        ),
        100 => array(
            'code' => 'IDENTITY_VERIFICATION_FAILED',
            'message' => 'Identity verification failed.'
        ),
        110 => array(
            'code' => 'IDENTITY_INFORMATION_MISMATCH',
            'message' => 'The information entered does not match the identity of this account.'
        ),
        120 => array(
            'code' => 'INTERNAL_SERVER_ERROR',
            'message' => 'Miscellaneous errors or internal server error'
        ),
        130 => array(
            'code' => 'TRANSACTION_NOT_FOUND',
            'message' => 'This transaction can not be found. Please check the Transaction ID.'
        ),
        140 => array(
            'code' => 'PAYOUT_METHOD_NOT_FOUND',
            'message' => 'This payout method can not be found. Please check the Payout Method ID.'
        ),
        150 => array(
            'code' => 'PAYOUT_METHOD_HAS_NO_DEFINED_CURRENCY',
            'message' => 'This payout method has no defined currency record.'
        ),
        160 => array(
            'code' => 'INSUFFICIENT_BALANCE',
            'message' => 'The transaction was failed due to your insufficient balance. You can check your balance and re-create the transaction. If you think there is a mistake, you can reach the ARF-Team via support@arf.one.'
        ),
        190 => array(
            'code' => 'TRANSACTION_CANCEL_ERROR',
            'message' => 'In order to cancel a transaction, it must be in the created state and at most one hour must have passed since the creation time of the transaction.  If you think there is a mistake, you can reach the ARF-Team via support@arf.one.'
        ),
        191 => array(
            'code' => 'TRANSACTION_CANCEL_ERROR',
            'message' => 'You have already canceled this transaction. Please refresh your dashboard.'
        ),
        200 => array(
            'code' => 'COLLECTION_SENDER_TYPE_ERROR',
            'message' => 'Your account does not support this customer type. If you think there is a mistake, you can reach the ARF-Team via support@arf.one.'
        ),
        210 => array(
            'code' => 'COLLECTION_SENDER_COUNTRY_ERROR',
            'message' => 'Your account does not support this sender\'s country. If you think there is a mistake, you can reach the ARF-Team via support@arf.one.'
        ),
        220 => array(
            'code' => 'BLOCKED_ACCOUNT',
            'message' => 'The beneficiary account that you tried to send funds to has been blocked by the beneficiary bank. Please contact the beneficiary to make the necessary changes or contact Arf Team if you need more details.'
        ),
        404 => array(
            'code' => 'PAGE_NOT_FOUND',
            'message' => 'page_not_found'
        )
    ];
}
