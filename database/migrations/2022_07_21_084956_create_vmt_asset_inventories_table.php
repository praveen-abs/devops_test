<?php
use App\Models\VmtAssetInventory;
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
        Schema::create('vmt_asset_inventories', function (Blueprint $table) {
            $table->id();
            $table->text('asset_name')->nullable();
            $table->text('asset_type')->nullable();
            $table->text('asset_status')->nullable();
            $table->text('serial_number')->nullable();
            $table->text('warranty')->nullable();
            $table->text('vendor')->nullable();
            $table->text('assignee')->nullable();
            $table->text('assigned_date')->nullable();
            $table->text('invoice')->nullable();

            $table->timestamps();
        });



        VmtAssetInventory::create(['asset_name' => 'HP Laptop',
                                    'asset_type' => 'Laptop',
                                    'asset_status' => 'active',
                                    'serial_number' => '111-222-333',
                                    'warranty' => '3 years',
                                    'vendor' => 'HP',
                                    'assignee' => 'Srini',
                                    'assigned_date' => '2022-1-1',
                                    'invoice' => 'sample_asset_invoice.pdf',

                                ]);

        VmtAssetInventory::create(['asset_name' => 'OnePlus X',
                                    'asset_type' => 'Mobile',
                                    'asset_status' => 'inactive',
                                    'serial_number' => 'TX1-ABB-333',
                                    'warranty' => '1 years',
                                    'vendor' => 'OnePlus',
                                    'assignee' => 'Srini',
                                    'assigned_date' => '2022-10-1',
                                    'invoice' => 'sample_asset_invoice.pdf',

                                ]);

        VmtAssetInventory::create(['asset_name' => 'Dell Laptop',
                                    'asset_type' => 'Laptop',
                                    'asset_status' => 'active',
                                    'serial_number' => '111-222-333',
                                    'warranty' => '3 years',
                                    'vendor' => 'HP',
                                    'assignee' => 'Srini',
                                    'assigned_date' => '2022-1-1',
                                    'invoice' => 'sample_asset_invoice.pdf',

                                ]);

        VmtAssetInventory::create(['asset_name' => 'Samsung X',
                                    'asset_type' => 'Mobile',
                                    'asset_status' => 'active',
                                    'serial_number' => 'TX1-ABB-333',
                                    'warranty' => '1 years',
                                    'vendor' => 'OnePlus',
                                    'assignee' => 'Srini',
                                    'assigned_date' => '2022-10-1',
                                    'invoice' => 'sample_asset_invoice.pdf',

                                ]);                                
                                
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vmt_asset_inventories');
    }
};
