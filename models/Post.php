<?php


namespace app\models;


use app\monirdev\phpcore\db\DbModel;

class Post extends DbModel
{
    public int $id = 0;
    public string $title = '';
    public ?string $body = '';
    public ?string $image = '';
    public string $user_id = '';

    public static function tableName(): string
    {
        return 'posts';
    }

    public function attributes(): array
    {
        return ['title', 'body', 'image', 'user_id'];
    }

    public function labels(): array
    {
        return [
            'title' => 'Post Title',
            'body' => 'Post Body',
            'image' => 'Image'
        ];
    }

    public function rules()
    {
        return [
            'title' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 255]]
        ];
    }
}