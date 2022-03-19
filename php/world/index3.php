<?php

class StatisticalArray
{

    protected $array, $array_length, $sum_of_elements,
        $mean, $printable_mean;

    public function __construct($array)
    {
        $this->array = $array;
        $mmean = $this->getMean();
        $msarray = $this->getSortedArray($this->array);

        echo "<br>-----------------------<br>";
        echo "<br>-----------------------<br>";
        echo "<br> the input array, sorted is: ";
        var_dump($msarray);
        echo "<br> <br>";


        $mmedian = $this->getMedian($msarray);

        echo "<br> the mean is $mmean. <br><br>";
        echo "<br> the median is $$mmedian. <br>";
        echo "<br>-----------------------<br>";
        echo "<br>-----------------------<br>";
    }

    /*  getArrayCopy()   for public use 
    make and return a copy of the statistical array.  note that we cannot return
    the original array, as that is protected.    */
    public function getArrayCopy()
    {
        $temp = $this->array;
        return $temp;
    }

    /*     getMean() takes the sum of array elements and divides by the number of elements.     */
    public function getMean()
    {
        $array_length = sizeof($this->array);
        $sum_of_elements = 0;
        for ($n = 0; $n < $array_length; ++$n) $sum_of_elements += $this->array[$n];
        return ($sum_of_elements / $array_length);
    }

    public  function getPrintableMean()
    {
        return (sprintf("%'#5.2s", $this->getMean()));
    }


    public function getSortedArray($iarray)
    {
        $median = 0;  // set default value of median,  0 if all else fails.  
        $mmmcopy = $iarray;  // get copy of original array, just in case
        sort($mmmcopy);  //sorts array ascending in place.
        echo "<br>";
        return $mmmcopy;
    }

    /*     getMedian() takes a copy of the original array, sorts it and returns the middlemost value of the array IF the number of elements is odd;
    else   (IF even) it returns the mean of the two most middle elements.add_product_form
     */
    public function getMedian($acopy)
    {
        $median = 0;  // set default value of median,  0 if all else fails.  

        echo "<br>";
        $array_length = sizeof($acopy);
        var_dump($array_length);
        $midarrayindex = intdiv($array_length, 2);
        echo "<br>";
        var_dump($midarrayindex);

        if ($array_length % 2 != 0)  // if odd
        {
            echo "odd";

            $midarrayindex += 1;

            echo "<br>";
            var_dump($midarrayindex);
            echo "<br> a(0) =" . $acopy[1];
            $median = $acopy[$midarrayindex];
            echo "<br> mde = ";
            var_dump($median);
        } else {
            echo "\neven\n";
            $plusmidarrayindex = $midarrayindex + 1;
            $median = ($acopy($midarrayindex)
                +  $acopy($plusmidarrayindex)
            ) / 2;
        }
        echo "<br> mde = ";
        var_dump($median);
        return $median;
    }
}

$grades1 = array(98, 76, 100, 97, 91, 84, 71, 60, 58, 91, 94, 94, 99);
$sa1 = new StatisticalArray($grades1);
$grades2 = array(1, 2, 3, 5, 5);
$sa2 = new StatisticalArray($grades2);
$grades3 = array(8, 10, 6, 10);
$sa3 = new StatisticalArray($grades3);

/* $grades = array( );
$sa = new StatisticalArray($grades);
$grades = array( );
$sa = new StatisticalArray($grades);
$grades = array( );
$sa = new StatisticalArray($grades); 

echo "<br> very printable mean is " .  $sa1->getPrintableMean();
echo "<br> less printable mean is " .  $sa1->getMean();

echo "<br> the median is " . $sa1->getMedian();
echo "<br> sa2 =" . $sa2->getMedian();
echo "<br> sa3 =" . $sa3->getMedian();
*/

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