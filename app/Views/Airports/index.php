<h1>Airports index</h1>
<a href="/airports/create"><button class="new_button">Add new</button></a>
<br>
<br>
<table>
    <thead>
        <th>Airport</th>
        <th>Country</th>
        <th>Location</th>
        <th>Airlines</th>
    </thead>
    <?php foreach($this->airports as $airport): ?>
        <tr>
            <td><?= $airport->airport_name ?></td>
            <td><?= $airport->airport_country ?></td>
            <td><?= $airport->airport_lat . ', ' . $airport->airport_lon ?></td>
            <td><?= $airport->allairlines ?></td>
        </tr>
    <?php endforeach; ?>
</table>