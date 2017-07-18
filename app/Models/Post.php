<?php

namespace App\Models;

/**
 * Class Post
 * @package App\Models
 */
class Post extends Model
{
    /**
     * The database table
     * @var string $table_name
     */
    public static $table_name = 'posts';

    /**
     * Relationship between Post and User
     * @var array $belongs_to
     */
    public static $belongs_to = ['user'];

    /**
     * Relationship between Post and Comment.
     * @var array $has_many
     */
    public static $has_many = [['comment']];
}