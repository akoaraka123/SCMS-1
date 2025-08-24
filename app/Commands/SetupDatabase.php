<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\Database\BaseConnection;

class SetupDatabase extends BaseCommand
{
    protected $group       = 'Database';
    protected $name        = 'db:setup';
    protected $description = 'Set up the database with migrations and seeders';

    public function run(array $params)
    {
        CLI::write('Setting up database...', 'green');

        try {
            // Run migrations
            CLI::write('Running migrations...', 'yellow');
            $this->runMigrations();

            // Run seeders
            CLI::write('Running seeders...', 'yellow');
            $this->runSeeders();

            CLI::write('Database setup completed successfully!', 'green');
            CLI::write('Default users created:', 'blue');
            CLI::write('- Admin: admin@example.com / admin123', 'white');
            CLI::write('- User: user@example.com / user123', 'white');
            CLI::write('- Manager: manager@example.com / manager123', 'white');

        } catch (\Exception $e) {
            CLI::error('Error setting up database: ' . $e->getMessage());
            return 1;
        }

        return 0;
    }

    private function runMigrations()
    {
        $migrate = \CodeIgniter\CLI\CLI::getOption('migrate') ?? true;
        
        if ($migrate) {
            $command = 'php spark migrate';
            exec($command, $output, $returnCode);
            
            if ($returnCode !== 0) {
                throw new \Exception('Migration failed');
            }
        }
    }

    private function runSeeders()
    {
        $seed = \CodeIgniter\CLI\CLI::getOption('seed') ?? true;
        
        if ($seed) {
            $command = 'php spark db:seed UserSeeder';
            exec($command, $output, $returnCode);
            
            if ($returnCode !== 0) {
                throw new \Exception('Seeding failed');
            }
        }
    }
}
