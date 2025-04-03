<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Materials Table
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('user_function'); // Purpose or function of the material
            $table->string('marque'); // Brand
            $table->string('model'); // Model of the material
            $table->string('serial_number')->unique(); // Unique serial number
            $table->string('fixed_asset_code')->unique(); // Asset tracking code
            $table->date('acquisition_date'); // When the item was acquired
            $table->enum('status', ['New', 'Good', 'Average'])->default('New'); // Condition
            $table->text('observation')->nullable(); // Additional notes
            $table->timestamps();
        });

        // Requests Table (Tracks material requests by users)
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Requesting user
            $table->foreignId('material_id')->constrained()->onDelete('cascade'); // Requested material
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Request status
            $table->timestamps();
        });

        // Assignments Table (Tracks assigned materials)
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Assigned user
            $table->foreignId('material_id')->constrained()->onDelete('cascade'); // Assigned material
            $table->timestamp('assigned_at')->useCurrent(); // Assignment date
            $table->timestamps();
        });

        // Declarations Table (Tracks maintenance requests)
        Schema::create('declarations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Requesting user
            $table->foreignId('material_id')->constrained()->onDelete('cascade'); // Material in question
            $table->string('subject'); // Issue subject
            $table->text('description'); // Detailed description
            $table->enum('status', ['pending', 'in-progress', 'completed'])->default('pending'); // Maintenance status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
        Schema::dropIfExists('requests');
        Schema::dropIfExists('assignments');
        Schema::dropIfExists('declarations');
    }
};
