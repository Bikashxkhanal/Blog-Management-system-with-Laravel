<?php 
namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'discription',
        'img_path',
        'user_id',
        'status',
    ];

    /**
     * Publish a new blog
     */
    public function publish(array $data)
    {
        if (empty($data['title']) || empty($data['discription']) || empty($data['user_id'])) {
            throw new Exception('Cannot create blog. Missing required fields.');
        }

        return self::create($data);
    }

    /**
     * Blog author relationship
     */
    public function user()
    {
        // child (blog) belongs to parent (user)
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
