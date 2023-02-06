<?php

declare(strict_types=1);

class Airline
{
    public function index(): View
    {
        $db = App::db();

        $query = 'SELECT * FROM airlines';
        $stmt = $db->query($query);

        return View::make('Airlines/index', ['airlines' => $stmt]);
    }

    public function create(): View
    {
        $db = App::db();

        $query1 = 'SELECT * FROM countries';
        $stmt1 = $db->query($query1);
        return View::make('Airlines/create', ['countries' => $stmt1]);
    }

    public function store()
    {
        $airline_name = $_POST['airline_name'];
        $airline_country = $_POST['airline_country'];
        if (!empty($airline_name) && !empty($airline_country)) {

            $db = App::db();

            $query = 'INSERT INTO airlines (airline_name, airline_country) VALUES (?, ?)';
            $stmt = $db->prepare($query);
            $stmt->execute([$airline_name, $airline_country]);

            header('Location: /airlines?message=Airline added successfully!');
        } else {
            header('Location: /airlines/create?message=Please fill out the required fields.');
        }
    }
}
