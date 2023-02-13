<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\User;
use App\Models\Reset;
use App\Models\Course;
use App\Models\Finish;
use App\Models\Module;
use App\Models\Category;
use App\Models\Progress;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Артём',
            'surname' => 'Баджиев',
            'patronymic' => 'Артурович',
            'email' => 'jomet30443@sunetoa.com',
            'password' => Hash::make('qwerty123'),
            'organization' => 'Google',
            'region' => 'Краснодарский край',
            'city' => 'Краснодар',
            'address' => 'ул. Пушкина, д.123, кв.21',
            'postcode' => '439589324',
            'phone' => '893419284460',
            'remember_token' => Str::random(10),
            'selector' => Str::random(250),
        ]);
        $user->register_verified = true;
        $user->selector = null;
        $user->save();
        $reset = Reset::create([
            'new_password' => null,
            'selector' => null,
            'user_id' => $user->id,
        ]);

        $user1 = User::create([
            'name' => 'Марсель',
            'surname' => 'Сидоренко',
            'patronymic' => 'Романович',
            'email' => 'jomet0443@sunetoa.com',
            'password' => Hash::make('qwerty123'),
            'organization' => 'Google',
            'region' => 'Краснодарский край',
            'city' => 'Краснодар',
            'address' => 'ул. Пушкина, д.123, кв.21',
            'postcode' => '439589324',
            'phone' => '893419284460',
            'remember_token' => Str::random(10),
            'selector' => Str::random(250),
        ]);
        $user1->register_verified = true;
        $user1->selector = null;
        $user1->save();
        $reset1 = Reset::create([
            'new_password' => null,
            'selector' => null,
            'user_id' => $user1->id,
        ]);

        $user2 = User::create([
            'name' => 'Кирилл',
            'surname' => 'Галимов',
            'patronymic' => 'Артёмович',
            'email' => 'jomet3044@sunetoa.com',
            'password' => Hash::make('qwerty123'),
            'organization' => 'Google',
            'region' => 'Краснодарский край',
            'city' => 'Краснодар',
            'address' => 'ул. Пушкина, д.123, кв.21',
            'postcode' => '439589324',
            'phone' => '893419284460',
            'remember_token' => Str::random(10),
            'selector' => Str::random(250),
        ]);
        $user2->register_verified = true;
        $user2->selector = null;
        $user2->save();
        $reset2 = Reset::create([
            'new_password' => null,
            'selector' => null,
            'user_id' => $user2->id,
        ]);

        $categories = [
            'Дошкольное образование',
            'Дорожно-транспортный комплекс',
            'Водитель',
            'Охрана труда',
            'Дошкольное образование',
        ];
        
        $types = [
            'Программы повышения квалификации',
            'Программы профессиональной переподготовки',
            'Программы профессионального обучения'
        ];

        foreach($categories as $el){
            Category::create([
                'name' => $el,
            ]);
        }
        foreach($types as $el){
            Type::create([
                'name' => $el,
            ]);
        }
        for($i = 1; $i <= 10; $i++){
            Course::create([
                'title' => 'ПОВЫШЕНИЕ КВАЛИФИКАЦИИ ПРЕПОДАВАТЕЛЕЙ, ОСУЩЕСТВЛЯЮЩИХ ПРОФЕССИОНАЛЬНОЕ ОБУЧЕНИЕ ВОДИТЕЛЕЙ ТРАНСПОРТНЫХ СРЕДСТВ РАЗЛИЧНЫХ КАТЕГОРИЙ И ПОДКАТЕГОРИЙ ПО ПРЕДМЕТУ «ПЕРВАЯ ПОМОЩЬ ПРИ ДОРОЖНО-ТРАНСПОРТНОМ ПРОИСШЕСТВИИ»'.$i,
                'descr' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Totam tempore a, doloremque eos harum dolore dolorum
                architecto eaque illum autem rem commodi, facilis amet omnis
                earum, dignissimos officiis sed. Error. Lorem ipsum dolor
                sit amet consectetur adipisicing elit. Laboriosam harum
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Ipsum consequatur non laudantium aliquid aut ea animi
                veritatis ratione corrupti? Voluptatem perspiciatis ea
                asperiores perferendis veniam obcaecati rem numquam unde
                sint. Lorem ipsum dolor sit amet consectetur adipisicing
                elit. Voluptate numquam molestias amet quis facilis vero
                eveniet quasi sit omnis temporibus, laboriosam facere
                mollitia nulla dignissimos repudiandae quae repellat!
                Doloribus, totam! Lorem ipsum dolor, sit amet consectetur
                adipisicing elit. Quaerat, assumenda voluptatum officia sint
                ratione vitae non sequi incidunt quas veritatis itaque
                adipisci excepturi culpa quos, explicabo fuga nulla cumque
                facilis! Lorem ipsum dolor sit amet consectetur adipisicing
                elit. Repellat at asperiores, suscipit quos cupiditate
                aliquam aut accusamus blanditiis laborum commodi dicta,
                facilis illo odit excepturi quia voluptatum! Vel, rem
                accusamus? Lorem ipsum, dolor sit amet consectetur
                adipisicing elit. A, modi adipisci hic aliquid commodi quae
                quasi nostrum enim, veniam quisquam praesentium quas
                explicabo et laborum vero distinctio, incidunt earum
                corporis. Lorem ipsum dolor sit amet consectetur,
                adipisicing elit. Voluptas atque voluptates inventore
                similique perferendis, sit animi, sed quaerat esse facilis
                ad, excepturi reprehenderit reiciendis optio veritatis id
                recusandae quis odio. Lorem ipsum dolor sit amet,
                consectetur adipisicing elit. Doloribus eos obcaecati quasi
                soluta quibusdam, unde, maiores voluptates vero, fugit nobis
                ipsum facilis laudantium alias quis doloremque provident
                voluptas? Ipsam, ad. Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Quas magnam, explicabo asperiores earum
                reprehenderit incidunt recusandae adipisci alias quo enim
                commodi libero officia similique ipsa nostrum numquam
                deleniti laudantium? Inventore? Lorem ipsum, dolor sit amet
                consectetur adipisicing elit. Maxime voluptatem architecto
                dolore minus earum. Hic nesciunt est vero quis! Labore
                voluptatem porro deleniti iste dolor nisi, veniam ipsam
                voluptate dolorem! Lorem ipsum dolor sit amet, consectetur
                adipisicing elit. Iusto accusamus rerum est soluta corporis
                blanditiis. Impedit beatae reiciendis similique dolore iusto
                veritatis nisi sit, eveniet, quas, illo animi labore
                facere.lo lo Lorem ipsum dolor sit, amet consectetur
                adipisicing elit. Laudantium numquam voluptatibus
                repudiandae, voluptatem eum culpa modi nulla qui itaque
                possimus dolor impedit debitis perspiciatis optio eligendi
                iste et at dignissimos? Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Id culpa, aspernatur
                repudiandae fuga ea eveniet corrupti earum tempore voluptate
                illum sit voluptatum ut commodi eaque sint sed, veniam
                quidem asperiores! Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Natus quis quod quo eligendi sapiente
                minima asperiores. Assumenda tempora architecto sunt. Quia
                repudiandae mollitia doloremque enim possimus minima. Enim,
                error sit? Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Quam quo quos aut dignissimos, reiciendis
                illum odit ipsum non velit, corporis quasi expedita
                perspiciatis laborum fugiat neque fugit perferendis nobis.
                Corrupti. Lorem ipsum dolor, sit amet consectetur
                adipisicing elit. Provident laboriosam inventore ullam nisi
                vitae fuga illum ex incidunt officia, voluptate veritatis
                culpa quam adipisci facere distinctio cum qui reiciendis
                fugit! tempora nihil nulla sapiente ullam amet animi
                mollitia error temporibus nesciunt fuga commodi perspiciatis
                tempore, non similique quisquam repellendus aperiam? В
                процессе обучения предусмотрено изучение лекционного
                материала, согласно учебно-тематическому плану,
                промежуточное тестирование. По окончанию обучения сдается
                итоговая аттестация, в форме тестирования. Для прохождение
                итоговой аттестации обучаемому дается 3 попытки. Время
                прохождения тестирования неограниченно. Обучаемому после
                изучения курса выдается удостоверение о повышении
                квалификации.',
                'price' => 100,
                'period' => '14 месяцев 2 дня',
                'docs' => '{"natural":"sadkfjlaskdjfqoiioe\/Vz2oNmoaZAIdm77q2XiMxp5EUTGEm11FNDFpAd2y.pdf","legal":"sadkfjlaskdjfqoiioe\/OWDnC4qt109IiSft3EHDocfAkTeQd6sgKcgQEbuo.pdf"}',
                'category_id' => $i % 6 == 0 ? 1 : $i % 6,
                'type_id' => $i % 4 == 0 ? 1 : $i % 4
            ]);
        }
        Module::create([
            'title' => 'Модуль Лекций 1',
            'type' => 'lectures',
            'list' => '[
                "lectures/dadas.pdf",
                "lectures/normal.pdf",
                "lectures/popopo.pdf"
               ]',
            'min_level' => 100,
            'course_id' => 1,
            'priority' => 1,
            'alias' => Str::random(100),
        ]);
        Module::create([
            'title' => 'Модуль Видео 1',
            'type' => 'videos',
            'list' => '[
                "videos/video1.mp4",
                "videos/video2.mp4",
                "videos/video3.mp4"
               ]',
            'min_level' => 100,
            'course_id' => 1,
            'priority' => 2,
            'alias' => Str::random(100),
        ]);
        Module::create([
            'title' => 'Модуль Тестов 1',
            'type' => 'test',
            'list' => '[
                        ["\u041c\u0430\u0440\u043a\u0430 \u0430\u0432\u0442\u043e \u0411\u0430\u0434\u0436\u0438\u043a\u0430 \u041f\u041e\u0412\u042b\u0428\u0415\u041d\u0418\u0415 \u041a\u0412\u0410\u041b\u0418\u0424\u0418\u041a\u0410\u0426\u0418\u0418 \u041f\u0420\u0415\u041f\u041e\u0414\u0410\u0412\u0410\u0422\u0415\u041b\u0415\u0419, \u041e\u0421\u0423\u0429\u0415\u0421\u0422\u0412\u041b\u042f\u042e\u0429\u0418\u0425 \u041f\u0420\u041e\u0424\u0415\u0421\u0421\u0418\u041e\u041d\u0410\u041b\u042c\u041d\u041e\u0415 \u041e\u0411\u0423\u0427\u0415\u041d\u0418\u0415 \u0412\u041e\u0414\u0418\u0422\u0415\u041b\u0415\u0419 \u0422\u0420\u0410\u041d\u0421\u041f\u041e\u0420\u0422\u041d\u042b\u0425\u041f\u041e\u0412\u042b\u0428\u0415\u041d\u0418\u0415 \u041a\u0412\u0410\u041b\u0418\u0424\u0418\u041a\u0410\u0426\u0418\u0418 \u041f\u0420\u0415\u041f\u041e\u0414\u0410\u0412\u0410\u0422\u0415\u041b\u0415\u0419, \u041e\u0421\u0423\u0429\u0415\u0421\u0422\u0412\u041b\u042f\u042e\u0429\u0418\u0425 \u041f\u0420\u041e\u0424\u0415\u0421\u0421\u0418\u041e\u041d\u0410\u041b\u042c\u041d\u041e\u0415 \u041e\u0411\u0423\u0427\u0415\u041d\u0418\u0415 \u0412\u041e\u0414\u0418\u0422\u0415\u041b\u0415\u0419 \u0422\u0420\u0410\u041d\u0421\u041f\u041e\u0420\u0422\u041d\u042b\u0425", "\u0424\u0430\u043c\u0438\u043b\u0438\u044f \u0415\u043b\u0438\u0437\u0430\u0432\u0435\u0442\u044b \u0415\u043b\u044c\u0447\u0438\u0449\u0435\u0432\u043e\u0439 ", "\u041b\u0443\u0447\u0448\u0430\u044f \u043c\u0430\u0440\u043a\u0430 \u0430\u0432\u0442\u043e", "\u041a\u0430\u043a\u043e\u0439 \u0442\u0435\u043b\u0435\u0444\u043e\u043d \u0443 \u0415\u043b\u044c\u0447\u0438\u0449\u0435\u0432\u043a\u0438", "\u041c\u043e\u044f \u0432\u0438\u0434\u0435\u043e\u043a\u0430\u0440\u0442\u0430", "\u041c\u043e\u044f \u0432\u0438\u0434\u0435\u043e\u043a\u0430\u0440\u0442\u0430"],
                        [
                            ["lada ", "Mercedes", "BMW ", "Volvo", "toyota", "Chevrolet"],
                            ["\u0418\u0432\u0430\u043d\u043e\u0432\u0430", "\u0415\u043b\u044c\u0447\u0438\u0449\u0435\u0432\u0430 "],
                            ["Porshe", "BMW", "Mercedes"],
                            ["Nokia", "SAMSUNG", "Xiaomi", "Honor", "Iphone"],
                            ["GTX 2060", "GTX 1660", "GTX 1060", "GTX 3060"],
                            ["GTX 2060", "GTX 1660", "GTX 1060", "GTX 3060"]
                        ],
                        [0, 1, 2, 4, 2, 2],
                        ["test/1557921502_pop-personazhi-19.jpg", null, "test/1625637060_7-phonoteka-org-p-monro-pop-art-krasivo-7.jpg", "test/1632260068_64-kartinkin-net-p-pop-art-iz-zhurnalov-krasivo-64.jpg", "test/1633785674_14-kartinkin-net-p-pop-art-otkritki-krasivo-14.jpg", null]
                    ]',
            'min_level' => 100,
            'course_id' => 1,
            'priority' => 3,
            'alias' => Str::random(100)
        ]);
        $user->courses()->attach(1);
        //pending, none, passed
        Progress::create([
            'user_id' => 1,
            'course_id' => 1,
            'list' => '{
                "1": {
                    "result": "pending",
                    "percent": 0,
                    "fraction": {
                        "top": 0,
                        "bottom": 3
                    }
                },
                "2": {
                    "result": "pending",
                    "percent": 0,
                    "fraction": {
                        "top": 0,
                        "bottom": 3
                    }
                },
                "3": {
                    "result": "pending",
                    "percent": 0,
                    "fraction": {
                        "top": 0,
                        "bottom": 6
                    }
                }
               }',
            'entire_progress' => 33,
            'alias' => Str::random(100)
        ]);
        Finish::create([
            'user_id' => 1,
            'course_id' => 1
        ]);
    }
}