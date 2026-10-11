<?php

namespace App\Enums;

enum MissionState: string {
    case ASSIGNED = "assigned";
    case SUCCESSFUL = "successful";
    case FAILED = "failed";
    case CANCELED = "canceled";

    public function label() 
    {
        return match($this) {
            self::ASSIGNED => "Assigned",
            self::SUCCESSFUL => "Successful",
            self::FAILED => "Failed",
            self::CANCELED => "Canceled",
        };
    }
}