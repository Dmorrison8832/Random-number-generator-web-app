<!--
    
    Darren Morrison
    June 7th, 2021
    Random number generator web app | DevProjects by Codementor

    Introduction:
    You will practice using PHP with styling elements from HTML and CSS.
    You will learn how to generate random outputs, 
    which can be applied to real-world projects such as a game system, 
    raffle system, or even “quote of the day.”

    Requirements:
    The RNG should consist of:
    An input box to assign how many dice to roll
    A drop down box to select the sides of the dice (for example d4, d6, d8, d10, d12, d20)
    A PHP rand(); function taking the inputs from the form
    An output to show # of dice rolled, the type of dice (d4, d6 ..), the total count of the dices rolled
    Output the details (number) of the individual dice rolls (Possibly using a foreach loop)
    
-->
<!DOCTYPE html>
<html>
<body>
<!--Input box for how many dice to roll and a drop down menu to select dice type-->
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Amount of Dice:
<input type="text" name="DiceAmount"><br>
Sides per dice:
<select name="DiceSides">
    <option value="4">D4</option>
    <option value="6">D6</option>
    <option value="8">D8</option>
    <option value="10">D10</option>
    <option value="12">D12</option>
    <option value="20">D20</option>
</select>
<input type="submit">
</form>

<!--When the submit button is pressed, and the form is 'POST' the program will display
    the individual rolls of die and show how many die were rolled and the total face values.
-->
<?php
$Dice_Amount = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$Dice_Amount = htmlspecialchars($_REQUEST['DiceAmount']);
if (empty($Dice_Amount))
    echo "Dice_Amount is empty!";
$max = htmlspecialchars($_REQUEST['DiceSides']);
}
$min = 1;
$DiceNumber = 1;
$TotalValue = 0;
for($i=0; $i < $Dice_Amount; $i++)
{
    $randValue = rand($min, $max);
    echo("Dice " . $DiceNumber . " rolls: " . $randValue . "<br>");
    $TotalValue += $randValue;
    $DiceNumber++;
}
echo "<br>Total Dice Rolled: " . $Dice_Amount . "<br>Dice Type: d" . $max . "<br>Total Dice Value: " . 
    $TotalValue;
?> 
</body>
</html>