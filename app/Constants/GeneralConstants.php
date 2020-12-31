<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 11/20/20
 * Time: 4:51 PM
 */

namespace App\Constants;


class GeneralConstants
{
    //yes/no constant
    const NO = 'No';
    const YES = 'Yes';

    //Mortgage TYpe Constant
    const FHA = 'FHA';
    const VA = 'VA';
    const USDA = 'USDA';
    const CONVENTIONAL = 'Conventional';
    const NON_QM = 'Non-QM';

    //property stage constants
    const BEFORE_DUE_DILIGENCE = 'Before Due Diligence';
    const BEFORE_DUE_DILIGENCE_EXPIRE = 'Before Due Diligence Close';
    const HOUSE_BOOKED = 'House Booked';
    const HOUSE_CANCELLED = 'Hose Cancelled';
    const HOUSE_SOLD = 'House Sold';

    //client status constants
    const CLIENT_ACTIVE = 'Active';
    const CLIENT_DROPOUT = 'Dropout';

    //PAYMENT OPTIONS
    const PAYMENT_OPTION_3_MONTH  = '3 Month Option';
    const PAYMENT_OPTION_6_MONTH  = '6 Month Option';
    const PAYMENT_OPTION_12_MONTH = '12 Month Option';

}