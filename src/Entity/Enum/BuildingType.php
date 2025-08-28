<?php

namespace App\Entity\Enum;

enum BuildingType: string
{
    case OFFICE = 'office';
    case CONFERENCE_CENTER = 'conference_center';
    case HOTEL = 'hotel';
    case UNIVERSITY = 'university';
    case WAREHOUSE = 'warehouse';
    case RETAIL = 'retail';
}


