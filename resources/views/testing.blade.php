<?php
	use App\Models\Bank;

	$emp_details = Bank::where('bank_name','BANK OF BARODA')->first()->id;

	dd($emp_details);
?>