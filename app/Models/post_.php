<?php

namespace App\Models;

class post
{
    private static $blog_posts = [
        [
            "judul" => "Ashiapp1",
            "slug" => "ashiapp1",
            "author" => "Aditya Kesuma",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nemo aliquam amet minima! Nostrum voluptatibus laudantium, quaerat, veniam, ex sapiente maxime ea perspiciatis eius est accusantium suscipit laboriosam esse sequi laborum libero repellat saepe blanditiis cupiditate optio asperiores quod beatae! Assumenda, soluta vel itaque quia ratione veritatis provident consequatur debitis eos? Laudantium at, harum dolor fuga consequuntur doloribus magnam necessitatibus nulla asperiores non rem sint porro libero totam ea eum amet consectetur quam officia eaque veritatis blanditiis sequi fugit mollitia?"
        ],
        [
            "judul" => "Ashiap2",
            "slug" => "Ashiap2",
            "author" => "Aditya Kesuma",
            "body"  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates quibusdam dolore eos perferendis, fugiat voluptas sit provident neque quia dolores rerum quisquam, culpa nemo sed, fuga animi modi repellendus minima repudiandae! Eius accusantium soluta cumque dolor nulla fugiat maxime earum."
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p["slug"] === $slug) {
        //         $post = $p;
        //     }
        // }
        return $posts->firstwhere('slug', $slug);
    }
}