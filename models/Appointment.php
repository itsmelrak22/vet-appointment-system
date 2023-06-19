<?php
date_default_timezone_set('Asia/Manila');


Class Appointment extends Model {

    protected $table = 'appointments';

    public function getAppointmentInfo($id){
        return $this->setQuery("SELECT
                                    A.*,
                                    B.name as service_name,
                                    B.price as service_price,
                                    B.duration_minutes as service_duration_mins
                                    FROM `appointments` as A
                                    LEFT JOIN `services` as B
                                    ON A.service_id = B.id
                                    WHERE A.id = $id
                                    AND  A.deleted_at IS NULL
                                    ORDER BY A.created_at DESC
                                    ")
                            ->getFirst();
    }

    public function getPendingAppointments(){
        return $this->setQuery("SELECT
                                    A.*,
                                    B.name as service_name,
                                    B.price as service_price,
                                    B.duration_minutes as service_duration_mins
                                    FROM `appointments` as A
                                    LEFT JOIN `services` as B
                                    ON A.service_id = B.id
                                    WHERE  A.deleted_at IS NULL
                                    AND A.status = 'pending'
                                    ORDER BY A.created_at DESC
                                    ")
                                    ->getAll();
    }

    public function getDashboardData(){
        return $this->setQuery("SELECT
                                    A.*,
                                    B.name as service_name,
                                    B.price as service_price,
                                    B.duration_minutes as service_duration_mins
                                    FROM `appointments` as A
                                    LEFT JOIN `services` as B
                                    ON A.service_id = B.id
                                    WHERE  A.deleted_at IS NULL
                                    ORDER BY A.created_at DESC
                                    ")
                                    ->getAll();
    }
    public function getConfirmedData(){
        return $this->setQuery("SELECT
                                    A.*,
                                    B.name as service_name,
                                    B.price as service_price,
                                    B.duration_minutes as service_duration_mins
                                    FROM `appointments` as A
                                    LEFT JOIN `services` as B
                                    ON A.service_id = B.id
                                    WHERE A.status = 'confirmed'
                                    AND  A.deleted_at IS NULL
                                    ORDER BY A.created_at DESC
                                    ")
                                    ->getAll();
    }
    public function getCancelledData(){
        return $this->setQuery("SELECT
                                    A.*,
                                    B.name as service_name,
                                    B.price as service_price,
                                    B.duration_minutes as service_duration_mins
                                    FROM `appointments` as A
                                    LEFT JOIN `services` as B
                                    ON A.service_id = B.id
                                    WHERE A.status = 'cancelled'
                                    AND  A.deleted_at IS NULL
                                    ORDER BY A.created_at DESC
                                    ")
                                    ->getAll();
    }
    public function getCompletedData(){
        return $this->setQuery("SELECT
                                    A.*,
                                    B.name as service_name,
                                    B.price as service_price,
                                    B.duration_minutes as service_duration_mins
                                    FROM `appointments` as A
                                    LEFT JOIN `services` as B
                                    ON A.service_id = B.id
                                    WHERE A.status = 'completed'
                                    AND  A.deleted_at IS NULL
                                    ORDER BY A.created_at DESC
                                    ")
                                    ->getAll();
    }

    public function getDashboardDataToday(){
        $timestamp = strtotime(date('m/d/Y'));
        $formattedDate = date('m/d/Y', $timestamp);

        // $formattedDate = "05/27/2023";

        return $this->setQuery("SELECT
                                    A.*,
                                    B.name as service_name,
                                    B.price as service_price,
                                    B.duration_minutes as service_duration_mins
                                    FROM `appointments` as A
                                    LEFT JOIN `services` as B
                                    ON A.service_id = B.id
                                    WHERE A.appointment_date LIKE '$formattedDate'
                                    AND A.status = 'completed'
                                    AND  A.deleted_at IS NULL
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
                                    AND  A.deleted_at IS NULL
                                    ORDER BY A.created_at DESC
                                    ")
                                    ->getAll();
    }



}