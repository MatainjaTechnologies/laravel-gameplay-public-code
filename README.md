<p align="center">
	
Gemmez

	/// Support Https Asset URL

Add line .env 

	REDIRECT_HTTPS=true

	Add line at Service provider 
	if(env('REDIRECT_HTTPS'))
              {
                 \URL::forceScheme('https');
              }

              ///////////////////

              Clear Cache

              php artisan cache:clear
              php artisan route:cache
              php artisan view:clear
              php artisan config:cache

</p>

## How To Setup slypee 




