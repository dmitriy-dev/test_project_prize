<?php


namespace Core\Entities\UserBalance;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserBalance
 * @package Core\Balance
 *
 * @property int         $id
 * @property int         $user_balance_id
 * @property UserBalance $balance
 * @property float       $amount
 * @property string      $type
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 */
class UserBalanceLog extends Model
{
    /**
     * @return BelongsTo
     */
    public function balance(): BelongsTo
    {
        return $this->belongsTo(UserBalance::class);
    }

    /**
     * @param int $value
     * @return float
     */
    public function getAmountAttribute(int $value): float
    {
        return $value / 100;
    }

    /**
     * @param float $value
     * @return int
     */
    public function setAmountAttribute(float $value): int
    {
        return round($value, 2) * 100;
    }
}
