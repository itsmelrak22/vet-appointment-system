<?php

Class Appointment extends Model {

    protected $table = 'appointments';

    public function getDashboardData(){
        return $this->setQuery("SELECT
                                    A.*,
                                    B.name as service_name,
                                    B.price as service_price,
                                    B.duration_minutes as service_duration_mins
                                    FROM `appointments` as A
                                    LEFT JOIN `services` as B
                                    ON A.service_id = B.id
                                    ORDER BY A.created_at DESC
                                    ")
                                    ->getAll();
    }

    public function getDashboardWalkinData(){
        return $this->setQuery("SELECT
                                    A.*,
                                    B.name as service_name,
                                    B.price as service_price,
                                    B.duration_minutes as service_duration_mins
                                    FROM `appointments` as A
                                    LEFT JOIN `services` as B
                                    ON A.service_id = B.id
                                    WHERE A.appointment_type = 'walkin'
                                    ORDER BY A.created_at DESC
                                    ")
                                    ->getAll();
    }

    public function getDashboardVirtualData(){
        return $this->setQuery("SELECT
                                    A.*,
                                    B.name as service_name,
                                    B.price as service_price,
                                    B.duration_minutes as service_duration_mins,
                                    C.link as meeting_link
                                    FROM `appointments` as A
                                    LEFT JOIN `services` as B
                                    ON A.service_id = B.id
                                    LEFT JOIN `meeting_links` as C
                                    ON A.meeting_link_id = C.id
                                    WHERE A.appointment_type = 'virtual'
                                    ORDER BY A.created_at DESC
                                    ")
                                    ->getAll();
    }

}