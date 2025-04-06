# Gestion de Parc Informatique d'ANP

## Description

Gestion de Parc Informatique d'ANP is a project designed to manage and monitor the IT infrastructure of ANP. It provides tools for inventory management, maintenance tracking, and reporting.

## Features

- Inventory management for IT assets.
- Maintenance scheduling and tracking.
- Reporting and analytics for IT infrastructure.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-repo/Gestion-de-parc-informatique-d-ANP.git
   ```
2. Navigate to the project directory:
   ```bash
   cd Gestion-de-parc-informatique-d-ANP
   ```
3. Install dependencies:

   ```bash
   npm install
   ```

   ```bash
   composer install
   ```

4. Configure the environment variables in a `.env` file.
5. Inside .env look for APP_KEY, if not existe Please run:
   ```bash
   php artisan key:generate
   ```
6. Check if there is something to migrate:
   ```bash
   php artisan migrate
   ```

## Usage

1. Start the VITE development server :
   ```bash
   npm start
   ```
2. Access the application at `http://localhost:5173`.

3. Open a new Terminal, the Start php server:
   ```bash
   php artisan serve
   ```
4. Access the application at `http://localhost:8000`.

## Contributing

1. Fork the repository.
2. Create a new branch:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m "Add feature description"
   ```
4. Push to the branch:
   ```bash
   git push origin feature-name
   ```
5. Open a pull request.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.
