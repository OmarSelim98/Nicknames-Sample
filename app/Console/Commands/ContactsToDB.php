<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Phone;

class ContactsToDB extends Command
{  
    protected $number_of_files = 5;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Contacts:perMinute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert number of files in the db (with elasticsearch synced).';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $files_directories=Storage::files('json_requests');

        foreach($files_directories as $i=>$dir){

            $contacts = json_decode( Storage::get($dir) );

            
            foreach($contacts as $contact){
                $contact = ($contact);
                $phone_model = Phone::search($contact->phoneNumber)->within('number')->get();
                
                if(count($phone_model) == 0){
                    $phone_model = Phone::create([
                        'country_code' => $contact->countryCode,
                        'number' => $contact->phoneNumber
                    ]);
                }else{
                    $phone_model = $phone_model[0];
                }

                $phone_model->names()->create([
                    'name'  => $contact->name,
                    'email' => $contact->email
                ]);
            }
            
            Log::info($dir);
            Storage::delete($dir);
            if($i == $number_of_files){
                break;
            }
        }
        return 1;
    }
    
}
