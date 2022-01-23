<?php

namespace Domain\Book\Model;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;
use Infrastructure\Audit\Traits\AuditChangeLogger;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static TimePeriod find(string $id, array $columns = ['*'])
 * @method static TimePeriod findOrFail(string $id, array $columns = ['*'])
 * @method static TimePeriod findOrNew(string $id, array $columns = ['*'])
 * @method static TimePeriod sole(array $columns = ['*'])
 * @method static TimePeriod first(array $columns = ['*'])
 * @method static TimePeriod firstOrFail(array $columns = ['*'])
 * @method static TimePeriod firstOrCreate(array $filter, array $values)
 * @method static TimePeriod firstOrNew(array $filter, array $values)
 * @method static TimePeriod|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|TimePeriod lockForUpdate()
 * @method static Builder|TimePeriod select(array $columns = ['*'])
 * @method static Builder|TimePeriod with(array|string  $relations)
 * @method static Builder|TimePeriod leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|TimePeriod where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|TimePeriod whereIn(string $column, $values, $boolean = 'and', $not = false)
 * @method static Builder|TimePeriod whereNull(string|array $columns, bool $boolean = 'and')
 * @method static Builder|TimePeriod whereNotNull(string|array $columns, bool $boolean = 'and')
 * @method static Builder|TimePeriod orderBy(string $column, string $direction = 'asc')
 *
 * @property int $approximately_to_year
 * @property int $approximately_from_year
 * @property string $id
 * @property string $time_period_name
 * @property string $time_period_slug
 * @property string $time_period_description
 * @property CarbonInterface $created_at
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class TimePeriod extends Model {
    use AuditChangeLogger;

    protected $table = 'time_period';
    protected $dateFormat = 'Y-m-d H:i:sO';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'created_at' => 'immutable_datetime',
    ];

    public static function boot(): void {
        parent::boot();
        static::creating(static function (self $model) {
            if ($model->id === null) {
                $model->id = Str::uuid()->toString();
            }
        });
    }

    protected $guarded = ['id','updated_at','created_at','deleted_at'];
}
