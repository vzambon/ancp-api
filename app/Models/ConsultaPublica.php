<?php

namespace App\Models;

use Core\MeiliBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ConsultaPublica extends Model
{
    use HasFactory;
    use Searchable;

    protected $connection = 'mysql_ancp';

    protected $table = 'consulta_publica';

    protected static $serchable = [
        'nome',
        'proprietario',
        'criador',
    ];

    protected $casts = [
        'ige' => 'double',
        'aige' => 'double',
        'tige' => 'double',
        'mgte' => 'double',
        'amgte' => 'double',
        'tmgte' => 'double',
        'ddipp' => 'double',
        'adipp' => 'double',
        'tdipp' => 'double',
        'dd3p' => 'double',
        'ad3p' => 'double',
        'td3p' => 'double',
        'ddipm' => 'double',
        'adipm' => 'double',
        'tdipm' => 'double',
        'dmpp120' => 'double',
        'ampp120' => 'double',
        'tmpp120' => 'double',
        'dmpp210' => 'double',
        'ampp210' => 'double',
        'tmpp210' => 'double',
        'dmtp120' => 'double',
        'amtp120' => 'double',
        'tmtp120' => 'double',
        'dmtp210' => 'double',
        'admtp210' => 'double',
        'tmtp210' => 'double',
        'ddstay' => 'double',
        'adstay' => 'double',
        'tdstay' => 'double',
        'ddpg' => 'double',
        'adpg' => 'double',
        'tdpg' => 'double',
        'ddpn' => 'double',
        'adpn' => 'double',
        'tdpn' => 'double',
        'ddpp120' => 'double',
        'adpp120' => 'double',
        'tdpp120' => 'double',
        'ddpp210' => 'double',
        'adpp210' => 'double',
        'tdpp210' => 'double',
        'ddpp365' => 'double',
        'adpp365' => 'double',
        'tdpp365' => 'double',
        'ddpp450' => 'double',
        'adpp450' => 'double',
        'tdpp450' => 'double',
        'ddpav' => 'double',
        'adpav' => 'double',
        'tdpav' => 'double',
        'ddcar' => 'double',
        'adcar' => 'double',
        'tdcar' => 'double',
        'ddims' => 'double',
        'adims' => 'double',
        'tdims' => 'double',
        'ddpe365' => 'double',
        'adpe365' => 'double',
        'tdpe365' => 'double',
        'ddpe450' => 'double',
        'adpe450' => 'double',
        'tdpe450' => 'double',
        'ddaol' => 'double',
        'adaol' => 'double',
        'tdaol' => 'double',
        'ddacab' => 'double',
        'adacab' => 'double',
        'tdacab' => 'double',
        'ddmar' => 'double',
        'admar' => 'double',
        'tdmar' => 'double',
        'ddmac' => 'double',
        'admac' => 'double',
        'tdmac' => 'double',
        'ddpcq' => 'double',
        'adpcq' => 'double',
        'tdpcq' => 'double',
        'ddppc' => 'double',
        'adppc' => 'double',
        'tdppc' => 'double',
        'dded' => 'double',
        'aded' => 'double',
        'tded' => 'double',
        'ddpd' => 'double',
        'adpd' => 'double',
        'tdpd' => 'double',
        'ddmd' => 'double',
        'admd' => 'double',
        'tdmd' => 'double',
        'ddes' => 'double',
        'ades' => 'double',
        'tdes' => 'double',
        'ddps' => 'double',
        'adps' => 'double',
        'tdps' => 'double',
        'ddms' => 'double',
        'adms' => 'double',
        'tdms' => 'double',
        'ddalt' => 'double',
        'adalt' => 'double',
        'tdalt' => 'double',
        'ddframe' => 'double',
        'adframe' => 'double',
        'tdframe' => 'double',
        'mgte_cr' => 'double',
        'amgte_cr' => 'double',
        'tmgte_cr' => 'double',
        'mgte_re' => 'double',
        'amgte_re' => 'double',
        'tmgte_re' => 'double',
        'mgte_co' => 'double',
        'amgte_co' => 'double',
        'tmgte_co' => 'double',
        'mgte_f1' => 'double',
        'amgte_f1' => 'double',
        'tmgte_f1' => 'double',
        'nf3p' => 'double',
        'nn120' => 'double',
        'nrn120' => 'double',
        'nfstay' => 'double',
        'nf120' => 'double',
        'nr120' => 'double',
        'nf210' => 'double',
        'nr210' => 'double',
        'nf450' => 'double',
        'nr450' => 'double',
        'nfus' => 'double',
        'nrus' => 'double',
        'nfsams' => 'double',
    ];

    /**
     * Get the name of the index associated with the model.
     */
    public function searchableAs(): string
    {
        return 'consulta_publica_index';
    }

    public function toSearchableArray()
    {
        return [
            'nome' => $this->nome,
            'proprietario' => $this->proprietario,
            'criador' => $this->criador,
        ];
    }

    public static function getSearchable()
    {
        return self::$serchable;
    }

    public function newEloquentBuilder($query)
    {
        return new MeiliBuilder($query);
    }
}
