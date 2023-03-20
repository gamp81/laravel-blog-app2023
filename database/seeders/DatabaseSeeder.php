<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    Category::create([
      'name' => 'Programming',
      'slug' => 'programming',
    ]);

    Category::create([
      'name' => 'Personal',
      'slug' => 'personal',
    ]);

    Category::create([
      'name' => 'Web Design',
      'slug' => 'web-design',
    ]);

    User::create([
      'name' => 'Gonzalo Moncada',
      'username' => 'Gonzalo',
      'email' => 'gmiti@gmail.com',
      'password' => bcrypt('12345678'),
    ]);

    User::factory(5)->create();
    Post::factory(20)->create();


    // User::create([
    //     'name' => 'Andri Sukma',
    //     'email' => 'andri@gmail.com',
    //     'password' => bcrypt('12345'),
    // ]);


    // Post::create([
    //     'title' => 'First Title',
    //     'slug' => 'first-title',
    //     'category_id' => 1,
    //     'user_id' => 1,
    //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora enim incidunt iure doloribus esse ipsa ratione commodi, voluptatem debitis libero autem eos obcaecati vel? Iste quis obcaecati perspiciatis soluta rem. Deleniti cum maxime exercitationem ut voluptas quis fuga eum dignissimos at debitis similique,</p><p> nihil alias adipisci architecto ducimus cupiditate voluptate facere iusto? Iusto, ab perspiciatis! Beatae harum odio fugit! Impedit obcaecati adipisci natus, quisquam dicta assumenda voluptate ullam fugit, optio sint incidunt! Explicabo magni quam tempore laudantium praesentium mollitia,</p><p> pariatur nihil fugiat nesciunt repudiandae delectus hic quos aliquid dolore vitae non aspernatur assumenda corporis similique quae sunt. Molestiae odio, deleniti tenetur eveniet repellendus aliquid aliquam voluptatum alias corrupti nisi. Dolorem totam vero quibusdam illo dicta minima ratione doloribus et quidem nesciunt, illum sint quas consequatur odio explicabo nostrum eveniet saepe facere aut beatae libero excepturi vitae. Provident explicabo voluptates non, praesentium debitis dolorum nulla voluptatum, dolorem quis voluptatibus at rem!</p>',
    // ]);

    // Post::create([
    //     'title' => 'Second Title',
    //     'slug' => 'second-title',
    //     'category_id' => 1,
    //     'user_id' => 1,
    //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora enim incidunt iure doloribus esse ipsa ratione commodi, voluptatem debitis libero autem eos obcaecati vel? Iste quis obcaecati perspiciatis soluta rem. Deleniti cum maxime exercitationem ut voluptas quis fuga eum dignissimos at debitis similique,</p><p> nihil alias adipisci architecto ducimus cupiditate voluptate facere iusto? Iusto, ab perspiciatis! Beatae harum odio fugit! Impedit obcaecati adipisci natus, quisquam dicta assumenda voluptate ullam fugit, optio sint incidunt! Explicabo magni quam tempore laudantium praesentium mollitia,</p><p> pariatur nihil fugiat nesciunt repudiandae delectus hic quos aliquid dolore vitae non aspernatur assumenda corporis similique quae sunt. Molestiae odio, deleniti tenetur eveniet repellendus aliquid aliquam voluptatum alias corrupti nisi. Dolorem totam vero quibusdam illo dicta minima ratione doloribus et quidem nesciunt, illum sint quas consequatur odio explicabo nostrum eveniet saepe facere aut beatae libero excepturi vitae. Provident explicabo voluptates non, praesentium debitis dolorum nulla voluptatum, dolorem quis voluptatibus at rem!</p>',
    // ]);

    // Post::create([
    //     'title' => 'Third Title',
    //     'slug' => 'third-title',
    //     'category_id' => 2,
    //     'user_id' => 1,
    //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora enim incidunt iure doloribus esse ipsa ratione commodi, voluptatem debitis libero autem eos obcaecati vel? Iste quis obcaecati perspiciatis soluta rem. Deleniti cum maxime exercitationem ut voluptas quis fuga eum dignissimos at debitis similique,</p><p> nihil alias adipisci architecto ducimus cupiditate voluptate facere iusto? Iusto, ab perspiciatis! Beatae harum odio fugit! Impedit obcaecati adipisci natus, quisquam dicta assumenda voluptate ullam fugit, optio sint incidunt! Explicabo magni quam tempore laudantium praesentium mollitia,</p><p> pariatur nihil fugiat nesciunt repudiandae delectus hic quos aliquid dolore vitae non aspernatur assumenda corporis similique quae sunt. Molestiae odio, deleniti tenetur eveniet repellendus aliquid aliquam voluptatum alias corrupti nisi. Dolorem totam vero quibusdam illo dicta minima ratione doloribus et quidem nesciunt, illum sint quas consequatur odio explicabo nostrum eveniet saepe facere aut beatae libero excepturi vitae. Provident explicabo voluptates non, praesentium debitis dolorum nulla voluptatum, dolorem quis voluptatibus at rem!</p>',
    // ]);

    // Post::create([
    //     'title' => 'Fourth Title',
    //     'slug' => 'fourth-title',
    //     'category_id' => 2,
    //     'user_id' => 2,
    //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora enim incidunt iure doloribus esse ipsa ratione commodi, voluptatem debitis libero autem eos obcaecati vel? Iste quis obcaecati perspiciatis soluta rem. Deleniti cum maxime exercitationem ut voluptas quis fuga eum dignissimos at debitis similique,</p><p> nihil alias adipisci architecto ducimus cupiditate voluptate facere iusto? Iusto, ab perspiciatis! Beatae harum odio fugit! Impedit obcaecati adipisci natus, quisquam dicta assumenda voluptate ullam fugit, optio sint incidunt! Explicabo magni quam tempore laudantium praesentium mollitia,</p><p> pariatur nihil fugiat nesciunt repudiandae delectus hic quos aliquid dolore vitae non aspernatur assumenda corporis similique quae sunt. Molestiae odio, deleniti tenetur eveniet repellendus aliquid aliquam voluptatum alias corrupti nisi. Dolorem totam vero quibusdam illo dicta minima ratione doloribus et quidem nesciunt, illum sint quas consequatur odio explicabo nostrum eveniet saepe facere aut beatae libero excepturi vitae. Provident explicabo voluptates non, praesentium debitis dolorum nulla voluptatum, dolorem quis voluptatibus at rem!</p>',
    // ]);

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
  }
}
