<?php

namespace App\Entity\Enum;

enum LocationFacility: string
{
    case WIFI = 'wifi';
    case PARKING = 'parking';
    case ELEVATOR = 'elevator';
    case AIR_CONDITIONING = 'air_conditioning';
    case CAFETERIA = 'cafeteria';
    case SECURITY = 'security';
    case RECEPTION = 'reception';
}
