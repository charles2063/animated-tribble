<?php

namespace Hackathon\LevelH;

class Geo
{
    public function __construct()

    {

    }

    public function getClosestCityFromId($id){
        $myCities = new CitiesData();
        $cities = $myCities->getCities();
        $srcCity = $myCities->getCityInfoById($id);
        $closestDistance = PHP_INT_MAX;
        $closestCity = $srcCity;
        $cosDeg2RadLat1 = cos(deg2rad($srcCity['lat']));

        foreach ($cities as $dstCity) {
            if ($dstCity['id'] === $srcCity['id']){
                continue;
            }

            $distance = $this->computeDistance(
                $srcCity['lat'],
                $srcCity['long'],
                $dstCity['lat'],
                $dstCity['long'],
                $cosDeg2RadLat1
            );

            if ($closestDistance > $distance) {
                $closestDistance = $distance;
                $closestCity = $dstCity;
            }
        }

        return $closestCity;

    }

    /**
     * Give the distance in meter between two points (in kilometer)
     *
     * @param $lat1
     * @param $lng1
     * @param $lat2
     * @param $lng2
     * @return int
     */

    private function computeDistance($lat1, $lng1, $lat2, $lng2, $cosDeg2RadLat1){
        return acos(
            $cosDeg2RadLat1 * cos(deg2rad($lat2)) * cos(deg2rad($lng2) - deg2rad($lng1)) +
            sin(deg2rad($lat1)) * sin(deg2rad($lat2))
        ) * 6371 * 1000;
    }
};