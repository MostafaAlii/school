<?php
/**
 * function to check app()->getLocale() and return the correct direction class
 * if app()->getLocale() == 'ar' return <html direction="rtl" dir="rtl" style="direction: rtl"> 
 */
function directionCheck() {
    $direction = '<html direction="ltr" dir="ltr" style="direction: ltr">';
    if (app()->getLocale() == 'ar') {
        $direction = '<html direction="rtl" dir="rtl" style="direction: rtl">';
    }
    echo $direction;
}

function bottomStartDirectionClass()
{
    $class = 'bottom-start';
    if (app()->getLocale() == 'ar') {
        $class = 'bottom-end';
    }
    return $class;
}

function bottomEndDirectionClass()
{
    $class = 'bottom-end';
    if (app()->getLocale() == 'ar') {
        $class = 'bottom-start';
    }
    return $class;
}

function rightStartDirectionClass()
{
    $class = 'right-start';
    if (app()->getLocale() == 'ar') {
        $class = 'left-start';
    }
    return $class;
}

function leftStartDirectionClass()
{
    $class = 'left-start';
    if (app()->getLocale() == 'ar') {
        $class = 'right-start';
    }
    return $class;
}