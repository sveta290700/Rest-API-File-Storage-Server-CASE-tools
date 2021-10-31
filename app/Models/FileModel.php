<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class FileModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'size', 'path'
    ];

    /**
     * @return mixed|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed|string $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return int|mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int|mixed $size
     */
    public function setSize($size): void
    {
        $this->size = $size;
    }

    /**
     * @return false|mixed|string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param false|mixed|string $path
     */
    public function setPath($path): void
    {
        $this->path = $path;
    }

}
