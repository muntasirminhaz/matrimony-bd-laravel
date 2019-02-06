<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email', 191)->unique();
			$table->string('password', 191);
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->string('email_verified', 16)->default('');
			$table->boolean('completed')->default(20);
			$table->boolean('status')->nullable()->default(0);
			$table->boolean('featured')->default(0);
			$table->boolean('regisration_as')->default(0);
			$table->string('first_name', 191)->nullable();
			$table->string('middle_name', 191)->nullable();
			$table->string('last_name', 191)->nullable();
			$table->text('description', 65535);
			$table->string('mobile', 20);
			$table->string('national_id', 191)->nullable();
			$table->string('passport_no', 191)->nullable();
			$table->boolean('gender')->default(0);
			$table->date('date_of_birth')->nullable();
			$table->boolean('religion')->default(0);
			$table->integer('religion_section')->default(0);
			$table->boolean('provided_personal_info')->default(0);
			$table->boolean('is_religious')->default(0);
			$table->boolean('says_payer')->default(0);
			$table->boolean('wear_hijab')->default(0);
			$table->boolean('wear_hijab_after_marriage')->default(0);
			$table->boolean('disability')->default(0);
			$table->string('explain_disability', 191)->default('');
			$table->boolean('body_type')->default(0);
			$table->boolean('skin_tone')->default(0);
			$table->boolean('blood_group')->default(0);
			$table->float('weight', 5)->default(0.00);
			$table->string('height', 5)->nullable();
			$table->boolean('diet_type')->default(0);
			$table->boolean('smoke')->default(0);
			$table->boolean('drink')->default(0);
			$table->boolean('marital_status')->default(0);
			$table->integer('how_many_children')->nullable()->default(0);
			$table->boolean('children_living_with_me')->nullable()->default(0);
			$table->boolean('sun_sign')->default(0);
			$table->string('hobby')->default('');
			$table->boolean('language')->default(0);
			$table->string('annual_income', 191)->default('0');
			$table->string('father_name')->default('');
			$table->boolean('father_living_status')->nullable()->default(0);
			$table->boolean('father_service_status')->default(0);
			$table->boolean('father_profession')->default(0);
			$table->boolean('father_profession_details')->default(0);
			$table->string('father_designation')->default('');
			$table->string('father_organization_name')->default('');
			$table->string('father_other_profession_details')->default('');
			$table->string('mother_name')->default('');
			$table->boolean('mother_living_status')->default(0);
			$table->boolean('mother_service_status')->default(0);
			$table->boolean('mother_profession')->default(0);
			$table->boolean('mother_profession_details')->default(0);
			$table->string('mother_designation')->default('');
			$table->string('mother_organization_name')->default('');
			$table->string('mother_other_profession_details')->default('');
			$table->boolean('have_land')->default(0);
			$table->string('land_type')->default('');
			$table->text('family_background', 65535)->nullable();
			$table->boolean('user_profession_type')->default(0);
			$table->boolean('user_profession_details')->default(0);
			$table->string('user_designation')->nullable()->default('');
			$table->string('user_org_name')->default('');
			$table->string('user_other_profession_details')->nullable();
			$table->boolean('has_siblings')->default(0);
			$table->boolean('number_of_brothers')->default(0);
			$table->boolean('number_of_brother_married')->default(0);
			$table->boolean('number_of_sisters')->default(0);
			$table->boolean('number_of_sisters_married')->default(0);
			$table->boolean('relative_provided')->default(0);
			$table->boolean('paternal_uncle')->default(0);
			$table->boolean('paternal_aunt')->default(0);
			$table->boolean('maternal_uncle')->default(0);
			$table->boolean('maternal_aunt')->default(0);
			$table->boolean('paternal_uncle_married')->default(0);
			$table->boolean('paternal_aunt_married')->default(0);
			$table->boolean('maternal_uncle_married')->default(0);
			$table->boolean('maternal_aunt_married')->default(0);
			$table->boolean('preference_provided')->default(0);
			$table->boolean('preference_min_age')->default(0);
			$table->boolean('preference_max_age')->default(0);
			$table->boolean('preference_marital_status')->default(0);
			$table->boolean('preference_children_allow')->default(0);
			$table->string('preference_height')->default('');
			$table->boolean('preference_religion')->default(0);
			$table->string('preference_education')->default('');
			$table->string('preference_profession')->default('');
			$table->string('preference_home_district')->default('');
			$table->string('preference_living_country')->nullable()->default('');
			$table->string('preference_family_resident_city')->nullable()->default('');
			$table->boolean('preference_family_residential_status')->default(0);
			$table->string('preference_monthly_income', 100)->default('0');
			$table->boolean('preference_body_type')->default(0);
			$table->boolean('preference_skintone')->default(0);
			$table->boolean('preference_disability')->default(0);
			$table->boolean('preference_nrb')->default(0);
			$table->text('preference_moreinfo', 65535)->nullable();
			$table->string('contact_name')->default('');
			$table->string('contact_email')->default('');
			$table->boolean('contact_relation')->default(0);
			$table->string('contact_timetocall')->default('');
			$table->string('contact_mobile')->default('');
			$table->string('contact_present_address')->default('');
			$table->string('contact_permanent_address')->default('');
			$table->string('location_living_city')->default('');
			$table->integer('location_living_country')->default(0);
			$table->integer('location_growing_up_country')->default(0);
			$table->boolean('location_immigration_status')->default(0);
			$table->integer('location_district')->default(0);
			$table->integer('location_upzila')->default(0);
			$table->integer('location_family_living_country')->default(0);
			$table->integer('location_family_district')->default(0);
			$table->string('location_family_living_area')->default('');
			$table->string('location_family_zip')->default('');
			$table->boolean('location_family_residential_status')->default(0);
			$table->text('how_did', 65535)->nullable();
			$table->integer('agent')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
