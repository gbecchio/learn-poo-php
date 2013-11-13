<?php
/**
* @author Gregory Becchio
* @since 13/11/2013
*/
Class lib_ErrorLog
{
	//
	const USER_ERROR_DIR		= 'log/error_log/Site_User_errors.log';
	const GENERAL_ERROR_DIR		= 'log/error_log/Site_General_errors.log';
    private $_dir;
	/*
		User Errors...
	*/
    public function user($msg,$username)
    {
    	$temp_dir  = __DIR__."/".self::USER_ERROR_DIR;
        $date = date('d.m.Y h:i:s');
    	$log = $msg."   |  Date:  ".$date."  |  User:  ".$username."\n";
    	error_log($log, 3, $temp_dir);
        return true;
    }
    /*
    General Errors...
    */
    public function general($msg)
    {
        $temp_dir  = __DIR__."/".self::GENERAL_ERROR_DIR;
    	$date 	= date('d.m.Y h:i:s');
    	$log 	= $msg."   |  Date:  ".$date."\n";
    	error_log($msg."   |  Tarih:  ".$date, 3, $temp_dir);
        return true;
    }
}