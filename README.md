## Learning Panel Pulse Installation

### Login Setup

1. Create login and registration blade in `views/auth` `folder.
2. Install Command

3. change session type in .env file `file -> database`
4. Modify your composer.json by adding package in your vendore file (Optional if not added automatically )
   `"Kartikey\\PanelPulse\\": "package/PanelPulse/src/"`.
5. Run command to publish the assets of this package:
6. run `php artisan vendor:publish --provider="Kartikey\PanelPulse\PanelPulseServiceProvider"`
7. Add following code into config/app.php providers array : `'Kartikey\PanelPulse\PanelPulseServiceProvider'`.
8. Login route should be `{{ route('login') }}`
9. `role` column fillable in User Models
