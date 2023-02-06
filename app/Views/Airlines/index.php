<h1>Airlines index</h1>
<a href="/airlines/create"><button class="new_button">Add new</button></a>
<br>
<br>
<table>
    <tr>
        <th>Airline</th>
        <th>Country</th>
    </tr>
    <?php foreach($this->airlines as $airline): ?>
        <tr>
            <td><?= $airline->airline_name ?></td>
            <td><?= $airline->airline_country ?></td>
        </tr>
    <?php endforeach; ?>
</table>