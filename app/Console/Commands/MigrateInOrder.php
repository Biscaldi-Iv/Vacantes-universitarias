<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateInOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate_in_order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the migrations in the order specified in the file app/Console/Comands/MigrateInOrder.php \n Drop all the table in db before execute the command.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $migrations = [
                        '2014_10_12_000000_create_users_table.php',
                        '2014_10_12_100000_create_password_resets_table.php',
                        '2019_08_19_000000_create_failed_jobs_table.php',
                        '2019_12_14_000001_create_personal_access_tokens_table.php',
                        '2022_11_15_230822_create_usuarios_table.php',
                        '2022_11_18_014306_create_universidads_table.php',
                        '2022_11_18_014307_create_catedras_table.php',
                        '2022_11_18_0146308_create_vacantes_table.php',
                        '2022_11_18_0146309_create_postulacions_table.php',
                        '2022_11_22_013738_create_personal_universidads_table.php'
        ];
        foreach($migrations as $migration)
        {
           $basePath = 'database/migrations/';
           $migrationName = trim($migration);
           $path = $basePath.$migrationName;
           $this->call('migrate:refresh', [
            '--path' => $path ,
           ]);
        }
        return Command::SUCCESS;
    }
}
