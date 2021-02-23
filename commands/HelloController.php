<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\User;
use Faker\Factory;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    public function actionIndex($email = 'brajke@mail.com')
    {
        $faker = Factory::create();
        $first_name = $faker->firstName('male');
        $last_name = $faker->lastName;
        $address = $faker->address;
        $city = $faker->city;
        $phone = $faker->phoneNumber;
        $user = User::findByEmail($email)->updateAttributes(
            [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'address' => $address,
                'city' => $city,
                'phone' => $phone
            ]);
        echo "User with email: $email, now has next values first_name = $first_name, last_name => $last_name, address = $address, city = $city, phone = $phone";
    }
}
