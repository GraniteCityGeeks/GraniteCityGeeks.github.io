<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>

<?php
$provisionedactivites = array("Specs", "Drugs", "Rock and roll");

foreach($provisionedactivites as $x) {
    if ($x === "Drugs") {
        $x = "Mugs";
    }
    print "<p>$x</p>";

}

$wantedgoods = "Mugs";

switch($wantedgoods) {
    case "Mugs":
        echo "you have to be 18 to get some of dat mugs";
        break;
    case "Specs":
        echo "you have to be 16 to get some specs";
        break;
    case "Sausage rolls":
        echo "you have to be 21 to eat sausage rolls";
        break;
    default:
        echo "we only have Mugs, Specs and Sausage rolls";

}

$lottery = array(0 => "Jordan", 1 => "Jamie", 2 => "Harry", 3 => "Chris", 4 => "Michael", 5 => "Danny", 6 => "John", 7 => "Craig", 8 => "David", 9 => "Florian");

shuffle($lottery);

$rng = random_int(0,9);

$winner = $lottery[$rng];

echo "<p> The winner is $winner who has won a ton of specs</p>";
echo $lottery[$rng];



?>

</body>