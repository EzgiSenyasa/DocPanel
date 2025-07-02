<?php

namespace Models;

use Core\Database;

class Patients extends Database
{


    public function GetPatients($id)
    {

        $PatientsData = $this->select(
            "SELECT * FROM patients WHERE id = :id",
            [
                'id' => $id
            ],
            false
        );

        return json_encode($PatientsData);
    }

    public function GetAppointments($id)
    {

        $GetAppointments = $this->select(
            "SELECT * FROM appointments WHERE id = :id",
            [
                'id' => $id
            ],
            false,
        );

        return json_encode($GetAppointments);
    }

    public function ListAppointments($doctor_id)
    {

        if ($doctor_id == 0) {
            $ListAppointments = $this->select(
                "SELECT * FROM appointments",
                [],
                true,
            );
        } else {
            $ListAppointments = $this->select(
                "SELECT * FROM appointments WHERE doctor_id = :doctor_id",
                [
                    'doctor_id' => $doctor_id
                ],
                false,
            );
            return json_encode($ListAppointments);
        }
    }
}
