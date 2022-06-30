<?php

use App\Models\CompanyProfile;
use Faker\Provider\ar_JO\Company;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyProfilesTable  extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('phone',11);
            $table->string('email',50);
            $table->text('address');
            $table->text('about')->nullable();
            $table->text('slogan')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('instagram')->nullable();
            $table->string('logo');
            $table->timestamps();
        });

        // Create a default one 
        // $company = new CompanyProfile();
        // $company->name = 'Default name'; 
        // $company->email = 'test@gmail.com'; 
        // $company->phone = '0170000000*'; 
        // $company->address = 'Default address'; 
        // $company->logo = 'logo.png'; 
        // $company->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_profiles');
    }
}
