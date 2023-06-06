<?php

Class ClientSetting extends Model {

    protected $table = 'client_settings';

    public function getWalkin(){
        return $this->setQuery("SELECT * FROM `client_settings` WHERE `btn` = 'walkin' ") ->getFirst();
    }

    public function getVirtual(){
        return $this->setQuery("SELECT * FROM `client_settings` WHERE `btn` = 'virtual' ") ->getFirst();
    }

    public function getBooking(){
        return $this->setQuery("SELECT * FROM `client_settings` WHERE `btn` = 'booking' ") ->getFirst();
    }



}