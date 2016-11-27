<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BepMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('type', function (Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->string('type');
            $tbl->timestamps();
        });

        Schema::create('user', function (Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->integer('type_id')->unsigned();
            $tbl->string('username');
            $tbl->string('password');
            $tbl->string('email');
            $tbl->string('name');
            $tbl->date('dob');
            $tbl->rememberToken();
            $tbl->timestamps();

            $tbl->foreign('type_id')
            ->references('id')
            ->on('type');
        });

        // Schema::create('team', function (Blueprint $tbl) {
        //     $tbl->increments('id');
        //     $tbl->integer('user_id')->unsigned();
        //     $tbl->string('name');
        //     $tbl->string('description');
        //     $tbl->timestamps();

        //     $tbl->foreign('user_id')
        //         ->references('id')
        //         ->on('user');
        // });

        Schema::create('team', function (Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->integer('user_id')->unsigned();
            $tbl->string('name');
            $tbl->string('description');
            $tbl->timestamps();

            $tbl->foreign('user_id')
            ->references('id')
            ->on('user')->onDelete('cascade');
        });

        Schema::create('team_member', function (Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->integer('team_id')->unsigned();
            $tbl->integer('user_id')->unsigned();
            $tbl->timestamps();

            $tbl->foreign('user_id')
            ->references('id')
            ->on('user')->onDelete('cascade');

            $tbl->foreign('team_id')
            ->references('id')
            ->on('team')->onDelete('cascade');
        });

        Schema::create('event', function (Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->integer('user_id')->unsigned();
            $tbl->string('name');
            $tbl->string('description');
            $tbl->dateTime('start_date');
            $tbl->dateTime('end_date');
            $tbl->integer('max_participant')->unsigned();
            $tbl->timestamps();

            $tbl->foreign('user_id')
            ->references('id')
            ->on('user')->onDelete('cascade');
        });

        Schema::create('event_attendee', function (Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->integer('event_id')->unsigned();
            $tbl->integer('user_id')->unsigned();
            $tbl->timestamps();

            $tbl->foreign('user_id')
            ->references('id')
            ->on('user')->onDelete('cascade');

            $tbl->foreign('event_id')
            ->references('id')
            ->on('event')->onDelete('cascade');
        });

        Schema::create('event_winner', function (Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->integer('user_id')->unsigned();
            $tbl->integer('event_id')->unsigned();
            $tbl->string('rank');
            $tbl->timestamps();

            $tbl->foreign('user_id')
            ->references('id')
            ->on('user')->onDelete('cascade');

            $tbl->foreign('event_id')
            ->references('id')
            ->on('event')->onDelete('cascade');
        });

        Schema::create('event_rundown', function (Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->integer('event_id')->unsigned();
            $tbl->string('name');
            $tbl->string('description');
            $tbl->dateTime('start_date');
            $tbl->dateTime('end_date');
            $tbl->timestamps();

            $tbl->foreign('event_id')
            ->references('id')
            ->on('event')->onDelete('cascade');
        });

        Schema::create('comment', function (Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->integer('event_id')->unsigned();
            $tbl->integer('user_id')->unsigned();
            $tbl->string('comment');
            $tbl->timestamps();

            $tbl->foreign('user_id')
            ->references('id')
            ->on('user')->onDelete('cascade');

            $tbl->foreign('event_id')
            ->references('id')
            ->on('event')->onDelete('cascade');
        });

        Schema::create('rating', function (Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->integer('event_id')->unsigned();
            $tbl->integer('user_id')->unsigned();
            $tbl->integer('rating');
            $tbl->timestamps();

            $tbl->foreign('user_id')
            ->references('id')
            ->on('user')->onDelete('cascade');

            $tbl->foreign('event_id')
            ->references('id')
            ->on('event')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('comment');
        Schema::drop('rating');
        Schema::drop('event_rundown');
        Schema::drop('event_winner');
        Schema::drop('event_attendee');
        Schema::drop('team_member');

        Schema::drop('team');
        Schema::drop('event');
        Schema::drop('user');
        Schema::drop('type');
    }
}
