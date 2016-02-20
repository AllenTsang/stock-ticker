<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Stocks extends MY_Model {
    
    function __construct() {
        parent::__construct('stocks','code');
    }
    
    function getStocks() {
        $res = $this->all();
        $newRes = array();
        foreach($res as $queryIndex) {
            $tmpRes = array();
            array_push($tmpRes, $queryIndex->code, $queryIndex->stockname, $queryIndex->code, $queryIndex->stockvalue);
            array_push($newRes, $tmpRes);
        }
        return $newRes;
    }
    
    function getStockByCode($code) {
        $res = $this->some('code', $code);
        return array($res{0}->stockname, $res{0}->code, $res{0}->stockvalue);
    }
    
    function getStocksList() {
        $res = $this->getStocks();
        $newRes = array();
        foreach($res as $queryIndex) {
            $tempArray = array();
            array_push($tempArray, $queryIndex[0], $queryIndex[1]);
            array_push($newRes, $tempArray);
        }
        return $newRes;
    }
    
    function getStockPrice($code) {
        $res = $this->some('code', $code);
        return $res{0}->stockvalue;
    }
}