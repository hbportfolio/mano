<h1>Airlines create</h1>
<form action="/airlines/create" method="POST">
    <label for="airline_name">Airline name:</label>
    <input type="text" name="airline_name" required>
    <br>
    <label for="airline_country">Airport country:</label>
    <select name="airline_country" required>
        <?php foreach($this->countries as $country): ?>
            <option value="<?= $country->country_name ?>"><?= $country->country_name ?></option>
        <?php endforeach ?>
    </select>
    <br>
    <input type="submit">
</form>