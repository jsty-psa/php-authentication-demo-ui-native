# PHP Authentication Demo UI

This is a sample application utilizing the PhilSys Authentication API via PHP.

## Installation

**Install [Composer](https://getcomposer.org/ "Composer Main Page") for this project**

**Install all dependencies in composer.json**

```bash
composer install
```

**Create environment variable inside the auth_demo_ui folder.**

```bash
# Windows
type nul > php_apis\constants.php

# Linux
touch php_apis/constants.php
```

**Fill-up properties inside the environment variable.**

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

**Create a folder named keys**

```bash
mkdir keys
```

**Create and upload all the keys needed in this location**

```
keys/[Partner_ID]
```

**Run the application**

## Contributing

All pull requests are welcome in this environment and feel free to utilize this application.
