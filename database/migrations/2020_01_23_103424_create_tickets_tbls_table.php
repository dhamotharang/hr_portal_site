<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTblsTable extends Migration
{

    public function up()
    {
        Schema::create('tickets_tbls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ticket_type');
            $table->string('ticket_store_name');
            $table->string('ticket_store_code');
            $table->string('ticket_username');
            $table->string('ticket_cust_name');
            $table->string('ticket_cust_phone1');
            $table->string('ticket_cust_phone2');
            $table->string('ticket_desc');
            $table->string('ticket_upc');
            $table->string('ticket_case1');
            $table->string('ticket_case2');
            $table->string('ticket_imag1');
            $table->string('ticket_imag2');
            $table->string('ticket_imag3');
            $table->string('ticket_status');
            $table->string('ticket_store_status');
            $table->string('ticket_store_comment');
            $table->string('ticket_status_rsn');
            $table->string('ticket_close_date');
            $table->string('ticket_close_time');
            $table->string('ticket_note1');
            $table->string('ticket_note2');
            $table->string('ticket_rst_date');
            $table->string('ticket_rst_nomber');
            $table->string('ticket_rst_store_code');
            $table->string('ticket_color');
            $table->string('ticket_size');
            $table->string('ticket_wrong_desc');
            $table->string('ticket_wrong_rsn');
            $table->string('ticket_defo_code');
            $table->string('ticket_defo_name');
            $table->string('ticket_rsv_name');
            $table->string('ticket_reaction_formIt');
            $table->string('ticket_reaction_date');
            $table->string('ticket_reaction_time');
            $table->string('ticket_reaction_CsUser');
            $table->string('ticket_cs_action_comment');
            $table->string('ticket_price_change_desc');
            $table->string('ticket_price_change_value');
            $table->string('ticket_quantity');
            $table->string('ticket_count_per_cus');
            $table->string('ticket_paid_amt');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('tickets_tbls');
    }
}
