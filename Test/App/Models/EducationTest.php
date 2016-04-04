<?php
use Core\Config;

require_once realpath(__DIR__ . '/../../../Core/Loader/autoload.php');


/**
 * Created by IntelliJ IDEA.
 * User: Tanat
 * Date: 04.04.2016
 * Time: 12:44
 */
class EducationTest extends PHPUnit_Framework_TestCase
{

    public function testEducation()
    {
        new Config(__DIR__ . '/../../../App/config.php');
        $education = \App\Models\Education::getAll();

        var_dump($education);

        $this->assertTrue(false);
    }
}
