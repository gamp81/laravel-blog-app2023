<?php

namespace App\Models;

class Post
{
  private static $blog_posts = [
    [
      'title' => 'This is first blog',
      'slug' => 'this-is-first-blog',
      'author' => 'Yadi Apriyadi',
      'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore aut nisi quas in iure harum unde voluptates ratione hic. Enim, dicta? Illum, dolores sint omnis distinctio quo voluptatem nemo velit et molestias culpa maiores adipisci ratione? Sit excepturi necessitatibus officiis pariatur sunt! Debitis a dolorem quis! Quasi earum atque ipsum non, quos sapiente reiciendis nisi nihil impedit amet aliquam mollitia ipsam voluptatibus quae, dolores consectetur sit eaque suscipit vitae reprehenderit. Iure quae quo ipsa tempora cupiditate rem aspernatur, odit mollitia?',
    ],
    [
      'title' => 'This is second blog',
      'slug' => 'this-is-second-blog',
      'author' => 'Andri Sukma',
      'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste eum nobis atque rem soluta, omnis doloremque repudiandae quidem libero ad! Dolor tenetur quidem iste ab nemo minima quam fugiat totam, doloribus inventore odio architecto vitae facere aut recusandae magni pariatur laudantium! Quisquam aliquam mollitia, nostrum magni ad harum deleniti corporis modi dolores quia. Enim neque vitae quibusdam a architecto vel consectetur, blanditiis est tempora pariatur aspernatur, inventore ex facilis laborum laboriosam nesciunt esse error, dolores reiciendis autem voluptates porro quas reprehenderit eius? Reprehenderit ipsam quibusdam dolorem commodi esse nisi recusandae hic earum. Illo rem praesentium ea iure itaque, ipsam nihil.',
    ],
  ];

  public static function all()
  {
    return collect(self::$blog_posts);
  }

  public static function findOne(string $slug)
  {

    $posts = static::all();

    // $key = array_key_first(array_filter($blog_posts, fn ($elements) => $elements['slug'] === $slug));

    return $posts->firstWhere('slug', $slug);
  }
}
