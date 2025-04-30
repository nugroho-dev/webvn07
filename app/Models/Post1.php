<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class Post
{
    private static $blog_posts =
    [
        [
            "title" => "Judul Pertama",
            "slug" => "judul-pertama",
            "author" => "Admin",
            "body" => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime ad, ratione veniam, provident sapiente excepturi cumque nobis error, blanditiis temporibus officiis? Numquam dolore consequatur cupiditate, maiores error voluptas cum provident natus illo earum similique deserunt alias quidem asperiores, explicabo tenetur adipisci? Accusamus necessitatibus dolorem ab dolores. Earum sequi praesentium cumque vitae deserunt delectus alias labore commodi, eum unde voluptatum vero error voluptate voluptates, rem qui odio aliquam quasi omnis blanditiis. Sequi dolore tempore voluptas quia enim perferendis provident iure cum voluptate atque nobis repellat quidem in vero doloremque, perspiciatis voluptatibus dolorum quam incidunt blanditiis eligendi hic sunt ducimus! Beatae qui placeat error quia eligendi maxime commodi ipsum numquam repellat, tempora aspernatur sequi maiores at dignissimos officia blanditiis voluptatum? Distinctio ipsum recusandae iste inventore tempore nam numquam ipsam vel minus praesentium. Nobis, explicabo maxime possimus tempora consectetur fuga dolor corporis provident ratione exercitationem eum aliquam sapiente nam ex est maiores nulla minima sequi esse, atque vel. Nobis aliquid id, at consectetur sit aperiam. Placeat error voluptatum dignissimos possimus repellendus! Ab, unde! Est impedit provident, at commodi adipisci dignissimos ipsum. Perspiciatis ratione sint eos nulla placeat dolore dolorem facilis corporis cumque similique iste, impedit quam exercitationem expedita earum? Eveniet molestiae debitis repudiandae quibusdam nihil nemo aspernatur vel exercitationem! Nihil expedita fuga omnis minus, molestias perspiciatis ducimus totam qui recusandae! Molestias nobis autem eum, commodi totam assumenda nulla eveniet laboriosam est atque voluptates qui tempora molestiae quisquam numquam possimus vel earum voluptatem ipsa quaerat? Consequuntur quidem a eaque culpa quaerat tempore numquam dicta.'
        ],
        [
            "title" => "Judul Kedua",
            "slug" => "judul-kedua",
            "author" => "Admin",
            "body" => 'Earum sequi praesentium cumque vitae deserunt delectus alias labore commodi, eum unde voluptatum vero error voluptate voluptates, rem qui odio aliquam quasi omnis blanditiis. Sequi dolore tempore voluptas quia enim perferendis provident iure cum voluptate atque nobis repellat quidem in vero doloremque, perspiciatis voluptatibus dolorum quam incidunt blanditiis eligendi hic sunt ducimus! Beatae qui placeat error quia eligendi maxime commodi ipsum numquam repellat, tempora aspernatur sequi maiores at dignissimos officia blanditiis voluptatum? Distinctio ipsum recusandae iste inventore tempore nam numquam ipsam vel minus praesentium. Nobis, explicabo maxime possimus tempora consectetur fuga dolor corporis provident ratione exercitationem eum aliquam sapiente nam ex est maiores nulla minima sequi esse, atque vel. Nobis aliquid id, at consectetur sit aperiam. Placeat error voluptatum dignissimos possimus repellendus! Ab, unde! Est impedit provident, at commodi adipisci dignissimos ipsum. Perspiciatis ratione sint eos nulla placeat dolore dolorem facilis corporis cumque similique iste, impedit quam exercitationem expedita earum? Eveniet molestiae debitis repudiandae quibusdam nihil nemo aspernatur vel exercitationem! Nihil expedita fuga omnis minus, molestias perspiciatis ducimus totam qui recusandae! Molestias nobis autem eum, commodi totam assumenda nulla eveniet laboriosam est atque voluptates qui tempora molestiae quisquam numquam possimus vel earum voluptatem ipsa quaerat? Consequuntur quidem a eaque culpa quaerat tempore numquam dicta.'
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }
    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
