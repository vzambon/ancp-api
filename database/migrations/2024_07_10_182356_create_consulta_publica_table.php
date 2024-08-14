<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consulta_publica', function (Blueprint $table) {
            $table->id(); //ANCP DATABASE: ALTER TABLE consulta_publica ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY;
            $table->string('nome');
            $table->string('proprietario');
            $table->string('criador');
            $table->string('serie');
            $table->string('rgn');
            $table->string('rgd');
            $table->string('raca');
            $table->string('categoria');
            $table->string('variedade');
            $table->string('central');
            $table->string('rep_prog');
            $table->string('sexo')->default('Macho');
            $table->boolean('is_active')->default(true);
            $table->date('dt_nasc');

            $table->double('ige');
            $table->double('aige');
            $table->double('tige');

            $table->double('mgte');
            $table->double('amgte');
            $table->double('tmgte');

            $table->double('ddipp');
            $table->double('adipp');
            $table->double('tdipp');

            $table->double('dd3p');
            $table->double('ad3p');
            $table->double('td3p');

            $table->double('ddipm');
            $table->double('adipm');
            $table->double('tdipm');

            $table->double('dmpp120');
            $table->double('ampp120');
            $table->double('tmpp120');

            $table->double('dmpp210');
            $table->double('ampp210');
            $table->double('tmpp210');

            $table->double('dmtp120');
            $table->double('amtp120');
            $table->double('tmtp120');

            $table->double('dmtp210');
            $table->double('admtp210');
            $table->double('tmtp210');

            $table->double('ddstay');
            $table->double('adstay');
            $table->double('tdstay');

            $table->double('ddpg');
            $table->double('adpg');
            $table->double('tdpg');

            $table->double('ddpn');
            $table->double('adpn');
            $table->double('tdpn');

            $table->double('ddpp120');
            $table->double('adpp120');
            $table->double('tdpp120');

            $table->double('ddpp210');
            $table->double('adpp210');
            $table->double('tdpp210');

            $table->double('ddpp365');
            $table->double('adpp365');
            $table->double('tdpp365');

            $table->double('ddpp450');
            $table->double('adpp450');
            $table->double('tdpp450');

            $table->double('ddpav');
            $table->double('adpav');
            $table->double('tdpav');

            $table->double('ddcar');
            $table->double('adcar');
            $table->double('tdcar');

            $table->double('ddims');
            $table->double('adims');
            $table->double('tdims');

            $table->double('ddpe365');
            $table->double('adpe365');
            $table->double('tdpe365');

            $table->double('ddpe450');
            $table->double('adpe450');
            $table->double('tdpe450');

            $table->double('ddaol');
            $table->double('adaol');
            $table->double('tdaol');

            $table->double('ddacab');
            $table->double('adacab');
            $table->double('tdacab');

            $table->double('ddmar');
            $table->double('admar');
            $table->double('tdmar');

            $table->double('ddmac');
            $table->double('admac');
            $table->double('tdmac');

            $table->double('ddpcq');
            $table->double('adpcq');
            $table->double('tdpcq');

            $table->double('ddppc');
            $table->double('adppc');
            $table->double('tdppc');

            $table->double('dded');
            $table->double('aded');
            $table->double('tded');

            $table->double('ddpd');
            $table->double('adpd');
            $table->double('tdpd');

            $table->double('ddmd');
            $table->double('admd');
            $table->double('tdmd');

            $table->double('ddes');
            $table->double('ades');
            $table->double('tdes');

            $table->double('ddps');
            $table->double('adps');
            $table->double('tdps');

            $table->double('ddms');
            $table->double('adms');
            $table->double('tdms');

            $table->double('ddalt');
            $table->double('adalt');
            $table->double('tdalt');

            $table->double('ddframe');
            $table->double('adframe');
            $table->double('tdframe');

            $table->double('mgte_cr');
            $table->double('amgte_cr');
            $table->double('tmgte_cr');

            $table->double('mgte_re');
            $table->double('amgte_re');
            $table->double('tmgte_re');

            $table->double('mgte_co');
            $table->double('amgte_co');
            $table->double('tmgte_co');

            $table->double('mgte_f1');
            $table->double('amgte_f1');
            $table->double('tmgte_f1');

            $table->double('nf3p');

            $table->double('nn120');
            $table->double('nrn120');

            $table->double('nfstay');

            $table->double('nf120');
            $table->double('nr120');

            $table->double('nf210');
            $table->double('nr210');

            $table->double('nf450');
            $table->double('nr450');

            $table->double('nfus');
            $table->double('nrus');
            $table->double('nfsams');

            $table->double('pai_serie');
            $table->double('pai_rgn');
            $table->double('pai_rgd');
            $table->string('pai_nome');
            $table->double('pai_ige');
            $table->double('pai_tige');
            $table->double('pai_mgte');
            $table->double('pai_tmgte');

            $table->double('mae_serie');
            $table->double('mae_rgn');
            $table->double('mae_rgd');
            $table->string('mae_nome');
            $table->double('mae_ige');
            $table->double('mae_tige');
            $table->double('mae_mgte');
            $table->double('mae_tmgte');

            $table->double('ppai_serie');
            $table->double('ppai_rgn');
            $table->double('ppai_rgd');
            $table->string('ppai_nome');
            $table->double('ppai_ige');
            $table->double('ppai_tige');
            $table->double('ppai_mgte');
            $table->double('ppai_tmgte');

            $table->double('mpai_serie');
            $table->double('mpai_rgn');
            $table->double('mpai_rgd');
            $table->string('mpai_nome');
            $table->double('mpai_ige');
            $table->double('mpai_tige');
            $table->double('mpai_mgte');
            $table->double('mpai_tmgte');

            $table->double('pmae_serie');
            $table->double('pmae_rgn');
            $table->double('pmae_rgd');
            $table->string('pmae_nome');
            $table->double('pmae_ige');
            $table->double('pmae_tige');
            $table->double('pmae_mgte');
            $table->double('pmae_tmgte');

            $table->double('mmae_serie');
            $table->double('mmae_rgn');
            $table->double('mmae_rgd');
            $table->string('mmae_nome');
            $table->double('mmae_ige');
            $table->double('mmae_tige');
            $table->double('mmae_mgte');
            $table->double('mmae_tmgte');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta_publica');
    }
};
