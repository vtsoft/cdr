<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('php_exam_cdr', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->datetime('calldate')->default('0000-00-00 00:00:00');
            $table->varchar('clid',80)->default('');
            $table->varchar('src',80)->default('');
            $table->varchar('dst',80)->default('');
            $table->varchar('dcontext',80)->default('');
            $table->varchar('channel',80)->default('');
            $table->varchar('dstchannel',80)->default('');
            $table->varchar('lastapp',80)->default('');
            $table->varchar('lastdata',80)->default('');
            $table->integer('duration',11)->default(0);
            $table->integer('billsec',11)->default(0);
            $table->varchar('disposition',45)->default('');
            $table->integer('amaflags',11)->default(0);
            $table->varchar('accountcode',20)->default('');
            $table->varchar('uniqueid',32)->default('');
            $table->varchar('userfield',255)->default('');
            $table->varchar('did',50)->default('');
            $table->varchar('recordingfile',255)->default('');
            $table->varchar('cnum',40)->default('');
            $table->varchar('cnam',40)->default('');
            $table->varchar('outbound_cnum',40)->default('');
            $table->varchar('outbound_cnam',40)->default('');
            $table->varchar('dst_cnam',40)->default('');
            $table->varchar('prime_dst',80);
            $table->varchar('bit_dst',80);
            $table->varchar('enjoy_dst',80);
            $table->varchar('daon_dst',80);
            $table->varchar('pnp_dst',80);
            $table->varchar('daon_ivr',80);
            $table->varchar('happyeco_dst',80);
            $table->varchar('bisen_dst',80);
            $table->integer('answer_time',11);
            $table->integer('hangup_time',11);
            //     KEY `calldate` (`calldate`),
            //     KEY `dst` (`dst`),
            //     KEY `accountcode` (`accountcode`),
            //     KEY `dcontext` (`dcontext`),
            //     KEY `dstchannel` (`dstchannel`)
            //   ) ENGINE=MyISAM DEFAULT CHARSET=latin1;


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('php_exam_cdr');
    }
};
