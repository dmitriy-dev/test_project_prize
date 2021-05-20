<?php


namespace Core\Entities;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Prize
 * @package Core\Prize
 *
 * @property int    $id
 * @property int    $name
 * @property string $value
 * @property string $type
 * @property int    $user_id
 * @property User   $user
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Prize extends Model
{
    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return bool
     */
    public function isMoney(): bool
    {
        return $this->type === PrizeType::TYPE_MONEY;
    }

    /**
     * @return bool
     */
    public function isBonus(): bool
    {
        return $this->type === PrizeType::TYPE_BONUS;
    }

    /**
     * @return bool
     */
    public function isSubject(): bool
    {
        return $this->type === PrizeType::TYPE_SUBJECT;
    }
}
