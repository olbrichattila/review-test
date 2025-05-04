<?php

/**
 * Example Class for Code Review Testing.
 *
 * This class is designed to provide a variety of code snippets
 * that can be used to test an automatic code review tool.  It
 * includes examples of good code, bad code, and code with
 * potential issues.
 */
class ExampleClass
{
    // Class constant
    public const MAX_VALUE = 100;

    /**
     * Public property.
     *
     * @var string
     */
    public $publicProperty = 'public';

    /**
     * Protected property.
     *
     * @var int
     */
    protected $protectedProperty = 1;

    /**
     * Private property.
     *
     * @var array
     */
    private $privateProperty = [];

    /**
     * Static property.
     *
     * @var string
     */
    private static $staticProperty = 'static';

    /**
     * Constructor.
     *
     * Initializes the object.  This constructor is intentionally
     * verbose to provide more code for the review tool to analyze.
     */
    public function __construct()
    {
        $this->privateProperty = [];
        $this->protectedProperty = 1;
        $this->publicProperty = 'Hello';
    }

    /**
     * A simple method.
     *
     * This method demonstrates a simple function with a single
     * parameter and a return value.
     *
     * @param int $x the input value
     *
     * @return int the result
     */
    public function simpleMethod($x)
    {
        return $x * 2;
    }

    /**
     * Method with a long name.
     *
     * This method has a very long name to test how the
     * review tool handles long identifiers.
     *
     * @param string $veryLongParameterName a very long parameter name
     *
     * @return string
     */
    public function aVeryVeryVeryVeryVeryVeryVeryVeryVeryVeryLongMethodName($veryLongParameterName)
    {
        return $veryLongParameterName.' processed';
    }

    /**
     * Method with multiple parameters.
     *
     * This method demonstrates a function with multiple parameters
     * of different types.
     *
     * @param int    $a the first parameter
     * @param string $b the second parameter
     * @param bool   $c the third parameter
     * @param array  $d the fourth parameter
     *
     * @return array
     */
    public function multiParamMethod($a, $b, $c, $d)
    {
        return [$a, $b, $c, $d];
    }

    /**
     * Method with a complex conditional.
     *
     * This method demonstrates a complex conditional statement
     * with multiple conditions and logical operators.
     *
     * @param int $x
     * @param int $y
     *
     * @return bool
     */
    public function complexConditional($x, $y)
    {
        if (($x > 10 && $y < 20) || ($x == 5 && $y != 10) || !($x < 0)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Method with a loop.
     *
     * This method demonstrates a `for` loop.
     *
     * @param int $limit the loop limit
     *
     * @return int the sum of numbers from 0 to limit
     */
    public function methodWithLoop($limit)
    {
        $sum = 0;
        for ($i = 0; $i <= $limit; ++$i) {
            $sum += $i;
        }

        return $sum;
    }

    /**
     * Method with a switch statement.
     *
     * This method demonstrates a `switch` statement.  It's
     * intentionally missing a `break` in one of the cases.
     *
     * @param int $value the input value
     *
     * @return string
     */
    public function methodWithSwitch($value)
    {
        switch ($value) {
            case 1:
                return 'One'; // Missing break intentionally.
            case 2:
                return 'Two';
                break;
            case 3:
                return 'Three';
                break;
            default:
                return 'Unknown';
        }
    }

    /**
     * Method with a try-catch block.
     *
     * This method demonstrates exception handling using a
     * `try-catch` block.
     *
     * @param int $x the input value
     *
     * @return int|string
     *
     * @throws Exception if $x is negative
     */
    public function methodWithTryCatch($x)
    {
        try {
            if ($x < 0) {
                throw new Exception('Value must be positive');
            }

            return $x * 3;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Method with an unused variable.
     *
     * This method includes an unused variable (`$unusedVariable`)
     * to test if the review tool can detect it.
     *
     * @return string
     */
    public function methodWithUnusedVariable()
    {
        $unusedVariable = 'This variable is not used.';
        $usedVariable = 'This variable is used';

        return $usedVariable;
    }

    /**
     * Method with a possible null pointer.
     *
     * @return string
     */
    public function methodWithPossibleNullPointer(?array $data)
    {
        // Potential issue: $data might be null, leading to an error.
        return $data['key'];
    }

    /**
     * Demonstrates use of a constant and a static method.
     */
    public function demoClassFeatures()
    {
        echo 'Max Value: '.self::MAX_VALUE."\n";
        echo 'Static Property: '.self::getStaticProperty()."\n";
    }

    /**
     * Gets the static property.
     *
     * @return string
     */
    public static function getStaticProperty()
    {
        return self::$staticProperty;
    }

    /**
     * Sets the static property.
     *
     * @param string $value the new value for the static property
     */
    public static function setStaticProperty($value)
    {
        self::$staticProperty = $value;
    }

    /**
     * Example of bad practice: Suppressing errors.
     *
     * @param string $filename
     *
     * @return bool|string
     */
    public function badPracticeErrorSuppression($filename)
    {
        //  return @file_get_contents($filename); // Using @ to suppress errors is bad.
        if (file_exists($filename)) {
            return file_get_contents($filename);
        }

        return false;
    }

    /**
     * Example of concatenation within a loop.
     *
     * @return string
     */
    public function stringConcatenationInLoop(array $items)
    {
        $result = '';
        foreach ($items as $item) {
            $result .= $item; // Inefficient string concatenation.
        }

        return $result;
    }

    /**
     * Example of a function that does not have a return type.
     *
     * @param string $input
     */
    public function methodWithoutReturnType($input)
    {
        echo $input;
    }

    /**
     * Example of a function that returns null.
     *
     * @return null
     */
    public function returnsNull()
    {
        return null;
    }
}

// Example usage (outside the class definition)
$example = new ExampleClass();
echo $example->simpleMethod(5)."\n";
echo $example->aVeryVeryVeryVeryVeryVeryVeryVeryVeryVeryLongMethodName('Test')."\n";
print_r($example->multiParamMethod(1, 'two', true, [4, 5, 6]))."\n";
echo $example->complexConditional(11, 19)."\n";
echo $example->methodWithLoop(10)."\n";
echo $example->methodWithSwitch(1)."\n";
echo $example->methodWithSwitch(2)."\n";
echo $example->methodWithSwitch(5)."\n";
echo $example->methodWithTryCatch(5)."\n";
echo $example->methodWithTryCatch(-10)."\n";
echo $example->methodWithUnusedVariable()."\n";
$example->demoClassFeatures();
ExampleClass::setStaticProperty('New Static Value');
echo ExampleClass::getStaticProperty()."\n";

$data = ['key' => 'value'];
echo $example->methodWithPossibleNullPointer($data)."\n";
echo $example->methodWithPossibleNullPointer(null)."\n"; // This will produce an error.

$items = ['a', 'b', 'c'];
echo $example->stringConcatenationInLoop($items);
$example->methodWithoutReturnType('Hello');
var_dump($example->returnsNull());
