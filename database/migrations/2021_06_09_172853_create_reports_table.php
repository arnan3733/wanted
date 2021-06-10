<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('divisions_id', 10)->nullable();
            $table->string('wanted_number', 100);
            $table->string('accused_name', 300); //ชื่อผู้ถูกกล่าวหา
            $table->string('accused_id_card', 20)->nullale(); //บัตรประชาชนผู้ถูกกล่าวหา
            $table->string('allegates_id', 13)->nullable(); //รหัสประเภทข้อกล่าวหา
            $tabel->string('court_office', 300)->nullable(); //ชื่อศาล
            $table->string('prosecutor_office', 300)->nullable(); //สำนักอัยการ
            $table->date('expiration_date')->nullable(); //วันขาดอายุความ
            $table->enum('expiration_type', ['นับระยะเวลา','ไม่นับระยะเวลา'])->nullable(); //ประเภทวันอายุความ
            $table->date('detect_date')->nullable(); //วันที่ประกาศสืบจับ
            $table->enum('detect_status', ['ประกาศสืบจับแล้ว','รอดำเนินการ'])->nullable(); //สถานะการประกาศสืบจับ
            $table->date('withdraw_case_date')->nullable(); //วันที่ถอนสืบจับ
            $table->enum('withdraw_case_status', ['ถอนสืบจับแล้ว','รอดำเนินการ'])->nullable(); //สถานะถอนสืบจับ
            $table->date('arrest_date')->nullable(); //วันที่ประกาศจับกุม
            $table->enum('arrest_status', ['จับกุมแล้ว','อยู่ระหว่างติดตามจับกุม'])->nullable(); //สถานะการจับกุม
            $table->string('case_id', 10)->nullable(); //เลขที่คดี
            $table->string('assignment_number', 200)->nullable(); //เลขที่คำสั่ง
            $table->string('authority_name', 300)->nullable(); //ผู้รับผิดชอบ
            $table->string('authority_contact', 300)->nullable(); //ข้อมูลติดต่อผู้รับผิดชอบ
            $table->string('attachment_file', 500)->nullable(); //ไฟล์แนบ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
