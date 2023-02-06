<h1>Airports create</h1>

<form action="/airports/create" method="POST">
    <label for="airport_name">Airport name:</label>
    <input type="text" name="airport_name" required>
    <br>
    <label for="airport_country">Airport country:</label>
    <select name="airport_country" required>
        <?php foreach($this->countries as $country): ?>
            <option value="<?= $country->country_name ?>"><?= $country->country_name ?></option>
        <?php endforeach ?>
    </select>
    <br>
    <label for="airport_location_lat">Airline location(lat):</label>
    <input type="number" name="airport_location_lat" required>
    <label for="airport_location_lon">Airline location(lon):</label>
    <input type="number" name="airport_location_lon" required>
    <br>
    <p>Choose airlines in the airport:</p>
    <?php foreach($this->airlines as $airline): ?>
        <input type="checkbox" name="check_list[]" value="<?= $airline->id ?>">
        <label for="<?= $airline->airline_name ?>"><?= $airline->airline_name ?></label><br>
    <?php endforeach ?>
    <br>
    <input type="submit">
</form>
