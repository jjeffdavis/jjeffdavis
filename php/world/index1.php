<?php


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