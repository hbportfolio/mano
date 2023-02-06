<?php

declare(strict_types=1);

class Airport
{
    public function index(): View
    {        
        $db = App::db();
        
        $query1 = "SELECT airports.airport_name, airports.airport_country, airports.airport_lat, airports.airport_lon, GROUP_CONCAT(airlines.airline_name SEPARATOR ', ') AS allairlines FROM airports LEFT JOIN airports_airlines ON airports.id=airports_airlines.airport_id LEFT JOIN airlines ON airports_airlines.airline_id=airlines.id GROUP BY airports.airport_name;";
        $stmt1 = $db->query($query1);

        return View::make('Airports/index', ['airports' => $stmt1]);
    }

    public function create(): View
    {
        $db = App::db();

        $query1 = 'SELECT * FROM airlines';
        $stmt1 = $db->query($query1);
        
        $query2 = 'SELECT * FROM countries';
        $stmt2 = $db->query($query2);

        return View::make('Airports/create', ['airlines' => $stmt1, 'countries' => $stmt2]);
    }

    public function store()
    {
        $airport_name = $_POST['airport_name'];
        $airport_country = $_POST['airport_country'];
        $airport_location_lat = $_POST['airport_location_lat'];
        $airport_location_lon = $_POST['airport_location_lon'];
        $airport_airlines = $_POST['check_list'];
        if (!empty($airport_name) && !empty($airport_country) && !empty($airport_location_lat) && !empty($airport_location_lon)) {
            $db = App::db();

            $query1 = 'INSERT INTO airports (airport_name, airport_country, airport_lat, airport_lon) VALUES (?, ?, ?, ?)';
            $stmt1 = $db->prepare($query1);
            $stmt1->execute([$airport_name, $airport_country, $airport_location_lat, $airport_location_lon]);

            $id = $db->lastInsertId();
            if(!empty($airport_airlines)) {
                $query2 = 'INSERT INTO airports_airlines (airport_id, airline_id) VALUES (?, ?)';
                $stmt2 = $db->prepare($query2);
                foreach($airport_airlines as $airline) {
                    $stmt2->execute([$id, $airline]);
                }
            }

            header('Location: /airports?message=Airline added successfully!');
        } else {
            header('Location: /airports/create?message=Please fill out the required fields.');
        }
    }
}
