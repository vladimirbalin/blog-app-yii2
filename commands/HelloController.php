<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Post;
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
    public $faker;
    public function __construct($id, $module, $config = [])
    {
        $this->faker = Factory::create();
        parent::__construct($id, $module, $config);
    }

    public function actionIndex($email = 'brajke@mail.com')
    {
        $first_name = $this->faker->firstName('male');
        $last_name = $this->faker->lastName;
        $address = $this->faker->address;
        $city = $this->faker->city;
        $phone = $this->faker->phoneNumber;
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
    public function actionAddArticle()
    {
        $model = new Post();
        $model->title = $this->faker->text(50);
        $model->body = $this->faker->text(2000);
        $model->created_by = 28;
        $model->save();
    }
}
