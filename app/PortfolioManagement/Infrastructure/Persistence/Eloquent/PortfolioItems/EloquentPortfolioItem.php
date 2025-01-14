<?php

namespace App\PortfolioManagement\Infrastructure\Persistence\Eloquent\PortfolioItems;

/**
 * @property string $title_en
 * @property string $title_nl
 * @property string $main_image_url;
 * @property string $description_en;
 * @property string $description_nl;
 * @property string $website_url
 */
class EloquentPortfolioItem extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "portfolio_items";
    protected $fillable = [
        "title_nl", "title_en", "main_image_url", "description_nl", "description_en", "website_url"
    ];

    public function save(array $options = [])
    {
        $save = parent::save($options); // TODO: Change the autogenerated stub
        $this->tags()->saveMany($this->tags);
        $this->images()->saveMany($this->images);
        $this->bulletPoints()->saveMany($this->bulletPoints);
        return $save;
    }

    public function tags()
    {
        return $this->belongsToMany(EloquentTag::class, "portfolio_item_tag", "portfolio_item_id", "tag_id");
    }

    public function images()
    {
        return $this->hasMany(EloquentImage::class, 'portfolio_item_id');
    }

    public function bulletPoints()
    {
        return $this->hasMany(EloquentBulletPoint::class, 'portfolio_item_id');
    }
}
