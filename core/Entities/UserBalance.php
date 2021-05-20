<?php


namespace Core\Entities\UserBalance;


use Carbon\Carbon;
use Core\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

/**
 * Class UserBalance
 * @package Core\Balance
 *
 * @property int            $id
 * @property int            $user_id
 * @property User           $user
 * @property float          $amount
 * @property UserBalanceLog $logs
 * @property Carbon         $created_at
 * @property Carbon         $updated_at
 */
class UserBalance extends Model
{
    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function logs(): HasMany
    {
        return $this->hasMany(UserBalanceLog::class);
    }

    /**
     * @param float $amount
     */
    public function increaseBalance(float $amount): void
    {
        $this->changeBalance($amount, UserBalanceType::TYPE_INCOME);
    }

    /**
     * @param float $amount
     */
    public function decreaseBalance(float $amount): void
    {
        if ($this->amount < $amount) {
            throw new \DomainException('На балансе не хватает средств');
        }

        $this->changeBalance(-$amount, UserBalanceType::TYPE_OUTCOME);
    }

    /**
     * @param float  $amount
     * @param string $type
     */
    private function changeBalance(float $amount, string $type): void
    {
        DB::transaction(function () use ($amount, $type) {
            $this->amount = $amount;

            $this->saveOrFail();

            $this->logs()->create([
                'amount' => $amount,
                'type'   => $type,
            ]);
        });
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
