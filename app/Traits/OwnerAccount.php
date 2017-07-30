<?php
namespace Api\Traits;

use Api\Models\Access\AccountModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait OwnerAccount{

    protected $loadAccount = true;

    public function __construct(array $attributes = []){
        $this->loadAccount();
        parent::__construct($attributes);
    }

    protected function loadAccount(){
        if($this->loadAccount){
            array_push($this->fillable,'account_id');
            array_push($this->hidden,'account_id');
            array_push($this->appends,'account');
        }
    }

    protected function account():BelongsTo{
        return $this->belongsTo(
            AccountModel::class,
            'account_id',
            'id'
        );
    }
    protected function getAccountAttribute():Model{
        return $this->account()->get(['code','title'])->first();
    }

}