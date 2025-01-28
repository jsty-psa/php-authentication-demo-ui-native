# PHP Authentication Demo UI

This is a sample application utilizing the PhilSys Authentication API via PHP.

## Installation

1. **Install [Composer](https://getcomposer.org/ "Composer Main Page") for this project**

2. **Install all dependencies in composer.json**

```bash
composer install
```

3. **Create environment variable inside the auth_demo_ui folder.**

- For Windows
```bash
type nul > php_apis\constants.php
```
- For Linux
```bash
touch php_apis/constants.php
```

4. **Fill-up properties inside the environment variable.**

```PHP
<?php
    # PhilSys Base URL for authentication
    const PHILSYS_BASE_URL = [PhilSys Base URL];
    
    # TSP License Key provided by PDMS
    const PHILSYS_TSP_LICENSE_KEY = [TSP License Key];
    
    # Partner ID provided by PDMS
    const PHILSYS_RP_PARTNER_ID = [Partner ID];
    
    # API Key provided by PDMS
    const PHILSYS_RP_API_KEY = [Partner Key];

    # PhilSys OTP Request URL
    const PHILSYS_OTP_URL = [PhilSys OTP Request URL];
    
    # PhilSys Basic Authentication URL
    const PHILSYS_AUTH_URL = [PhilSys Basic Authentication Request URL];
    
    # PhilSys eKYC Authentication URL
    const PHILSYS_EKYC_URL = [PhilSys eKYC Authentication Request URL];

    # Authorization URL
    const PHILSYS_ID_AUTH_MANAGER = [ID Authentication Manager URL];
    
    # Client ID for Authorization
    const PHILSYS_CLIENT_ID = [Client ID];
    
    # Client Secret Key for Authorization
    const PHILSYS_SECRET_KEY = [Client Secret];
    
    # Client Application ID for Authorization
    const PHILSYS_APP_ID = [App ID];
    
    # Client Reference ID for Authorization
    const PHILSYS_REFERENCE_ID = [Reference ID];

    # PhilSys Target Environment
    const PHILSYS_ENVIRONMENT = [Environment];
    
    # PhilSys Version
    const PHILSYS_VERSION = [PhilSys Version];

    # Partner P12 password (if used within the system)
    const CERT_PASSPHRASE = [P12 Password Phrase];
```

5. **Create a folder named keys**

```bash
mkdir keys
```

6. **Create and upload all the keys needed in this location**

```
keys/[Partner_ID]
```

7. **Run the application**


```
docker-compose up --build
```

## Contributing

All pull requests are welcome in this environment and feel free to utilize this application.
