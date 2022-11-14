<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_SPECIAL_CHARS);
$lookup = filter_input(INPUT_GET,"lookup", FILTER_SANITIZE_SPECIAL_CHARS);


$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$cities = $conn->query("SELECT * FROM countries JOIN cities ON countries.code = cities.country_code WHERE countries.name LIKE '%$country%'");

$countryresults = $stmt->fetchAll(PDO::FETCH_ASSOC);
$cityresults = $cities->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if($lookup == "cities"): ?>

  <table>
    <tr>
      <th> Name  </th>
      <th> District </th>
      <th> Population </th>
    </tr>

  <?php foreach ($cityresults as $row): ?>
  <tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['district']; ?></td>
    <td><?php echo $row['population']; ?></td>
  </tr>

  <?php endforeach; ?>
  </table>

<?php else: ?>

<table>
  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Year of Independence</th>
    <th>Head of State</th>
  </tr>

  <?php foreach ($countryresults as $row): ?>
    <tr>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['continent']; ?></td>
      <td><?php echo $row['independence_year']; ?></td>
      <td><?php echo $row['head_of_state']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php endif ?>
</table>

