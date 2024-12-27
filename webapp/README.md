# Create Main Database 

```sql
CREATE DATABASE webclock CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
```

# Setup Source Code
Please cd to the root directory of the project and run the following command to install the dependencies.
```bash
cd webapp
```

```bash
composer install
```

# Setup Environment
```aiignore
cp .env.example .env
```

# Setup Database
```bash
php artisan migrate
```

# Run data seeder
```bash
php artisan db:seed
```

# Run Server
```bash
php artisan serve
```

Run vite to compile frontend
```bash
npm run dev
```

# Access the application
Open your browser and access the following URL: http://localhost:8000

