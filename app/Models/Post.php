<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
  use HasFactory, Sluggable;

  // protected $fillable = ['title', 'body'];
  protected $guarded = ['id'];
  protected $with = ['author', 'category'];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function scopeFilter(Builder $query, array $filters)
  {
    $query->when($filters['search'] ?? false, fn () =>
    $query->where('title', 'like', "%$filters[search]%")
      ->orWhere('body', 'like', "%$filters[search]%"));

    $query->when($filters['category'] ?? false, function (Builder $query, $category) {
      return $query->whereHas('category', function (Builder $query) use ($category) {
        $query->where('slug', $category);
      });
    });

    $query->when($filters['author'] ?? false, function (Builder $query, $author) {
      return $query->whereHas('author', function (Builder $query) use ($author) {
        $query->where('username', $author);
      });
    });
  }

  public function getPostsByAuthorId(int $author_id)
  {
    return Post::where('user_id', $author_id)->get();
  }

  public function getPostsByAuthorUsername(string $username)
  {
    return Post::where('user_id', $username)->get();
  }

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }
}
