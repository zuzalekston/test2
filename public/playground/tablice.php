<?php
require_once dirname(__FILE__) . '/inc/debug.inc.php';

echo 'tablica asosjacyjna 1<br>';
$person = [
    'first_name' => 'Mark',
    'last_name' => 'Brown',
    'age' => '21',
];

foreach ($person as $field) {
    echo $field . PHP_EOL;
}
echo '<br>';

foreach ($person as $key => $value) {
    echo $key . ': ' . $value . '<br>';
}

echo '<br><br>tablica 2 ćw<br>';
$persons = [
    [
        'first_name' => 'Mark',
        'surname' => 'Brown',
        'age' => '21',
    ],
    [
        'first_name' => 'John',
        'surname' => 'Doe',
        'age' => '22',
    ],
    [
        'first_name' => 'Ann',
        'surname' => 'Smith',
        'age' => '18',
    ],
];


    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
        </tr>
        <?php
        foreach ($persons as $item) {  ?>
            <tr>
                <td><?php echo $item['first_name']; ?></td>
                <td><?php echo $item['surname']; ?></td>
                <td><?php echo $item['age']; ?></td>
            </tr>
        <?php } ?>
    </table>
