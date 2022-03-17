<?php

class StatisticalArray
{

    protected $array, $array_length, $sum_of_elements,
        $mean, $printable_mean;

    public function __construct($array)
    {
        $this->array = $array;
        $array_length = sizeof($array);
        $sum_of_elements = 0;
        for ($n = 0; $n < $array_length; ++$n) $sum_of_elements += $array[$n];
        $mean = this->calcMean($sum_of_elements, $array_length);
        //$mean = $sum_of_elements / $array_length;
        $printable_mean = sprintf("%'#5.2s", $mean);
        echo "mean = $mean";
    }

    protected function calcMean($sum, $divisor)
    {
        return $sum / $divisor;
    }

    public function getMean()
    {
        return $this->mean;
    }
    public  function getPrintableMean()
    {
        return $this->printable_mean;
    }
}

$grades1 = array(98, 76, 100, 97, 91, 84, 71, 60, 58, 101.3, 94, 94);
$sa1 = new StatisticalArray($grades1);

echo "<br> very printable mean is " .  $sa1->getPrintableMean();
echo "<br> less printable mean is " .  $sa1->getMean();

exit - 1;




$testarray[0] = 0;
for ($n = 0; $n <= 100; ++$n) $testarray[$n] = $n;
for ($n = 3; $n <= 100; $n += 3) $testarray[$n] = "trine";
for ($n = 5; $n <= 100; $n += 5) $testarray[$n] = "quindi";
for ($n = 15; $n <= 100; $n += 15) $testarray[$n] = "triquindi";
for ($n = 0; $n <= 100; ++$n)
    printf("%'\x017s%s%'\x0110s\n%s",    $n, "   ", $testarray[$n], "<br>");
for ($n = 0; $n <= 100; ++$n)
    printf("%'.7s%s%'.10s\n%s",    $n, "   ", $testarray[$n], "<br>");
exit(-1);
?>


<!DOCTYPE html>
<html>

<!-- the head section -->

<head>
    <title>World</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->

<body>
    <header>
        <h1>World</h1>
    </header>
    <main>


        <section>
            <!-- display a table of nation/world -->

            <table>
                <tr>
                    <th>Country</th>
                    <th>Region</th>
                    <th>Type Of Government</th>
                    <th>Code</th>

                    <!----                  
                    <th class="">Capital</th>
------>

                </tr>

                <?php foreach ($dbcountries as $country) : ?>
                <tr>
                    <td><?php echo $country['name']; ?></td>
                    <td><?php echo $country['region']; ?></td>
                    <td><?php echo $country['governmentform']; ?></td>

                    <td><?php echo $country['code']; ?></td>

                </tr>
                <?php endforeach; ?>
            </table>

            <p><a href="addcountry_form.php">Add country</a></p>

        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Little Corner of the World</p>
    </footer>
</body>

</html>